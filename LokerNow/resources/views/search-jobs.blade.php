@extends('layouts.app')

@section('content')
    <style>
        input[type="checkbox"].circle:checked+span::before {
            background-color: #B9FF66;
        }

        input[type="checkbox"].circle+span::before {
            content: "";
            display: inline-block;
            width: 1rem;
            height: 1rem;
            border-radius: 9999px;
            border: 2px solid #B9FF66;
            margin-right: 0.5rem;
            vertical-align: middle;
            transition: all 0.2s ease;
        }
        
        .job-card {
            transition: all 0.3s ease;
            border: 1px solid #2d3748;
            overflow: hidden;
        }
        
        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3), 0 4px 6px -2px rgba(0, 0, 0, 0.2);
            border-color: #B9FF66;
        }
        
        .job-card .company-logo {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-weight: bold;
            font-size: 18px;
        }
        
        .job-tag {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }
        
        .pagination-link {
            @apply relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-300 bg-gray-800 border border-gray-700 hover:bg-gray-700;
        }
        
        .pagination-link.active {
            @apply z-10 bg-[#B9FF66] text-black border-[#B9FF66];
        }
        
        .search-input {
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .search-input:focus-within {
            border-color: #B9FF66;
            box-shadow: 0 0 0 2px rgba(185, 255, 102, 0.2);
        }
        
        .filter-panel {
            background-color: rgba(17, 24, 39, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>

    <div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 py-12 px-6">
    <div class="max-w-7xl mx-auto" x-data="{ 
        showFilters: false,
        searchQuery: '',
        suggestions: [],
        showSuggestions: false,
        selectedSuggestion: -1,
        
        init() {
            this.$watch('searchQuery', (value) => {
                if (value.length > 2) {
                    this.fetchSuggestions();
                } else {
                    this.suggestions = [];
                    this.showSuggestions = false;
                }
            });
        },
        
        fetchSuggestions() {
            fetch(`/jobs/autocomplete?query=${encodeURIComponent(this.searchQuery)}`)
                .then(response => response.json())
                .then(data => {
                    this.suggestions = data;
                    this.showSuggestions = data.length > 0;
                    this.selectedSuggestion = -1;
                });
        },
        
        selectSuggestion(suggestion) {
            this.searchQuery = suggestion.value;
            this.showSuggestions = false;
            this.$refs.searchForm.submit();
        },
        
        handleKeydown(event) {
            if (!this.showSuggestions) return;
            
            if (event.key === 'ArrowDown') {
                event.preventDefault();
                this.selectedSuggestion = Math.min(this.selectedSuggestion + 1, this.suggestions.length - 1);
            } else if (event.key === 'ArrowUp') {
                event.preventDefault();
                this.selectedSuggestion = Math.max(this.selectedSuggestion - 1, -1);
            } else if (event.key === 'Enter' && this.selectedSuggestion >= 0) {
                event.preventDefault();
                this.selectSuggestion(this.suggestions[this.selectedSuggestion]);
            } else if (event.key === 'Escape') {
                this.showSuggestions = false;
            }
        }
    }">
        <h1 class="text-4xl font-bold mb-2 text-white">Job Search</h1>
        <p class="text-gray-400 mb-8">Find your next career opportunity</p>
        <form action="{{ route('search.jobs') }}" method="GET" x-ref="searchForm" class="w-full">
            <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
                <div class="relative flex items-center search-input rounded-full px-4 py-3 w-full sm:w-96">
                    <button type="submit" class="mr-2 text-gray-500 hover:text-[#B9FF66] focus:outline-none">
                        <span class="sr-only">Search</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                    <input 
                        type="text" 
                        name="keyword" 
                        placeholder="Title, skill or company"
                        class="outline-none bg-transparent w-full sm:w-[250px] placeholder-gray-500 text-sm text-white"
                        x-model="searchQuery"
                        @keydown="handleKeydown"
                        @focus="showSuggestions = suggestions.length > 0"
                        @click.away="showSuggestions = false"
                        value="{{ request('keyword') }}"
                    >
                    <button type="submit" class="ml-2 text-gray-400 hover:text-[#B9FF66]">
                        <span class="sr-only">Search</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                    
                    <!-- Autocomplete suggestions -->
                    <div 
                        x-show="showSuggestions" 
                        x-transition 
                        class="absolute left-0 right-0 top-full mt-1 bg-gray-800 border border-gray-600 rounded-lg shadow-lg z-10 max-h-60 overflow-y-auto"
                    >
                        <template x-for="(suggestion, index) in suggestions" :key="index">
                            <div 
                                @click="selectSuggestion(suggestion)" 
                                :class="{'bg-gray-100': selectedSuggestion === index}"
                                class="px-4 py-2 hover:bg-gray-700 cursor-pointer flex items-center text-white"
                            >
                                <template x-if="suggestion.type === 'title'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </template>
                                <template x-if="suggestion.type === 'company'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </template>
                                <template x-if="suggestion.type === 'skill'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                    </svg>
                                </template>
                                <span x-text="suggestion.value"></span>
                            </div>
                        </template>
                    </div>
                </div>
            <button type="button" @click.prevent="showFilters = !showFilters"
                class="flex items-center gap-2 rounded-full px-5 py-3 text-sm font-medium bg-gray-800 text-white hover:bg-gray-700 border border-gray-600 transition">
                <span x-text="showFilters ? 'Hide Filters' : 'Show Filters'"></span>
                <span class="w-6 h-6 flex items-center justify-center border border-[#B9FF66] rounded-full text-sm font-bold text-[#B9FF66]"
                    x-text="showFilters ? '-' : '+'"></span>
            </button>
        </div>
        
        <div x-show="showFilters" x-transition class="filter-panel rounded-2xl p-6 mb-8 shadow-lg">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">

                {{-- Experience Level --}}
                <div class="space-y-2">
                    <h3 class="font-medium text-[#B9FF66]">Experience Level</h3>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        @foreach (['Internship', 'Entry Level', 'Associate', 'Mid-Senior Level', 'Director', 'Executive'] as $level)
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="experience_level[]" value="{{ $level }}" class="hidden circle" {{ in_array($level, request('experience_level', [])) ? 'checked' : '' }}>
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
                                <input type="checkbox" name="job_function[]" value="{{ $job }}" class="hidden circle" {{ in_array($job, request('job_function', [])) ? 'checked' : '' }}>
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
                                <input type="checkbox" name="position_type[]" value="{{ $type }}" class="hidden circle" {{ in_array($type, request('position_type', [])) ? 'checked' : '' }}>
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
                                <input type="checkbox" name="benefits[]" value="{{ $benefit }}" class="hidden circle" {{ in_array($benefit, request('benefits', [])) ? 'checked' : '' }}>
                                <span>{{ $benefit }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- Industry --}}
                <div class="space-y-2">
                    <h3 class="font-medium text-[#B9FF66]">Industry</h3>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        @foreach (['Financial Services', 'Software Development', 'IT Services and Consulting', 'Banking', 'Manufacturing', 'Hospitality'] as $industry)
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="industry[]" value="{{ $industry }}" class="hidden circle" {{ in_array($industry, request('industry', [])) ? 'checked' : '' }}>
                                <span>{{ $industry }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- Job Type --}}
                <div class="space-y-2">
                    <h3 class="font-medium text-[#B9FF66]">Job Type</h3>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        @foreach (['Remote', 'On-site', 'Hybrid'] as $jobType)
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="job_type[]" value="{{ $jobType }}" class="hidden circle" {{ in_array($jobType, request('job_type', [])) ? 'checked' : '' }}>
                                <span>{{ $jobType }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                
                {{-- Category --}}
                <div class="space-y-2">
                    <h3 class="font-medium text-[#B9FF66]">Category</h3>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        @foreach (['Technology', 'Design', 'Marketing', 'Sales', 'Customer Service', 'Finance', 'Healthcare', 'Education', 'Other'] as $category)
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="category[]" value="{{ $category }}" class="hidden circle" {{ in_array($category, request('category', [])) ? 'checked' : '' }}>
                                <span>{{ $category }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">

            
            @if(count($jobs) == 0)
                <div class="col-span-1 sm:col-span-2 lg:col-span-3 text-center py-16 bg-gray-800 rounded-2xl p-8 border border-gray-700">
                    <img src="{{ asset('images/empty-search.svg') }}" alt="No results" class="h-32 w-32 mx-auto mb-6" onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMjgiIGhlaWdodD0iMTI4IiB2aWV3Qm94PSIwIDAgMjQgMjQiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzY0NzQ4QiIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxjaXJjbGUgY3g9IjExIiBjeT0iMTEiIHI9IjgiPjwvY2lyY2xlPjxsaW5lIHgxPSIyMSIgeTE9IjIxIiB4Mj0iMTYuNjUiIHkyPSIxNi42NSI+PC9saW5lPjxsaW5lIHgxPSI4IiB5MT0iMTEiIHgyPSIxNCIgeTI9IjExIj48L2xpbmU+PC9zdmc+';">
                    <h3 class="text-2xl font-bold text-white mb-2">No job listings found</h3>
                    <p class="text-gray-400 mb-6 max-w-md mx-auto">We couldn't find any jobs matching your search criteria. Try adjusting your filters or search terms.</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('search.jobs') }}" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-black bg-[#B9FF66] hover:bg-[#a8e65c] transition-colors">
                            Clear All Filters
                        </a>
                        <button onclick="history.back()" class="inline-flex items-center justify-center px-6 py-3 border border-gray-600 text-base font-medium rounded-lg text-white hover:bg-gray-700 transition-colors">
                            Go Back
                        </button>
                    </div>
                </div>
            @else
                @foreach($jobs as $index => $job)
                    <div class="job-card bg-gray-800 text-white rounded-2xl p-6 relative shadow-lg border border-gray-700">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex items-center gap-3">
                                <div class="company-logo h-14 w-14 rounded-md overflow-hidden border border-gray-700 flex-shrink-0">
                                    @if(isset($companyProfiles[$job->company]) && $companyProfiles[$job->company]->logo_path)
                                        <img src="{{ asset('storage/' . $companyProfiles[$job->company]->logo_path) }}" alt="{{ $job->company }} logo" class="w-14 h-14 object-cover">
                                    @else
                                        <div class="w-14 h-14 bg-[#B9FF66] text-black flex items-center justify-center text-lg font-bold">
                                            {{ strtoupper(substr($job->company, 0, 2)) }}
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold">{{ $job->title }}</h2>
                                    <p class="text-sm text-gray-300">{{ $job->company }}</p>
                                </div>
                            </div>
                            <div x-data="{ 
                                loved: {{ in_array($job->id_job, $savedJobIds ?? []) ? 'true' : 'false' }},
                                toggleSave() {
                                    const jobId = {{ $job->id_job }};
                                    if (this.loved) {
                                        // Remove from saved jobs
                                        fetch(`/jobs/${jobId}/unsave`, {
                                            method: 'DELETE',
                                            headers: {
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                            },
                                            credentials: 'same-origin'
                                        })
                                        .then(response => {
                                            if (!response.ok) {
                                                throw new Error('Network response was not ok');
                                            }
                                            return response.json();
                                        })
                                        .then(data => {
                                            this.loved = false;
                                            console.log('Job unsaved successfully');
                                        })
                                        .catch(error => {
                                            console.error('Error unsaving job:', error);
                                            alert('Error removing job from saved list. Please try again.');
                                        });
                                    } else {
                                        // Add to saved jobs
                                        fetch(`/jobs/${jobId}/save`, {
                                            method: 'POST',
                                            headers: {
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                            },
                                            credentials: 'same-origin'
                                        })
                                        .then(response => {
                                            if (!response.ok) {
                                                throw new Error('Network response was not ok');
                                            }
                                            return response.json();
                                        })
                                        .then(data => {
                                            this.loved = true;
                                            console.log('Job saved successfully');
                                        })
                                        .catch(error => {
                                            console.error('Error saving job:', error);
                                            alert('Error saving job. Please try again.');
                                        });
                                    }
                                }
                            }">
                                <button @click="toggleSave()" class="p-2 rounded-full bg-gray-700 hover:bg-gray-600 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" :class="loved ? 'text-red-500 fill-red-500' : 'text-gray-300'" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <div class="flex items-center gap-2 text-sm text-gray-300 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                                <span>{{ $job->location }}</span>
                            </div>
                            
                            <div class="flex flex-wrap">
                                <span class="job-tag bg-[#B9FF66] text-black">
                                    {{ $job->job_type }}
                                </span>
                                <span class="job-tag bg-gray-700 text-gray-300">
                                    ${{ number_format($job->salary, 0) }}
                                </span>
                            </div>
                        </div>
                        
                        <a href="{{ route('jobs.show', ['job_id' => $job->id_job]) }}" class="inline-flex items-center px-4 py-2 rounded-lg bg-[#B9FF66] text-black hover:bg-[#a8e65c] transition-colors text-sm font-medium">
                            View Details
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                @endforeach
                
                <div class="col-span-1 sm:col-span-2 lg:col-span-3 mt-10 flex justify-center">
                    {{ $jobs->onEachSide(1)->links() }}
                </div>
            @endif


        </div>
    </div>
    </div>
</div>
@endsection