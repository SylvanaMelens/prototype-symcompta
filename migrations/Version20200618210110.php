<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200618210110 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE invoice_customer (id INT AUTO_INCREMENT NOT NULL, invoice_customer_client_id INT NOT NULL, invoice_customer_vat_rate_id INT NOT NULL, invoice_customer_description VARCHAR(255) NOT NULL, invoice_customer_sent_at DATETIME NOT NULL, invoice_customer_status VARCHAR(255) NOT NULL, invoice_customer_amount_base DOUBLE PRECISION NOT NULL, invoice_customer_total_amount DOUBLE PRECISION NOT NULL, INDEX IDX_9E11D45144AC09AB (invoice_customer_client_id), INDEX IDX_9E11D451CF57399E (invoice_customer_vat_rate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE invoice_customer ADD CONSTRAINT FK_9E11D45144AC09AB FOREIGN KEY (invoice_customer_client_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE invoice_customer ADD CONSTRAINT FK_9E11D451CF57399E FOREIGN KEY (invoice_customer_vat_rate_id) REFERENCES vat_rate (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE invoice_customer');
    }
}
