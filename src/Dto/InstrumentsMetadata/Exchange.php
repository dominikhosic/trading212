<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Dto\InstrumentsMetadata;

readonly class Exchange
{
    /** @param list<WorkingSchedule> $workingSchedules */
    public function __construct(public int $id, public string $name, public array $workingSchedules)
    {
    }

    /** @return list<Exchange> */
    public static function fromJsonList(string $json): array
    {
        /**
         * @var list<array{
         *     id: int,
         *     name: string,
         *     workingSchedules: list<array{
         *         id: int,
         *         timeEvents: list<array{
         *             date: string,
         *             type: string,
         *         }>,
         *     }>
         *  }> $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return array_map(fn(array $exchange) => self::fromArray($exchange), $responseContents);
    }

    /**
     * @param array{
     *     id: int,
     *     name: string,
     *     workingSchedules: list<array{
     *         id: int,
     *         timeEvents: list<array{
     *             date: string,
     *             type: string,
     *         }>,
     *     }>
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
            workingSchedules: array_map(
                fn(array $workingSchedule) => WorkingSchedule::fromArray($workingSchedule),
                $data['workingSchedules'],
            ),
        );
    }
}
