<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Dto\AccountData;

readonly class AccountMetadata
{
    public function __construct(public string $currencyCode, public int $id,)
    {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     currencyCode: string,
         *     id: int,
         * } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     currencyCode: string,
     *     id: int,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(currencyCode: $data['currencyCode'], id: $data['id']);
    }
}
