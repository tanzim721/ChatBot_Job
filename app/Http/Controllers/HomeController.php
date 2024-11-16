<?php

namespace App\Http\Controllers;

use App\Models\CareerJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function job()
    {
        // $conn = DB::connection('ecommerce');
        // $datas = $conn->table('career_jobs')->get();
        // dd($datas);
        $datas = CareerJob::latest()->paginate(5);
        return view('frontend.jobs.view', compact('datas'));
    }
    public function details($id)
    {
        // $conn = DB::connection('ecommerce');
        // $job = $conn->table('career_jobs')->where('id', $id)->first();
        // dd($data);
        $job = CareerJob::find($id);
        return view('frontend.jobs.details', compact('job'));
    }
}
