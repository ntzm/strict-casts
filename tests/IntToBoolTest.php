<?php declare(strict_types=1);

namespace StrictCastsTests;

use Generator;
use PHPUnit\Framework\TestCase;
use StrictCasts\Uncastable;
use function StrictCasts\intToBool;

final class IntToBoolTest extends TestCase
{
    /** @dataProvider provideCastable */
    public function testCastable(bool $expected, int $castable): void
    {
        $this->assertSame($expected, intToBool($castable));
    }

    public function provideCastable(): Generator
    {
        yield [true, 1];
        yield [false, 0];
    }

    /** @dataProvider provideUncastable */
    public function testUncastable(int $uncastable): void
    {
        $this->expectException(Uncastable::class);

        intToBool($uncastable);
    }

    public function provideUncastable(): Generator
    {
        yield [-1];
        yield [2];
        yield [500];
    }
}
