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
class Version20170828093613 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        if (!$schema->hasTable('sylius_product_variant')) {
            // Skipping this migration because table sylius_product_variant doesn't exist
            return;
        }

        $this->addSql('ALTER TABLE sylius_product_variant DROP CONSTRAINT fk_a29b5234584665a');
        $this->addSql('ALTER TABLE sylius_product_channels DROP CONSTRAINT fk_f9ef269b4584665a');
        $this->addSql('ALTER TABLE sylius_product_options DROP CONSTRAINT fk_2b5ff0094584665a');
        $this->addSql('ALTER TABLE sylius_product_variant_option_value DROP CONSTRAINT fk_76cdafa13b69a9af');
        $this->addSql('ALTER TABLE sylius_tax_rate DROP CONSTRAINT fk_3cd86b2e9f2c3fab');
        $this->addSql('ALTER TABLE sylius_product_image_product_variants DROP CONSTRAINT fk_8ffdae8d3da5256d');
        $this->addSql('ALTER TABLE sylius_product DROP CONSTRAINT fk_677b9b74731e505');
        $this->addSql('ALTER TABLE sylius_taxon DROP CONSTRAINT fk_cfd811caa977936c');
        $this->addSql('ALTER TABLE sylius_taxon DROP CONSTRAINT fk_cfd811ca727aca70');
        $this->addSql('ALTER TABLE sylius_promotion_order DROP CONSTRAINT fk_bf9cf6fb8d9f6d38');
        $this->addSql('DROP TABLE sylius_product');
        $this->addSql('DROP TABLE sylius_product_variant');
        $this->addSql('DROP TABLE sylius_admin_user');
        $this->addSql('DROP TABLE sylius_product_variant_option_value');
        $this->addSql('DROP TABLE sylius_product_channels');
        $this->addSql('DROP TABLE sylius_product_options');
        $this->addSql('DROP TABLE sylius_address');
        $this->addSql('DROP TABLE sylius_zone');
        $this->addSql('DROP TABLE sylius_customer_group');
        $this->addSql('DROP TABLE sylius_product_image');
        $this->addSql('DROP TABLE sylius_product_image_product_variants');
        $this->addSql('DROP TABLE sylius_promotion_order');
        $this->addSql('DROP TABLE sylius_taxon');
        $this->addSql('DROP TABLE sylius_channel_currencies');
        $this->addSql('DROP TABLE sylius_channel_locales');
        $this->addSql('DROP TABLE sylius_order');
        $this->addSql('DROP TABLE sylius_tax_rate');
        $this->addSql('ALTER TABLE channel_description ADD title VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE sylius_product (id UUID NOT NULL, main_taxon_id UUID DEFAULT NULL, code VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, enabled BOOLEAN NOT NULL, variant_selection_method VARCHAR(255) NOT NULL, average_rating DOUBLE PRECISION DEFAULT \'0\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_677b9b74731e505 ON sylius_product (main_taxon_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_677b9b7477153098 ON sylius_product (code)');
        $this->addSql('CREATE TABLE sylius_product_variant (id UUID NOT NULL, product_id UUID NOT NULL, tax_category_id UUID DEFAULT NULL, shipping_category_id UUID DEFAULT NULL, code VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, "position" INT NOT NULL, version INT DEFAULT 1 NOT NULL, on_hold INT NOT NULL, on_hand INT NOT NULL, tracked BOOLEAN NOT NULL, width DOUBLE PRECISION DEFAULT NULL, height DOUBLE PRECISION DEFAULT NULL, depth DOUBLE PRECISION DEFAULT NULL, weight DOUBLE PRECISION DEFAULT NULL, shipping_required BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_a29b5239df894ed ON sylius_product_variant (tax_category_id)');
        $this->addSql('CREATE INDEX idx_a29b5234584665a ON sylius_product_variant (product_id)');
        $this->addSql('CREATE INDEX idx_a29b5239e2d1a41 ON sylius_product_variant (shipping_category_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_a29b52377153098 ON sylius_product_variant (code)');
        $this->addSql('CREATE TABLE sylius_admin_user (id UUID NOT NULL, username VARCHAR(255) DEFAULT NULL, username_canonical VARCHAR(255) DEFAULT NULL, enabled BOOLEAN NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, password_reset_token VARCHAR(255) DEFAULT NULL, password_requested_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, email_verification_token VARCHAR(255) DEFAULT NULL, verified_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, locked BOOLEAN NOT NULL, expires_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, credentials_expire_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, roles TEXT NOT NULL, email VARCHAR(255) DEFAULT NULL, email_canonical VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, locale_code VARCHAR(12) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN sylius_admin_user.roles IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE sylius_product_variant_option_value (variant_id UUID NOT NULL, option_value_id UUID NOT NULL, PRIMARY KEY(variant_id, option_value_id))');
        $this->addSql('CREATE INDEX idx_76cdafa1d957ca06 ON sylius_product_variant_option_value (option_value_id)');
        $this->addSql('CREATE INDEX idx_76cdafa13b69a9af ON sylius_product_variant_option_value (variant_id)');
        $this->addSql('CREATE TABLE sylius_product_channels (product_id UUID NOT NULL, channel_id UUID NOT NULL, PRIMARY KEY(product_id, channel_id))');
        $this->addSql('CREATE INDEX idx_f9ef269b4584665a ON sylius_product_channels (product_id)');
        $this->addSql('CREATE INDEX idx_f9ef269b72f5a1aa ON sylius_product_channels (channel_id)');
        $this->addSql('CREATE TABLE sylius_product_options (product_id UUID NOT NULL, option_id UUID NOT NULL, PRIMARY KEY(product_id, option_id))');
        $this->addSql('CREATE INDEX idx_2b5ff0094584665a ON sylius_product_options (product_id)');
        $this->addSql('CREATE INDEX idx_2b5ff009a7c41d6f ON sylius_product_options (option_id)');
        $this->addSql('CREATE TABLE sylius_address (id UUID NOT NULL, customer_id UUID DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, phone_number VARCHAR(255) DEFAULT NULL, street VARCHAR(255) NOT NULL, company VARCHAR(255) DEFAULT NULL, city VARCHAR(255) NOT NULL, postcode VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, country_code VARCHAR(255) NOT NULL, province_code VARCHAR(255) DEFAULT NULL, province_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_b97ff0589395c3f3 ON sylius_address (customer_id)');
        $this->addSql('CREATE TABLE sylius_zone (id UUID NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(8) NOT NULL, scope VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX uniq_7be2258e77153098 ON sylius_zone (code)');
        $this->addSql('CREATE TABLE sylius_customer_group (id UUID NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX uniq_7fcf9b0577153098 ON sylius_customer_group (code)');
        $this->addSql('CREATE TABLE sylius_product_image (id UUID NOT NULL, owner_id UUID NOT NULL, type VARCHAR(255) DEFAULT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_88c64b2d7e3c61f9 ON sylius_product_image (owner_id)');
        $this->addSql('CREATE TABLE sylius_product_image_product_variants (image_id UUID NOT NULL, variant_id UUID NOT NULL, PRIMARY KEY(image_id, variant_id))');
        $this->addSql('CREATE INDEX idx_8ffdae8d3da5256d ON sylius_product_image_product_variants (image_id)');
        $this->addSql('CREATE INDEX idx_8ffdae8d3b69a9af ON sylius_product_image_product_variants (variant_id)');
        $this->addSql('CREATE TABLE sylius_promotion_order (order_id UUID NOT NULL, promotion_id UUID NOT NULL, PRIMARY KEY(order_id, promotion_id))');
        $this->addSql('CREATE INDEX idx_bf9cf6fb8d9f6d38 ON sylius_promotion_order (order_id)');
        $this->addSql('CREATE INDEX idx_bf9cf6fb139df194 ON sylius_promotion_order (promotion_id)');
        $this->addSql('CREATE TABLE sylius_taxon (id UUID NOT NULL, tree_root UUID DEFAULT NULL, parent_id UUID DEFAULT NULL, code VARCHAR(255) NOT NULL, tree_left INT NOT NULL, tree_right INT NOT NULL, tree_level INT NOT NULL, "position" INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_cfd811caa977936c ON sylius_taxon (tree_root)');
        $this->addSql('CREATE UNIQUE INDEX uniq_cfd811ca77153098 ON sylius_taxon (code)');
        $this->addSql('CREATE INDEX idx_cfd811ca727aca70 ON sylius_taxon (parent_id)');
        $this->addSql('CREATE TABLE sylius_channel_currencies (channel_id UUID NOT NULL, currency_id UUID NOT NULL, PRIMARY KEY(channel_id, currency_id))');
        $this->addSql('CREATE INDEX idx_ae491f9372f5a1aa ON sylius_channel_currencies (channel_id)');
        $this->addSql('CREATE INDEX idx_ae491f9338248176 ON sylius_channel_currencies (currency_id)');
        $this->addSql('CREATE TABLE sylius_channel_locales (channel_id UUID NOT NULL, locale_id UUID NOT NULL, PRIMARY KEY(channel_id, locale_id))');
        $this->addSql('CREATE INDEX idx_786b7a8472f5a1aa ON sylius_channel_locales (channel_id)');
        $this->addSql('CREATE INDEX idx_786b7a84e559dfd1 ON sylius_channel_locales (locale_id)');
        $this->addSql('CREATE TABLE sylius_order (id UUID NOT NULL, shipping_address_id UUID DEFAULT NULL, billing_address_id UUID DEFAULT NULL, channel_id UUID DEFAULT NULL, promotion_coupon_id UUID DEFAULT NULL, customer_id UUID DEFAULT NULL, number VARCHAR(255) DEFAULT NULL, notes VARCHAR(1000) DEFAULT NULL, state VARCHAR(255) NOT NULL, checkout_completed_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, items_total INT NOT NULL, adjustments_total INT NOT NULL, total INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, currency_code VARCHAR(3) NOT NULL, locale_code VARCHAR(255) NOT NULL, checkout_state VARCHAR(255) NOT NULL, payment_state VARCHAR(255) NOT NULL, shipping_state VARCHAR(255) NOT NULL, token_value VARCHAR(255) DEFAULT NULL, customer_ip VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX uniq_6196a1f979d0c0e4 ON sylius_order (billing_address_id)');
        $this->addSql('CREATE INDEX idx_6196a1f917b24436 ON sylius_order (promotion_coupon_id)');
        $this->addSql('CREATE INDEX idx_6196a1f99395c3f3 ON sylius_order (customer_id)');
        $this->addSql('CREATE INDEX idx_6196a1f972f5a1aa ON sylius_order (channel_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_6196a1f94d4cff2b ON sylius_order (shipping_address_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_6196a1f996901f54 ON sylius_order (number)');
        $this->addSql('CREATE TABLE sylius_tax_rate (id UUID NOT NULL, zone_id UUID NOT NULL, category_id UUID NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, amount NUMERIC(10, 5) NOT NULL, included_in_price BOOLEAN NOT NULL, calculator VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_3cd86b2e9f2c3fab ON sylius_tax_rate (zone_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_3cd86b2e77153098 ON sylius_tax_rate (code)');
        $this->addSql('CREATE INDEX idx_3cd86b2e12469de2 ON sylius_tax_rate (category_id)');
        $this->addSql('ALTER TABLE sylius_product ADD CONSTRAINT fk_677b9b74731e505 FOREIGN KEY (main_taxon_id) REFERENCES sylius_taxon (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_variant ADD CONSTRAINT fk_a29b5234584665a FOREIGN KEY (product_id) REFERENCES sylius_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_variant ADD CONSTRAINT fk_a29b5239df894ed FOREIGN KEY (tax_category_id) REFERENCES sylius_tax_category (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_variant ADD CONSTRAINT fk_a29b5239e2d1a41 FOREIGN KEY (shipping_category_id) REFERENCES sylius_shipping_category (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_variant_option_value ADD CONSTRAINT fk_76cdafa13b69a9af FOREIGN KEY (variant_id) REFERENCES sylius_product_variant (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_variant_option_value ADD CONSTRAINT fk_76cdafa1d957ca06 FOREIGN KEY (option_value_id) REFERENCES librinfo_ecommerce_productoptionvalue (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_channels ADD CONSTRAINT fk_f9ef269b4584665a FOREIGN KEY (product_id) REFERENCES sylius_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_channels ADD CONSTRAINT fk_f9ef269b72f5a1aa FOREIGN KEY (channel_id) REFERENCES sylius_channel (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_options ADD CONSTRAINT fk_2b5ff0094584665a FOREIGN KEY (product_id) REFERENCES sylius_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_options ADD CONSTRAINT fk_2b5ff009a7c41d6f FOREIGN KEY (option_id) REFERENCES librinfo_ecommerce_productoption (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_address ADD CONSTRAINT fk_b97ff0589395c3f3 FOREIGN KEY (customer_id) REFERENCES librinfo_crm_organism (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_image_product_variants ADD CONSTRAINT fk_8ffdae8d3da5256d FOREIGN KEY (image_id) REFERENCES sylius_product_image (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_promotion_order ADD CONSTRAINT fk_bf9cf6fb8d9f6d38 FOREIGN KEY (order_id) REFERENCES sylius_order (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_taxon ADD CONSTRAINT fk_cfd811caa977936c FOREIGN KEY (tree_root) REFERENCES sylius_taxon (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_taxon ADD CONSTRAINT fk_cfd811ca727aca70 FOREIGN KEY (parent_id) REFERENCES sylius_taxon (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_tax_rate ADD CONSTRAINT fk_3cd86b2e9f2c3fab FOREIGN KEY (zone_id) REFERENCES sylius_zone (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE channel_description DROP title');
    }
}
