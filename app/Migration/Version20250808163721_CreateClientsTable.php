<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Name\UnqualifiedName;
use Doctrine\DBAL\Schema\PrimaryKeyConstraint;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\Migrations\AbstractMigration;
use DogCare\Client\Domain\ClientEmail;
use DogCare\Client\Domain\ClientId;
use DogCare\Client\Domain\ClientName;
use DogCare\Client\Domain\ClientPhone;
use DogCare\Client\Domain\ClientSurname;
use DogCare\Client\Infrastructure\ClientDoctrineRepository;
use DogCare\Shared\Domain\ValueObject\CreatedAt;
use DogCare\Shared\Domain\ValueObject\DeletedAt;
use DogCare\Shared\Domain\ValueObject\UpdatedAt;

final class Version20250808163721_CreateClientsTable extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create "' . ClientDoctrineRepository::tableName() . '" table';
    }

    public function up(Schema $schema): void
    {
        $diseaseTable = $schema->createTable(ClientDoctrineRepository::tableName());

        $diseaseTable->addColumn(
            ClientId::primitiveName(),
            Types::GUID,
            ['notnull' => true, 'length' => 36],
        );
        $diseaseTable->addColumn(
            ClientName::primitiveName(),
            Types::STRING,
            ['notnull' => true, 'length' => 50],
        );
        $diseaseTable->addColumn(
            ClientSurname::primitiveName(),
            Types::STRING,
            ['notnull' => true, 'length' => 100],
        );
        $diseaseTable->addColumn(
            ClientPhone::primitiveName(),
            Types::STRING,
            ['notnull' => true, 'length' => 15],
        );
        $diseaseTable->addColumn(
            ClientEmail::primitiveName(),
            Types::STRING,
            ['notnull' => true, 'length' => 100],
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
            new PrimaryKeyConstraint(null, [UnqualifiedName::quoted(ClientId::primitiveName())], true),
        );
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable(ClientDoctrineRepository::tableName());
    }
}
