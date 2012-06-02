# Darkmown

## What's this?

[Markdown](http://daringfireball.net/projects/markdown/) / [Markdown Extra](http://michelf.com/projects/php-markdown/extra/) wrapper for [Kohana 3](http://kohanaframework.org/).

## What it can do?

It simply parses text and applies Markdown / Markdown Extra syntax to it.

## How to use it?

1. Clone module,
2. Put it in `modules/` dir,
3. Enable module in `bootstrap.php`,
4. Use it: `Darkmown::parse('This is **Sparta**!!!');`;

P.S. I assume you are familiar with Kohana 3.

## Any configuration? (It runs out of the box)

For more extensive configuration you can create `config/darkmown.php` in app's dirrectory. For example look at module's `config/darkmown.php`· Also, you can pass associative array to `parse()` method's 2nd param.

## Why it's called “Darkmown“?

There isn't any good reason, actually. I just like how word “Markdown“ gets changed.