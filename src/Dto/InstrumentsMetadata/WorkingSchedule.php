<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Dto\InstrumentsMetadata;

readonly class WorkingSchedule
{
    /** @param list<TimeEvent> $timeEvents */
    public function __construct(public int $id, public array $timeEvents)
    {
    }

    /**
     * @param array{
     *     id: int,
     *     timeEvents: list<array{
     *         date: string,
     *         type: string,
     *     }>,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            timeEvents: array_map(fn(array $timeEvent) => TimeEvent::fromArray($timeEvent), $data['timeEvents']),
        );
    }
}
