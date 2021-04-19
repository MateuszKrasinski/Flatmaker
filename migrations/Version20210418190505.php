<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210418190505 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE group_relation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE group_user_to_group (group_id INT NOT NULL, user_to_group_id INT NOT NULL, PRIMARY KEY(group_id, user_to_group_id))');
        $this->addSql('CREATE INDEX IDX_D9985FB7FE54D947 ON group_user_to_group (group_id)');
        $this->addSql('CREATE INDEX IDX_D9985FB79A168E7C ON group_user_to_group (user_to_group_id)');
        $this->addSql('CREATE TABLE group_relation (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE group_user_to_group ADD CONSTRAINT FK_D9985FB7FE54D947 FOREIGN KEY (group_id) REFERENCES "group" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE group_user_to_group ADD CONSTRAINT FK_D9985FB79A168E7C FOREIGN KEY (user_to_group_id) REFERENCES user_to_group (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE group_relation_id_seq CASCADE');
        $this->addSql('DROP TABLE group_user_to_group');
        $this->addSql('DROP TABLE group_relation');
    }
}
