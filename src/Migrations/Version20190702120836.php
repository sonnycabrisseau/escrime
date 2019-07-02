<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190702120836 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE objectif ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE objectif ADD CONSTRAINT FK_E2F86851FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_E2F86851FB88E14F ON objectif (utilisateur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE objectif DROP FOREIGN KEY FK_E2F86851FB88E14F');
        $this->addSql('DROP INDEX IDX_E2F86851FB88E14F ON objectif');
        $this->addSql('ALTER TABLE objectif DROP utilisateur_id');
    }
}
