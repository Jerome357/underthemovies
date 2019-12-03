<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191202101253 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vote (id INT AUTO_INCREMENT NOT NULL, quote_id INT DEFAULT NULL, user_id INT NOT NULL, grade INT NOT NULL, comment LONGTEXT DEFAULT NULL, INDEX IDX_5A108564DB805178 (quote_id), INDEX IDX_5A108564A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie (id INT AUTO_INCREMENT NOT NULL, director_id INT NOT NULL, title VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, release_date DATE NOT NULL, INDEX IDX_1D5EF26F899FB366 (director_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_category (movie_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_DABA824C8F93B6FC (movie_id), INDEX IDX_DABA824C12469DE2 (category_id), PRIMARY KEY(movie_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, firstname VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quote (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_6B71CBF4A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_personage (id INT AUTO_INCREMENT NOT NULL, personage_id INT NOT NULL, person_id INT NOT NULL, movie_id INT NOT NULL, INDEX IDX_75DF67C3EA8E3E4A (personage_id), INDEX IDX_75DF67C3217BBB47 (person_id), INDEX IDX_75DF67C38F93B6FC (movie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_personage_quote (movie_personage_id INT NOT NULL, quote_id INT NOT NULL, INDEX IDX_712AE35BC978DF79 (movie_personage_id), INDEX IDX_712AE35BDB805178 (quote_id), PRIMARY KEY(movie_personage_id, quote_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personage (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vote ADD CONSTRAINT FK_5A108564DB805178 FOREIGN KEY (quote_id) REFERENCES quote (id)');
        $this->addSql('ALTER TABLE vote ADD CONSTRAINT FK_5A108564A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26F899FB366 FOREIGN KEY (director_id) REFERENCES person (id)');
        $this->addSql('ALTER TABLE movie_category ADD CONSTRAINT FK_DABA824C8F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_category ADD CONSTRAINT FK_DABA824C12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE movie_personage ADD CONSTRAINT FK_75DF67C3EA8E3E4A FOREIGN KEY (personage_id) REFERENCES personage (id)');
        $this->addSql('ALTER TABLE movie_personage ADD CONSTRAINT FK_75DF67C3217BBB47 FOREIGN KEY (person_id) REFERENCES person (id)');
        $this->addSql('ALTER TABLE movie_personage ADD CONSTRAINT FK_75DF67C38F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id)');
        $this->addSql('ALTER TABLE movie_personage_quote ADD CONSTRAINT FK_712AE35BC978DF79 FOREIGN KEY (movie_personage_id) REFERENCES movie_personage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_personage_quote ADD CONSTRAINT FK_712AE35BDB805178 FOREIGN KEY (quote_id) REFERENCES quote (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE movie_category DROP FOREIGN KEY FK_DABA824C12469DE2');
        $this->addSql('ALTER TABLE movie_category DROP FOREIGN KEY FK_DABA824C8F93B6FC');
        $this->addSql('ALTER TABLE movie_personage DROP FOREIGN KEY FK_75DF67C38F93B6FC');
        $this->addSql('ALTER TABLE vote DROP FOREIGN KEY FK_5A108564A76ED395');
        $this->addSql('ALTER TABLE quote DROP FOREIGN KEY FK_6B71CBF4A76ED395');
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26F899FB366');
        $this->addSql('ALTER TABLE movie_personage DROP FOREIGN KEY FK_75DF67C3217BBB47');
        $this->addSql('ALTER TABLE vote DROP FOREIGN KEY FK_5A108564DB805178');
        $this->addSql('ALTER TABLE movie_personage_quote DROP FOREIGN KEY FK_712AE35BDB805178');
        $this->addSql('ALTER TABLE movie_personage_quote DROP FOREIGN KEY FK_712AE35BC978DF79');
        $this->addSql('ALTER TABLE movie_personage DROP FOREIGN KEY FK_75DF67C3EA8E3E4A');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE vote');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE movie_category');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE person');
        $this->addSql('DROP TABLE quote');
        $this->addSql('DROP TABLE movie_personage');
        $this->addSql('DROP TABLE movie_personage_quote');
        $this->addSql('DROP TABLE personage');
    }
}
