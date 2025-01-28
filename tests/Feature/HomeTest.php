<?php

use App\Models\ShortUrl;

it('redirects to the original url', function () {
    $shortUrl = ShortUrl::factory()->create();

    $this->get($shortUrl->short_url)
        ->assertStatus(302)
        ->assertRedirect($shortUrl->original_url);
});
