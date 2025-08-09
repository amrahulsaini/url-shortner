<?php
namespace App\Http\Controllers;

use App\Models\Url; // <-- Import the Url model
use Illuminate\Http\Request;
use Illuminate\Support\Str; // <-- Import Laravel's string helper

class UrlController extends Controller
{
    /**
     * This method shows the main page with the form.
     */
    public function create()
    {
        // This will look for a file named 'shortener.blade.php' in resources/views
        return view('shortener');
    }

    /**
     * This method handles the form submission.
     */
    public function store(Request $request)
    {
        // 1. Validate the input to make sure it's a real, valid URL.
        $request->validate(['original_url' => 'required|url']);

        // 2. Generate a unique 6-character code.
        // The loop ensures if we accidentally create a code that already exists, we try again.
        do {
            $short_code = Str::random(6);
        } while (Url::where('short_code', $short_code)->exists());

        // 3. Create a new record in the `urls` table.
        $url = Url::create([
            'original_url' => $request->original_url,
            'short_code'   => $short_code,
        ]);

        // 4. Create the full short URL to display to the user.
        $short_url = url($url->short_code);

        // 5. Redirect back to the main page with a success message.
        return redirect('/')->with('success', "Short URL created! Your URL is: <a href='{$short_url}' target='_blank'>{$short_url}</a>");
    }

    /**
     * This method handles the redirection from a short URL to the original URL.
     */
    public function redirect(string $short_code)
    {
        // Find the URL by its short code. If not found, automatically show a 404 page.
        $url = Url::where('short_code', $short_code)->firstOrFail();

        // Redirect the user to the original long URL.
        return redirect($url->original_url);
    }
}