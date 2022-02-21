<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220210105554 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article_qte (id INT AUTO_INCREMENT NOT NULL, id_article_id INT DEFAULT NULL, id_depot VARCHAR(40) DEFAULT NULL, stock_actuel DOUBLE PRECISION DEFAULT NULL, UNIQUE INDEX UNIQ_4EE6D12AD71E064B (id_article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles (id INT AUTO_INCREMENT NOT NULL, id_article VARCHAR(255) NOT NULL, atricle VARCHAR(255) NOT NULL, id_famille_sous VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, marque VARCHAR(60) DEFAULT NULL, emballage VARCHAR(60) DEFAULT NULL, codebarre VARCHAR(30) DEFAULT NULL, unite_achat INT DEFAULT NULL, unite_sortie INT DEFAULT NULL, emplacement VARCHAR(60) DEFAULT NULL, prix_achat DOUBLE PRECISION DEFAULT NULL, stock_min DOUBLE PRECISION DEFAULT NULL, stock_max DOUBLE PRECISION DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, gerer_stock INT DEFAULT NULL, activer INT DEFAULT NULL, composer INT DEFAULT NULL, id_restaurant VARCHAR(60) DEFAULT NULL, date_sys DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carte (id INT AUTO_INCREMENT NOT NULL, id_client_id INT NOT NULL, id_tarif_id INT DEFAULT NULL, id_carte VARCHAR(20) NOT NULL, date_creation DATE DEFAULT NULL, id_dossier VARCHAR(30) DEFAULT NULL, id_beneficiare VARCHAR(80) DEFAULT NULL, type_client VARCHAR(80) DEFAULT NULL, nom_carte VARCHAR(80) DEFAULT NULL, dtae_validite DATE DEFAULT NULL, id_restaurant VARCHAR(80) DEFAULT NULL, id_user VARCHAR(20) DEFAULT NULL, generer INT DEFAULT NULL, facturer INT DEFAULT NULL, annuler INT DEFAULT NULL, obs VARCHAR(255) DEFAULT NULL, date_sys DATE DEFAULT NULL, INDEX IDX_BAD4FFFD99DED506 (id_client_id), INDEX IDX_BAD4FFFD65A7E6CC (id_tarif_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carte_lg (id INT AUTO_INCREMENT NOT NULL, id_repartition_id INT DEFAULT NULL, id_produit_id INT DEFAULT NULL, id_carte_id INT DEFAULT NULL, id_carte_lg INT NOT NULL, stock_carte VARCHAR(20) DEFAULT NULL, unite VARCHAR(10) DEFAULT NULL, stock_cmd INT DEFAULT NULL, stock_carte_temp INT DEFAULT NULL, stock_reste VARCHAR(20) DEFAULT NULL, date_sys DATE DEFAULT NULL, INDEX IDX_2DB96B49BF00B8A0 (id_repartition_id), INDEX IDX_2DB96B49AABEFE2C (id_produit_id), INDEX IDX_2DB96B49991C2223 (id_carte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carte_repartition (id INT AUTO_INCREMENT NOT NULL, id_carte_id INT DEFAULT NULL, id_repartition VARCHAR(80) NOT NULL, repartition VARCHAR(80) DEFAULT NULL, heure VARCHAR(10) DEFAULT NULL, pax INT DEFAULT NULL, id_operation VARCHAR(20) DEFAULT NULL, facturer VARCHAR(10) DEFAULT NULL, date_sys DATE DEFAULT NULL, UNIQUE INDEX UNIQ_97A33A3E991C2223 (id_carte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, type_client_id INT NOT NULL, id_tarif_id INT NOT NULL, id_client VARCHAR(40) NOT NULL, client VARCHAR(255) DEFAULT NULL, morale INT DEFAULT NULL, contact VARCHAR(80) DEFAULT NULL, portable VARCHAR(80) DEFAULT NULL, email VARCHAR(80) DEFAULT NULL, obs VARCHAR(80) DEFAULT NULL, active VARCHAR(80) DEFAULT NULL, date_sys DATE DEFAULT NULL, INDEX IDX_C7440455AD2D2831 (type_client_id), INDEX IDX_C744045565A7E6CC (id_tarif_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client_beneficiaire (id INT AUTO_INCREMENT NOT NULL, id_client_id INT NOT NULL, id_beneficiare VARCHAR(80) NOT NULL, benefiaciare VARCHAR(80) DEFAULT NULL, abrev VARCHAR(80) DEFAULT NULL, responsable VARCHAR(80) DEFAULT NULL, id_tarif INT DEFAULT NULL, date_sys DATE DEFAULT NULL, INDEX IDX_4A7A0399DED506 (id_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE familles (id INT AUTO_INCREMENT NOT NULL, id_famille VARCHAR(20) NOT NULL, famille VARCHAR(100) DEFAULT NULL, farabe VARCHAR(100) DEFAULT NULL, description LONGTEXT DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, date_sys DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE familles_sous (id INT AUTO_INCREMENT NOT NULL, id_famille_id INT DEFAULT NULL, id_famille_sous VARCHAR(20) NOT NULL, famille_sous VARCHAR(80) DEFAULT NULL, sarabe VARCHAR(80) DEFAULT NULL, description VARCHAR(80) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, date_sys DATE DEFAULT NULL, INDEX IDX_D60A3ACA322DFB53 (id_famille_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_tarif (id INT AUTO_INCREMENT NOT NULL, id_produit_id INT NOT NULL, id_tarif_id INT NOT NULL, tarif_ttc DOUBLE PRECISION DEFAULT NULL, taux DOUBLE PRECISION DEFAULT NULL, tarif_ht DOUBLE PRECISION DEFAULT NULL, visib INT DEFAULT NULL, date_sys DATE DEFAULT NULL, INDEX IDX_3EEDEE5DAABEFE2C (id_produit_id), INDEX IDX_3EEDEE5D65A7E6CC (id_tarif_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produits (id INT AUTO_INCREMENT NOT NULL, id_type_produit_id INT NOT NULL, id_produit VARCHAR(40) NOT NULL, produit VARCHAR(255) DEFAULT NULL, unite_vente VARCHAR(20) DEFAULT NULL, id_famille_sous_c VARCHAR(20) DEFAULT NULL, description LONGTEXT DEFAULT NULL, codebarre VARCHAR(80) DEFAULT NULL, photo VARCHAR(100) DEFAULT NULL, photo_born VARCHAR(100) DEFAULT NULL, orders INT DEFAULT NULL, avoir_acc INT DEFAULT NULL, choix INT DEFAULT NULL, imprimante VARCHAR(100) DEFAULT NULL, visib INT DEFAULT NULL, id_restaurant VARCHAR(80) DEFAULT NULL, date DATE NOT NULL, INDEX IDX_BE2DDF8CFB696B56 (id_type_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_client (id INT AUTO_INCREMENT NOT NULL, id_type_client INT NOT NULL, type_client VARCHAR(80) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_produit (id INT AUTO_INCREMENT NOT NULL, id_type_produit INT NOT NULL, type_produit VARCHAR(80) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_tarif (id INT AUTO_INCREMENT NOT NULL, id_tarif INT NOT NULL, tarif VARCHAR(40) DEFAULT NULL, id_tva INT DEFAULT NULL, par_defaut INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_qte ADD CONSTRAINT FK_4EE6D12AD71E064B FOREIGN KEY (id_article_id) REFERENCES articles (id)');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFD99DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFD65A7E6CC FOREIGN KEY (id_tarif_id) REFERENCES type_tarif (id)');
        $this->addSql('ALTER TABLE carte_lg ADD CONSTRAINT FK_2DB96B49BF00B8A0 FOREIGN KEY (id_repartition_id) REFERENCES carte_repartition (id)');
        $this->addSql('ALTER TABLE carte_lg ADD CONSTRAINT FK_2DB96B49AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE carte_lg ADD CONSTRAINT FK_2DB96B49991C2223 FOREIGN KEY (id_carte_id) REFERENCES carte (id)');
        $this->addSql('ALTER TABLE carte_repartition ADD CONSTRAINT FK_97A33A3E991C2223 FOREIGN KEY (id_carte_id) REFERENCES carte (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455AD2D2831 FOREIGN KEY (type_client_id) REFERENCES type_client (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C744045565A7E6CC FOREIGN KEY (id_tarif_id) REFERENCES type_tarif (id)');
        $this->addSql('ALTER TABLE client_beneficiaire ADD CONSTRAINT FK_4A7A0399DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE familles_sous ADD CONSTRAINT FK_D60A3ACA322DFB53 FOREIGN KEY (id_famille_id) REFERENCES familles (id)');
        $this->addSql('ALTER TABLE produit_tarif ADD CONSTRAINT FK_3EEDEE5DAABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE produit_tarif ADD CONSTRAINT FK_3EEDEE5D65A7E6CC FOREIGN KEY (id_tarif_id) REFERENCES type_tarif (id)');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8CFB696B56 FOREIGN KEY (id_type_produit_id) REFERENCES type_produit (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_qte DROP FOREIGN KEY FK_4EE6D12AD71E064B');
        $this->addSql('ALTER TABLE carte_lg DROP FOREIGN KEY FK_2DB96B49991C2223');
        $this->addSql('ALTER TABLE carte_repartition DROP FOREIGN KEY FK_97A33A3E991C2223');
        $this->addSql('ALTER TABLE carte_lg DROP FOREIGN KEY FK_2DB96B49BF00B8A0');
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY FK_BAD4FFFD99DED506');
        $this->addSql('ALTER TABLE client_beneficiaire DROP FOREIGN KEY FK_4A7A0399DED506');
        $this->addSql('ALTER TABLE familles_sous DROP FOREIGN KEY FK_D60A3ACA322DFB53');
        $this->addSql('ALTER TABLE carte_lg DROP FOREIGN KEY FK_2DB96B49AABEFE2C');
        $this->addSql('ALTER TABLE produit_tarif DROP FOREIGN KEY FK_3EEDEE5DAABEFE2C');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455AD2D2831');
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8CFB696B56');
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY FK_BAD4FFFD65A7E6CC');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C744045565A7E6CC');
        $this->addSql('ALTER TABLE produit_tarif DROP FOREIGN KEY FK_3EEDEE5D65A7E6CC');
        $this->addSql('DROP TABLE article_qte');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE carte');
        $this->addSql('DROP TABLE carte_lg');
        $this->addSql('DROP TABLE carte_repartition');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE client_beneficiaire');
        $this->addSql('DROP TABLE familles');
        $this->addSql('DROP TABLE familles_sous');
        $this->addSql('DROP TABLE produit_tarif');
        $this->addSql('DROP TABLE produits');
        $this->addSql('DROP TABLE type_client');
        $this->addSql('DROP TABLE type_produit');
        $this->addSql('DROP TABLE type_tarif');
    }
}
