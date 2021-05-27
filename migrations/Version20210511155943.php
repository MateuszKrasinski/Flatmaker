<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210511155943 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE "group_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE group_to_user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE help_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE role_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "group" (id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE group_to_user (id INT NOT NULL, id_user_id INT DEFAULT NULL, id_group_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_EC7D938A79F37AE5 ON group_to_user (id_user_id)');
        $this->addSql('CREATE INDEX IDX_EC7D938AAE8F35D2 ON group_to_user (id_group_id)');
        $this->addSql('CREATE TABLE help (id INT NOT NULL, id_from_id INT DEFAULT NULL, id_to_id INT DEFAULT NULL, id_type_id INT DEFAULT NULL, id_group_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8875CACA653707B ON help (id_from_id)');
        $this->addSql('CREATE INDEX IDX_8875CACDEB00B55 ON help (id_to_id)');
        $this->addSql('CREATE INDEX IDX_8875CAC1BD125E3 ON help (id_type_id)');
        $this->addSql('CREATE INDEX IDX_8875CACAE8F35D2 ON help (id_group_id)');
        $this->addSql('CREATE TABLE role (id INT NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE type (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, id_role_id INT DEFAULT NULL, id_user_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8D93D64989E8BDC ON "user" (id_role_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64979F37AE5 ON "user" (id_user_id)');
        $this->addSql('CREATE TABLE user_details (id INT NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE group_to_user ADD CONSTRAINT FK_EC7D938A79F37AE5 FOREIGN KEY (id_user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE group_to_user ADD CONSTRAINT FK_EC7D938AAE8F35D2 FOREIGN KEY (id_group_id) REFERENCES "group" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE help ADD CONSTRAINT FK_8875CACA653707B FOREIGN KEY (id_from_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE help ADD CONSTRAINT FK_8875CACDEB00B55 FOREIGN KEY (id_to_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE help ADD CONSTRAINT FK_8875CAC1BD125E3 FOREIGN KEY (id_type_id) REFERENCES type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE help ADD CONSTRAINT FK_8875CACAE8F35D2 FOREIGN KEY (id_group_id) REFERENCES "group" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT FK_8D93D64989E8BDC FOREIGN KEY (id_role_id) REFERENCES role (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT FK_8D93D64979F37AE5 FOREIGN KEY (id_user_id) REFERENCES user_details (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE group_to_user DROP CONSTRAINT FK_EC7D938AAE8F35D2');
        $this->addSql('ALTER TABLE help DROP CONSTRAINT FK_8875CACAE8F35D2');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT FK_8D93D64989E8BDC');
        $this->addSql('ALTER TABLE help DROP CONSTRAINT FK_8875CAC1BD125E3');
        $this->addSql('ALTER TABLE group_to_user DROP CONSTRAINT FK_EC7D938A79F37AE5');
        $this->addSql('ALTER TABLE help DROP CONSTRAINT FK_8875CACA653707B');
        $this->addSql('ALTER TABLE help DROP CONSTRAINT FK_8875CACDEB00B55');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT FK_8D93D64979F37AE5');
        $this->addSql('DROP SEQUENCE "group_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE group_to_user_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE help_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE role_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE type_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE user_details_id_seq CASCADE');
        $this->addSql('DROP TABLE "group"');
        $this->addSql('DROP TABLE group_to_user');
        $this->addSql('DROP TABLE help');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE user_details');
    }
}
