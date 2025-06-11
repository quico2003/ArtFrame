<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "art_works";

    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'description',
        'image',
        'year',
    ];
}
