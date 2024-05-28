<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Schedule extends Model
{
    protected $fillable = [
        'departure_time',
        'arrival_time',
        'ticket_price',
        'route_id',
        'bus_number',
    ];

    protected $table = 'schedules';

    protected $dates = [
        'departure_time',
        'arrival_time',
    ];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function departureCities()
    {
        return $this->belongsToMany(City::class, 'schedule_cities', 'schedule_id', 'city_id')
                    ->wherePivot('is_departure', 1);
    }

    public function arrivalCities()
    {
        return $this->belongsToMany(City::class, 'schedule_cities', 'schedule_id', 'city_id')
                    ->wherePivot('is_departure', 0);
    }

    public function getFormattedDepartureTimeAttribute()
    {
        return Carbon::parse($this->departure_time)->format('Y-m-d H:i');
    }

    public function getFormattedArrivalTimeAttribute()
    {
        return Carbon::parse($this->arrival_time)->format('Y-m-d H:i');
    }
}
