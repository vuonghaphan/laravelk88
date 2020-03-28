<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'sku',
        'name',
        'price',
        'quantity',
        'img',
        'detail',
        'description',
        'featured',
    ];
    //fillable : khi viết lệnh Products::create($r->all()) bên productsController@store
    // thì dữ liệu sẽ được thêm vào những cột trong fillable : goi la create số lượng lớn (: a tùng ăn lol)

    // protected $guarded = ['id'];
    //guarded: lúc Products::create($r->all()); thì cột id ko được thêm vào (ngược lại fillable)  (: a tùng ăn lol)

}
