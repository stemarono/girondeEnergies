<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230710113805 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contact CHANGE date_creation date_creation DATETIME NOT NULL, CHANGE date_modification date_modification DATETIME NOT NULL');
        $this->addSql('ALTER TABLE precommande ADD commune_id INT DEFAULT NULL, ADD type_activite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE precommande ADD CONSTRAINT FK_7A250B45131A4F72 FOREIGN KEY (commune_id) REFERENCES commune (id)');
        $this->addSql('ALTER TABLE precommande ADD CONSTRAINT FK_7A250B45D0165F20 FOREIGN KEY (type_activite_id) REFERENCES type_activite (id)');
        $this->addSql('CREATE INDEX IDX_7A250B45131A4F72 ON precommande (commune_id)');
        $this->addSql('CREATE INDEX IDX_7A250B45D0165F20 ON precommande (type_activite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('ALTER TABLE contact CHANGE date_creation date_creation DATETIME DEFAULT NULL, CHANGE date_modification date_modification DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE precommande DROP FOREIGN KEY FK_7A250B45131A4F72');
        $this->addSql('ALTER TABLE precommande DROP FOREIGN KEY FK_7A250B45D0165F20');
        $this->addSql('DROP INDEX IDX_7A250B45131A4F72 ON precommande');
        $this->addSql('DROP INDEX IDX_7A250B45D0165F20 ON precommande');
        $this->addSql('ALTER TABLE precommande DROP commune_id, DROP type_activite_id');
    }
}
