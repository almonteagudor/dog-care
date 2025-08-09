<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Name\UnqualifiedName;
use Doctrine\DBAL\Schema\PrimaryKeyConstraint;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\Migrations\AbstractMigration;
use DogCare\Disease\Domain\DiseaseDescription;
use DogCare\Disease\Domain\DiseaseId;
use DogCare\Disease\Domain\DiseaseName;
use DogCare\Disease\Infrastructure\DiseaseDoctrineRepository;
use DogCare\Shared\Domain\ValueObject\CreatedAt;
use DogCare\Shared\Domain\ValueObject\DeletedAt;
use DogCare\Shared\Domain\ValueObject\UpdatedAt;

final class Version20250808163354_CreateDiseasesTable extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create "' . DiseaseDoctrineRepository::tableName() . '" table';
    }

    public function up(Schema $schema): void
    {
        $diseaseTable = $schema->createTable(DiseaseDoctrineRepository::tableName());

        $diseaseTable->addColumn(
            DiseaseId::primitiveName(),
            Types::GUID,
            ['notnull' => true, 'length' => 36],
        );
        $diseaseTable->addColumn(
            DiseaseName::primitiveName(),
            Types::STRING,
            ['notnull' => true, 'length' => 50],
        );
        $diseaseTable->addColumn(
            DiseaseDescription::primitiveName(),
            Types::STRING,
            ['notnull' => false, 'length' => 500],
        );
        $diseaseTable->addColumn(
            CreatedAt::primitiveName(),
            Types::STRING,
            ['notnull' => true, 'length' => 30],
        );
        $diseaseTable->addColumn(
            UpdatedAt::primitiveName(),
            Types::STRING,
            ['notnull' => false, 'length' => 30],
        );
        $diseaseTable->addColumn(
            DeletedAt::primitiveName(),
            Types::STRING,
            ['notnull' => false, 'length' => 30],
        );

        $diseaseTable->addPrimaryKeyConstraint(
            new PrimaryKeyConstraint(null, [UnqualifiedName::quoted(DiseaseId::primitiveName())], true),
        );
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable(DiseaseDoctrineRepository::tableName());
    }
}
