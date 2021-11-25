<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Str;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:191'],
            'username' => ['required', 'string', 'max:35'],
            'no_hp' => ['required', 'min:12', 'max:13', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:75', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $name = $input['name'];
        $username = $input['username'];

        return User::create([
            'name' => $name,
            'username' => $username,
            'no_hp' => $input['no_hp'],
            'email' => $input['email'],
            'level' => 'pelanggan',
            'password' => Hash::make($input['password']),
        ]);
    }
}
