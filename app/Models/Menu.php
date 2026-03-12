<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'desc',
        'path',
        "price",
        "is_best"
    ];
    
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
    
}
