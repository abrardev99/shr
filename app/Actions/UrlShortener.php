<?php

namespace App\Actions;

use App\Models\ShortUrl;

class UrlShortener
{
    private const CHARACTERS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    private const CODE_LENGTH = 6;

    public function encode(string $url): ShortUrl
    {
        do {
            $code = $this->generateCode();
        } while (ShortUrl::where('url_key', $code)->exists());

        return ShortUrl::create([
            'original_url' => $url,
            'url_key' => $code,
            'short_url' => $this->buildShortenedUrl($code)
        ]);
    }

    public function decode(string $url): ?ShortUrl
    {
        return ShortUrl::where('short_url', $url)->first();
    }

    private function generateCode(): string
    {
        $code = '';
        for ($i = 0; $i < self::CODE_LENGTH; $i++) {
            $code .= self::CHARACTERS[random_int(0, strlen(self::CHARACTERS) - 1)];
        }
        return $code;
    }

    private function buildShortenedUrl(string $code): string
    {
        return config('app.url') . '/' . $code;
    }
}
