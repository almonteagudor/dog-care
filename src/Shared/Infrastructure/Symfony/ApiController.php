<?php

namespace DogCare\Shared\Infrastructure\Symfony;

use DogCare\Shared\Domain\Bus\Command\Command;
use DogCare\Shared\Domain\Bus\Command\CommandBus;
use DogCare\Shared\Domain\Bus\Query\Query;
use DogCare\Shared\Domain\Bus\Query\QueryBus;
use DogCare\Shared\Domain\Bus\Query\Response;

abstract readonly class ApiController
{
    public function __construct(
        private QueryBus $queryBus,
        private CommandBus $commandBus,
    ) {
    }

    protected function ask(Query $query): ?Response
    {
        return $this->queryBus->ask($query);
    }

    protected function dispatch(Command $command): void
    {
        $this->commandBus->dispatch($command);
    }
}
