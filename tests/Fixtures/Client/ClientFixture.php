<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Tests\Fixtures\Client;

use MarekSkopal\Trading212\Client\ClientInterface;

final class ClientFixture implements ClientInterface
{
    public function __construct(private string $responseFileneme)
    {
    }

    public static function createWithResponse(string $responseFileneme): ClientInterface
    {
        return new self($responseFileneme);
    }

    /** @param array<string, scalar|null> $queryParams */
    public function get(string $path, array $queryParams, int $retryCount = 0): string
    {
        return $this->getResponse();
    }

    /** @param array<string, scalar|null> $queryParams */
    public function post(string $path, array $queryParams, object $body, int $retryCount = 0): string
    {
        return $this->getResponse();
    }

    /** @param array<string, scalar|null> $queryParams */
    public function delete(string $path, array $queryParams, int $retryCount = 0): string
    {
        return $this->getResponse();
    }

    private function getResponse(): string
    {
        return (string) file_get_contents(__DIR__ . '/../Response/' . $this->responseFileneme);
    }
}
