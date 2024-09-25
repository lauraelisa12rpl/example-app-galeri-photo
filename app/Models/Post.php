<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'description',
        'category',
        'user_id',
        'slug'
    ];

    //membuat setting atribut title
    public function setTitleAttribute($value){
        $this->attribuets['title'] = $value;
    }
}
