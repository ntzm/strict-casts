<?php declare(strict_types=1);

namespace StrictCastsTests;

use Generator;
use PHPUnit\Framework\TestCase;
use StrictCasts\Uncastable;
use function StrictCasts\stringToInt;

final class StringToIntTest extends TestCase
{
    /** @dataProvider provideCastable */
    public function testCastable(int $expected, string $castable): void
    {
        $this->assertSame($expected, stringToInt($castable));
    }

    public function provideCastable(): Generator
    {
        yield [1, '1'];
        yield [2, '2'];
        yield [-5, '-5'];
        yield [0, '0'];
    }

    /** @dataProvider provideUncastable */
    public function testUncastable(string $uncastable): void
    {
        $this->expectException(Uncastable::class);

        stringToInt($uncastable);
    }

    public function provideUncastable(): Generator
    {
        yield [''];
        yield [' 0'];
        yield [' 0 '];
        yield ['0 '];
        yield ['--5'];
        yield ['+5'];
        yield ['99 red balloons'];
        yield ['99,000'];
        yield ['99.99'];
        yield ['-'];
    }
}
