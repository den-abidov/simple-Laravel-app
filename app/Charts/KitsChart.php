<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Traits\Statistics;

class KitsChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $dates = Statistics::getDates();
        $kits1 = Statistics::getKits(1);
        $kits2 = Statistics::getKits(2);
        $kits3 = Statistics::getKits(3);

        return Chartisan::build()
            ->labels($dates)
            ->dataset("Стандарт", $kits1)
            ->dataset("Бизнес", $kits2)
            ->dataset("Премиум", $kits3);

        /*return Chartisan::build()
            ->labels(['First', 'Second', 'Third'])
            ->dataset('Sample', [1, 2, 3])
            ->dataset('Sample 2', [3, 2, 1]);*/
    }
}
