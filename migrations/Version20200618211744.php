<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200618211744 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE provider (id INT AUTO_INCREMENT NOT NULL, provider_first_name VARCHAR(255) DEFAULT NULL, provider_last_name VARCHAR(255) NOT NULL, provider_address VARCHAR(255) NOT NULL, provider_post_code VARCHAR(255) NOT NULL, provider_city VARCHAR(255) NOT NULL, provider_country VARCHAR(255) NOT NULL, provider_vat_number VARCHAR(255) NOT NULL, provider_email VARCHAR(255) NOT NULL, provider_phone VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE provider');
    }
}
