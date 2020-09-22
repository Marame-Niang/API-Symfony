<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200922163233 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, entreprise_id INT DEFAULT NULL, client_id INT DEFAULT NULL, type_compte_id INT DEFAULT NULL, numero VARCHAR(8) NOT NULL, rib VARCHAR(9) NOT NULL, solde DOUBLE PRECISION NOT NULL, date_ouverture VARCHAR(10) NOT NULL, frais_ouverture DOUBLE PRECISION DEFAULT NULL, remuneration DOUBLE PRECISION DEFAULT NULL, date_debut VARCHAR(10) DEFAULT NULL, date_fin VARCHAR(10) DEFAULT NULL, INDEX IDX_CFF65260A4AEAFEA (entreprise_id), INDEX IDX_CFF6526019EB6921 (client_id), INDEX IDX_CFF6526046032730 (type_compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(20) NOT NULL, telephone VARCHAR(14) NOT NULL, email VARCHAR(20) DEFAULT NULL, adresse VARCHAR(20) NOT NULL, budget NUMERIC(10, 0) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operation (id INT AUTO_INCREMENT NOT NULL, compte_id INT NOT NULL, depot NUMERIC(10, 0) DEFAULT NULL, retrait NUMERIC(10, 0) DEFAULT NULL, virement NUMERIC(10, 0) DEFAULT NULL, taxe NUMERIC(10, 0) DEFAULT NULL, INDEX IDX_1981A66DF2C56620 (compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526019EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526046032730 FOREIGN KEY (type_compte_id) REFERENCES type_compte (id)');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66DF2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE client CHANGE matricule matricule VARCHAR(10) NOT NULL, CHANGE cni cni VARCHAR(10) NOT NULL, CHANGE prenom prenom VARCHAR(10) NOT NULL, CHANGE nom nom VARCHAR(10) NOT NULL, CHANGE adresse adresse VARCHAR(10) NOT NULL, CHANGE email email VARCHAR(10) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66DF2C56620');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260A4AEAFEA');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE operation');
        $this->addSql('ALTER TABLE client CHANGE matricule matricule VARCHAR(8) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE cni cni VARCHAR(13) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
