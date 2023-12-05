<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\ServiceProvider;
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
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),  
            'phone' => ['required'],          
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();   
        
        $registeras = $input['registeras'] === 'SVP' ? 'SVP':'CST';

        $user =  User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),  
            'phone' => $input['phone'],
            'utype'=>$registeras
        ]);

        if($registeras === 'SVP')
        {
            ServiceProvider::create([
                'user_id' => $user->id
            ]);
        }

        return $user;
    }
}
