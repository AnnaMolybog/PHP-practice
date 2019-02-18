<?php

namespace AppBundle\Service;

use AppBundle\Entity\Type;
use AppBundle\Repository\TypeRepository;
use Doctrine\ORM\EntityManagerInterface;

class TypeService
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var TypeRepository
     */
    private $typeRepo;

    /**
     * TypeService constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->typeRepo = $this->entityManager->getRepository(Type::class);
    }

    /**
     * @return array
     */
    public function getBatteriesTypes()
    {
        return $this->typeRepo->getTypesList();
    }
}