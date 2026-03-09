<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Portfolio' }}</title>
    
    <!-- Tailwind CSS -->
    @if(config('portfolio.use_cdn', true))
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @else
    <!-- Use local assets if configured -->
    
    @endif
    
    <!-- Custom Styles -->
    <style>
        .gradient-text {
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        {{ $customStyles ?? '' }}
    </style>
    
    {{ $head ?? '' }}
</head>
<body class="bg-gray-50 text-gray-800 font-sans">
    <div class="max-w-6xl mx-auto px-6 py-12">
        {{ $slot }}
        
        <!-- Footer -->
        <footer class="mt-20 pt-8  text-center text-gray-500 text-sm">
            <p>© {{ date('Y') }} {{ $footerName ?? 'Daren Marc David Cuesta' }}. All rights reserved.</p>
        </footer>
    </div>
    
    {{ $scripts ?? '' }}
</body>
</html>