@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 py-12 px-6">
    <div class="max-w-5xl mx-auto">
        <a href="{{ route('conversations.index') }}" class="inline-flex items-center text-gray-400 hover:text-[#B9FF66] transition-colors mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Messages
        </a>

        <!-- Conversation Header -->
        <div class="bg-gray-800 rounded-2xl p-6 mb-8 border border-gray-700">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="flex-shrink-0 h-12 w-12 rounded-full bg-gray-700 flex items-center justify-center text-white font-medium">
                        TC
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white">TechCorp Recruiter</h1>
                        <p class="text-gray-400 mt-1">Re: Software Engineer Application</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <button class="text-gray-400 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Messages -->
        <div class="bg-gray-800 rounded-2xl p-6 mb-8 border border-gray-700">
            <div class="space-y-6">
                <!-- Received Message -->
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-700 flex items-center justify-center text-white font-medium">
                        TC
                    </div>
                    <div class="flex-1">
                        <div class="bg-gray-700 rounded-lg p-4 inline-block max-w-[80%]">
                            <p class="text-white">Hello! Thank you for your application to the Software Engineer position at TechCorp. We've reviewed your resume and are impressed with your skills and experience.</p>
                        </div>
                        <div class="mt-1 text-xs text-gray-400">
                            April 22, 2025 • 10:30 AM
                        </div>
                    </div>
                </div>

                <!-- Received Message -->
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-700 flex items-center justify-center text-white font-medium">
                        TC
                    </div>
                    <div class="flex-1">
                        <div class="bg-gray-700 rounded-lg p-4 inline-block max-w-[80%]">
                            <p class="text-white">We would like to schedule an interview with you to discuss the position further. Are you available next week? Please let us know your availability.</p>
                        </div>
                        <div class="mt-1 text-xs text-gray-400">
                            April 22, 2025 • 10:32 AM
                        </div>
                    </div>
                </div>

                <!-- Sent Message -->
                <div class="flex items-start justify-end gap-4">
                    <div class="flex-1 flex justify-end">
                        <div>
                            <div class="bg-[#B9FF66] rounded-lg p-4 inline-block max-w-[80%] text-right">
                                <p class="text-black">Thank you for considering my application! I'm excited about the opportunity to interview with TechCorp.</p>
                            </div>
                            <div class="mt-1 text-xs text-gray-400 text-right">
                                April 22, 2025 • 11:45 AM
                            </div>
                        </div>
                    </div>
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-[#B9FF66] flex items-center justify-center text-black font-medium">
                        ME
                    </div>
                </div>

                <!-- Sent Message -->
                <div class="flex items-start justify-end gap-4">
                    <div class="flex-1 flex justify-end">
                        <div>
                            <div class="bg-[#B9FF66] rounded-lg p-4 inline-block max-w-[80%] text-right">
                                <p class="text-black">I'm available Monday through Thursday next week between 10 AM and 4 PM. Please let me know what works best for your team.</p>
                            </div>
                            <div class="mt-1 text-xs text-gray-400 text-right">
                                April 22, 2025 • 11:47 AM
                            </div>
                        </div>
                    </div>
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-[#B9FF66] flex items-center justify-center text-black font-medium">
                        ME
                    </div>
                </div>

                <!-- Received Message -->
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-700 flex items-center justify-center text-white font-medium">
                        TC
                    </div>
                    <div class="flex-1">
                        <div class="bg-gray-700 rounded-lg p-4 inline-block max-w-[80%]">
                            <p class="text-white">Great! Let's schedule the interview for Tuesday at 2 PM. We'll be conducting a technical interview followed by a chat with the team lead. The interview will be approximately 90 minutes.</p>
                        </div>
                        <div class="mt-1 text-xs text-gray-400">
                            April 22, 2025 • 2:15 PM
                        </div>
                    </div>
                </div>

                <!-- Received Message -->
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-700 flex items-center justify-center text-white font-medium">
                        TC
                    </div>
                    <div class="flex-1">
                        <div class="bg-gray-700 rounded-lg p-4 inline-block max-w-[80%]">
                            <p class="text-white">I'll send a calendar invite shortly with the Zoom link. Please let me know if you have any questions before the interview.</p>
                        </div>
                        <div class="mt-1 text-xs text-gray-400">
                            April 22, 2025 • 2:17 PM
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reply Form -->
        <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700">
            <form action="#" method="POST">
                <div class="mb-4">
                    <textarea rows="4" placeholder="Type your message..." class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-[#B9FF66] focus:border-transparent"></textarea>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex gap-2">
                        <button type="button" class="text-gray-400 hover:text-white p-2 rounded-full hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                            </svg>
                        </button>
                        <button type="button" class="text-gray-400 hover:text-white p-2 rounded-full hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </button>
                    </div>
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 rounded-lg bg-[#B9FF66] text-black font-medium hover:bg-[#a8e65c] transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
