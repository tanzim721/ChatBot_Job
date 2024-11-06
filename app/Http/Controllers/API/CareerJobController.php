<?php

namespace App\Http\Controllers\API;

use App\Models\CareerJob;
use Illuminate\Http\Request;
use App\Services\CareerJobService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCareerJobRequest;

class CareerJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conn = DB::connection('ecommerce');
        $jobs = $conn->table('career_jobs')->get();
        return $jobs;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCareerJobRequest $request, CareerJobService $job)
    {
        $job->store($request->validated());
        return redirect()->with('success', 'Job created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
