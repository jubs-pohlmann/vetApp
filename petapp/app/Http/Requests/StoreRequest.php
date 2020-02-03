<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Store;

class StoreRequest extends FormRequest
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
          'phone' => 'required|telefone_com_ddd',
          'cnpj' => 'required|cnpj',
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
        'phone.telefone_com_ddd' => 'Insira um numero de telefone valido',
        'cnpj.cnpj' => 'Insira um cnpj valido',
      ];
    }
}
