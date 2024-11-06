<?php

namespace App\Services;

use App\Models\CareerJob;

class CareerJobService
{
    public function store(array $data)
    {
        CareerJob::create($data);
    }
}
