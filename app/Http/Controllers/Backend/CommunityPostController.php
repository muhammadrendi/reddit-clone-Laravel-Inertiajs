<?php

namespace App\Http\Controllers\Backend;

use Inertia\Inertia;
use App\Models\Community;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Redirect;

class CommunityPostController extends Controller
{
    public function index() {

    }

    public function show()
    {
    }

    public function create(Community $community)
    {
        return Inertia::render('Communities/Posts/Create', compact('community'));
    }

    public function store(StorePostRequest $storePostRequest, Community $community)
    {
        $community->posts()->create([
            'user_id' => auth()->id(),
            'title' => $storePostRequest->title,
            'url' => $storePostRequest->url,
            'description' => $storePostRequest->description,
        ]);

        return Redirect::route('community.detail', $community->slug);
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}
