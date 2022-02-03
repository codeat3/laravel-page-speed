<?php

namespace Codeat3\LaravelPageSpeed\Test\Middleware;

use Codeat3\LaravelPageSpeed\Middleware\InsertDNSPrefetch;
use Codeat3\LaravelPageSpeed\Test\TestCase;

class InsertDNSPrefetchTest extends TestCase
{
    protected function getMiddleware()
    {
        $this->middleware = new InsertDNSPrefetch();
    }

    public function testInsertDNSPrefetch()
    {
        $response = $this->middleware->handle($this->request, $this->getNext());

        $this->assertStringContainsString('<link rel="dns-prefetch" href="//github.com">', $response->getContent());
        $this->assertStringContainsString('<link rel="dns-prefetch" href="//browsehappy.com">', $response->getContent());
        $this->assertStringContainsString('<link rel="dns-prefetch" href="//emblemsbf.com">', $response->getContent());
        $this->assertStringContainsString('<link rel="dns-prefetch" href="//code.jquery.com">', $response->getContent());
        $this->assertStringContainsString('<link rel="dns-prefetch" href="//www.google-analytics.com">', $response->getContent());
    }
}
