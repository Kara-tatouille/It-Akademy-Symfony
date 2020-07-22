<?php

namespace App\DataFixtures;


use App\Entity\AdvertType;
use Doctrine\Persistence\ObjectManager;

class AdvertTypeFixtures extends BaseFixture
{
    protected function loadData(ObjectManager $manager): void
    {
        $this->createMany(2, 'advertTypes', function ($i) {
            if ($i === 0) {
                $title = AdvertType::LOCATION_TYPE_TITLE;
            } elseif ($i === 1) {
                $title = AdvertType::SELL_TYPE_TITLE;
            } else {
                // Random word if more than 2 AdvertType is created
                $title = ucfirst($this->faker->word);
            }

            return (new AdvertType())
                ->setTitle($title)
            ;
        });

        $manager->flush();
    }
}
