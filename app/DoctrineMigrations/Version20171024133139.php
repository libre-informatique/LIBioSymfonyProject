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
class Version20171024133139 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        if (!$schema->getTable('channel_description')->hasIndex('uniq_743ebf0772f5a1aa')) {
            return;
        }

        $this->addSql('DROP INDEX uniq_743ebf0772f5a1aa');
        $this->addSql('CREATE INDEX IDX_743EBF0772F5A1AA ON channel_description (channel_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        if ($schema->getTable('channel_description')->hasIndex('uniq_743ebf0772f5a1aa')) {
            return;
        }

        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP INDEX IDX_743EBF0772F5A1AA');
        $this->addSql('CREATE UNIQUE INDEX uniq_743ebf0772f5a1aa ON channel_description (channel_id)');
    }
}
