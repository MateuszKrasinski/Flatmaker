<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210606094549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE "user" RENAME COLUMN id_user TO id_user_id');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT FK_8D93D64979F37AE5 FOREIGN KEY (id_user_id) REFERENCES user_details (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64979F37AE5 ON "user" (id_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT FK_8D93D64979F37AE5');
        $this->addSql('DROP INDEX UNIQ_8D93D64979F37AE5');
        $this->addSql('ALTER TABLE "user" RENAME COLUMN id_user_id TO id_user');
    }
}
