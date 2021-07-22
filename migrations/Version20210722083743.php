<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210722083743 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2770379586');
        $this->addSql('DROP INDEX UNIQ_29A5EC2770379586 ON produit');
        $this->addSql('ALTER TABLE produit CHANGE nom_fournisseur_id fournisseur_id INT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27670C757F ON produit (fournisseur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27670C757F');
        $this->addSql('DROP INDEX IDX_29A5EC27670C757F ON produit');
        $this->addSql('ALTER TABLE produit CHANGE fournisseur_id nom_fournisseur_id INT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2770379586 FOREIGN KEY (nom_fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_29A5EC2770379586 ON produit (nom_fournisseur_id)');
    }
}
