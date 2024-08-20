<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Dto\Pies;

readonly class PieItem
{
    public function __construct(
        public float $cash,
        public DividendDetail $dividendDetails,
        public int $id,
        public ?float $progress,
        public Result $result,
        public ?string $status,
    ) {
    }

    /** @return list<PieItem> */
    public static function fromJsonList(string $json): array
    {
        /**
         * @var list<array{
         *     cash: float,
         *     dividendDetails: array{
         *         gained: float,
         *         inCash: float,
         *         reinvested: float,
         *     },
         *     id: int,
         *     progress: float|null,
         *     result: array{
         *         investedValue: float,
         *         result: float,
         *         resultCoef: float,
         *         value: float,
         *     },
         *     status: string|null,
         *  }> $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return array_map(fn(array $exchange) => self::fromArray($exchange), $responseContents);
    }

    /**
     * @param array{
     *     cash: float,
     *     dividendDetails: array{
     *         gained: float,
     *         inCash: float,
     *         reinvested: float,
     *     },
     *     id: int,
     *     progress: float|null,
     *     result: array{
     *         investedValue: float,
     *         result: float,
     *         resultCoef: float,
     *         value: float,
     *     },
     *     status: string|null,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            cash: $data['cash'],
            dividendDetails: DividendDetail::fromArray($data['dividendDetails']),
            id: $data['id'],
            progress: $data['progress'],
            result: Result::fromArray($data['result']),
            status: $data['status'],
        );
    }
}
