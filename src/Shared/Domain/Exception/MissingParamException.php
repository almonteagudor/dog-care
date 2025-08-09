<?php

declare(strict_types=1);

namespace DogCare\Shared\Domain\Exception;

use RuntimeException;
use Throwable;

class MissingParamException extends RuntimeException
{
    private const MESSAGE = 'Missing parameter - %s';

    public function __construct(string $argument, ?Throwable $previous = null)
    {
        $message = sprintf(self::MESSAGE, $argument);

        parent::__construct($message, 0, $previous);
    }
}
