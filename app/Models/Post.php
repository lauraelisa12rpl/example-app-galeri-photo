<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';

    protected $fillable = [
        'id',
        'title',
        'description',
        'category',
        'slug',
        'user_id'
    ];

    //membuat setting atribut title
    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
    }
}
