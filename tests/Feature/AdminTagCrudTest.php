<?php

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('authenticated users can view tags', function () {
    $tag = Tag::factory()->create([
        'name' => 'Laravel',
        'slug' => 'laravel',
    ]);

    $this->actingAs(User::factory()->make())
        ->get(route('admin.tags'))
        ->assertOk()
        ->assertViewIs('backend.tags.index')
        ->assertSeeText($tag->name)
        ->assertSeeText($tag->slug)
        ->assertSeeText('Add Tag');
});

test('authenticated users can create tags', function () {
    $this->actingAs(User::factory()->make())
        ->post(route('admin.tags.store'), [
            'name' => 'PHP',
            'description' => 'PHP tutorials and updates.',
        ])
        ->assertRedirect(route('admin.tags'));

    $this->assertDatabaseHas('tags', [
        'name' => 'PHP',
        'slug' => 'php',
        'description' => 'PHP tutorials and updates.',
    ]);
});

test('authenticated users can update tags', function () {
    $tag = Tag::factory()->create();

    $this->actingAs(User::factory()->make())
        ->put(route('admin.tags.update', $tag), [
            'name' => 'Laravel Framework',
            'description' => 'Laravel framework articles.',
        ])
        ->assertRedirect(route('admin.tags'));

    $this->assertDatabaseHas('tags', [
        'id' => $tag->id,
        'name' => 'Laravel Framework',
        'slug' => 'laravel-framework',
        'description' => 'Laravel framework articles.',
    ]);
});

test('generated slugs are unique and ignore submitted slugs', function () {
    Tag::factory()->create(['name' => 'PHP Framework', 'slug' => 'php-framework']);
    Tag::factory()->create(['name' => 'Another Tag', 'slug' => 'php-framework-2']);

    $this->actingAs(User::factory()->make())
        ->post(route('admin.tags.store'), ['name' => 'PHP-Framework', 'slug' => 'custom-slug'])
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('admin.tags'));

    $this->assertDatabaseHas('tags', ['name' => 'PHP-Framework', 'slug' => 'php-framework-3']);
});

test('updating a tag keeps its own slug available and handles collisions', function () {
    $tag = Tag::factory()->create(['name' => 'PHP', 'slug' => 'php']);
    Tag::factory()->create(['name' => 'Laravel Framework', 'slug' => 'laravel-framework']);

    $this->actingAs(User::factory()->make())
        ->put(route('admin.tags.update', $tag), ['name' => 'PHP'])
        ->assertSessionHasNoErrors();

    expect($tag->fresh()->slug)->toBe('php');

    $this->put(route('admin.tags.update', $tag), ['name' => 'Laravel-Framework'])
        ->assertSessionHasNoErrors();

    expect($tag->fresh()->slug)->toBe('laravel-framework-2');
});

test('authenticated users can delete tags', function () {
    $tag = Tag::factory()->create();

    $this->actingAs(User::factory()->make())
        ->delete(route('admin.tags.destroy', $tag))
        ->assertRedirect(route('admin.tags'));

    $this->assertDatabaseMissing('tags', [
        'id' => $tag->id,
    ]);
});

test('guests cannot manage tags', function (string $method, string $routeName) {
    $tag = Tag::factory()->create();

    $response = match ($method) {
        'get' => $this->get(route($routeName, $tag)),
        'post' => $this->post(route($routeName), []),
        'put' => $this->put(route($routeName, $tag), []),
        'delete' => $this->delete(route($routeName, $tag)),
    };

    $response->assertRedirect(route('admin.login'));
})->with([
    ['get', 'admin.tags'],
    ['post', 'admin.tags.store'],
    ['put', 'admin.tags.update'],
    ['delete', 'admin.tags.destroy'],
]);
