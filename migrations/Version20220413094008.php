<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220413094008 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tarifs_coiffage CHANGE fork `from` TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE tarifs_enfant ADD `from` TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE tarifs_homme ADD `from` TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE tarifs_techniques ADD `from` TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tarifs_coiffage CHANGE `from` fork TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE tarifs_enfant DROP `from`');
        $this->addSql('ALTER TABLE tarifs_homme DROP `from`');
        $this->addSql('ALTER TABLE tarifs_techniques DROP `from`');
    }
}
