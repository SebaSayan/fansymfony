<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220413133243 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tarifs_enfant CHANGE `from` from_to TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE tarifs_homme CHANGE `from` from_to TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE tarifs_techniques CHANGE `from` from_to TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tarifs_enfant CHANGE from_to `from` TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE tarifs_homme CHANGE from_to `from` TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE tarifs_techniques CHANGE from_to `from` TINYINT(1) NOT NULL');
    }
}
