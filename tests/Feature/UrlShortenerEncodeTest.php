<?php

use App\Models\ShortUrl;
use Illuminate\Testing\Fluent\AssertableJson;

it('can encode a url successfully', function () {
    $response = $this->postJson('/api/encode', [
        'url' => 'https://www.thisisalongdomain.com/with/some/parameters?and=here_too'
    ]);

    $response
        ->assertStatus(201)
        ->assertJson(fn (AssertableJson $json) => $json->has('short_url')
                ->where('short_url', ShortUrl::first()->short_url)
        );
});

it('fails to encode when url is missing', function () {
    $response = $this->postJson('/api/encode', []);

    $response
        ->assertStatus(422)
        ->assertJsonValidationErrors(['url']);
});

it('fails to encode with invalid url format', function () {
    $response = $this->postJson('/api/encode', [
        'url' => 'not-a-valid-url'
    ]);

    $response
        ->assertStatus(422)
        ->assertJsonValidationErrors(['url']);
});
