@props([
    'name' => null,
    'title' => null,
    'photo' => null,
    'photoAlt' => null,
    'photoSize' => null, // w-48 h-48
])

<header {{ $attributes->merge(['class' => 'mb-10']) }}>
    <div class="flex flex-col md:flex-row items-center md:items-start gap-6 md:gap-8">
        <!-- Photo Container -->
        <div class="flex-shrink-0">
            <div class="w-40 h-40 md:w-48 md:h-48 rounded-lg overflow-hidden border-4 border-white shadow-lg bg-gradient-to-br from-blue-50 to-purple-50">
                @if($photo)
                    <img src="{{ $photo }}" alt="{{ $photoAlt }}" class="w-full h-full object-cover">
                @else
                    <!-- Default placeholder -->
                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                        <div class="text-center">
                            <i class="fas fa-user text-5xl md:text-6xl mb-2"></i>
                            <p class="text-sm">Add Photo</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Name and Title -->
        <div class="text-center md:text-left">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-2">{{ $name }}</h1>
            <p class="text-lg md:text-xl font-bold mb-4">{{ $title }}</p>
            
            <!-- Social Links Slot -->
            @if(isset($socialLinks))
                {{ $socialLinks }}
            @else
                <x-portfolio.social-links />
            @endif
        </div>
    </div>

        
        

</header>