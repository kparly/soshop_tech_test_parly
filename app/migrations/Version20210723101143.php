<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210723101143 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carte_banquaire (id INT AUTO_INCREMENT NOT NULL, compte_banquaire_id INT NOT NULL, numero_carte INT NOT NULL, id_carte INT NOT NULL, statut VARCHAR(255) NOT NULL, date_expiration DATE NOT NULL, deleted_at DATETIME DEFAULT NULL, INDEX IDX_A166B7D79A5A34B9 (compte_banquaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte_banquaire (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, iban VARCHAR(255) NOT NULL, bic VARCHAR(255) NOT NULL, balance DOUBLE PRECISION NOT NULL, id_compte_fourni INT NOT NULL, INDEX IDX_85DB4B92FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carte_banquaire ADD CONSTRAINT FK_A166B7D79A5A34B9 FOREIGN KEY (compte_banquaire_id) REFERENCES compte_banquaire (id)');
        $this->addSql('ALTER TABLE compte_banquaire ADD CONSTRAINT FK_85DB4B92FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carte_banquaire DROP FOREIGN KEY FK_A166B7D79A5A34B9');
        $this->addSql('ALTER TABLE compte_banquaire DROP FOREIGN KEY FK_85DB4B92FB88E14F');
        $this->addSql('DROP TABLE carte_banquaire');
        $this->addSql('DROP TABLE compte_banquaire');
        $this->addSql('DROP TABLE utilisateur');
    }
}
