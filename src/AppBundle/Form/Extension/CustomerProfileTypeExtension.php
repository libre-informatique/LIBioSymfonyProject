<?php

namespace AppBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Sylius\Bundle\CustomerBundle\Form\Type\CustomerProfileType;

class CustomerProfileTypeExtension extends AbstractTypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$builder->remove('birthday');
    }

    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
        return CustomerProfileType::class;
    }
}
