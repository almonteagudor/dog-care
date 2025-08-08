<?php

declare(strict_types=1);

namespace DogCare\Test;

use DogCare\Shared\Domain\Bus\Query\Response;

final readonly class TestResponse implements Response
{
    public function __construct(private string $text)
    {
    }

    public function toPrimitives(): array
    {
        return [
            'text' => $this->text,
        ];
    }
}
