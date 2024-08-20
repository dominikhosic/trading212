<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Dto\Pies;

readonly class Instrument
{
    /** @param list<Issue> $issues */
    public function __construct(
        public float $currentShare,
        public float $expectedShare,
        public array $issues,
        public float $ownedQuantity,
        public Result $result,
        public string $ticker,
    ) {
    }

    /**
     * @param array{
     *     currentShare: float,
     *     expectedShare: float,
     *     issues: list<array{
     *         name: string,
     *         severity: string,
     *     }>,
     *     ownedQuantity: float,
     *     result: array{
     *         investedValue: float,
     *         result: float,
     *         resultCoef: float,
     *         value: float,
     *     },
     *     ticker: string,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            currentShare: $data['currentShare'],
            expectedShare: $data['expectedShare'],
            issues: array_map(
                fn(array $issue): Issue => Issue::fromArray($issue),
                $data['issues'],
            ),
            ownedQuantity: $data['ownedQuantity'],
            result: Result::fromArray($data['result']),
            ticker: $data['ticker'],
        );
    }
}
