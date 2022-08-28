<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

use Nicolaslopezj\Searchable\SearchableTrait;

class Services extends Model
{
    use HasFactory;
    use Sluggable;
    use SearchableTrait;

    protected $table = 'services';

    protected $searchable = [
        'columns' => [
            'services.title' => 10,
            'services.description' => 10,
            'services.status' => 10,
        ],
    ];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'created_by',
        'updated_by',
        'status',
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
