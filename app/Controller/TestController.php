<?php

declare(strict_types=1);

namespace App\Controller;

use DogCare\Shared\Infrastructure\Symfony\ApiController;
use DogCare\Test\TestQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

readonly class TestController extends ApiController
{
    public function __invoke(Request $request, string $text): JsonResponse
    {
        $response = $this->ask(new TestQuery($text));

        return new JsonResponse($response->toPrimitives(), Response::HTTP_OK);
    }
}
