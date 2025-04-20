<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\JobApplication;

class DashboardController extends Controller
{
    /**
     * Display the employer dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $companyId = $user->company_profile_id;
        
        // Get counts for dashboard stats
        $activeJobs = Job::where('company_profile_id', $companyId)
                        ->where('status', 'active')
                        ->count();
        
        $totalApplications = JobApplication::whereHas('job', function($query) use ($companyId) {
                                $query->where('company_profile_id', $companyId);
                            })->count();
        
        $newApplications = JobApplication::whereHas('job', function($query) use ($companyId) {
                                $query->where('company_profile_id', $companyId);
                            })
                            ->where('status', 'pending')
                            ->count();
        
        $profileViews = 0; // This would typically come from an analytics service
        
        // Get recent applications
        $recentApplications = JobApplication::whereHas('job', function($query) use ($companyId) {
                                $query->where('company_profile_id', $companyId);
                            })
                            ->latest()
                            ->take(5)
                            ->get();
        
        return view('employer.dashboard', compact(
            'activeJobs', 
            'totalApplications', 
            'newApplications', 
            'profileViews',
            'recentApplications'
        ));
    }
}
