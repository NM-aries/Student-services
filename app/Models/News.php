<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;
    use Sluggable;
    
    use SearchableTrait;

    protected $table = 'news';

    protected $searchable = [
        'columns' => [
            'news.title' => 10,
            'news.description' => 10,
            'news.status' => 10,
        ],
    ];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'coverimage',
        'created_by',
        'updated_by',
        'visit_count',
        'status',

        // 'meta_title',
        // 'meta_description',
        // 'meta_keyword',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
    
    public function sluggable(): array
    {
        return[
            'slug' => ['source' => 'title']
        ];
    }
}
