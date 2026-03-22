<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class ProdutoRequest extends FormRequest
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
            'nome'=> 'required|string|max:255',
            'produto_categoria_id' => 'required|integer',Rule::exists('produto_categorias', 'id')->where('ativo', true),
            'unidade_medida_produto_id'=>'required|integer',Rule::exists('unidade_medida_produtos', 'id')->where('ativo', true),
            'preco'=>'required|numeric|min:0',
            'ativo'=>'nullable|boolean'
        ];
    }
}
