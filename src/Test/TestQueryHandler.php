<?php

declare(strict_types=1);

namespace DogCare\Test;

use DogCare\Shared\Domain\Bus\Query\QueryHandler;

final readonly class TestQueryHandler implements QueryHandler
{
    public function __invoke(TestQuery $query): TestResponse
    {
        return new TestResponse($query->text);
    }
}
