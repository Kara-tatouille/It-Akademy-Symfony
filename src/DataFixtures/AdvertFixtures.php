<?php

namespace App\DataFixtures;


use App\Entity\Advert;
use App\Entity\AdvertType;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AdvertFixtures extends BaseFixture implements DependentFixtureInterface
{
    protected function loadData(ObjectManager $manager): void
    {
        $this->createMany(10, 'adverts', function () {
            $rentPrice = round($this->faker->numberBetween(30000, 100000), -1);
            $sellPrice = round($rentPrice * 100, -2);
            /** @var AdvertType $advertType */
            $advertType = $this->getRandomReference('advertTypes');

            return (new Advert())
                ->setTitle($this->faker->sentence(3))
                ->setDescription($this->faker->paragraph)
                ->setRentPrice($rentPrice)
                ->setSellPrice($sellPrice)
                ->setAdvertType($advertType)
            ;
        });

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AdvertTypeFixtures::class,
        ];
    }
}
