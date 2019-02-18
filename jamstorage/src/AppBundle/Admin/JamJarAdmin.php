<?php

namespace App\AppBundle\Admin;

use App\AppBundle\Entity\JamJar;
use App\AppBundle\Entity\JamType;
use App\AppBundle\Entity\ProductionYear;
use App\AppBundle\Service\JamJarService;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;

class JamJarAdmin extends AbstractAdmin
{
    /**
     * @var JamJarService
     */
    protected $jamJarService;

    /**
     * JamJarAdmin constructor.
     * @param $code
     * @param $class
     * @param $baseControllerName
     * @param JamJarService $jamJarService
     */
    public function __construct($code, $class, $baseControllerName, JamJarService $jamJarService)
    {
        parent::__construct($code, $class, $baseControllerName);
        $this->jamJarService = $jamJarService;
    }

    /**
     * @param JamJar $object
     * @return string
     */
    public function toString($object): string
    {
        return ($object instanceof JamJar) ? $object->getType()->getName() : 'jam';
    }

    /**
     * @param object $object
     * @return JamJar
     */
    public function create($object): JamJar
    {
        /** @var JamJar $object */
        for ($item = $object->getAmount(); $item > 0; $item--) {
            parent::create($this->jamJarService->createNewInstance($object));
        }

        return $object;
    }

    /**
     * @param FormMapper $form
     */
    protected function configureFormFields(FormMapper $form)
    {
        $form->add('type', EntityType::class, [
                'class' => JamType::class,
                'choice_label' => 'name'
            ])
            ->add('yearOfProduction', EntityType::class, [
                'class' => ProductionYear::class,
                'choice_label' => 'name'
            ])
            ->add('comment', TextType::class, ['required' => false])
            ->add('amount', IntegerType::class);
    }

    /**
     * @param ListMapper $list
     */
    protected function configureListFields(ListMapper $list)
    {
        $list->add('type', EntityType::class, [
                'class' => JamType::class,
                'associated_property' => 'name',
            ])
            ->add('yearOfProduction', EntityType::class, [
                'class' => ProductionYear::class,
                'associated_property' => 'name',
            ])
            ->add('comment', TextType::class);
    }
}
