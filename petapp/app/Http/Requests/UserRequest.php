<?php

namespace App\Http\Requests;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\User;

class UserRequest extends FormRequest
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
      if($this->isMethod('post')){
        return [
            'name' => 'required|alpha',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|numeric|digits:5',
            'birthdate' => 'required|data',
            'phone' => 'required|telefone_com_ddd',
            'cpf' => 'required|cpf',
            'photo' => 'required|string',
            'address' => 'required|string',
        ];
      }
    }

    protected function failedValidation(Validator $validator){
      throw new
      HttpResponseException(response()->json($validator->errors(), 422));
    }

    public function messages(){
      return[
        'name.alpha' => 'O nome deve consistir apenas de caracteres alfabeticos.',
        'email.email' => 'Insira um email valido',
        'password.integer' => 'A senha deve conter somente numeros',
        'birthdate.data' => 'Insira uma data valida',
        'phone.telefone_com_ddd' => 'Insira um numero de telefone valido',
        'cpf.cpf' => 'Insira um cpf valido',
      ];
    }
}
