<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Dto\AccountData;

readonly class AccountCash
{
    public function __construct(
        public float $blocked,
        public float $free,
        public float $invested,
        public float $pieCash,
        public float $ppl,
        public float $result,
        public float $total,
    ) {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     blocked: float,
         *     free: float,
         *     invested: float,
         *     pieCash: float,
         *     ppl: float,
         *     result: float,
         *     total: float,
         * } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     blocked: float,
     *     free: float,
     *     invested: float,
     *     pieCash: float,
     *     ppl: float,
     *     result: float,
     *     total: float,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            blocked: $data['blocked'],
            free: $data['free'],
            invested: $data['invested'],
            pieCash: $data['pieCash'],
            ppl: $data['ppl'],
            result: $data['result'],
            total: $data['total'],
        );
    }
}
