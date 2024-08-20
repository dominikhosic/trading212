<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Dto\Pies;

use DateTimeImmutable;
use JsonSerializable;
use MarekSkopal\Trading212\Enum\DividendCashActionEnum;
use MarekSkopal\Trading212\Enum\IconEnum;
use MarekSkopal\Trading212\Utils\DateTimeUtils;

readonly class CreatePie implements JsonSerializable
{
    /** @param array<string, float> $instrumentShares */
    public function __construct(
        public DividendCashActionEnum $dividendCashAction,
        public DateTimeImmutable $endDate,
        public int $goal,
        public IconEnum $icon,
        public array $instrumentShares,
        public string $name,
    ) {
    }

    /**
     * @return array{
     *     dividendCashAction: string,
     *     endDate: string,
     *     goal: int,
     *     icon: string,
     *     instrumentShares: array<string, float>,
     *     name: string,
     *  }
     */
    public function jsonSerialize(): array
    {
        return [
            'dividendCashAction' => $this->dividendCashAction->value,
            'endDate' => DateTimeUtils::formatZulu($this->endDate),
            'goal' => $this->goal,
            'icon' => $this->icon->value,
            'instrumentShares' => $this->instrumentShares,
            'name' => $this->name,
        ];
    }
}
