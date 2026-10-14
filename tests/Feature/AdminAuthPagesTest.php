<?php

use App\Models\User;

test('guests can view admin authentication pages', function (string $routeName, string $viewName) {
    $this->get(route($routeName))->assertOk()->assertViewIs($viewName);
})->with([
    ['admin.login', 'backend.auth.login'],
    ['admin.register', 'backend.auth.register'],
]);

test('guests are redirected from the dashboard to admin login', function () {
    $this->get(route('admin.dashboard'))->assertRedirect(route('admin.login'));
});

test('authenticated users can view their dashboard', function () {
    $user = User::factory()->make();

    $this->actingAs($user)->get(route('admin.dashboard'))
        ->assertOk()
        ->assertViewIs('backend.dashboard')
        ->assertSeeText($user->name)
        ->assertSeeText($user->email);
});

test('authenticated users can view admin menu sections', function (string $routeName, string $title) {
    $this->actingAs(User::factory()->make())->get(route($routeName))
        ->assertOk()
        ->assertViewIs('backend.section')
        ->assertSeeText($title);
})->with([
    ['admin.posts', 'Posts'],
    ['admin.categories', 'Categories'],
    ['admin.tags', 'Tags'],
    ['admin.media-library', 'Media Library'],
    ['admin.pages', 'Pages'],
    ['admin.comments', 'Comments'],
    ['admin.newsletter', 'Newsletter'],
    ['admin.contact-messages', 'Contact Messages'],
    ['admin.seo-management', 'SEO Management'],
    ['admin.resources-tools', 'Resources & Tools'],
    ['admin.users-authors', 'Users & Authors'],
    ['admin.appearance', 'Appearance'],
    ['admin.analytics', 'Analytics'],
    ['admin.settings', 'Settings'],
    ['admin.roles-permissions', 'Roles & Permissions'],
]);

test('guests are redirected from admin menu sections to admin login', function (string $routeName) {
    $this->get(route($routeName))->assertRedirect(route('admin.login'));
})->with([
    'admin.posts',
    'admin.categories',
    'admin.tags',
    'admin.media-library',
    'admin.pages',
    'admin.comments',
    'admin.newsletter',
    'admin.contact-messages',
    'admin.seo-management',
    'admin.resources-tools',
    'admin.users-authors',
    'admin.appearance',
    'admin.analytics',
    'admin.settings',
    'admin.roles-permissions',
]);

test('authenticated users are redirected from authentication pages to the dashboard', function (string $routeName) {
    $this->actingAs(User::factory()->make())->get(route($routeName))
        ->assertRedirect(route('admin.dashboard'));
})->with(['admin.login', 'admin.register']);
