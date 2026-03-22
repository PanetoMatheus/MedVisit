<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VisitaRequest extends FormRequest
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
        'data_visita' => 'required|date',
        'horario_visita' => 'required|date_format:H:i',

        'medico_id' => [
            'required',
            'integer',
            Rule::exists('medicos', 'id')->where('ativo', 1),
        ],

        'user_id' => [
            'required',
            'integer',
            Rule::exists('users', 'id')
                ->where('tipo_usuario', 'user')
                ->where('ativo', 1),
        ],

        'observacoes' => 'nullable|string',
        'proximos_passos' => 'nullable|string',

        'avaliacoes' => 'required|array|min:1',

        'avaliacoes.*.produto_id' => [
            'required',
            'integer',
            'distinct',
            Rule::exists('produtos', 'id'),
        ],

        'avaliacoes.*.avaliacao' => 'required|integer|min:0|max:10',
    ];
}
}
