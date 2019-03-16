<?php

namespace Sid\Url\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

use Sid\Url\Url;

class UrlExtension extends AbstractExtension
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
            new TwigFunction(
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
