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
class Version20171102113651 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        if ($schema->getTable('librinfo_ecommerce_order')->hasColumn('stockOperation_id')) {
            return;
        }

        $this->addSql('ALTER TABLE librinfo_ecommerce_order ADD stockOperation_id UUID DEFAULT NULL');
        $this->addSql('ALTER TABLE librinfo_ecommerce_order ADD CONSTRAINT FK_EB1E2B89DDEEFAB1 FOREIGN KEY (stockOperation_id) REFERENCES sil_stock_operation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_EB1E2B89DDEEFAB1 ON librinfo_ecommerce_order (stockOperation_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        if (!$schema->getTable('librinfo_ecommerce_order')->hasColumn('stockOperation_id')) {
            return;
        }

        $this->addSql('ALTER TABLE librinfo_ecommerce_order DROP CONSTRAINT FK_EB1E2B89DDEEFAB1');
        $this->addSql('DROP INDEX IDX_EB1E2B89DDEEFAB1');
        $this->addSql('ALTER TABLE librinfo_ecommerce_order DROP stockOperation_id');
    }
}
