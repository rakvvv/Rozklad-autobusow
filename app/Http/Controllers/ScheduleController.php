<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Schedule;
use App\Models\Route;
use App\Models\Stop;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use Illuminate\Support\Facades\Storage;

class ScheduleController extends Controller
{
    public function searchSchedules(Request $request)
{
    $departureCity = $request->input('departure_city');
    $arrivalCity = $request->input('arrival_city');
    $departureDate = $request->input('departure_date');
    $departureTime = $request->input('departure_time');

    $query = Schedule::query();

    if ($departureCity) {
        $query->whereHas('departureCities', function ($query) use ($departureCity) {
            $query->where('city_id', $departureCity);
        });
    }

    if ($arrivalCity) {
        $query->whereHas('arrivalCities', function ($query) use ($arrivalCity) {
            $query->where('city_id', $arrivalCity);
        });
    }

    if ($departureDate) {
        $query->whereDate('departure_time', $departureDate);
    }

    if ($departureTime) {
        $query->whereTime('departure_time', '>=', $departureTime);
    }

    if (!$departureCity && !$arrivalCity && !$departureDate && !$departureTime) {
        $schedules = collect();
    } else {
        $schedules = $query->with('departureCities', 'arrivalCities', 'route')->get();
    }

    $schedules = $query->with('departureCities', 'arrivalCities', 'route')->paginate(3)->appends([
        'departure_city' => $departureCity,
        'arrival_city' => $arrivalCity,
        'departure_date' => $departureDate,
        'departure_time' => $departureTime,
    ]);

    $cities = City::all();

    return view('index', compact('schedules', 'cities', 'departureCity', 'arrivalCity', 'departureDate', 'departureTime'));
}


    


    public function index()
    {
        return view('search', [
            'schedules' => Schedule::with('departureCities', 'arrivalCities', 'route')->get()
        ]);
    }

    public function create()
    {
        if (Gate::allows('create', Schedule::class)) {
            return view('schedules.create', [
                'cities' => City::all(),
                'routes' => Route::all(),
                'stops' => Stop::all()
            ]);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function store(StoreScheduleRequest $request)
    {
        
        if (Gate::allows('create', Schedule::class)) {
            $departureCityImgPath = $request->file('departure_city_img') ? $request->file('departure_city_img')->store('cities', 'public') : null;
            $arrivalCityImgPath = $request->file('arrival_city_img') ? $request->file('arrival_city_img')->store('cities', 'public') : null;

            $departureCity = City::firstOrCreate(
                ['name' => $request->departure_city],
                ['img' => $departureCityImgPath]
            );

            $arrivalCity = City::firstOrCreate(
                ['name' => $request->arrival_city],
                ['img' => $arrivalCityImgPath]
            );

            $route = Route::create([
                'distance' => $request->distance,
            ]);

            if ($request->has('stops')) {
                foreach ($request->stops as $order => $stopName) {
                    $stop = Stop::firstOrCreate(['name' => $stopName]);
                    $route->stops()->attach($stop->id, ['order' => $order]);
                }
            }

            $schedule = Schedule::create([
                'bus_number' => $request->bus_number,
                'route_id' => $route->id,
                'departure_time' => $request->departure_time,
                'arrival_time' => $request->arrival_time,
                'ticket_price' => $request->ticket_price,
            ]);

            $schedule->departureCities()->attach($departureCity->id, ['is_departure' => true]);
            $schedule->arrivalCities()->attach($arrivalCity->id, ['is_departure' => false]);

            return redirect()->route('search')->with('success', 'Schedule added successfully.');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        Gate::authorize('update', $schedule);

        $departureCityImgPath = $request->file('departure_city_img') ? $request->file('departure_city_img')->store('cities', 'public') : null;
        $arrivalCityImgPath = $request->file('arrival_city_img') ? $request->file('arrival_city_img')->store('cities', 'public') : null;

        $departureCity = City::firstOrCreate(
            ['name' => $request->departure_city],
            ['zip_code' => 'unknown', 'img' => $departureCityImgPath]
        );

        $arrivalCity = City::firstOrCreate(
            ['name' => $request->arrival_city],
            ['zip_code' => 'unknown', 'img' => $arrivalCityImgPath]
        );

        if ($departureCityImgPath && !$departureCity->img) {
            $departureCity->update(['img' => $departureCityImgPath]);
        }

        if ($arrivalCityImgPath && !$arrivalCity->img) {
            $arrivalCity->update(['img' => $arrivalCityImgPath]);
        }

        $route = $schedule->route;
        $route->update([
            'distance' => $request->distance,
        ]);

        $schedule->update([
            'bus_number' => $request->bus_number,
            'route_id' => $schedule->route_id, 
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
            'ticket_price' => $request->ticket_price,
        ]);

        $schedule->departureCities()->sync([$departureCity->id => ['is_departure' => true]]);
        $schedule->arrivalCities()->sync([$arrivalCity->id => ['is_departure' => false]]);

        $route = $schedule->route;
        if ($request->has('stops')) {
            $route->stops()->detach();
            foreach ($request->stops as $order => $stopName) {
                $stop = Stop::firstOrCreate(['name' => $stopName]);
                $route->stops()->attach($stop->id, ['order' => $order]);
            }
        }

        return redirect()->route('search')->with('success', 'Schedule updated successfully.');
    }

    public function show(Schedule $schedule)
    {
        return view('search', [
            'schedule' => $schedule->load('departureCities', 'arrivalCities', 'route')
        ]);
    }

    public function edit(Schedule $schedule)
    {
        return view('schedules.edit', [
            'schedule' => $schedule,
            'routes' => Route::all(),
            'cities' => City::all(),
            'stops' => Stop::all()
        ]);
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('search')->with('success', 'Schedule deleted successfully.');
    }
}
