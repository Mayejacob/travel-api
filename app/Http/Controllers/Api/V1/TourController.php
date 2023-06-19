<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToursListRequest;
use App\Http\Resources\TourResource;
use App\Models\Travel;

class TourController extends Controller
{
     /**
     * GET Tour
     * 
     * Get specific Tour record.
     * @urlParam slug required The slug of the travel.
     * @queryParam priceFrom optional The filter prices from a specific price. Example: 2000
     * @queryParam priceTo optional The filter prices to a specific price. Example: 900
     * @queryParam dateFrom optional The filter date from a specific date. Example: 2023-06-18
     * @queryParam dateTo optional The filter date to a specific date. Example: 2023-06-18
     * @queryParam sortBy optional Sort record in specific order. 
     * @queryParam sortOrder optional Sort record in specific order. 
     * @response {"data":[{"id":"996c619f-8838-4782-8005-8d9e48b94b57","name":"Ex qui quasi.","starting_date":"2023-06-16","ending_date":"2023-06-25","price":"866.17"},{"id":"996c6831-731c-46dd-858a-8dfa600ea15e","name":"Sint consectetur.","starting_date":"2023-06-16","ending_date":"2023-06-20","price":"636.40"},{"id":"996c6831-90ca-4cff-9375-016500eb3b2c","name":"Nemo voluptatum.","starting_date":"2023-06-16","ending_date":"2023-06-25","price":"174.47"},{"id":"996c6831-b074-4621-9981-a8f7426c321b","name":"Ut blanditiis nemo.","starting_date":"2023-06-16","ending_date":"2023-06-22","price":"626.73"},{"id":"996c6831-e334-44d5-93d7-a46b66cf7dfb","name":"Ipsum optio sint ex.","starting_date":"2023-06-16","ending_date":"2023-06-22","price":"199.18"}],"links":{"first":"http:\/\/127.0.0.1:8000\/api\/v1\/travels\/velit-nulla-nemo\/tours?page=1","last":"http:\/\/127.0.0.1:8000\/api\/v1\/travels\/velit-nulla-nemo\/tours?page=1","prev":null,"next":null},"meta":{"current_page":1,"from":1,"last_page":1,"links":[{"url":null,"label":"&laquo; Previous","active":false},{"url":"http:\/\/127.0.0.1:8000\/api\/v1\/travels\/velit-nulla-nemo\/tours?page=1","label":"1","active":true},{"url":null,"label":"Next &raquo;","active":false}],"path":"http:\/\/127.0.0.1:8000\/api\/v1\/travels\/velit-nulla-nemo\/tours","per_page":15,"to":5,"total":5}}
     */
    public function index(Travel $travel, ToursListRequest $request)
    {

        $tours = $travel->tours()
            ->when($request->priceFrom, function ($query) use ($request) {
                $query->where('price', '>=', $request->priceFrom * 100);
            })
            ->when($request->priceTo, function ($query) use ($request) {
                $query->where('price', '<=', $request->priceTo * 100);
            })
            ->when($request->dateFrom, function ($query) use ($request) {
                $query->where('starting_date', '>=', $request->dateFrom);
            })
            ->when($request->dateTo, function ($query) use ($request) {
                $query->where('starting_date', '<=', $request->dateTo);
            })
            ->when($request->sortBy && $request->sortOrder, function ($query) use ($request) {
                $query->orderBy($request->sortBy, $request->sortOrder);
            })
            ->orderBy('starting_date')
            ->paginate();

        return TourResource::collection($tours);
    }
}
