<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Community;
use Inertia\Inertia;

class CommunitieController extends Controller
{

    public function show($slug)
    {
        $community = Community::where('slug', $slug)->first();
        return Inertia::render('Frontend/Communities/Show', compact('community'));
    }
}
