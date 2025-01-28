<?php

namespace App\Http\Controllers;

use App\Actions\UrlShortener;
use App\Models\ShortUrl;
use Illuminate\Http\Request;

class HomeController
{
    public function __invoke(string $urlKey, UrlShortener $urlShortener)
    {
        $shortUrl = $urlShortener->decode($urlKey);

        return redirect()->away($shortUrl->original_url);
    }
}
