<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170927072336 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE librinfo_ecommerce_productvariant__seedbatch (productvariant_id UUID NOT NULL, seedbatch_id UUID NOT NULL, PRIMARY KEY(productvariant_id, seedbatch_id))');
        $this->addSql('CREATE INDEX IDX_E3BA80921855BE3F ON librinfo_ecommerce_productvariant__seedbatch (productvariant_id)');
        $this->addSql('CREATE INDEX IDX_E3BA8092A97FD19E ON librinfo_ecommerce_productvariant__seedbatch (seedbatch_id)');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productvariant__seedbatch ADD CONSTRAINT FK_E3BA80921855BE3F FOREIGN KEY (productvariant_id) REFERENCES librinfo_ecommerce_productvariant (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productvariant__seedbatch ADD CONSTRAINT FK_E3BA8092A97FD19E FOREIGN KEY (seedbatch_id) REFERENCES librinfo_seedbatch_seedbatch (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE sylius_product_review');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productvariant DROP CONSTRAINT fk_80bc7a9d5009b3c8');
        $this->addSql('DROP INDEX idx_80bc7a9d5009b3c8');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productvariant DROP seedbatch_id');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productvariant ADD enabled BOOLEAN DEFAULT true NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE sylius_product_review (id UUID NOT NULL, product_id UUID NOT NULL, author_id UUID NOT NULL, title VARCHAR(255) NOT NULL, rating INT NOT NULL, comment TEXT DEFAULT NULL, status VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_c7056a99f675f31b ON sylius_product_review (author_id)');
        $this->addSql('CREATE INDEX idx_c7056a994584665a ON sylius_product_review (product_id)');
        $this->addSql('ALTER TABLE sylius_product_review ADD CONSTRAINT fk_c7056a994584665a FOREIGN KEY (product_id) REFERENCES librinfo_ecommerce_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_review ADD CONSTRAINT fk_c7056a99f675f31b FOREIGN KEY (author_id) REFERENCES librinfo_crm_organism (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE librinfo_ecommerce_productvariant__seedbatch');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productvariant ADD seedbatch_id UUID DEFAULT NULL');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productvariant ADD CONSTRAINT fk_80bc7a9d5009b3c8 FOREIGN KEY (seedbatch_id) REFERENCES librinfo_seedbatch_seedbatch (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_80bc7a9d5009b3c8 ON librinfo_ecommerce_productvariant (seedbatch_id)');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productvariant DROP enabled');
    }
}
