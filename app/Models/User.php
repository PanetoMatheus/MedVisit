<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApitokens;

class User extends Authenticatable
{
       use HasFactory, Notifiable, HasApitokens;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
   protected $fillable = [
    'image',
    'nome',
    'email',
    'telefone',
    'password',
    'tipo_usuario',
    'ativo'
];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

  public function medico()
    {
        return $this->hasMany(Medico::class, 'user_id');

    }

   public function abilities()
{
    return $this->belongsToMany(Ability::class, 'user_abilities');
}

public function visitas()
{
    return $this->hasMany(Visitas::class, 'representante_id');
}
}
