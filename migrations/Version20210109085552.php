<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210109085552 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE element_favorisable (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element_favorisable_user (element_favorisable_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_6C689D2563897B07 (element_favorisable_id), INDEX IDX_6C689D25A76ED395 (user_id), PRIMARY KEY(element_favorisable_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE element_favorisable_user ADD CONSTRAINT FK_6C689D2563897B07 FOREIGN KEY (element_favorisable_id) REFERENCES element_favorisable (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE element_favorisable_user ADD CONSTRAINT FK_6C689D25A76ED395 FOREIGN KEY (user_id) REFERENCES `users` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE element_favorisable_user DROP FOREIGN KEY FK_6C689D2563897B07');
        $this->addSql('DROP TABLE element_favorisable');
        $this->addSql('DROP TABLE element_favorisable_user');
    }
}
