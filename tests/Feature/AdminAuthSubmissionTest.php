<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

test('guests can log in from the admin login page', function () {
    $user = User::factory()->create([
        'password' => Hash::make('secret-password'),
    ]);

    $this->post(route('admin.login.store'), [
        'email' => $user->email,
        'password' => 'secret-password',
    ])->assertRedirect(route('admin.dashboard'));

    $this->assertAuthenticatedAs($user);
});

test('guests cannot log in with invalid credentials', function () {
    $user = User::factory()->create([
        'password' => Hash::make('secret-password'),
    ]);

    $this->post(route('admin.login.store'), [
        'email' => $user->email,
        'password' => 'wrong-password',
    ])->assertSessionHasErrors('email');

    $this->assertGuest();
});

test('guests can register for admin access', function () {
    $this->post(route('admin.register.store'), [
        'name' => 'New Admin',
        'email' => 'admin@example.com',
        'password' => 'secret-password',
        'password_confirmation' => 'secret-password',
        'terms' => '1',
    ])->assertRedirect(route('admin.dashboard'));

    $user = User::where('email', 'admin@example.com')->firstOrFail();

    expect($user->name)->toBe('New Admin');
    $this->assertAuthenticatedAs($user);
});
