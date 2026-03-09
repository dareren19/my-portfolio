@props([
    'projects' => [
        [
            'title' => 'Car-rental-Website',
            'description' => 'A brief description of the project and the technologies used in its development.',
            'image' => asset('images/Car-rental.png'),
            'link' => '#',
            
        ],
        [
            'title' => 'IzaMariz-Shop',
            'description' => 'A brief description of the project and the technologies used in its development.',
            'image' => asset('images/iza-mariz.png'),
            'link' => '#',
            
        ],
        // Add more projects as needed
    ],
    'columns' => 'md:grid-cols-2', // Grid columns: md:grid-cols-1, md:grid-cols-2, md:grid-cols-3
    'gap' => 'gap-8', // Spacing between cards
])

<section {{ $attributes->merge(['class' => 'mb-16']) }}>
    <!-- Section Header -->
    {{-- <div class="mb-10 md:mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Featured Projects</h2>
        <div class="h-1 w-20 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full"></div>
    </div> --}}

    <!-- Projects Grid -->
    <div class="grid grid-cols-1 {{ $columns }} {{ $gap }}">
        @foreach ($projects as $project)
            <div class="group">
                <div
                    class=" 
                        bg-white rounded-xl 
                        shadow-sm hover:shadow-xl
                        transition-all duration-300
                        hover:-translate-y-1
                        h-full overflow-hidden
                        flex flex-col
                    ">

                 
                    <!-- Project Image -->
                    @if (isset($project['image']))
                        <div class="w-full aspect-[16/9] overflow-hidden bg-gray-100">
                            <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}" loading="lazy" decoding="async"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                    @endif

                    <!-- Card Content -->
                    <div class="p-6 md:p-8 flex-grow flex flex-col">

                        <!-- Project Title -->
                        <h3
                            class="text-xl md:text-2xl font-bold  mb-3 group-hover:text-blue-800 transition-colors">
                            {{ $project['title'] }}
                        </h3>

                        <!-- Project Description -->
                        <p class=" mb-4 md:mb-6 leading-relaxed">
                            {{ $project['description'] }}
                        </p>

                      
                        <!-- View Project Link -->
                        <div class="flex justify-between">
                            <div class="mt-auto">
                            <a href="{{ $project['link'] }}"
                                class="inline-flex items-center  hover:text-blue-800 font-medium group/link">
                                <span class="mr-2 bg-white  px-3 py-1 rounded-full hover:bg-blue-100">GitHub</span>
                                
                            </a>
                        </div>
                        <div class="mt-auto">
                            <a href="{{ $project['link'] }}"
                                class="inline-flex items-center hover:text-blue-800 font-medium group/link">
                                <span class="mr-2 bg-white  px-3 py-1 rounded-full hover:bg-blue-100">Live Demo</span>
                                
                            </a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>














{{-- @props([
    'items' => [],
    'showViewAll' => false,
    'viewAllLink' => '#',
    'viewAllText' => 'View All',
])

<div class="space-y-2">
    @foreach ($items as $item)
        <div class="timeline-item">
            <h3 class="text-xl font-bold">{{ $item['title'] ?? 'Untitled' }}</h3>
            <p class="text-lg font-semibold text-gray-700">
                {{ $item['subtitle'] ?? '' }}
                @if (isset($item['year']))
                    <span class="text-blue-600 ml-2">{{ $item['year'] }}</span>
                @endif
            </p>
            @if (isset($item['description']))
                <p class="text-gray-600 mt-1">{{ $item['description'] }}</p>
            @endif
        </div>
    @endforeach
    
    @empty($items)
        <p class="text-gray-500 italic">No items to display.</p>
    @endempty
</div>

@if ($showViewAll)
    <div class="mt-8">
        <a href="{{ $viewAllLink }}" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center">
            {{ $viewAllText }} <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>
@endif

<style>
    .timeline-item {
        position: relative;
        padding-left: 2rem;
        margin-bottom: 2rem;
    }
    .timeline-item:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0.5rem;
        height: 0.75rem;
        width: 0.75rem;
        border-radius: 50%;
        background: linear-gradient(90deg, #3b82f6, #8b5cf6);
    }
    .timeline-item:after {
        content: '';
        position: absolute;
        left: 0.35rem;
        top: 1.25rem;
        bottom: -2.5rem;
        width: 2px;
        background-color: #e5e7eb;
    }
    .timeline-item:last-child:after {
        display: none;
    }
</style> --}}
