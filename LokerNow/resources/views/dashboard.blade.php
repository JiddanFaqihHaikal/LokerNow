{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="px-6 py-8">
    <h1 class="text-2xl font-bold mb-6">Welcome User</h1>
    
    <!-- Main Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-lg">
        <!-- Saved Jobs Card -->
        <a href="/saved-jobs" class="block">
            <div class="bg-[#B9FF66] rounded-2xl p-4 relative w-[160px] h-[160px]">
                <div class="bg-white inline-block px-2 py-1 rounded-md text-sm font-medium">
                    Saved Jobs
                </div>
                
                <div class="absolute bottom-6 left-6">
                    <div class="bg-black rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </a>
        
        <!-- Job Application Status Card -->
        <a href="/application-status" class="block">
            <div class="bg-[#B9FF66] rounded-2xl p-4 relative w-[160px] h-[160px]">
                <div class="bg-white inline-block px-2 py-1 rounded-md text-sm font-medium">
                    Job Application Status
                </div>
                
                <div class="absolute bottom-6 left-6">
                    <div class="bg-black rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
