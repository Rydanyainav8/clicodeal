<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210720160654 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE partenaire (id INT AUTO_INCREMENT NOT NULL, partenaire_username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partenaire_game (partenaire_id INT NOT NULL, game_id INT NOT NULL, INDEX IDX_CC4A0DFF98DE13AC (partenaire_id), INDEX IDX_CC4A0DFFE48FD905 (game_id), PRIMARY KEY(partenaire_id, game_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, age INT NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_game (user_id INT NOT NULL, game_id INT NOT NULL, INDEX IDX_59AA7D45A76ED395 (user_id), INDEX IDX_59AA7D45E48FD905 (game_id), PRIMARY KEY(user_id, game_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE partenaire_game ADD CONSTRAINT FK_CC4A0DFF98DE13AC FOREIGN KEY (partenaire_id) REFERENCES partenaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE partenaire_game ADD CONSTRAINT FK_CC4A0DFFE48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_game ADD CONSTRAINT FK_59AA7D45A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_game ADD CONSTRAINT FK_59AA7D45E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE partenaire_game DROP FOREIGN KEY FK_CC4A0DFF98DE13AC');
        $this->addSql('ALTER TABLE user_game DROP FOREIGN KEY FK_59AA7D45A76ED395');
        $this->addSql('DROP TABLE partenaire');
        $this->addSql('DROP TABLE partenaire_game');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_game');
    }
}
