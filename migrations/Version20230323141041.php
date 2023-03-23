<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230323141041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE details_recette (id INT AUTO_INCREMENT NOT NULL, recette_id INT NOT NULL, ingredients_id INT NOT NULL, quantite INT NOT NULL, mesure VARCHAR(50) NOT NULL, INDEX IDX_AFE81A8189312FE9 (recette_id), INDEX IDX_AFE81A813EC4DCE (ingredients_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredients (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recette (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, duree_preparation VARCHAR(50) NOT NULL, temps_cuisson VARCHAR(50) NOT NULL, nb_personne INT NOT NULL, photo VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE details_recette ADD CONSTRAINT FK_AFE81A8189312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id)');
        $this->addSql('ALTER TABLE details_recette ADD CONSTRAINT FK_AFE81A813EC4DCE FOREIGN KEY (ingredients_id) REFERENCES ingredients (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE details_recette DROP FOREIGN KEY FK_AFE81A8189312FE9');
        $this->addSql('ALTER TABLE details_recette DROP FOREIGN KEY FK_AFE81A813EC4DCE');
        $this->addSql('DROP TABLE details_recette');
        $this->addSql('DROP TABLE ingredients');
        $this->addSql('DROP TABLE recette');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
