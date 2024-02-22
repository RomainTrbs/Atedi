<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231215144001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tbl_intervention DROP equipment_complete');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_38B383A1A9D1C132 ON tbl_user (first_name)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tbl_intervention ADD equipment_complete VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX UNIQ_38B383A1A9D1C132 ON tbl_user');
    }
}
