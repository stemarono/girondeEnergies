<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230628120943 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2FA91B4EFBF046AB ON actionnaire (nom_structure)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2FA91B4EE48E9A13 ON actionnaire (logo)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_900D5BD900D5BD ON fonction (fonction)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_2FA91B4EFBF046AB ON actionnaire');
        $this->addSql('DROP INDEX UNIQ_2FA91B4EE48E9A13 ON actionnaire');
        $this->addSql('DROP INDEX UNIQ_900D5BD900D5BD ON fonction');
    }
}
