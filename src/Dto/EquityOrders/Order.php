<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Dto\EquityOrders;

use DateTimeImmutable;

readonly class Order
{
    public function __construct(
        public DateTimeImmutable $creationTime,
        public float $filledQuantity,
        public float $filledValue,
        public int $id,
        public float $limitPrice,
        public float $quantity,
        public string $status,
        public float $stopPrice,
        public string $strategy,
        public string $ticker,
        public string $type,
        public float $value,
    ) {
    }

    /** @return list<Order> */
    public static function fromJsonList(string $json): array
    {
        /**
         * @var list<array{
         *     creationTime: string,
         *     filledQuantity: float,
         *     filledValue: float,
         *     id: int,
         *     limitPrice: float,
         *     quantity: float,
         *     status: string,
         *     stopPrice: float,
         *     strategy: string,
         *     ticker: string,
         *     type: string,
         *     value: float,
         *  }> $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return array_map(fn(array $order) => self::fromArray($order), $responseContents);
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     creationTime: string,
         *     filledQuantity: float,
         *     filledValue: float,
         *     id: int,
         *     limitPrice: float,
         *     quantity: float,
         *     status: string,
         *     stopPrice: float,
         *     strategy: string,
         *     ticker: string,
         *     type: string,
         *     value: float,
         *  } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     creationTime: string,
     *     filledQuantity: float,
     *     filledValue: float,
     *     id: int,
     *     limitPrice: float,
     *     quantity: float,
     *     status: string,
     *     stopPrice: float,
     *     strategy: string,
     *     ticker: string,
     *     type: string,
     *     value: float,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            creationTime: new DateTimeImmutable($data['creationTime']),
            filledQuantity: $data['filledQuantity'],
            filledValue: $data['filledValue'],
            id: $data['id'],
            limitPrice: $data['limitPrice'],
            quantity: $data['quantity'],
            status: $data['status'],
            stopPrice: $data['stopPrice'],
            strategy: $data['strategy'],
            ticker: $data['ticker'],
            type: $data['type'],
            value: $data['value'],
        );
    }
}
