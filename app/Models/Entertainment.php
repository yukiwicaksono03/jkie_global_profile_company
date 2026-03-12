<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entertainment extends Model
{
    use HasFactory;
     protected $fillable = [
         'title',
         'desc',
         'path_1',
         'path_2',
         'path_3',
         'price_weekend',
         'price_weekday',
    ];
}
