<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Dto\EquityOrders;

use MarekSkopal\Trading212\Enum\TimeValidityEnum;

readonly class LimitOrder
{
    public function __construct(
        public float $limitPrice,
        public float $quantity,
        public string $ticker,
        public TimeValidityEnum $timeValidity,
    ) {
    }
}
