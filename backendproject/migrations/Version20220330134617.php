<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220330134617 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE critere (id INT AUTO_INCREMENT NOT NULL, domaine VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE critere_memoire (critere_id INT NOT NULL, memoire_id INT NOT NULL, INDEX IDX_BF1EE29F9E5F45AB (critere_id), INDEX IDX_BF1EE29FDE665C15 (memoire_id), PRIMARY KEY(critere_id, memoire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demande_empreint (id INT AUTO_INCREMENT NOT NULL, memoires_id INT NOT NULL, datedebut DATETIME NOT NULL, datefin DATETIME NOT NULL, INDEX IDX_3EC9AFAD8A723F92 (memoires_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hedi (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE memoire (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, file VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE critere_memoire ADD CONSTRAINT FK_BF1EE29F9E5F45AB FOREIGN KEY (critere_id) REFERENCES critere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE critere_memoire ADD CONSTRAINT FK_BF1EE29FDE665C15 FOREIGN KEY (memoire_id) REFERENCES memoire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE demande_empreint ADD CONSTRAINT FK_3EC9AFAD8A723F92 FOREIGN KEY (memoires_id) REFERENCES memoire (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE critere_memoire DROP FOREIGN KEY FK_BF1EE29F9E5F45AB');
        $this->addSql('ALTER TABLE critere_memoire DROP FOREIGN KEY FK_BF1EE29FDE665C15');
        $this->addSql('ALTER TABLE demande_empreint DROP FOREIGN KEY FK_3EC9AFAD8A723F92');
        $this->addSql('DROP TABLE critere');
        $this->addSql('DROP TABLE critere_memoire');
        $this->addSql('DROP TABLE demande_empreint');
        $this->addSql('DROP TABLE hedi');
        $this->addSql('DROP TABLE memoire');
    }
}
