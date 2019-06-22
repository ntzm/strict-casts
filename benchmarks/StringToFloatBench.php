<?php declare(strict_types=1);

namespace StrictCastsBenchmarks;

use function StrictCasts\stringToFloat;

final class StringToFloatBench
{
    /**
     * @Revs(10000)
     * @Iterations(10)
     */
    public function benchCast(): void
    {
        (float) '1.5';
        (float) '-1.5';
    }

    /**
     * @Revs(10000)
     * @Iterations(10)
     */
    public function benchFunction(): void
    {
        stringToFloat('1.5');
        stringToFloat('-1.5');
    }
}
