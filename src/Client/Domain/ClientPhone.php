<?php

declare(strict_types=1);

namespace DogCare\Client\Domain;

use DogCare\Shared\Domain\Exception\MaxLengthValueException;
use DogCare\Shared\Domain\ValueObject\StringValueObject;

final readonly class ClientPhone extends StringValueObject
{
    private const MAX_LENGTH = 15;

    public static function primitiveName(): string
    {
        return 'client_phone';
    }

    protected function ensureIsValid(string $value): void
    {
        if (strlen($value) > self::MAX_LENGTH) {
            throw new MaxLengthValueException($value, self::primitiveName(), self::MAX_LENGTH);
        }
    }
}
