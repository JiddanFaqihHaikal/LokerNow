<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * Display a listing of jobs for job seekers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::where('status', 'active')
                  ->orderBy('posting_date', 'desc')
                  ->paginate(12);
                  
        return view('search-jobs', compact('jobs'));
    }
    
    /**
     * Display the specified job.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('job-details', compact('job'));
    }
}
