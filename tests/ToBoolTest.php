<?php declare(strict_types=1);

namespace StrictCastsTests;

use Generator;
use PHPUnit\Framework\TestCase;
use StrictCasts\Uncastable;
use function StrictCasts\toBool;

final class ToBoolTest extends TestCase
{
    /**
     * @param mixed $castable
     * @dataProvider provideCastable
     */
    public function testCastable(bool $expected, $castable): void
    {
        $this->assertSame($expected, toBool($castable));
    }

    public function provideCastable(): Generator
    {
        yield [true, 1];
        yield [false, 0];
        yield [true, '1'];
        yield [false, '0'];
        yield [true, ['hello']];
        yield [false, []];
        yield [true, 1.1];
        yield [false, 0.0];
    }

    /** @dataProvider provideUncastable */
    public function testUncastable($uncastable): void
    {
        $this->expectException(Uncastable::class);

        toBool($uncastable);
    }

    public function provideUncastable(): Generator
    {
        yield [-1];
        yield [2];
        yield [500];
        yield [''];
        yield ['2'];
        yield ['true'];
        yield ['false'];
        yield ['yes'];
        yield ['no'];
        yield [' 1'];
        yield ['0 '];
    }
}
