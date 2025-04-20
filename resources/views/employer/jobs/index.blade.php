{{-- resources/views/employer/jobs/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="px-6 py-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Manage Your Jobs</h1>
        <a href="#" class="bg-[#B9FF66] hover:bg-[#a7e55c] px-4 py-2 rounded-lg text-sm font-medium shadow-sm transition duration-200">
            Post New Job
        </a>
    </div>
    
    <!-- Search and Filter -->
    <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-200 mb-6">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-grow">
                <input type="text" placeholder="Search jobs..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B9FF66]">
            </div>
            <div class="flex gap-2">
                <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B9FF66]">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="closed">Closed</option>
                    <option value="draft">Draft</option>
                </select>
                <button class="bg-gray-800 text-white px-4 py-2 rounded-lg">Filter</button>
            </div>
        </div>
    </div>
    
    <!-- Job Listings -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Job Card 1 -->
        <div class="bg-gray-100 rounded-2xl p-4 relative shadow-sm border border-gray-900 h-[160px]">
            <div class="absolute top-2 right-2">
                <button class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </button>
            </div>
            
            <h2 class="inline-block bg-white text-black text-sm font-medium px-2 py-1 rounded-md mb-1">
                Frontend Developer
            </h2>
            <p class="text-xs font-medium mb-6">Full-time</p>
            
            <div class="absolute bottom-4 left-4 flex items-center text-xs text-gray-600">
                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium mr-2">Active</span>
                <span>12 applications</span>
            </div>
            
            <a href="#" class="absolute bottom-4 right-4 text-xs font-medium text-blue-600 hover:underline">
                Edit
            </a>
        </div>
        
        <!-- Job Card 2 -->
        <div class="bg-gray-100 rounded-2xl p-4 relative shadow-sm border border-gray-900 h-[160px]">
            <div class="absolute top-2 right-2">
                <button class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </button>
            </div>
            
            <h2 class="inline-block bg-white text-black text-sm font-medium px-2 py-1 rounded-md mb-1">
                UX Designer
            </h2>
            <p class="text-xs font-medium mb-6">Contract</p>
            
            <div class="absolute bottom-4 left-4 flex items-center text-xs text-gray-600">
                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs font-medium mr-2">Draft</span>
                <span>0 applications</span>
            </div>
            
            <a href="#" class="absolute bottom-4 right-4 text-xs font-medium text-blue-600 hover:underline">
                Edit
            </a>
        </div>
        
        <!-- Job Card 3 -->
        <div class="bg-gray-100 rounded-2xl p-4 relative shadow-sm border border-gray-900 h-[160px]">
            <div class="absolute top-2 right-2">
                <button class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </button>
            </div>
            
            <h2 class="inline-block bg-white text-black text-sm font-medium px-2 py-1 rounded-md mb-1">
                Backend Developer
            </h2>
            <p class="text-xs font-medium mb-6">Full-time</p>
            
            <div class="absolute bottom-4 left-4 flex items-center text-xs text-gray-600">
                <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-medium mr-2">Closed</span>
                <span>8 applications</span>
            </div>
            
            <a href="#" class="absolute bottom-4 right-4 text-xs font-medium text-blue-600 hover:underline">
                Edit
            </a>
        </div>
        
        <!-- Add New Job Card -->
        <a href="#" class="block">
            <div class="bg-white rounded-2xl p-4 relative shadow-sm border border-dashed border-gray-300 h-[160px] flex items-center justify-center">
                <div class="text-center">
                    <div class="mx-auto bg-gray-100 rounded-full p-3 w-12 h-12 flex items-center justify-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <p class="text-sm font-medium text-gray-600">Post New Job</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
