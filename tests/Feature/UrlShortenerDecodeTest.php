<?php

use App\Models\ShortUrl;
use Illuminate\Testing\Fluent\AssertableJson;

it('can decode a shortened url successfully', function () {
    $shortUrl = ShortUrl::factory()->create();

    $response = $this->getJson("/api/decode/{$shortUrl->short_url}");

    $response
        ->assertStatus(200)
        ->assertJson(fn (AssertableJson $json) => $json->has('url')
            ->where('url', $shortUrl->original_url)
        );
});

it('fails to decode with missing url', function () {
    $shortUrl = 'https://urldoesnotexist.com';

    $this->getJson("/api/decode/{$shortUrl}")
        ->assertStatus(404)
        ->assertJson(fn (AssertableJson $json) => $json->has('message')
            ->where('message', 'Url not found.')
        );
});

it('fails to decode with invalid url', function () {
    $shortUrl = 'invalid-url';

    $this->getJson("/api/decode/{$shortUrl}")
        ->assertStatus(404)
        ->assertJson(fn (AssertableJson $json) => $json->has('message')
            ->where('message', 'Url not found.')
        );
});
