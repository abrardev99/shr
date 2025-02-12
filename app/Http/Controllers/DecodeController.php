<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DecodeController
{
    public function __invoke(ShortUrl $shortUrl): JsonResponse
    {
        return response()->json([
            'url' => $shortUrl->original_url,
        ], Response::HTTP_OK);
    }
}
