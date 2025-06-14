<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookmarkRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function create()
    {
        return view('bookmarks.create');
    }

    public function store(StoreBookmarkRequest $request)
    {
        $validated = $request->validated();

        Auth::user()->bookmarks()->create($validated);

        return redirect(route('dashboard'));
    }

    public function index()
    {
        return view('bookmarks.list', [
            'bookmarks' => Auth::user()->bookmarks,
        ]);
    }
}
