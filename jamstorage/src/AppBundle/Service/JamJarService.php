<?php

namespace App\AppBundle\Service;

use App\AppBundle\Entity\JamJar;

class JamJarService
{
    /**
     * @param JamJar $jamJar
     * @return JamJar
     */
    public function createNewInstance(JamJar $jamJar): JamJar
    {
        return (new JamJar())
            ->setYearOfProduction($jamJar->getYearOfProduction())
            ->setType($jamJar->getType())
            ->setComment($jamJar->getComment());
    }
}
