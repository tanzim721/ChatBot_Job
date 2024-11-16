<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creative extends Model
{
    use HasFactory;

    protected $fillable = [
        'creative_type_id',
        'image',
        'video',
        'content',
        'cta_name',
        'cta_url',
        'creative_name',
    ];
}
