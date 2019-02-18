<?php
namespace AppBundle\Wrapper;

use AppBundle\Entity\Batteries;

class StatisticResultWrapper
{
    /**
     * @var Batteries $battery
     */
    private $battery;

    /**
     * @var integer
     */
    private $quantity;

    /**
     * @param Batteries $battery
     * @return StatisticResultWrapper
     */
    public function setBattery(Batteries $battery): StatisticResultWrapper
    {
        $this->battery = $battery;
        return $this;
    }

    /**
     * @return Batteries
     */
    public function getBattery()
    {
        return $this->battery;
    }

    /**
     * @param int $quantity
     * @return StatisticResultWrapper
     */
    public function setQuantity(int $quantity): StatisticResultWrapper
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
}
