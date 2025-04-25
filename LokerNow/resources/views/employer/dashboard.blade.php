{{-- resources/views/employer/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="px-6 py-8 bg-gray-900 text-white min-h-screen">
    <h1 class="text-2xl font-bold text-white mb-6">Employer Dashboard</h1>
    
    <!-- Main Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-gray-800 rounded-xl p-4 shadow-md border border-gray-700">
            <h2 class="text-sm text-gray-400 mb-1">Active Jobs</h2>
            <p class="text-2xl font-bold text-white">{{ $activeJobs ?? 0 }}</p>
        </div>
        
        <div class="bg-gray-800 rounded-xl p-4 shadow-md border border-gray-700">
            <h2 class="text-sm text-gray-400 mb-1">Total Applications</h2>
            <p class="text-2xl font-bold text-white">{{ $totalApplications ?? 0 }}</p>
        </div>
        
        <div class="bg-gray-800 rounded-xl p-4 shadow-md border border-gray-700">
            <h2 class="text-sm text-gray-400 mb-1">New Applications</h2>
            <p class="text-2xl font-bold text-white">{{ $newApplications ?? 0 }}</p>
        </div>
        
        <div class="bg-gray-800 rounded-xl p-4 shadow-md border border-gray-700">
            <h2 class="text-sm text-gray-400 mb-1">Profile Views</h2>
            <p class="text-2xl font-bold text-white">{{ $profileViews ?? 0 }}</p>
        </div>
    </div>
    
    <!-- Employer Action Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
        <!-- Post Job Card removed as requested -->
        
        <!-- Manage Jobs Card -->
        <a href="{{ route('employer.jobs.index') }}" class="block">
            <div class="bg-[#B9FF66] rounded-2xl p-4 relative h-[160px] border border-gray-900">
                <div class="bg-white inline-block px-2 py-1 rounded-md text-sm font-medium text-gray-900">
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
        <a href="{{ route('employer.applications.index') }}" class="block">
            <div class="bg-[#B9FF66] rounded-2xl p-4 relative h-[160px] border border-gray-900">
                <div class="bg-white inline-block px-2 py-1 rounded-md text-sm font-medium text-gray-900">
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
        
        <!-- Company Reviews Card -->
        <a href="{{ route('employer.reviews.index') }}" class="block">
            <div class="bg-[#B9FF66] rounded-2xl p-4 relative h-[160px] border border-gray-900">
                <div class="bg-white inline-block px-2 py-1 rounded-md text-sm font-medium text-gray-900">
                    Company Reviews
                </div>
                <div class="mt-2 text-xs text-gray-800">View ratings and feedback from job seekers</div>
                
                <div class="absolute bottom-4 left-4">
                    <div class="bg-black rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                </div>
            </div>
        </a>
        
        <!-- Analytics Dashboard Card -->
        <a href="{{ route('employer.analytics') }}" class="block">
            <div class="bg-[#B9FF66] rounded-2xl p-4 relative h-[160px] border border-gray-900">
                <div class="bg-white inline-block px-2 py-1 rounded-md text-sm font-medium text-gray-900">
                    Analytics Dashboard
                </div>
                <div class="mt-2 text-xs text-gray-800">View recruitment insights and metrics</div>
                
                <div class="absolute bottom-4 left-4">
                    <div class="bg-black rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                        </svg>
                    </div>
                </div>
            </div>
        </a>
        
        <!-- Subscription Management Card -->
        <a href="{{ route('employer.subscription') }}" class="block">
            <div class="bg-[#B9FF66] rounded-2xl p-4 relative h-[160px] border border-gray-900">
                <div class="bg-white inline-block px-2 py-1 rounded-md text-sm font-medium text-gray-900">
                    Subscription
                </div>
                <div class="mt-2 text-xs text-gray-800">Manage your plan and billing</div>
                
                <div class="absolute bottom-4 left-4">
                    <div class="bg-black rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </a>
        
        <!-- Company Profile Card -->
        <a href="{{ route('employer.profile.edit') }}" class="block">
            <div class="bg-[#B9FF66] rounded-2xl p-4 relative h-[160px] border border-gray-900">
                <div class="bg-white inline-block px-2 py-1 rounded-md text-sm font-medium text-gray-900">
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
        
        <!-- Browse Candidates Card -->
        <a href="{{ route('employer.candidates.index') }}" class="block">
            <div class="bg-[#B9FF66] rounded-2xl p-4 relative h-[160px] border border-gray-900">
                <div class="bg-white inline-block px-2 py-1 rounded-md text-sm font-medium text-gray-900">
                    Browse Candidates
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
    <div class="bg-gray-800 rounded-xl p-6 shadow-md border border-gray-700 mb-8">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold text-white">Recent Applications</h2>
            <a href="{{ route('employer.applications.index') }}" class="text-[#B9FF66] text-sm font-medium hover:underline">View All</a>
        </div>
        
        @if(isset($recentApplications) && count($recentApplications) > 0)
            <div class="space-y-4">
                @foreach($recentApplications as $application)
                    <div class="flex items-start border-b border-gray-700 pb-4">
                        <div class="bg-gray-700 rounded-full p-2 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-white">{{ $application->user->name ?? 'Applicant' }}</h3>
                            <p class="text-xs text-gray-400">Applied for {{ $application->job->title ?? 'Job' }}</p>
                            <div class="flex items-center mt-1">
                                <span class="px-2 py-0.5 bg-gray-700 text-gray-300 text-xs rounded-full">
                                    {{ ucfirst($application->status) }}
                                </span>
                                <span class="text-xs text-gray-400 ml-2">
                                    {{ $application->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                        <a href="{{ route('employer.applications.show', $application->id) }}" class="ml-auto text-sm text-[#B9FF66] hover:text-[#a7e55c]">
                            View
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-400 text-center py-4">No recent applications.</p>
        @endif
    </div>
    
    <!-- Company Reviews Widget -->
    <div class="bg-gray-800 rounded-xl shadow-md border border-gray-700 overflow-hidden">
        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-white">Company Reviews</h2>
                <a href="{{ route('employer.reviews.index') }}" class="text-[#B9FF66] text-sm font-medium hover:underline">View All</a>
            </div>
            
            @if(isset($averageRating) && isset($totalReviews) && isset($recentReviews))
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Overall Rating Stats -->
                <div class="bg-gray-700 rounded-lg p-4 md:w-1/3">
                    <div class="text-center mb-3">
                        <span class="block text-sm text-gray-400 mb-1">Average Rating</span>
                        <div class="flex justify-center mb-1">
                            @php
                                $fullStars = floor($averageRating);
                                $halfStar = $averageRating - $fullStars > 0.3 && $averageRating - $fullStars < 0.8;
                                $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                            @endphp
                            
                            @for($i = 0; $i < $fullStars; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#B9FF66]" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endfor
                            
                            @if($halfStar)
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#B9FF66]" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endif
                            
                            @for($i = 0; $i < $emptyStars; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endfor
                        </div>
                        <div class="text-xl font-bold text-white">{{ number_format($averageRating, 1) }} / 5.0</div>
                        <p class="text-xs text-gray-400 mt-1">Based on {{ $totalReviews }} reviews</p>
                    </div>
                </div>
                
                <!-- Recent Reviews -->
                <div class="md:w-2/3">
                    @if(count($recentReviews) > 0)
                        <div class="space-y-4">
                            @foreach($recentReviews as $review)
                                <div class="border-b border-gray-700 pb-4 last:border-0 last:pb-0">
                                    <div class="flex justify-between items-start mb-2">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 rounded-full bg-gray-600 flex items-center justify-center text-xs font-medium text-white mr-2">
                                                @if($review->anonymous)
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                    </svg>
                                                @else
                                                    {{ substr($review->user->name, 0, 1) }}
                                                @endif
                                            </div>
                                            <div>
                                                <span class="text-sm font-medium text-white">
                                                    @if($review->anonymous)
                                                        Anonymous User
                                                    @else
                                                        {{ $review->user->name }}
                                                    @endif
                                                </span>
                                                @if($review->job_title)
                                                    <p class="text-xs text-gray-400">{{ $review->job_title }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 {{ $i <= $review->rating ? 'text-[#B9FF66]' : 'text-gray-500' }}" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="text-gray-300 text-sm">{{ Str::limit($review->content, 150) }}</p>
                                    <div class="text-xs text-gray-400 mt-1 text-right">{{ $review->created_at->format('M d, Y') }}</div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="flex flex-col items-center justify-center py-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-500 mb-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <p class="text-gray-400 text-sm">No reviews yet</p>
                        </div>
                    @endif
                </div>
            </div>
            @else
            <div class="text-center py-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-500 mx-auto mb-2" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <p class="text-gray-300 text-lg mb-2">No reviews yet</p>
                <p class="text-gray-400 mb-4">Your company doesn't have any reviews yet</p>
                <a href="{{ route('employer.reviews.index') }}" class="inline-flex items-center px-4 py-2 bg-[#B9FF66] hover:bg-[#a8eb55] text-gray-900 font-medium rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                    </svg>
                    View Company Reviews
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
