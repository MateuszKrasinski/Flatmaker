<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210418190711 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE group_user_to_group DROP CONSTRAINT fk_d9985fb7fe54d947');
        $this->addSql('ALTER TABLE group_user_to_group DROP CONSTRAINT fk_d9985fb79a168e7c');
        $this->addSql('DROP SEQUENCE group_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_to_group_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE group_relation_id_seq CASCADE');
        $this->addSql('DROP TABLE "group"');
        $this->addSql('DROP TABLE user_to_group');
        $this->addSql('DROP TABLE group_relation');
        $this->addSql('DROP TABLE group_user_to_group');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE group_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_to_group_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE group_relation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "group" (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE user_to_group (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE group_relation (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE group_user_to_group (group_id INT NOT NULL, user_to_group_id INT NOT NULL, PRIMARY KEY(group_id, user_to_group_id))');
        $this->addSql('CREATE INDEX idx_d9985fb7fe54d947 ON group_user_to_group (group_id)');
        $this->addSql('CREATE INDEX idx_d9985fb79a168e7c ON group_user_to_group (user_to_group_id)');
        $this->addSql('ALTER TABLE group_user_to_group ADD CONSTRAINT fk_d9985fb7fe54d947 FOREIGN KEY (group_id) REFERENCES "group" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE group_user_to_group ADD CONSTRAINT fk_d9985fb79a168e7c FOREIGN KEY (user_to_group_id) REFERENCES user_to_group (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
