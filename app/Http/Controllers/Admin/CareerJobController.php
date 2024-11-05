<?php

namespace App\Http\Controllers\Admin;

use App\Models\CareerJob;
use Illuminate\Http\Request;
use App\Services\CareerJobService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCareerJobRequest;

class CareerJobController extends Controller
{
    public function create()
    {
        $conn = DB::connection('ecommerce');
        $jobs = $conn->table('career_jobs')->get();
        // $jobs = CareerJob::orderBy('title')->get();
        return view('admin.jobs.create', compact('jobs'));
    }
    public function store(StoreCareerJobRequest $request, CareerJobService $job)
    {
        $job->store($request->validated());
        return redirect()->with('success', 'Job created');
    }
}
