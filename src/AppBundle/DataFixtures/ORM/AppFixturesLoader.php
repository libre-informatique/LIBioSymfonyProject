<?php

namespace AppBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Doctrine\DataFixtures\AbstractLoader;

class AppFixturesLoader extends AbstractLoader
{
    /**
     * {@inheritDoc}
     */
    public function getFixtures()
    {
        return  [
            '@LibrinfoUserBundle/DataFixtures/ORM/users.yml',
            '@LibrinfoVarietiesBundle/DataFixtures/ORM/varieties.yml',
            '@LibrinfoCRMBundle/DataFixtures/ORM/organisms.yml',
        ];
    }

    public function concat(...$strings)
    {
        $result = '';
        foreach ($strings as $string)
            $result .= $string;
        return $result;
    }
}