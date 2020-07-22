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
                throw new \LogicException('Only 2 Advert kind can be set up right now.');
            }

            return (new AdvertKind())
                ->setTitle($title)
            ;
        });

        $manager->flush();
    }
}
