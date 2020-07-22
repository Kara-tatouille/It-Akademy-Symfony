<?php

namespace App\Twig;

use App\Service\PriceHelper;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    private $priceHelper;

    public function __construct(PriceHelper $priceHelper)
    {
        $this->priceHelper = $priceHelper;
    }

    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('toEuros', [$this, 'toEuros']),
        ];
    }

    public function toEuros($value)
    {
        if (!is_numeric($value) ) {
            throw new \InvalidArgumentException('Cannot convert a non numeric value to Euros');
        }

        return $this->priceHelper->centimesToEuros($value);
    }
}
