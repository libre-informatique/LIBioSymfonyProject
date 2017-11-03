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
class Version20170928101450 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        if (!$schema->hasTable('sylius_order_item')) {
            // Skipping this migration if table sylius_order_item doesn't exist
            return;
        }

        $this->addSql('ALTER TABLE sylius_order_item_unit DROP CONSTRAINT IF EXISTS FK_82BF226EE415FB15');
        $this->addSql('CREATE TABLE librinfo_ecommerce_orderitem (id UUID NOT NULL, order_id UUID NOT NULL, variant_id UUID NOT NULL, quantity INT NOT NULL, unit_price INT NOT NULL, units_total INT NOT NULL, adjustments_total INT NOT NULL, total INT NOT NULL, is_immutable BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_58CB71818D9F6D38 ON librinfo_ecommerce_orderitem (order_id)');
        $this->addSql('CREATE INDEX IDX_58CB71813B69A9AF ON librinfo_ecommerce_orderitem (variant_id)');
        $this->addSql('INSERT INTO librinfo_ecommerce_orderitem SELECT * FROM sylius_order_item');
        $this->addSql('ALTER TABLE librinfo_ecommerce_orderitem ADD bulk BOOLEAN DEFAULT \'false\' NOT NULL');
        $this->addSql('ALTER TABLE librinfo_ecommerce_orderitem ADD CONSTRAINT FK_58CB71818D9F6D38 FOREIGN KEY (order_id) REFERENCES librinfo_ecommerce_order (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_orderitem ADD CONSTRAINT FK_58CB71813B69A9AF FOREIGN KEY (variant_id) REFERENCES librinfo_ecommerce_productvariant (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE sylius_order_item');
        $this->addSql('ALTER TABLE sylius_adjustment ADD CONSTRAINT FK_ACA6E0F2E415FB15 FOREIGN KEY (order_item_id) REFERENCES librinfo_ecommerce_orderitem (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_order_item_unit DROP CONSTRAINT IF EXISTS FK_82BF226EE415FB15');
        $this->addSql('ALTER TABLE sylius_order_item_unit ADD CONSTRAINT FK_82BF226EE415FB15 FOREIGN KEY (order_item_id) REFERENCES librinfo_ecommerce_orderitem (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE sylius_adjustment DROP CONSTRAINT IF EXISTS FK_ACA6E0F2E415FB15');
        $this->addSql('ALTER TABLE sylius_order_item_unit DROP CONSTRAINT IF EXISTS FK_82BF226EE415FB15');
        $this->addSql('CREATE TABLE sylius_order_item (id UUID NOT NULL, order_id UUID NOT NULL, variant_id UUID NOT NULL, quantity INT NOT NULL, unit_price INT NOT NULL, units_total INT NOT NULL, adjustments_total INT NOT NULL, total INT NOT NULL, is_immutable BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_77b587ed3b69a9af ON sylius_order_item (variant_id)');
        $this->addSql('CREATE INDEX idx_77b587ed8d9f6d38 ON sylius_order_item (order_id)');
        $this->addSql('ALTER TABLE librinfo_ecommerce_orderitem DROP bulk ');
        $this->addSql('INSERT INTO sylius_order_item SELECT * FROM librinfo_ecommerce_orderitem');
        $this->addSql('ALTER TABLE sylius_order_item ADD CONSTRAINT FK_77B587ED8D9F6D38 FOREIGN KEY (order_id) REFERENCES librinfo_ecommerce_order (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_order_item ADD CONSTRAINT FK_77B587ED3B69A9AF FOREIGN KEY (variant_id) REFERENCES librinfo_ecommerce_productvariant (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE librinfo_ecommerce_orderitem');
        $this->addSql('ALTER TABLE sylius_order_item_unit DROP CONSTRAINT IF EXISTS FK_82BF226EE415FB15');
        $this->addSql('ALTER TABLE sylius_order_item_unit ADD CONSTRAINT fk_82bf226ee415fb15 FOREIGN KEY (order_item_id) REFERENCES sylius_order_item (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
