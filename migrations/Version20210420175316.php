<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210420175316 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE help ADD relation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE help ADD CONSTRAINT FK_8875CAC3256915B FOREIGN KEY (relation_id) REFERENCES "group" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_8875CAC3256915B ON help (relation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE help DROP CONSTRAINT FK_8875CAC3256915B');
        $this->addSql('DROP INDEX IDX_8875CAC3256915B');
        $this->addSql('ALTER TABLE help DROP relation_id');
    }
}
