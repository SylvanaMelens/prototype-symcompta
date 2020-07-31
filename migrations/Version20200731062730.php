<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200731062730 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE invoice_provider_vat_rate');
        $this->addSql('ALTER TABLE invoice_provider DROP FOREIGN KEY FK_VATRATE');
        $this->addSql('DROP INDEX vatrate ON invoice_provider');
        $this->addSql('ALTER TABLE invoice_provider CHANGE invoice_provider_vat_rate invoice_provider_vat_rate_id INT NOT NULL');
        $this->addSql('ALTER TABLE invoice_provider ADD CONSTRAINT FK_8DEC29C49839F64 FOREIGN KEY (invoice_provider_vat_rate_id) REFERENCES vat_rate (id)');
        $this->addSql('CREATE INDEX IDX_8DEC29C49839F64 ON invoice_provider (invoice_provider_vat_rate_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE invoice_provider_vat_rate (invoice_provider_id INT NOT NULL, vat_rate_id INT NOT NULL, INDEX IDX_BD7852FB1D1DCA99 (invoice_provider_id), INDEX IDX_BD7852FB43897540 (vat_rate_id), PRIMARY KEY(invoice_provider_id, vat_rate_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE invoice_provider_vat_rate ADD CONSTRAINT FK_BD7852FB1D1DCA99 FOREIGN KEY (invoice_provider_id) REFERENCES invoice_provider (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE invoice_provider_vat_rate ADD CONSTRAINT FK_BD7852FB43897540 FOREIGN KEY (vat_rate_id) REFERENCES vat_rate (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE invoice_provider DROP FOREIGN KEY FK_8DEC29C49839F64');
        $this->addSql('DROP INDEX IDX_8DEC29C49839F64 ON invoice_provider');
        $this->addSql('ALTER TABLE invoice_provider CHANGE invoice_provider_vat_rate_id invoice_provider_vat_rate INT NOT NULL');
        $this->addSql('ALTER TABLE invoice_provider ADD CONSTRAINT FK_VATRATE FOREIGN KEY (invoice_provider_vat_rate) REFERENCES vat_rate (id)');
        $this->addSql('CREATE INDEX vatrate ON invoice_provider (invoice_provider_vat_rate)');
    }
}
