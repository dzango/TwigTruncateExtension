TwigTruncateExtension
=====================

A custom twig extension to truncate text while preserving HTML tags.

Installation
------------

Add the library to your app's `composer.json`:

```json
    "require": {
        "dzango/twig-truncate-extension": "~1.0",
        ...
    }

```

Add the extension to the `Twig_Environment`:

```php

use Dzango\Twig\Extension\Truncate;

$twig = new Twig_Environment(...);

$twig->addExtension(new Truncate());
```

Symfony2
--------

To use this extension in a symfony2 project, you have 2 options:

### 1. Add a service "manually"

```yaml
# app/config/config.yml

services:
    dzango.twig.truncate_extension:
        class: Dzango\Twig\Extension\Truncate
        tags:
            - { name: twig.extension }
```

### 2. Use the TwigTruncateBundle

The [Dzango/TwigTruncateBundle](https://github.com/dzango/TwigTruncateBundle) will register the extension for you as a service.

Usage
-----

The bundle exposes a `truncate` twig filter, which can be applied to any string.

```twig
{{ "some ... very ... large ... text"|truncate }}
```

### Arguments:

The truncate filter accepts 4 arguments, all of which have sensible defaults and can therefore be ignored most of the time:

```php
truncate($length = 100, $ending = '...', $exact = false, $considerHtml = true)
```

* **length**: the maximum number of characters to display, excluding any HTML markup (default `100`)
* **ending**: The characters to be appended to the truncated string (default `...`)
* **exact**: If set to true, the text may be cut off in the middle of a word. To avoid this, set this argument to false (default `false`)
* **considerHtml**: If set to true, HTML markup will be ignored and left unchanged (default `true`)

Compatibility with other filters or syntax
------------------------------------------

The filter is fully compatible with the markdown syntax, as well as with the `raw` filter. Assuming your app has enabled a `markdown` twig filter for parsing markdown, the following is fully supported:

```twig
{{ "some ... very ... long ... markdown text"|markdown|raw|truncate }}
```

Credits
-------

 * http://alanwhipple.com/2011/05/25/php-truncate-string-preserving-html-tags-words/ for the truncation logic
