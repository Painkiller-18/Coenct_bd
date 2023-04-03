<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class PasswordRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

     private $userPassword;

    public function __construct($userPassword)
    {
        $this->userPassword = $userPassword;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Hash::check($value, $this->userPassword);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Usuario o contraseña incorrectos.';
    }
}
