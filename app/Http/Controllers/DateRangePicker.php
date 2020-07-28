<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\KitsChart;

class DateRangePicker extends Controller
{
    public function showPage(Request $request)
    {
        $start_date = "Дата не выбрана";
        $end_date = "Дата не выбрана";
        return view('date_range_picker', [
            'start_date'=>$start_date,
            'end_date'=>$end_date,
        ]);
    }

    public function update(Request $request)
    {
        return view('date_range_picker');
    }
}
