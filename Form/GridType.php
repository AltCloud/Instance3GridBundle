<?php

namespace AltCloud\Instance3GridBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class GridType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('dir', 'text', array('required' => false))
            ->add('style_props', 'text', array('required' => false))
            ->add('class_props', 'text', array('required' => false))
            ->add('target_controller', 'text', array('required' => false))
            ->add('target_params', 'text', array('required' => false))
			->add('parent', 'entity', array(
    								'class' => 'ACInst3GridBundle:Grid',
//    							    'empty_value' => "None",
    							    'required' => false,
    								'property' => 'title'	
									)
				 );
    }

    public function getName()
    {
        return 'altcloud_instance3gridbundle_gridtype';
    }
}
