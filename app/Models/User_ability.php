<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_ability extends Model
{
    protected $fillable = [
        'user_id',
        'ability_id',

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ability()
    {
        return $this->belongsTo(Ability::class);
    }
}

