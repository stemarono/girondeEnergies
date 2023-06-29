<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230629084905 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B8755515AC9C95FD ON activite (image_url)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7A250B4569563938 ON precommande (email_demandeur)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_758A72E9E41CDB9D ON type_activite (typeactivite)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_7A250B4569563938 ON precommande');
        $this->addSql('DROP INDEX UNIQ_B8755515AC9C95FD ON activite');
        $this->addSql('DROP INDEX UNIQ_758A72E9E41CDB9D ON type_activite');
    }
}
