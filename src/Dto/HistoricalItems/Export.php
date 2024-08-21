<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Dto\HistoricalItems;

use DateTimeImmutable;

readonly class Export
{
    public function __construct(
        public DataIncluded $dataIncluded,
        public string $downloadLink,
        public int $reportId,
        public string $status,
        public DateTimeImmutable $timeFrom,
        public DateTimeImmutable $timeTo,
    ) {
    }

    /** @return list<Export> */
    public static function fromJsonList(string $json): array
    {
        /**
         * @var list<array{
         *     dataIncluded: array{
         *         includeDividends: bool,
         *         includeInterest: bool,
         *         includeOrders: bool,
         *         includeTransactions: bool,
         *     },
         *     downloadLink: string,
         *     reportId: int,
         *     status: string,
         *     timeFrom: string,
         *     timeTo: string,
         * }> $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return array_map(fn(array $exchange) => self::fromArray($exchange), $responseContents);
    }

    /**
     * @param array{
     *     dataIncluded: array{
     *         includeDividends: bool,
     *         includeInterest: bool,
     *         includeOrders: bool,
     *         includeTransactions: bool,
     *     },
     *     downloadLink: string,
     *     reportId: int,
     *     status: string,
     *     timeFrom: string,
     *     timeTo: string,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            dataIncluded: DataIncluded::fromArray($data['dataIncluded']),
            downloadLink: $data['downloadLink'],
            reportId: $data['reportId'],
            status: $data['status'],
            timeFrom: new DateTimeImmutable($data['timeFrom']),
            timeTo: new DateTimeImmutable($data['timeTo']),
        );
    }
}
