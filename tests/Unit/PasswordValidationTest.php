<?php

use Illuminate\Support\Facades\Validator;

it('validates password according to rules', function () {
    $rules = ['password' => 'required|string|min:8|confirmed'];

    $validData = ['password' => 'password123', 'password_confirmation' => 'password123'];
    $invalidData = ['password' => 'short', 'password_confirmation' => 'short'];

    // Validate a valid password
    $valid = Validator::make($validData, $rules);
    expect($valid->passes())->toBeTrue();

    // Validate an invalid password
    $invalid = Validator::make($invalidData, $rules);
    expect($invalid->fails())->toBeTrue();
})->group('unit');
