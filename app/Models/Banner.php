<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banner';
    
    protected $fillable = [
        'image',
        'title',
        'description',
        'link',
        'created_by' ,
        'updated_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'created_by' , 'id');
    }
    

}
