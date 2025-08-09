<?php

declare(strict_types=1);

namespace App\Tests\Functional\Controller\Disease;

use App\Tests\Functional\FunctionalTestCase;
use DogCare\Disease\Domain\Disease;
use DogCare\Disease\Domain\DiseaseId;
use DogCare\Disease\Domain\DiseaseName;
use DogCare\Disease\Infrastructure\DiseaseDoctrineRepository;
use Symfony\Component\HttpFoundation\Response;

class GetDiseasesControllerTest extends FunctionalTestCase
{
    public function testGetDiseases(): void
    {
        $firstDisease = new Disease(DiseaseId::random(), new DiseaseName('first_name'), null);
        $secondDisease = new Disease(DiseaseId::random(), new DiseaseName('second_name'), null);

        $this->insert(DiseaseDoctrineRepository::tableName(), $firstDisease->toPrimitives());
        $this->insert(DiseaseDoctrineRepository::tableName(), $secondDisease->toPrimitives());

        $response = $this->httpGet('get-diseases');

        $responseData = json_decode($response->getContent(), true);

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertIsArray($responseData);
        $this->assertCount(2, $responseData);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->deleteAll(DiseaseDoctrineRepository::tableName());
    }
}
