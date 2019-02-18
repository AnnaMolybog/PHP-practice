<?php

namespace App\Tests\AppBundle\Service;

use App\AppBundle\Entity\JamJar;
use App\AppBundle\Entity\JamType;
use App\AppBundle\Entity\ProductionYear;
use App\AppBundle\Service\JamJarService;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class JamJarServiceTest extends TestCase
{
    /**
     * @param JamJar $jamJar
     * @dataProvider jamDataProvider
     */
    public function testCreateNewInstance(JamJar $jamJar)
    {
        $service = new JamJarService();
        $result = $service->createNewInstance($jamJar);
        $this->assertEquals($jamJar, $result);
    }

    public function jamDataProvider()
    {
        return [
            [
                (new JamJar())
                    ->setType((new JamType())->setName('Apple'))
                    ->setYearOfProduction((new ProductionYear())->setName(2017))
                    ->setComment('Comment')
            ]
        ];
    }
}
