<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Event;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Event::class, function (Faker $faker) {
    $events = [Event::EVENT_FEE_PAID, Event::EVENT_KIT_PAID, Event::EVENT_KIT_PAYMENT, Event::EVENT_REPORT, Event::EVENT_STATUS_CHANGE];
    $statuses = ['registered', 'verified', 'passive', 'active'];
    $payments = [100, 200, 300, 400, 500, 1000, 2000];
    $activities = ['has_made_some_payments', 'has_made_all_payments'];
    $random_boolean = (rand(0,1) == 1);
    $report_values = [
        ['status' => $faker->randomElement($statuses)],
        ['activity'=> $faker->randomElement($activities), 'value' => $random_boolean]
    ];

    $event_name = $faker->randomElement($events);
    $event_value = null;
    switch($event_name){
        case Event::EVENT_FEE_PAID: $event_value = ['amount' => 500 ]; break;
        case Event::EVENT_KIT_PAID: $event_value = ['kit_id' => $faker->randomElement([1,2,3])]; break;
        case Event::EVENT_KIT_PAYMENT: $event_value = ['user_id_to' => $faker->randomDigit(), 'amount'=> $faker->randomElement($payments)]; break;
        case Event::EVENT_STATUS_CHANGE: $event_value = ['status' => $faker->randomElement($statuses)]; break;
        case Event::EVENT_REPORT: $event_value = $faker->randomElement($report_values); break;
    }

    $event = ['event_name'=>$event_name, 'event_value'=>$event_value];

    return [
        'event_name' => $event_name,
        'event_value' => $event,
    ];
});
