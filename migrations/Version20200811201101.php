<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200811201101 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE invoice_customer_vat_rate');
        $this->addSql('ALTER TABLE invoice_customer ADD invoice_customer_vat_rate_id INT NOT NULL');
        $this->addSql('ALTER TABLE invoice_customer ADD CONSTRAINT FK_9E11D451CF57399E FOREIGN KEY (invoice_customer_vat_rate_id) REFERENCES vat_rate (id)');
        $this->addSql('CREATE INDEX IDX_9E11D451CF57399E ON invoice_customer (invoice_customer_vat_rate_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE invoice_customer_vat_rate (invoice_customer_id INT NOT NULL, vat_rate_id INT NOT NULL, INDEX IDX_D9FF7F3D84DBA1C0 (invoice_customer_id), INDEX IDX_D9FF7F3D43897540 (vat_rate_id), PRIMARY KEY(invoice_customer_id, vat_rate_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE invoice_customer_vat_rate ADD CONSTRAINT FK_D9FF7F3D43897540 FOREIGN KEY (vat_rate_id) REFERENCES vat_rate (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE invoice_customer_vat_rate ADD CONSTRAINT FK_D9FF7F3D84DBA1C0 FOREIGN KEY (invoice_customer_id) REFERENCES invoice_customer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE invoice_customer DROP FOREIGN KEY FK_9E11D451CF57399E');
        $this->addSql('DROP INDEX IDX_9E11D451CF57399E ON invoice_customer');
        $this->addSql('ALTER TABLE invoice_customer DROP invoice_customer_vat_rate_id');
    }
}
