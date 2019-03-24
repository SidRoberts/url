<?php

namespace Sid\Url;

class Url
{
    /**
     * @var string
     */
    protected $baseUri;



    public function __construct(string $baseUri = "")
    {
        $this->baseUri = $baseUri;
    }



    public function getBaseUri() : string
    {
        return $this->baseUri;
    }



    public function get(string $uri = "", array $arguments = []) : string
    {
        $uri = rtrim($this->baseUri, "/") . "/" . ltrim($uri, "/");

        $queryString = http_build_query($arguments);

        if (strlen($queryString) > 0) {
            if (strpos($uri, "?") !== false) {
                $uri .= "&" . $queryString;
            } else {
                $uri .= "?" . $queryString;
            }
        }

        return $uri;
    }
}
