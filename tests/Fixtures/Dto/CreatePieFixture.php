<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Tests\Fixtures\Dto;

use DateTimeImmutable;
use MarekSkopal\Trading212\Dto\Pies\CreatePie;
use MarekSkopal\Trading212\Enum\DividendCashActionEnum;
use MarekSkopal\Trading212\Enum\IconEnum;

final class CreatePieFixture
{
    public static function create(): CreatePie
    {
        return new CreatePie(
            dividendCashAction: DividendCashActionEnum::Reinvest,
            endDate: new DateTimeImmutable('2025-01-01'),
            goal: 100,
            icon: IconEnum::Burger,
            instrumentShares: [
                'AAPL' => 50,
                'MSFT' => 50,
            ],
            name: 'Tech Pie',
        );
    }
}
