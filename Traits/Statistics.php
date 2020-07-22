<?php

class Statistics
{
    public static function kitType(int $kit_id):int
    {
        $result = \App\Models\Event::all()->where('event_name','kit_paid')->where('event_value',["event_name"=>"kit_paid", "event_value"=>["kit_id"=>$kit_id]])->count();
        return $result;
    }
}
