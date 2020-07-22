<?php

namespace App\DataFixtures;


use App\Entity\Advert;
use App\Entity\AdvertKind;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AdvertFixtures extends BaseFixture implements DependentFixtureInterface
{
    protected function loadData(ObjectManager $manager): void
    {
        $this->createMany(10, 'adverts', function () {
            $rentPrice = round($this->faker->numberBetween(30000, 100000), -1);
            $sellPrice = round($rentPrice * 100, -2);
            /** @var AdvertKind $advertKind */
            $advertKind = $this->getRandomReference('advertKinds');

            return (new Advert())
                ->setTitle($this->faker->sentence(3))
                ->setDescription($this->faker->paragraph)
                ->setRentPrice($rentPrice)
                ->setSellPrice($sellPrice)
                ->setAdvertKind($advertKind)
            ;
        });

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AdvertKindFixtures::class,
        ];
    }
}
