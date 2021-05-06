<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $request
     * @return \App\Models\User
     */
    public function create(array $request)
    {
        Validator::make($request->all(), [
            'business' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'adress' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'is_admin' => [],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'business' => $request['business'],
            'phone' => $request['phone'],
            'adress' => $request['adress'],
            'country' => $request['country'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'is_admin' => $request->has('is_admin'),
        ]);
    }
}
