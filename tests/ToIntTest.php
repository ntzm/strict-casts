<?php declare(strict_types=1);

namespace StrictCastsTests;

use Generator;
use PHPUnit\Framework\TestCase;
use StrictCasts\Uncastable;
use function StrictCasts\toInt;

final class ToIntTest extends TestCase
{
    /**
     * @param mixed $castable
     * @dataProvider provideCastable
     */
    public function testCastable(int $expected, $castable): void
    {
        $this->assertSame($expected, toInt($castable));
    }

    public function provideCastable(): Generator
    {
        yield [1, '1'];
        yield [2, '2'];
        yield [-5, '-5'];
        yield [0, '0'];
        yield [1, 1.2];
        yield [1, 1.2];
        yield [1, 1.2];
        yield [0, []];
        yield [1, ['hello']];
    }

    /** @dataProvider provideUncastable */
    public function testUncastable(string $uncastable): void
    {
        $this->expectException(Uncastable::class);

        toInt($uncastable);
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
