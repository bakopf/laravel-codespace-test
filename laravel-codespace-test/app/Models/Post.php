<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'publish_date',
        'headline',
        'text',
        'category',
        'keywords',
        'filename',
        'filepath',
        'upload_date',
        'image_width',
        'image_height',
    ];
    
}
