<?php

namespace App\Services;

use App\Interfaces\HttpClientInterface;
use Illuminate\Support\Facades\Http;

class HttpClientService implements HttpClientInterface
{
    public function get(String $url, String $query = null)
    {
        return json_decode(Http::get($url, $query)->body(), true);
    }
}
