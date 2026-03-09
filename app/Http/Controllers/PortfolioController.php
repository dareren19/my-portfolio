<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        // You can fetch data from database here
        $experience = [
            [
                'title' => 'Principal AI Engineer',
                'subtitle' => 'Standard Chartered',
                'year' => '2025',
                'description' => 'Leading AI initiatives and team'
            ],
            // ... more items
        ];
        
        $skills = [
            'Frontend' => [
                'skills' => ['JavaScript', 'TypeScript', 'React', 'Next.js'],
                'color' => 'blue',
            ],
            // ... more categories
        ];
        
        return view('portfolio', compact('experience', 'skills'));
    }
    
    public function experience()
    {
        // Full experience page
        return view('portfolio.experience');
    }
}