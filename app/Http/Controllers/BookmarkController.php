<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookmarkRequest;
use App\Models\Bookmark;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spekulatius\PHPScraper\PHPScraper;

class BookmarkController extends Controller
{
    public function create()
    {
        return view('bookmarks.create');
    }

    public function destroy(Bookmark $bookmark, Request $request)
    {
        if ($bookmark->user_id == Auth::user()->id) {
            $bookmark->delete();
        }

        return view('bookmarks.list', ['bookmarks' => Auth::user()->bookmarks, 'view' => $request->query('view', 'card'),]);
    }

    public function store(StoreBookmarkRequest $request)
    {
        $validated = $request->validated();

        $bookmark = Auth::user()->bookmarks()->create($validated);

        if (isset($validated['tags'])) {
            $tags = explode(',', $validated['tags']);

            foreach ($tags as $tag) {
                $tag = Tag::firstOrCreate([
                    'user_id' => Auth()->user()->id,
                    'name' => $tag,
                ]);
                $bookmark->tags()->attach($tag);
            }
        }

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

        if ($request->hasHeader('HX-Request')) {
            return view('bookmarks.list', [
                'bookmarks' => $query->get(),
                'view' => $request->query('view', 'card'),
            ]);
        } else {
            return view('bookmarks.index', [
                'bookmarks' => $query->get(),
                'view' => $request->query('view', 'card'),
            ]);
        }

    }

    public function export()
    {
        $bookmarks = Auth::user()->bookmarks;

        $output = Bookmark::getCSVColumnHeaders() . "\r\n";

        foreach ($bookmarks as $bookmark) {
            $output .= $bookmark->toCSVRow() . "\r\n";
        }

        return response($output)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="bookmark_export.csv"');
    }

    public function scrapeDataForm(Request $request)
    {
        $url = $request->input('url');

        $web = new PHPScraper();

        try {
            $meta = $web->go($url);

            $name = $meta->title ?? '';
            $description = $meta->description ?? '';
            $author = $meta->author ?? '';
            $image_url = $meta->image ?? $meta->openGraph['og:image'] ?? $meta->twitterCard['twitter:image'] ?? '';

            return view('bookmarks.scrape-data-form', [
                'name' => $name,
                'description' => $description,
                'author' => $author,
                'image_url' => $image_url
            ]);
        } catch (Exception $e) {
            return view('bookmarks.scrape-data-form');
        }
    }
}
