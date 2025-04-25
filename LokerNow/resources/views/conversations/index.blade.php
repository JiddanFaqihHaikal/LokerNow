@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 py-12 px-6">
    <div class="max-w-5xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-white">Messages</h1>
                <p class="text-gray-400 mt-1">Communicate with employers and recruiters</p>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('conversations.create') }}" class="inline-flex items-center px-5 py-3 rounded-lg bg-[#B9FF66] text-black font-medium hover:bg-[#a8e65c] transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    New Conversation
                </a>
            </div>
        </div>

        <!-- Search -->
        <div class="bg-gray-800 rounded-xl p-6 mb-8 border border-gray-700">
            <div class="relative">
                <input type="text" placeholder="Search conversations..." class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-[#B9FF66] focus:border-transparent">
                <button class="absolute right-3 top-3 text-gray-400 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Conversations List -->
        <div class="bg-gray-800 rounded-xl border border-gray-700">
            <!-- Conversation Item -->
            <a href="{{ route('conversations.show', 1) }}" class="block border-b border-gray-700 hover:bg-gray-700 transition-colors">
                <div class="p-6 flex items-start gap-4">
                    <div class="flex-shrink-0 h-12 w-12 rounded-full bg-gray-700 flex items-center justify-center text-white font-medium">
                        TC
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-white truncate">TechCorp Recruiter</h3>
                            <span class="text-sm text-gray-400">2 hours ago</span>
                        </div>
                        <p class="text-gray-400 truncate mt-1">Thank you for your application to the Software Engineer position. We would like to schedule an interview...</p>
                        <div class="flex items-center justify-between mt-2">
                            <span class="text-sm text-gray-500">Re: Software Engineer Application</span>
                            <span class="inline-flex items-center justify-center h-5 w-5 text-xs font-medium bg-[#B9FF66] text-black rounded-full">2</span>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Conversation Item -->
            <a href="{{ route('conversations.show', 2) }}" class="block border-b border-gray-700 hover:bg-gray-700 transition-colors">
                <div class="p-6 flex items-start gap-4">
                    <div class="flex-shrink-0 h-12 w-12 rounded-full bg-gray-700 flex items-center justify-center text-white font-medium">
                        DH
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-white truncate">DesignHub HR</h3>
                            <span class="text-sm text-gray-400">Yesterday</span>
                        </div>
                        <p class="text-gray-400 truncate mt-1">We've reviewed your portfolio and are impressed with your UX design work. Can we schedule a call to discuss...</p>
                        <div class="flex items-center justify-between mt-2">
                            <span class="text-sm text-gray-500">Re: UX Designer Application</span>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Conversation Item -->
            <a href="{{ route('conversations.show', 3) }}" class="block hover:bg-gray-700 transition-colors">
                <div class="p-6 flex items-start gap-4">
                    <div class="flex-shrink-0 h-12 w-12 rounded-full bg-gray-700 flex items-center justify-center text-white font-medium">
                        IC
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-white truncate">InnovateCo Talent</h3>
                            <span class="text-sm text-gray-400">Last week</span>
                        </div>
                        <p class="text-gray-400 truncate mt-1">Thanks for your interest in the Product Manager role. We've received your application and will be in touch...</p>
                        <div class="flex items-center justify-between mt-2">
                            <span class="text-sm text-gray-500">Re: Product Manager Application</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-8">
            <nav class="inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-700 bg-gray-800 text-sm font-medium text-gray-400 hover:bg-gray-700">
                    <span class="sr-only">Previous</span>
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="#" aria-current="page" class="z-10 bg-[#B9FF66] border-[#B9FF66] text-black relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                    1
                </a>
                <a href="#" class="bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                    2
                </a>
                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-700 bg-gray-800 text-sm font-medium text-gray-400 hover:bg-gray-700">
                    <span class="sr-only">Next</span>
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            </nav>
        </div>
    </div>
</div>
@endsection
