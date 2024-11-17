<?php

namespace App\Models;

use App\Models\CreativeType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function creativeType()
    {
        return $this->belongsTo(CreativeType::class);
    }
}
