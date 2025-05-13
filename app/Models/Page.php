<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    protected $casts = [
        'content' => 'array',
    ];

    protected $fillable = [
        'title',
        'slug',
        'content',
        'is_home_page',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'user_id',
        'website_id'
    ];

}
