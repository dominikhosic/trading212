<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Dto\HistoricalItems;

readonly class DataIncluded
{
    public function __construct(
        public bool $includeDividends,
        public bool $includeInterest,
        public bool $includeOrders,
        public bool $includeTransactions,
    ) {
    }

    /**
     * @param array{
     *     includeDividends: bool,
     *     includeInterest: bool,
     *     includeOrders: bool,
     *     includeTransactions: bool,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            includeDividends: $data['includeDividends'],
            includeInterest: $data['includeInterest'],
            includeOrders: $data['includeOrders'],
            includeTransactions: $data['includeTransactions'],
        );
    }
}
