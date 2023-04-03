<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nempleado' => 'required',
            'password' => 'required'
        ];
    }

    public function getCredentials(){
        $nempleado = $this->get('nempleado');

        if($this->isEmail($nempleado)){
            return [
                'email' => $nempleado,
                'password' => $this->get('password')
            ];
        }
        return $this->only('nempleado', 'password');
    }

    public function isEmail($value){
        $factory = $this->container->make(ValidationFactory::class);

        return !$factory->make(['nempleado' => $value], ['nempleado' => 'email'])->fails();
    }
}
