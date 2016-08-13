<?php

namespace Sid\Url\Twig;

use Twig_Extension;
use Twig_SimpleFunction;

use Sid\Url\Url;

class UrlExtension extends Twig_Extension
{
    /**
     * @var Url
     */
    protected $url;



    public function __construct(Url $url)
    {
        $this->url = $url;
    }



    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction(
                "url",
                [
                    $this->url,
                    "get",
                ]
            )
        ];
    }

    public function getName()
    {
        return "url";
    }
}
