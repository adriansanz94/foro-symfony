<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200210162829 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE publicación ADD usuario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE publicación ADD CONSTRAINT FK_674A02E9DB38439E FOREIGN KEY (usuario_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_674A02E9DB38439E ON publicación (usuario_id)');
        $this->addSql('ALTER TABLE comentario ADD usuario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comentario ADD CONSTRAINT FK_4B91E702DB38439E FOREIGN KEY (usuario_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_4B91E702DB38439E ON comentario (usuario_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comentario DROP FOREIGN KEY FK_4B91E702DB38439E');
        $this->addSql('DROP INDEX IDX_4B91E702DB38439E ON comentario');
        $this->addSql('ALTER TABLE comentario DROP usuario_id');
        $this->addSql('ALTER TABLE publicación DROP FOREIGN KEY FK_674A02E9DB38439E');
        $this->addSql('DROP INDEX IDX_674A02E9DB38439E ON publicación');
        $this->addSql('ALTER TABLE publicación DROP usuario_id');
    }
}
