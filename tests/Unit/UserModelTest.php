<?php

use App\Models\User;

it('can create a user with valid attributes', function () {
    $user = User::factory()->make([
        'name' => 'John Doe',
        'username' => 'johndoe',
        'email' => 'john@example.com',
    ]);

    expect($user->name)->toBe('John Doe')
        ->and($user->username)->toBe('johndoe')
        ->and($user->email)->toBe('john@example.com');
})->group('unit');
