<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Name\UnqualifiedName;
use Doctrine\DBAL\Schema\PrimaryKeyConstraint;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\Migrations\AbstractMigration;

final class Version20250808163721_CreateClientsTable extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create "clients" table';
    }

    public function up(Schema $schema): void
    {
        $diseaseTable = $schema->createTable('clients');

        $diseaseTable->addColumn('id', Types::GUID, ['notnull' => true, 'length' => 36]);
        $diseaseTable->addColumn('name', Types::STRING, ['notnull' => true, 'length' => 50]);
        $diseaseTable->addColumn('surname', Types::STRING, ['notnull' => true, 'length' => 100]);
        $diseaseTable->addColumn('phone', Types::STRING, ['notnull' => true, 'length' => 15]);
        $diseaseTable->addColumn('email', Types::STRING, ['notnull' => true, 'length' => 100]);
        $diseaseTable->addColumn('created_at', Types::STRING, ['notnull' => true, 'length' => 30]);
        $diseaseTable->addColumn('updated_at', Types::STRING, ['notnull' => false, 'length' => 30]);
        $diseaseTable->addColumn('deleted_at', Types::STRING, ['notnull' => false, 'length' => 30]);

        $diseaseTable->addPrimaryKeyConstraint(
                new PrimaryKeyConstraint(null, [UnqualifiedName::quoted('id')], true)
        );
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('clients');
    }
}
