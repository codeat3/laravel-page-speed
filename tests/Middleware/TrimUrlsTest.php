<?php

namespace Codeat3\LaravelPageSpeed\Test\Middleware;

use Codeat3\LaravelPageSpeed\Middleware\TrimUrls;
use Codeat3\LaravelPageSpeed\Test\TestCase;

class TrimUrlsTest extends TestCase
{
    protected function getMiddleware()
    {
        $this->middleware = new TrimUrls();
    }

    public function testTrimUrls()
    {
        $response = $this->middleware->handle($this->request, $this->getNext());

        $this->assertStringNotContainsString("https://", $response->getContent());
        $this->assertStringNotContainsString("http://", $response->getContent());
        $this->assertStringContainsString("//code.jquery.com/jquery-3.2.1.min.js", $response->getContent());
    }
}
