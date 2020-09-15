<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200915113603 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stat (id INT AUTO_INCREMENT NOT NULL, virus_id INT NOT NULL, country_id INT NOT NULL, contaminated INT NOT NULL, healed INT NOT NULL, zombified INT NOT NULL, entry_date DATETIME NOT NULL, INDEX IDX_20B8FF2186619E6D (virus_id), INDEX IDX_20B8FF21F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE virus (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(9) NOT NULL, dangerousness INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stat ADD CONSTRAINT FK_20B8FF2186619E6D FOREIGN KEY (virus_id) REFERENCES virus (id)');
        $this->addSql('ALTER TABLE stat ADD CONSTRAINT FK_20B8FF21F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stat DROP FOREIGN KEY FK_20B8FF21F92F3E70');
        $this->addSql('ALTER TABLE stat DROP FOREIGN KEY FK_20B8FF2186619E6D');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE stat');
        $this->addSql('DROP TABLE virus');
    }
}
