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

        <!-- New Conversation Form -->
        <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700">
            <h1 class="text-2xl font-bold text-white mb-6">New Conversation</h1>
            
            <form action="#" method="POST">
                <!-- Recipient Selection -->
                <div class="mb-6">
                    <label for="recipient" class="block text-white font-medium mb-2">Recipient</label>
                    <div class="relative">
                        <select id="recipient" name="recipient" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-[#B9FF66] focus:border-transparent appearance-none">
                            <option value="" disabled selected>Select a recipient</option>
                            <option value="1">TechCorp Recruiter</option>
                            <option value="2">DesignHub HR</option>
                            <option value="3">InnovateCo Talent</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm mt-2">Select the employer or recruiter you want to message</p>
                </div>
                
                <!-- Related Job (Optional) -->
                <div class="mb-6">
                    <label for="job" class="block text-white font-medium mb-2">Related Job (Optional)</label>
                    <div class="relative">
                        <select id="job" name="job" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-[#B9FF66] focus:border-transparent appearance-none">
                            <option value="" selected>None - General Inquiry</option>
                            <option value="1">Software Engineer at TechCorp</option>
                            <option value="2">UX Designer at DesignHub</option>
                            <option value="3">Product Manager at InnovateCo</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm mt-2">If this conversation is about a specific job, select it here</p>
                </div>
                
                <!-- Subject -->
                <div class="mb-6">
                    <label for="subject" class="block text-white font-medium mb-2">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="Enter a subject for your conversation" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-[#B9FF66] focus:border-transparent">
                </div>
                
                <!-- Message -->
                <div class="mb-6">
                    <label for="message" class="block text-white font-medium mb-2">Message</label>
                    <textarea id="message" name="message" rows="6" placeholder="Type your message here..." class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-[#B9FF66] focus:border-transparent"></textarea>
                </div>
                
                <!-- Attachment (Optional) -->
                <div class="mb-6">
                    <label for="attachment" class="block text-white font-medium mb-2">Attachment (Optional)</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="attachment" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-600 border-dashed rounded-lg cursor-pointer bg-gray-700 hover:bg-gray-600 transition-colors">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500">PDF, DOC, DOCX, JPG, PNG (MAX. 5MB)</p>
                            </div>
                            <input id="attachment" type="file" class="hidden" />
                        </label>
                    </div>
                </div>
                
                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" class="inline-flex items-center px-6 py-3 bg-[#B9FF66] text-black rounded-lg font-medium hover:bg-[#a8e65c] transition-colors">
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
