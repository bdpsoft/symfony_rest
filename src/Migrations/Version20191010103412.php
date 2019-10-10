<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191010103412 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE IF EXISTS company_user');
        $this->addSql('DROP TABLE IF EXISTS user_company');
        $this->addSql('DROP INDEX IF EXISTS IDX_4FBF094F873CC942');
        $this->addSql('DROP TABLE IF EXISTS company');
        $this->addSql('CREATE TABLE company (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, company_name VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('DROP INDEX IF EXISTS IDX_8D93D649873CC942');
        $this->addSql('DROP INDEX IF EXISTS UNIQ_8D93D649E7927C74');
        $this->addSql('DROP TABLE IF EXISTS user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL COLLATE BINARY, roles CLOB NOT NULL COLLATE BINARY --(DC2Type:json)
        , password VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE IF EXISTS company');
        $this->addSql('DROP TABLE IF EXISTS user');
    }
}
