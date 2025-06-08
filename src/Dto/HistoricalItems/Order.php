<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Dto\HistoricalItems;

use DateTimeImmutable;

readonly class Order
{
    /** @param list<Tax> $taxes */
    public function __construct(
        public DateTimeImmutable $dateCreated,
        public ?DateTimeImmutable $dateExecuted,
        public DateTimeImmutable $dateModified,
        public ?string $executor,
        public ?float $fillCost,
        public ?int $fillId,
        public float $fillPrice,
        public ?float $fillResult,
        public string $fillType,
        public ?float $filledQuantity,
        public ?float $filledValue,
        public int $id,
        public ?float $limitPrice,
        public ?float $orderedQuantity,
        public ?float $orderedValue,
        public int $parentOrder,
        public string $status,
        public ?float $stopPrice,
        public array $taxes,
        public string $ticker,
        public ?string $timeValidity,
        public string $type,
    ) {
    }

    /**
     * @param list<array{
     *     dateCreated: string,
     *     dateExecuted: string|null,
     *     dateModified: string,
     *     executor: string|null,
     *     fillCost: float|null,
     *     fillId: int|null,
     *     fillPrice: float,
     *     fillResult: float|null,
     *     fillType: string,
     *     filledQuantity: float|null,
     *     filledValue: float|null,
     *     id: int,
     *     limitPrice: float|null,
     *     orderedQuantity: float|null,
     *     orderedValue: float|null,
     *     parentOrder: int,
     *     status: string,
     *     stopPrice: float|null,
     *     taxes: list<array{
     *         fillId: string,
     *         name: string,
     *         quantity: float,
     *         timeCharged: string,
     *     }>,
     *     ticker: string,
     *     timeValidity: string|null,
     *     type: string,
     * }> $data
     * @return list<Order>
     */
    public static function fromArrayList(array $data): array
    {
        return array_map(fn(array $order) => self::fromArray($order), $data);
    }

    /**
     * @param array{
     *     dateCreated: string,
     *     dateExecuted: string|null,
     *     dateModified: string,
     *     executor: string|null,
     *     fillCost: float|null,
     *     fillId: int,
     *     fillPrice: float,
     *     fillResult: float|null,
     *     fillType: string,
     *     filledQuantity: float|null,
     *     filledValue: float|null,
     *     id: int,
     *     limitPrice: float|null,
     *     orderedQuantity: float|null,
     *     orderedValue: float|null,
     *     parentOrder: int,
     *     status: string,
     *     stopPrice: float|null,
     *     taxes: list<array{
     *         fillId: string,
     *         name: string,
     *         quantity: float,
     *         timeCharged: string,
     *     }>,
     *     ticker: string,
     *     timeValidity: string|null,
     *     type: string,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            dateCreated: new DateTimeImmutable($data['dateCreated']),
            dateExecuted: ($data['dateExecuted'] ?? null) !== null ? new DateTimeImmutable($data['dateExecuted']) : null,
            dateModified: new DateTimeImmutable($data['dateModified']),
            executor: $data['executor'],
            fillCost: $data['fillCost'],
            fillId: $data['fillId'],
            fillPrice: $data['fillPrice'],
            fillResult: $data['fillResult'],
            fillType: $data['fillType'],
            filledQuantity: $data['filledQuantity'],
            filledValue: $data['filledValue'],
            id: $data['id'],
            limitPrice: $data['limitPrice'],
            orderedQuantity: $data['orderedQuantity'],
            orderedValue: $data['orderedValue'],
            parentOrder: $data['parentOrder'],
            status: $data['status'],
            stopPrice: $data['stopPrice'],
            taxes: array_map(fn(array $tax) => Tax::fromArray($tax), $data['taxes']),
            ticker: $data['ticker'],
            timeValidity: $data['timeValidity'],
            type: $data['type'],
        );
    }
}
