<?php

namespace App\Http\Controllers;

use App\Actions\UrlShortener;
use App\Http\Requests\EncodeUrlRequest;
use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use function Pest\Laravel\json;

class DecodeController
{
    public function __invoke(ShortUrl $shortUrl)
    {
        return response()->json([
            'url' => $shortUrl->original_url
        ], Response::HTTP_OK);
    }
}
