<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function routes()
    {
        return $this->belongsToMany(Route::class, 'route_stops')->withPivot('order')->orderBy('pivot_order');
    }
}
