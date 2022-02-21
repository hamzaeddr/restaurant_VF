<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220217093900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carte (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, beneficiaire_id INT DEFAULT NULL, tarif_id INT DEFAULT NULL, type_client_id_id INT DEFAULT NULL, id_carte VARCHAR(255) NOT NULL, date_creation DATETIME DEFAULT NULL, type_client VARCHAR(255) DEFAULT NULL, nom_carte VARCHAR(255) DEFAULT NULL, date_validite DATETIME DEFAULT NULL, generer TINYINT(1) DEFAULT NULL, facturer TINYINT(1) DEFAULT NULL, annuler TINYINT(1) DEFAULT NULL, obs VARCHAR(255) DEFAULT NULL, date_sys DATETIME DEFAULT NULL, INDEX IDX_BAD4FFFD19EB6921 (client_id), INDEX IDX_BAD4FFFD5AF81F68 (beneficiaire_id), INDEX IDX_BAD4FFFD357C0A59 (tarif_id), INDEX IDX_BAD4FFFD5B6AB8E5 (type_client_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carte_lg (id INT AUTO_INCREMENT NOT NULL, repartition_id INT DEFAULT NULL, carte_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, id_carte_lg VARCHAR(255) NOT NULL, stock_carte INT DEFAULT NULL, unite VARCHAR(255) DEFAULT NULL, stock_cmd INT DEFAULT NULL, stock_carte_temp INT DEFAULT NULL, stock_reste INT DEFAULT NULL, date_sys DATETIME DEFAULT NULL, INDEX IDX_2DB96B49826605A6 (repartition_id), INDEX IDX_2DB96B49C9C7CEB6 (carte_id), INDEX IDX_2DB96B49F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carte_repartition (id INT AUTO_INCREMENT NOT NULL, carte_id INT DEFAULT NULL, id_repartition VARCHAR(255) NOT NULL, repartition VARCHAR(255) NOT NULL, heure TIME DEFAULT NULL, pax INT DEFAULT NULL, facturer TINYINT(1) DEFAULT NULL, date_sys DATETIME DEFAULT NULL, INDEX IDX_97A33A3EC9C7CEB6 (carte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, tarif_id INT DEFAULT NULL, id_client VARCHAR(255) NOT NULL, client VARCHAR(255) NOT NULL, type_client VARCHAR(255) DEFAULT NULL, morale INT DEFAULT NULL, contact VARCHAR(255) DEFAULT NULL, portable VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, obs VARCHAR(255) DEFAULT NULL, active TINYINT(1) DEFAULT NULL, date_sys DATETIME DEFAULT NULL, INDEX IDX_C7440455357C0A59 (tarif_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client_beneficiaire (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, tarif_id INT DEFAULT NULL, id_beneficiaire VARCHAR(255) NOT NULL, beneficiaire VARCHAR(255) NOT NULL, abrev VARCHAR(255) DEFAULT NULL, responsable VARCHAR(255) DEFAULT NULL, date_sys DATETIME DEFAULT NULL, INDEX IDX_4A7A0319EB6921 (client_id), INDEX IDX_4A7A03357C0A59 (tarif_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE famille_carte (id INT AUTO_INCREMENT NOT NULL, type_famille_id INT DEFAULT NULL, id_famille_c VARCHAR(255) NOT NULL, famille_c VARCHAR(255) NOT NULL, farabe_c VARCHAR(255) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, photo_born VARCHAR(255) DEFAULT NULL, photo_xl VARCHAR(255) DEFAULT NULL, couleur_btn INT DEFAULT NULL, ordre INT DEFAULT NULL, visib INT DEFAULT NULL, date_sys DATETIME DEFAULT NULL, INDEX IDX_C19481278AA4ADA1 (type_famille_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE famille_sous_c (id INT AUTO_INCREMENT NOT NULL, famille_c_id INT DEFAULT NULL, idfamille_sous_c VARCHAR(255) NOT NULL, famille_sous_c VARCHAR(255) NOT NULL, sarabe_c VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, ordre INT DEFAULT NULL, visib INT DEFAULT NULL, date_sys DATETIME DEFAULT NULL, INDEX IDX_A2A5B23A6082EF19 (famille_c_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, famille_sous_c_id INT DEFAULT NULL, type_produit_id INT DEFAULT NULL, id_produit VARCHAR(255) NOT NULL, produit VARCHAR(255) NOT NULL, unite_vente VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, code_barre VARCHAR(255) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, photo_born VARCHAR(255) DEFAULT NULL, ordre TINYINT(1) DEFAULT NULL, avoir_acc TINYINT(1) DEFAULT NULL, choix TINYINT(1) DEFAULT NULL, imprimante VARCHAR(255) DEFAULT NULL, visib TINYINT(1) DEFAULT NULL, date_sys DATETIME DEFAULT NULL, INDEX IDX_29A5EC273FF23E89 (famille_sous_c_id), INDEX IDX_29A5EC271237A8DE (type_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_tarif (id INT AUTO_INCREMENT NOT NULL, produit_id INT DEFAULT NULL, tarif_id INT DEFAULT NULL, tarif_ttc DOUBLE PRECISION NOT NULL, taux DOUBLE PRECISION NOT NULL, tarif_ht DOUBLE PRECISION NOT NULL, visib TINYINT(1) DEFAULT NULL, date_sys DATETIME DEFAULT NULL, INDEX IDX_3EEDEE5DF347EFB (produit_id), INDEX IDX_3EEDEE5D357C0A59 (tarif_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repartition (id INT AUTO_INCREMENT NOT NULL, repartition VARCHAR(255) NOT NULL, heure_debut DATETIME NOT NULL, heure_fin DATETIME NOT NULL, ordre INT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_client (id INT AUTO_INCREMENT NOT NULL, type_client VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_famille (id INT AUTO_INCREMENT NOT NULL, type_famille VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_produit (id INT AUTO_INCREMENT NOT NULL, type_produit VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_tarif (id INT AUTO_INCREMENT NOT NULL, tva_id INT DEFAULT NULL, tarif VARCHAR(255) NOT NULL, par_defaut INT DEFAULT NULL, INDEX IDX_7D0E3E4D79775F (tva_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_tva (id INT AUTO_INCREMENT NOT NULL, libelle_tva VARCHAR(255) NOT NULL, taux DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unite (id INT AUTO_INCREMENT NOT NULL, unite VARCHAR(255) NOT NULL, obs VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFD19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFD5AF81F68 FOREIGN KEY (beneficiaire_id) REFERENCES client_beneficiaire (id)');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFD357C0A59 FOREIGN KEY (tarif_id) REFERENCES type_tarif (id)');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFD5B6AB8E5 FOREIGN KEY (type_client_id_id) REFERENCES type_client (id)');
        $this->addSql('ALTER TABLE carte_lg ADD CONSTRAINT FK_2DB96B49826605A6 FOREIGN KEY (repartition_id) REFERENCES carte_repartition (id)');
        $this->addSql('ALTER TABLE carte_lg ADD CONSTRAINT FK_2DB96B49C9C7CEB6 FOREIGN KEY (carte_id) REFERENCES carte (id)');
        $this->addSql('ALTER TABLE carte_lg ADD CONSTRAINT FK_2DB96B49F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE carte_repartition ADD CONSTRAINT FK_97A33A3EC9C7CEB6 FOREIGN KEY (carte_id) REFERENCES carte (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455357C0A59 FOREIGN KEY (tarif_id) REFERENCES type_tarif (id)');
        $this->addSql('ALTER TABLE client_beneficiaire ADD CONSTRAINT FK_4A7A0319EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE client_beneficiaire ADD CONSTRAINT FK_4A7A03357C0A59 FOREIGN KEY (tarif_id) REFERENCES type_tarif (id)');
        $this->addSql('ALTER TABLE famille_carte ADD CONSTRAINT FK_C19481278AA4ADA1 FOREIGN KEY (type_famille_id) REFERENCES type_famille (id)');
        $this->addSql('ALTER TABLE famille_sous_c ADD CONSTRAINT FK_A2A5B23A6082EF19 FOREIGN KEY (famille_c_id) REFERENCES famille_carte (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC273FF23E89 FOREIGN KEY (famille_sous_c_id) REFERENCES famille_sous_c (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC271237A8DE FOREIGN KEY (type_produit_id) REFERENCES type_produit (id)');
        $this->addSql('ALTER TABLE produit_tarif ADD CONSTRAINT FK_3EEDEE5DF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit_tarif ADD CONSTRAINT FK_3EEDEE5D357C0A59 FOREIGN KEY (tarif_id) REFERENCES type_tarif (id)');
        $this->addSql('ALTER TABLE type_tarif ADD CONSTRAINT FK_7D0E3E4D79775F FOREIGN KEY (tva_id) REFERENCES type_tva (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carte_lg DROP FOREIGN KEY FK_2DB96B49C9C7CEB6');
        $this->addSql('ALTER TABLE carte_repartition DROP FOREIGN KEY FK_97A33A3EC9C7CEB6');
        $this->addSql('ALTER TABLE carte_lg DROP FOREIGN KEY FK_2DB96B49826605A6');
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY FK_BAD4FFFD19EB6921');
        $this->addSql('ALTER TABLE client_beneficiaire DROP FOREIGN KEY FK_4A7A0319EB6921');
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY FK_BAD4FFFD5AF81F68');
        $this->addSql('ALTER TABLE famille_sous_c DROP FOREIGN KEY FK_A2A5B23A6082EF19');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC273FF23E89');
        $this->addSql('ALTER TABLE carte_lg DROP FOREIGN KEY FK_2DB96B49F347EFB');
        $this->addSql('ALTER TABLE produit_tarif DROP FOREIGN KEY FK_3EEDEE5DF347EFB');
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY FK_BAD4FFFD5B6AB8E5');
        $this->addSql('ALTER TABLE famille_carte DROP FOREIGN KEY FK_C19481278AA4ADA1');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC271237A8DE');
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY FK_BAD4FFFD357C0A59');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455357C0A59');
        $this->addSql('ALTER TABLE client_beneficiaire DROP FOREIGN KEY FK_4A7A03357C0A59');
        $this->addSql('ALTER TABLE produit_tarif DROP FOREIGN KEY FK_3EEDEE5D357C0A59');
        $this->addSql('ALTER TABLE type_tarif DROP FOREIGN KEY FK_7D0E3E4D79775F');
        $this->addSql('DROP TABLE carte');
        $this->addSql('DROP TABLE carte_lg');
        $this->addSql('DROP TABLE carte_repartition');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE client_beneficiaire');
        $this->addSql('DROP TABLE famille_carte');
        $this->addSql('DROP TABLE famille_sous_c');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE produit_tarif');
        $this->addSql('DROP TABLE repartition');
        $this->addSql('DROP TABLE type_client');
        $this->addSql('DROP TABLE type_famille');
        $this->addSql('DROP TABLE type_produit');
        $this->addSql('DROP TABLE type_tarif');
        $this->addSql('DROP TABLE type_tva');
        $this->addSql('DROP TABLE unite');
    }
}
