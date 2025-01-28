<?php

namespace App\Http\Controllers;

use App\Actions\UrlShortener;
use App\Http\Requests\EncodeUrlRequest;
use App\Http\Resources\ShortUrlResource;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class EncodeUrlController
{
    public function __invoke(EncodeUrlRequest $request, UrlShortener $urlShortener): JsonResponse
    {
        $shortenedUrl = $urlShortener->encode($request->url);

        return response()->json([
            'short_url' => $shortenedUrl->short_url
        ], Response::HTTP_CREATED);
    }
}
