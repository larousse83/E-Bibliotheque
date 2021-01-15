<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210115184320 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE abonnement (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, ouvrage_id INT NOT NULL, date_abonnement DATE NOT NULL, date_last_renouvellement DATE NOT NULL, INDEX IDX_351268BBA76ED395 (user_id), INDEX IDX_351268BB15D884B5 (ouvrage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BBA76ED395 FOREIGN KEY (user_id) REFERENCES `users` (id)');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BB15D884B5 FOREIGN KEY (ouvrage_id) REFERENCES `ouvrages` (id)');
        $this->addSql('ALTER TABLE ouvrages DROP FOREIGN KEY FK_93543D26A76ED395');
        $this->addSql('DROP INDEX IDX_93543D26A76ED395 ON ouvrages');
        $this->addSql('ALTER TABLE ouvrages DROP user_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE abonnement');
        $this->addSql('ALTER TABLE `ouvrages` ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `ouvrages` ADD CONSTRAINT FK_93543D26A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_93543D26A76ED395 ON `ouvrages` (user_id)');
    }
}
