<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'meta_title',
        'image',
        'meta_description',
        'meta_keyword',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
