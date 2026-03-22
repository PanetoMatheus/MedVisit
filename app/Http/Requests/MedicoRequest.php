<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\EspecialidadeMedica;
use Illuminate\Validation\Rule;

class MedicoRequest extends FormRequest
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
        return [
    "nome" => "required|string|max:255",

    "especialidade_medica_id" => ["required","integer","exists:especialidade_medicas,id",function ($attribute, $value, $fail) {
            if (!EspecialidadeMedica::where('id', $value)->where('ativo', true)->exists()) {
                $fail('Especialidade médica não encontrada.');
            }
        }
    ],

    "cidades" => "required|array",
    "cidades.*" => "string|max:255",

    "representante_id" => ["required", "integer", Rule::exists('users', 'id')->where('tipo_usuario', 'user')->where('ativo', true)], "status" => "nullable|boolean",

'produtos' => ['required', 'array'],'produtos.*' => ['required','integer',Rule::exists('produtos', 'id')->where('ativo', true),],
];
}
}
