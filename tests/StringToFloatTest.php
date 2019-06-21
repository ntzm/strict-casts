<?php declare(strict_types=1);

namespace StrictCastsTests;

use Generator;
use PHPUnit\Framework\TestCase;
use StrictCasts\Uncastable;
use function StrictCasts\stringToFloat;

final class StringToFloatTest extends TestCase
{
    /** @dataProvider provideCastable */
    public function testCastable(float $expected, string $castable): void
    {
        $this->assertSame($expected, stringToFloat($castable));
    }

    public function provideCastable(): Generator
    {
        yield [1.1, '1.1'];
        yield [2.2, '2.2'];
        yield [-5.5, '-5.5'];
        yield [1.0, '1'];
        yield [2.0, '2'];
        yield [-5.0, '-5'];
        yield [0.0, '0'];
    }

    /** @dataProvider provideUncastable */
    public function testUncastable(string $uncastable): void
    {
        $this->expectException(Uncastable::class);

        stringToFloat($uncastable);
    }

    public function provideUncastable(): Generator
    {
        yield [''];
        yield [' 1.1'];
        yield [' 1.1 '];
        yield ['1.1 '];
        yield ['1.1.1'];
        yield ['1.'];
        yield ['.1'];
    }
}
