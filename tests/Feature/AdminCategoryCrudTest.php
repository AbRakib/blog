<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

test('authenticated users can view categories', function () {
    $category = Category::factory()->create([
        'name' => 'Laravel',
        'slug' => 'laravel',
    ]);

    $this->actingAs(User::factory()->make())
        ->get(route('admin.categories'))
        ->assertOk()
        ->assertViewIs('backend.categories.index')
        ->assertSeeText($category->name)
        ->assertSeeText($category->slug)
        ->assertSeeText('Add Category');
});

test('authenticated users can create categories', function () {
    Storage::fake('public');

    $this->actingAs(User::factory()->make())
        ->post(route('admin.categories.store'), [
            'name' => 'PHP',
            'description' => 'PHP tutorials and updates.',
            'icon' => UploadedFile::fake()->image('icon.png'),
            'meta_title' => 'PHP Tutorials',
            'meta_description' => 'Read PHP tutorials and updates.',
        ])
        ->assertRedirect(route('admin.categories'));

    $this->assertDatabaseHas('categories', [
        'name' => 'PHP',
        'slug' => 'php',
        'description' => 'PHP tutorials and updates.',
        'meta_title' => 'PHP Tutorials',
        'meta_description' => 'Read PHP tutorials and updates.',
    ]);

    Storage::disk('public')->assertExists(Category::query()->where('name', 'PHP')->firstOrFail()->icon);
});

test('authenticated users can update categories', function () {
    Storage::fake('public');
    $previousIcon = UploadedFile::fake()->image('old.png')->store('categories/icons', 'public');
    $category = Category::factory()->create(['icon' => $previousIcon]);

    $this->actingAs(User::factory()->make())
        ->put(route('admin.categories.update', $category), [
            'name' => 'Laravel Framework',
            'description' => 'Laravel framework articles.',
            'icon' => UploadedFile::fake()->image('new.png'),
            'meta_title' => 'Laravel Framework Articles',
            'meta_description' => 'Guides about Laravel framework.',
        ])
        ->assertRedirect(route('admin.categories'));

    $this->assertDatabaseHas('categories', [
        'id' => $category->id,
        'name' => 'Laravel Framework',
        'slug' => 'laravel-framework',
        'description' => 'Laravel framework articles.',
        'meta_title' => 'Laravel Framework Articles',
        'meta_description' => 'Guides about Laravel framework.',
    ]);

    Storage::disk('public')->assertMissing($previousIcon);
    Storage::disk('public')->assertExists($category->fresh()->icon);
});

test('updating without an upload preserves the category icon', function () {
    Storage::fake('public');
    $icon = UploadedFile::fake()->image('icon.png')->store('categories/icons', 'public');
    $category = Category::factory()->create(['icon' => $icon]);

    $this->actingAs(User::factory()->make())
        ->put(route('admin.categories.update', $category), ['name' => $category->name])
        ->assertSessionHasNoErrors();

    expect($category->fresh()->icon)->toBe($icon);
    Storage::disk('public')->assertExists($icon);
});

test('category icons must be images no larger than two megabytes', function () {
    Storage::fake('public');

    foreach ([UploadedFile::fake()->create('icon.txt', 1, 'text/plain'), UploadedFile::fake()->image('icon.png')->size(2049)] as $icon) {
        $this->actingAs(User::factory()->make())
            ->post(route('admin.categories.store'), ['name' => 'Invalid Icon', 'icon' => $icon])
            ->assertSessionHasErrors('icon');
    }

    $this->assertDatabaseMissing('categories', ['name' => 'Invalid Icon']);
    expect(Storage::disk('public')->allFiles())->toBeEmpty();
});

test('generated category slugs are unique and ignore submitted slugs', function () {
    Category::factory()->create(['name' => 'PHP Framework', 'slug' => 'php-framework']);
    Category::factory()->create(['name' => 'Another Category', 'slug' => 'php-framework-2']);

    $this->actingAs(User::factory()->make())
        ->post(route('admin.categories.store'), ['name' => 'PHP-Framework', 'slug' => 'custom-slug'])
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('admin.categories'));

    $this->assertDatabaseHas('categories', ['name' => 'PHP-Framework', 'slug' => 'php-framework-3']);
});

test('updating a category keeps its own slug available and handles collisions', function () {
    $category = Category::factory()->create(['name' => 'PHP', 'slug' => 'php']);
    Category::factory()->create(['name' => 'Laravel Framework', 'slug' => 'laravel-framework']);

    $this->actingAs(User::factory()->make())
        ->put(route('admin.categories.update', $category), ['name' => 'PHP'])
        ->assertSessionHasNoErrors();

    expect($category->fresh()->slug)->toBe('php');

    $this->put(route('admin.categories.update', $category), ['name' => 'Laravel-Framework'])
        ->assertSessionHasNoErrors();

    expect($category->fresh()->slug)->toBe('laravel-framework-2');
});

test('authenticated users can delete categories', function () {
    Storage::fake('public');
    $icon = UploadedFile::fake()->image('icon.png')->store('categories/icons', 'public');
    $category = Category::factory()->create(['icon' => $icon]);

    $this->actingAs(User::factory()->make())
        ->delete(route('admin.categories.destroy', $category))
        ->assertRedirect(route('admin.categories'));

    $this->assertDatabaseMissing('categories', [
        'id' => $category->id,
    ]);
    Storage::disk('public')->assertMissing($icon);
});

test('guests cannot manage categories', function (string $method, string $routeName) {
    $category = Category::factory()->create();

    $response = match ($method) {
        'get' => $this->get(route($routeName, $category)),
        'post' => $this->post(route($routeName), []),
        'put' => $this->put(route($routeName, $category), []),
        'delete' => $this->delete(route($routeName, $category)),
    };

    $response->assertRedirect(route('admin.login'));
})->with([
    ['get', 'admin.categories'],
    ['post', 'admin.categories.store'],
    ['put', 'admin.categories.update'],
    ['delete', 'admin.categories.destroy'],
]);
