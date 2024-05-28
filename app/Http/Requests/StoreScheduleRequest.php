<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreScheduleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'bus_number' => 'required|string|max:255',
            'distance' => 'required|numeric|min:0',
            'departure_city' => 'required|string|max:255',
            'arrival_city' => 'required|string|max:255',
            'departure_time' => 'required|date|date_format:Y-m-d\TH:i',
            'arrival_time' => 'required|date|after:departure_time|date_format:Y-m-d\TH:i',
            'ticket_price' => 'required|numeric|min:0',
            'departure_city_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'arrival_city_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stops' => 'array',
            'stops.*' => 'string|max:255',
        ];
    }
}
