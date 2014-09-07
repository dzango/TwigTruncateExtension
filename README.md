TwigTruncateExtension
=====================

A custom twig extension to truncate text while preserving HTML tags.

Usage
-----

The bundle exposes a `truncate` twig filter, which can be applied to any string.

```twig
{{ "some ... very ... large ... text"|truncate }}
```

### Arguments:

The truncate filter accepts 4 arguments, all of which have sensible defaults and can therefore be ignored most of the time:

```php
truncate($length = 500, $ending = '...', $exact = false, $consdierHtml = true)
```

* **length**: the maximum number of characters to display (excluding any HTML markup)
* **ending**: The characters to be appended to the truncated string (default `...`)
* **exact**: If set to true, the text may be cut off in the middle of a word. To avoid this, set this argument to false (default `false`)
* **considerHtml**: If set to true, HTML markup will be ignored and left unchanged (default `true`)

Compatibility with other filters or syntax
------------------------------------------

The filter is fully compatible with the markdown syntax, as well as with the `raw` filter. Assuming you app has enabled a `markdown` twig filter for parsing markdown, the following is fully suported:

```twig
{{ "some ... very ... long ... markdown text"|markdown|raw|truncate }}
```

Credits
-------

 * http://alanwhipple.com/2011/05/25/php-truncate-string-preserving-html-tags-words/ for the truncation logic
