@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-10">
    <a href="{{ route('search.jobs') }}" class="inline-flex items-center text-gray-600 mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back to job listings
    </a>

    <div class="bg-[#B9FF66] rounded-2xl p-6 mb-8 relative">
        <div class="flex justify-between">
            <div class="flex items-center gap-4">
                <div class="bg-white p-2 rounded-lg h-16 w-16 flex items-center justify-center">
                    <span class="font-bold text-lg">{{ strtoupper(substr($job->company, 0, 2)) }}</span>
                </div>
                <div>
                    <h1 class="text-2xl font-bold">{{ $job->title }}</h1>
                    <p class="text-sm font-medium">{{ $job->company }}</p>
                </div>
            </div>
            <button class="text-gray-700 hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="mt-6 flex flex-wrap gap-4">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>{{ $job->location }}</span>
            </div>
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span>{{ $job->position_type }}</span>
            </div>
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ $job->job_type }}</span>
            </div>
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>${{ number_format($job->salary, 2) }}</span>
            </div>
        </div>

        <div class="mt-6 flex gap-4">
            <a href="#" class="bg-white text-black font-medium py-2 px-6 rounded-full">Save</a>
            <form action="{{ route('jobs.apply', $job->id_job) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-black text-white font-medium py-2 px-6 rounded-full">Easy Apply</button>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 mb-8 shadow">
        <h2 class="text-xl font-bold mb-4">Job Description</h2>
        <div class="prose max-w-none">
            {!! nl2br(e($job->description)) !!}
        </div>
        
        <div class="flex items-center justify-between border-t border-gray-200 pt-4 mt-6">
            <div>
                <p class="text-sm text-gray-500">Posted on: 
                    @if($job->posting_date && !is_string($job->posting_date))
                        {{ $job->posting_date->format('M d, Y') }}
                    @else
                        {{ $job->posting_date ?? 'N/A' }}
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
