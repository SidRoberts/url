# Url

URL generator.

[![Build Status](https://img.shields.io/travis/SidRoberts/url/2.0.x.svg?style=for-the-badge)](https://travis-ci.org/SidRoberts/url)
[![GitHub release](https://img.shields.io/github/release/SidRoberts/url.svg?style=for-the-badge)]()

[![License](https://img.shields.io/github/license/SidRoberts/url.svg?style=for-the-badge)]()

[![GitHub issues](https://img.shields.io/github/issues-raw/SidRoberts/url.svg?style=for-the-badge)]()
[![GitHub pull requests](https://img.shields.io/github/issues-pr-raw/SidRoberts/url.svg?style=for-the-badge)]()




## Installation

```bash
composer require sidroberts/url
```



## Usage

This component takes care of trailing and leading slashes.

```php
$baseUri = "https://example.com";

$url = new \Sid\Url\Url($baseUri);

// https://example.com/path/to/something
echo $url->get("path/to/something");

// https://example.com/path/to/something
echo $url->get("/path/to/something");
```

You can now easily change your base URI depending on the environment (for
example: development and production).

You can also specify URL arguments which are automatically sanitised and encoded by [`http_build_query()`](http://php.net/http_build_query):

```php
// https://example.com/path/to/something?title=hello+world&page=123
echo $url->get(
    "/path/to/something",
    [
        "title" => "hello world",
        "page"  => 123,
    ]
);
```
