<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
 use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
   

public function rules(): array
{
    // Pegamos o ID do usuário da rota. 
    // Se sua rota for /users/{user}, o Laravel injeta o objeto ou o ID aqui.
    $userId = $this->route('user'); 

    return [
        'nome' => ['required', 'string', 'max:255'],
        
        // A mágica acontece aqui:
        'email' => [
            'required', 
            'string', 
            'email', 
            'max:255', 
            Rule::unique('users')->ignore($userId)
        ],
        
        'telefone' => ['required', 'string', 'max:20'],
        'regiao' => ['required', 'string', 'max:255'],
        'ativo' => ['nullable', 'boolean'],
        'tipo_usuario' => ['nullable', 'string', 'in:admin,user']
    ];
}
}
