<?php

namespace Sid\Url\Test\Unit\Twig;

use Sid\Url\Url;
use Sid\Url\Twig\UrlExtension;

use Twig_Loader_Array;
use Twig_Environment;

class UrlExtensionTest extends \Codeception\TestCase\Test
{
    /**
     * @dataProvider provider
     */
    public function testExtension(string $baseUri, string $expected, string $uri)
    {
        $url = new Url($baseUri);



        $loader = new Twig_Loader_Array(
            [
                "template" => "{{ url(url) }}",
            ]
        );

        $twig = new Twig_Environment($loader);



        $twig->addExtension(
            new UrlExtension($url)
        );



        $actual = $twig->render(
            "template",
            [
                "url" => $uri
            ]
        );



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
