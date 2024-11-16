<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'employment_type',
        'company_name',
        'role',
        'apply_url',
        'company_logo',
        'description',
        'salary',
    ];
}
