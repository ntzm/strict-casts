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

/** @throws Uncastable */
function stringToInt(string $string): int {
    if (preg_match('/^-?\d+$/', $string) === 1) {
        return (int) $string;
    }

    throw new Uncastable("String {$string} cannot be cast to int");
}

/** @throws Uncastable */
function stringToFloat(string $string): float {
    if (preg_match('/^-?\d+(\.\d+)?$/', $string) === 1) {
        return (float) $string;
    }

    throw new Uncastable("String {$string} cannot be cast to float");
}
