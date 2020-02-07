<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200207172836 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE publicación (id INT AUTO_INCREMENT NOT NULL, categoria_id INT NOT NULL, título VARCHAR(255) NOT NULL, contenido LONGTEXT NOT NULL, fecha_publicación DATETIME NOT NULL, imagen VARCHAR(255) DEFAULT NULL, INDEX IDX_674A02E93397707A (categoria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comentario (id INT AUTO_INCREMENT NOT NULL, publicación_id INT NOT NULL, fecha_publicación DATETIME NOT NULL, contenido LONGTEXT NOT NULL, INDEX IDX_4B91E702644DE474 (publicación_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categoria (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE publicación ADD CONSTRAINT FK_674A02E93397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('ALTER TABLE comentario ADD CONSTRAINT FK_4B91E702644DE474 FOREIGN KEY (publicación_id) REFERENCES publicación (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comentario DROP FOREIGN KEY FK_4B91E702644DE474');
        $this->addSql('ALTER TABLE publicación DROP FOREIGN KEY FK_674A02E93397707A');
        $this->addSql('DROP TABLE publicación');
        $this->addSql('DROP TABLE comentario');
        $this->addSql('DROP TABLE categoria');
    }
}
