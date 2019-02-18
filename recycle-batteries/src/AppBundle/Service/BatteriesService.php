<?php

namespace AppBundle\Service;

use AppBundle\Entity\Batteries;
use AppBundle\Repository\BatteriesRepository;
use AppBundle\Wrapper\StatisticResultWrapper;
use Doctrine\ORM\EntityManagerInterface;

class BatteriesService
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var BatteriesRepository
     */
    private $batteriesRepo;

    /**
     * BatteriesService constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->batteriesRepo = $this->entityManager->getRepository(Batteries::class);
    }

    /**
     * @param Batteries $batteries
     * @return Batteries
     */
    public function save(Batteries $batteries)
    {
        return $this->batteriesRepo->save($batteries);
    }

    /**
     * @return array
     */
    public function getStatistic()
    {
        $data = $this->batteriesRepo->getStatistic();
        return $this->prepareStatisticResult($data);
    }

    /**
     * @param $data
     * @return array
     */
    private function prepareStatisticResult($data)
    {
        $statisticResult = [];
        foreach ($data as $item) {
            $statisticResultWrapper = new StatisticResultWrapper();
            $statisticResultWrapper->setBattery($item['batteryObject']);
            $statisticResultWrapper->setQuantity($item['amount']);
            $statisticResult[] = $statisticResultWrapper;
        }

        return $statisticResult;
    }
}