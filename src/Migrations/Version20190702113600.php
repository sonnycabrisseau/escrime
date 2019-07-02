<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190702113600 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE competition (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, lieu VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competition_utilisateur (competition_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_35BDCCCD7B39D312 (competition_id), INDEX IDX_35BDCCCDFB88E14F (utilisateur_id), PRIMARY KEY(competition_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE objectif (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, valide TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competition_utilisateur ADD CONSTRAINT FK_35BDCCCD7B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competition_utilisateur ADD CONSTRAINT FK_35BDCCCDFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE competition_utilisateur DROP FOREIGN KEY FK_35BDCCCD7B39D312');
        $this->addSql('DROP TABLE competition');
        $this->addSql('DROP TABLE competition_utilisateur');
        $this->addSql('DROP TABLE objectif');
    }
}
