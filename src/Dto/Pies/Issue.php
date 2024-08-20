<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Dto\Pies;

readonly class Issue
{
    public function __construct(public string $name, public string $severity,)
    {
    }

    /**
     * @param array{
     *     name: string,
     *     severity: string,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(name: $data['name'], severity: $data['severity']);
    }
}
