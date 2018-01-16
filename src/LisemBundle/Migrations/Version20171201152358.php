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
class Version20171201152358 extends AbstractMigration implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE lexik_trans_unit_translations DROP CONSTRAINT fk_b0aa3944c3c583c9');
        $this->addSql('ALTER TABLE librinfo_crm_province DROP CONSTRAINT fk_d175613af92f3e70');
        $this->addSql('ALTER TABLE lexik_trans_unit_translations DROP CONSTRAINT fk_b0aa394493cb796c');
        $this->addSql('ALTER TABLE librinfo_crm_organism DROP CONSTRAINT fk_96fc3f1dbd94fb16');
        $this->addSql('ALTER TABLE librinfo_ecommerce_order DROP CONSTRAINT fk_eb1e2b894d4cff2b');
        $this->addSql('ALTER TABLE librinfo_ecommerce_order DROP CONSTRAINT fk_eb1e2b8979d0c0e4');
        $this->addSql('ALTER TABLE librinfo_crm_addresssearchindex DROP CONSTRAINT fk_86fac1a7232d562b');
        $this->addSql('ALTER TABLE librinfo_crm_organism__circle DROP CONSTRAINT fk_dc4f991464180a36');
        $this->addSql('ALTER TABLE librinfo_crm_position__circle DROP CONSTRAINT fk_cbc315d770ee2ff6');
        $this->addSql('ALTER TABLE librinfo_email_email__circle DROP CONSTRAINT fk_9003c9cb70ee2ff6');
        $this->addSql('ALTER TABLE librinfo_crm_circle__sonatauser DROP CONSTRAINT fk_968f0de170ee2ff6');
        $this->addSql('ALTER TABLE librinfo_crm_address DROP CONSTRAINT fk_c639ee4164180a36');
        $this->addSql('ALTER TABLE librinfo_crm_organism__circle DROP CONSTRAINT fk_dc4f991470ee2ff6');
        $this->addSql('ALTER TABLE librinfo_crm_organismphone DROP CONSTRAINT fk_efb28b3164180a36');
        $this->addSql('ALTER TABLE librinfo_crm_organismsearchindex DROP CONSTRAINT fk_e3fbdff2232d562b');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productreview DROP CONSTRAINT fk_37033882f675f31b');
        $this->addSql('ALTER TABLE librinfo_email_email__organism DROP CONSTRAINT fk_4c0ed6164180a36');
        $this->addSql('ALTER TABLE librinfo_seedbatch_seedbatch DROP CONSTRAINT fk_c3ee4fe489b658fe');
        $this->addSql('ALTER TABLE sylius_shop_user DROP CONSTRAINT fk_7c2b74809395c3f3');
        $this->addSql('ALTER TABLE librinfo_ecommerce_order DROP CONSTRAINT fk_eb1e2b899395c3f3');
        $this->addSql('ALTER TABLE librinfo_seedbatch_plot DROP CONSTRAINT fk_f108982089b658fe');
        $this->addSql('ALTER TABLE librinfo_crm_organismgroup DROP CONSTRAINT fk_c63d582964180a36');
        $this->addSql('ALTER TABLE librinfo_crm_position DROP CONSTRAINT fk_dd8351c432c8a3de');
        $this->addSql('ALTER TABLE librinfo_crm_position DROP CONSTRAINT fk_dd8351c4ae271c0d');
        $this->addSql('ALTER TABLE librinfo_crm_organism DROP CONSTRAINT fk_96fc3f1d12469de2');
        $this->addSql('ALTER TABLE librinfo_crm_category DROP CONSTRAINT fk_9de3acf0b381ca9b');
        $this->addSql('ALTER TABLE librinfo_crm_category DROP CONSTRAINT fk_9de3acf0b5ceae2f');
        $this->addSql('ALTER TABLE librinfo_crm_organism DROP CONSTRAINT fk_96fc3f1d3d371385');
        $this->addSql('ALTER TABLE librinfo_crm_organismgroup__role DROP CONSTRAINT fk_3fd70c97d8099476');
        $this->addSql('ALTER TABLE librinfo_crm_position DROP CONSTRAINT fk_dd8351c456bd9d60');
        $this->addSql('ALTER TABLE librinfo_ecommerce_salesjournalitem DROP CONSTRAINT fk_6aa2a2032989f1fd');
        $this->addSql('ALTER TABLE librinfo_crm_organism DROP CONSTRAINT fk_96fc3f1dfe54d947');
        $this->addSql('ALTER TABLE sylius_adjustment DROP CONSTRAINT fk_aca6e0f2e415fb15');
        $this->addSql('ALTER TABLE sylius_order_item_unit DROP CONSTRAINT fk_82bf226ee415fb15');
        $this->addSql('ALTER TABLE librinfo_ecommerce_product__channel DROP CONSTRAINT fk_cc395b694584665a');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productimage DROP CONSTRAINT fk_810714bd7e3c61f9');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productreview DROP CONSTRAINT fk_370338824584665a');
        $this->addSql('ALTER TABLE librinfo_media_file DROP CONSTRAINT fk_715414b27e3c61f9');
        $this->addSql('ALTER TABLE sylius_product_association DROP CONSTRAINT fk_48e9cdab4584665a');
        $this->addSql('ALTER TABLE sylius_product_attribute_value DROP CONSTRAINT fk_8a053e544584665a');
        $this->addSql('ALTER TABLE sylius_product_association_product DROP CONSTRAINT fk_a427b9834584665a');
        $this->addSql('ALTER TABLE sylius_product_taxon DROP CONSTRAINT fk_169c6cd94584665a');
        $this->addSql('ALTER TABLE sylius_product_translation DROP CONSTRAINT fk_105a9082c2ac5d3');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productvariant DROP CONSTRAINT fk_80bc7a9d4584665a');
        $this->addSql('ALTER TABLE librinfo_ecommerce_product__productoption DROP CONSTRAINT fk_39550b334584665a');
        $this->addSql('ALTER TABLE sylius_product_attribute_translation DROP CONSTRAINT fk_93850eba2c2ac5d3');
        $this->addSql('ALTER TABLE sylius_product_attribute_value DROP CONSTRAINT fk_8a053e54b6e62efa');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productimage__productvariant DROP CONSTRAINT fk_b92ee5d93da5256d');
        $this->addSql('ALTER TABLE sylius_product_option_translation DROP CONSTRAINT fk_cba491ad2c2ac5d3');
        $this->addSql('ALTER TABLE librinfo_ecommerce_product__productoption DROP CONSTRAINT fk_39550b33a7c41d6f');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productoptionvalue DROP CONSTRAINT fk_7b35921ea7c41d6f');
        $this->addSql('ALTER TABLE librinfo_email_email DROP CONSTRAINT fk_5de3f0ac5da0fb8');
        $this->addSql('ALTER TABLE librinfo_email_emailtemplatesearchindex DROP CONSTRAINT fk_a7733671232d562b');
        $this->addSql('ALTER TABLE librinfo_ecommerce_taxrate DROP CONSTRAINT fk_e78aba0b9f2c3fab');
        $this->addSql('ALTER TABLE sylius_shipping_method DROP CONSTRAINT fk_5fb0ee119f2c3fab');
        $this->addSql('ALTER TABLE sylius_zone_member DROP CONSTRAINT fk_e8b5abf34b0e929b');
        $this->addSql('ALTER TABLE sylius_channel DROP CONSTRAINT fk_16c8119ea978c17');
        $this->addSql('ALTER TABLE librinfo_email_email__position DROP CONSTRAINT fk_4fbf83b8a832c1c9');
        $this->addSql('ALTER TABLE librinfo_email_emaillink DROP CONSTRAINT fk_e45cc1faa832c1c9');
        $this->addSql('ALTER TABLE librinfo_email_emailsearchindex DROP CONSTRAINT fk_a0fffd5c232d562b');
        $this->addSql('ALTER TABLE librinfo_email_email__file DROP CONSTRAINT fk_ddc6786aa832c1c9');
        $this->addSql('ALTER TABLE librinfo_email_emailreceipt DROP CONSTRAINT fk_90137c36a832c1c9');
        $this->addSql('ALTER TABLE librinfo_email_email__circle DROP CONSTRAINT fk_9003c9cba832c1c9');
        $this->addSql('ALTER TABLE librinfo_email_email__organism DROP CONSTRAINT fk_4c0ed61a832c1c9');
        $this->addSql('ALTER TABLE librinfo_seedbatch_certification DROP CONSTRAINT fk_bdd68c745a38d544');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productvariant__seedbatch DROP CONSTRAINT fk_e3ba8092a97fd19e');
        $this->addSql('ALTER TABLE librinfo_seedbatch_seedbatchsearchindex DROP CONSTRAINT fk_78cc94d6232d562b');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productimage DROP CONSTRAINT fk_810714bd94f4b9f8');
        $this->addSql('ALTER TABLE librinfo_email_email__file DROP CONSTRAINT fk_ddc6786a93cb796c');
        $this->addSql('ALTER TABLE librinfo_seedbatch_certificationtype DROP CONSTRAINT fk_e21e2faef98f144a');
        $this->addSql('ALTER TABLE librinfo_varieties_variety__file DROP CONSTRAINT fk_4ec9b3a893cb796c');
        $this->addSql('ALTER TABLE librinfo_seedbatch_certification DROP CONSTRAINT fk_bdd68c7490af82a5');
        $this->addSql('ALTER TABLE librinfo_sonatasyliususer_sonatauser__sonatagroup DROP CONSTRAINT fk_fdce9333fe54d947');
        $this->addSql('ALTER TABLE librinfo_varieties_plantcategory DROP CONSTRAINT fk_c6344514b381ca9b');
        $this->addSql('ALTER TABLE librinfo_varieties_plantcategory DROP CONSTRAINT fk_c6344514b5ceae2f');
        $this->addSql('ALTER TABLE librinfo_varieties_species__plantcategory DROP CONSTRAINT fk_675259a4b2a1d860');
        $this->addSql('ALTER TABLE librinfo_varieties_variety__plantcategory DROP CONSTRAINT fk_fccfb8cc78c2bc47');
        $this->addSql('ALTER TABLE librinfo_varieties_species__plantcategory DROP CONSTRAINT fk_675259a4c2d8da42');
        $this->addSql('ALTER TABLE librinfo_varieties_species DROP CONSTRAINT fk_c36a0e84f5e25c30');
        $this->addSql('ALTER TABLE librinfo_varieties_variety DROP CONSTRAINT fk_5eb36881b2a1d860');
        if ($schema->hasTable('sil_stock_operation') && $schema->getTable('sil_stock_operation')->hasForeignKey('fk_e8d9ed2e668d0c5e')) {
            $this->addSql('ALTER TABLE sil_stock_operation DROP CONSTRAINT fk_e8d9ed2e668d0c5e');
        }
        if ($schema->hasTable('sil_stock_operation') && $schema->getTable('sil_stock_operation')->hasForeignKey('fk_e8d9ed2e9393f8fe')) {
            $this->addSql('ALTER TABLE sil_stock_operation DROP CONSTRAINT fk_e8d9ed2e9393f8fe');
        }
        $this->addSql('ALTER TABLE sil_stock_movement DROP CONSTRAINT fk_78749426217a674b');
        $this->addSql('ALTER TABLE sil_manufacturing_bom DROP CONSTRAINT fk_6a250c85217a674b');
        $this->addSql('ALTER TABLE sil_stock_stock_unit DROP CONSTRAINT fk_2a851cf6217a674b');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productvariant DROP CONSTRAINT fk_80bc7a9deec75ed7');
        $this->addSql('ALTER TABLE sil_manufacturing_bom_line DROP CONSTRAINT fk_1e754391217a674b');
        $this->addSql('ALTER TABLE librinfo_ecommerce_shippingmethod__channel DROP CONSTRAINT fk_985cd66a5f7d6850');
        $this->addSql('ALTER TABLE sylius_shipping_method_translation DROP CONSTRAINT fk_2b37db3d2c2ac5d3');
        $this->addSql('ALTER TABLE sylius_shipment DROP CONSTRAINT fk_fd707b3319883967');
        $this->addSql('ALTER TABLE librinfo_ecommerce_orderitem DROP CONSTRAINT fk_58cb71813b69a9af');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productimage__productvariant DROP CONSTRAINT fk_b92ee5d93b69a9af');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productvariant__productoptionvalue DROP CONSTRAINT fk_c78ca40c3b69a9af');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productvariant__seedbatch DROP CONSTRAINT fk_e3ba80921855be3f');
        $this->addSql('ALTER TABLE sylius_channel_pricing DROP CONSTRAINT fk_7801820ca80ef684');
        $this->addSql('ALTER TABLE sylius_product_variant_translation DROP CONSTRAINT fk_8dc18edc2c2ac5d3');
        $this->addSql('ALTER TABLE channel_description DROP CONSTRAINT fk_743ebf0772f5a1aa');
        $this->addSql('ALTER TABLE librinfo_ecommerce_channel__currency DROP CONSTRAINT fk_7433589772f5a1aa');
        $this->addSql('ALTER TABLE librinfo_ecommerce_channel__locale DROP CONSTRAINT fk_8cc92bbe72f5a1aa');
        $this->addSql('ALTER TABLE librinfo_ecommerce_product__channel DROP CONSTRAINT fk_cc395b6972f5a1aa');
        $this->addSql('ALTER TABLE librinfo_ecommerce_shippingmethod__channel DROP CONSTRAINT fk_985cd66a72f5a1aa');
        $this->addSql('ALTER TABLE sylius_payment_method_channels DROP CONSTRAINT fk_543ac0cc72f5a1aa');
        $this->addSql('ALTER TABLE sylius_promotion_channels DROP CONSTRAINT fk_1a044f6472f5a1aa');
        $this->addSql('ALTER TABLE librinfo_ecommerce_order DROP CONSTRAINT fk_eb1e2b8972f5a1aa');
        $this->addSql('ALTER TABLE librinfo_seedbatch_seedbatch DROP CONSTRAINT fk_c3ee4fe44b557494');
        $this->addSql('ALTER TABLE librinfo_ecommerce_invoice DROP CONSTRAINT fk_60611dd8d9f6d38');
        $this->addSql('ALTER TABLE librinfo_ecommerce_orderitem DROP CONSTRAINT fk_58cb71818d9f6d38');
        $this->addSql('ALTER TABLE librinfo_ecommerce_order__promotion DROP CONSTRAINT fk_ee637f5d8d9f6d38');
        $this->addSql('ALTER TABLE librinfo_ecommerce_salesjournalitem DROP CONSTRAINT fk_6aa2a2038d9f6d38');
        $this->addSql('ALTER TABLE sylius_adjustment DROP CONSTRAINT fk_aca6e0f28d9f6d38');
        $this->addSql('ALTER TABLE librinfo_ecommerce_payment DROP CONSTRAINT fk_fb4b82948d9f6d38');
        $this->addSql('ALTER TABLE sylius_shipment DROP CONSTRAINT fk_fd707b338d9f6d38');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productvariant__productoptionvalue DROP CONSTRAINT fk_c78ca40cd957ca06');
        $this->addSql('ALTER TABLE librinfo_varieties_variety__productoptionvalue DROP CONSTRAINT fk_d44a64a6e0211176');
        $this->addSql('ALTER TABLE sylius_product_option_value_translation DROP CONSTRAINT fk_8d4382dc2c2ac5d3');
        $this->addSql('ALTER TABLE librinfo_crm_address DROP CONSTRAINT fk_c639ee41896dbbde');
        $this->addSql('ALTER TABLE librinfo_crm_address DROP CONSTRAINT fk_c639ee41b03a8386');
        $this->addSql('ALTER TABLE librinfo_crm_circle DROP CONSTRAINT fk_c28529c9896dbbde');
        $this->addSql('ALTER TABLE librinfo_crm_circle DROP CONSTRAINT fk_c28529c9b03a8386');
        $this->addSql('ALTER TABLE librinfo_crm_organism DROP CONSTRAINT fk_96fc3f1d896dbbde');
        $this->addSql('ALTER TABLE librinfo_crm_organism DROP CONSTRAINT fk_96fc3f1db03a8386');
        $this->addSql('ALTER TABLE blast_custom_filters DROP CONSTRAINT fk_213ed3b7a76ed395');
        $this->addSql('ALTER TABLE librinfo_email_emailtemplate DROP CONSTRAINT fk_5eafb5cf896dbbde');
        $this->addSql('ALTER TABLE librinfo_email_emailtemplate DROP CONSTRAINT fk_5eafb5cfb03a8386');
        $this->addSql('ALTER TABLE librinfo_email_email DROP CONSTRAINT fk_5de3f0ac896dbbde');
        $this->addSql('ALTER TABLE librinfo_email_email DROP CONSTRAINT fk_5de3f0acb03a8386');
        $this->addSql('ALTER TABLE librinfo_seedbatch_certifyingbody DROP CONSTRAINT fk_8f3d1bd5896dbbde');
        $this->addSql('ALTER TABLE librinfo_seedbatch_certifyingbody DROP CONSTRAINT fk_8f3d1bd5b03a8386');
        $this->addSql('ALTER TABLE librinfo_seedbatch_seedbatch DROP CONSTRAINT fk_c3ee4fe4896dbbde');
        $this->addSql('ALTER TABLE librinfo_seedbatch_seedbatch DROP CONSTRAINT fk_c3ee4fe4b03a8386');
        $this->addSql('ALTER TABLE librinfo_seedbatch_certificationtype DROP CONSTRAINT fk_e21e2fae896dbbde');
        $this->addSql('ALTER TABLE librinfo_seedbatch_certificationtype DROP CONSTRAINT fk_e21e2faeb03a8386');
        $this->addSql('ALTER TABLE librinfo_sonatasyliususer_sonatauser__sonatagroup DROP CONSTRAINT fk_fdce9333a76ed395');
        $this->addSql('ALTER TABLE librinfo_varieties_species DROP CONSTRAINT fk_c36a0e84896dbbde');
        $this->addSql('ALTER TABLE librinfo_varieties_species DROP CONSTRAINT fk_c36a0e84b03a8386');
        $this->addSql('ALTER TABLE sylius_admin_api_auth_code DROP CONSTRAINT fk_e366d848a76ed395');
        $this->addSql('ALTER TABLE sylius_admin_api_access_token DROP CONSTRAINT fk_2aa4915da76ed395');
        $this->addSql('ALTER TABLE sylius_admin_api_refresh_token DROP CONSTRAINT fk_9160e3faa76ed395');
        $this->addSql('ALTER TABLE librinfo_seedbatch_seedfarm DROP CONSTRAINT fk_d32b2865896dbbde');
        $this->addSql('ALTER TABLE librinfo_seedbatch_seedfarm DROP CONSTRAINT fk_d32b2865b03a8386');
        $this->addSql('ALTER TABLE librinfo_seedbatch_certification DROP CONSTRAINT fk_bdd68c74896dbbde');
        $this->addSql('ALTER TABLE librinfo_seedbatch_certification DROP CONSTRAINT fk_bdd68c74b03a8386');
        $this->addSql('ALTER TABLE sylius_user_oauth DROP CONSTRAINT fk_c3471b78a76ed395');
        $this->addSql('ALTER TABLE librinfo_seedbatch_plot DROP CONSTRAINT fk_f1089820896dbbde');
        $this->addSql('ALTER TABLE librinfo_seedbatch_plot DROP CONSTRAINT fk_f1089820b03a8386');
        $this->addSql('ALTER TABLE librinfo_crm_circle__sonatauser DROP CONSTRAINT fk_968f0de1e50749d6');
        $this->addSql('ALTER TABLE librinfo_varieties_variety DROP CONSTRAINT fk_5eb36881896dbbde');
        $this->addSql('ALTER TABLE librinfo_varieties_variety DROP CONSTRAINT fk_5eb36881b03a8386');
        $this->addSql('ALTER TABLE librinfo_crm_position DROP CONSTRAINT fk_dd8351c4896dbbde');
        $this->addSql('ALTER TABLE librinfo_crm_position DROP CONSTRAINT fk_dd8351c4b03a8386');
        $this->addSql('ALTER TABLE librinfo_varieties_family DROP CONSTRAINT fk_c6247d81896dbbde');
        $this->addSql('ALTER TABLE librinfo_varieties_family DROP CONSTRAINT fk_c6247d81b03a8386');
        $this->addSql('ALTER TABLE librinfo_varieties_genus DROP CONSTRAINT fk_fcf51373896dbbde');
        $this->addSql('ALTER TABLE librinfo_varieties_genus DROP CONSTRAINT fk_fcf51373b03a8386');
        $this->addSql('ALTER TABLE librinfo_ecommerce_product DROP CONSTRAINT fk_45290234731e505');
        $this->addSql('ALTER TABLE sylius_product_taxon DROP CONSTRAINT fk_169c6cd9de13f470');
        $this->addSql('ALTER TABLE sylius_taxon_image DROP CONSTRAINT fk_dbe52b287e3c61f9');
        $this->addSql('ALTER TABLE sylius_taxon_translation DROP CONSTRAINT fk_1487dfcf2c2ac5d3');
        $this->addSql('ALTER TABLE librinfo_ecommerce_taxon DROP CONSTRAINT fk_45509bba727aca70');
        $this->addSql('ALTER TABLE librinfo_ecommerce_taxon DROP CONSTRAINT fk_45509bbaa977936c');
        $this->addSql('ALTER TABLE librinfo_seedbatch_seedbatch DROP CONSTRAINT fk_c3ee4fe4680d0b01');
        $this->addSql('ALTER TABLE librinfo_seedbatch_plotsearchindex DROP CONSTRAINT fk_5ab5f375232d562b');
        $this->addSql('ALTER TABLE librinfo_seedbatch_certification DROP CONSTRAINT fk_bdd68c74680d0b01');
        $this->addSql('ALTER TABLE librinfo_crm_organismgroup__role DROP CONSTRAINT fk_3fd70c97d60322ac');
        $this->addSql('ALTER TABLE librinfo_ecommerce_salesjournalitem DROP CONSTRAINT fk_6aa2a2034c3a3bb');
        $this->addSql('ALTER TABLE channel_description DROP CONSTRAINT fk_743ebf0778c2bc47');
        $this->addSql('ALTER TABLE librinfo_ecommerce_product DROP CONSTRAINT fk_4529023478c2bc47');
        $this->addSql('ALTER TABLE librinfo_seedbatch_seedbatch DROP CONSTRAINT fk_c3ee4fe478c2bc47');
        $this->addSql('ALTER TABLE librinfo_varieties_variety__productoptionvalue DROP CONSTRAINT fk_d44a64a678c2bc47');
        $this->addSql('ALTER TABLE librinfo_varieties_varietydescription DROP CONSTRAINT fk_28fef35178c2bc47');
        $this->addSql('ALTER TABLE librinfo_varieties_variety__file DROP CONSTRAINT fk_4ec9b3a878c2bc47');
        $this->addSql('ALTER TABLE librinfo_varieties_variety DROP CONSTRAINT fk_5eb36881727aca70');
        $this->addSql('ALTER TABLE librinfo_varieties_variety__plantcategory DROP CONSTRAINT fk_fccfb8ccc2d8da42');
        $this->addSql('ALTER TABLE librinfo_crm_position__circle DROP CONSTRAINT fk_cbc315d7dd842e46');
        $this->addSql('ALTER TABLE librinfo_email_email__position DROP CONSTRAINT fk_4fbf83b8dd842e46');
        $this->addSql('ALTER TABLE librinfo_crm_positionsearchindex DROP CONSTRAINT fk_32aefb0232d562b');
        $this->addSql('ALTER TABLE librinfo_varieties_genus DROP CONSTRAINT fk_fcf51373c35e566a');
        $this->addSql('ALTER TABLE librinfo_varieties_species DROP CONSTRAINT fk_c36a0e8485c4074c');
        if ($schema->hasTable('sil_stock_operation') && $schema->getTable('sil_stock_operation')->hasColumn('operation_type_id')) {
            $this->addSql('ALTER TABLE sil_stock_operation DROP operation_type_id;');
        }
        $this->addSql('DROP SEQUENCE lexik_trans_unit_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE address_search_index_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE email_search_index_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE email_template_search_index_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE lexik_trans_unit_translations_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE lexik_translation_file_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE organism_search_index_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE plot_search_index_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE position_search_index_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE seed_batch_search_index_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE sf_session_id_seq CASCADE');
        $this->addSql('CREATE TABLE sil_stock_unit (id UUID NOT NULL, location_id UUID DEFAULT NULL, qty_uom_id UUID NOT NULL, movement_id UUID DEFAULT NULL, stockitem_id UUID DEFAULT NULL, batch_id UUID DEFAULT NULL, code VARCHAR(64) NOT NULL, qty_value NUMERIC(15, 5) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2EE60B6577153098 ON sil_stock_unit (code)');
        $this->addSql('CREATE INDEX IDX_2EE60B6564D218E ON sil_stock_unit (location_id)');
        $this->addSql('CREATE INDEX IDX_2EE60B65210D48FE ON sil_stock_unit (qty_uom_id)');
        $this->addSql('CREATE INDEX IDX_2EE60B65229E70A7 ON sil_stock_unit (movement_id)');
        $this->addSql('CREATE INDEX IDX_2EE60B65217A674B ON sil_stock_unit (stockitem_id)');
        $this->addSql('CREATE INDEX IDX_2EE60B65F39EBE7A ON sil_stock_unit (batch_id)');
        $this->addSql('CREATE TABLE sil_stock_item (id UUID NOT NULL, uom_id UUID NOT NULL, strategy_output_id UUID NOT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(64) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_ED46222877153098 ON sil_stock_item (code)');
        $this->addSql('CREATE INDEX IDX_ED462228A103EEB1 ON sil_stock_item (uom_id)');
        $this->addSql('CREATE INDEX IDX_ED462228B9EF6AA3 ON sil_stock_item (strategy_output_id)');
        $this->addSql('CREATE TABLE sil_crm_phone_type (id UUID NOT NULL, sort_rank DOUBLE PRECISION DEFAULT \'65536\' NOT NULL, label VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX sil_crm_phone_type_sort_rank ON sil_crm_phone_type (sort_rank)');
        $this->addSql('CREATE TABLE sil_crm_position_type (id UUID NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE sil_crm_position (id UUID NOT NULL, position_type_id UUID DEFAULT NULL, individual_id UUID NOT NULL, organization_id UUID NOT NULL, phone VARCHAR(255) DEFAULT NULL, department VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, label VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, email_npai BOOLEAN DEFAULT NULL, email_no_newsletter BOOLEAN DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F5F58D4356BD9D60 ON sil_crm_position (position_type_id)');
        $this->addSql('CREATE INDEX IDX_F5F58D43AE271C0D ON sil_crm_position (individual_id)');
        $this->addSql('CREATE INDEX IDX_F5F58D4332C8A3DE ON sil_crm_position (organization_id)');
        $this->addSql('CREATE TABLE sil_crm_position__circle (position_id UUID NOT NULL, circle_id UUID NOT NULL, PRIMARY KEY(position_id, circle_id))');
        $this->addSql('CREATE INDEX IDX_D2947A3CDD842E46 ON sil_crm_position__circle (position_id)');
        $this->addSql('CREATE INDEX IDX_D2947A3C70EE2FF6 ON sil_crm_position__circle (circle_id)');
        $this->addSql('CREATE TABLE sil_crm_role (id UUID NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE sil_crm_country (id UUID NOT NULL, code VARCHAR(2) NOT NULL, enabled BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EC60519E77153098 ON sil_crm_country (code)');
        $this->addSql('CREATE INDEX sil_crm_country_code_index ON sil_crm_country (code)');
        $this->addSql('CREATE TABLE sil_crm_organism_group (id UUID NOT NULL, organism_id UUID DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7955A53664180A36 ON sil_crm_organism_group (organism_id)');
        $this->addSql('CREATE TABLE sil_crm_organsim_group__role (role_id UUID NOT NULL, organism_group_id UUID NOT NULL, PRIMARY KEY(role_id, organism_group_id))');
        $this->addSql('CREATE INDEX IDX_DA8B4A5AD60322AC ON sil_crm_organsim_group__role (role_id)');
        $this->addSql('CREATE INDEX IDX_DA8B4A5AD8099476 ON sil_crm_organsim_group__role (organism_group_id)');
        $this->addSql('CREATE TABLE sil_crm_organism_phone (id UUID NOT NULL, organism_id UUID DEFAULT NULL, number VARCHAR(255) NOT NULL, phone_type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_50DA762E64180A36 ON sil_crm_organism_phone (organism_id)');
        $this->addSql('CREATE TABLE sil_crm_city (id UUID NOT NULL, country_code VARCHAR(2) NOT NULL, zip VARCHAR(20) NOT NULL, city VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX sil_crm_city_country_index ON sil_crm_city (country_code)');
        $this->addSql('CREATE INDEX sil_crm_city_zip_index ON sil_crm_city (zip)');
        $this->addSql('CREATE INDEX sil_crm_city_city_index ON sil_crm_city (city)');
        $this->addSql('CREATE TABLE sil_crm_province (id UUID NOT NULL, country_id UUID DEFAULT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, abbreviation VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F903BDBD77153098 ON sil_crm_province (code)');
        $this->addSql('CREATE INDEX IDX_F903BDBDF92F3E70 ON sil_crm_province (country_id)');
        $this->addSql('CREATE UNIQUE INDEX sil_crm_province_country_provincename_idx ON sil_crm_province (country_id, name)');
        $this->addSql('CREATE TABLE sil_crm_category (id UUID NOT NULL, tree_root_id UUID DEFAULT NULL, tree_parent_id UUID DEFAULT NULL, tree_lft INT NOT NULL, tree_rgt INT NOT NULL, tree_lvl INT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B5957077B381CA9B ON sil_crm_category (tree_root_id)');
        $this->addSql('CREATE INDEX IDX_B5957077B5CEAE2F ON sil_crm_category (tree_parent_id)');
        $this->addSql('CREATE TABLE sil_crm_circle (id UUID NOT NULL, code VARCHAR(255) DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, translatable BOOLEAN DEFAULT \'false\' NOT NULL, editable BOOLEAN DEFAULT \'true\' NOT NULL, description TEXT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE sil_ecommerce_taxon (id UUID NOT NULL, tree_root UUID DEFAULT NULL, parent_id UUID DEFAULT NULL, code VARCHAR(255) NOT NULL, tree_left INT NOT NULL, tree_right INT NOT NULL, tree_level INT NOT NULL, position INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_35C1C88D77153098 ON sil_ecommerce_taxon (code)');
        $this->addSql('CREATE INDEX IDX_35C1C88DA977936C ON sil_ecommerce_taxon (tree_root)');
        $this->addSql('CREATE INDEX IDX_35C1C88D727ACA70 ON sil_ecommerce_taxon (parent_id)');
        $this->addSql('CREATE TABLE sil_ecommerce_product_option (id UUID NOT NULL, code VARCHAR(255) NOT NULL, position INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_12E0B7477153098 ON sil_ecommerce_product_option (code)');
        $this->addSql('CREATE TABLE sil_ecommerce_tax_rate (id UUID NOT NULL, category_id UUID NOT NULL, zone_id UUID NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, amount NUMERIC(10, 5) NOT NULL, included_in_price BOOLEAN NOT NULL, calculator VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7D9C260777153098 ON sil_ecommerce_tax_rate (code)');
        $this->addSql('CREATE INDEX IDX_7D9C260712469DE2 ON sil_ecommerce_tax_rate (category_id)');
        $this->addSql('CREATE INDEX IDX_7D9C26079F2C3FAB ON sil_ecommerce_tax_rate (zone_id)');
        $this->addSql('CREATE TABLE sil_ecommerce_sales_journal_item (id UUID NOT NULL, invoice_id UUID DEFAULT NULL, payment_id UUID DEFAULT NULL, order_id UUID DEFAULT NULL, operation_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, account VARCHAR(64) NOT NULL, label VARCHAR(255) NOT NULL, debit INT NOT NULL, credit INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C71467282989F1FD ON sil_ecommerce_sales_journal_item (invoice_id)');
        $this->addSql('CREATE INDEX IDX_C71467284C3A3BB ON sil_ecommerce_sales_journal_item (payment_id)');
        $this->addSql('CREATE INDEX IDX_C71467288D9F6D38 ON sil_ecommerce_sales_journal_item (order_id)');
        $this->addSql('CREATE TABLE sil_ecommerce_payment (id UUID NOT NULL, method_id UUID DEFAULT NULL, order_id UUID NOT NULL, currency_code VARCHAR(3) NOT NULL, amount INT NOT NULL, state VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, details TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_992E527F19883967 ON sil_ecommerce_payment (method_id)');
        $this->addSql('CREATE INDEX IDX_992E527F8D9F6D38 ON sil_ecommerce_payment (order_id)');
        $this->addSql('COMMENT ON COLUMN sil_ecommerce_payment.details IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE sil_ecommerce_shipping_method (id UUID NOT NULL, category_id UUID DEFAULT NULL, zone_id UUID NOT NULL, tax_category_id UUID DEFAULT NULL, code VARCHAR(255) NOT NULL, configuration TEXT NOT NULL, category_requirement INT NOT NULL, calculator VARCHAR(255) NOT NULL, is_enabled BOOLEAN NOT NULL, position INT NOT NULL, archived_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_38884A3D77153098 ON sil_ecommerce_shipping_method (code)');
        $this->addSql('CREATE INDEX IDX_38884A3D12469DE2 ON sil_ecommerce_shipping_method (category_id)');
        $this->addSql('CREATE INDEX IDX_38884A3D9F2C3FAB ON sil_ecommerce_shipping_method (zone_id)');
        $this->addSql('CREATE INDEX IDX_38884A3D9DF894ED ON sil_ecommerce_shipping_method (tax_category_id)');
        $this->addSql('COMMENT ON COLUMN sil_ecommerce_shipping_method.configuration IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE sylius_shipping_method_channels (shipping_method_id UUID NOT NULL, channel_id UUID NOT NULL, PRIMARY KEY(shipping_method_id, channel_id))');
        $this->addSql('CREATE INDEX IDX_2D9833355F7D6850 ON sylius_shipping_method_channels (shipping_method_id)');
        $this->addSql('CREATE INDEX IDX_2D98333572F5A1AA ON sylius_shipping_method_channels (channel_id)');
        $this->addSql('CREATE TABLE sil_ecommerce_order_item (id UUID NOT NULL, order_id UUID NOT NULL, variant_id UUID NOT NULL, quantity INT NOT NULL, unit_price INT NOT NULL, units_total INT NOT NULL, adjustments_total INT NOT NULL, total INT NOT NULL, is_immutable BOOLEAN NOT NULL, bulk BOOLEAN DEFAULT \'false\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3B9E646F8D9F6D38 ON sil_ecommerce_order_item (order_id)');
        $this->addSql('CREATE INDEX IDX_3B9E646F3B69A9AF ON sil_ecommerce_order_item (variant_id)');
        $this->addSql('CREATE TABLE sil_ecommerce_customer_group (id UUID NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9A217B9E77153098 ON sil_ecommerce_customer_group (code)');
        $this->addSql('CREATE TABLE sil_ecommerce_zone (id UUID NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(8) NOT NULL, scope VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6D06019077153098 ON sil_ecommerce_zone (code)');
        $this->addSql('CREATE TABLE sil_ecommerce_product_attribute (id UUID NOT NULL, code VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, storage_type VARCHAR(255) NOT NULL, configuration TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, position INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5725232D77153098 ON sil_ecommerce_product_attribute (code)');
        $this->addSql('COMMENT ON COLUMN sil_ecommerce_product_attribute.configuration IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE sil_ecommerce_channel (id UUID NOT NULL, default_locale_id UUID NOT NULL, base_currency_id UUID NOT NULL, default_tax_zone_id UUID DEFAULT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, color VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, enabled BOOLEAN NOT NULL, hostname VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, theme_name VARCHAR(255) DEFAULT NULL, tax_calculation_strategy VARCHAR(255) NOT NULL, contact_email VARCHAR(255) DEFAULT NULL, skipping_shipping_step_allowed BOOLEAN NOT NULL, skipping_payment_step_allowed BOOLEAN NOT NULL, account_verification_required BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_56FF583577153098 ON sil_ecommerce_channel (code)');
        $this->addSql('CREATE INDEX IDX_56FF5835743BF776 ON sil_ecommerce_channel (default_locale_id)');
        $this->addSql('CREATE INDEX IDX_56FF58353101778E ON sil_ecommerce_channel (base_currency_id)');
        $this->addSql('CREATE INDEX IDX_56FF5835A978C17 ON sil_ecommerce_channel (default_tax_zone_id)');
        $this->addSql('CREATE TABLE sylius_channel_currencies (channel_id UUID NOT NULL, currency_id UUID NOT NULL, PRIMARY KEY(channel_id, currency_id))');
        $this->addSql('CREATE INDEX IDX_AE491F9372F5A1AA ON sylius_channel_currencies (channel_id)');
        $this->addSql('CREATE INDEX IDX_AE491F9338248176 ON sylius_channel_currencies (currency_id)');
        $this->addSql('CREATE TABLE sylius_channel_locales (channel_id UUID NOT NULL, locale_id UUID NOT NULL, PRIMARY KEY(channel_id, locale_id))');
        $this->addSql('CREATE INDEX IDX_786B7A8472F5A1AA ON sylius_channel_locales (channel_id)');
        $this->addSql('CREATE INDEX IDX_786B7A84E559DFD1 ON sylius_channel_locales (locale_id)');
        $this->addSql('CREATE TABLE sil_ecommerce_product_image (id UUID NOT NULL, owner_id UUID NOT NULL, real_file_id UUID DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B398DDE07E3C61F9 ON sil_ecommerce_product_image (owner_id)');
        $this->addSql('CREATE INDEX IDX_B398DDE094F4B9F8 ON sil_ecommerce_product_image (real_file_id)');
        $this->addSql('CREATE TABLE sil_ecommerce_product_image__product_variant (image_id UUID NOT NULL, variant_id UUID NOT NULL, PRIMARY KEY(image_id, variant_id))');
        $this->addSql('CREATE INDEX IDX_31AFE0943DA5256D ON sil_ecommerce_product_image__product_variant (image_id)');
        $this->addSql('CREATE INDEX IDX_31AFE0943B69A9AF ON sil_ecommerce_product_image__product_variant (variant_id)');
        $this->addSql('CREATE TABLE sil_ecommerce_product_review (id UUID NOT NULL, product_id UUID NOT NULL, author_id UUID NOT NULL, title VARCHAR(255) NOT NULL, rating INT NOT NULL, comment TEXT DEFAULT NULL, status VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_22EB8A024584665A ON sil_ecommerce_product_review (product_id)');
        $this->addSql('CREATE INDEX IDX_22EB8A02F675F31B ON sil_ecommerce_product_review (author_id)');
        $this->addSql('CREATE TABLE sil_ecommerce_invoice (id UUID NOT NULL, order_id UUID DEFAULT NULL, number VARCHAR(255) NOT NULL, mime_type VARCHAR(255) DEFAULT NULL, size INT DEFAULT NULL, file TEXT NOT NULL, total INT NOT NULL, type INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6463C13696901F54 ON sil_ecommerce_invoice (number)');
        $this->addSql('CREATE INDEX IDX_6463C1368D9F6D38 ON sil_ecommerce_invoice (order_id)');
        $this->addSql('CREATE TABLE sil_email_template (id UUID NOT NULL, name VARCHAR(255) NOT NULL, content TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE sil_email_receipt (id UUID NOT NULL, email_id UUID DEFAULT NULL, address VARCHAR(255) NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8D82EC77A832C1C9 ON sil_email_receipt (email_id)');
        $this->addSql('CREATE TABLE sil_email_link (id UUID NOT NULL, email_id UUID DEFAULT NULL, destination TEXT NOT NULL, address VARCHAR(255) NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_42DDE686A832C1C9 ON sil_email_link (email_id)');
        $this->addSql('CREATE TABLE lisem_seed_batch_certification_type (id UUID NOT NULL, logo_id UUID DEFAULT NULL, code VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F4F859A677153098 ON lisem_seed_batch_certification_type (code)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F4F859A6F98F144A ON lisem_seed_batch_certification_type (logo_id)');
        $this->addSql('CREATE TABLE lisem_seed_farm (id UUID NOT NULL, code VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, address VARCHAR(255) DEFAULT NULL, zip VARCHAR(20) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, npai BOOLEAN DEFAULT NULL, vcard_uid VARCHAR(255) DEFAULT NULL, confirmed BOOLEAN DEFAULT \'true\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX lisem_seed_farm_name_idx ON lisem_seed_farm (name)');
        $this->addSql('CREATE UNIQUE INDEX lisem_seed_farm_code_idx ON lisem_seed_farm (code)');
        $this->addSql('CREATE TABLE lisem_seed_batch_plot (id UUID NOT NULL, producer_id UUID DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, address VARCHAR(255) DEFAULT NULL, zip VARCHAR(20) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, npai BOOLEAN DEFAULT NULL, vcard_uid VARCHAR(255) DEFAULT NULL, confirmed BOOLEAN DEFAULT \'true\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3C1B23A589B658FE ON lisem_seed_batch_plot (producer_id)');
        $this->addSql('CREATE UNIQUE INDEX lisem_seed_batch_plot_search_idx ON lisem_seed_batch_plot (producer_id, code)');
        $this->addSql('CREATE TABLE lisem_seed_batch_certification (id UUID NOT NULL, plot_id UUID DEFAULT NULL, certification_type_id UUID DEFAULT NULL, certifying_body_id UUID DEFAULT NULL, code VARCHAR(255) NOT NULL, certification_date DATE DEFAULT NULL, start_date DATE DEFAULT NULL, expiry_date DATE DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E1C888BC77153098 ON lisem_seed_batch_certification (code)');
        $this->addSql('CREATE INDEX IDX_E1C888BC680D0B01 ON lisem_seed_batch_certification (plot_id)');
        $this->addSql('CREATE INDEX IDX_E1C888BC90AF82A5 ON lisem_seed_batch_certification (certification_type_id)');
        $this->addSql('CREATE INDEX IDX_E1C888BC5A38D544 ON lisem_seed_batch_certification (certifying_body_id)');
        $this->addSql('CREATE TABLE lisem_seed_batch_certifying_body (id UUID NOT NULL, code VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, address VARCHAR(255) DEFAULT NULL, zip VARCHAR(20) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, npai BOOLEAN DEFAULT NULL, vcard_uid VARCHAR(255) DEFAULT NULL, confirmed BOOLEAN DEFAULT \'true\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE sil_sonata_group (id UUID NOT NULL, name VARCHAR(255) NOT NULL, roles TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN sil_sonata_group.roles IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE lisem_variety_description (id UUID NOT NULL, variety_id UUID DEFAULT NULL, field VARCHAR(255) NOT NULL, value TEXT DEFAULT NULL, fieldset VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_EB4FA25178C2BC47 ON lisem_variety_description (variety_id)');
        $this->addSql('CREATE TABLE lisem_variety_plant_category (id UUID NOT NULL, tree_root_id UUID DEFAULT NULL, tree_parent_id UUID DEFAULT NULL, code VARCHAR(6) DEFAULT NULL, tree_lft INT NOT NULL, tree_rgt INT NOT NULL, tree_lvl INT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_531DCCCEB381CA9B ON lisem_variety_plant_category (tree_root_id)');
        $this->addSql('CREATE INDEX IDX_531DCCCEB5CEAE2F ON lisem_variety_plant_category (tree_parent_id)');
        $this->addSql('CREATE TABLE sil_email (id UUID NOT NULL, template_id UUID DEFAULT NULL, message TEXT DEFAULT NULL, message_id VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, environment VARCHAR(255) DEFAULT NULL, field_from VARCHAR(255) NOT NULL, field_to VARCHAR(255) NOT NULL, field_cc VARCHAR(255) DEFAULT NULL, field_bcc VARCHAR(255) DEFAULT NULL, field_subject VARCHAR(255) DEFAULT NULL, content TEXT DEFAULT NULL, text_content TEXT NOT NULL, sent BOOLEAN DEFAULT NULL, tracking BOOLEAN DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_70FD47F45DA0FB8 ON sil_email (template_id)');
        $this->addSql('CREATE TABLE sil_email__file (email_id UUID NOT NULL, file_id UUID NOT NULL, PRIMARY KEY(email_id, file_id))');
        $this->addSql('CREATE INDEX IDX_1FAFD3EBA832C1C9 ON sil_email__file (email_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1FAFD3EB93CB796C ON sil_email__file (file_id)');
        $this->addSql('CREATE TABLE sil_user (id UUID NOT NULL, username VARCHAR(255) DEFAULT NULL, username_canonical VARCHAR(255) DEFAULT NULL, enabled BOOLEAN NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, password_reset_token VARCHAR(255) DEFAULT NULL, password_requested_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, email_verification_token VARCHAR(255) DEFAULT NULL, verified_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, locked BOOLEAN NOT NULL, expires_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, credentials_expire_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, roles TEXT NOT NULL, email VARCHAR(255) DEFAULT NULL, email_canonical VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, locale_code VARCHAR(12) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN sil_user.roles IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE sil_sonata_user__group (user_id UUID NOT NULL, group_id UUID NOT NULL, PRIMARY KEY(user_id, group_id))');
        $this->addSql('CREATE INDEX IDX_B17AB998A76ED395 ON sil_sonata_user__group (user_id)');
        $this->addSql('CREATE INDEX IDX_B17AB998FE54D947 ON sil_sonata_user__group (group_id)');
        $this->addSql('CREATE TABLE sil_crm_organism (id UUID NOT NULL, category_id UUID DEFAULT NULL, default_phone_id UUID DEFAULT NULL, default_address_id UUID DEFAULT NULL, firstname VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, shortname VARCHAR(255) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, flash_on_control VARCHAR(255) DEFAULT NULL, family_contact BOOLEAN DEFAULT NULL, culture VARCHAR(2) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, administrative_number VARCHAR(255) DEFAULT NULL, is_individual BOOLEAN DEFAULT \'false\' NOT NULL, is_customer BOOLEAN DEFAULT \'false\' NOT NULL, customer_code VARCHAR(255) DEFAULT NULL, is_supplier BOOLEAN DEFAULT \'false\' NOT NULL, supplier_code VARCHAR(255) DEFAULT NULL, iban VARCHAR(255) DEFAULT NULL, vat VARCHAR(255) DEFAULT NULL, vat_verified SMALLINT DEFAULT 0 NOT NULL, alert VARCHAR(255) DEFAULT NULL, active BOOLEAN NOT NULL, catalogue_sent BOOLEAN DEFAULT NULL, last_catalogue_sent_date DATE DEFAULT NULL, first_catalogue_sent_date DATE DEFAULT NULL, catalogue_send_mean TEXT DEFAULT NULL, catalogue_type TEXT DEFAULT NULL, source TEXT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, email_npai BOOLEAN DEFAULT NULL, email_no_newsletter BOOLEAN DEFAULT NULL, seed_producer_code VARCHAR(255) DEFAULT NULL, seed_producer BOOLEAN DEFAULT \'false\' NOT NULL, email_canonical VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_BE8AE39A12469DE2 ON sil_crm_organism (category_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BE8AE39A3D371385 ON sil_crm_organism (default_phone_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BE8AE39ABD94FB16 ON sil_crm_organism (default_address_id)');
        $this->addSql('CREATE TABLE sil_crm_organism__circle (circle_id UUID NOT NULL, organism_id UUID NOT NULL, PRIMARY KEY(circle_id, organism_id))');
        $this->addSql('CREATE INDEX IDX_C518F6FF70EE2FF6 ON sil_crm_organism__circle (circle_id)');
        $this->addSql('CREATE INDEX IDX_C518F6FF64180A36 ON sil_crm_organism__circle (organism_id)');
        $this->addSql('CREATE TABLE sil_media_file (id UUID NOT NULL, owner_id UUID DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, mime_type VARCHAR(255) DEFAULT NULL, size DOUBLE PRECISION DEFAULT NULL, file TEXT DEFAULT NULL, owned BOOLEAN DEFAULT NULL, path VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A49FB631B548B0F ON sil_media_file (path)');
        $this->addSql('CREATE INDEX IDX_A49FB6317E3C61F9 ON sil_media_file (owner_id)');
        $this->addSql('CREATE TABLE sil_crm_address (id UUID NOT NULL, organism_id UUID DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, post_code VARCHAR(255) DEFAULT NULL, street VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, country_code VARCHAR(255) NOT NULL, province_code VARCHAR(255) DEFAULT NULL, province_name VARCHAR(255) DEFAULT NULL, npai BOOLEAN NOT NULL, vcard_uid VARCHAR(255) DEFAULT NULL, confirmed BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B25DF77964180A36 ON sil_crm_address (organism_id)');
        $this->addSql('CREATE TABLE sil_ecommerce_product (id UUID NOT NULL, main_taxon_id UUID DEFAULT NULL, variety_id UUID DEFAULT NULL, code VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, enabled BOOLEAN NOT NULL, variant_selection_method VARCHAR(255) NOT NULL, average_rating DOUBLE PRECISION DEFAULT \'0\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_274CD2DF77153098 ON sil_ecommerce_product (code)');
        $this->addSql('CREATE INDEX IDX_274CD2DF731E505 ON sil_ecommerce_product (main_taxon_id)');
        $this->addSql('CREATE INDEX IDX_274CD2DF78C2BC47 ON sil_ecommerce_product (variety_id)');
        $this->addSql('CREATE TABLE sylius_product_channels (product_id UUID NOT NULL, channel_id UUID NOT NULL, PRIMARY KEY(product_id, channel_id))');
        $this->addSql('CREATE INDEX IDX_F9EF269B4584665A ON sylius_product_channels (product_id)');
        $this->addSql('CREATE INDEX IDX_F9EF269B72F5A1AA ON sylius_product_channels (channel_id)');
        $this->addSql('CREATE TABLE sylius_product_options (product_id UUID NOT NULL, option_id UUID NOT NULL, PRIMARY KEY(product_id, option_id))');
        $this->addSql('CREATE INDEX IDX_2B5FF0094584665A ON sylius_product_options (product_id)');
        $this->addSql('CREATE INDEX IDX_2B5FF009A7C41D6F ON sylius_product_options (option_id)');
        $this->addSql('CREATE TABLE lisem_variety (id UUID NOT NULL, parent_id UUID DEFAULT NULL, species_id UUID DEFAULT NULL, created_by_id UUID DEFAULT NULL, updated_by_id UUID DEFAULT NULL, latin_name VARCHAR(255) DEFAULT NULL, alias VARCHAR(255) DEFAULT NULL, code VARCHAR(15) DEFAULT NULL, life_cycle VARCHAR(20) DEFAULT NULL, official BOOLEAN DEFAULT NULL, official_name VARCHAR(255) DEFAULT NULL, official_date_in DATE DEFAULT NULL, official_date_out DATE DEFAULT NULL, official_maintainer VARCHAR(255) DEFAULT NULL, legal_germination_rate INT DEFAULT NULL, regulatory_status VARCHAR(255) DEFAULT NULL, germination_rate INT DEFAULT NULL, selection_advice VARCHAR(255) DEFAULT NULL, selection_criteria VARCHAR(255) DEFAULT NULL, misc_advice VARCHAR(255) DEFAULT NULL, tkw DOUBLE PRECISION DEFAULT NULL, seed_lifespan INT DEFAULT NULL, raise_duration INT DEFAULT NULL, seedhead_yield INT DEFAULT NULL, distance_on_line INT DEFAULT NULL, distance_between_lines INT DEFAULT NULL, plant_density INT DEFAULT NULL, area_per_kg INT DEFAULT NULL, seedheads_per_kg INT DEFAULT NULL, base_seed_per_kg INT DEFAULT NULL, transmitted_diseases VARCHAR(255) DEFAULT NULL, strain_characteristics VARCHAR(255) DEFAULT NULL, is_strain BOOLEAN DEFAULT NULL, plant_type VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FA584188727ACA70 ON lisem_variety (parent_id)');
        $this->addSql('CREATE INDEX IDX_FA584188B2A1D860 ON lisem_variety (species_id)');
        $this->addSql('CREATE INDEX IDX_FA584188B03A8386 ON lisem_variety (created_by_id)');
        $this->addSql('CREATE INDEX IDX_FA584188896DBBDE ON lisem_variety (updated_by_id)');
        $this->addSql('CREATE UNIQUE INDEX lisem_variety_name_idx ON lisem_variety (name)');
        $this->addSql('CREATE TABLE lisem_variety__plant_category (variety_id UUID NOT NULL, plantCategory_id UUID NOT NULL, PRIMARY KEY(plantCategory_id, variety_id))');
        $this->addSql('CREATE INDEX IDX_E630DBC09C0B5A8 ON lisem_variety__plant_category (plantCategory_id)');
        $this->addSql('CREATE INDEX IDX_E630DBC078C2BC47 ON lisem_variety__plant_category (variety_id)');
        $this->addSql('CREATE TABLE lisem_variety__product_option_value (variety_id UUID NOT NULL, productOptionValue_id UUID NOT NULL, PRIMARY KEY(productOptionValue_id, variety_id))');
        $this->addSql('CREATE INDEX IDX_84D5A9CD4330BF8 ON lisem_variety__product_option_value (productOptionValue_id)');
        $this->addSql('CREATE INDEX IDX_84D5A9C78C2BC47 ON lisem_variety__product_option_value (variety_id)');
        $this->addSql('CREATE TABLE lisem_variety__file (variety_id UUID NOT NULL, file_id UUID NOT NULL, PRIMARY KEY(variety_id, file_id))');
        $this->addSql('CREATE INDEX IDX_7A189C9078C2BC47 ON lisem_variety__file (variety_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7A189C9093CB796C ON lisem_variety__file (file_id)');
        $this->addSql('CREATE TABLE sil_ecommerce_product_variant (id UUID NOT NULL, product_id UUID NOT NULL, tax_category_id UUID DEFAULT NULL, shipping_category_id UUID DEFAULT NULL, code VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, position INT NOT NULL, version INT DEFAULT 1 NOT NULL, on_hold INT NOT NULL, on_hand INT NOT NULL, tracked BOOLEAN NOT NULL, width DOUBLE PRECISION DEFAULT NULL, height DOUBLE PRECISION DEFAULT NULL, depth DOUBLE PRECISION DEFAULT NULL, weight DOUBLE PRECISION DEFAULT NULL, shipping_required BOOLEAN NOT NULL, enabled BOOLEAN DEFAULT \'true\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6D11110F77153098 ON sil_ecommerce_product_variant (code)');
        $this->addSql('CREATE INDEX IDX_6D11110F4584665A ON sil_ecommerce_product_variant (product_id)');
        $this->addSql('CREATE INDEX IDX_6D11110F9DF894ED ON sil_ecommerce_product_variant (tax_category_id)');
        $this->addSql('CREATE INDEX IDX_6D11110F9E2D1A41 ON sil_ecommerce_product_variant (shipping_category_id)');
        $this->addSql('CREATE TABLE sylius_product_variant_option_value (variant_id UUID NOT NULL, option_value_id UUID NOT NULL, PRIMARY KEY(variant_id, option_value_id))');
        $this->addSql('CREATE INDEX IDX_76CDAFA13B69A9AF ON sylius_product_variant_option_value (variant_id)');
        $this->addSql('CREATE INDEX IDX_76CDAFA1D957CA06 ON sylius_product_variant_option_value (option_value_id)');
        $this->addSql('CREATE TABLE lisem_variety_family (id UUID NOT NULL, created_by_id UUID DEFAULT NULL, updated_by_id UUID DEFAULT NULL, latin_name VARCHAR(255) DEFAULT NULL, alias VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C290C94DB03A8386 ON lisem_variety_family (created_by_id)');
        $this->addSql('CREATE INDEX IDX_C290C94D896DBBDE ON lisem_variety_family (updated_by_id)');
        $this->addSql('CREATE UNIQUE INDEX lisem_variety_family_name_idx ON lisem_variety_family (name)');
        $this->addSql('CREATE TABLE lisem_channel_description (id UUID NOT NULL, channel_id UUID DEFAULT NULL, variety_id UUID DEFAULT NULL, value VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_BD758AD72F5A1AA ON lisem_channel_description (channel_id)');
        $this->addSql('CREATE INDEX IDX_BD758AD78C2BC47 ON lisem_channel_description (variety_id)');
        $this->addSql('CREATE TABLE sil_ecommerce_order (id UUID NOT NULL, channel_id UUID DEFAULT NULL, promotion_coupon_id UUID DEFAULT NULL, customer_id UUID DEFAULT NULL, shipping_address_id UUID DEFAULT NULL, billing_address_id UUID DEFAULT NULL, number VARCHAR(255) DEFAULT NULL, notes TEXT DEFAULT NULL, state VARCHAR(255) NOT NULL, checkout_completed_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, items_total INT NOT NULL, adjustments_total INT NOT NULL, total INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, currency_code VARCHAR(3) NOT NULL, locale_code VARCHAR(255) NOT NULL, checkout_state VARCHAR(255) NOT NULL, payment_state VARCHAR(255) NOT NULL, shipping_state VARCHAR(255) NOT NULL, token_value VARCHAR(255) DEFAULT NULL, customer_ip VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9B8F78BE96901F54 ON sil_ecommerce_order (number)');
        $this->addSql('CREATE INDEX IDX_9B8F78BE72F5A1AA ON sil_ecommerce_order (channel_id)');
        $this->addSql('CREATE INDEX IDX_9B8F78BE17B24436 ON sil_ecommerce_order (promotion_coupon_id)');
        $this->addSql('CREATE INDEX IDX_9B8F78BE9395C3F3 ON sil_ecommerce_order (customer_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9B8F78BE4D4CFF2B ON sil_ecommerce_order (shipping_address_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9B8F78BE79D0C0E4 ON sil_ecommerce_order (billing_address_id)');
        $this->addSql('CREATE TABLE sylius_promotion_order (order_id UUID NOT NULL, promotion_id UUID NOT NULL, PRIMARY KEY(order_id, promotion_id))');
        $this->addSql('CREATE INDEX IDX_BF9CF6FB8D9F6D38 ON sylius_promotion_order (order_id)');
        $this->addSql('CREATE INDEX IDX_BF9CF6FB139DF194 ON sylius_promotion_order (promotion_id)');
        $this->addSql('CREATE TABLE lisem_variety_genus (id UUID NOT NULL, family_id UUID DEFAULT NULL, created_by_id UUID DEFAULT NULL, updated_by_id UUID DEFAULT NULL, latin_name VARCHAR(255) DEFAULT NULL, alias VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9367CAF5C35E566A ON lisem_variety_genus (family_id)');
        $this->addSql('CREATE INDEX IDX_9367CAF5B03A8386 ON lisem_variety_genus (created_by_id)');
        $this->addSql('CREATE INDEX IDX_9367CAF5896DBBDE ON lisem_variety_genus (updated_by_id)');
        $this->addSql('CREATE UNIQUE INDEX lisem_variety_genus_name_idx ON lisem_variety_genus (name)');
        $this->addSql('CREATE TABLE lisem_seed_batch (id UUID NOT NULL, seed_farm_id UUID DEFAULT NULL, plot_id UUID DEFAULT NULL, variety_id UUID DEFAULT NULL, producer_id UUID DEFAULT NULL, code VARCHAR(255) NOT NULL, batch_number INT NOT NULL, production_year INT NOT NULL, germination_rate DOUBLE PRECISION DEFAULT NULL, germination_date DATE DEFAULT NULL, tkw DOUBLE PRECISION DEFAULT NULL, tkw_date DATE DEFAULT NULL, certifications VARCHAR(255) DEFAULT NULL, gross_producer_weight INT DEFAULT NULL, gross_delivered_weight INT DEFAULT NULL, net_screened_weight INT DEFAULT NULL, to_screen_weight INT DEFAULT NULL, delivery_date DATE DEFAULT NULL, delivery_note BOOLEAN DEFAULT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B174DFF34B557494 ON lisem_seed_batch (seed_farm_id)');
        $this->addSql('CREATE INDEX IDX_B174DFF3680D0B01 ON lisem_seed_batch (plot_id)');
        $this->addSql('CREATE INDEX IDX_B174DFF378C2BC47 ON lisem_seed_batch (variety_id)');
        $this->addSql('CREATE INDEX IDX_B174DFF389B658FE ON lisem_seed_batch (producer_id)');
        $this->addSql('CREATE TABLE lisem_seed_batch__product_variant (producVariant_id UUID NOT NULL, seedBatch_id UUID NOT NULL, PRIMARY KEY(producVariant_id, seedBatch_id))');
        $this->addSql('CREATE INDEX IDX_5AE6DF1F6B65DCB2 ON lisem_seed_batch__product_variant (producVariant_id)');
        $this->addSql('CREATE INDEX IDX_5AE6DF1F5009B3C8 ON lisem_seed_batch__product_variant (seedBatch_id)');
        $this->addSql('CREATE TABLE sil_ecommerce_product_option_value (id UUID NOT NULL, option_id UUID NOT NULL, code VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3103785477153098 ON sil_ecommerce_product_option_value (code)');
        $this->addSql('CREATE INDEX IDX_31037854A7C41D6F ON sil_ecommerce_product_option_value (option_id)');
        $this->addSql('CREATE TABLE lisem_variety_species (id UUID NOT NULL, genus_id UUID DEFAULT NULL, parent_species_id UUID DEFAULT NULL, created_by_id UUID DEFAULT NULL, updated_by_id UUID DEFAULT NULL, latin_name VARCHAR(255) DEFAULT NULL, alias VARCHAR(255) DEFAULT NULL, code VARCHAR(15) NOT NULL, life_cycle VARCHAR(10) DEFAULT NULL, legal_germination_rate INT DEFAULT NULL, germination_rate INT DEFAULT 0, seed_lifespan INT DEFAULT NULL, raise_duration INT DEFAULT NULL, tkw DOUBLE PRECISION DEFAULT NULL, regulatory_status VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_51BC34AB85C4074C ON lisem_variety_species (genus_id)');
        $this->addSql('CREATE INDEX IDX_51BC34ABF5E25C30 ON lisem_variety_species (parent_species_id)');
        $this->addSql('CREATE INDEX IDX_51BC34ABB03A8386 ON lisem_variety_species (created_by_id)');
        $this->addSql('CREATE INDEX IDX_51BC34AB896DBBDE ON lisem_variety_species (updated_by_id)');
        $this->addSql('CREATE UNIQUE INDEX lisem_variety_species_name_idx ON lisem_variety_species (name)');
        $this->addSql('CREATE UNIQUE INDEX lisem_variety_species_code_idx ON lisem_variety_species (code)');
        $this->addSql('CREATE TABLE lisem_variety_species__category (plant_category_id UUID NOT NULL, species_id UUID NOT NULL, PRIMARY KEY(plant_category_id, species_id))');
        $this->addSql('CREATE INDEX IDX_438EBCAFC2D8DA42 ON lisem_variety_species__category (plant_category_id)');
        $this->addSql('CREATE INDEX IDX_438EBCAFB2A1D860 ON lisem_variety_species__category (species_id)');
        $this->addSql('CREATE TABLE blast_custom_filter (id UUID NOT NULL, user_id UUID DEFAULT NULL, name VARCHAR(255) NOT NULL, route_name VARCHAR(255) NOT NULL, route_parameters TEXT DEFAULT NULL, filter_parameters TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_854D7261A76ED395 ON blast_custom_filter (user_id)');
        $this->addSql('CREATE TABLE blast_select_choice (id UUID NOT NULL, label VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE sylius_admin_user (id UUID NOT NULL, username VARCHAR(255) DEFAULT NULL, username_canonical VARCHAR(255) DEFAULT NULL, enabled BOOLEAN NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, password_reset_token VARCHAR(255) DEFAULT NULL, password_requested_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, email_verification_token VARCHAR(255) DEFAULT NULL, verified_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, locked BOOLEAN NOT NULL, expires_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, credentials_expire_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, roles TEXT NOT NULL, email VARCHAR(255) DEFAULT NULL, email_canonical VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, locale_code VARCHAR(12) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE sil_email__circle (circle_id UUID NOT NULL, email_id UUID NOT NULL, PRIMARY KEY(circle_id, email_id))');
        $this->addSql('CREATE INDEX IDX_F39FD8C870EE2FF6 ON sil_email__circle (circle_id)');
        $this->addSql('CREATE INDEX IDX_F39FD8C8A832C1C9 ON sil_email__circle (email_id)');
        $this->addSql('CREATE TABLE sil_user_group (id UUID NOT NULL, name VARCHAR(255) NOT NULL, roles TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE sil_user__group (user_id UUID NOT NULL, group_id UUID NOT NULL, PRIMARY KEY(user_id, group_id))');
        $this->addSql('CREATE INDEX IDX_D1F2670BA76ED395 ON sil_user__group (user_id)');
        $this->addSql('CREATE INDEX IDX_D1F2670BFE54D947 ON sil_user__group (group_id)');

        $this->addSql('COMMENT ON COLUMN sylius_admin_user.roles IS \'(DC2Type:array)\'');
        $this->addSql('COMMENT ON COLUMN sil_user_group.roles IS \'(DC2Type:array)\'');

        $this->addSql('ALTER TABLE sil_stock_unit ADD CONSTRAINT FK_2EE60B6564D218E FOREIGN KEY (location_id) REFERENCES sil_stock_location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_unit ADD CONSTRAINT FK_2EE60B65210D48FE FOREIGN KEY (qty_uom_id) REFERENCES sil_stock_uom (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_unit ADD CONSTRAINT FK_2EE60B65229E70A7 FOREIGN KEY (movement_id) REFERENCES sil_stock_movement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_unit ADD CONSTRAINT FK_2EE60B65217A674B FOREIGN KEY (stockitem_id) REFERENCES sil_stock_item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_unit ADD CONSTRAINT FK_2EE60B65F39EBE7A FOREIGN KEY (batch_id) REFERENCES sil_stock_batch (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_item ADD CONSTRAINT FK_ED462228A103EEB1 FOREIGN KEY (uom_id) REFERENCES sil_stock_uom (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_item ADD CONSTRAINT FK_ED462228B9EF6AA3 FOREIGN KEY (strategy_output_id) REFERENCES sil_stock_output_strategy (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_crm_position ADD CONSTRAINT FK_F5F58D4356BD9D60 FOREIGN KEY (position_type_id) REFERENCES sil_crm_position_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_crm_position ADD CONSTRAINT FK_F5F58D43AE271C0D FOREIGN KEY (individual_id) REFERENCES sil_crm_organism (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_crm_position ADD CONSTRAINT FK_F5F58D4332C8A3DE FOREIGN KEY (organization_id) REFERENCES sil_crm_organism (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_crm_position__circle ADD CONSTRAINT FK_D2947A3CDD842E46 FOREIGN KEY (position_id) REFERENCES sil_crm_position (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_crm_position__circle ADD CONSTRAINT FK_D2947A3C70EE2FF6 FOREIGN KEY (circle_id) REFERENCES sil_crm_circle (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_crm_organism_group ADD CONSTRAINT FK_7955A53664180A36 FOREIGN KEY (organism_id) REFERENCES sil_crm_organism (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_crm_organsim_group__role ADD CONSTRAINT FK_DA8B4A5AD60322AC FOREIGN KEY (role_id) REFERENCES sil_crm_organism_group (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_crm_organsim_group__role ADD CONSTRAINT FK_DA8B4A5AD8099476 FOREIGN KEY (organism_group_id) REFERENCES sil_crm_role (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_crm_organism_phone ADD CONSTRAINT FK_50DA762E64180A36 FOREIGN KEY (organism_id) REFERENCES sil_crm_organism (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_crm_province ADD CONSTRAINT FK_F903BDBDF92F3E70 FOREIGN KEY (country_id) REFERENCES sil_crm_country (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_crm_category ADD CONSTRAINT FK_B5957077B381CA9B FOREIGN KEY (tree_root_id) REFERENCES sil_crm_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_crm_category ADD CONSTRAINT FK_B5957077B5CEAE2F FOREIGN KEY (tree_parent_id) REFERENCES sil_crm_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_taxon ADD CONSTRAINT FK_35C1C88DA977936C FOREIGN KEY (tree_root) REFERENCES sil_ecommerce_taxon (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_taxon ADD CONSTRAINT FK_35C1C88D727ACA70 FOREIGN KEY (parent_id) REFERENCES sil_ecommerce_taxon (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_tax_rate ADD CONSTRAINT FK_7D9C260712469DE2 FOREIGN KEY (category_id) REFERENCES sylius_tax_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_tax_rate ADD CONSTRAINT FK_7D9C26079F2C3FAB FOREIGN KEY (zone_id) REFERENCES sil_ecommerce_zone (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_sales_journal_item ADD CONSTRAINT FK_C71467282989F1FD FOREIGN KEY (invoice_id) REFERENCES sil_ecommerce_invoice (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_sales_journal_item ADD CONSTRAINT FK_C71467284C3A3BB FOREIGN KEY (payment_id) REFERENCES sil_ecommerce_payment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_sales_journal_item ADD CONSTRAINT FK_C71467288D9F6D38 FOREIGN KEY (order_id) REFERENCES sil_ecommerce_order (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_payment ADD CONSTRAINT FK_992E527F19883967 FOREIGN KEY (method_id) REFERENCES sylius_payment_method (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_payment ADD CONSTRAINT FK_992E527F8D9F6D38 FOREIGN KEY (order_id) REFERENCES sil_ecommerce_order (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_shipping_method ADD CONSTRAINT FK_38884A3D12469DE2 FOREIGN KEY (category_id) REFERENCES sylius_shipping_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_shipping_method ADD CONSTRAINT FK_38884A3D9F2C3FAB FOREIGN KEY (zone_id) REFERENCES sil_ecommerce_zone (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_shipping_method ADD CONSTRAINT FK_38884A3D9DF894ED FOREIGN KEY (tax_category_id) REFERENCES sylius_tax_category (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_shipping_method_channels ADD CONSTRAINT FK_2D9833355F7D6850 FOREIGN KEY (shipping_method_id) REFERENCES sil_ecommerce_shipping_method (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_shipping_method_channels ADD CONSTRAINT FK_2D98333572F5A1AA FOREIGN KEY (channel_id) REFERENCES sil_ecommerce_channel (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_order_item ADD CONSTRAINT FK_3B9E646F8D9F6D38 FOREIGN KEY (order_id) REFERENCES sil_ecommerce_order (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_order_item ADD CONSTRAINT FK_3B9E646F3B69A9AF FOREIGN KEY (variant_id) REFERENCES sil_ecommerce_product_variant (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_channel ADD CONSTRAINT FK_56FF5835743BF776 FOREIGN KEY (default_locale_id) REFERENCES sylius_locale (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_channel ADD CONSTRAINT FK_56FF58353101778E FOREIGN KEY (base_currency_id) REFERENCES sylius_currency (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_channel ADD CONSTRAINT FK_56FF5835A978C17 FOREIGN KEY (default_tax_zone_id) REFERENCES sil_ecommerce_zone (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_channel_currencies ADD CONSTRAINT FK_AE491F9372F5A1AA FOREIGN KEY (channel_id) REFERENCES sil_ecommerce_channel (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_channel_currencies ADD CONSTRAINT FK_AE491F9338248176 FOREIGN KEY (currency_id) REFERENCES sylius_currency (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_channel_locales ADD CONSTRAINT FK_786B7A8472F5A1AA FOREIGN KEY (channel_id) REFERENCES sil_ecommerce_channel (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_channel_locales ADD CONSTRAINT FK_786B7A84E559DFD1 FOREIGN KEY (locale_id) REFERENCES sylius_locale (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_product_image ADD CONSTRAINT FK_B398DDE07E3C61F9 FOREIGN KEY (owner_id) REFERENCES sil_ecommerce_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_product_image ADD CONSTRAINT FK_B398DDE094F4B9F8 FOREIGN KEY (real_file_id) REFERENCES sil_media_file (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_product_image__product_variant ADD CONSTRAINT FK_31AFE0943DA5256D FOREIGN KEY (image_id) REFERENCES sil_ecommerce_product_image (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_product_image__product_variant ADD CONSTRAINT FK_31AFE0943B69A9AF FOREIGN KEY (variant_id) REFERENCES sil_ecommerce_product_variant (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_product_review ADD CONSTRAINT FK_22EB8A024584665A FOREIGN KEY (product_id) REFERENCES sil_ecommerce_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_product_review ADD CONSTRAINT FK_22EB8A02F675F31B FOREIGN KEY (author_id) REFERENCES sil_crm_organism (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_invoice ADD CONSTRAINT FK_6463C1368D9F6D38 FOREIGN KEY (order_id) REFERENCES sil_ecommerce_order (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_email_receipt ADD CONSTRAINT FK_8D82EC77A832C1C9 FOREIGN KEY (email_id) REFERENCES sil_email (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_email_link ADD CONSTRAINT FK_42DDE686A832C1C9 FOREIGN KEY (email_id) REFERENCES sil_email (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_seed_batch_certification_type ADD CONSTRAINT FK_F4F859A6F98F144A FOREIGN KEY (logo_id) REFERENCES sil_media_file (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_seed_batch_plot ADD CONSTRAINT FK_3C1B23A589B658FE FOREIGN KEY (producer_id) REFERENCES sil_crm_organism (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_seed_batch_certification ADD CONSTRAINT FK_E1C888BC680D0B01 FOREIGN KEY (plot_id) REFERENCES lisem_seed_batch_plot (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_seed_batch_certification ADD CONSTRAINT FK_E1C888BC90AF82A5 FOREIGN KEY (certification_type_id) REFERENCES lisem_seed_batch_certification_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_seed_batch_certification ADD CONSTRAINT FK_E1C888BC5A38D544 FOREIGN KEY (certifying_body_id) REFERENCES lisem_seed_batch_certifying_body (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety_description ADD CONSTRAINT FK_EB4FA25178C2BC47 FOREIGN KEY (variety_id) REFERENCES lisem_variety (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety_plant_category ADD CONSTRAINT FK_531DCCCEB381CA9B FOREIGN KEY (tree_root_id) REFERENCES lisem_variety_plant_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety_plant_category ADD CONSTRAINT FK_531DCCCEB5CEAE2F FOREIGN KEY (tree_parent_id) REFERENCES lisem_variety_plant_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_email ADD CONSTRAINT FK_70FD47F45DA0FB8 FOREIGN KEY (template_id) REFERENCES sil_email_template (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_email__file ADD CONSTRAINT FK_1FAFD3EBA832C1C9 FOREIGN KEY (email_id) REFERENCES sil_email (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_email__file ADD CONSTRAINT FK_1FAFD3EB93CB796C FOREIGN KEY (file_id) REFERENCES sil_media_file (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_sonata_user__group ADD CONSTRAINT FK_B17AB998A76ED395 FOREIGN KEY (user_id) REFERENCES sil_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_sonata_user__group ADD CONSTRAINT FK_B17AB998FE54D947 FOREIGN KEY (group_id) REFERENCES sil_sonata_group (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_crm_organism ADD CONSTRAINT FK_BE8AE39A12469DE2 FOREIGN KEY (category_id) REFERENCES sil_crm_category (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_crm_organism ADD CONSTRAINT FK_BE8AE39A3D371385 FOREIGN KEY (default_phone_id) REFERENCES sil_crm_organism_phone (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_crm_organism ADD CONSTRAINT FK_BE8AE39ABD94FB16 FOREIGN KEY (default_address_id) REFERENCES sil_crm_address (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_crm_organism__circle ADD CONSTRAINT FK_C518F6FF70EE2FF6 FOREIGN KEY (circle_id) REFERENCES sil_crm_organism (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_crm_organism__circle ADD CONSTRAINT FK_C518F6FF64180A36 FOREIGN KEY (organism_id) REFERENCES sil_crm_circle (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_media_file ADD CONSTRAINT FK_A49FB6317E3C61F9 FOREIGN KEY (owner_id) REFERENCES sil_ecommerce_product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_crm_address ADD CONSTRAINT FK_B25DF77964180A36 FOREIGN KEY (organism_id) REFERENCES sil_crm_organism (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_product ADD CONSTRAINT FK_274CD2DF731E505 FOREIGN KEY (main_taxon_id) REFERENCES sil_ecommerce_taxon (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_product ADD CONSTRAINT FK_274CD2DF78C2BC47 FOREIGN KEY (variety_id) REFERENCES lisem_variety (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_channels ADD CONSTRAINT FK_F9EF269B4584665A FOREIGN KEY (product_id) REFERENCES sil_ecommerce_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_channels ADD CONSTRAINT FK_F9EF269B72F5A1AA FOREIGN KEY (channel_id) REFERENCES sil_ecommerce_channel (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_options ADD CONSTRAINT FK_2B5FF0094584665A FOREIGN KEY (product_id) REFERENCES sil_ecommerce_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_options ADD CONSTRAINT FK_2B5FF009A7C41D6F FOREIGN KEY (option_id) REFERENCES sil_ecommerce_product_option (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety ADD CONSTRAINT FK_FA584188727ACA70 FOREIGN KEY (parent_id) REFERENCES lisem_variety (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety ADD CONSTRAINT FK_FA584188B2A1D860 FOREIGN KEY (species_id) REFERENCES lisem_variety_species (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety ADD CONSTRAINT FK_FA584188B03A8386 FOREIGN KEY (created_by_id) REFERENCES sil_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety ADD CONSTRAINT FK_FA584188896DBBDE FOREIGN KEY (updated_by_id) REFERENCES sil_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety__plant_category ADD CONSTRAINT FK_E630DBC09C0B5A8 FOREIGN KEY (plantCategory_id) REFERENCES lisem_variety (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety__plant_category ADD CONSTRAINT FK_E630DBC078C2BC47 FOREIGN KEY (variety_id) REFERENCES lisem_variety_plant_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety__product_option_value ADD CONSTRAINT FK_84D5A9CD4330BF8 FOREIGN KEY (productOptionValue_id) REFERENCES lisem_variety (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety__product_option_value ADD CONSTRAINT FK_84D5A9C78C2BC47 FOREIGN KEY (variety_id) REFERENCES sil_ecommerce_product_option_value (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety__file ADD CONSTRAINT FK_7A189C9078C2BC47 FOREIGN KEY (variety_id) REFERENCES lisem_variety (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety__file ADD CONSTRAINT FK_7A189C9093CB796C FOREIGN KEY (file_id) REFERENCES sil_media_file (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_product_variant ADD CONSTRAINT FK_6D11110F4584665A FOREIGN KEY (product_id) REFERENCES sil_ecommerce_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_product_variant ADD CONSTRAINT FK_6D11110F9DF894ED FOREIGN KEY (tax_category_id) REFERENCES sylius_tax_category (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_product_variant ADD CONSTRAINT FK_6D11110F9E2D1A41 FOREIGN KEY (shipping_category_id) REFERENCES sylius_shipping_category (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_variant_option_value ADD CONSTRAINT FK_76CDAFA13B69A9AF FOREIGN KEY (variant_id) REFERENCES sil_ecommerce_product_variant (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_variant_option_value ADD CONSTRAINT FK_76CDAFA1D957CA06 FOREIGN KEY (option_value_id) REFERENCES sil_ecommerce_product_option_value (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety_family ADD CONSTRAINT FK_C290C94DB03A8386 FOREIGN KEY (created_by_id) REFERENCES sil_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety_family ADD CONSTRAINT FK_C290C94D896DBBDE FOREIGN KEY (updated_by_id) REFERENCES sil_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_channel_description ADD CONSTRAINT FK_BD758AD72F5A1AA FOREIGN KEY (channel_id) REFERENCES sil_ecommerce_channel (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_channel_description ADD CONSTRAINT FK_BD758AD78C2BC47 FOREIGN KEY (variety_id) REFERENCES lisem_variety (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_order ADD CONSTRAINT FK_9B8F78BE72F5A1AA FOREIGN KEY (channel_id) REFERENCES sil_ecommerce_channel (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_order ADD CONSTRAINT FK_9B8F78BE17B24436 FOREIGN KEY (promotion_coupon_id) REFERENCES sylius_promotion_coupon (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_order ADD CONSTRAINT FK_9B8F78BE9395C3F3 FOREIGN KEY (customer_id) REFERENCES sil_crm_organism (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_order ADD CONSTRAINT FK_9B8F78BE4D4CFF2B FOREIGN KEY (shipping_address_id) REFERENCES sil_crm_address (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_order ADD CONSTRAINT FK_9B8F78BE79D0C0E4 FOREIGN KEY (billing_address_id) REFERENCES sil_crm_address (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_promotion_order ADD CONSTRAINT FK_BF9CF6FB8D9F6D38 FOREIGN KEY (order_id) REFERENCES sil_ecommerce_order (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_promotion_order ADD CONSTRAINT FK_BF9CF6FB139DF194 FOREIGN KEY (promotion_id) REFERENCES sylius_promotion (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety_genus ADD CONSTRAINT FK_9367CAF5C35E566A FOREIGN KEY (family_id) REFERENCES lisem_variety_family (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety_genus ADD CONSTRAINT FK_9367CAF5B03A8386 FOREIGN KEY (created_by_id) REFERENCES sil_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety_genus ADD CONSTRAINT FK_9367CAF5896DBBDE FOREIGN KEY (updated_by_id) REFERENCES sil_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_seed_batch ADD CONSTRAINT FK_B174DFF34B557494 FOREIGN KEY (seed_farm_id) REFERENCES lisem_seed_farm (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_seed_batch ADD CONSTRAINT FK_B174DFF3680D0B01 FOREIGN KEY (plot_id) REFERENCES lisem_seed_batch_plot (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_seed_batch ADD CONSTRAINT FK_B174DFF378C2BC47 FOREIGN KEY (variety_id) REFERENCES lisem_variety (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_seed_batch ADD CONSTRAINT FK_B174DFF389B658FE FOREIGN KEY (producer_id) REFERENCES sil_crm_organism (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_seed_batch__product_variant ADD CONSTRAINT FK_5AE6DF1F6B65DCB2 FOREIGN KEY (producVariant_id) REFERENCES lisem_seed_batch (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_seed_batch__product_variant ADD CONSTRAINT FK_5AE6DF1F5009B3C8 FOREIGN KEY (seedBatch_id) REFERENCES sil_ecommerce_product_variant (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_ecommerce_product_option_value ADD CONSTRAINT FK_31037854A7C41D6F FOREIGN KEY (option_id) REFERENCES sil_ecommerce_product_option (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety_species ADD CONSTRAINT FK_51BC34AB85C4074C FOREIGN KEY (genus_id) REFERENCES lisem_variety_genus (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety_species ADD CONSTRAINT FK_51BC34ABF5E25C30 FOREIGN KEY (parent_species_id) REFERENCES lisem_variety_species (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety_species ADD CONSTRAINT FK_51BC34ABB03A8386 FOREIGN KEY (created_by_id) REFERENCES sil_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety_species ADD CONSTRAINT FK_51BC34AB896DBBDE FOREIGN KEY (updated_by_id) REFERENCES sil_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety_species__category ADD CONSTRAINT FK_438EBCAFC2D8DA42 FOREIGN KEY (plant_category_id) REFERENCES lisem_variety_species (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_variety_species__category ADD CONSTRAINT FK_438EBCAFB2A1D860 FOREIGN KEY (species_id) REFERENCES lisem_variety_plant_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE blast_custom_filter ADD CONSTRAINT FK_854D7261A76ED395 FOREIGN KEY (user_id) REFERENCES sil_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_email__circle ADD CONSTRAINT FK_F39FD8C870EE2FF6 FOREIGN KEY (circle_id) REFERENCES sil_crm_circle (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_email__circle ADD CONSTRAINT FK_F39FD8C8A832C1C9 FOREIGN KEY (email_id) REFERENCES sil_email (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_user__group ADD CONSTRAINT FK_D1F2670BA76ED395 FOREIGN KEY (user_id) REFERENCES sil_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_user__group ADD CONSTRAINT FK_D1F2670BFE54D947 FOREIGN KEY (group_id) REFERENCES sil_user_group (id) NOT DEFERRABLE INITIALLY IMMEDIATE');

        $this->addSql('CREATE SEQUENCE blast_session_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE blast_session (id INT NOT NULL, session_id VARCHAR(255) NOT NULL, data BYTEA DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, expires_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX blast_session_session_id_index ON blast_session (session_id)');

        $this->addSql('ALTER TABLE lisem_seed_batch ADD original_code VARCHAR(255) DEFAULT NULL');

        $this->addSql('ALTER TABLE sil_stock_batch DISABLE TRIGGER ALL');
        $this->addSql('DELETE FROM sil_stock_batch');
        $this->addSql('ALTER TABLE sil_stock_location DISABLE TRIGGER ALL');
        $this->addSql('DELETE FROM sil_stock_location');
        $this->addSql('ALTER TABLE sil_stock_movement DISABLE TRIGGER ALL');
        $this->addSql('DELETE FROM sil_stock_movement');
        $this->addSql('ALTER TABLE sil_stock_operation DISABLE TRIGGER ALL');
        $this->addSql('DELETE FROM sil_stock_operation');
        if ($schema->hasTable('sil_stock_operation_type')) {
            $this->addSql('ALTER TABLE sil_stock_operation_type DISABLE TRIGGER ALL');
            $this->addSql('DELETE FROM sil_stock_operation_type');
        }
        $this->addSql('ALTER TABLE sil_stock_output_strategy DISABLE TRIGGER ALL');
        $this->addSql('DELETE FROM sil_stock_output_strategy');
        $this->addSql('ALTER TABLE sil_stock_partner DISABLE TRIGGER ALL');
        $this->addSql('DELETE FROM sil_stock_partner');
        $this->addSql('ALTER TABLE sil_stock_stock_item DISABLE TRIGGER ALL');
        $this->addSql('DELETE FROM sil_stock_stock_item');
        $this->addSql('ALTER TABLE sil_stock_stock_unit DISABLE TRIGGER ALL');
        $this->addSql('DELETE FROM sil_stock_stock_unit');
        $this->addSql('ALTER TABLE sil_stock_uom DISABLE TRIGGER ALL');
        $this->addSql('DELETE FROM sil_stock_uom');
        $this->addSql('ALTER TABLE sil_stock_uom_type DISABLE TRIGGER ALL');
        $this->addSql('DELETE FROM sil_stock_uom_type');
        $this->addSql('ALTER TABLE sil_stock_warehouse DISABLE TRIGGER ALL');
        $this->addSql('DELETE FROM sil_stock_warehouse');

        $this->addSql('ALTER TABLE blast_custom_filter DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO blast_custom_filter SELECT * FROM blast_custom_filters');
        $this->addSql('INSERT INTO lisem_channel_description SELECT * FROM channel_description');
        $this->addSql('INSERT INTO sil_crm_country SELECT * FROM librinfo_crm_country');

        $this->addSql('ALTER TABLE sil_crm_organism DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_crm_organism (
                id,
                category_id,
                default_phone_id,
                default_address_id,
                firstname,
                lastname,
                shortname,
                title,
                flash_on_control,
                family_contact,
                culture,
                url,
                administrative_number,
                is_individual,
                is_customer,
                customer_code,
                is_supplier,
                supplier_code,
                iban,
                vat,
                vat_verified,
                alert,
                active,
                catalogue_sent,
                last_catalogue_sent_date,
                first_catalogue_sent_date,
                catalogue_send_mean,
                catalogue_type,
                source,
                name,
                email,
                email_npai,
                email_no_newsletter,
                seed_producer_code,
                seed_producer,
                email_canonical,
                description,
                created_at,
                updated_at
            ) SELECT
                id,
                category_id,
                default_phone_id,
                default_address_id,
                firstname,
                lastname,
                shortname,
                title,
                flash_on_control,
                family_contact,
                culture,
                url,
                administrative_number,
                is_individual,
                is_customer,
                customer_code,
                is_supplier,
                supplier_code,
                iban,
                vat,
                vat_verified,
                alert,
                active,
                catalogue_sent,
                last_catalogue_sent_date,
                first_catalogue_sent_date,
                catalogue_send_mean,
                catalogue_type,
                source,
                name,
                email,
                email_npai,
                email_no_newsletter,
                seedproducercode,
                seedproducer,
                emailcanonical,
                description,
                created_at,
                updated_at
            FROM librinfo_crm_organism');
        $this->addSql('INSERT INTO sil_crm_city SELECT * FROM librinfo_crm_city');

        $this->addSql('INSERT INTO sil_crm_circle (
                id,
                code,
                color,
                type,
                translatable,
                editable,
                description,
                name,
                created_at,
                updated_at
            ) SELECT
                id,
                code,
                color,
                type,
                translatable,
                editable,
                description,
                name,
                created_at,
                updated_at
            FROM librinfo_crm_circle');

        $this->addSql('INSERT INTO sil_crm_address (
                id,
                organism_id,
                first_name,
                last_name,
                post_code,
                street,
                city,
                country_code,
                province_code,
                province_name,
                npai,
                vcard_uid,
                confirmed,
                created_at,
                updated_at
            ) SELECT
                id,
                organism_id,
                first_name,
                last_name,
                post_code,
                street,
                city,
                country_code,
                province_code,
                province_name,
                npai,
                vcard_uid,
                confirmed,
                created_at,
                updated_at
            FROM librinfo_crm_address');

        $this->addSql('INSERT INTO sil_crm_category (
                id,
                tree_root_id,
                tree_parent_id,
                tree_lft,
                tree_rgt,
                tree_lvl,
                name
            ) SELECT
                id,
                tree_root_id,
                tree_parent_id,
                tree_lft,
                tree_rgt,
                tree_lvl,
                name
            FROM librinfo_crm_category');
        $this->addSql('INSERT INTO sil_crm_organism__circle SELECT * FROM librinfo_crm_organism__circle');
        $this->addSql('INSERT INTO sil_crm_organism_group SELECT * FROM librinfo_crm_organismgroup');
        $this->addSql('INSERT INTO sil_crm_organism_phone SELECT * FROM librinfo_crm_organismphone');
        $this->addSql('INSERT INTO sil_crm_phone_type SELECT * FROM librinfo_crm_phonetype');

        $this->addSql('ALTER TABLE sil_crm_position DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_crm_position (
                id,
                position_type_id,
                individual_id,
                organization_id,
                phone,
                department,
                description,
                label,
                email,
                email_npai,
                email_no_newsletter,
                created_at,
                updated_at
            ) SELECT
                id,
                position_type_id,
                individual_id,
                organization_id,
                phone,
                department,
                description,
                label,
                email,
                email_npai,
                email_no_newsletter,
                created_at,
                updated_at
            FROM librinfo_crm_position');

        $this->addSql('INSERT INTO sil_crm_position__circle SELECT * FROM librinfo_crm_position__circle');
        $this->addSql('ALTER TABLE sylius_channel_locales DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sylius_channel_locales SELECT * FROM librinfo_ecommerce_channel__locale');
        $this->addSql('INSERT INTO sil_crm_position_type SELECT * FROM librinfo_crm_positiontype');
        $this->addSql('ALTER TABLE sil_ecommerce_order DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_ecommerce_order (
                id,
                channel_id,
                promotion_coupon_id,
                customer_id,
                shipping_address_id,
                billing_address_id,
                number,
                notes,
                state,
                checkout_completed_at,
                items_total,
                adjustments_total,
                total,
                created_at,
                updated_at,
                currency_code,
                locale_code,
                checkout_state,
                payment_state,
                shipping_state,
                token_value,
                customer_ip
            ) SELECT
                id,
                channel_id,
                promotion_coupon_id,
                customer_id,
                shipping_address_id,
                billing_address_id,
                number,
                notes,
                state,
                checkout_completed_at,
                items_total,
                adjustments_total,
                total,
                created_at,
                updated_at,
                currency_code,
                locale_code,
                checkout_state,
                payment_state,
                shipping_state,
                token_value,
                customer_ip
            FROM librinfo_ecommerce_order');

        $this->addSql('INSERT INTO sil_crm_province SELECT * FROM librinfo_crm_province');
        $this->addSql('INSERT INTO sil_crm_role SELECT * FROM librinfo_crm_role');
        $this->addSql('INSERT INTO sil_ecommerce_product_attribute SELECT * FROM librinfo_ecommerce_productattribute');
        $this->addSql('ALTER TABLE sylius_product_channels DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sylius_product_channels SELECT * FROM librinfo_ecommerce_product__channel');

        $this->addSql('ALTER TABLE sil_ecommerce_product_variant DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_ecommerce_product_variant (
                id,
                product_id,
                tax_category_id,
                shipping_category_id,
                code,
                created_at,
                updated_at,
                position,
                version,
                on_hold,
                on_hand,
                tracked,
                width,
                height,
                depth,
                weight,
                shipping_required,
                enabled
            ) SELECT
                id,
                product_id,
                tax_category_id,
                shipping_category_id,
                code,
                created_at,
                updated_at,
                position,
                version,
                on_hold,
                on_hand,
                tracked,
                width,
                height,
                depth,
                weight,
                shipping_required,
                enabled
            FROM librinfo_ecommerce_productvariant');
        $this->addSql('ALTER TABLE sil_ecommerce_product_image DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_ecommerce_product_image SELECT * FROM librinfo_ecommerce_productimage');
        $this->addSql('ALTER TABLE sil_ecommerce_product_option DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_ecommerce_product_option SELECT * FROM librinfo_ecommerce_productoption');
        $this->addSql('ALTER TABLE sil_ecommerce_product_option_value DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_ecommerce_product_option_value SELECT * FROM librinfo_ecommerce_productoptionvalue');
        $this->addSql('ALTER TABLE sylius_shipping_method_channels DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sylius_shipping_method_channels SELECT * FROM librinfo_ecommerce_shippingmethod__channel');
        $this->addSql('ALTER TABLE sil_ecommerce_product_review DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_ecommerce_product_review SELECT * FROM librinfo_ecommerce_productreview');
        $this->addSql('ALTER TABLE sil_ecommerce_payment DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_ecommerce_payment SELECT * FROM librinfo_ecommerce_payment');
        $this->addSql('ALTER TABLE sil_ecommerce_product_image__product_variant DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_ecommerce_product_image__product_variant SELECT * FROM librinfo_ecommerce_productimage__productvariant');
        $this->addSql('ALTER TABLE sil_ecommerce_zone DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_ecommerce_zone SELECT * FROM librinfo_ecommerce_zone');
        $this->addSql('ALTER TABLE sil_email DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_email (
                id,
                template_id,
                message,
                message_id,
                status,
                environment,
                field_from,
                field_to,
                field_cc,
                field_bcc,
                field_subject,
                content,
                text_content,
                sent,
                tracking,
                created_at,
                updated_at
            ) SELECT
                id,
                template_id,
                message,
                message_id,
                status,
                environment,
                field_from,
                field_to,
                field_cc,
                field_bcc,
                field_subject,
                content,
                text_content,
                sent,
                tracking,
                created_at,
                updated_at
            FROM librinfo_email_email');
        $this->addSql('ALTER TABLE sil_email_link DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_email_link SELECT * FROM librinfo_email_emaillink');
        $this->addSql('ALTER TABLE sil_email__file DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_email__file SELECT * FROM librinfo_email_email__file');
        $this->addSql('ALTER TABLE sil_ecommerce_tax_rate DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_ecommerce_tax_rate SELECT * FROM librinfo_ecommerce_taxrate');
        $this->addSql('ALTER TABLE sil_email_template DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_email_template (
                id,
                name,
                content,
                created_at,
                updated_at
            ) SELECT
                id,
                name,
                content,
                created_at,
                updated_at
            FROM librinfo_email_emailtemplate');
        $this->addSql('ALTER TABLE lisem_seed_batch_certifying_body DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO lisem_seed_batch_certifying_body (
                id,
                code,
                url,
                description,
                name,
                created_at,
                updated_at,
                address,
                zip,
                city,
                country,
                npai,
                vcard_uid,
                confirmed
            ) SELECT
                id,
                code,
                url,
                description,
                name,
                created_at,
                updated_at,
                address,
                zip,
                city,
                country,
                npai,
                vcard_uid,
                confirmed
            FROM librinfo_seedbatch_certifyingbody');
        $this->addSql('ALTER TABLE lisem_seed_batch_plot DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO lisem_seed_batch_plot (
                id,
                producer_id,
                code,
                description,
                name,
                created_at,
                updated_at,
                address,
                zip,
                city,
                country,
                npai,
                vcard_uid,
                confirmed
            ) SELECT
                id,
                producer_id,
                code,
                description,
                name,
                created_at,
                updated_at,
                address,
                zip,
                city,
                country,
                npai,
                vcard_uid,
                confirmed
            FROM librinfo_seedbatch_plot');
        $this->addSql('ALTER TABLE sil_email_receipt DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_email_receipt SELECT * FROM librinfo_email_emailreceipt');
        $this->addSql('ALTER TABLE lisem_seed_batch_certification DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO lisem_seed_batch_certification (
                id,
                plot_id,
                certification_type_id,
                certifying_body_id,
                code,
                certification_date,
                start_date,
                expiry_date,
                url,
                description,
                created_at,
                updated_at
            ) SELECT
                id,
                plot_id,
                certification_type_id,
                certifying_body_id,
                code,
                certification_date,
                start_date,
                expiry_date,
                url,
                description,
                created_at,
                updated_at
            FROM librinfo_seedbatch_certification');
        $this->addSql('ALTER TABLE sil_media_file DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_media_file SELECT * FROM librinfo_media_file');
        $this->addSql('ALTER TABLE lisem_seed_batch_certification_type DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO lisem_seed_batch_certification_type (
                id,
                logo_id,
                code,
                description,
                name,
                created_at,
                updated_at
            ) SELECT
                id,
                logo_id,
                code,
                description,
                name,
                created_at,
                updated_at
            FROM librinfo_seedbatch_certificationtype');
        $this->addSql('ALTER TABLE sil_sonata_group DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_sonata_group SELECT * FROM librinfo_sonatasyliususer_sonatagroup');
        $this->addSql('ALTER TABLE lisem_variety_family DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO lisem_variety_family SELECT * FROM librinfo_varieties_family');
        $this->addSql('ALTER TABLE lisem_seed_batch DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO lisem_seed_batch (
                id,
                seed_farm_id,
                plot_id,
                variety_id,
                producer_id,
                code,
                batch_number,
                production_year,
                germination_rate,
                germination_date,
                tkw,
                tkw_date,
                certifications,
                gross_producer_weight,
                gross_delivered_weight,
                net_screened_weight,
                to_screen_weight,
                delivery_date,
                delivery_note,
                description,
                created_at,
                updated_at
            ) SELECT
                id,
                seed_farm_id,
                plot_id,
                variety_id,
                producer_id,
                code,
                batch_number,
                production_year,
                germination_rate,
                germination_date,
                tkw,
                tkw_date,
                certifications,
                gross_producer_weight,
                gross_delivered_weight,
                net_screened_weight,
                to_screen_weight,
                delivery_date,
                delivery_note,
                description,
                created_at,
                updated_at
            FROM librinfo_seedbatch_seedbatch');
        $this->addSql('ALTER TABLE lisem_variety_plant_category DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO lisem_variety_plant_category (
                id,
                tree_root_id,
                tree_parent_id,
                code,
                tree_lft,
                tree_rgt,
                tree_lvl,
                name
            ) SELECT
                id,
                tree_root_id,
                tree_parent_id,
                code,
                tree_lft,
                tree_rgt,
                tree_lvl,
                name
            FROM librinfo_varieties_plantcategory');
        $this->addSql('ALTER TABLE lisem_seed_farm DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO lisem_seed_farm (
                id,
                code,
                description,
                name,
                created_at,
                updated_at,
                address,
                zip,
                city,
                country,
                npai,
                vcard_uid,
                confirmed
            ) SELECT
                id,
                code,
                description,
                name,
                created_at,
                updated_at,
                address,
                zip,
                city,
                country,
                npai,
                vcard_uid,
                confirmed
            FROM librinfo_seedbatch_seedfarm');
        $this->addSql('ALTER TABLE sil_user DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_user SELECT * FROM librinfo_sonatasyliususer_sonatauser');
        $this->addSql('ALTER TABLE sil_sonata_user__group DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_sonata_user__group SELECT * FROM librinfo_sonatasyliususer_sonatauser__sonatagroup');
        $this->addSql('ALTER TABLE lisem_variety_species DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO lisem_variety_species SELECT * FROM librinfo_varieties_species');
        $this->addSql('ALTER TABLE lisem_variety_genus DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO lisem_variety_genus SELECT * FROM librinfo_varieties_genus');
        $this->addSql('ALTER TABLE lisem_variety_species__category DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO lisem_variety_species__category SELECT * FROM librinfo_varieties_species__plantcategory');
        $this->addSql('ALTER TABLE lisem_variety__file DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO lisem_variety__file SELECT * FROM librinfo_varieties_variety__file');
        $this->addSql('ALTER TABLE lisem_variety DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO lisem_variety SELECT * FROM librinfo_varieties_variety');
        $this->addSql('ALTER TABLE lisem_variety__product_option_value DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO lisem_variety__product_option_value SELECT * FROM librinfo_varieties_variety__productoptionvalue');
        if ($schema->hasTable('lisem_migration_versions')) {
            $this->addSql('ALTER TABLE lisem_migration_versions DISABLE TRIGGER ALL');
            $this->addSql('INSERT INTO lisem_migration_versions SELECT * FROM migration_versions');
        }
        $this->addSql('ALTER TABLE blast_select_choice DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO blast_select_choice SELECT * FROM select_choice');
        $this->addSql('ALTER TABLE sil_stock_item DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_stock_item SELECT * FROM sil_stock_stock_item');
        $this->addSql('ALTER TABLE lisem_variety_plant_category DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO lisem_variety_plant_category SELECT * FROM librinfo_varieties_variety__plantcategory');
        $this->addSql('ALTER TABLE sil_stock_unit DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_stock_unit SELECT * FROM sil_stock_stock_unit');
        $this->addSql('ALTER TABLE sil_ecommerce_shipping_method DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_ecommerce_shipping_method SELECT * FROM sylius_shipping_method');
        $this->addSql('ALTER TABLE sylius_product_options DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sylius_product_options SELECT * FROM librinfo_ecommerce_product__productoption');
        $this->addSql('ALTER TABLE sil_crm_organsim_group__role DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_crm_organsim_group__role SELECT * FROM librinfo_crm_organismgroup__role');
        $this->addSql('ALTER TABLE sil_ecommerce_product DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_ecommerce_product SELECT * FROM librinfo_ecommerce_product');
        $this->addSql('ALTER TABLE sil_ecommerce_invoice DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_ecommerce_invoice SELECT * FROM librinfo_ecommerce_invoice');
        $this->addSql('ALTER TABLE lisem_variety_description DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO lisem_variety_description SELECT * FROM librinfo_varieties_varietydescription');
        $this->addSql('ALTER TABLE sil_ecommerce_sales_journal_item DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_ecommerce_sales_journal_item (
                id,
                invoice_id,
                payment_id,
                order_id,
                operation_date,
                account,
                label,
                debit,
                credit
            ) SELECT
                id,
                invoice_id,
                payment_id,
                order_id,
                operation_date,
                account,
                label,
                debit,
                credit
             FROM librinfo_ecommerce_salesjournalitem');
        $this->addSql('ALTER TABLE sil_ecommerce_order_item DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_ecommerce_order_item SELECT * FROM librinfo_ecommerce_orderitem');
        $this->addSql('ALTER TABLE sil_ecommerce_taxon DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_ecommerce_taxon SELECT * FROM librinfo_ecommerce_taxon');
        $this->addSql('ALTER TABLE sil_ecommerce_channel DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sil_ecommerce_channel SELECT * FROM sylius_channel');
        $this->addSql('ALTER TABLE sylius_product_variant_option_value DISABLE TRIGGER ALL');
        $this->addSql('INSERT INTO sylius_product_variant_option_value SELECT * FROM librinfo_ecommerce_productvariant__productoptionvalue');
        $this->addSql('UPDATE sil_ecommerce_channel SET theme_name = \'sil/lisem-theme\' WHERE code = \'FR_WEB\'');

        $this->addSql('ALTER TABLE sil_stock_batch ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_stock_location ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_stock_movement ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_stock_operation ENABLE TRIGGER ALL');
        if ($schema->hasTable('sil_stock_operation_type')) {
            $this->addSql('ALTER TABLE sil_stock_operation_type ENABLE TRIGGER ALL');
        }
        $this->addSql('ALTER TABLE sil_stock_output_strategy ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_stock_partner ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_stock_stock_item ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_stock_stock_unit ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_stock_uom ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_stock_uom_type ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_stock_warehouse ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE blast_custom_filter ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_crm_organism ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_crm_position ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sylius_channel_locales ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_ecommerce_order ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sylius_product_channels ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_ecommerce_product_variant ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_ecommerce_product_image ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_ecommerce_product_option ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_ecommerce_product_option_value ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sylius_shipping_method_channels ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_ecommerce_product_review ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_ecommerce_payment ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_ecommerce_product_image__product_variant ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_ecommerce_zone ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_email ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_email_link ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_email__file ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_ecommerce_tax_rate ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_email_template ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE lisem_seed_batch_certifying_body ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE lisem_seed_batch_plot ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_email_receipt ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE lisem_seed_batch_certification ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_media_file ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE lisem_seed_batch_certification_type ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_sonata_group ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE lisem_variety_family ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE lisem_seed_batch ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE lisem_variety_plant_category ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE lisem_seed_farm ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_user ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_sonata_user__group ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE lisem_variety_species ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE lisem_variety_genus ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE lisem_variety_species__category ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE lisem_variety__file ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE lisem_variety ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE lisem_variety__product_option_value ENABLE TRIGGER ALL');
        if ($schema->hasTable('lisem_migration_versions')) {
            $this->addSql('ALTER TABLE lisem_migration_versions ENABLE TRIGGER ALL');
        }
        $this->addSql('ALTER TABLE blast_select_choice ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_stock_item ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE lisem_variety_plant_category ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_stock_unit ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_ecommerce_shipping_method ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sylius_product_options ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_crm_organsim_group__role ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_ecommerce_product ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_ecommerce_invoice ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE lisem_variety_description ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_ecommerce_sales_journal_item ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_ecommerce_order_item ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_ecommerce_taxon ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sil_ecommerce_channel ENABLE TRIGGER ALL');
        $this->addSql('ALTER TABLE sylius_product_variant_option_value ENABLE TRIGGER ALL');

        $this->addSql('DROP TABLE channel_description');
        $this->addSql('DROP TABLE lexik_trans_unit');
        $this->addSql('DROP TABLE librinfo_crm_country');
        $this->addSql('DROP TABLE lexik_translation_file');
        $this->addSql('DROP TABLE librinfo_crm_address');
        $this->addSql('DROP TABLE librinfo_crm_circle');
        $this->addSql('DROP TABLE lexik_trans_unit_translations');
        $this->addSql('DROP TABLE librinfo_crm_city');
        $this->addSql('DROP TABLE librinfo_crm_organism');
        $this->addSql('DROP TABLE librinfo_crm_category');
        $this->addSql('DROP TABLE blast_custom_filters');
        $this->addSql('DROP TABLE librinfo_crm_organism__circle');
        $this->addSql('DROP TABLE librinfo_crm_organismphone');
        $this->addSql('DROP TABLE librinfo_crm_phonetype');
        $this->addSql('DROP TABLE librinfo_crm_role');
        $this->addSql('DROP TABLE librinfo_crm_position__circle');
        $this->addSql('DROP TABLE librinfo_crm_organismsearchindex');
        $this->addSql('DROP TABLE librinfo_crm_province');
        $this->addSql('DROP TABLE librinfo_crm_positiontype');
        $this->addSql('DROP TABLE librinfo_ecommerce_channel__currency');
        $this->addSql('DROP TABLE librinfo_ecommerce_channel__locale');
        $this->addSql('DROP TABLE librinfo_ecommerce_product__channel');
        $this->addSql('DROP TABLE librinfo_ecommerce_invoice');
        $this->addSql('DROP TABLE librinfo_ecommerce_customergroup');
        $this->addSql('DROP TABLE librinfo_ecommerce_orderitem');
        $this->addSql('DROP TABLE librinfo_ecommerce_product');
        $this->addSql('DROP TABLE librinfo_ecommerce_productattribute');
        $this->addSql('DROP TABLE librinfo_ecommerce_order__promotion');
        $this->addSql('DROP TABLE librinfo_ecommerce_productimage');
        $this->addSql('DROP TABLE librinfo_ecommerce_productoption');
        $this->addSql('DROP TABLE librinfo_ecommerce_productreview');
        $this->addSql('DROP TABLE librinfo_ecommerce_productimage__productvariant');
        $this->addSql('DROP TABLE librinfo_ecommerce_productvariant__productoptionvalue');
        $this->addSql('DROP TABLE librinfo_ecommerce_productvariant__seedbatch');
        $this->addSql('DROP TABLE librinfo_ecommerce_shippingmethod__channel');
        $this->addSql('DROP TABLE librinfo_email_emailtemplate');
        $this->addSql('DROP TABLE librinfo_ecommerce_zone');
        $this->addSql('DROP TABLE librinfo_email_email__position');
        $this->addSql('DROP TABLE librinfo_email_email');
        $this->addSql('DROP TABLE librinfo_email_emaillink');
        $this->addSql('DROP TABLE librinfo_ecommerce_taxrate');
        $this->addSql('DROP TABLE librinfo_email_emailsearchindex');
        $this->addSql('DROP TABLE librinfo_email_email__file');
        $this->addSql('DROP TABLE librinfo_ecommerce_salesjournalitem');
        $this->addSql('DROP TABLE librinfo_email_emailreceipt');
        $this->addSql('DROP TABLE librinfo_email_email__circle');
        $this->addSql('DROP TABLE librinfo_email_email__organism');
        $this->addSql('DROP TABLE librinfo_seedbatch_certifyingbody');
        $this->addSql('DROP TABLE librinfo_seedbatch_seedbatch');
        $this->addSql('DROP TABLE librinfo_email_emailtemplatesearchindex');
        $this->addSql('DROP TABLE librinfo_media_file');
        $this->addSql('DROP TABLE librinfo_seedbatch_certificationtype');
        $this->addSql('DROP TABLE librinfo_sonatasyliususer_sonatagroup');
        $this->addSql('DROP TABLE librinfo_sonatasyliususer_sonatauser__sonatagroup');
        $this->addSql('DROP TABLE librinfo_seedbatch_seedbatchsearchindex');
        $this->addSql('DROP TABLE librinfo_varieties_variety__productoptionvalue');
        $this->addSql('DROP TABLE librinfo_varieties_plantcategory');
        $this->addSql('DROP TABLE librinfo_varieties_species__plantcategory');
        $this->addSql('DROP TABLE migration_versions');
        $this->addSql('DROP TABLE select_choice');
        $this->addSql('DROP TABLE librinfo_varieties_species');
        $this->addSql('DROP TABLE sf_session');
        if ($schema->hasTable('sil_stock_operation_type')) {
            $this->addSql('DROP TABLE sil_stock_operation_type');
        }
        $this->addSql('DROP TABLE sil_stock_stock_item');
        $this->addSql('DROP TABLE sil_stock_stock_unit');
        $this->addSql('DROP TABLE sylius_shipping_method');
        $this->addSql('DROP TABLE librinfo_seedbatch_plotsearchindex');
        $this->addSql('DROP TABLE librinfo_ecommerce_productvariant');
        $this->addSql('DROP TABLE sylius_channel');
        $this->addSql('DROP TABLE librinfo_varieties_varietydescription');
        $this->addSql('DROP TABLE librinfo_crm_positionsearchindex');
        $this->addSql('DROP TABLE librinfo_seedbatch_seedfarm');
        $this->addSql('DROP TABLE librinfo_ecommerce_product__productoption');
        $this->addSql('DROP TABLE librinfo_ecommerce_order');
        $this->addSql('DROP TABLE librinfo_ecommerce_productoptionvalue');
        $this->addSql('DROP TABLE librinfo_crm_organismgroup__role');
        $this->addSql('DROP TABLE librinfo_seedbatch_certification');
        $this->addSql('DROP TABLE librinfo_sonatasyliususer_sonatauser');
        $this->addSql('DROP TABLE librinfo_varieties_variety__file');
        $this->addSql('DROP TABLE librinfo_ecommerce_taxon');
        $this->addSql('DROP TABLE librinfo_crm_addresssearchindex');
        $this->addSql('DROP TABLE librinfo_seedbatch_plot');
        $this->addSql('DROP TABLE librinfo_crm_organismgroup');
        $this->addSql('DROP TABLE librinfo_crm_circle__sonatauser');
        $this->addSql('DROP TABLE librinfo_ecommerce_payment');
        $this->addSql('DROP TABLE librinfo_varieties_variety');
        $this->addSql('DROP TABLE librinfo_crm_position');
        $this->addSql('DROP TABLE librinfo_varieties_variety__plantcategory');
        $this->addSql('DROP TABLE librinfo_varieties_family');
        $this->addSql('DROP TABLE librinfo_varieties_genus');
        $this->addSql('COMMENT ON COLUMN sylius_product_attribute_value.json_value IS \'(DC2Type:json_array)\'');
        $this->addSql('ALTER TABLE sylius_product_attribute_value ADD CONSTRAINT FK_8A053E544584665A FOREIGN KEY (product_id) REFERENCES sil_ecommerce_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_attribute_value ADD CONSTRAINT FK_8A053E54B6E62EFA FOREIGN KEY (attribute_id) REFERENCES sil_ecommerce_product_attribute (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_option_value_translation ADD CONSTRAINT FK_8D4382DC2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sil_ecommerce_product_option_value (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_attribute_translation ADD CONSTRAINT FK_93850EBA2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sil_ecommerce_product_attribute (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_option_translation ADD CONSTRAINT FK_CBA491AD2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sil_ecommerce_product_option (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_association ADD CONSTRAINT FK_48E9CDAB4584665A FOREIGN KEY (product_id) REFERENCES sil_ecommerce_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_association_product ADD CONSTRAINT FK_A427B9834584665A FOREIGN KEY (product_id) REFERENCES sil_ecommerce_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_variant_translation ADD CONSTRAINT FK_8DC18EDC2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sil_ecommerce_product_variant (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_movement ADD CONSTRAINT FK_78749426217A674B FOREIGN KEY (stockitem_id) REFERENCES sil_stock_item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        if ($schema->hasTable('sil_stock_operation') && !$schema->getTable('sil_stock_operation')->hasColumn('type_value')) {
            $this->addSql('ALTER TABLE sil_stock_operation ADD type_value VARCHAR(64) NOT NULL');
        }
        $this->addSql('ALTER TABLE sil_manufacturing_bom_line ADD CONSTRAINT FK_1E754391217A674B FOREIGN KEY (stockitem_id) REFERENCES sil_stock_item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_manufacturing_bom ADD CONSTRAINT FK_6A250C85217A674B FOREIGN KEY (stockitem_id) REFERENCES sil_stock_item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_adjustment ADD CONSTRAINT FK_ACA6E0F28D9F6D38 FOREIGN KEY (order_id) REFERENCES sil_ecommerce_order (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_adjustment ADD CONSTRAINT FK_ACA6E0F2E415FB15 FOREIGN KEY (order_item_id) REFERENCES sil_ecommerce_order_item (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_shipping_method_translation ADD CONSTRAINT FK_2B37DB3D2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sil_ecommerce_shipping_method (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_zone_member ADD CONSTRAINT FK_E8B5ABF34B0E929B FOREIGN KEY (belongs_to) REFERENCES sil_ecommerce_zone (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_taxon_translation ADD CONSTRAINT FK_1487DFCF2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sil_ecommerce_taxon (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_user_oauth ADD CONSTRAINT FK_C3471B78A76ED395 FOREIGN KEY (user_id) REFERENCES sylius_shop_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_shipment ADD CONSTRAINT FK_FD707B3319883967 FOREIGN KEY (method_id) REFERENCES sil_ecommerce_shipping_method (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_shipment ADD CONSTRAINT FK_FD707B338D9F6D38 FOREIGN KEY (order_id) REFERENCES sil_ecommerce_order (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_shop_user ADD CONSTRAINT FK_7C2B74809395C3F3 FOREIGN KEY (customer_id) REFERENCES sil_crm_organism (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_promotion_channels ADD CONSTRAINT FK_1A044F6472F5A1AA FOREIGN KEY (channel_id) REFERENCES sil_ecommerce_channel (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_order_item_unit ADD CONSTRAINT FK_82BF226EE415FB15 FOREIGN KEY (order_item_id) REFERENCES sil_ecommerce_order_item (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_channel_pricing ADD CONSTRAINT FK_7801820CA80EF684 FOREIGN KEY (product_variant_id) REFERENCES sil_ecommerce_product_variant (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_translation ADD CONSTRAINT FK_105A9082C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sil_ecommerce_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_taxon_image ADD CONSTRAINT FK_DBE52B287E3C61F9 FOREIGN KEY (owner_id) REFERENCES sil_ecommerce_taxon (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_payment_method_channels ADD CONSTRAINT FK_543AC0CC72F5A1AA FOREIGN KEY (channel_id) REFERENCES sil_ecommerce_channel (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_taxon ADD CONSTRAINT FK_169C6CD94584665A FOREIGN KEY (product_id) REFERENCES sil_ecommerce_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_taxon ADD CONSTRAINT FK_169C6CD9DE13F470 FOREIGN KEY (taxon_id) REFERENCES sil_ecommerce_taxon (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_admin_api_access_token ADD CONSTRAINT FK_2AA4915DA76ED395 FOREIGN KEY (user_id) REFERENCES sylius_admin_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_admin_api_refresh_token ADD CONSTRAINT FK_9160E3FAA76ED395 FOREIGN KEY (user_id) REFERENCES sylius_admin_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_admin_api_auth_code ADD CONSTRAINT FK_E366D848A76ED395 FOREIGN KEY (user_id) REFERENCES sylius_admin_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('COMMENT ON COLUMN sylius_gateway_config.config IS \'(DC2Type:json_array)\'');

        $this->addSql('CREATE TABLE sil_uom (id UUID NOT NULL, uom_type_id UUID DEFAULT NULL, name VARCHAR(255) NOT NULL, factor NUMERIC(15, 5) NOT NULL, rounding INT NOT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_23E70ED4BD14C4D4 ON sil_uom (uom_type_id)');
        $this->addSql('CREATE TABLE sil_uom_type (id UUID NOT NULL, name VARCHAR(64) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5F5538DC5E237E06 ON sil_uom_type (name)');
        $this->addSql('ALTER TABLE sil_uom ADD CONSTRAINT FK_23E70ED4BD14C4D4 FOREIGN KEY (uom_type_id) REFERENCES sil_uom_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_movement DROP CONSTRAINT FK_78749426210D48FE');
        $this->addSql('ALTER TABLE sil_stock_movement ADD CONSTRAINT FK_78749426210D48FE FOREIGN KEY (qty_uom_id) REFERENCES sil_uom (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_unit DROP CONSTRAINT FK_2EE60B65210D48FE');
        $this->addSql('ALTER TABLE sil_stock_unit ADD CONSTRAINT FK_2EE60B65210D48FE FOREIGN KEY (qty_uom_id) REFERENCES sil_uom (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_item DROP CONSTRAINT FK_ED462228A103EEB1');
        $this->addSql('ALTER TABLE sil_stock_item ADD CONSTRAINT FK_ED462228A103EEB1 FOREIGN KEY (uom_id) REFERENCES sil_uom (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_operation ADD CONSTRAINT FK_E8D9ED2E9393F8FE FOREIGN KEY (partner_id) REFERENCES sil_stock_partner (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_manufacturing_bom_line DROP CONSTRAINT FK_1E754391210D48FE');
        $this->addSql('ALTER TABLE sil_manufacturing_bom_line ADD CONSTRAINT FK_1E754391210D48FE FOREIGN KEY (qty_uom_id) REFERENCES sil_uom (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_manufacturing_bom DROP CONSTRAINT FK_6A250C85210D48FE');
        $this->addSql('ALTER TABLE sil_manufacturing_bom ADD CONSTRAINT FK_6A250C85210D48FE FOREIGN KEY (qty_uom_id) REFERENCES sil_uom (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP INDEX sil_crm_phone_type_sort_rank');
        $this->addSql('ALTER TABLE sil_crm_phone_type DROP sort_rank');
        $this->addSql('ALTER TABLE sil_email__circle DROP CONSTRAINT sil_email__circle_pkey');
        $this->addSql('ALTER TABLE sil_email__circle ADD PRIMARY KEY (email_id, circle_id)');
        $this->addSql('ALTER TABLE lisem_seed_batch ADD created_by_id UUID DEFAULT NULL');
        $this->addSql('ALTER TABLE lisem_seed_batch ADD updated_by_id UUID DEFAULT NULL');
        $this->addSql('ALTER TABLE lisem_seed_batch ADD CONSTRAINT FK_B174DFF3B03A8386 FOREIGN KEY (created_by_id) REFERENCES sil_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_seed_batch ADD CONSTRAINT FK_B174DFF3896DBBDE FOREIGN KEY (updated_by_id) REFERENCES sil_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_B174DFF3B03A8386 ON lisem_seed_batch (created_by_id)');
        $this->addSql('CREATE INDEX IDX_B174DFF3896DBBDE ON lisem_seed_batch (updated_by_id)');
        $this->addSql('ALTER TABLE lisem_seed_batch__product_variant DROP CONSTRAINT lisem_seed_batch__product_variant_pkey');
        $this->addSql('ALTER TABLE lisem_seed_batch__product_variant DROP CONSTRAINT FK_5AE6DF1F6B65DCB2');
        $this->addSql('ALTER TABLE lisem_seed_batch__product_variant DROP CONSTRAINT FK_5AE6DF1F5009B3C8');
        $this->addSql('ALTER TABLE lisem_seed_batch__product_variant ADD CONSTRAINT FK_5AE6DF1F6B65DCB2 FOREIGN KEY (producVariant_id) REFERENCES sil_ecommerce_product_variant (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_seed_batch__product_variant ADD CONSTRAINT FK_5AE6DF1F5009B3C8 FOREIGN KEY (seedBatch_id) REFERENCES lisem_seed_batch (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lisem_seed_batch__product_variant ADD PRIMARY KEY (seedBatch_id, producVariant_id)');
    }

    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE sil_stock_movement DROP CONSTRAINT FK_78749426217A674B');
        $this->addSql('ALTER TABLE sil_stock_unit DROP CONSTRAINT FK_2EE60B65217A674B');
        $this->addSql('ALTER TABLE sil_manufacturing_bom_line DROP CONSTRAINT FK_1E754391217A674B');
        $this->addSql('ALTER TABLE sil_manufacturing_bom DROP CONSTRAINT FK_6A250C85217A674B');
        $this->addSql('ALTER TABLE sil_crm_position DROP CONSTRAINT FK_F5F58D4356BD9D60');
        $this->addSql('ALTER TABLE sil_crm_position__circle DROP CONSTRAINT FK_D2947A3CDD842E46');
        $this->addSql('ALTER TABLE sil_crm_organsim_group__role DROP CONSTRAINT FK_DA8B4A5AD8099476');
        $this->addSql('ALTER TABLE sil_crm_province DROP CONSTRAINT FK_F903BDBDF92F3E70');
        $this->addSql('ALTER TABLE sil_crm_organsim_group__role DROP CONSTRAINT FK_DA8B4A5AD60322AC');
        $this->addSql('ALTER TABLE sil_crm_organism DROP CONSTRAINT FK_BE8AE39A3D371385');
        $this->addSql('ALTER TABLE sil_crm_category DROP CONSTRAINT FK_B5957077B381CA9B');
        $this->addSql('ALTER TABLE sil_crm_category DROP CONSTRAINT FK_B5957077B5CEAE2F');
        $this->addSql('ALTER TABLE sil_crm_organism DROP CONSTRAINT FK_BE8AE39A12469DE2');
        $this->addSql('ALTER TABLE sil_crm_position__circle DROP CONSTRAINT FK_D2947A3C70EE2FF6');
        $this->addSql('ALTER TABLE sil_crm_organism__circle DROP CONSTRAINT FK_C518F6FF64180A36');
        $this->addSql('ALTER TABLE sil_ecommerce_taxon DROP CONSTRAINT FK_35C1C88DA977936C');
        $this->addSql('ALTER TABLE sil_ecommerce_taxon DROP CONSTRAINT FK_35C1C88D727ACA70');
        $this->addSql('ALTER TABLE sil_ecommerce_product DROP CONSTRAINT FK_274CD2DF731E505');
        $this->addSql('ALTER TABLE sylius_taxon_translation DROP CONSTRAINT FK_1487DFCF2C2AC5D3');
        $this->addSql('ALTER TABLE sylius_taxon_image DROP CONSTRAINT FK_DBE52B287E3C61F9');
        $this->addSql('ALTER TABLE sylius_product_taxon DROP CONSTRAINT FK_169C6CD9DE13F470');
        $this->addSql('ALTER TABLE sylius_product_option_translation DROP CONSTRAINT FK_CBA491AD2C2AC5D3');
        $this->addSql('ALTER TABLE sylius_product_options DROP CONSTRAINT FK_2B5FF009A7C41D6F');
        $this->addSql('ALTER TABLE sil_ecommerce_product_option_value DROP CONSTRAINT FK_31037854A7C41D6F');
        $this->addSql('ALTER TABLE sil_ecommerce_sales_journal_item DROP CONSTRAINT FK_C71467284C3A3BB');
        $this->addSql('ALTER TABLE sylius_shipping_method_channels DROP CONSTRAINT FK_2D9833355F7D6850');
        $this->addSql('ALTER TABLE sylius_shipping_method_translation DROP CONSTRAINT FK_2B37DB3D2C2AC5D3');
        $this->addSql('ALTER TABLE sylius_shipment DROP CONSTRAINT FK_FD707B3319883967');
        $this->addSql('ALTER TABLE sylius_adjustment DROP CONSTRAINT FK_ACA6E0F2E415FB15');
        $this->addSql('ALTER TABLE sylius_order_item_unit DROP CONSTRAINT FK_82BF226EE415FB15');
        $this->addSql('ALTER TABLE sil_ecommerce_tax_rate DROP CONSTRAINT FK_7D9C26079F2C3FAB');
        $this->addSql('ALTER TABLE sil_ecommerce_shipping_method DROP CONSTRAINT FK_38884A3D9F2C3FAB');
        $this->addSql('ALTER TABLE sil_ecommerce_channel DROP CONSTRAINT FK_56FF5835A978C17');
        $this->addSql('ALTER TABLE sylius_zone_member DROP CONSTRAINT FK_E8B5ABF34B0E929B');
        $this->addSql('ALTER TABLE sylius_product_attribute_value DROP CONSTRAINT FK_8A053E54B6E62EFA');
        $this->addSql('ALTER TABLE sylius_product_attribute_translation DROP CONSTRAINT FK_93850EBA2C2AC5D3');
        $this->addSql('ALTER TABLE sylius_shipping_method_channels DROP CONSTRAINT FK_2D98333572F5A1AA');
        $this->addSql('ALTER TABLE sylius_channel_currencies DROP CONSTRAINT FK_AE491F9372F5A1AA');
        $this->addSql('ALTER TABLE sylius_channel_locales DROP CONSTRAINT FK_786B7A8472F5A1AA');
        $this->addSql('ALTER TABLE sylius_product_channels DROP CONSTRAINT FK_F9EF269B72F5A1AA');
        $this->addSql('ALTER TABLE lisem_channel_description DROP CONSTRAINT FK_BD758AD72F5A1AA');
        $this->addSql('ALTER TABLE sil_ecommerce_order DROP CONSTRAINT FK_9B8F78BE72F5A1AA');
        $this->addSql('ALTER TABLE sylius_promotion_channels DROP CONSTRAINT FK_1A044F6472F5A1AA');
        $this->addSql('ALTER TABLE sylius_payment_method_channels DROP CONSTRAINT FK_543AC0CC72F5A1AA');
        $this->addSql('ALTER TABLE sil_ecommerce_product_image__product_variant DROP CONSTRAINT FK_31AFE0943DA5256D');
        $this->addSql('ALTER TABLE sil_ecommerce_sales_journal_item DROP CONSTRAINT FK_C71467282989F1FD');
        $this->addSql('ALTER TABLE sil_email DROP CONSTRAINT FK_70FD47F45DA0FB8');
        $this->addSql('ALTER TABLE lisem_seed_batch_certification DROP CONSTRAINT FK_E1C888BC90AF82A5');
        $this->addSql('ALTER TABLE lisem_seed_batch DROP CONSTRAINT FK_B174DFF34B557494');
        $this->addSql('ALTER TABLE lisem_seed_batch_certification DROP CONSTRAINT FK_E1C888BC680D0B01');
        $this->addSql('ALTER TABLE lisem_seed_batch DROP CONSTRAINT FK_B174DFF3680D0B01');
        $this->addSql('ALTER TABLE lisem_seed_batch_certification DROP CONSTRAINT FK_E1C888BC5A38D544');
        $this->addSql('ALTER TABLE sil_sonata_user__group DROP CONSTRAINT FK_B17AB998FE54D947');
        $this->addSql('ALTER TABLE lisem_variety_plant_category DROP CONSTRAINT FK_531DCCCEB381CA9B');
        $this->addSql('ALTER TABLE lisem_variety_plant_category DROP CONSTRAINT FK_531DCCCEB5CEAE2F');
        $this->addSql('ALTER TABLE lisem_variety__plant_category DROP CONSTRAINT FK_E630DBC078C2BC47');
        $this->addSql('ALTER TABLE lisem_variety_species__category DROP CONSTRAINT FK_438EBCAFB2A1D860');
        $this->addSql('ALTER TABLE sil_email_receipt DROP CONSTRAINT FK_8D82EC77A832C1C9');
        $this->addSql('ALTER TABLE sil_email_link DROP CONSTRAINT FK_42DDE686A832C1C9');
        $this->addSql('ALTER TABLE sil_email__file DROP CONSTRAINT FK_1FAFD3EBA832C1C9');
        $this->addSql('ALTER TABLE sil_sonata_user__group DROP CONSTRAINT FK_B17AB998A76ED395');
        $this->addSql('ALTER TABLE lisem_variety DROP CONSTRAINT FK_FA584188B03A8386');
        $this->addSql('ALTER TABLE lisem_variety DROP CONSTRAINT FK_FA584188896DBBDE');
        $this->addSql('ALTER TABLE lisem_variety_family DROP CONSTRAINT FK_C290C94DB03A8386');
        $this->addSql('ALTER TABLE lisem_variety_family DROP CONSTRAINT FK_C290C94D896DBBDE');
        $this->addSql('ALTER TABLE lisem_variety_genus DROP CONSTRAINT FK_9367CAF5B03A8386');
        $this->addSql('ALTER TABLE lisem_variety_genus DROP CONSTRAINT FK_9367CAF5896DBBDE');
        $this->addSql('ALTER TABLE lisem_variety_species DROP CONSTRAINT FK_51BC34ABB03A8386');
        $this->addSql('ALTER TABLE lisem_variety_species DROP CONSTRAINT FK_51BC34AB896DBBDE');
        $this->addSql('ALTER TABLE blast_custom_filter DROP CONSTRAINT FK_854D7261A76ED395');
        $this->addSql('ALTER TABLE sil_crm_position DROP CONSTRAINT FK_F5F58D43AE271C0D');
        $this->addSql('ALTER TABLE sil_crm_position DROP CONSTRAINT FK_F5F58D4332C8A3DE');
        $this->addSql('ALTER TABLE sil_crm_organism_group DROP CONSTRAINT FK_7955A53664180A36');
        $this->addSql('ALTER TABLE sil_crm_organism_phone DROP CONSTRAINT FK_50DA762E64180A36');
        $this->addSql('ALTER TABLE sil_ecommerce_product_review DROP CONSTRAINT FK_22EB8A02F675F31B');
        $this->addSql('ALTER TABLE lisem_seed_batch_plot DROP CONSTRAINT FK_3C1B23A589B658FE');
        $this->addSql('ALTER TABLE sil_crm_organism__circle DROP CONSTRAINT FK_C518F6FF70EE2FF6');
        $this->addSql('ALTER TABLE sil_crm_address DROP CONSTRAINT FK_B25DF77964180A36');
        $this->addSql('ALTER TABLE sil_ecommerce_order DROP CONSTRAINT FK_9B8F78BE9395C3F3');
        $this->addSql('ALTER TABLE lisem_seed_batch DROP CONSTRAINT FK_B174DFF389B658FE');
        $this->addSql('ALTER TABLE sylius_shop_user DROP CONSTRAINT FK_7C2B74809395C3F3');
        $this->addSql('ALTER TABLE sil_ecommerce_product_image DROP CONSTRAINT FK_B398DDE094F4B9F8');
        $this->addSql('ALTER TABLE lisem_seed_batch_certification_type DROP CONSTRAINT FK_F4F859A6F98F144A');
        $this->addSql('ALTER TABLE sil_email__file DROP CONSTRAINT FK_1FAFD3EB93CB796C');
        $this->addSql('ALTER TABLE lisem_variety__file DROP CONSTRAINT FK_7A189C9093CB796C');
        $this->addSql('ALTER TABLE sil_crm_organism DROP CONSTRAINT FK_BE8AE39ABD94FB16');
        $this->addSql('ALTER TABLE sil_ecommerce_order DROP CONSTRAINT FK_9B8F78BE4D4CFF2B');
        $this->addSql('ALTER TABLE sil_ecommerce_order DROP CONSTRAINT FK_9B8F78BE79D0C0E4');
        $this->addSql('ALTER TABLE sylius_product_attribute_value DROP CONSTRAINT FK_8A053E544584665A');
        $this->addSql('ALTER TABLE sylius_product_association DROP CONSTRAINT FK_48E9CDAB4584665A');
        $this->addSql('ALTER TABLE sylius_product_association_product DROP CONSTRAINT FK_A427B9834584665A');
        $this->addSql('ALTER TABLE sil_ecommerce_product_image DROP CONSTRAINT FK_B398DDE07E3C61F9');
        $this->addSql('ALTER TABLE sil_ecommerce_product_review DROP CONSTRAINT FK_22EB8A024584665A');
        $this->addSql('ALTER TABLE sil_media_file DROP CONSTRAINT FK_A49FB6317E3C61F9');
        $this->addSql('ALTER TABLE sylius_product_channels DROP CONSTRAINT FK_F9EF269B4584665A');
        $this->addSql('ALTER TABLE sylius_product_options DROP CONSTRAINT FK_2B5FF0094584665A');
        $this->addSql('ALTER TABLE sil_ecommerce_product_variant DROP CONSTRAINT FK_6D11110F4584665A');
        $this->addSql('ALTER TABLE sylius_product_translation DROP CONSTRAINT FK_105A9082C2AC5D3');
        $this->addSql('ALTER TABLE sylius_product_taxon DROP CONSTRAINT FK_169C6CD94584665A');
        $this->addSql('ALTER TABLE lisem_variety_description DROP CONSTRAINT FK_EB4FA25178C2BC47');
        $this->addSql('ALTER TABLE sil_ecommerce_product DROP CONSTRAINT FK_274CD2DF78C2BC47');
        $this->addSql('ALTER TABLE lisem_variety DROP CONSTRAINT FK_FA584188727ACA70');
        $this->addSql('ALTER TABLE lisem_variety__plant_category DROP CONSTRAINT FK_E630DBC09C0B5A8');
        $this->addSql('ALTER TABLE lisem_variety__product_option_value DROP CONSTRAINT FK_84D5A9CD4330BF8');
        $this->addSql('ALTER TABLE lisem_variety__file DROP CONSTRAINT FK_7A189C9078C2BC47');
        $this->addSql('ALTER TABLE lisem_channel_description DROP CONSTRAINT FK_BD758AD78C2BC47');
        $this->addSql('ALTER TABLE lisem_seed_batch DROP CONSTRAINT FK_B174DFF378C2BC47');
        $this->addSql('ALTER TABLE sylius_product_variant_translation DROP CONSTRAINT FK_8DC18EDC2C2AC5D3');
        $this->addSql('ALTER TABLE sil_ecommerce_order_item DROP CONSTRAINT FK_3B9E646F3B69A9AF');
        $this->addSql('ALTER TABLE sil_ecommerce_product_image__product_variant DROP CONSTRAINT FK_31AFE0943B69A9AF');
        $this->addSql('ALTER TABLE sylius_product_variant_option_value DROP CONSTRAINT FK_76CDAFA13B69A9AF');
        $this->addSql('ALTER TABLE lisem_seed_batch__product_variant DROP CONSTRAINT FK_5AE6DF1F5009B3C8');
        $this->addSql('ALTER TABLE sylius_channel_pricing DROP CONSTRAINT FK_7801820CA80EF684');
        $this->addSql('ALTER TABLE lisem_variety_genus DROP CONSTRAINT FK_9367CAF5C35E566A');
        $this->addSql('ALTER TABLE sil_ecommerce_sales_journal_item DROP CONSTRAINT FK_C71467288D9F6D38');
        $this->addSql('ALTER TABLE sil_ecommerce_payment DROP CONSTRAINT FK_992E527F8D9F6D38');
        $this->addSql('ALTER TABLE sil_ecommerce_order_item DROP CONSTRAINT FK_3B9E646F8D9F6D38');
        $this->addSql('ALTER TABLE sil_ecommerce_invoice DROP CONSTRAINT FK_6463C1368D9F6D38');
        $this->addSql('ALTER TABLE sylius_promotion_order DROP CONSTRAINT FK_BF9CF6FB8D9F6D38');
        $this->addSql('ALTER TABLE sylius_adjustment DROP CONSTRAINT FK_ACA6E0F28D9F6D38');
        $this->addSql('ALTER TABLE sylius_shipment DROP CONSTRAINT FK_FD707B338D9F6D38');
        $this->addSql('ALTER TABLE lisem_variety_species DROP CONSTRAINT FK_51BC34AB85C4074C');
        $this->addSql('ALTER TABLE lisem_seed_batch__product_variant DROP CONSTRAINT FK_5AE6DF1F6B65DCB2');
        $this->addSql('ALTER TABLE sylius_product_option_value_translation DROP CONSTRAINT FK_8D4382DC2C2AC5D3');
        $this->addSql('ALTER TABLE lisem_variety__product_option_value DROP CONSTRAINT FK_84D5A9C78C2BC47');
        $this->addSql('ALTER TABLE sylius_product_variant_option_value DROP CONSTRAINT FK_76CDAFA1D957CA06');
        $this->addSql('ALTER TABLE lisem_variety DROP CONSTRAINT FK_FA584188B2A1D860');
        $this->addSql('ALTER TABLE lisem_variety_species DROP CONSTRAINT FK_51BC34ABF5E25C30');
        $this->addSql('ALTER TABLE lisem_variety_species__category DROP CONSTRAINT FK_438EBCAFC2D8DA42');
        $this->addSql('ALTER TABLE sylius_admin_api_access_token DROP CONSTRAINT FK_2AA4915DA76ED395');
        $this->addSql('ALTER TABLE sylius_admin_api_refresh_token DROP CONSTRAINT FK_9160E3FAA76ED395');
        $this->addSql('ALTER TABLE sylius_admin_api_auth_code DROP CONSTRAINT FK_E366D848A76ED395');
        $this->addSql('CREATE SEQUENCE lexik_trans_unit_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE address_search_index_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE email_search_index_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE email_template_search_index_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE lexik_trans_unit_translations_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE lexik_translation_file_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE organism_search_index_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE plot_search_index_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE position_search_index_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE seed_batch_search_index_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE sf_session_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE channel_description (id UUID NOT NULL, channel_id UUID DEFAULT NULL, variety_id UUID DEFAULT NULL, value VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_743ebf0772f5a1aa ON channel_description (channel_id)');
        $this->addSql('CREATE INDEX idx_743ebf0778c2bc47 ON channel_description (variety_id)');
        $this->addSql('CREATE TABLE lexik_trans_unit (id SERIAL NOT NULL, key_name VARCHAR(255) NOT NULL, domain VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX key_domain_idx ON lexik_trans_unit (key_name, domain)');
        $this->addSql('CREATE TABLE librinfo_crm_country (id UUID NOT NULL, code VARCHAR(2) NOT NULL, enabled BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX code_index ON librinfo_crm_country (code)');
        $this->addSql('CREATE UNIQUE INDEX uniq_980448a677153098 ON librinfo_crm_country (code)');
        $this->addSql('CREATE TABLE lexik_translation_file (id SERIAL NOT NULL, domain VARCHAR(255) NOT NULL, locale VARCHAR(10) NOT NULL, extention VARCHAR(10) NOT NULL, path VARCHAR(255) NOT NULL, hash VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX hash_idx ON lexik_translation_file (hash)');
        $this->addSql('CREATE TABLE librinfo_crm_address (id UUID NOT NULL, organism_id UUID DEFAULT NULL, created_by_id UUID DEFAULT NULL, updated_by_id UUID DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, post_code VARCHAR(255) DEFAULT NULL, street VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, country_code VARCHAR(255) NOT NULL, province_code VARCHAR(255) DEFAULT NULL, province_name VARCHAR(255) DEFAULT NULL, npai BOOLEAN NOT NULL, vcard_uid VARCHAR(255) DEFAULT NULL, confirmed BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_c639ee4164180a36 ON librinfo_crm_address (organism_id)');
        $this->addSql('CREATE INDEX idx_c639ee41896dbbde ON librinfo_crm_address (updated_by_id)');
        $this->addSql('CREATE INDEX idx_c639ee41b03a8386 ON librinfo_crm_address (created_by_id)');
        $this->addSql('CREATE TABLE librinfo_crm_circle (id UUID NOT NULL, created_by_id UUID DEFAULT NULL, updated_by_id UUID DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, translatable BOOLEAN DEFAULT \'false\' NOT NULL, editable BOOLEAN DEFAULT \'true\' NOT NULL, name VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_c28529c9896dbbde ON librinfo_crm_circle (updated_by_id)');
        $this->addSql('CREATE INDEX idx_c28529c9b03a8386 ON librinfo_crm_circle (created_by_id)');
        $this->addSql('CREATE TABLE lexik_trans_unit_translations (id SERIAL NOT NULL, file_id INT DEFAULT NULL, trans_unit_id INT DEFAULT NULL, locale VARCHAR(10) NOT NULL, content TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_b0aa394493cb796c ON lexik_trans_unit_translations (file_id)');
        $this->addSql('CREATE INDEX idx_b0aa3944c3c583c9 ON lexik_trans_unit_translations (trans_unit_id)');
        $this->addSql('CREATE UNIQUE INDEX trans_unit_locale_idx ON lexik_trans_unit_translations (trans_unit_id, locale)');
        $this->addSql('CREATE TABLE librinfo_crm_city (id UUID NOT NULL, country_code VARCHAR(2) NOT NULL, zip VARCHAR(20) NOT NULL, city VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX country_index ON librinfo_crm_city (country_code)');
        $this->addSql('CREATE INDEX zip_index ON librinfo_crm_city (zip)');
        $this->addSql('CREATE INDEX city_index ON librinfo_crm_city (city)');
        $this->addSql('CREATE TABLE librinfo_crm_organism (id UUID NOT NULL, default_address_id UUID DEFAULT NULL, default_phone_id UUID DEFAULT NULL, category_id UUID DEFAULT NULL, created_by_id UUID DEFAULT NULL, updated_by_id UUID DEFAULT NULL, group_id UUID DEFAULT NULL, firstname VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, shortname VARCHAR(255) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, flash_on_control VARCHAR(255) DEFAULT NULL, family_contact BOOLEAN DEFAULT NULL, culture VARCHAR(2) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, administrative_number VARCHAR(255) DEFAULT NULL, is_individual BOOLEAN DEFAULT \'false\' NOT NULL, is_customer BOOLEAN DEFAULT \'false\' NOT NULL, customer_code VARCHAR(255) DEFAULT NULL, is_supplier BOOLEAN DEFAULT \'false\' NOT NULL, supplier_code VARCHAR(255) DEFAULT NULL, iban VARCHAR(255) DEFAULT NULL, vat VARCHAR(255) DEFAULT NULL, vat_verified SMALLINT DEFAULT 0 NOT NULL, alert VARCHAR(255) DEFAULT NULL, active BOOLEAN NOT NULL, catalogue_sent BOOLEAN DEFAULT NULL, last_catalogue_sent_date DATE DEFAULT NULL, first_catalogue_sent_date DATE DEFAULT NULL, catalogue_send_mean TEXT DEFAULT NULL, catalogue_type TEXT DEFAULT NULL, source TEXT DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, email_npai BOOLEAN DEFAULT NULL, email_no_newsletter BOOLEAN DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, seedproducercode VARCHAR(255) DEFAULT NULL, seedproducer BOOLEAN DEFAULT \'false\' NOT NULL, emailcanonical VARCHAR(255) NOT NULL, siret VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, discriminator VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_96fc3f1dfe54d947 ON librinfo_crm_organism (group_id)');
        $this->addSql('CREATE INDEX idx_96fc3f1d12469de2 ON librinfo_crm_organism (category_id)');
        $this->addSql('CREATE INDEX idx_96fc3f1d896dbbde ON librinfo_crm_organism (updated_by_id)');
        $this->addSql('CREATE INDEX idx_96fc3f1db03a8386 ON librinfo_crm_organism (created_by_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_96fc3f1d885281e ON librinfo_crm_organism (emailcanonical)');
        $this->addSql('CREATE UNIQUE INDEX uniq_96fc3f1d3d371385 ON librinfo_crm_organism (default_phone_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_96fc3f1dbd94fb16 ON librinfo_crm_organism (default_address_id)');
        $this->addSql('CREATE TABLE librinfo_crm_category (id UUID NOT NULL, tree_root_id UUID DEFAULT NULL, tree_parent_id UUID DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, tree_lft INT NOT NULL, tree_rgt INT NOT NULL, tree_lvl INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_9de3acf0b5ceae2f ON librinfo_crm_category (tree_parent_id)');
        $this->addSql('CREATE INDEX idx_9de3acf0b381ca9b ON librinfo_crm_category (tree_root_id)');
        $this->addSql('CREATE TABLE blast_custom_filters (id UUID NOT NULL, user_id UUID DEFAULT NULL, name VARCHAR(255) NOT NULL, route_name VARCHAR(255) NOT NULL, route_parameters TEXT DEFAULT NULL, filter_parameters TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_213ed3b7a76ed395 ON blast_custom_filters (user_id)');
        $this->addSql('CREATE TABLE librinfo_crm_organism__circle (circle_id UUID NOT NULL, organism_id UUID NOT NULL, PRIMARY KEY(circle_id, organism_id))');
        $this->addSql('CREATE INDEX idx_dc4f991464180a36 ON librinfo_crm_organism__circle (organism_id)');
        $this->addSql('CREATE INDEX idx_dc4f991470ee2ff6 ON librinfo_crm_organism__circle (circle_id)');
        $this->addSql('CREATE TABLE librinfo_crm_organismphone (id UUID NOT NULL, organism_id UUID DEFAULT NULL, number VARCHAR(255) NOT NULL, phone_type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_efb28b3164180a36 ON librinfo_crm_organismphone (organism_id)');
        $this->addSql('CREATE TABLE librinfo_crm_phonetype (id UUID NOT NULL, sort_rank DOUBLE PRECISION DEFAULT \'65536\' NOT NULL, label VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX sort_rank ON librinfo_crm_phonetype (sort_rank)');
        $this->addSql('CREATE TABLE librinfo_crm_role (id UUID NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE librinfo_crm_position__circle (position_id UUID NOT NULL, circle_id UUID NOT NULL, PRIMARY KEY(position_id, circle_id))');
        $this->addSql('CREATE INDEX idx_cbc315d770ee2ff6 ON librinfo_crm_position__circle (circle_id)');
        $this->addSql('CREATE INDEX idx_cbc315d7dd842e46 ON librinfo_crm_position__circle (position_id)');
        $this->addSql('CREATE TABLE librinfo_crm_organismsearchindex (id INT NOT NULL, object_id UUID DEFAULT NULL, field VARCHAR(255) NOT NULL, keyword VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_e3fbdff2232d562b ON librinfo_crm_organismsearchindex (object_id)');
        $this->addSql('CREATE TABLE librinfo_crm_province (id UUID NOT NULL, country_id UUID DEFAULT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, abbreviation VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_d175613af92f3e70 ON librinfo_crm_province (country_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_d175613a77153098 ON librinfo_crm_province (code)');
        $this->addSql('CREATE UNIQUE INDEX country_provincename_idx ON librinfo_crm_province (country_id, name)');
        $this->addSql('CREATE TABLE librinfo_crm_positiontype (id UUID NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE librinfo_ecommerce_channel__currency (channel_id UUID NOT NULL, currency_id UUID NOT NULL, PRIMARY KEY(channel_id, currency_id))');
        $this->addSql('CREATE INDEX idx_7433589738248176 ON librinfo_ecommerce_channel__currency (currency_id)');
        $this->addSql('CREATE INDEX idx_7433589772f5a1aa ON librinfo_ecommerce_channel__currency (channel_id)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_channel__locale (channel_id UUID NOT NULL, locale_id UUID NOT NULL, PRIMARY KEY(channel_id, locale_id))');
        $this->addSql('CREATE INDEX idx_8cc92bbe72f5a1aa ON librinfo_ecommerce_channel__locale (channel_id)');
        $this->addSql('CREATE INDEX idx_8cc92bbee559dfd1 ON librinfo_ecommerce_channel__locale (locale_id)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_product__channel (product_id UUID NOT NULL, channel_id UUID NOT NULL, PRIMARY KEY(product_id, channel_id))');
        $this->addSql('CREATE INDEX idx_cc395b694584665a ON librinfo_ecommerce_product__channel (product_id)');
        $this->addSql('CREATE INDEX idx_cc395b6972f5a1aa ON librinfo_ecommerce_product__channel (channel_id)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_invoice (id UUID NOT NULL, order_id UUID DEFAULT NULL, number VARCHAR(255) NOT NULL, mime_type VARCHAR(255) DEFAULT NULL, size INT DEFAULT NULL, file TEXT NOT NULL, total INT NOT NULL, type INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_60611dd8d9f6d38 ON librinfo_ecommerce_invoice (order_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_60611dd96901f54 ON librinfo_ecommerce_invoice (number)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_customergroup (id UUID NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX uniq_150be2d77153098 ON librinfo_ecommerce_customergroup (code)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_orderitem (id UUID NOT NULL, order_id UUID NOT NULL, variant_id UUID NOT NULL, quantity INT NOT NULL, unit_price INT NOT NULL, units_total INT NOT NULL, adjustments_total INT NOT NULL, total INT NOT NULL, is_immutable BOOLEAN NOT NULL, bulk BOOLEAN DEFAULT \'false\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_58cb71818d9f6d38 ON librinfo_ecommerce_orderitem (order_id)');
        $this->addSql('CREATE INDEX idx_58cb71813b69a9af ON librinfo_ecommerce_orderitem (variant_id)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_product (id UUID NOT NULL, main_taxon_id UUID DEFAULT NULL, variety_id UUID DEFAULT NULL, code VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, enabled BOOLEAN NOT NULL, variant_selection_method VARCHAR(255) NOT NULL, average_rating DOUBLE PRECISION DEFAULT \'0\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_4529023478c2bc47 ON librinfo_ecommerce_product (variety_id)');
        $this->addSql('CREATE INDEX idx_45290234731e505 ON librinfo_ecommerce_product (main_taxon_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_4529023477153098 ON librinfo_ecommerce_product (code)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_productattribute (id UUID NOT NULL, code VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, storage_type VARCHAR(255) NOT NULL, configuration TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, "position" INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX uniq_ce329ec877153098 ON librinfo_ecommerce_productattribute (code)');
        $this->addSql('COMMENT ON COLUMN librinfo_ecommerce_productattribute.configuration IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE librinfo_ecommerce_order__promotion (order_id UUID NOT NULL, promotion_id UUID NOT NULL, PRIMARY KEY(order_id, promotion_id))');
        $this->addSql('CREATE INDEX idx_ee637f5d139df194 ON librinfo_ecommerce_order__promotion (promotion_id)');
        $this->addSql('CREATE INDEX idx_ee637f5d8d9f6d38 ON librinfo_ecommerce_order__promotion (order_id)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_productimage (id UUID NOT NULL, owner_id UUID NOT NULL, real_file_id UUID DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_810714bd7e3c61f9 ON librinfo_ecommerce_productimage (owner_id)');
        $this->addSql('CREATE INDEX idx_810714bd94f4b9f8 ON librinfo_ecommerce_productimage (real_file_id)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_productoption (id UUID NOT NULL, code VARCHAR(255) NOT NULL, "position" INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX uniq_14c6b9f477153098 ON librinfo_ecommerce_productoption (code)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_productreview (id UUID NOT NULL, product_id UUID NOT NULL, author_id UUID NOT NULL, title VARCHAR(255) NOT NULL, rating INT NOT NULL, comment TEXT DEFAULT NULL, status VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_37033882f675f31b ON librinfo_ecommerce_productreview (author_id)');
        $this->addSql('CREATE INDEX idx_370338824584665a ON librinfo_ecommerce_productreview (product_id)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_productimage__productvariant (image_id UUID NOT NULL, variant_id UUID NOT NULL, PRIMARY KEY(image_id, variant_id))');
        $this->addSql('CREATE INDEX idx_b92ee5d93b69a9af ON librinfo_ecommerce_productimage__productvariant (variant_id)');
        $this->addSql('CREATE INDEX idx_b92ee5d93da5256d ON librinfo_ecommerce_productimage__productvariant (image_id)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_productvariant__productoptionvalue (variant_id UUID NOT NULL, option_value_id UUID NOT NULL, PRIMARY KEY(variant_id, option_value_id))');
        $this->addSql('CREATE INDEX idx_c78ca40c3b69a9af ON librinfo_ecommerce_productvariant__productoptionvalue (variant_id)');
        $this->addSql('CREATE INDEX idx_c78ca40cd957ca06 ON librinfo_ecommerce_productvariant__productoptionvalue (option_value_id)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_productvariant__seedbatch (productvariant_id UUID NOT NULL, seedbatch_id UUID NOT NULL, PRIMARY KEY(productvariant_id, seedbatch_id))');
        $this->addSql('CREATE INDEX idx_e3ba8092a97fd19e ON librinfo_ecommerce_productvariant__seedbatch (seedbatch_id)');
        $this->addSql('CREATE INDEX idx_e3ba80921855be3f ON librinfo_ecommerce_productvariant__seedbatch (productvariant_id)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_shippingmethod__channel (shipping_method_id UUID NOT NULL, channel_id UUID NOT NULL, PRIMARY KEY(shipping_method_id, channel_id))');
        $this->addSql('CREATE INDEX idx_985cd66a5f7d6850 ON librinfo_ecommerce_shippingmethod__channel (shipping_method_id)');
        $this->addSql('CREATE INDEX idx_985cd66a72f5a1aa ON librinfo_ecommerce_shippingmethod__channel (channel_id)');
        $this->addSql('CREATE TABLE librinfo_email_emailtemplate (id UUID NOT NULL, created_by_id UUID DEFAULT NULL, updated_by_id UUID DEFAULT NULL, name VARCHAR(255) NOT NULL, content TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_5eafb5cf896dbbde ON librinfo_email_emailtemplate (updated_by_id)');
        $this->addSql('CREATE INDEX idx_5eafb5cfb03a8386 ON librinfo_email_emailtemplate (created_by_id)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_zone (id UUID NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(8) NOT NULL, scope VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX uniq_96a1b99577153098 ON librinfo_ecommerce_zone (code)');
        $this->addSql('CREATE TABLE librinfo_email_email__position (email_id UUID NOT NULL, position_id UUID NOT NULL, PRIMARY KEY(email_id, position_id))');
        $this->addSql('CREATE INDEX idx_4fbf83b8a832c1c9 ON librinfo_email_email__position (email_id)');
        $this->addSql('CREATE INDEX idx_4fbf83b8dd842e46 ON librinfo_email_email__position (position_id)');
        $this->addSql('CREATE TABLE librinfo_email_email (id UUID NOT NULL, template_id UUID DEFAULT NULL, created_by_id UUID DEFAULT NULL, updated_by_id UUID DEFAULT NULL, message TEXT DEFAULT NULL, message_id VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, environment VARCHAR(255) DEFAULT NULL, field_from VARCHAR(255) NOT NULL, field_cc VARCHAR(255) DEFAULT NULL, field_bcc VARCHAR(255) DEFAULT NULL, field_subject VARCHAR(255) DEFAULT NULL, content TEXT DEFAULT NULL, text_content TEXT NOT NULL, sent BOOLEAN DEFAULT NULL, tracking BOOLEAN DEFAULT NULL, field_to VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_5de3f0ac896dbbde ON librinfo_email_email (updated_by_id)');
        $this->addSql('CREATE INDEX idx_5de3f0acb03a8386 ON librinfo_email_email (created_by_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_5de3f0ac5da0fb8 ON librinfo_email_email (template_id)');
        $this->addSql('CREATE TABLE librinfo_email_emaillink (id UUID NOT NULL, email_id UUID DEFAULT NULL, destination TEXT NOT NULL, address VARCHAR(255) NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_e45cc1faa832c1c9 ON librinfo_email_emaillink (email_id)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_taxrate (id UUID NOT NULL, category_id UUID NOT NULL, zone_id UUID NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, amount NUMERIC(10, 5) NOT NULL, included_in_price BOOLEAN NOT NULL, calculator VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_e78aba0b12469de2 ON librinfo_ecommerce_taxrate (category_id)');
        $this->addSql('CREATE INDEX idx_e78aba0b9f2c3fab ON librinfo_ecommerce_taxrate (zone_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_e78aba0b77153098 ON librinfo_ecommerce_taxrate (code)');
        $this->addSql('CREATE TABLE librinfo_email_emailsearchindex (id INT NOT NULL, object_id UUID DEFAULT NULL, field VARCHAR(255) NOT NULL, keyword VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_a0fffd5c232d562b ON librinfo_email_emailsearchindex (object_id)');
        $this->addSql('CREATE TABLE librinfo_email_email__file (email_id UUID NOT NULL, file_id UUID NOT NULL, PRIMARY KEY(email_id, file_id))');
        $this->addSql('CREATE INDEX idx_ddc6786aa832c1c9 ON librinfo_email_email__file (email_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_ddc6786a93cb796c ON librinfo_email_email__file (file_id)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_salesjournalitem (id UUID NOT NULL, order_id UUID DEFAULT NULL, invoice_id UUID DEFAULT NULL, payment_id UUID DEFAULT NULL, operation_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, account VARCHAR(64) NOT NULL, label VARCHAR(255) NOT NULL, debit INT NOT NULL, credit INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_6aa2a2032989f1fd ON librinfo_ecommerce_salesjournalitem (invoice_id)');
        $this->addSql('CREATE INDEX idx_6aa2a2038d9f6d38 ON librinfo_ecommerce_salesjournalitem (order_id)');
        $this->addSql('CREATE INDEX idx_6aa2a2034c3a3bb ON librinfo_ecommerce_salesjournalitem (payment_id)');
        $this->addSql('CREATE TABLE librinfo_email_emailreceipt (id UUID NOT NULL, email_id UUID DEFAULT NULL, address VARCHAR(255) NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_90137c36a832c1c9 ON librinfo_email_emailreceipt (email_id)');
        $this->addSql('CREATE TABLE librinfo_email_email__circle (email_id UUID NOT NULL, circle_id UUID NOT NULL, PRIMARY KEY(email_id, circle_id))');
        $this->addSql('CREATE INDEX idx_9003c9cba832c1c9 ON librinfo_email_email__circle (email_id)');
        $this->addSql('CREATE INDEX idx_9003c9cb70ee2ff6 ON librinfo_email_email__circle (circle_id)');
        $this->addSql('CREATE TABLE librinfo_email_email__organism (email_id UUID NOT NULL, organism_id UUID NOT NULL, PRIMARY KEY(email_id, organism_id))');
        $this->addSql('CREATE INDEX idx_4c0ed6164180a36 ON librinfo_email_email__organism (organism_id)');
        $this->addSql('CREATE INDEX idx_4c0ed61a832c1c9 ON librinfo_email_email__organism (email_id)');
        $this->addSql('CREATE TABLE librinfo_seedbatch_certifyingbody (id UUID NOT NULL, created_by_id UUID DEFAULT NULL, updated_by_id UUID DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, zip VARCHAR(20) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, npai BOOLEAN DEFAULT NULL, vcard_uid VARCHAR(255) DEFAULT NULL, confirmed BOOLEAN DEFAULT \'true\' NOT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_8f3d1bd5896dbbde ON librinfo_seedbatch_certifyingbody (updated_by_id)');
        $this->addSql('CREATE INDEX idx_8f3d1bd5b03a8386 ON librinfo_seedbatch_certifyingbody (created_by_id)');
        $this->addSql('CREATE TABLE librinfo_seedbatch_seedbatch (id UUID NOT NULL, seed_farm_id UUID DEFAULT NULL, variety_id UUID DEFAULT NULL, producer_id UUID DEFAULT NULL, plot_id UUID DEFAULT NULL, created_by_id UUID DEFAULT NULL, updated_by_id UUID DEFAULT NULL, code VARCHAR(255) NOT NULL, batch_number INT NOT NULL, production_year INT NOT NULL, germination_rate DOUBLE PRECISION DEFAULT NULL, germination_date DATE DEFAULT NULL, tkw DOUBLE PRECISION DEFAULT NULL, tkw_date DATE DEFAULT NULL, certifications VARCHAR(255) DEFAULT NULL, gross_producer_weight INT DEFAULT NULL, gross_delivered_weight INT DEFAULT NULL, net_screened_weight INT DEFAULT NULL, to_screen_weight INT DEFAULT NULL, delivery_date DATE DEFAULT NULL, delivery_note BOOLEAN DEFAULT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_c3ee4fe4680d0b01 ON librinfo_seedbatch_seedbatch (plot_id)');
        $this->addSql('CREATE INDEX idx_c3ee4fe478c2bc47 ON librinfo_seedbatch_seedbatch (variety_id)');
        $this->addSql('CREATE INDEX idx_c3ee4fe4896dbbde ON librinfo_seedbatch_seedbatch (updated_by_id)');
        $this->addSql('CREATE INDEX idx_c3ee4fe44b557494 ON librinfo_seedbatch_seedbatch (seed_farm_id)');
        $this->addSql('CREATE INDEX idx_c3ee4fe489b658fe ON librinfo_seedbatch_seedbatch (producer_id)');
        $this->addSql('CREATE INDEX idx_c3ee4fe4b03a8386 ON librinfo_seedbatch_seedbatch (created_by_id)');
        $this->addSql('CREATE TABLE librinfo_email_emailtemplatesearchindex (id INT NOT NULL, object_id UUID DEFAULT NULL, field VARCHAR(255) NOT NULL, keyword VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_a7733671232d562b ON librinfo_email_emailtemplatesearchindex (object_id)');
        $this->addSql('CREATE TABLE librinfo_media_file (id UUID NOT NULL, owner_id UUID DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, mime_type VARCHAR(255) DEFAULT NULL, size DOUBLE PRECISION DEFAULT NULL, file TEXT DEFAULT NULL, owned BOOLEAN DEFAULT NULL, path VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_715414b27e3c61f9 ON librinfo_media_file (owner_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_715414b2b548b0f ON librinfo_media_file (path)');
        $this->addSql('CREATE TABLE librinfo_seedbatch_certificationtype (id UUID NOT NULL, logo_id UUID DEFAULT NULL, created_by_id UUID DEFAULT NULL, updated_by_id UUID DEFAULT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_e21e2fae896dbbde ON librinfo_seedbatch_certificationtype (updated_by_id)');
        $this->addSql('CREATE INDEX idx_e21e2faeb03a8386 ON librinfo_seedbatch_certificationtype (created_by_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_e21e2faef98f144a ON librinfo_seedbatch_certificationtype (logo_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_e21e2fae77153098 ON librinfo_seedbatch_certificationtype (code)');
        $this->addSql('CREATE TABLE librinfo_sonatasyliususer_sonatagroup (id UUID NOT NULL, name VARCHAR(255) NOT NULL, roles TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN librinfo_sonatasyliususer_sonatagroup.roles IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE librinfo_sonatasyliususer_sonatauser__sonatagroup (user_id UUID NOT NULL, group_id UUID NOT NULL, PRIMARY KEY(user_id, group_id))');
        $this->addSql('CREATE INDEX idx_fdce9333a76ed395 ON librinfo_sonatasyliususer_sonatauser__sonatagroup (user_id)');
        $this->addSql('CREATE INDEX idx_fdce9333fe54d947 ON librinfo_sonatasyliususer_sonatauser__sonatagroup (group_id)');
        $this->addSql('CREATE TABLE librinfo_seedbatch_seedbatchsearchindex (id INT NOT NULL, object_id UUID DEFAULT NULL, field VARCHAR(255) NOT NULL, keyword VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_78cc94d6232d562b ON librinfo_seedbatch_seedbatchsearchindex (object_id)');
        $this->addSql('CREATE TABLE librinfo_varieties_variety__productoptionvalue (variety_id UUID NOT NULL, productoptionvalue_id UUID NOT NULL, PRIMARY KEY(variety_id, productoptionvalue_id))');
        $this->addSql('CREATE INDEX idx_d44a64a678c2bc47 ON librinfo_varieties_variety__productoptionvalue (variety_id)');
        $this->addSql('CREATE INDEX idx_d44a64a6e0211176 ON librinfo_varieties_variety__productoptionvalue (productoptionvalue_id)');
        $this->addSql('CREATE TABLE librinfo_varieties_plantcategory (id UUID NOT NULL, tree_root_id UUID DEFAULT NULL, tree_parent_id UUID DEFAULT NULL, code VARCHAR(6) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, tree_lft INT NOT NULL, tree_rgt INT NOT NULL, tree_lvl INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_c6344514b381ca9b ON librinfo_varieties_plantcategory (tree_root_id)');
        $this->addSql('CREATE INDEX idx_c6344514b5ceae2f ON librinfo_varieties_plantcategory (tree_parent_id)');
        $this->addSql('CREATE TABLE librinfo_varieties_species__plantcategory (plant_category_id UUID NOT NULL, species_id UUID NOT NULL, PRIMARY KEY(plant_category_id, species_id))');
        $this->addSql('CREATE INDEX idx_675259a4b2a1d860 ON librinfo_varieties_species__plantcategory (species_id)');
        $this->addSql('CREATE INDEX idx_675259a4c2d8da42 ON librinfo_varieties_species__plantcategory (plant_category_id)');
        $this->addSql('CREATE TABLE migration_versions (version VARCHAR(255) NOT NULL, PRIMARY KEY(version))');
        $this->addSql('CREATE TABLE select_choice (id UUID NOT NULL, label VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE librinfo_varieties_species (id UUID NOT NULL, genus_id UUID DEFAULT NULL, parent_species_id UUID DEFAULT NULL, created_by_id UUID DEFAULT NULL, updated_by_id UUID DEFAULT NULL, latin_name VARCHAR(255) DEFAULT NULL, alias VARCHAR(255) DEFAULT NULL, code VARCHAR(15) NOT NULL, life_cycle VARCHAR(10) DEFAULT NULL, legal_germination_rate INT DEFAULT NULL, germination_rate INT DEFAULT 0, seed_lifespan INT DEFAULT NULL, raise_duration INT DEFAULT NULL, tkw DOUBLE PRECISION DEFAULT NULL, regulatory_status VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_c36a0e84b03a8386 ON librinfo_varieties_species (created_by_id)');
        $this->addSql('CREATE UNIQUE INDEX species_name_idx ON librinfo_varieties_species (name)');
        $this->addSql('CREATE INDEX idx_c36a0e8485c4074c ON librinfo_varieties_species (genus_id)');
        $this->addSql('CREATE INDEX idx_c36a0e84896dbbde ON librinfo_varieties_species (updated_by_id)');
        $this->addSql('CREATE UNIQUE INDEX species_code_idx ON librinfo_varieties_species (code)');
        $this->addSql('CREATE INDEX idx_c36a0e84f5e25c30 ON librinfo_varieties_species (parent_species_id)');
        $this->addSql('CREATE TABLE sf_session (id INT NOT NULL, session_id VARCHAR(255) NOT NULL, data BYTEA DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, expires_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX session_id_index ON sf_session (session_id)');
        $this->addSql('CREATE TABLE sil_stock_operation_type (id UUID NOT NULL, code VARCHAR(64) NOT NULL, name VARCHAR(64) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX uniq_9fe058e977153098 ON sil_stock_operation_type (code)');
        $this->addSql('CREATE UNIQUE INDEX uniq_9fe058e95e237e06 ON sil_stock_operation_type (name)');
        $this->addSql('CREATE TABLE sil_stock_stock_item (id UUID NOT NULL, uom_id UUID NOT NULL, strategy_output_id UUID NOT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(64) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_e92535bba103eeb1 ON sil_stock_stock_item (uom_id)');
        $this->addSql('CREATE INDEX idx_e92535bbb9ef6aa3 ON sil_stock_stock_item (strategy_output_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_e92535bb77153098 ON sil_stock_stock_item (code)');
        $this->addSql('CREATE TABLE sil_stock_stock_unit (id UUID NOT NULL, location_id UUID DEFAULT NULL, qty_uom_id UUID NOT NULL, movement_id UUID DEFAULT NULL, stockitem_id UUID DEFAULT NULL, batch_id UUID DEFAULT NULL, code VARCHAR(64) NOT NULL, qty_value NUMERIC(15, 5) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX uniq_2a851cf677153098 ON sil_stock_stock_unit (code)');
        $this->addSql('CREATE INDEX idx_2a851cf6217a674b ON sil_stock_stock_unit (stockitem_id)');
        $this->addSql('CREATE INDEX idx_2a851cf664d218e ON sil_stock_stock_unit (location_id)');
        $this->addSql('CREATE INDEX idx_2a851cf6210d48fe ON sil_stock_stock_unit (qty_uom_id)');
        $this->addSql('CREATE INDEX idx_2a851cf6229e70a7 ON sil_stock_stock_unit (movement_id)');
        $this->addSql('CREATE INDEX idx_2a851cf6f39ebe7a ON sil_stock_stock_unit (batch_id)');
        $this->addSql('CREATE TABLE sylius_shipping_method (id UUID NOT NULL, category_id UUID DEFAULT NULL, zone_id UUID NOT NULL, tax_category_id UUID DEFAULT NULL, code VARCHAR(255) NOT NULL, configuration TEXT NOT NULL, category_requirement INT NOT NULL, calculator VARCHAR(255) NOT NULL, is_enabled BOOLEAN NOT NULL, "position" INT NOT NULL, archived_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_5fb0ee1112469de2 ON sylius_shipping_method (category_id)');
        $this->addSql('CREATE INDEX idx_5fb0ee119f2c3fab ON sylius_shipping_method (zone_id)');
        $this->addSql('CREATE INDEX idx_5fb0ee119df894ed ON sylius_shipping_method (tax_category_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_5fb0ee1177153098 ON sylius_shipping_method (code)');
        $this->addSql('COMMENT ON COLUMN sylius_shipping_method.configuration IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE librinfo_seedbatch_plotsearchindex (id INT NOT NULL, object_id UUID DEFAULT NULL, field VARCHAR(255) NOT NULL, keyword VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_5ab5f375232d562b ON librinfo_seedbatch_plotsearchindex (object_id)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_productvariant (id UUID NOT NULL, product_id UUID NOT NULL, tax_category_id UUID DEFAULT NULL, shipping_category_id UUID DEFAULT NULL, stockitem_id UUID DEFAULT NULL, code VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, "position" INT NOT NULL, version INT DEFAULT 1 NOT NULL, on_hold INT NOT NULL, on_hand INT NOT NULL, tracked BOOLEAN NOT NULL, width DOUBLE PRECISION DEFAULT NULL, height DOUBLE PRECISION DEFAULT NULL, depth DOUBLE PRECISION DEFAULT NULL, weight DOUBLE PRECISION DEFAULT NULL, shipping_required BOOLEAN NOT NULL, enabled BOOLEAN DEFAULT \'true\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_80bc7a9d9df894ed ON librinfo_ecommerce_productvariant (tax_category_id)');
        $this->addSql('CREATE INDEX idx_80bc7a9deec75ed7 ON librinfo_ecommerce_productvariant (stockitem_id)');
        $this->addSql('CREATE INDEX idx_80bc7a9d9e2d1a41 ON librinfo_ecommerce_productvariant (shipping_category_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_80bc7a9d77153098 ON librinfo_ecommerce_productvariant (code)');
        $this->addSql('CREATE INDEX idx_80bc7a9d4584665a ON librinfo_ecommerce_productvariant (product_id)');
        $this->addSql('CREATE TABLE sylius_channel (id UUID NOT NULL, default_locale_id UUID NOT NULL, base_currency_id UUID NOT NULL, default_tax_zone_id UUID DEFAULT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, color VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, enabled BOOLEAN NOT NULL, hostname VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, theme_name VARCHAR(255) DEFAULT NULL, tax_calculation_strategy VARCHAR(255) NOT NULL, contact_email VARCHAR(255) DEFAULT NULL, skipping_shipping_step_allowed BOOLEAN NOT NULL, skipping_payment_step_allowed BOOLEAN NOT NULL, account_verification_required BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_16c8119e3101778e ON sylius_channel (base_currency_id)');
        $this->addSql('CREATE INDEX idx_16c8119e743bf776 ON sylius_channel (default_locale_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_16c8119e77153098 ON sylius_channel (code)');
        $this->addSql('CREATE INDEX idx_16c8119ea978c17 ON sylius_channel (default_tax_zone_id)');
        $this->addSql('CREATE TABLE librinfo_varieties_varietydescription (id UUID NOT NULL, variety_id UUID DEFAULT NULL, field VARCHAR(255) NOT NULL, value TEXT DEFAULT NULL, fieldset VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_28fef35178c2bc47 ON librinfo_varieties_varietydescription (variety_id)');
        $this->addSql('CREATE TABLE librinfo_crm_positionsearchindex (id INT NOT NULL, object_id UUID DEFAULT NULL, field VARCHAR(255) NOT NULL, keyword VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_32aefb0232d562b ON librinfo_crm_positionsearchindex (object_id)');
        $this->addSql('CREATE TABLE librinfo_seedbatch_seedfarm (id UUID NOT NULL, created_by_id UUID DEFAULT NULL, updated_by_id UUID DEFAULT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, zip VARCHAR(20) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, npai BOOLEAN DEFAULT NULL, vcard_uid VARCHAR(255) DEFAULT NULL, confirmed BOOLEAN DEFAULT \'true\' NOT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX code_idx ON librinfo_seedbatch_seedfarm (code)');
        $this->addSql('CREATE INDEX idx_d32b2865896dbbde ON librinfo_seedbatch_seedfarm (updated_by_id)');
        $this->addSql('CREATE UNIQUE INDEX name_idx ON librinfo_seedbatch_seedfarm (name)');
        $this->addSql('CREATE INDEX idx_d32b2865b03a8386 ON librinfo_seedbatch_seedfarm (created_by_id)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_product__productoption (product_id UUID NOT NULL, option_id UUID NOT NULL, PRIMARY KEY(product_id, option_id))');
        $this->addSql('CREATE INDEX idx_39550b334584665a ON librinfo_ecommerce_product__productoption (product_id)');
        $this->addSql('CREATE INDEX idx_39550b33a7c41d6f ON librinfo_ecommerce_product__productoption (option_id)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_order (id UUID NOT NULL, channel_id UUID DEFAULT NULL, promotion_coupon_id UUID DEFAULT NULL, customer_id UUID DEFAULT NULL, shipping_address_id UUID DEFAULT NULL, billing_address_id UUID DEFAULT NULL, stockoperation_id UUID DEFAULT NULL, number VARCHAR(255) DEFAULT NULL, notes TEXT DEFAULT NULL, state VARCHAR(255) NOT NULL, checkout_completed_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, items_total INT NOT NULL, adjustments_total INT NOT NULL, total INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, currency_code VARCHAR(3) NOT NULL, locale_code VARCHAR(255) NOT NULL, checkout_state VARCHAR(255) NOT NULL, payment_state VARCHAR(255) NOT NULL, shipping_state VARCHAR(255) NOT NULL, token_value VARCHAR(255) DEFAULT NULL, customer_ip VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_eb1e2b89ddeefab1 ON librinfo_ecommerce_order (stockoperation_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_eb1e2b894d4cff2b ON librinfo_ecommerce_order (shipping_address_id)');
        $this->addSql('CREATE INDEX idx_eb1e2b8917b24436 ON librinfo_ecommerce_order (promotion_coupon_id)');
        $this->addSql('CREATE INDEX idx_eb1e2b899395c3f3 ON librinfo_ecommerce_order (customer_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_eb1e2b8979d0c0e4 ON librinfo_ecommerce_order (billing_address_id)');
        $this->addSql('CREATE INDEX idx_eb1e2b8972f5a1aa ON librinfo_ecommerce_order (channel_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_eb1e2b8996901f54 ON librinfo_ecommerce_order (number)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_productoptionvalue (id UUID NOT NULL, option_id UUID NOT NULL, code VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_7b35921ea7c41d6f ON librinfo_ecommerce_productoptionvalue (option_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_7b35921e77153098 ON librinfo_ecommerce_productoptionvalue (code)');
        $this->addSql('CREATE TABLE librinfo_crm_organismgroup__role (role_id UUID NOT NULL, organism_group_id UUID NOT NULL, PRIMARY KEY(role_id, organism_group_id))');
        $this->addSql('CREATE INDEX idx_3fd70c97d60322ac ON librinfo_crm_organismgroup__role (role_id)');
        $this->addSql('CREATE INDEX idx_3fd70c97d8099476 ON librinfo_crm_organismgroup__role (organism_group_id)');
        $this->addSql('CREATE TABLE librinfo_seedbatch_certification (id UUID NOT NULL, plot_id UUID DEFAULT NULL, certification_type_id UUID DEFAULT NULL, certifying_body_id UUID DEFAULT NULL, created_by_id UUID DEFAULT NULL, updated_by_id UUID DEFAULT NULL, code VARCHAR(255) NOT NULL, certification_date DATE DEFAULT NULL, start_date DATE DEFAULT NULL, expiry_date DATE DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_bdd68c74680d0b01 ON librinfo_seedbatch_certification (plot_id)');
        $this->addSql('CREATE INDEX idx_bdd68c7490af82a5 ON librinfo_seedbatch_certification (certification_type_id)');
        $this->addSql('CREATE INDEX idx_bdd68c74b03a8386 ON librinfo_seedbatch_certification (created_by_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_bdd68c7477153098 ON librinfo_seedbatch_certification (code)');
        $this->addSql('CREATE INDEX idx_bdd68c74896dbbde ON librinfo_seedbatch_certification (updated_by_id)');
        $this->addSql('CREATE INDEX idx_bdd68c745a38d544 ON librinfo_seedbatch_certification (certifying_body_id)');
        $this->addSql('CREATE TABLE librinfo_sonatasyliususer_sonatauser (id UUID NOT NULL, username VARCHAR(255) DEFAULT NULL, username_canonical VARCHAR(255) DEFAULT NULL, enabled BOOLEAN NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, password_reset_token VARCHAR(255) DEFAULT NULL, password_requested_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, email_verification_token VARCHAR(255) DEFAULT NULL, verified_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, locked BOOLEAN NOT NULL, expires_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, credentials_expire_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, roles TEXT NOT NULL, email VARCHAR(255) DEFAULT NULL, email_canonical VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, locale_code VARCHAR(12) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN librinfo_sonatasyliususer_sonatauser.roles IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE librinfo_varieties_variety__file (variety_id UUID NOT NULL, file_id UUID NOT NULL, PRIMARY KEY(variety_id, file_id))');
        $this->addSql('CREATE INDEX idx_4ec9b3a878c2bc47 ON librinfo_varieties_variety__file (variety_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_4ec9b3a893cb796c ON librinfo_varieties_variety__file (file_id)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_taxon (id UUID NOT NULL, tree_root UUID DEFAULT NULL, parent_id UUID DEFAULT NULL, code VARCHAR(255) NOT NULL, tree_left INT NOT NULL, tree_right INT NOT NULL, tree_level INT NOT NULL, "position" INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_45509bba727aca70 ON librinfo_ecommerce_taxon (parent_id)');
        $this->addSql('CREATE INDEX idx_45509bbaa977936c ON librinfo_ecommerce_taxon (tree_root)');
        $this->addSql('CREATE UNIQUE INDEX uniq_45509bba77153098 ON librinfo_ecommerce_taxon (code)');
        $this->addSql('CREATE TABLE librinfo_crm_addresssearchindex (id INT NOT NULL, object_id UUID DEFAULT NULL, field VARCHAR(255) NOT NULL, keyword VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_86fac1a7232d562b ON librinfo_crm_addresssearchindex (object_id)');
        $this->addSql('CREATE TABLE librinfo_seedbatch_plot (id UUID NOT NULL, producer_id UUID DEFAULT NULL, created_by_id UUID DEFAULT NULL, updated_by_id UUID DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, zip VARCHAR(20) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, npai BOOLEAN DEFAULT NULL, vcard_uid VARCHAR(255) DEFAULT NULL, confirmed BOOLEAN DEFAULT \'true\' NOT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_f108982089b658fe ON librinfo_seedbatch_plot (producer_id)');
        $this->addSql('CREATE UNIQUE INDEX search_idx ON librinfo_seedbatch_plot (producer_id, code)');
        $this->addSql('CREATE INDEX idx_f1089820896dbbde ON librinfo_seedbatch_plot (updated_by_id)');
        $this->addSql('CREATE INDEX idx_f1089820b03a8386 ON librinfo_seedbatch_plot (created_by_id)');
        $this->addSql('CREATE TABLE librinfo_crm_organismgroup (id UUID NOT NULL, organism_id UUID DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_c63d582964180a36 ON librinfo_crm_organismgroup (organism_id)');
        $this->addSql('CREATE TABLE librinfo_crm_circle__sonatauser (circle_id UUID NOT NULL, sonatauser_id UUID NOT NULL, PRIMARY KEY(circle_id, sonatauser_id))');
        $this->addSql('CREATE INDEX idx_968f0de170ee2ff6 ON librinfo_crm_circle__sonatauser (circle_id)');
        $this->addSql('CREATE INDEX idx_968f0de1e50749d6 ON librinfo_crm_circle__sonatauser (sonatauser_id)');
        $this->addSql('CREATE TABLE librinfo_ecommerce_payment (id UUID NOT NULL, method_id UUID DEFAULT NULL, order_id UUID NOT NULL, currency_code VARCHAR(3) NOT NULL, amount INT NOT NULL, state VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, details TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_fb4b829419883967 ON librinfo_ecommerce_payment (method_id)');
        $this->addSql('CREATE INDEX idx_fb4b82948d9f6d38 ON librinfo_ecommerce_payment (order_id)');
        $this->addSql('COMMENT ON COLUMN librinfo_ecommerce_payment.details IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE librinfo_varieties_variety (id UUID NOT NULL, parent_id UUID DEFAULT NULL, species_id UUID DEFAULT NULL, created_by_id UUID DEFAULT NULL, updated_by_id UUID DEFAULT NULL, latin_name VARCHAR(255) DEFAULT NULL, alias VARCHAR(255) DEFAULT NULL, code VARCHAR(15) DEFAULT NULL, life_cycle VARCHAR(20) DEFAULT NULL, official BOOLEAN DEFAULT NULL, official_name VARCHAR(255) DEFAULT NULL, official_date_in DATE DEFAULT NULL, official_date_out DATE DEFAULT NULL, official_maintainer VARCHAR(255) DEFAULT NULL, legal_germination_rate INT DEFAULT NULL, regulatory_status VARCHAR(255) DEFAULT NULL, germination_rate INT DEFAULT NULL, selection_advice VARCHAR(255) DEFAULT NULL, selection_criteria VARCHAR(255) DEFAULT NULL, misc_advice VARCHAR(255) DEFAULT NULL, tkw DOUBLE PRECISION DEFAULT NULL, seed_lifespan INT DEFAULT NULL, raise_duration INT DEFAULT NULL, seedhead_yield INT DEFAULT NULL, distance_on_line INT DEFAULT NULL, distance_between_lines INT DEFAULT NULL, plant_density INT DEFAULT NULL, area_per_kg INT DEFAULT NULL, seedheads_per_kg INT DEFAULT NULL, base_seed_per_kg INT DEFAULT NULL, transmitted_diseases VARCHAR(255) DEFAULT NULL, strain_characteristics VARCHAR(255) DEFAULT NULL, is_strain BOOLEAN DEFAULT NULL, plant_type VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_5eb36881b03a8386 ON librinfo_varieties_variety (created_by_id)');
        $this->addSql('CREATE INDEX idx_5eb36881b2a1d860 ON librinfo_varieties_variety (species_id)');
        $this->addSql('CREATE UNIQUE INDEX variety_name_idx ON librinfo_varieties_variety (name)');
        $this->addSql('CREATE INDEX idx_5eb36881727aca70 ON librinfo_varieties_variety (parent_id)');
        $this->addSql('CREATE INDEX idx_5eb36881896dbbde ON librinfo_varieties_variety (updated_by_id)');
        $this->addSql('CREATE TABLE librinfo_crm_position (id UUID NOT NULL, individual_id UUID NOT NULL, organization_id UUID NOT NULL, position_type_id UUID DEFAULT NULL, created_by_id UUID DEFAULT NULL, updated_by_id UUID DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, department VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, email_npai BOOLEAN DEFAULT NULL, email_no_newsletter BOOLEAN DEFAULT NULL, label VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_dd8351c432c8a3de ON librinfo_crm_position (organization_id)');
        $this->addSql('CREATE INDEX idx_dd8351c456bd9d60 ON librinfo_crm_position (position_type_id)');
        $this->addSql('CREATE INDEX idx_dd8351c4896dbbde ON librinfo_crm_position (updated_by_id)');
        $this->addSql('CREATE INDEX idx_dd8351c4b03a8386 ON librinfo_crm_position (created_by_id)');
        $this->addSql('CREATE INDEX idx_dd8351c4ae271c0d ON librinfo_crm_position (individual_id)');
        $this->addSql('CREATE TABLE librinfo_varieties_variety__plantcategory (plant_category_id UUID NOT NULL, variety_id UUID NOT NULL, PRIMARY KEY(plant_category_id, variety_id))');
        $this->addSql('CREATE INDEX idx_fccfb8cc78c2bc47 ON librinfo_varieties_variety__plantcategory (variety_id)');
        $this->addSql('CREATE INDEX idx_fccfb8ccc2d8da42 ON librinfo_varieties_variety__plantcategory (plant_category_id)');
        $this->addSql('CREATE TABLE librinfo_varieties_family (id UUID NOT NULL, created_by_id UUID DEFAULT NULL, updated_by_id UUID DEFAULT NULL, latin_name VARCHAR(255) DEFAULT NULL, alias VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_c6247d81b03a8386 ON librinfo_varieties_family (created_by_id)');
        $this->addSql('CREATE UNIQUE INDEX family_name_idx ON librinfo_varieties_family (name)');
        $this->addSql('CREATE INDEX idx_c6247d81896dbbde ON librinfo_varieties_family (updated_by_id)');
        $this->addSql('CREATE TABLE librinfo_varieties_genus (id UUID NOT NULL, family_id UUID DEFAULT NULL, created_by_id UUID DEFAULT NULL, updated_by_id UUID DEFAULT NULL, latin_name VARCHAR(255) DEFAULT NULL, alias VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX genus_name_idx ON librinfo_varieties_genus (name)');
        $this->addSql('CREATE INDEX idx_fcf51373896dbbde ON librinfo_varieties_genus (updated_by_id)');
        $this->addSql('CREATE INDEX idx_fcf51373b03a8386 ON librinfo_varieties_genus (created_by_id)');
        $this->addSql('CREATE INDEX idx_fcf51373c35e566a ON librinfo_varieties_genus (family_id)');
        $this->addSql('ALTER TABLE channel_description ADD CONSTRAINT fk_743ebf0772f5a1aa FOREIGN KEY (channel_id) REFERENCES sylius_channel (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE channel_description ADD CONSTRAINT fk_743ebf0778c2bc47 FOREIGN KEY (variety_id) REFERENCES librinfo_varieties_variety (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_address ADD CONSTRAINT fk_c639ee4164180a36 FOREIGN KEY (organism_id) REFERENCES librinfo_crm_organism (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_address ADD CONSTRAINT fk_c639ee41896dbbde FOREIGN KEY (updated_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_address ADD CONSTRAINT fk_c639ee41b03a8386 FOREIGN KEY (created_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_circle ADD CONSTRAINT fk_c28529c9896dbbde FOREIGN KEY (updated_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_circle ADD CONSTRAINT fk_c28529c9b03a8386 FOREIGN KEY (created_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lexik_trans_unit_translations ADD CONSTRAINT fk_b0aa394493cb796c FOREIGN KEY (file_id) REFERENCES lexik_translation_file (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lexik_trans_unit_translations ADD CONSTRAINT fk_b0aa3944c3c583c9 FOREIGN KEY (trans_unit_id) REFERENCES lexik_trans_unit (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_organism ADD CONSTRAINT fk_96fc3f1d12469de2 FOREIGN KEY (category_id) REFERENCES librinfo_crm_category (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_organism ADD CONSTRAINT fk_96fc3f1d3d371385 FOREIGN KEY (default_phone_id) REFERENCES librinfo_crm_organismphone (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_organism ADD CONSTRAINT fk_96fc3f1d896dbbde FOREIGN KEY (updated_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_organism ADD CONSTRAINT fk_96fc3f1db03a8386 FOREIGN KEY (created_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_organism ADD CONSTRAINT fk_96fc3f1dbd94fb16 FOREIGN KEY (default_address_id) REFERENCES librinfo_crm_address (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_organism ADD CONSTRAINT fk_96fc3f1dfe54d947 FOREIGN KEY (group_id) REFERENCES librinfo_ecommerce_customergroup (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_category ADD CONSTRAINT fk_9de3acf0b381ca9b FOREIGN KEY (tree_root_id) REFERENCES librinfo_crm_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_category ADD CONSTRAINT fk_9de3acf0b5ceae2f FOREIGN KEY (tree_parent_id) REFERENCES librinfo_crm_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE blast_custom_filters ADD CONSTRAINT fk_213ed3b7a76ed395 FOREIGN KEY (user_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_organism__circle ADD CONSTRAINT fk_dc4f991464180a36 FOREIGN KEY (organism_id) REFERENCES librinfo_crm_circle (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_organism__circle ADD CONSTRAINT fk_dc4f991470ee2ff6 FOREIGN KEY (circle_id) REFERENCES librinfo_crm_organism (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_organismphone ADD CONSTRAINT fk_efb28b3164180a36 FOREIGN KEY (organism_id) REFERENCES librinfo_crm_organism (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_position__circle ADD CONSTRAINT fk_cbc315d770ee2ff6 FOREIGN KEY (circle_id) REFERENCES librinfo_crm_circle (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_position__circle ADD CONSTRAINT fk_cbc315d7dd842e46 FOREIGN KEY (position_id) REFERENCES librinfo_crm_position (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_organismsearchindex ADD CONSTRAINT fk_e3fbdff2232d562b FOREIGN KEY (object_id) REFERENCES librinfo_crm_organism (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_province ADD CONSTRAINT fk_d175613af92f3e70 FOREIGN KEY (country_id) REFERENCES librinfo_crm_country (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_channel__currency ADD CONSTRAINT fk_7433589738248176 FOREIGN KEY (currency_id) REFERENCES sylius_currency (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_channel__currency ADD CONSTRAINT fk_7433589772f5a1aa FOREIGN KEY (channel_id) REFERENCES sylius_channel (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_channel__locale ADD CONSTRAINT fk_8cc92bbe72f5a1aa FOREIGN KEY (channel_id) REFERENCES sylius_channel (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_channel__locale ADD CONSTRAINT fk_8cc92bbee559dfd1 FOREIGN KEY (locale_id) REFERENCES sylius_locale (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_product__channel ADD CONSTRAINT fk_cc395b694584665a FOREIGN KEY (product_id) REFERENCES librinfo_ecommerce_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_product__channel ADD CONSTRAINT fk_cc395b6972f5a1aa FOREIGN KEY (channel_id) REFERENCES sylius_channel (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_invoice ADD CONSTRAINT fk_60611dd8d9f6d38 FOREIGN KEY (order_id) REFERENCES librinfo_ecommerce_order (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_orderitem ADD CONSTRAINT fk_58cb71813b69a9af FOREIGN KEY (variant_id) REFERENCES librinfo_ecommerce_productvariant (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_orderitem ADD CONSTRAINT fk_58cb71818d9f6d38 FOREIGN KEY (order_id) REFERENCES librinfo_ecommerce_order (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_product ADD CONSTRAINT fk_45290234731e505 FOREIGN KEY (main_taxon_id) REFERENCES librinfo_ecommerce_taxon (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_product ADD CONSTRAINT fk_4529023478c2bc47 FOREIGN KEY (variety_id) REFERENCES librinfo_varieties_variety (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_order__promotion ADD CONSTRAINT fk_ee637f5d139df194 FOREIGN KEY (promotion_id) REFERENCES sylius_promotion (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_order__promotion ADD CONSTRAINT fk_ee637f5d8d9f6d38 FOREIGN KEY (order_id) REFERENCES librinfo_ecommerce_order (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productimage ADD CONSTRAINT fk_810714bd7e3c61f9 FOREIGN KEY (owner_id) REFERENCES librinfo_ecommerce_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productimage ADD CONSTRAINT fk_810714bd94f4b9f8 FOREIGN KEY (real_file_id) REFERENCES librinfo_media_file (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productreview ADD CONSTRAINT fk_370338824584665a FOREIGN KEY (product_id) REFERENCES librinfo_ecommerce_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productreview ADD CONSTRAINT fk_37033882f675f31b FOREIGN KEY (author_id) REFERENCES librinfo_crm_organism (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productimage__productvariant ADD CONSTRAINT fk_b92ee5d93b69a9af FOREIGN KEY (variant_id) REFERENCES librinfo_ecommerce_productvariant (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productimage__productvariant ADD CONSTRAINT fk_b92ee5d93da5256d FOREIGN KEY (image_id) REFERENCES librinfo_ecommerce_productimage (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productvariant__productoptionvalue ADD CONSTRAINT fk_c78ca40c3b69a9af FOREIGN KEY (variant_id) REFERENCES librinfo_ecommerce_productvariant (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productvariant__productoptionvalue ADD CONSTRAINT fk_c78ca40cd957ca06 FOREIGN KEY (option_value_id) REFERENCES librinfo_ecommerce_productoptionvalue (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productvariant__seedbatch ADD CONSTRAINT fk_e3ba80921855be3f FOREIGN KEY (productvariant_id) REFERENCES librinfo_ecommerce_productvariant (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productvariant__seedbatch ADD CONSTRAINT fk_e3ba8092a97fd19e FOREIGN KEY (seedbatch_id) REFERENCES librinfo_seedbatch_seedbatch (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_shippingmethod__channel ADD CONSTRAINT fk_985cd66a5f7d6850 FOREIGN KEY (shipping_method_id) REFERENCES sylius_shipping_method (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_shippingmethod__channel ADD CONSTRAINT fk_985cd66a72f5a1aa FOREIGN KEY (channel_id) REFERENCES sylius_channel (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_email_emailtemplate ADD CONSTRAINT fk_5eafb5cf896dbbde FOREIGN KEY (updated_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_email_emailtemplate ADD CONSTRAINT fk_5eafb5cfb03a8386 FOREIGN KEY (created_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_email_email__position ADD CONSTRAINT fk_4fbf83b8a832c1c9 FOREIGN KEY (email_id) REFERENCES librinfo_email_email (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_email_email__position ADD CONSTRAINT fk_4fbf83b8dd842e46 FOREIGN KEY (position_id) REFERENCES librinfo_crm_position (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_email_email ADD CONSTRAINT fk_5de3f0ac5da0fb8 FOREIGN KEY (template_id) REFERENCES librinfo_email_emailtemplate (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_email_email ADD CONSTRAINT fk_5de3f0ac896dbbde FOREIGN KEY (updated_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_email_email ADD CONSTRAINT fk_5de3f0acb03a8386 FOREIGN KEY (created_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_email_emaillink ADD CONSTRAINT fk_e45cc1faa832c1c9 FOREIGN KEY (email_id) REFERENCES librinfo_email_email (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_taxrate ADD CONSTRAINT fk_e78aba0b12469de2 FOREIGN KEY (category_id) REFERENCES sylius_tax_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_taxrate ADD CONSTRAINT fk_e78aba0b9f2c3fab FOREIGN KEY (zone_id) REFERENCES librinfo_ecommerce_zone (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_email_emailsearchindex ADD CONSTRAINT fk_a0fffd5c232d562b FOREIGN KEY (object_id) REFERENCES librinfo_email_email (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_email_email__file ADD CONSTRAINT fk_ddc6786a93cb796c FOREIGN KEY (file_id) REFERENCES librinfo_media_file (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_email_email__file ADD CONSTRAINT fk_ddc6786aa832c1c9 FOREIGN KEY (email_id) REFERENCES librinfo_email_email (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_salesjournalitem ADD CONSTRAINT fk_6aa2a2032989f1fd FOREIGN KEY (invoice_id) REFERENCES librinfo_ecommerce_invoice (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_salesjournalitem ADD CONSTRAINT fk_6aa2a2034c3a3bb FOREIGN KEY (payment_id) REFERENCES librinfo_ecommerce_payment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_salesjournalitem ADD CONSTRAINT fk_6aa2a2038d9f6d38 FOREIGN KEY (order_id) REFERENCES librinfo_ecommerce_order (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_email_emailreceipt ADD CONSTRAINT fk_90137c36a832c1c9 FOREIGN KEY (email_id) REFERENCES librinfo_email_email (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_email_email__circle ADD CONSTRAINT fk_9003c9cb70ee2ff6 FOREIGN KEY (circle_id) REFERENCES librinfo_crm_circle (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_email_email__circle ADD CONSTRAINT fk_9003c9cba832c1c9 FOREIGN KEY (email_id) REFERENCES librinfo_email_email (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_email_email__organism ADD CONSTRAINT fk_4c0ed6164180a36 FOREIGN KEY (organism_id) REFERENCES librinfo_crm_organism (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_email_email__organism ADD CONSTRAINT fk_4c0ed61a832c1c9 FOREIGN KEY (email_id) REFERENCES librinfo_email_email (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_certifyingbody ADD CONSTRAINT fk_8f3d1bd5896dbbde FOREIGN KEY (updated_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_certifyingbody ADD CONSTRAINT fk_8f3d1bd5b03a8386 FOREIGN KEY (created_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_seedbatch ADD CONSTRAINT fk_c3ee4fe44b557494 FOREIGN KEY (seed_farm_id) REFERENCES librinfo_seedbatch_seedfarm (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_seedbatch ADD CONSTRAINT fk_c3ee4fe4680d0b01 FOREIGN KEY (plot_id) REFERENCES librinfo_seedbatch_plot (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_seedbatch ADD CONSTRAINT fk_c3ee4fe478c2bc47 FOREIGN KEY (variety_id) REFERENCES librinfo_varieties_variety (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_seedbatch ADD CONSTRAINT fk_c3ee4fe4896dbbde FOREIGN KEY (updated_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_seedbatch ADD CONSTRAINT fk_c3ee4fe489b658fe FOREIGN KEY (producer_id) REFERENCES librinfo_crm_organism (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_seedbatch ADD CONSTRAINT fk_c3ee4fe4b03a8386 FOREIGN KEY (created_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_email_emailtemplatesearchindex ADD CONSTRAINT fk_a7733671232d562b FOREIGN KEY (object_id) REFERENCES librinfo_email_emailtemplate (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_media_file ADD CONSTRAINT fk_715414b27e3c61f9 FOREIGN KEY (owner_id) REFERENCES librinfo_ecommerce_product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_certificationtype ADD CONSTRAINT fk_e21e2fae896dbbde FOREIGN KEY (updated_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_certificationtype ADD CONSTRAINT fk_e21e2faeb03a8386 FOREIGN KEY (created_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_certificationtype ADD CONSTRAINT fk_e21e2faef98f144a FOREIGN KEY (logo_id) REFERENCES librinfo_media_file (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_sonatasyliususer_sonatauser__sonatagroup ADD CONSTRAINT fk_fdce9333a76ed395 FOREIGN KEY (user_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_sonatasyliususer_sonatauser__sonatagroup ADD CONSTRAINT fk_fdce9333fe54d947 FOREIGN KEY (group_id) REFERENCES librinfo_sonatasyliususer_sonatagroup (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_seedbatchsearchindex ADD CONSTRAINT fk_78cc94d6232d562b FOREIGN KEY (object_id) REFERENCES librinfo_seedbatch_seedbatch (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_variety__productoptionvalue ADD CONSTRAINT fk_d44a64a678c2bc47 FOREIGN KEY (variety_id) REFERENCES librinfo_varieties_variety (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_variety__productoptionvalue ADD CONSTRAINT fk_d44a64a6e0211176 FOREIGN KEY (productoptionvalue_id) REFERENCES librinfo_ecommerce_productoptionvalue (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_plantcategory ADD CONSTRAINT fk_c6344514b381ca9b FOREIGN KEY (tree_root_id) REFERENCES librinfo_varieties_plantcategory (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_plantcategory ADD CONSTRAINT fk_c6344514b5ceae2f FOREIGN KEY (tree_parent_id) REFERENCES librinfo_varieties_plantcategory (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_species__plantcategory ADD CONSTRAINT fk_675259a4b2a1d860 FOREIGN KEY (species_id) REFERENCES librinfo_varieties_plantcategory (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_species__plantcategory ADD CONSTRAINT fk_675259a4c2d8da42 FOREIGN KEY (plant_category_id) REFERENCES librinfo_varieties_species (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_species ADD CONSTRAINT fk_c36a0e8485c4074c FOREIGN KEY (genus_id) REFERENCES librinfo_varieties_genus (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_species ADD CONSTRAINT fk_c36a0e84896dbbde FOREIGN KEY (updated_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_species ADD CONSTRAINT fk_c36a0e84b03a8386 FOREIGN KEY (created_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_species ADD CONSTRAINT fk_c36a0e84f5e25c30 FOREIGN KEY (parent_species_id) REFERENCES librinfo_varieties_species (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_stock_item ADD CONSTRAINT fk_e92535bba103eeb1 FOREIGN KEY (uom_id) REFERENCES sil_stock_uom (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_stock_item ADD CONSTRAINT fk_e92535bbb9ef6aa3 FOREIGN KEY (strategy_output_id) REFERENCES sil_stock_output_strategy (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_stock_unit ADD CONSTRAINT fk_2a851cf6210d48fe FOREIGN KEY (qty_uom_id) REFERENCES sil_stock_uom (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_stock_unit ADD CONSTRAINT fk_2a851cf6217a674b FOREIGN KEY (stockitem_id) REFERENCES sil_stock_stock_item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_stock_unit ADD CONSTRAINT fk_2a851cf6229e70a7 FOREIGN KEY (movement_id) REFERENCES sil_stock_movement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_stock_unit ADD CONSTRAINT fk_2a851cf664d218e FOREIGN KEY (location_id) REFERENCES sil_stock_location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_stock_unit ADD CONSTRAINT fk_2a851cf6f39ebe7a FOREIGN KEY (batch_id) REFERENCES sil_stock_batch (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_shipping_method ADD CONSTRAINT fk_5fb0ee1112469de2 FOREIGN KEY (category_id) REFERENCES sylius_shipping_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_shipping_method ADD CONSTRAINT fk_5fb0ee119df894ed FOREIGN KEY (tax_category_id) REFERENCES sylius_tax_category (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_shipping_method ADD CONSTRAINT fk_5fb0ee119f2c3fab FOREIGN KEY (zone_id) REFERENCES librinfo_ecommerce_zone (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_plotsearchindex ADD CONSTRAINT fk_5ab5f375232d562b FOREIGN KEY (object_id) REFERENCES librinfo_seedbatch_plot (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productvariant ADD CONSTRAINT fk_80bc7a9d4584665a FOREIGN KEY (product_id) REFERENCES librinfo_ecommerce_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productvariant ADD CONSTRAINT fk_80bc7a9d9df894ed FOREIGN KEY (tax_category_id) REFERENCES sylius_tax_category (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productvariant ADD CONSTRAINT fk_80bc7a9d9e2d1a41 FOREIGN KEY (shipping_category_id) REFERENCES sylius_shipping_category (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productvariant ADD CONSTRAINT fk_80bc7a9deec75ed7 FOREIGN KEY (stockitem_id) REFERENCES sil_stock_stock_item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_channel ADD CONSTRAINT fk_16c8119e3101778e FOREIGN KEY (base_currency_id) REFERENCES sylius_currency (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_channel ADD CONSTRAINT fk_16c8119e743bf776 FOREIGN KEY (default_locale_id) REFERENCES sylius_locale (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_channel ADD CONSTRAINT fk_16c8119ea978c17 FOREIGN KEY (default_tax_zone_id) REFERENCES librinfo_ecommerce_zone (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_varietydescription ADD CONSTRAINT fk_28fef35178c2bc47 FOREIGN KEY (variety_id) REFERENCES librinfo_varieties_variety (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_positionsearchindex ADD CONSTRAINT fk_32aefb0232d562b FOREIGN KEY (object_id) REFERENCES librinfo_crm_position (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_seedfarm ADD CONSTRAINT fk_d32b2865896dbbde FOREIGN KEY (updated_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_seedfarm ADD CONSTRAINT fk_d32b2865b03a8386 FOREIGN KEY (created_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_product__productoption ADD CONSTRAINT fk_39550b334584665a FOREIGN KEY (product_id) REFERENCES librinfo_ecommerce_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_product__productoption ADD CONSTRAINT fk_39550b33a7c41d6f FOREIGN KEY (option_id) REFERENCES librinfo_ecommerce_productoption (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_order ADD CONSTRAINT fk_eb1e2b8917b24436 FOREIGN KEY (promotion_coupon_id) REFERENCES sylius_promotion_coupon (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_order ADD CONSTRAINT fk_eb1e2b894d4cff2b FOREIGN KEY (shipping_address_id) REFERENCES librinfo_crm_address (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_order ADD CONSTRAINT fk_eb1e2b8972f5a1aa FOREIGN KEY (channel_id) REFERENCES sylius_channel (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_order ADD CONSTRAINT fk_eb1e2b8979d0c0e4 FOREIGN KEY (billing_address_id) REFERENCES librinfo_crm_address (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_order ADD CONSTRAINT fk_eb1e2b899395c3f3 FOREIGN KEY (customer_id) REFERENCES librinfo_crm_organism (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_order ADD CONSTRAINT fk_eb1e2b89ddeefab1 FOREIGN KEY (stockoperation_id) REFERENCES sil_stock_operation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_productoptionvalue ADD CONSTRAINT fk_7b35921ea7c41d6f FOREIGN KEY (option_id) REFERENCES librinfo_ecommerce_productoption (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_organismgroup__role ADD CONSTRAINT fk_3fd70c97d60322ac FOREIGN KEY (role_id) REFERENCES librinfo_crm_organismgroup (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_organismgroup__role ADD CONSTRAINT fk_3fd70c97d8099476 FOREIGN KEY (organism_group_id) REFERENCES librinfo_crm_role (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_certification ADD CONSTRAINT fk_bdd68c745a38d544 FOREIGN KEY (certifying_body_id) REFERENCES librinfo_seedbatch_certifyingbody (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_certification ADD CONSTRAINT fk_bdd68c74680d0b01 FOREIGN KEY (plot_id) REFERENCES librinfo_seedbatch_plot (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_certification ADD CONSTRAINT fk_bdd68c74896dbbde FOREIGN KEY (updated_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_certification ADD CONSTRAINT fk_bdd68c7490af82a5 FOREIGN KEY (certification_type_id) REFERENCES librinfo_seedbatch_certificationtype (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_certification ADD CONSTRAINT fk_bdd68c74b03a8386 FOREIGN KEY (created_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_variety__file ADD CONSTRAINT fk_4ec9b3a878c2bc47 FOREIGN KEY (variety_id) REFERENCES librinfo_varieties_variety (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_variety__file ADD CONSTRAINT fk_4ec9b3a893cb796c FOREIGN KEY (file_id) REFERENCES librinfo_media_file (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_taxon ADD CONSTRAINT fk_45509bba727aca70 FOREIGN KEY (parent_id) REFERENCES librinfo_ecommerce_taxon (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_taxon ADD CONSTRAINT fk_45509bbaa977936c FOREIGN KEY (tree_root) REFERENCES librinfo_ecommerce_taxon (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_addresssearchindex ADD CONSTRAINT fk_86fac1a7232d562b FOREIGN KEY (object_id) REFERENCES librinfo_crm_address (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_plot ADD CONSTRAINT fk_f1089820896dbbde FOREIGN KEY (updated_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_plot ADD CONSTRAINT fk_f108982089b658fe FOREIGN KEY (producer_id) REFERENCES librinfo_crm_organism (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_seedbatch_plot ADD CONSTRAINT fk_f1089820b03a8386 FOREIGN KEY (created_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_organismgroup ADD CONSTRAINT fk_c63d582964180a36 FOREIGN KEY (organism_id) REFERENCES librinfo_crm_organism (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_circle__sonatauser ADD CONSTRAINT fk_968f0de170ee2ff6 FOREIGN KEY (circle_id) REFERENCES librinfo_crm_circle (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_circle__sonatauser ADD CONSTRAINT fk_968f0de1e50749d6 FOREIGN KEY (sonatauser_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_payment ADD CONSTRAINT fk_fb4b829419883967 FOREIGN KEY (method_id) REFERENCES sylius_payment_method (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_ecommerce_payment ADD CONSTRAINT fk_fb4b82948d9f6d38 FOREIGN KEY (order_id) REFERENCES librinfo_ecommerce_order (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_variety ADD CONSTRAINT fk_5eb36881727aca70 FOREIGN KEY (parent_id) REFERENCES librinfo_varieties_variety (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_variety ADD CONSTRAINT fk_5eb36881896dbbde FOREIGN KEY (updated_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_variety ADD CONSTRAINT fk_5eb36881b03a8386 FOREIGN KEY (created_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_variety ADD CONSTRAINT fk_5eb36881b2a1d860 FOREIGN KEY (species_id) REFERENCES librinfo_varieties_species (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_position ADD CONSTRAINT fk_dd8351c432c8a3de FOREIGN KEY (organization_id) REFERENCES librinfo_crm_organism (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_position ADD CONSTRAINT fk_dd8351c456bd9d60 FOREIGN KEY (position_type_id) REFERENCES librinfo_crm_positiontype (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_position ADD CONSTRAINT fk_dd8351c4896dbbde FOREIGN KEY (updated_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_position ADD CONSTRAINT fk_dd8351c4ae271c0d FOREIGN KEY (individual_id) REFERENCES librinfo_crm_organism (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_crm_position ADD CONSTRAINT fk_dd8351c4b03a8386 FOREIGN KEY (created_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_variety__plantcategory ADD CONSTRAINT fk_fccfb8cc78c2bc47 FOREIGN KEY (variety_id) REFERENCES librinfo_varieties_plantcategory (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_variety__plantcategory ADD CONSTRAINT fk_fccfb8ccc2d8da42 FOREIGN KEY (plant_category_id) REFERENCES librinfo_varieties_variety (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_family ADD CONSTRAINT fk_c6247d81896dbbde FOREIGN KEY (updated_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_family ADD CONSTRAINT fk_c6247d81b03a8386 FOREIGN KEY (created_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_genus ADD CONSTRAINT fk_fcf51373896dbbde FOREIGN KEY (updated_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_genus ADD CONSTRAINT fk_fcf51373b03a8386 FOREIGN KEY (created_by_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE librinfo_varieties_genus ADD CONSTRAINT fk_fcf51373c35e566a FOREIGN KEY (family_id) REFERENCES librinfo_varieties_family (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE sil_stock_unit');
        $this->addSql('DROP TABLE sil_stock_item');
        $this->addSql('DROP TABLE sil_crm_phone_type');
        $this->addSql('DROP TABLE sil_crm_position_type');
        $this->addSql('DROP TABLE sil_crm_position');
        $this->addSql('DROP TABLE sil_crm_position__circle');
        $this->addSql('DROP TABLE sil_crm_role');
        $this->addSql('DROP TABLE sil_crm_country');
        $this->addSql('DROP TABLE sil_crm_organism_group');
        $this->addSql('DROP TABLE sil_crm_organsim_group__role');
        $this->addSql('DROP TABLE sil_crm_organism_phone');
        $this->addSql('DROP TABLE sil_crm_city');
        $this->addSql('DROP TABLE sil_crm_province');
        $this->addSql('DROP TABLE sil_crm_category');
        $this->addSql('DROP TABLE sil_crm_circle');
        $this->addSql('DROP TABLE sil_ecommerce_taxon');
        $this->addSql('DROP TABLE sil_ecommerce_product_option');
        $this->addSql('DROP TABLE sil_ecommerce_tax_rate');
        $this->addSql('DROP TABLE sil_ecommerce_sales_journal_item');
        $this->addSql('DROP TABLE sil_ecommerce_payment');
        $this->addSql('DROP TABLE sil_ecommerce_shipping_method');
        $this->addSql('DROP TABLE sylius_shipping_method_channels');
        $this->addSql('DROP TABLE sil_ecommerce_order_item');
        $this->addSql('DROP TABLE sil_ecommerce_customer_group');
        $this->addSql('DROP TABLE sil_ecommerce_zone');
        $this->addSql('DROP TABLE sil_ecommerce_product_attribute');
        $this->addSql('DROP TABLE sil_ecommerce_channel');
        $this->addSql('DROP TABLE sylius_channel_currencies');
        $this->addSql('DROP TABLE sylius_channel_locales');
        $this->addSql('DROP TABLE sil_ecommerce_product_image');
        $this->addSql('DROP TABLE sil_ecommerce_product_image__product_variant');
        $this->addSql('DROP TABLE sil_ecommerce_product_review');
        $this->addSql('DROP TABLE sil_ecommerce_invoice');
        $this->addSql('DROP TABLE sil_email_template');
        $this->addSql('DROP TABLE sil_email_receipt');
        $this->addSql('DROP TABLE sil_email_link');
        $this->addSql('DROP TABLE lisem_seed_batch_certification_type');
        $this->addSql('DROP TABLE lisem_seed_farm');
        $this->addSql('DROP TABLE lisem_seed_batch_plot');
        $this->addSql('DROP TABLE lisem_seed_batch_certification');
        $this->addSql('DROP TABLE lisem_seed_batch_certifying_body');
        $this->addSql('DROP TABLE sil_sonata_group');
        $this->addSql('DROP TABLE lisem_variety_description');
        $this->addSql('DROP TABLE lisem_variety_plant_category');
        $this->addSql('DROP TABLE sil_email');
        $this->addSql('DROP TABLE sil_email__file');
        $this->addSql('DROP TABLE sil_user');
        $this->addSql('DROP TABLE sil_sonata_user__group');
        $this->addSql('DROP TABLE sil_crm_organism');
        $this->addSql('DROP TABLE sil_crm_organism__circle');
        $this->addSql('DROP TABLE sil_media_file');
        $this->addSql('DROP TABLE sil_crm_address');
        $this->addSql('DROP TABLE sil_ecommerce_product');
        $this->addSql('DROP TABLE sylius_product_channels');
        $this->addSql('DROP TABLE sylius_product_options');
        $this->addSql('DROP TABLE lisem_variety');
        $this->addSql('DROP TABLE lisem_variety__plant_category');
        $this->addSql('DROP TABLE lisem_variety__product_option_value');
        $this->addSql('DROP TABLE lisem_variety__file');
        $this->addSql('DROP TABLE sil_ecommerce_product_variant');
        $this->addSql('DROP TABLE sylius_product_variant_option_value');
        $this->addSql('DROP TABLE lisem_variety_family');
        $this->addSql('DROP TABLE lisem_channel_description');
        $this->addSql('DROP TABLE sil_ecommerce_order');
        $this->addSql('DROP TABLE sylius_promotion_order');
        $this->addSql('DROP TABLE lisem_variety_genus');
        $this->addSql('DROP TABLE lisem_seed_batch');
        $this->addSql('DROP TABLE lisem_seed_batch__product_variant');
        $this->addSql('DROP TABLE sil_ecommerce_product_option_value');
        $this->addSql('DROP TABLE lisem_variety_species');
        $this->addSql('DROP TABLE lisem_variety_species__category');
        $this->addSql('DROP TABLE blast_custom_filter');
        $this->addSql('DROP TABLE blast_select_choice');
        $this->addSql('DROP TABLE sylius_admin_user');
        $this->addSql('ALTER TABLE sylius_adjustment ADD CONSTRAINT fk_aca6e0f28d9f6d38 FOREIGN KEY (order_id) REFERENCES librinfo_ecommerce_order (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_adjustment ADD CONSTRAINT fk_aca6e0f2e415fb15 FOREIGN KEY (order_item_id) REFERENCES librinfo_ecommerce_orderitem (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_stock_operation ADD operation_type_id UUID DEFAULT NULL');
        $this->addSql('ALTER TABLE sil_stock_operation ADD CONSTRAINT fk_e8d9ed2e668d0c5e FOREIGN KEY (operation_type_id) REFERENCES sil_stock_operation_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_E8D9ED2E668D0C5E ON sil_stock_operation (operation_type_id)');
        $this->addSql('ALTER TABLE sil_stock_movement ADD CONSTRAINT fk_78749426217a674b FOREIGN KEY (stockitem_id) REFERENCES sil_stock_stock_item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_admin_api_auth_code ADD CONSTRAINT fk_e366d848a76ed395 FOREIGN KEY (user_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_admin_api_access_token ADD CONSTRAINT fk_2aa4915da76ed395 FOREIGN KEY (user_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_manufacturing_bom ADD CONSTRAINT fk_6a250c85217a674b FOREIGN KEY (stockitem_id) REFERENCES sil_stock_stock_item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_admin_api_refresh_token ADD CONSTRAINT fk_9160e3faa76ed395 FOREIGN KEY (user_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_option_translation ADD CONSTRAINT fk_cba491ad2c2ac5d3 FOREIGN KEY (translatable_id) REFERENCES librinfo_ecommerce_productoption (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_channel_pricing ADD CONSTRAINT fk_7801820ca80ef684 FOREIGN KEY (product_variant_id) REFERENCES librinfo_ecommerce_productvariant (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_order_item_unit ADD CONSTRAINT fk_82bf226ee415fb15 FOREIGN KEY (order_item_id) REFERENCES librinfo_ecommerce_orderitem (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_attribute_translation ADD CONSTRAINT fk_93850eba2c2ac5d3 FOREIGN KEY (translatable_id) REFERENCES librinfo_ecommerce_productattribute (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_payment_method_channels ADD CONSTRAINT fk_543ac0cc72f5a1aa FOREIGN KEY (channel_id) REFERENCES sylius_channel (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('COMMENT ON COLUMN sylius_gateway_config.config IS NULL');
        $this->addSql('ALTER TABLE sylius_product_association ADD CONSTRAINT fk_48e9cdab4584665a FOREIGN KEY (product_id) REFERENCES librinfo_ecommerce_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('COMMENT ON COLUMN sylius_product_attribute_value.json_value IS NULL');
        $this->addSql('ALTER TABLE sylius_product_attribute_value ADD CONSTRAINT fk_8a053e544584665a FOREIGN KEY (product_id) REFERENCES librinfo_ecommerce_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_attribute_value ADD CONSTRAINT fk_8a053e54b6e62efa FOREIGN KEY (attribute_id) REFERENCES librinfo_ecommerce_productattribute (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_association_product ADD CONSTRAINT fk_a427b9834584665a FOREIGN KEY (product_id) REFERENCES librinfo_ecommerce_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_variant_translation ADD CONSTRAINT fk_8dc18edc2c2ac5d3 FOREIGN KEY (translatable_id) REFERENCES librinfo_ecommerce_productvariant (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_taxon ADD CONSTRAINT fk_169c6cd94584665a FOREIGN KEY (product_id) REFERENCES librinfo_ecommerce_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_taxon ADD CONSTRAINT fk_169c6cd9de13f470 FOREIGN KEY (taxon_id) REFERENCES librinfo_ecommerce_taxon (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_option_value_translation ADD CONSTRAINT fk_8d4382dc2c2ac5d3 FOREIGN KEY (translatable_id) REFERENCES librinfo_ecommerce_productoptionvalue (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_shop_user ADD CONSTRAINT fk_7c2b74809395c3f3 FOREIGN KEY (customer_id) REFERENCES librinfo_crm_organism (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_product_translation ADD CONSTRAINT fk_105a9082c2ac5d3 FOREIGN KEY (translatable_id) REFERENCES librinfo_ecommerce_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_shipping_method_translation ADD CONSTRAINT fk_2b37db3d2c2ac5d3 FOREIGN KEY (translatable_id) REFERENCES sylius_shipping_method (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_zone_member ADD CONSTRAINT fk_e8b5abf34b0e929b FOREIGN KEY (belongs_to) REFERENCES librinfo_ecommerce_zone (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_taxon_image ADD CONSTRAINT fk_dbe52b287e3c61f9 FOREIGN KEY (owner_id) REFERENCES librinfo_ecommerce_taxon (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_taxon_translation ADD CONSTRAINT fk_1487dfcf2c2ac5d3 FOREIGN KEY (translatable_id) REFERENCES librinfo_ecommerce_taxon (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_promotion_channels ADD CONSTRAINT fk_1a044f6472f5a1aa FOREIGN KEY (channel_id) REFERENCES sylius_channel (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sil_manufacturing_bom_line ADD CONSTRAINT fk_1e754391217a674b FOREIGN KEY (stockitem_id) REFERENCES sil_stock_stock_item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_user_oauth ADD CONSTRAINT fk_c3471b78a76ed395 FOREIGN KEY (user_id) REFERENCES librinfo_sonatasyliususer_sonatauser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_shipment ADD CONSTRAINT fk_fd707b3319883967 FOREIGN KEY (method_id) REFERENCES sylius_shipping_method (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_shipment ADD CONSTRAINT fk_fd707b338d9f6d38 FOREIGN KEY (order_id) REFERENCES librinfo_ecommerce_order (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function setContainer(?ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
