<?php
namespace App\CmsBundle\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class TrinityEntityType extends AbstractType	 {

    public function getName() {
        return $this->getBlockPrefix();
    }

    public function getBlockPrefix() {
        return 'trinity_entity';
    }

    /**
	 * {@inheritdoc}
	 */
	public function getParent()
	{
	    return EntityType::class;
	}
}