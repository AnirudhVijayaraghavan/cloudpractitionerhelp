<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Cache;

class EducationController extends Controller
{
    //
    public function showArticle($track, Article $article)
    {
        $tracks = config('education.tracks');
        if (!isset($tracks[$track])) {
            return redirect()->route('educationsection')->with('failure', 'Track does not exist, please select from the available resources.');
        }
        // abort_unless(isset($tracks[$track]) && $slug->track === $track, 404);

        $contentHtml = Str::markdown($article->body);

        return view('article', [
            'track' => $track,
            'trackName' => $tracks[$track],
            'article' => $article,
            'contentHtml' => $contentHtml,
        ]);
    }
    // List all articles for a given track
    public function showTrack(string $track)
    {
        $tracks = config('education.tracks');
        if (!isset($tracks[$track])) {
            return redirect()->route('educationsection')->with('failure', 'Track does not exist, please select from the available resources.');
        }
        // abort_unless(isset($tracks[$track]), 404);

        // Cache articles for 60 minutes
        $articles = Cache::remember("education.{$track}.articles", 60, function () use ($track) {
            return Article::ofTrack($track)->get();
        });

        $trackName = $tracks[$track];
        return view('track', compact('track', 'trackName', 'articles'));
    }
    public function showEducationSection()
    {
        $tracks = config('education.tracks', []);
        // dd($tracks);
        return view('education-center', compact('tracks'));
    }
}