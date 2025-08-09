<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Name\UnqualifiedName;
use Doctrine\DBAL\Schema\PrimaryKeyConstraint;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\Migrations\AbstractMigration;
use DogCare\Allergy\Domain\AllergyDescription;
use DogCare\Allergy\Domain\AllergyId;
use DogCare\Allergy\Domain\AllergyName;
use DogCare\Allergy\Domain\AllergyRepository;
use DogCare\Allergy\Infrastructure\AllergyDoctrineRepository;
use DogCare\Shared\Domain\ValueObject\CreatedAt;
use DogCare\Shared\Domain\ValueObject\DeletedAt;
use DogCare\Shared\Domain\ValueObject\UpdatedAt;

final class Version20250808163542_CreateAllergiesTable extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create "' . AllergyDoctrineRepository::tableName() . '" table';
    }

    public function up(Schema $schema): void
    {
        $diseaseTable = $schema->createTable(AllergyDoctrineRepository::tableName());

        $diseaseTable->addColumn(
            AllergyId::primitiveName(),
            Types::GUID,
            ['notnull' => true, 'length' => 36],
        );
        $diseaseTable->addColumn(
            AllergyName::primitiveName(),
            Types::STRING,
            ['notnull' => true, 'length' => 50],
        );
        $diseaseTable->addColumn(
            AllergyDescription::primitiveName(),
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
            new PrimaryKeyConstraint(null, [UnqualifiedName::quoted(AllergyId::primitiveName())], true),
        );
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable(AllergyDoctrineRepository::tableName());
    }
}
