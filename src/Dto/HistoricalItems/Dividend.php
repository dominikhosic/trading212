<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Dto\HistoricalItems;

use DateTimeImmutable;

readonly class Dividend
{
    public function __construct(
        public float $amount,
        public float $amountInEuro,
        public float $grossAmountPerShare,
        public DateTimeImmutable $paidOn,
        public float $quantity,
        public string $reference,
        public string $ticker,
        public string $type,
    ) {
    }

    /**
     * @param list<array{
     *     amount: float,
     *     amountInEuro: float,
     *     grossAmountPerShare: float,
     *     paidOn: string,
     *     quantity: float,
     *     reference: string,
     *     ticker: string,
     *     type: string,
     * }> $data
     * @return list<Dividend>
     */
    public static function fromArrayList(array $data): array
    {
        return array_map(fn(array $order) => self::fromArray($order), $data);
    }

    /**
     * @param array{
     *     amount: float,
     *     amountInEuro: float,
     *     grossAmountPerShare: float,
     *     paidOn: string,
     *     quantity: float,
     *     reference: string,
     *     ticker: string,
     *     type: string,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            amount: $data['amount'],
            amountInEuro: $data['amountInEuro'],
            grossAmountPerShare: $data['grossAmountPerShare'],
            paidOn: new DateTimeImmutable($data['paidOn']),
            quantity: $data['quantity'],
            reference: $data['reference'],
            ticker: $data['ticker'],
            type: $data['type'],
        );
    }
}
