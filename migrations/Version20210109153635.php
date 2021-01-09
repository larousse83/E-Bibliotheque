<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210109153635 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chapitre (id INT NOT NULL, ouvrage_id INT NOT NULL, INDEX IDX_8C62B02515D884B5 (ouvrage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element_favorisable (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element_favorisable_user (element_favorisable_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_6C689D2563897B07 (element_favorisable_id), INDEX IDX_6C689D25A76ED395 (user_id), PRIMARY KEY(element_favorisable_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ouvrage_collection (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `ouvrages` (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, ouvrage_collection_id INT NOT NULL, titre VARCHAR(255) NOT NULL, auteur VARCHAR(255) DEFAULT NULL, couverture VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX IDX_93543D26A76ED395 (user_id), INDEX IDX_93543D26CD3E8186 (ouvrage_collection_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `users` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chapitre ADD CONSTRAINT FK_8C62B02515D884B5 FOREIGN KEY (ouvrage_id) REFERENCES `ouvrages` (id)');
        $this->addSql('ALTER TABLE chapitre ADD CONSTRAINT FK_8C62B025BF396750 FOREIGN KEY (id) REFERENCES element_favorisable (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE element_favorisable_user ADD CONSTRAINT FK_6C689D2563897B07 FOREIGN KEY (element_favorisable_id) REFERENCES element_favorisable (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE element_favorisable_user ADD CONSTRAINT FK_6C689D25A76ED395 FOREIGN KEY (user_id) REFERENCES `users` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `ouvrages` ADD CONSTRAINT FK_93543D26A76ED395 FOREIGN KEY (user_id) REFERENCES `users` (id)');
        $this->addSql('ALTER TABLE `ouvrages` ADD CONSTRAINT FK_93543D26CD3E8186 FOREIGN KEY (ouvrage_collection_id) REFERENCES ouvrage_collection (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chapitre DROP FOREIGN KEY FK_8C62B025BF396750');
        $this->addSql('ALTER TABLE element_favorisable_user DROP FOREIGN KEY FK_6C689D2563897B07');
        $this->addSql('ALTER TABLE `ouvrages` DROP FOREIGN KEY FK_93543D26CD3E8186');
        $this->addSql('ALTER TABLE chapitre DROP FOREIGN KEY FK_8C62B02515D884B5');
        $this->addSql('ALTER TABLE element_favorisable_user DROP FOREIGN KEY FK_6C689D25A76ED395');
        $this->addSql('ALTER TABLE `ouvrages` DROP FOREIGN KEY FK_93543D26A76ED395');
        $this->addSql('DROP TABLE chapitre');
        $this->addSql('DROP TABLE element_favorisable');
        $this->addSql('DROP TABLE element_favorisable_user');
        $this->addSql('DROP TABLE ouvrage_collection');
        $this->addSql('DROP TABLE `ouvrages`');
        $this->addSql('DROP TABLE `users`');
    }
}
