<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Dto\EquityOrders;

use MarekSkopal\Trading212\Enum\TimeValidityEnum;

readonly class StopOrder
{
    public function __construct(
        public float $quantity,
        public float $stopPrice,
        public string $ticker,
        public TimeValidityEnum $timeValidity,
    ) {
    }
}
