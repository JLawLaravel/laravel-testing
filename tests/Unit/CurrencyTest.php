<?php

use App\Services\CurrencyService;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    public function test_convert_usd_to_eur_successful()
    {
        $this->assertEquals(98, (new CurrencyService())->convert(100, 'usd', 'eur'));
    }

    public function test_convert_usd_to_gbp_returns_zero()
    {
        $this->assertEquals(0, (new CurrencyService())->convert(100, 'usd', 'gbp'));
    }
}

// test('convert usd to eur', function () {
//     $convertCurrency = (new CurrencyService())->convert(100, 'usd', 'eur');

//     expect($convertCurrency)
//         ->toBeFloat()
//         ->toEqual(98.0);
// });

// test('convert usd to gbp returns zero', function () { 
//     $convertedCurrency = (new CurrencyService())->convert(100, 'usd', 'gbp');
 
//     expect($convertedCurrency)
//         ->toBeFloat()
//         ->toEqual(0.0);
// }); 