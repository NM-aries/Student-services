<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

use Nicolaslopezj\Searchable\SearchableTrait;

class Announcement extends Model
{
    use HasFactory;
    use Sluggable;
    use SearchableTrait;

    protected $table = 'announcement';

    protected $searchable = [
        'columns' => [
            'announcement.title' => 10,
            'announcement.description' => 10,
            'announcement.status' => 10,
        ],
    ];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'coverimage',
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
