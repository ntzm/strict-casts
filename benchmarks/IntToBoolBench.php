<?php declare(strict_types=1);

namespace StrictCastsBenchmarks;

use function StrictCasts\intToBool;

final class IntToBoolBench
{
    /**
     * @Revs(10000)
     * @Iterations(10)
     */
    public function benchCast(): void
    {
        (bool) 1;
        (bool) 0;
    }

    /**
     * @Revs(10000)
     * @Iterations(10)
     */
    public function benchFunction(): void
    {
        intToBool(1);
        intToBool(0);
    }
}
