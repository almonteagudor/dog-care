<?php

declare(strict_types=1);

namespace DogCare\Test;

use DogCare\Shared\Domain\Bus\Query\Query;

final readonly class TestQuery implements Query
{
    public function __construct(public string $text)
    {
    }
}
