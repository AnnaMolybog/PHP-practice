<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Type;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadTypeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $typeAaa = new Type();
        $typeAaa->setTypeName('AAA');

        $manager->persist($typeAaa);
        $manager->flush();

        $this->addReference('aaa-type', $typeAaa);

        $typeBbb = new Type();
        $typeBbb->setTypeName('BBB');

        $manager->persist($typeBbb);
        $manager->flush();

        $this->addReference('bbb-type', $typeBbb);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}