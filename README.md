# PHP Strict Casts

Strict type casting for super defensive PHP

## Installation

```
$ composer require ntzm/strict-casts
```

## Usage

This package provides the following strict casts:

- `stringToBool`
- `intToBool`
- `stringToInt`
- `stringToFloat`

And the following general casts, which work with any input, but use strict casts when they can:

- `toBool`
- `toInt`
- `toFloat`

## Why?

PHP's inbuilt type casting is not strict at all, and will take almost any type and turn it into another, no matter how
valid the conversion is, for example:

```php
(int) 'hello' === 0;
(int) '5 hello' === 5;
(int) 'hello 5' === 0;
(int) '123,456' === 123;
```

This is a source of a great number of bugs, headaches and crying.

By ensuring that the conversion is valid before conversion, we can ensure that the casting happens exactly as we would
expect it to, or it will fail! For example:

```php
stringToInt('123') === 123;
stringToInt('-123') === -123;

stringToInt('hello'); // throws exception
stringToInt('5 hello'); // throws exception
stringToInt('hello 5'); // throws exception
stringToInt('123,456'); // throws exception
```
