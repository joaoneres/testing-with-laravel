<?php

namespace App\Interfaces;

interface HttpClientInterface
{
    public function get(String $url, String $query = null);
}
