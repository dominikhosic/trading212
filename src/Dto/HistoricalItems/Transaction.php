<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Dto\HistoricalItems;

use DateTimeImmutable;

readonly class Transaction
{
    public function __construct(public float $amount, public DateTimeImmutable $dateTime, public string $reference, public string $type,)
    {
    }

    /**
     * @param list<array{
     *     amount: float,
     *     dateTime: string,
     *     reference: string,
     *     type: string,
     * }> $data
     * @return list<Transaction>
     */
    public static function fromArrayList(array $data): array
    {
        return array_map(fn(array $order) => self::fromArray($order), $data);
    }

    /**
     * @param array{
     *     amount: float,
     *     dateTime: string,
     *     reference: string,
     *     type: string,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            amount: $data['amount'],
            dateTime: new DateTimeImmutable($data['dateTime']),
            reference: $data['reference'],
            type: $data['type'],
        );
    }
}
