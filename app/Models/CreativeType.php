<?php

namespace App\Models;

use App\Models\Creative;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CreativeType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function creatives()
    {
        return $this->hasMany(Creative::class);
    }

}
