<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241220115746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, review_id INT NOT NULL, content LONGTEXT NOT NULL, date DATETIME NOT NULL, INDEX IDX_67F068BCA76ED395 (user_id), INDEX IDX_67F068BC3E2E969B (review_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE critique (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, film_id INT NOT NULL, content LONGTEXT NOT NULL, rating_given SMALLINT NOT NULL, publication_date DATETIME NOT NULL, INDEX IDX_1F950324A76ED395 (user_id), INDEX IDX_1F950324567F5183 (film_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favorites (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, film_id INT NOT NULL, INDEX IDX_E46960F5A76ED395 (user_id), INDEX IDX_E46960F5567F5183 (film_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, genre_id INT NOT NULL, title VARCHAR(255) NOT NULL, release_date DATE NOT NULL, image_path VARCHAR(255) DEFAULT NULL, INDEX IDX_8244BE224296D31F (genre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA76ED395 FOREIGN KEY (user_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC3E2E969B FOREIGN KEY (review_id) REFERENCES critique (id)');
        $this->addSql('ALTER TABLE critique ADD CONSTRAINT FK_1F950324A76ED395 FOREIGN KEY (user_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE critique ADD CONSTRAINT FK_1F950324567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE favorites ADD CONSTRAINT FK_E46960F5A76ED395 FOREIGN KEY (user_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE favorites ADD CONSTRAINT FK_E46960F5567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE224296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA76ED395');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC3E2E969B');
        $this->addSql('ALTER TABLE critique DROP FOREIGN KEY FK_1F950324A76ED395');
        $this->addSql('ALTER TABLE critique DROP FOREIGN KEY FK_1F950324567F5183');
        $this->addSql('ALTER TABLE favorites DROP FOREIGN KEY FK_E46960F5A76ED395');
        $this->addSql('ALTER TABLE favorites DROP FOREIGN KEY FK_E46960F5567F5183');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE224296D31F');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE critique');
        $this->addSql('DROP TABLE favorites');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE genre');
    }
}
