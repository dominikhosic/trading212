<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Dto\HistoricalItems;

use DateTimeImmutable;
use JsonSerializable;
use MarekSkopal\Trading212\Utils\DateTimeUtils;

readonly class ExportCsv implements JsonSerializable
{
    public function __construct(public DataIncluded $dataIncluded, public DateTimeImmutable $timeFrom, public DateTimeImmutable $timeTo,)
    {
    }

    /**
     * @return array{
     *     dataIncluded: DataIncluded,
     *     timeFrom: string,
     *     timeTo: string,
     * }
     */
    public function jsonSerialize(): array
    {
        return [
            'dataIncluded' => $this->dataIncluded,
            'timeFrom' => DateTimeUtils::formatZulu($this->timeFrom),
            'timeTo' => DateTimeUtils::formatZulu($this->timeTo),
        ];
    }
}
