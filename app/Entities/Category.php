<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = ['id'];

    public function products(){
        return $this->hasMany(Product::class,'category_id','id');
    }
}
