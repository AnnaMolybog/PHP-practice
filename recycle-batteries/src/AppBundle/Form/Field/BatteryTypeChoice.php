<?php

namespace AppBundle\Form\Field;

use AppBundle\Entity\Type;
use AppBundle\Service\TypeService;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BatteryTypeChoice extends AbstractType
{
    /**
     * @var TypeService
     */
    private $typeService;

    /**
     * BatteryTypeChoice constructor.
     * @param TypeService $typeService
     */
    public function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
    }

    /**
     * {@inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'label' => 'Type',
            'class' => Type::class,
            'choices' => $this->typeService->getBatteriesTypes(),
            'choice_label' => 'typeName',
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function getParent(): string
    {
        return ChoiceType::class;
    }
}
