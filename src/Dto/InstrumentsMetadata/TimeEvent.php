<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Dto\InstrumentsMetadata;

use DateTimeImmutable;

readonly class TimeEvent
{
    public function __construct(public DateTimeImmutable $date, public string $type)
    {
    }

    /**
     * @param array{
     *     date: string,
     *     type: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            date: new DateTimeImmutable($data['date']),
            type: $data['type'],
        );
    }
}
