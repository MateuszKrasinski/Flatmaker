<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210420175707 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE help DROP CONSTRAINT fk_8875cac3256915b');
        $this->addSql('DROP INDEX idx_8875cac3256915b');
        $this->addSql('ALTER TABLE help RENAME COLUMN relation_id TO id_group_id');
        $this->addSql('ALTER TABLE help ADD CONSTRAINT FK_8875CACAE8F35D2 FOREIGN KEY (id_group_id) REFERENCES "group" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_8875CACAE8F35D2 ON help (id_group_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE help DROP CONSTRAINT FK_8875CACAE8F35D2');
        $this->addSql('DROP INDEX IDX_8875CACAE8F35D2');
        $this->addSql('ALTER TABLE help RENAME COLUMN id_group_id TO relation_id');
        $this->addSql('ALTER TABLE help ADD CONSTRAINT fk_8875cac3256915b FOREIGN KEY (relation_id) REFERENCES "group" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_8875cac3256915b ON help (relation_id)');
    }
}
