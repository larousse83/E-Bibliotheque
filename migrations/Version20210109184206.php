<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210109184206 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ressource (id INT NOT NULL, section_id INT NOT NULL, chapitre_id INT NOT NULL, ouvrage_id INT NOT NULL, vignette VARCHAR(255) DEFAULT NULL, fichier VARCHAR(255) DEFAULT NULL, INDEX IDX_939F4544D823E37A (section_id), INDEX IDX_939F45441FBEEF7B (chapitre_id), INDEX IDX_939F454415D884B5 (ouvrage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ressource ADD CONSTRAINT FK_939F4544D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('ALTER TABLE ressource ADD CONSTRAINT FK_939F45441FBEEF7B FOREIGN KEY (chapitre_id) REFERENCES chapitre (id)');
        $this->addSql('ALTER TABLE ressource ADD CONSTRAINT FK_939F454415D884B5 FOREIGN KEY (ouvrage_id) REFERENCES `ouvrages` (id)');
        $this->addSql('ALTER TABLE ressource ADD CONSTRAINT FK_939F4544BF396750 FOREIGN KEY (id) REFERENCES element_favorisable (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE ressource');
    }
}
