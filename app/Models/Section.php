<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use SoftDeletes;

    protected $casts = [
        'content' => 'array',
    ];

    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];
      
}
