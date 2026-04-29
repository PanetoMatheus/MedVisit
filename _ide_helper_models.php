<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $nome
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ability newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ability newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ability query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ability whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ability whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ability whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ability whereUpdatedAt($value)
 */
	class Ability extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $visitas_id
 * @property int $produto_id
 * @property numeric|null $avaliacao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Produtos\Produto $produto
 * @property-read \App\Models\Visitas|null $visita
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AvaliacaoProduto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AvaliacaoProduto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AvaliacaoProduto query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AvaliacaoProduto whereAvaliacao($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AvaliacaoProduto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AvaliacaoProduto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AvaliacaoProduto whereProdutoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AvaliacaoProduto whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AvaliacaoProduto whereVisitasId($value)
 */
	class AvaliacaoProduto extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nome
 * @property int $ativo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Medico> $medicos
 * @property-read int|null $medicos_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EspecialidadeMedica newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EspecialidadeMedica newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EspecialidadeMedica query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EspecialidadeMedica whereAtivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EspecialidadeMedica whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EspecialidadeMedica whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EspecialidadeMedica whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EspecialidadeMedica whereUpdatedAt($value)
 */
	class EspecialidadeMedica extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nome
 * @property int $especialidade_medica_id
 * @property int $user_id
 * @property int $ativo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Medico_cidade> $Medico_cidades
 * @property-read int|null $medico_cidades_count
 * @property-read \App\Models\EspecialidadeMedica $especialidadeMedica
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Produtos\Produto> $produtos
 * @property-read int|null $produtos_count
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Visitas> $visitas
 * @property-read int|null $visitas_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico whereAtivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico whereEspecialidadeMedicaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico whereUserId($value)
 */
	class Medico extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $cidade
 * @property int $medico_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Medico $medico
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico_cidade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico_cidade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico_cidade query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico_cidade whereCidade($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico_cidade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico_cidade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico_cidade whereMedicoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico_cidade whereUpdatedAt($value)
 */
	class Medico_cidade extends \Eloquent {}
}

namespace App\Models\Produtos{
/**
 * @property int $id
 * @property int $medico_id
 * @property int $produto_id
 * @property int|null $produto_foco
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Medico $medico
 * @property-read \App\Models\Produtos\Produto $produto
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico_produto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico_produto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico_produto query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico_produto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico_produto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico_produto whereMedicoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico_produto whereProdutoFoco($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico_produto whereProdutoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medico_produto whereUpdatedAt($value)
 */
	class Medico_produto extends \Eloquent {}
}

namespace App\Models\Produtos{
/**
 * @property int $id
 * @property string $nome
 * @property int $produto_categoria_id
 * @property int $unidade_medida_produto_id
 * @property numeric $preco
 * @property int $ativo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AvaliacaoProduto> $AvaliacaoProduto
 * @property-read int|null $avaliacao_produto_count
 * @property-read \App\Models\Produtos\Produto_categoria $categoria
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Medico> $medicos
 * @property-read int|null $medicos_count
 * @property-read \App\Models\Produtos\Unidade_medida_produto $unidadeMedida
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereAtivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto wherePreco($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereProdutoCategoriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereUnidadeMedidaProdutoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereUpdatedAt($value)
 */
	class Produto extends \Eloquent {}
}

namespace App\Models\Produtos{
/**
 * @property int $id
 * @property string $nome
 * @property int $ativo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Produtos\Produto> $produtos
 * @property-read int|null $produtos_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto_categoria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto_categoria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto_categoria query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto_categoria whereAtivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto_categoria whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto_categoria whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto_categoria whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto_categoria whereUpdatedAt($value)
 */
	class Produto_categoria extends \Eloquent {}
}

namespace App\Models\Produtos{
/**
 * @property int $id
 * @property string $nome
 * @property string $sigla
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Produtos\Produto> $produtos
 * @property-read int|null $produtos_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unidade_medida_produto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unidade_medida_produto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unidade_medida_produto query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unidade_medida_produto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unidade_medida_produto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unidade_medida_produto whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unidade_medida_produto whereSigla($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unidade_medida_produto whereUpdatedAt($value)
 */
	class Unidade_medida_produto extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $imagem
 * @property string $nome
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $telefone
 * @property string $tipo_usuario
 * @property string $password
 * @property int $ativo
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ability> $abilities
 * @property-read int|null $abilities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Medico> $medico
 * @property-read int|null $medico_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \App\Models\User_Regiao|null $user_regiao
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Visitas> $visitas
 * @property-read int|null $visitas_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAtivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereImagem($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTelefone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTipoUsuario($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $regiao
 * @property int $ativo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User_Regiao newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User_Regiao newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User_Regiao query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User_Regiao whereAtivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User_Regiao whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User_Regiao whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User_Regiao whereRegiao($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User_Regiao whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User_Regiao whereUserId($value)
 */
	class User_Regiao extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $ability_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Ability|null $ability
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User_ability newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User_ability newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User_ability query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User_ability whereAbilityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User_ability whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User_ability whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User_ability whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User_ability whereUserId($value)
 */
	class User_ability extends \Eloquent {}
}

namespace App\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null find($id, $columns = ['*'])
 * @property int $id
 * @property string $data_visita
 * @property string $horario_visita
 * @property int $medico_id
 * @property int $user_id
 * @property string|null $observacoes
 * @property string|null $proximos_passos
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AvaliacaoProduto> $AvaliacaoProduto
 * @property-read int|null $avaliacao_produto_count
 * @property-read \App\Models\Medico $medico
 * @property-read \App\Models\User $representante
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitas newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitas query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitas whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitas whereDataVisita($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitas whereHorarioVisita($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitas whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitas whereMedicoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitas whereObservacoes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitas whereProximosPassos($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitas whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitas whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitas whereUserId($value)
 */
	class Visitas extends \Eloquent {}
}

