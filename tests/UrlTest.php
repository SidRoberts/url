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
     * @dataProvider providerUrl
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

    public function providerUrl()
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



    /**
     * @dataProvider providerArguments
     */
    public function testArguments(string $expected, string $uri, array $arguments)
    {
        $url = new Url();

        $actual = $url->get($uri, $arguments);



        $this->assertEquals(
            $expected,
            $actual
        );
    }

    public function providerArguments()
    {
        return [
            [
                "expected"  => "/some/path",
                "uri"       => "some/path",
                "arguments" => [],
            ],

            [
                "expected"  => "/some/path?title=hello+world",
                "uri"       => "some/path",
                "arguments" => [
                    "title" => "hello world",
                ],
            ],

            [
                "expected"  => "/some/path?title=hello+world&page=123",
                "uri"       => "some/path",
                "arguments" => [
                    "title" => "hello world",
                    "page"  => 123,
                ],
            ],

            [
                "expected"  => "/some/path?arguments=already&title=hello+world",
                "uri"       => "some/path?arguments=already",
                "arguments" => [
                    "title" => "hello world",
                ],
            ],

            [
                "expected"  => "/some/path?arguments=already&title=hello+world&page=123",
                "uri"       => "some/path?arguments=already",
                "arguments" => [
                    "title" => "hello world",
                    "page"  => 123,
                ],
            ],
        ];
    }
}
