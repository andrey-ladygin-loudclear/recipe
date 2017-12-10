<?php

namespace App\Parser;

use Goutte\Client;

abstract class Parser
{
    protected $baseUrl;
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    abstract public function run();
}
