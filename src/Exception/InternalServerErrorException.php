<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Exception;

class InternalServerErrorException extends ApiException
{
    public function __construct(string $message = '', int $code = 500)
    {
        parent::__construct($message, $code);
    }
}
