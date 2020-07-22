<?php

namespace App\Service;

use App\Entity\Advert;
use App\Entity\AdvertKind;

class AdvertHelper
{
    public function isAdvertLocation(Advert $advert): bool
    {
        if ($advert->getAdvertKind() === null) {
            return false;
        }

        return $advert->getAdvertKind()->getTitle() === AdvertKind::LOCATION_TYPE_TITLE;
    }

    public function isAdvertSell(Advert $advert): bool
    {
        if ($advert->getAdvertKind() === null) {
            return false;
        }

        return $advert->getAdvertKind()->getTitle() === AdvertKind::SELL_TYPE_TITLE;
    }

    public function setPriceAccordingToKind(Advert $advert, int $price): Advert
    {
        if ($this->isAdvertSell($advert)) {
            $advert->setSellPrice($price);
        } elseif ($this->isAdvertLocation($advert)) {
            $advert->setRentPrice($price);
        } else {
            throw new \LogicException('Could not find what price has to be set.');
        }

        return $advert;
    }

    public function getPriceAccordingToKind(Advert $advert): int
    {
        if ($this->isAdvertLocation($advert)) {
            return $advert->getRentPrice();
        }

        if ($this->isAdvertSell($advert)) {
            return $advert->getSellPrice();
        }

        throw new \LogicException('Could not find a price for this Advert');
    }
}
