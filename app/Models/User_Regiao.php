<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class User_Regiao extends Model
{
    protected $table = 'user_regiao';

    protected $fillable = [
        'id',
        'user_id',
        'regiao',
        'ativo',
       
    ];
    protected $hidden = [
         'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
