<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210607202726 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT fk_8d93d64979f37ae5');
        $this->addSql('DROP INDEX uniq_8d93d64979f37ae5');
        $this->addSql('ALTER TABLE "user" RENAME COLUMN id_user_id TO details_id');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT FK_8D93D649BB1A0722 FOREIGN KEY (details_id) REFERENCES user_details (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649BB1A0722 ON "user" (details_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT FK_8D93D649BB1A0722');
        $this->addSql('DROP INDEX UNIQ_8D93D649BB1A0722');
        $this->addSql('ALTER TABLE "user" RENAME COLUMN details_id TO id_user_id');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT fk_8d93d64979f37ae5 FOREIGN KEY (id_user_id) REFERENCES user_details (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_8d93d64979f37ae5 ON "user" (id_user_id)');
    }
}
