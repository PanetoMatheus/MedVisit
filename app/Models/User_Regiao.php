<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class User_Regiao extends Model
{
    protected $table = 'user_regiao';

    protected $fillable = [
        'user_id',
        'regiao',
        'ativo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
