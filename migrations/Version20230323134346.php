<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230323134346 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE details_recette ADD recette_id INT NOT NULL, ADD ingredients_id INT NOT NULL');
        $this->addSql('ALTER TABLE details_recette ADD CONSTRAINT FK_AFE81A8189312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id)');
        $this->addSql('ALTER TABLE details_recette ADD CONSTRAINT FK_AFE81A813EC4DCE FOREIGN KEY (ingredients_id) REFERENCES ingredients (id)');
        $this->addSql('CREATE INDEX IDX_AFE81A8189312FE9 ON details_recette (recette_id)');
        $this->addSql('CREATE INDEX IDX_AFE81A813EC4DCE ON details_recette (ingredients_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE details_recette DROP FOREIGN KEY FK_AFE81A8189312FE9');
        $this->addSql('ALTER TABLE details_recette DROP FOREIGN KEY FK_AFE81A813EC4DCE');
        $this->addSql('DROP INDEX IDX_AFE81A8189312FE9 ON details_recette');
        $this->addSql('DROP INDEX IDX_AFE81A813EC4DCE ON details_recette');
        $this->addSql('ALTER TABLE details_recette DROP recette_id, DROP ingredients_id');
    }
}
