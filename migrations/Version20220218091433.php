<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220218091433 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carte_repartition (id INT AUTO_INCREMENT NOT NULL, carte_id INT DEFAULT NULL, id_repartition VARCHAR(255) NOT NULL, repartition VARCHAR(255) NOT NULL, heure TIME DEFAULT NULL, pax INT DEFAULT NULL, facturer TINYINT(1) DEFAULT NULL, date_sys DATETIME DEFAULT NULL, INDEX IDX_97A33A3EC9C7CEB6 (carte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carte_repartition ADD CONSTRAINT FK_97A33A3EC9C7CEB6 FOREIGN KEY (carte_id) REFERENCES carte (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carte_lg DROP FOREIGN KEY FK_2DB96B49826605A6');
        $this->addSql('DROP TABLE carte_repartition');
    }
}
