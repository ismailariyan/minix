<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // Validation logic for the user input
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'username' => [
                'required', 
                'string', 
                'min:4', 
                'max:15', 
                'regex:/^[a-zA-Z0-9_]+$/',
                'unique:users,username',
            ],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Create the user
        $user = User::create([
            'name' => $input['name'],
            'username' => $input['username'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        // Queue the welcome email
        Mail::to($user->email)->queue(new WelcomeEmail($user));

        return $user;
    }
}
