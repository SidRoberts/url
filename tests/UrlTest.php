<?php

namespace Sid\Url\Test\Unit;

use Codeception\TestCase\Test;
use Sid\Url\Url;

class UrlTest extends Test
{
    public function testGetBaseUrl()
    {
        $baseUri = "http://www.example.com";



        $url = new Url($baseUri);

        $this->assertEquals(
            $baseUri,
            $url->getBaseUri()
        );
    }

    /**
     * @dataProvider provider
     */
    public function testUrl(string $baseUri, string $expected, string $uri)
    {
        $url = new Url($baseUri);

        $actual = $url->get($uri);



        $this->assertEquals(
            $expected,
            $actual
        );
    }

    public function provider()
    {
        return [
            [
                "baseUri"  => "",
                "expected" => "/",
                "uri"      => "",
            ],

            [
                "baseUri"  => "",
                "expected" => "/",
                "uri"      => "/",
            ],

            [
                "baseUri"  => "",
                "expected" => "/this/is/the/path",
                "uri"      => "this/is/the/path",
            ],

            [
                "baseUri"  => "http://www.example.com",
                "expected" => "http://www.example.com/",
                "uri"      => "",
            ],

            [
                "baseUri"  => "http://www.example.com",
                "expected" => "http://www.example.com/",
                "uri"      => "/",
            ],

            [
                "baseUri"  => "http://www.example.com",
                "expected" => "http://www.example.com/this/is/the/path",
                "uri"      => "/this/is/the/path",
            ],
        ];
    }
}
