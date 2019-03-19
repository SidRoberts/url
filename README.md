# Url

URL generator.

[![Build Status](https://travis-ci.org/SidRoberts/url.svg?branch=master)](https://travis-ci.org/SidRoberts/url)
[![GitHub tag](https://img.shields.io/github/tag/sidroberts/url.svg?maxAge=2592000)]()



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
