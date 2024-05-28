<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{

    protected $fillable = [
        'distance',
    ];
    protected $table = 'routes';

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function stops()
    {
        return $this->belongsToMany(Stop::class, 'route_stops')->withPivot('order')->orderBy('pivot_order');
    }
}