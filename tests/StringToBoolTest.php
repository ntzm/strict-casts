<?php declare(strict_types=1);

namespace StrictCastsTests;

use Generator;
use PHPUnit\Framework\TestCase;
use StrictCasts\Uncastable;
use function StrictCasts\stringToBool;

final class StringToBoolTest extends TestCase
{
    /** @dataProvider provideCastable */
    public function testCastable(bool $expected, string $castable): void
    {
        $this->assertSame($expected, stringToBool($castable));
    }

    public function provideCastable(): Generator
    {
        yield [true, '1'];
        yield [false, '0'];
    }

    /** @dataProvider provideUncastable */
    public function testUncastable(string $uncastableString): void
    {
        $this->expectException(Uncastable::class);

        stringToBool($uncastableString);
    }

    public function provideUncastable(): Generator
    {
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