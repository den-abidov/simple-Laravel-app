<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowChart extends Controller
{
    public function showPage(Request $request)
    {
        $kits_type1 = \App\Models\Event::all()->where('event_name','kit_paid')->where('event_value',["event_name"=>"kit_paid", "event_value"=>["kit_id"=>1]])->count();
        $kits_type2 = \App\Models\Event::all()->where('event_name','kit_paid')->where('event_value',["event_name"=>"kit_paid", "event_value"=>["kit_id"=>2]])->count();
        $kits_type3 = \App\Models\Event::all()->where('event_name','kit_paid')->where('event_value',["event_name"=>"kit_paid", "event_value"=>["kit_id"=>3]])->count();
        dd($kits_type1);
        return view('chart');
    }
}
