@extends('layouts.app')

@section('content')
    <style>
        input[type="checkbox"].circle:checked+span::before {
            background-color: #1d4ed8;
        }

        input[type="checkbox"].circle+span::before {
            content: "";
            display: inline-block;
            width: 1rem;
            height: 1rem;
            border-radius: 9999px;
            border: 2px solid #555;
            margin-right: 0.5rem;
            vertical-align: middle;
            transition: all 0.2s ease;
        }
    </style>

    <div class="px-6 py-10 max-w-7xl mx-auto" x-data="{ showFilters: false }">
        <h1 class="text-4xl font-bold mb-8">Job Search</h1>
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
            <div class="flex items-center border border-gray-400 rounded-full px-4 py-2 w-full sm:w-auto">
                <svg xmlns="[http://www.w3.org/2000/svg"](http://www.w3.org/2000/svg") class="h-5 w-5 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" placeholder="Title, skill or company"
                    class="outline-none bg-transparent w-full sm:w-[250px] placeholder-gray-500 text-sm">
            </div>
            <button @click="showFilters = !showFilters"
                class="flex items-center gap-2 rounded-full px-4 py-2 text-sm font-medium hover:bg-gray-100 transition">
                <span x-text="showFilters ? 'Close' : 'Filters'"></span>
                <span class="w-7 h-7 flex items-center justify-center border border-gray-700 rounded-full text-xl font-bold"
                    x-text="showFilters ? '-' : '+'"></span>
            </button>
        </div>
        
        <div x-show="showFilters" x-transition class="border border-gray-300 rounded-2xl p-6 mb-8 bg-[#F3F3F3] shadow-md">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- Experience Level --}}
                <div>
                    <h2 class="font-semibold mb-2">Experience Level</h2>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        @foreach (['Internship', 'Entry Level', 'Associate', 'Mid-Senior Level', 'Director', 'Executive'] as $level)
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="hidden circle">
                                <span>{{ $level }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- Job Function --}}
                <div>
                    <h2 class="font-semibold mb-2">Job Function</h2>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        @foreach (['Sales', 'Management', 'Finance', 'Administrative', 'Training', 'Marketing'] as $job)
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="hidden circle">
                                <span>{{ $job }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- Employment Type --}}
                <div>
                    <h2 class="font-semibold mb-2">Employment Type</h2>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        @foreach (['Full-Time', 'Part-Time', 'Contract', 'Temporary', 'Internship'] as $type)
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="hidden circle">
                                <span>{{ $type }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- Benefits --}}
                <div>
                    <h2 class="font-semibold mb-2">Benefits</h2>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        @foreach (['Pension Plan', 'Dental Insurance', 'Vision Insurance', 'Disability Insurance', 'Commuter Benefits'] as $benefit)
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="hidden circle">
                                <span>{{ $benefit }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- Industry --}}
                <div>
                    <h2 class="font-semibold mb-2">Industry</h2>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        @foreach (['Financial Services', 'Software Development', 'IT Services and Consulting', 'Banking', 'Manufacturing', 'Hospitality'] as $industry)
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="hidden circle">
                                <span>{{ $industry }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- Title --}}
                <div>
                    <h2 class="font-semibold mb-2">Title</h2>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        @foreach (['Marketing Associate', 'Software Engineer', 'Marketing Specialist', 'Data Analyst', 'Business Student'] as $title)
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="hidden circle">
                                <span>{{ $title }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @if(count($jobs) > 0)
                @foreach($jobs as $index => $job)
                    <div class="{{ $index % 3 == 0 ? 'text-black' : ($index % 3 == 2 ? 'bg-gray-900 text-white' : 'bg-gray-100') }} rounded-2xl p-6 relative shadow-sm h-[160px] outline outline-1 outline-gray-900 {{ $index % 3 == 0 ? 'shadow-lg' : 'shadow-sm' }}"
                        {{ $index % 3 == 0 ? 'style="background-color: #B9FF66;"' : '' }}>
                        <div x-data="{ loved: false }" class="absolute top-2 right-2">
                            <button @click="loved = !loved" class="text-gray-600 hover:text-red-500">
                                <svg xmlns="[http://www.w3.org/2000/svg"](http://www.w3.org/2000/svg") class="h-6 w-6" :class="loved ? 'text-red-500 fill-red-500' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                        </div>
                        <h2 class="inline-block bg-white text-black text-sm font-medium mb-2 px-2 py-1 rounded-md">
                            {{ $job->title }}
                        </h2>
                        <p class="text-xs font-medium mb-1">{{ $job->company }}</p>
                        <p class="text-xs mb-6">{{ $job->location }}</p>
                        <a href="{{ route('jobs.show', $job->id_job) }}" class="absolute bottom-4 left-4 flex items-center text-sm font-medium gap-2">
                            <svg xmlns="[http://www.w3.org/2000/svg"](http://www.w3.org/2000/svg") class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            Learn more
                        </a>
                    </div>
                @endforeach
            @else
                <div class="col-span-3 text-center py-10">
                    <p class="text-lg font-medium">No job listings available at the moment.</p>
                    <p class="text-sm text-gray-500">Please check back later for new opportunities.</p>
                </div>
            @endif

            @if(count($jobs) > 0)
                <div class="col-span-1 sm:col-span-2 lg:col-span-3 mt-8">
                    {{ $jobs->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection