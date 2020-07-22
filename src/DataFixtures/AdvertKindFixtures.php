<?php

namespace App\DataFixtures;


use App\Entity\AdvertKind;
use Doctrine\Persistence\ObjectManager;

class AdvertKindFixtures extends BaseFixture
{
    protected function loadData(ObjectManager $manager): void
    {
        $this->createMany(2, 'advertKinds', function ($i) {
            if ($i === 0) {
                $title = AdvertKind::LOCATION_TYPE_TITLE;
            } elseif ($i === 1) {
                $title = AdvertKind::SELL_TYPE_TITLE;
            } else {
                // Random word if more than 2 AdvertKind is created
                $title = ucfirst($this->faker->word);
            }

            return (new AdvertKind())
                ->setTitle($title)
            ;
        });

        $manager->flush();
    }
}
