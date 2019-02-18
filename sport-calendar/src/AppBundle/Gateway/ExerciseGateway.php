<?php

namespace AppBundle\Gateway;

use AppBundle\Entity\Exercise;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class ExerciseGateway
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var EntityRepository
     */
    private $exerciseRepository;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->exerciseRepository = $entityManager->getRepository(Exercise::class);
    }

    public function getExercises(User $user)
    {
        $query = $this->exerciseRepository->createQueryBuilder('e')
            ->where('e.exerciseDate BETWEEN :dateFrom AND :dateTo AND e.user = :user')
            ->setParameter('dateFrom', new \DateTime('-2 week'), \Doctrine\DBAL\Types\Type::DATE)
            ->setParameter('dateTo', new \DateTime('today'), \Doctrine\DBAL\Types\Type::DATE)
            ->setParameter('user', $user);
        return $query->getQuery()->getResult();
    }
}
