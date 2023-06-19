<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TravelRequest;
use App\Http\Resources\TravelResource;
use App\Models\Travel;

/**
 * @group Admin endpoint
 */
class AdminTravelController extends Controller
{
    /**
     * POST Travel
     * 
     * create a new Travel record.
     * 
     * @authenticated
     * @bodyParam is_public boolean required if its true, then it is visible to the public, if not it is private. Example: 1 (true) 0r 0 (false)
     * @bodyParam name string required The name of the Travel. Example: test name
     * @bodyParam description string required The description of the Travel. Example: test description
     * @bodyParam number_of_days int required The number of days of the Travel. Example: 5
     * 
     * @response { "data": { "id": "997279cb-a7ce-4f54-bbff-1bf44dbfda6d", "name": "test name", "slug": "test-name", "description": "test description", "number_of_days": "5", "number_of_nights": 4 } }
     * @response 422 {"error":{"name":["The name field is required."],"description":["The description field is required."],"number_of_days":["The number of days field is required."]}}
     */

    public function store(TravelRequest $request)
    {
        $travel = Travel::create($request->validated());

        return new TravelResource($travel);
    }

    /**
     * PUT Travel
     * 
     * update Travel record.
     * 
     * @authenticated
     * @bodyParam is_public boolean required if its true, then it is visible to the public, if not it is private. Example: 1 (true) 0r 0 (false)
     * @bodyParam name string required The name of the Travel. Example: test name
     * @bodyParam description string required The description of the Travel. Example: test description
     * @bodyParam number_of_days int required The number of days of the Travel. Example: 5
     * 
     * @response { "data": { "id": "997279cb-a7ce-4f54-bbff-1bf44dbfda6d", "name": "test name", "slug": "test-name", "description": "test description", "number_of_days": "5", "number_of_nights": 4 } }
     * @response 422 { "error": { "description": [ "The description field is required." ], "number_of_days": [ "The number of days field is required." } }
     */

    public function update(Travel $travel, TravelRequest $request)
    {
        $travel->update($request->validated());

        return new TravelResource($travel);
    }
}
