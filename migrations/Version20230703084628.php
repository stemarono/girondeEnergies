<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230703084628 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB620CCD7E912');
        $this->addSql('DROP INDEX IDX_140AB620CCD7E912 ON page');
        $this->addSql('ALTER TABLE page DROP menu_id');
        $this->addSql('ALTER TABLE precommande ADD commune_id INT DEFAULT NULL, ADD type_activite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE precommande ADD CONSTRAINT FK_7A250B45131A4F72 FOREIGN KEY (commune_id) REFERENCES commune (id)');
        $this->addSql('ALTER TABLE precommande ADD CONSTRAINT FK_7A250B45D0165F20 FOREIGN KEY (type_activite_id) REFERENCES type_activite (id)');
        $this->addSql('CREATE INDEX IDX_7A250B45131A4F72 ON precommande (commune_id)');
        $this->addSql('CREATE INDEX IDX_7A250B45D0165F20 ON precommande (type_activite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE page ADD menu_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB620CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_140AB620CCD7E912 ON page (menu_id)');
        $this->addSql('ALTER TABLE precommande DROP FOREIGN KEY FK_7A250B45131A4F72');
        $this->addSql('ALTER TABLE precommande DROP FOREIGN KEY FK_7A250B45D0165F20');
        $this->addSql('DROP INDEX IDX_7A250B45131A4F72 ON precommande');
        $this->addSql('DROP INDEX IDX_7A250B45D0165F20 ON precommande');
        $this->addSql('ALTER TABLE precommande DROP commune_id, DROP type_activite_id');
    }
}
