<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    const EVENT_STATUS_CHANGE = 'status_change';
    const EVENT_KIT_PAYMENT = 'kit_payment';
    const EVENT_KIT_PAID = 'kit_paid';
    const EVENT_FEE_PAID = 'fee_paid';
    const EVENT_REPORT = 'report';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'event_value' => 'array',
    ];

}
