{{-- resources/views/messages/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="px-6 py-8 bg-gray-900 text-white min-h-screen">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-white">Messages</h1>
        <a href="{{ route('messages.create') }}" class="bg-[#B9FF66] hover:bg-[#a7e55c] px-4 py-2 rounded-lg text-sm font-medium text-gray-900 shadow-sm transition duration-200">
            New Message
        </a>
    </div>
    
    @if(session('success'))
    <div class="bg-green-900 border-l-4 border-green-500 text-green-300 p-4 mb-6" role="alert">
        <p>{{ session('success') }}</p>
    </div>
    @endif
    
    @if(session('error'))
    <div class="bg-red-900 border-l-4 border-red-500 text-red-300 p-4 mb-6" role="alert">
        <p>{{ session('error') }}</p>
    </div>
    @endif
    
    <div class="bg-gray-800 rounded-xl shadow-md border border-gray-700 overflow-hidden">
        @if($conversations->count() > 0)
            <div class="divide-y divide-gray-700">
                @foreach($conversations as $conversation)
                    <a href="{{ route('messages.show', $conversation->id) }}" class="block hover:bg-gray-700 transition duration-150">
                        <div class="p-4 flex items-start">
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-md font-medium text-white">{{ $conversation->subject }}</h3>
                                    <span class="text-xs text-gray-400">{{ $conversation->latestMessage ? $conversation->latestMessage->created_at->diffForHumans() : 'No messages' }}</span>
                                </div>
                                
                                <div class="mt-1 text-sm text-gray-400 truncate">
                                    @if($conversation->latestMessage)
                                        <span class="font-medium text-gray-300">
                                            @if($conversation->latestMessage->sender->role === 'admin' && $conversation->latestMessage->sender->companyProfile)
                                                {{ $conversation->latestMessage->sender->companyProfile->name }}:
                                            @else
                                                {{ $conversation->latestMessage->sender->name }}:
                                            @endif
                                        </span> 
                                        {{ Str::limit($conversation->latestMessage->body, 50) }}
                                    @else
                                        No messages yet
                                    @endif
                                </div>
                                
                                <div class="mt-2 flex items-center">
                                    <div class="flex -space-x-2">
                                        @foreach($conversation->participants->take(3) as $participant)
                                            @php
                                                $displayName = ($participant->role === 'admin' && $participant->companyProfile) 
                                                    ? $participant->companyProfile->name 
                                                    : $participant->name;
                                                $initial = substr($displayName, 0, 1);
                                            @endphp
                                            <div class="w-6 h-6 rounded-full bg-gray-600 flex items-center justify-center text-xs border border-gray-700" title="{{ $displayName }}">
                                                {{ $initial }}
                                            </div>
                                        @endforeach
                                        
                                        @if($conversation->participants->count() > 3)
                                            <div class="w-6 h-6 rounded-full bg-gray-600 flex items-center justify-center text-xs border border-gray-700">
                                                +{{ $conversation->participants->count() - 3 }}
                                            </div>
                                        @endif
                                    </div>
                                    
                                    @if($conversation->job)
                                        <span class="ml-3 px-2 py-1 bg-gray-700 rounded-full text-xs text-gray-300">
                                            {{ Str::limit($conversation->job->title, 20) }}
                                        </span>
                                    @endif
                                    
                                    @if($conversation->unread_count > 0)
                                        <span class="ml-auto bg-[#B9FF66] text-gray-900 text-xs font-medium px-2 py-1 rounded-full">
                                            {{ $conversation->unread_count }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="p-8 text-center">
                <div class="text-gray-400 mb-4">No messages yet</div>
                <a href="{{ route('messages.create') }}" class="inline-block bg-[#B9FF66] hover:bg-[#a7e55c] px-4 py-2 rounded-lg text-sm font-medium text-gray-900 shadow-sm transition duration-200">
                    Start a Conversation
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
