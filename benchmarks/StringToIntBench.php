<?php declare(strict_types=1);

namespace StrictCastsBenchmarks;

use function StrictCasts\stringToInt;

final class StringToIntBench
{
    /**
     * @Revs(10000)
     * @Iterations(10)
     */
    public function benchCast(): void
    {
        (int) '1';
        (int) '-1';
    }

    /**
     * @Revs(10000)
     * @Iterations(10)
     */
    public function benchFunction(): void
    {
        stringToInt('1');
        stringToInt('-1');
    }
}
