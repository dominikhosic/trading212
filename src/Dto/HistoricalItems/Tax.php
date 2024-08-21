<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Dto\HistoricalItems;

use DateTimeImmutable;

readonly class Tax
{
    public function __construct(public string $fillId, public string $name, public float $quantity, public DateTimeImmutable $timeCharged,)
    {
    }

    /**
     * @param array{
     *     fillId: string,
     *     name: string,
     *     quantity: float,
     *     timeCharged: string,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            fillId: $data['fillId'],
            name: $data['name'],
            quantity: $data['quantity'],
            timeCharged: new DateTimeImmutable($data['timeCharged']),
        );
    }
}
