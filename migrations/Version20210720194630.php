<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210720194630 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_produit (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(60) NOT NULL, description VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employe (id INT AUTO_INCREMENT NOT NULL, civilite VARCHAR(3) NOT NULL, nom VARCHAR(25) NOT NULL, prenom VARCHAR(25) NOT NULL, adresse VARCHAR(60) NOT NULL, cp VARCHAR(5) NOT NULL, ville VARCHAR(80) NOT NULL, telephone VARCHAR(10) NOT NULL, email VARCHAR(60) NOT NULL, date_naissance DATE NOT NULL, fonction VARCHAR(30) NOT NULL, date_embauche DATE NOT NULL, date_fin_contrat DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, societe VARCHAR(60) NOT NULL, adresse VARCHAR(60) NOT NULL, cp VARCHAR(5) NOT NULL, ville VARCHAR(80) NOT NULL, telephone VARCHAR(10) NOT NULL, email VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, civilite VARCHAR(3) NOT NULL, nom VARCHAR(25) NOT NULL, prenom VARCHAR(25) NOT NULL, adresse VARCHAR(60) NOT NULL, cp VARCHAR(5) NOT NULL, ville VARCHAR(80) NOT NULL, telephone VARCHAR(10) NOT NULL, email VARCHAR(60) NOT NULL, mot_de_passe VARCHAR(60) NOT NULL, role VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE categorie_produit');
        $this->addSql('DROP TABLE employe');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE utilisateur');
    }
}
