<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Post;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index(): View
    {
        return view('pages.home', [
            'services' => Service::featured()->take(6)->get(),
            'portfolio_items' => Portfolio::latest()->take(6)->get(),
            'team_members' => Team::featured()->take(4)->get(),
            'testimonials' => Testimonial::latest()->take(3)->get(),
            'latest_posts' => Post::published()->latest()->take(3)->get(),
        ]);
    }
} 