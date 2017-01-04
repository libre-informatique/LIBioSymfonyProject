<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Librinfo\SeedBatchBundle\Admin;

use Blast\CoreBundle\Admin\CoreAdmin;
use Blast\CoreBundle\Admin\Traits\Base as BaseAdmin;
use Librinfo\SeedBatchBundle\Entity\Plot;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class PlotAdmin extends CoreAdmin
{
    use BaseAdmin;
    
    /**
     * @param FormMapper $mapper
     */
    protected function configureFormFields(FormMapper $mapper)
    {
        parent::configureFormFields($mapper);
        
        //
        $mapper->get('producer')->setAttribute('callback', function($admin, $property, $value) {
            $datagrid = $admin->getDatagrid();
            $qb = $datagrid->getQuery();
            $qb->andWhere($qb->expr()->orX(
                $qb->getRootAlias() . '.name LIKE :value',
                $qb->getRootAlias() . '.seedProducerCode LIKE :value'
            )); 
            $qb->setParameter('value', "%$value%");
            $datagrid->setValue('seeProducerCode', null, $value);            
        });
    }       

    /**
     * @param Plot $plot
     * @param string $property  (not used)
     * @return string
     */
    public static function autocompleteToString(Plot $plot, $property)
    {
        return sprintf('%s [%s] [%s]', $plot->getName(), $plot->getCode(), $plot->getProducer()->getName());
    }

    /**
     * @param ErrorElement $errorElement
     * @param Plot         $object
     *
     * @deprecated this feature cannot be stable, use a custom validator,
     *             the feature will be removed with Symfony 2.2
     */
    public function validate(ErrorElement $errorElement, $object)
    {
        $this->validateCode($errorElement, $object);
    }

    /**
     * Plot code validator
     *
     * @param ErrorElement $errorElement
     * @param Plot $object
     */
    public function validateCode(ErrorElement $errorElement, $object)
    {
        $code = $object->getCode();
        $registry = $this->getConfigurationPool()->getContainer()->get('blast_core.code_generators');
        $codeGenerator = $registry->getCodeGenerator(Plot::class);
        if ( !empty($code) && !$codeGenerator->validate($code) ) {
            $msg = 'Wrong format for plot code. It shoud be: ' . $codeGenerator::getHelp();
            $errorElement
                ->with('code')
                    ->addViolation($msg)
                ->end()
            ;
        }
    }
}