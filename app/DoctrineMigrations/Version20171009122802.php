<?php

/*
 * This file is part of the Lisem Project.
 *
 * Copyright (C) 2015-2017 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171009122802 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        if (!$this->connection->getSchemaManager()->tablesExist(['librinfo_ecommerce_payment']) === true) {
            $this->addSql('CREATE TABLE librinfo_ecommerce_payment (id UUID NOT NULL, method_id UUID DEFAULT NULL, order_id UUID NOT NULL, currency_code VARCHAR(3) NOT NULL, amount INT NOT NULL, state VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, details TEXT NOT NULL, PRIMARY KEY(id))');
            $this->addSql('CREATE INDEX IDX_FB4B829419883967 ON librinfo_ecommerce_payment (method_id)');
            $this->addSql('CREATE INDEX IDX_FB4B82948D9F6D38 ON librinfo_ecommerce_payment (order_id)');
            $this->addSql('COMMENT ON COLUMN librinfo_ecommerce_payment.details IS \'(DC2Type:array)\'');
            $this->addSql('ALTER TABLE librinfo_ecommerce_payment ADD CONSTRAINT FK_FB4B829419883967 FOREIGN KEY (method_id) REFERENCES sylius_payment_method (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
            $this->addSql('ALTER TABLE librinfo_ecommerce_payment ADD CONSTRAINT FK_FB4B82948D9F6D38 FOREIGN KEY (order_id) REFERENCES librinfo_ecommerce_order (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
            $this->addSql('INSERT INTO librinfo_ecommerce_payment (id,method_id,order_id,currency_code,amount,state,created_at,updated_at,details) SELECT id,method_id,order_id,currency_code,amount,state,created_at,updated_at,\'a:0:{}\' AS details FROM sylius_payment');
            $this->addSql('DROP TABLE sylius_payment');
        }
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        if (!$this->connection->getSchemaManager()->tablesExist(['sylius_payment']) === true) {
            $this->addSql('CREATE TABLE sylius_payment (id UUID NOT NULL, method_id UUID DEFAULT NULL, order_id UUID NOT NULL, currency_code VARCHAR(3) NOT NULL, amount INT NOT NULL, state VARCHAR(255) NOT NULL, details JSON NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
            $this->addSql('CREATE INDEX idx_d9191bd48d9f6d38 ON sylius_payment (order_id)');
            $this->addSql('CREATE INDEX idx_d9191bd419883967 ON sylius_payment (method_id)');
            $this->addSql('COMMENT ON COLUMN sylius_payment.details IS \'(DC2Type:json)\'');
            $this->addSql('INSERT INTO sylius_payment (id,method_id,order_id,currency_code,amount,state,created_at,updated_at,details) SELECT id,method_id,order_id,currency_code,amount,state,created_at,updated_at,\'[]\' AS details FROM librinfo_ecommerce_payment');
            $this->addSql('ALTER TABLE librinfo_ecommerce_payment DROP CONSTRAINT IF EXISTS FK_FB4B829419883967');
            $this->addSql('ALTER TABLE librinfo_ecommerce_payment DROP CONSTRAINT IF EXISTS FK_FB4B82948D9F6D38');
            $this->addSql('DROP TABLE librinfo_ecommerce_payment');
            $this->addSql('ALTER TABLE sylius_payment ADD CONSTRAINT fk_d9191bd419883967 FOREIGN KEY (method_id) REFERENCES sylius_payment_method (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
            $this->addSql('ALTER TABLE sylius_payment ADD CONSTRAINT fk_d9191bd48d9f6d38 FOREIGN KEY (order_id) REFERENCES librinfo_ecommerce_order (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        }
    }
}
