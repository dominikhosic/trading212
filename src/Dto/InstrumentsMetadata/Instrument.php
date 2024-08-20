<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Dto\InstrumentsMetadata;

use DateTimeImmutable;

readonly class Instrument
{
    public function __construct(
        public DateTimeImmutable $addedOn,
        public string $currencyCode,
        public string $isin,
        public float $maxOpenQuantity,
        public float $minTradeQuantity,
        public string $name,
        public ?string $shortname,
        public string $ticker,
        public string $type,
        public int $workingScheduleId,
    ) {
    }

    /** @return list<Instrument> */
    public static function fromJsonList(string $json): array
    {
        /**
         * @var list<array{
         *     addedOn: string,
         *     currencyCode: string,
         *     isin: string,
         *     maxOpenQuantity: float,
         *     minTradeQuantity: float,
         *     name: string,
         *     shortname?: string|null,
         *     ticker: string,
         *     type: string,
         *     workingScheduleId: int,
         *  }> $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return array_map(fn(array $exchange) => self::fromArray($exchange), $responseContents);
    }

    /**
     * @param array{
     *     addedOn: string,
     *     currencyCode: string,
     *     isin: string,
     *     maxOpenQuantity: float,
     *     minTradeQuantity: float,
     *     name: string,
     *     shortname?: string|null,
     *     ticker: string,
     *     type: string,
     *     workingScheduleId: int,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            addedOn: new DateTimeImmutable($data['addedOn']),
            currencyCode: $data['currencyCode'],
            isin: $data['isin'],
            maxOpenQuantity: $data['maxOpenQuantity'],
            minTradeQuantity: $data['minTradeQuantity'],
            name: $data['name'],
            shortname: $data['shortname'] ?? null,
            ticker: $data['ticker'],
            type: $data['type'],
            workingScheduleId: $data['workingScheduleId'],
        );
    }
}
