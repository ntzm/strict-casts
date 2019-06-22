<?php declare(strict_types=1);

namespace StrictCastsTests;

use Generator;
use PHPUnit\Framework\TestCase;
use StrictCasts\Uncastable;
use function StrictCasts\toFloat;

final class ToFloatTest extends TestCase
{
    /**
     * @param mixed $castable
     * @dataProvider provideCastable
     */
    public function testCastable(float $expected, $castable): void
    {
        $this->assertSame($expected, toFloat($castable));
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
        yield [5.0, 5];
        yield [0.0, []];
        yield [1.0, ['hello']];
        yield [0.1, '.1'];
        yield [1.0, '1.'];
        yield [1.2e3, '1.2e3'];
        yield [7E-10, '7E-10'];
    }

    /** @dataProvider provideUncastable */
    public function testUncastable(string $uncastable): void
    {
        $this->expectException(Uncastable::class);

        toFloat($uncastable);
    }

    public function provideUncastable(): Generator
    {
        yield [''];
        yield [' 1.1'];
        yield [' 1.1 '];
        yield ['1.1 '];
        yield ['1.1.1'];
        yield ['0xf4c3b00c'];
        yield ['0b10100111001'];
    }
}
