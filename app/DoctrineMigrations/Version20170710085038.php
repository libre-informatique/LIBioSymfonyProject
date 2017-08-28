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
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170710085038 extends AbstractMigration implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    private $seedProducerID = 'b907691c-963f-4a7c-9098-5a95335cf21d';

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $existingCirclePRO = $this->container->get('doctrine')->getRepository('LibrinfoCRMBundle:Circle')->findOneBy([
            'code' => 'PRO',
        ]);

        if ($existingCirclePRO && $existingCirclePRO->getId() !== 'b907691c-963f-4a7c-9098-5a95335cf21d') {
            $tables = [
                'librinfo_crm_circle__sonatauser' => 'circle_id',
                'librinfo_crm_organism__circle' => 'circle_id',
                'librinfo_crm_position__circle' => 'circle_id',
            ];

            // Move Items to new PRO circle
            foreach ($tables as $tableName => $fieldName) {
                $this->addSql(
                    sprintf('
                        UPDATE
                            %1$s
                        SET
                            %2$s = \'%3$s\'
                        WHERE
                            %2$s = \'%4$s\'',
                        $tableName,
                        $fieldName,
                        $this->seedProducerID,
                        $existingCirclePRO->getId()
                    )
                );
            }

            // Remove old circle PRO
            $this->addSql(
                sprintf('
                    DELETE FROM
                        librinfo_crm_circle
                    WHERE
                        id = \'%s\'',
                    $existingCirclePRO->getId()
                )
            );
        }

        // change PROD to PRO circle
        $this->addSql(
            sprintf('
                UPDATE
                    librinfo_crm_circle
                SET
                    name = \'Producteur de semences\',
                    description = \'Producteur de semences\',
                    code = \'PRO\'
                WHERE
                    id = \'%s\'',
                $this->seedProducerID
            )
        );
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql(
            sprintf("
                UPDATE
                    librinfo_crm_circle
                SET
                    name = 'Seed Producer',
                    description = 'Seed Producer',
                    code = 'PROD'
                WHERE
                    id = '%s'", $this->seedProducerID
            )
        );
    }

    /**
     * @return ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param ContainerInterface container
     *
     * @return self
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;

        return $this;
    }
}
