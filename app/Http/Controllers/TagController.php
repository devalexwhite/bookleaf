<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Auth;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function suggest(Request $request)
    {
        $query = $request->input("query");
        $tags = $request->input("tags", null) && trim($request->input("tags", null)) != "" ? explode(",", $request->input("tags")) : [];

        $toggle = urldecode($request->query("toggle"));

        if (isset($toggle) && $toggle != "") {
            if (in_array($toggle, $tags)) {
                unset($tags[array_search($toggle, $tags)]);
            } else {
                $tags[] = $toggle;
                $query = null;
            }
        }
        if (count($tags) > 0) {
            $tags = join(",", array_unique($tags));
        } else {
            $tags = null;
        }

        if (isset($query)) {
            $suggestions = Auth::user()->tags()->where('name', 'like', '%' . $query . '%')->where('user_id', Auth()->user()->id)->get();
        } else {
            $suggestions = [];
        }

        return view('tags.tags-suggest-input', compact('suggestions', 'query', 'tags'));
    }
}
