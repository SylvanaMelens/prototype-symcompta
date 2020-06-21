<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200618212432 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE invoice_provider (id INT AUTO_INCREMENT NOT NULL, invoice_provider_name_id INT NOT NULL, invoice_provider_description VARCHAR(255) NOT NULL, invoice_provider_date DATETIME NOT NULL, invoice_provider_status VARCHAR(255) NOT NULL, invoice_provider_amount_base DOUBLE PRECISION NOT NULL, invoice_provider_total_amount DOUBLE PRECISION NOT NULL, INDEX IDX_8DEC29C48966E7F3 (invoice_provider_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoice_provider_vat_rate (invoice_provider_id INT NOT NULL, vat_rate_id INT NOT NULL, INDEX IDX_BD7852FB1D1DCA99 (invoice_provider_id), INDEX IDX_BD7852FB43897540 (vat_rate_id), PRIMARY KEY(invoice_provider_id, vat_rate_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE invoice_provider ADD CONSTRAINT FK_8DEC29C48966E7F3 FOREIGN KEY (invoice_provider_name_id) REFERENCES provider (id)');
        $this->addSql('ALTER TABLE invoice_provider_vat_rate ADD CONSTRAINT FK_BD7852FB1D1DCA99 FOREIGN KEY (invoice_provider_id) REFERENCES invoice_provider (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE invoice_provider_vat_rate ADD CONSTRAINT FK_BD7852FB43897540 FOREIGN KEY (vat_rate_id) REFERENCES vat_rate (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE invoice_provider_vat_rate DROP FOREIGN KEY FK_BD7852FB1D1DCA99');
        $this->addSql('DROP TABLE invoice_provider');
        $this->addSql('DROP TABLE invoice_provider_vat_rate');
    }
}
