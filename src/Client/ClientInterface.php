<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Client;

interface ClientInterface
{
    /** @param array<string, string|null> $queryParams */
    public function get(string $path, array $queryParams, int $retryCount = 0): string;

    /** @param array<string, string|null> $queryParams */
    public function post(string $path, array $queryParams, object $body, int $retryCount = 0): string;

    /** @param array<string, string|null> $queryParams */
    public function delete(string $path, array $queryParams, int $retryCount = 0): string;
}
