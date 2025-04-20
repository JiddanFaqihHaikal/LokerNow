{{-- resources/views/employer/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="px-6 py-8">
    <h1 class="text-2xl font-bold mb-6">Employer Dashboard</h1>
    
    <!-- Main Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-200">
            <h2 class="text-sm text-gray-500 mb-1">Active Jobs</h2>
            <p class="text-2xl font-bold">{{ $activeJobs ?? 0 }}</p>
        </div>
        
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-200">
            <h2 class="text-sm text-gray-500 mb-1">Total Applications</h2>
            <p class="text-2xl font-bold">{{ $totalApplications ?? 0 }}</p>
        </div>
        
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-200">
            <h2 class="text-sm text-gray-500 mb-1">New Applications</h2>
            <p class="text-2xl font-bold">{{ $newApplications ?? 0 }}</p>
        </div>
        
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-200">
            <h2 class="text-sm text-gray-500 mb-1">Profile Views</h2>
            <p class="text-2xl font-bold">{{ $profileViews ?? 0 }}</p>
        </div>
    </div>
    
    <!-- Employer Action Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Manage Jobs Card -->
        <a href="{{ route('employer.jobs') ?? '#' }}" class="block">
            <div class="bg-[#B9FF66] rounded-2xl p-4 relative h-[160px] border border-gray-900">
                <div class="bg-white inline-block px-2 py-1 rounded-md text-sm font-medium">
                    Manage Jobs
                </div>
                
                <div class="absolute bottom-4 left-4">
                    <div class="bg-black rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </a>
        
        <!-- View Applications Card -->
        <a href="{{ route('employer.applications') ?? '#' }}" class="block">
            <div class="bg-[#B9FF66] rounded-2xl p-4 relative h-[160px] border border-gray-900">
                <div class="bg-white inline-block px-2 py-1 rounded-md text-sm font-medium">
                    View Applications
                </div>
                
                <div class="absolute bottom-4 left-4">
                    <div class="bg-black rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </a>
        
        <!-- Company Profile Card -->
        <a href="{{ route('company-profiles.edit') ?? '#' }}" class="block">
            <div class="bg-[#B9FF66] rounded-2xl p-4 relative h-[160px] border border-gray-900">
                <div class="bg-white inline-block px-2 py-1 rounded-md text-sm font-medium">
                    Company Profile
                </div>
                
                <div class="absolute bottom-4 left-4">
                    <div class="bg-black rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </a>
    </div>
    
    <!-- Recent Applications -->
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold">Recent Applications</h2>
            <a href="#" class="text-[#B9FF66] text-sm font-medium hover:underline">View All</a>
        </div>
        
        @if(isset($recentApplications) && count($recentApplications) > 0)
            <div class="space-y-4">
                @foreach($recentApplications as $application)
                    <div class="flex items-start border-b border-gray-100 pb-4">
                        <div class="bg-gray-100 rounded-full p-2 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium">{{ $application->user_name ?? 'Applicant' }} applied for {{ $application->job_title ?? 'Job Position' }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $application->created_at ?? 'Recently' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 text-sm">No recent applications to display.</p>
        @endif
    </div>
</div>
@endsection
