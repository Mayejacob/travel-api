<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourRequest;
use App\Http\Resources\TourResource;
use App\Models\Travel;

/**
 * @group Admin endpoint
 */
class AdminTourController extends Controller
{
    /**
     * POST Tours
     * 
     * create a new Travel record.
     * 
     * @authenticated
     * @bodyParam travel_id uuid required The id of the travel. Example: 996b7ae3-5b1a-4155-91b8-423826824fca
     * @bodyParam name string required The name of the tour. Example: test name
     * @bodyParam starting_date date required The starting date of the tour. Example: 2023-06-18
     * @bodyParam ending_date date required The ending date of the tour. Example: 2023-06-19
     * @bodyParam price number required The price of the tour. Example: 1000.99
     * 
     * @response { "data": { "id": "99727b4e-7d45-48a7-9c05-3e4f2e3a51f2", "name": "my tour",  "starting_date": "2023-06-18", "ending_date": "2023-06-19","price": "3,000.00" } }
     * @response 422 { "error": { "name": [ "The name field is required."   ] } }
     */
    public function store(Travel $travel, TourRequest $request)
    {
        $tour = $travel->tours()->create($request->validated());

        return new TourResource($tour);
    }
}
