<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Statistics;

class Test extends Controller
{
    public function test(Request $request)
    {
        // $result = Statistics::getMinDate();
        // $result = Statistics::getMaxDate();
        // $result = Statistics::getDates();
        // $result = Statistics::countAllKits(3);
        // gettype(...);
        // $result = Statistics::countAllKits(3);
        // $result = Statistics::countKitsForDate(1, "2020-07-03");
        // $result = Statistics::getDates();
        // $result = Statistics::getKits(1);
        $result = Statistics::getDatesBetween('2020-07-02', '2020-07-11');
        dd($result);
    }
}
