@props([
    'links' => [
        ['icon' => 'fas fa-envelope', 'url' => 'mailto:you@example.com', 'text' => 'Email', 'color' => 'hover:text-blue-600'],
        ['icon' => 'fab fa-github', 'url' => 'https://github.com/yourprofile', 'text' => 'GitHub', 'color' => 'hover:text-blue-600'],
        ['icon' => 'fab fa-linkedin', 'url' => 'https://linkedin.com/in/yourprofile', 'text' => 'LinkedIn', 'color' => 'hover:text-blue-600'],
        ['icon' => 'fab fa-twitter', 'url' => 'https://twitter.com/yourprofile', 'text' => 'Twitter', 'color' => 'hover:text-blue-600'],
    ],
    'size' => 'text-xl',
])

<div class="space-y-2 mt-3 md:mt-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:flex gap-3">
        @foreach($links as $link)
            <a 
                href="{{ $link['url'] }}" 
                target="_blank" 
                rel="noopener noreferrer"
                class=" {{ $link['color'] }} inline-flex h-10 md:h-12 items-center rounded-xl shadow-[0_1px_3px_rgba(0,0,0,0.04),0_1px_2px_rgba(0,0,0,0.06)] bg-background px-4 md:px-6 text-sm md:text-base font-semibold transition-all duration-200 hover:bg-muted hover:-translate-y-0.5 hover:shadow-[0_6px_20px_rgba(0,0,0,0.12)] gap-2 md:gap-2.5 whitespace-nowrap flex-1 md:flex-1 min-h-0"


                
            >
                <i class="{{ $link['icon'] }} {{ $size }} mr-2"></i>
                <span>{{ $link['text'] }}</span>
            </a>
        @endforeach
    </div>
    
</div>