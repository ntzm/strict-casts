<?php declare(strict_types=1);

namespace StrictCasts;

/** @throws Uncastable */
function stringToBool(string $string): bool {
    if ($string === '1') {
        return true;
    }

    if ($string === '0') {
        return false;
    }

    throw new Uncastable("String {$string} cannot be cast to bool");
}

/** @throws Uncastable */
function intToBool(int $int): bool {
    if ($int === 1) {
        return true;
    }

    if ($int === 0) {
        return false;
    }

    throw new Uncastable("Int {$int} cannot be cast to bool");
}

/**
 * @param mixed $value
 * @throws Uncastable
 */
function toBool($value): bool {
    if (is_string($value)) {
        return stringToBool($value);
    }

    if (is_int($value)) {
        return intToBool($value);
    }

    return (bool) $value;
}

/** @throws Uncastable */
function stringToInt(string $string): int {
    if (preg_match('/^-?\d+$/', $string) === 1) {
        return (int) $string;
    }

    throw new Uncastable("String {$string} cannot be cast to int");
}

/**
 * @param mixed $value
 * @throws Uncastable
 */
function toInt($value): int {
    if (is_string($value)) {
        return stringToInt($value);
    }

    return (int) $value;
}

/** @throws Uncastable */
function stringToFloat(string $string): float {
    // is_numeric allows leading whitespace, but we don't want to allow that
    if (is_numeric($string) && ! ctype_space($string[0] ?? null)) {
        return (float) $string;
    }

    throw new Uncastable("String {$string} cannot be cast to float");
}

/**
 * @param mixed $value
 * @throws Uncastable
 */
function toFloat($value): float {
    if (is_string($value)) {
        return stringToFloat($value);
    }

    return (float) $value;
}
