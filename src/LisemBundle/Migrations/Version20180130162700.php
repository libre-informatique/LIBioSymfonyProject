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
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180130162700 extends AbstractMigration implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE sil_stock_operation DROP CONSTRAINT fk_e8d9ed2e9393f8fe');
        $this->addSql('ALTER TABLE sil_stock_unit DROP CONSTRAINT fk_2ee60b65217a674b');
        $this->addSql('ALTER TABLE sil_manufacturing_bom DROP CONSTRAINT fk_6a250c85217a674b');
        $this->addSql('ALTER TABLE sil_manufacturing_bom_line DROP CONSTRAINT fk_1e754391217a674b');
        $this->addSql('ALTER TABLE sil_stock_movement DROP CONSTRAINT fk_78749426217a674b');
        $this->addSql('CREATE TABLE sil_manufacturing_order (id UUID NOT NULL, qty_uom_id UUID NOT NULL, bom_id UUID NOT NULL, dest_location_id UUID NOT NULL, input_operation_id UUID DEFAULT NULL, output_operation_id UUID DEFAULT NULL, batch_id UUID DEFAULT NULL, code VARCHAR(64) NOT NULL, expected_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, completed_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, qty_value NUMERIC(15, 5) NOT NULL, state_value VARCHAR(64) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FD28A77177153098 ON sil_manufacturing_order (code)');
        $this->addSql('CREATE INDEX IDX_FD28A771210D48FE ON sil_manufacturing_order (qty_uom_id)');
        $this->addSql('CREATE INDEX IDX_FD28A771BFD0DC92 ON sil_manufacturing_order (bom_id)');
        $this->addSql('CREATE INDEX IDX_FD28A771BF14A4AE ON sil_manufacturing_order (dest_location_id)');
        $this->addSql('CREATE INDEX IDX_FD28A77142EF4AA0 ON sil_manufacturing_order (input_operation_id)');
        $this->addSql('CREATE INDEX IDX_FD28A771C0C82346 ON sil_manufacturing_order (output_operation_id)');
        $this->addSql('CREATE INDEX IDX_FD28A771F39EBE7A ON sil_manufacturing_order (batch_id)');
        $this->addSql('ALTER TABLE sil_manufacturing_order ADD CONSTRAINT FK_FD28A771210D48FE FOREIGN KEY (qty_uom_id) REFERENCES sil_uom (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_manufacturing_order ADD CONSTRAINT FK_FD28A771BFD0DC92 FOREIGN KEY (bom_id) REFERENCES sil_manufacturing_bom (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_manufacturing_order ADD CONSTRAINT FK_FD28A771BF14A4AE FOREIGN KEY (dest_location_id) REFERENCES sil_stock_location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_manufacturing_order ADD CONSTRAINT FK_FD28A77142EF4AA0 FOREIGN KEY (input_operation_id) REFERENCES sil_stock_operation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_manufacturing_order ADD CONSTRAINT FK_FD28A771C0C82346 FOREIGN KEY (output_operation_id) REFERENCES sil_stock_operation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_manufacturing_order ADD CONSTRAINT FK_FD28A771F39EBE7A FOREIGN KEY (batch_id) REFERENCES sil_stock_batch (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE sil_stock_partner');
        $this->addSql('DROP TABLE sil_stock_item');
        $this->addSql('ALTER TABLE sil_stock_movement ALTER operation_id DROP NOT NULL');
        $this->addSql('ALTER TABLE sil_stock_movement ADD CONSTRAINT FK_78749426217A674B FOREIGN KEY (stockitem_id) REFERENCES sil_ecommerce_product_variant (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_unit ADD CONSTRAINT FK_2EE60B65217A674B FOREIGN KEY (stockitem_id) REFERENCES sil_ecommerce_product_variant (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_operation ADD CONSTRAINT FK_E8D9ED2E9393F8FE FOREIGN KEY (partner_id) REFERENCES sil_crm_organism (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_manufacturing_bom_line ADD src_location_id UUID NOT NULL');
        $this->addSql('ALTER TABLE sil_manufacturing_bom_line ADD batch_id UUID DEFAULT NULL');
        $this->addSql('ALTER TABLE sil_manufacturing_bom_line ADD CONSTRAINT FK_1E7543915BEF2755 FOREIGN KEY (src_location_id) REFERENCES sil_stock_location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_manufacturing_bom_line ADD CONSTRAINT FK_1E754391F39EBE7A FOREIGN KEY (batch_id) REFERENCES sil_stock_batch (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_manufacturing_bom_line ADD CONSTRAINT FK_1E754391217A674B FOREIGN KEY (stockitem_id) REFERENCES sil_ecommerce_product_variant (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_1E7543915BEF2755 ON sil_manufacturing_bom_line (src_location_id)');
        $this->addSql('CREATE INDEX IDX_1E754391F39EBE7A ON sil_manufacturing_bom_line (batch_id)');
        $this->addSql('ALTER TABLE sil_manufacturing_bom ADD CONSTRAINT FK_6A250C85217A674B FOREIGN KEY (stockitem_id) REFERENCES sil_ecommerce_product_variant (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_product_variant ADD uom_id UUID DEFAULT NULL');
        $this->addSql('ALTER TABLE sil_ecommerce_product_variant ADD strategy_output_id UUID DEFAULT NULL');
        $this->addSql('ALTER TABLE sil_ecommerce_product_variant ADD CONSTRAINT FK_6D11110FA103EEB1 FOREIGN KEY (uom_id) REFERENCES sil_uom (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_product_variant ADD CONSTRAINT FK_6D11110FB9EF6AA3 FOREIGN KEY (strategy_output_id) REFERENCES sil_stock_output_strategy (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_6D11110FA103EEB1 ON sil_ecommerce_product_variant (uom_id)');
        $this->addSql('CREATE INDEX IDX_6D11110FB9EF6AA3 ON sil_ecommerce_product_variant (strategy_output_id)');
    }

    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE sil_stock_partner (id UUID NOT NULL, fulltext_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE sil_stock_item (id UUID NOT NULL, uom_id UUID NOT NULL, strategy_output_id UUID NOT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(64) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_ed462228a103eeb1 ON sil_stock_item (uom_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_ed46222877153098 ON sil_stock_item (code)');
        $this->addSql('CREATE INDEX idx_ed462228b9ef6aa3 ON sil_stock_item (strategy_output_id)');
        $this->addSql('ALTER TABLE sil_stock_item ADD CONSTRAINT fk_ed462228a103eeb1 FOREIGN KEY (uom_id) REFERENCES sil_uom (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_item ADD CONSTRAINT fk_ed462228b9ef6aa3 FOREIGN KEY (strategy_output_id) REFERENCES sil_stock_output_strategy (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE sil_manufacturing_order');
        $this->addSql('ALTER TABLE sil_stock_unit DROP CONSTRAINT fk_2ee60b65217a674b');
        $this->addSql('ALTER TABLE sil_stock_unit ADD CONSTRAINT fk_2ee60b65217a674b FOREIGN KEY (stockitem_id) REFERENCES sil_stock_item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_manufacturing_bom DROP CONSTRAINT fk_6a250c85217a674b');
        $this->addSql('ALTER TABLE sil_manufacturing_bom ADD CONSTRAINT fk_6a250c85217a674b FOREIGN KEY (stockitem_id) REFERENCES sil_stock_item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_product_variant DROP CONSTRAINT FK_6D11110FA103EEB1');
        $this->addSql('ALTER TABLE sil_ecommerce_product_variant DROP CONSTRAINT FK_6D11110FB9EF6AA3');
        $this->addSql('DROP INDEX IDX_6D11110FA103EEB1');
        $this->addSql('DROP INDEX IDX_6D11110FB9EF6AA3');
        $this->addSql('ALTER TABLE sil_ecommerce_product_variant DROP uom_id');
        $this->addSql('ALTER TABLE sil_ecommerce_product_variant DROP strategy_output_id');
        $this->addSql('ALTER TABLE sil_stock_operation DROP CONSTRAINT fk_e8d9ed2e9393f8fe');
        $this->addSql('ALTER TABLE sil_stock_operation ADD CONSTRAINT fk_e8d9ed2e9393f8fe FOREIGN KEY (partner_id) REFERENCES sil_stock_partner (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_manufacturing_bom_line DROP CONSTRAINT FK_1E7543915BEF2755');
        $this->addSql('ALTER TABLE sil_manufacturing_bom_line DROP CONSTRAINT FK_1E754391F39EBE7A');
        $this->addSql('ALTER TABLE sil_manufacturing_bom_line DROP CONSTRAINT fk_1e754391217a674b');
        $this->addSql('DROP INDEX IDX_1E7543915BEF2755');
        $this->addSql('DROP INDEX IDX_1E754391F39EBE7A');
        $this->addSql('ALTER TABLE sil_manufacturing_bom_line DROP src_location_id');
        $this->addSql('ALTER TABLE sil_manufacturing_bom_line DROP batch_id');
        $this->addSql('ALTER TABLE sil_manufacturing_bom_line ADD CONSTRAINT fk_1e754391217a674b FOREIGN KEY (stockitem_id) REFERENCES sil_stock_item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_movement DROP CONSTRAINT fk_78749426217a674b');
        $this->addSql('ALTER TABLE sil_stock_movement ALTER operation_id SET NOT NULL');
        $this->addSql('ALTER TABLE sil_stock_movement ADD CONSTRAINT fk_78749426217a674b FOREIGN KEY (stockitem_id) REFERENCES sil_stock_item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function setContainer(?ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
