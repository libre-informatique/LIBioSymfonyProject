<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171005154536 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        if ($schema->hasTable('lexik_translation_file')) {
            // Skipping this migration because table lexik_translation_file already exist
            return;
        }

        $this->addSql('CREATE TABLE lexik_translation_file (id SERIAL NOT NULL, domain VARCHAR(255) NOT NULL, locale VARCHAR(10) NOT NULL, extention VARCHAR(10) NOT NULL, path VARCHAR(255) NOT NULL, hash VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX hash_idx ON lexik_translation_file (hash)');
        $this->addSql('CREATE TABLE lexik_trans_unit (id SERIAL NOT NULL, key_name VARCHAR(255) NOT NULL, domain VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX key_domain_idx ON lexik_trans_unit (key_name, domain)');
        $this->addSql('CREATE TABLE lexik_trans_unit_translations (id SERIAL NOT NULL, file_id INT DEFAULT NULL, trans_unit_id INT DEFAULT NULL, locale VARCHAR(10) NOT NULL, content TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B0AA394493CB796C ON lexik_trans_unit_translations (file_id)');
        $this->addSql('CREATE INDEX IDX_B0AA3944C3C583C9 ON lexik_trans_unit_translations (trans_unit_id)');
        $this->addSql('CREATE UNIQUE INDEX trans_unit_locale_idx ON lexik_trans_unit_translations (trans_unit_id, locale)');
        $this->addSql('ALTER TABLE lexik_trans_unit_translations ADD CONSTRAINT FK_B0AA394493CB796C FOREIGN KEY (file_id) REFERENCES lexik_translation_file (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lexik_trans_unit_translations ADD CONSTRAINT FK_B0AA3944C3C583C9 FOREIGN KEY (trans_unit_id) REFERENCES lexik_trans_unit (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_attribute_value ALTER json_value TYPE JSON');
        $this->addSql('ALTER TABLE sylius_product_attribute_value ALTER json_value DROP DEFAULT');
        $this->addSql('ALTER TABLE sylius_payment ALTER details TYPE JSON');
        $this->addSql('ALTER TABLE sylius_payment ALTER details DROP DEFAULT');
        $this->addSql('ALTER TABLE sylius_gateway_config ALTER config TYPE JSON');
        $this->addSql('ALTER TABLE sylius_gateway_config ALTER config DROP DEFAULT');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE lexik_trans_unit_translations DROP CONSTRAINT FK_B0AA394493CB796C');
        $this->addSql('ALTER TABLE lexik_trans_unit_translations DROP CONSTRAINT FK_B0AA3944C3C583C9');
        $this->addSql('DROP TABLE lexik_translation_file');
        $this->addSql('DROP TABLE lexik_trans_unit');
        $this->addSql('DROP TABLE lexik_trans_unit_translations');
        $this->addSql('ALTER TABLE sylius_gateway_config ALTER config TYPE JSON');
        $this->addSql('ALTER TABLE sylius_gateway_config ALTER config DROP DEFAULT');
        $this->addSql('ALTER TABLE sylius_product_attribute_value ALTER json_value TYPE JSON');
        $this->addSql('ALTER TABLE sylius_product_attribute_value ALTER json_value DROP DEFAULT');
        $this->addSql('ALTER TABLE sylius_payment ALTER details TYPE JSON');
        $this->addSql('ALTER TABLE sylius_payment ALTER details DROP DEFAULT');
    }
}
