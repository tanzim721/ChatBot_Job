<?php

namespace App\Http\Controllers\Admin;

use App\Models\CareerJob;
use Illuminate\Http\Request;
use App\Enums\EmploymentType;
use Illuminate\Validation\Rule;
use App\Services\CareerJobService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreCareerJobRequest;

class CareerJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $conn = DB::connection('ecommerce');
        // $jobs = $conn->table('career_jobs')->get();
        $jobs = CareerJob::latest()->paginate(5);
        return view('admin.jobs.view', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jobs.create');
    }
    // public function store(StoreCareerJobRequest $request)
    public function store(Request $request)
    {
        // dd( $request->all());
        // $job->store($request->validated());
        Validator::make($request->all(), [
            'title' => 'required|max:60',
            'employment_type' => ['required', Rule::enum(EmploymentType::class)],
            'company_name' => 'required|string|max:40',
            'role' => 'required|string|max:100',
            'apply_url' => 'required|url|max:255',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
            // 'company_logo' => 'required|url|max:255',
            'description' => 'required',
            'salary' => 'required|max:20'
        ]);

        $careerJob = new CareerJob();
        $careerJob->title = $request->title;
        $careerJob->employment_type = $request->employment_type;
        $careerJob->company_name = $request->company_name;
        $careerJob->role = $request->role;
        $careerJob->apply_url = $request->apply_url;
        if ($request->hasFile('company_logo')) {
            $file = $request->file('company_logo');
            $imageName = strtotime('now') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $imageName);
            $careerJob->company_logo = $imageName;
            // dd($imageName);
        }
        $careerJob->description = $request->description;
        $careerJob->salary = $request->salary;
        // dd($careerJob);
        $careerJob->save();

        // CareerJob::create($request->validated());
        return to_route('admin.job.index');
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
