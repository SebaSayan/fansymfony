<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220412133030 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tarifs_coiffage ADD price_max DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE tarifs_enfant ADD price_max DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE tarifs_homme ADD price_max DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE tarifs_techniques ADD price_max DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tarifs_coiffage DROP price_max');
        $this->addSql('ALTER TABLE tarifs_enfant DROP price_max');
        $this->addSql('ALTER TABLE tarifs_homme DROP price_max');
        $this->addSql('ALTER TABLE tarifs_techniques DROP price_max');
    }
}
