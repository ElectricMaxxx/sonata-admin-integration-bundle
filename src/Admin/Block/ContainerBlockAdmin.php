<?php

/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2017 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Cmf\Bundle\SonataPhpcrAdminIntegrationBundle\Admin\Block;

use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * @author Lukas Kahwe Smith <smith@pooteeweet.org>
 */
class ContainerBlockAdmin extends AbstractBlockAdmin
{
    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', 'text')
            ->add('name', 'text')
            ->add(
                'children',
                'sonata_type_collection',
                ['label' => false, 'by_reference' => false, 'cascade_validation' => true],
                [
                    'admin_code' => 'cmf_sonata_phpcr_admin_integration.block.simple_admin',
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'position'
                ]
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', 'doctrine_phpcr_nodename')
        ;
    }
}
