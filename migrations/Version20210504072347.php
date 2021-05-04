<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210504072347 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rent DROP CONSTRAINT rel___01');
        $this->addSql('ALTER TABLE system_user_has_attribute DROP CONSTRAINT rel___01');
        $this->addSql('ALTER TABLE system_user_has_attribute DROP CONSTRAINT rel___02');
        $this->addSql('DROP SEQUENCE book_book_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE rent_rent_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE system_user_system_user_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE attribute_attribute_id_seq CASCADE');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE rent');
        $this->addSql('DROP TABLE system_user');
        $this->addSql('DROP TABLE attribute');
        $this->addSql('DROP TABLE system_user_has_attribute');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE book_book_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE rent_rent_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE system_user_system_user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE attribute_attribute_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE book (book_id SERIAL NOT NULL, title VARCHAR(100) DEFAULT NULL, PRIMARY KEY(book_id))');
        $this->addSql('CREATE UNIQUE INDEX book_book_id_uindex ON book (book_id)');
        $this->addSql('CREATE TABLE rent (rent_id SERIAL NOT NULL, book_id INT NOT NULL, date DATE NOT NULL, PRIMARY KEY(rent_id))');
        $this->addSql('CREATE UNIQUE INDEX rent_rent_id_uindex ON rent (rent_id)');
        $this->addSql('CREATE INDEX IDX_2784DCC16A2B381 ON rent (book_id)');
        $this->addSql('CREATE TABLE system_user (system_user_id SERIAL NOT NULL, name VARCHAR(20) NOT NULL, PRIMARY KEY(system_user_id))');
        $this->addSql('CREATE UNIQUE INDEX system_user_system_user_id_uindex ON system_user (system_user_id)');
        $this->addSql('CREATE TABLE attribute (attribute_id SERIAL NOT NULL, name VARCHAR(30) NOT NULL, PRIMARY KEY(attribute_id))');
        $this->addSql('CREATE UNIQUE INDEX attribute_attribute_id_uindex ON attribute (attribute_id)');
        $this->addSql('CREATE TABLE system_user_has_attribute (system_user_id INT NOT NULL, attribute_id INT NOT NULL)');
        $this->addSql('CREATE INDEX IDX_8480ED994B1DAF06 ON system_user_has_attribute (system_user_id)');
        $this->addSql('CREATE INDEX IDX_8480ED99B6E62EFA ON system_user_has_attribute (attribute_id)');
        $this->addSql('ALTER TABLE rent ADD CONSTRAINT rel___01 FOREIGN KEY (book_id) REFERENCES book (book_id) ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE system_user_has_attribute ADD CONSTRAINT rel___01 FOREIGN KEY (system_user_id) REFERENCES system_user (system_user_id) ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE system_user_has_attribute ADD CONSTRAINT rel___02 FOREIGN KEY (attribute_id) REFERENCES attribute (attribute_id) ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
