<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.jobs.view', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jobs.create');
    }
    public function store(StoreCareerJobRequest $request, CareerJobService $job)
    {
        // dd( $request->validated());
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
