<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Exception;

class ForbiddenException extends ApiException
{
    public function __construct(string $message = '', int $code = 403)
    {
        parent::__construct($message, $code);
    }
}
