<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230628115144 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personne ADD actionnaire_id INT DEFAULT NULL, ADD fonction_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE personne ADD CONSTRAINT FK_FCEC9EF1A79B503 FOREIGN KEY (actionnaire_id) REFERENCES actionnaire (id)');
        $this->addSql('ALTER TABLE personne ADD CONSTRAINT FK_FCEC9EF57889920 FOREIGN KEY (fonction_id) REFERENCES fonction (id)');
        $this->addSql('CREATE INDEX IDX_FCEC9EF1A79B503 ON personne (actionnaire_id)');
        $this->addSql('CREATE INDEX IDX_FCEC9EF57889920 ON personne (fonction_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personne DROP FOREIGN KEY FK_FCEC9EF1A79B503');
        $this->addSql('ALTER TABLE personne DROP FOREIGN KEY FK_FCEC9EF57889920');
        $this->addSql('DROP INDEX IDX_FCEC9EF1A79B503 ON personne');
        $this->addSql('DROP INDEX IDX_FCEC9EF57889920 ON personne');
        $this->addSql('ALTER TABLE personne DROP actionnaire_id, DROP fonction_id');
    }
}
