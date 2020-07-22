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
            /** @var AdvertKind $advertKind */
            $advertKind = $this->getRandomReference('advertKinds');

            $advert = (new Advert())
                ->setTitle($this->faker->sentence(3))
                ->setDescription($this->faker->paragraph(2))
                ->setAdvertKind($advertKind)
            ;

            if ($advertKind->getTitle() === AdvertKind::LOCATION_TYPE_TITLE) {
                $advert->setRentPrice(round($this->faker->numberBetween(30000, 100000), -3));
            } elseif ($advertKind->getTitle() === AdvertKind::SELL_TYPE_TITLE) {
                $advert->setSellPrice(round($this->faker->numberBetween(200000, 10000000), -5));
            } else {
                throw new \LogicException('Could not set price of Advert fixture : AdvertKind not recognized');
            }

            return $advert;
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
