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

        $bookmark = Auth::user()->bookmarks()->create($validated);
        $bookmark->fillMetaTags();

        return redirect(route('bookmarks.index'));
    }

    public function index(Request $request)
    {
        $folder = urldecode($request->query('folder'));
        $tag = urldecode($request->query('tag'));


        $query = Auth::user()->bookmarks();

        if ($folder != null) {
            $query = $query->where('folder', $folder);
        }

        if ($tag != null) {
            $query = $query->where('tags', 'LIKE', '%' . $tag . '%');
        }

        return view('bookmarks.list', [
            'bookmarks' => $query->get(),
        ]);
    }
}
