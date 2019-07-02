<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190702113055 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE entrainement (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, lieu LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entrainement_utilisateur (entrainement_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_C0F64050A15E8FD (entrainement_id), INDEX IDX_C0F64050FB88E14F (utilisateur_id), PRIMARY KEY(entrainement_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lesson (id INT AUTO_INCREMENT NOT NULL, libelle_utilisateur_id INT DEFAULT NULL, lesson_entrainement_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_F87474F3C822A781 (libelle_utilisateur_id), INDEX IDX_F87474F3E2E3EC61 (lesson_entrainement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entrainement_utilisateur ADD CONSTRAINT FK_C0F64050A15E8FD FOREIGN KEY (entrainement_id) REFERENCES entrainement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entrainement_utilisateur ADD CONSTRAINT FK_C0F64050FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3C822A781 FOREIGN KEY (libelle_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3E2E3EC61 FOREIGN KEY (lesson_entrainement_id) REFERENCES entrainement (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE entrainement_utilisateur DROP FOREIGN KEY FK_C0F64050A15E8FD');
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F3E2E3EC61');
        $this->addSql('DROP TABLE entrainement');
        $this->addSql('DROP TABLE entrainement_utilisateur');
        $this->addSql('DROP TABLE lesson');
    }
}
