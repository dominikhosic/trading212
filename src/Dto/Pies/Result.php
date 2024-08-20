<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Dto\Pies;

readonly class Result
{
    public function __construct(public float $investedValue, public float $result, public float $resultCoef, public float $value,)
    {
    }

    /**
     * @param array{
     *     investedValue: float,
     *     result: float,
     *     resultCoef: float,
     *     value: float,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            investedValue: $data['investedValue'],
            result: $data['result'],
            resultCoef: $data['resultCoef'],
            value: $data['value'],
        );
    }
}
