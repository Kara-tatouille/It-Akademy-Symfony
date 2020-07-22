<?php

namespace App\Service;

class PriceHelper
{
    public function centimesToEuros($centimes): string
    {
        //thousands_sep is a non-breaking space
        return number_format(($centimes / 100), 2, ',', " ") . ' €';
    }
}
