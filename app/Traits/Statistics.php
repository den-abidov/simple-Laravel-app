<?php

namespace App\Traits;

/**
 * Class Statistics
 * @package App\Traits
 */
class Statistics
{
    /**
     * @return string самая ранняя дата в таблице
     */
    public static function getMinDate():string
    {
        return \App\Models\Event::get('date')->min()['date'];
    }

    /**
     * @return string самая поздная дата в таблице
     */

    public static function getMaxDate():string
    {
        return \App\Models\Event::get('date')->max()['date'];
    }

    /**
     * @return array даты из таблицы, отсортированные в порядке возрастания
     */
    public static function getDates():array
    {
        return collect(\App\Models\Event::get('date')->sort())->unique()->pluck('date')->toArray();
    }

    /**
     * @param int $kit_id
     * @return int число всех пакетов в таблице с указанным $kit_id
     */
    public static function countAllKits(int $kit_id):int
    {
        return \App\Models\Event::all()->where('event_name','kit_paid')->where('event_value',["kit_id" => $kit_id])->count();
    }

    /**
     * @param int $kit_id
     * @param string $date
     * @return int число всех пакетов с указанным $kit_id на указанную дату $date
     */
    public static function countKitsForDate(int $kit_id, string $date):int
    {
        return \App\Models\Event::all()->where('date',$date)->where('event_name','kit_paid')->where('event_value',["kit_id" => $kit_id])->count();
    }

    /**
     * @param int $kit_id
     * @return array массив количества пакетов с $kit_id, на каждую дату, сортированные по датам
     */
    public static function getKits(int $kit_id):array
    {
        $dates = self::getDates();
        $result = [];
        foreach($dates as $date)
        {
            $result[] = self::countKitsForDate($kit_id, $date);
        }
        return $result;
    }
}
