<?php

use App\Interfaces\LoggerInterface;
use Illuminate\Support\Facades\Log;

class LoggerRepository implements LoggerInterface
{
    public function log(String $message)
    {
        Log::info($message);
    }
}
