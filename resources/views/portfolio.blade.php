<x-portfolio.layout title="Daren Marc David Cuesta - Portfolio" footerName="Daren Marc David Cuesta">
    <!-- Header with Photo -->
    <x-portfolio.header name="Daren Marc David Cuesta" title="Web Developer" photo="{{ asset('images/profile-pic.jpg') }}"
        photoAlt="profile-pic.jpg" photoSize="48">
        <!-- Custom Social Links (optional) -->
        <x-slot name="socialLinks">
            <x-portfolio.social-links :links="[
                [
                    'icon' => 'fas fa-envelope',
                    'url' => 'mailto:you@example.com',
                    'text' => 'Email',
                    'color' => 'hover:text-blue-800',
                ],
                [
                    'icon' => 'fab fa-github',
                    'url' => 'https://github.com/yourprofile',
                    'text' => 'GitHub',
                    'color' => 'hover:text-blue-800',
                ],
                [
                    'icon' => 'fab fa-linkedin',
                    'url' => 'https://linkedin.com/in/yourprofile',
                    'text' => 'LinkedIn',
                    'color' => 'hover:text-blue-800',
                ],
                [
                    'icon' => 'fab fa-file-pdf',
                    'url' => '/resume.pdf',
                    'text' => 'Resume',
                    'color' => 'hover:text-blue-800',
                ],
            ]" />
        </x-slot>
    </x-portfolio.header>

    <!-- About Section -->
    <x-portfolio.section title="About">
        <p class="text-lg leading-relaxed">
            I am a web developer with knowledge in Laravel, MySQL, and JavaScript, specializing in developing modern web applications, mobile solutions, search engine optimization strategies. Recently, I have been advancing my work by incorporating artificial intelligence as an integral assistant, thoughtfully integrating AI technologies and methodologies to enhance the functionality, efficiency, and innovation of modern applications.
        </p>
    </x-portfolio.section>

    <!-- Experience Section -->
    <x-portfolio.section title="Feautured Projects">
        <x-portfolio.timeline />
    </x-portfolio.section>

    <!-- Tech Stack Section -->
    <x-portfolio.section title="Currently Learning">
        <x-portfolio.skills-grid :categories="[
            'Frontend' => [
                'skills' => ['JavaScript', 'ReactJS', 'Tailwind CSS'],
                'color' => 'blue',
            ],
            'Backend' => [
                'skills' => ['PHP', 'Laravel', 'MySQL'],
                'color' => 'blue',
            ],
            
        ]" />
    </x-portfolio.section>

    <x-portfolio.section title="Education">
    <div class="space-y-6">
        
        <div>
            <h3 class="text-lg font-semibold">
                 Bachelor of Science in Computer Science
            </h3>
            <p class="text-gray-600">
                Cavite State University-Carmona
            </p>
            <p class="text-sm text-gray-500">
                2016 – 2020
            </p>
        </div>

    </div>
</x-portfolio.section>

    <!-- Personal Section -->
    {{-- <x-portfolio.section title="Beyond Coding">
        <p class="text-lg leading-relaxed">
            When not writing code, I focus on learning about emerging technologies, minimalism, and startup culture.
            I share my knowledge through content creation and community building.
        </p>
    </x-portfolio.section> --}}
</x-portfolio.layout>
