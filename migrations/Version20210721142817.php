<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210721142817 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, no_client_id INT NOT NULL, no_employe_id INT NOT NULL, date_commande DATE NOT NULL, date_retrait_commande DATE DEFAULT NULL, INDEX IDX_6EEAA67DCE67BBCD (no_client_id), INDEX IDX_6EEAA67DA8DD7013 (no_employe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, nom_fournisseur_id INT NOT NULL, categorie_id INT DEFAULT NULL, nom VARCHAR(25) NOT NULL, prix_unitaire DOUBLE PRECISION NOT NULL, unites_stock INT NOT NULL, img_produit VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_29A5EC2770379586 (nom_fournisseur_id), INDEX IDX_29A5EC27BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_commander (id INT AUTO_INCREMENT NOT NULL, no_commande_id INT NOT NULL, produit_id INT NOT NULL, quantite INT NOT NULL, INDEX IDX_C644465618FCF6C0 (no_commande_id), INDEX IDX_C6444656F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DCE67BBCD FOREIGN KEY (no_client_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DA8DD7013 FOREIGN KEY (no_employe_id) REFERENCES employe (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2770379586 FOREIGN KEY (nom_fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_produit (id)');
        $this->addSql('ALTER TABLE produit_commander ADD CONSTRAINT FK_C644465618FCF6C0 FOREIGN KEY (no_commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE produit_commander ADD CONSTRAINT FK_C6444656F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit_commander DROP FOREIGN KEY FK_C644465618FCF6C0');
        $this->addSql('ALTER TABLE produit_commander DROP FOREIGN KEY FK_C6444656F347EFB');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE produit_commander');
    }
}
