<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191010104812 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE company_user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, company_id INTEGER DEFAULT NULL, user_id INTEGER DEFAULT NULL, role CLOB NOT NULL --(DC2Type:json)
        , created_at DATETIME NOT NULL)');
        $this->addSql('CREATE INDEX IDX_CEFECCA7979B1AD6 ON company_user (company_id)');
        $this->addSql('CREATE INDEX IDX_CEFECCA7A76ED395 ON company_user (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE company_user');
    }
}
