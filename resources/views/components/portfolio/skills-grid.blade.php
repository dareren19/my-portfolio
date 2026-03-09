@props([
    'categories' => [
        'Frontend' => [
            'skills' => ['JavaScript', 'ReactJS', 'Tailwind CSS'],
            'color' => 'blue',
        ],
        'Backend' => [
            'skills' => [ 'PHP', 'Laravel', 'MySQL'],
            'color' => 'purple',
        ],
        
    ],
])

<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    @foreach($categories as $categoryName => $category)
        <div>
            <h3 class="text-xl font-bold mb-4 text-gray-700">{{ $categoryName }}</h3>
            <div class="flex flex-wrap gap-2">
                @foreach($category['skills'] as $skill)
                    @php
                        $colorClasses = [
                            'blue' => 'bg-blue-100 text-blue-800',
                            'purple' => 'bg-purple-100 text-purple-800',
                            'green' => 'bg-green-100 text-green-800',
                            'red' => 'bg-red-100 text-red-800',
                            'yellow' => 'bg-yellow-100 text-yellow-800',
                            'indigo' => 'bg-indigo-100 text-indigo-800',
                        ];
                        $colorClass = $colorClasses[$category['color'] ?? 'blue'] ?? $colorClasses['blue'];
                    @endphp
                    <span class="{{ $colorClass }} px-3 py-1 rounded-full">{{ $skill }}</span>
                @endforeach
            </div>
        </div>
    @endforeach
</div>