<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function create()
    {
        return view('shortener');
    }

    public function store(Request $request)
    {
        $request->validate(['original_url' => 'required|url']);

        do {
            $short_code = Str::random(6);
        } while (Url::where('short_code', $short_code)->exists());

        $url = Url::create([
            'original_url' => $request->original_url,
            'short_code'   => $short_code,
        ]);

        $short_url = url($url->short_code);

        return redirect('/')->with('success', "Short URL created! Your URL is: <a href='{$short_url}' target='_blank'>{$short_url}</a>");
    }

    public function redirect(string $short_code)
    {
        $url = Url::where('short_code', $short_code)->firstOrFail();
        
        return redirect($url->original_url);
    }
}