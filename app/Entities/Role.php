<?php

namespace App\entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id'];
    public function users(){
        return $this->belongsToMany(User::class, 'user_role');
    }
}
