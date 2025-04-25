{{-- resources/views/messages/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="px-6 py-8 bg-gray-900 text-white min-h-screen">
    <div class="flex items-center justify-between mb-6">
        <div>
            <a href="{{ route('messages.index') }}" class="text-gray-300 hover:text-white transition duration-200 inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Back to Messages
            </a>
            <h1 class="text-2xl font-bold text-white mt-2">New Message</h1>
        </div>
    </div>
    
    @if(session('error'))
    <div class="bg-red-900 border-l-4 border-red-500 text-red-300 p-4 mb-6" role="alert">
        <p>{{ session('error') }}</p>
    </div>
    @endif
    
    <div class="bg-gray-800 rounded-xl shadow-md border border-gray-700 overflow-hidden">
        <div class="p-6">
            <form action="{{ route('messages.store') }}" method="POST">
                @csrf
                
                <!-- Recipient Selection -->
                <div class="mb-4">
                    <label for="recipient_id" class="block text-sm font-medium text-gray-300 mb-1">Recipient Company</label>
                    <select id="recipient_id" name="recipient_id" required
                        class="w-full px-4 py-2 bg-white border border-gray-300 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B9FF66]">
                        <option value="">Select a company</option>
                        
                        @if(isset($recipient))
                            <option value="{{ $recipient->id }}" selected>
                                {{ $recipient->companyProfile ? $recipient->companyProfile->name : $recipient->name }}
                            </option>
                        @else
                            @if(auth()->user()->role === 'jobseeker')
                                @php
                                    // Get companies the jobseeker has applied to
                                    $appliedJobs = \App\Models\JobApplication::where('user_id', auth()->id())->pluck('job_id');
                                    $employers = \App\Models\Job::whereIn('id_job', $appliedJobs)
                                        ->pluck('id_admin')
                                        ->unique();
                                    $companies = \App\Models\User::whereIn('id', $employers)
                                        ->with('companyProfile')
                                        ->get();
                                @endphp
                                
                                @if($companies->count() > 0)
                                    @foreach($companies as $employer)
                                        <option value="{{ $employer->id }}">
                                            {{ $employer->companyProfile ? $employer->companyProfile->name : $employer->name }} (Company)
                                        </option>
                                    @endforeach
                                @else
                                    <option value="" disabled>You haven't applied to any jobs yet</option>
                                @endif
                            @else
                                @foreach(\App\Models\JobApplication::where('job_id', function($query) {
                                    $query->select('id_job')->from('jobs')->where('id_admin', auth()->id());
                                })->pluck('user_id')->unique() as $applicantId)
                                    @php
                                        $jobseeker = \App\Models\User::find($applicantId);
                                    @endphp
                                    @if($jobseeker)
                                        <option value="{{ $jobseeker->id }}">{{ $jobseeker->name }} (Applicant)</option>
                                    @endif
                                @endforeach
                            @endif
                        @endif
                    </select>
                    @error('recipient_id')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Related Job (if applicable) -->
                <div class="mb-4">
                    <label for="job_id" class="block text-sm font-medium text-gray-300 mb-1">Related Job (Optional)</label>
                    <select id="job_id" name="job_id" 
                        class="w-full px-4 py-2 bg-white border border-gray-300 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B9FF66]">
                        <option value="">None</option>
                        
                        @if(isset($job))
                            <option value="{{ $job->id_job }}" selected>{{ $job->title }}</option>
                        @else
                            @if(auth()->user()->role === 'jobseeker')
                                @php
                                    // Get jobs the jobseeker has applied to
                                    $appliedJobIds = \App\Models\JobApplication::where('user_id', auth()->id())->pluck('job_id');
                                    $appliedJobs = \App\Models\Job::whereIn('id_job', $appliedJobIds)->get();
                                @endphp
                                
                                @if($appliedJobs->count() > 0)
                                    @foreach($appliedJobs as $job)
                                        <option value="{{ $job->id_job }}">{{ $job->title }} - {{ $job->company }}</option>
                                    @endforeach
                                @else
                                    <option value="" disabled>You haven't applied to any jobs yet</option>
                                @endif
                            @else
                                @foreach(\App\Models\Job::where('id_admin', auth()->id())->get() as $job)
                                    <option value="{{ $job->id_job }}">{{ $job->title }}</option>
                                @endforeach
                            @endif
                        @endif
                    </select>
                    @error('job_id')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Subject -->
                <div class="mb-4">
                    <label for="subject" class="block text-sm font-medium text-gray-300 mb-1">Subject</label>
                    <input type="text" id="subject" name="subject" required
                        class="w-full px-4 py-2 bg-white border border-gray-300 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B9FF66]">
                    @error('subject')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Message -->
                <div class="mb-4">
                    <label for="message" class="block text-sm font-medium text-gray-300 mb-1">Message</label>
                    <textarea id="message" name="message" rows="5" required
                        class="w-full px-4 py-2 bg-white border border-gray-300 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B9FF66]"></textarea>
                    @error('message')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" class="bg-[#B9FF66] hover:bg-[#a7e55c] text-gray-900 font-medium py-2 px-6 rounded-lg transition duration-200">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
