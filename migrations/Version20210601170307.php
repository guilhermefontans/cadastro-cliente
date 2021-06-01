<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210601170307 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE loja_produto (loja_id INT NOT NULL, produto_id INT NOT NULL, INDEX IDX_55BAF385E1C0A7C8 (loja_id), INDEX IDX_55BAF385105CFD56 (produto_id), PRIMARY KEY(loja_id, produto_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE loja_produto ADD CONSTRAINT FK_55BAF385E1C0A7C8 FOREIGN KEY (loja_id) REFERENCES loja (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loja_produto ADD CONSTRAINT FK_55BAF385105CFD56 FOREIGN KEY (produto_id) REFERENCES produto (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE loja_produto');
    }
}
