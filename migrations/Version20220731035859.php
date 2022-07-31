<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220731035859 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_restaurant (category_id INT NOT NULL, restaurant_id INT NOT NULL, INDEX IDX_CD8B424112469DE2 (category_id), INDEX IDX_CD8B4241B1E7706E (restaurant_id), PRIMARY KEY(category_id, restaurant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, restaurant_id INT NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_67F068BCB1E7706E (restaurant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, alt_text VARCHAR(200) DEFAULT NULL, filename VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_restaurant (media_id INT NOT NULL, restaurant_id INT NOT NULL, INDEX IDX_E1B0DCABEA9FDD75 (media_id), INDEX IDX_E1B0DCABB1E7706E (restaurant_id), PRIMARY KEY(media_id, restaurant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, situation VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, region_id INT NOT NULL, nom VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, opening_time TIME NOT NULL, closure_time TIME NOT NULL, address VARCHAR(255) NOT NULL, zipcode VARCHAR(15) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_EB95123F98260155 (region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_restaurant ADD CONSTRAINT FK_CD8B424112469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_restaurant ADD CONSTRAINT FK_CD8B4241B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCB1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('ALTER TABLE media_restaurant ADD CONSTRAINT FK_E1B0DCABEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_restaurant ADD CONSTRAINT FK_E1B0DCABB1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123F98260155 FOREIGN KEY (region_id) REFERENCES region (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_restaurant DROP FOREIGN KEY FK_CD8B424112469DE2');
        $this->addSql('ALTER TABLE media_restaurant DROP FOREIGN KEY FK_E1B0DCABEA9FDD75');
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123F98260155');
        $this->addSql('ALTER TABLE category_restaurant DROP FOREIGN KEY FK_CD8B4241B1E7706E');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCB1E7706E');
        $this->addSql('ALTER TABLE media_restaurant DROP FOREIGN KEY FK_E1B0DCABB1E7706E');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_restaurant');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE media_restaurant');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE restaurant');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
