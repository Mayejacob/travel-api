<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TravelResource;
use App\Models\Travel;

class TravelController extends Controller
{
     /**
     * GET Travel
     * 
     * Get all Public Travel records.
     * @response {"data":[{"id":"996b7ad5-b57a-498c-8568-0b388b42c1e6","name":"something name","slug":"something-name","description":"aaa","number_of_days":5,"number_of_nights":4},{"id":"996b7ae3-5b1a-4155-91b8-423826824fca","name":"something name","slug":"something-name-2","description":"aaa","number_of_days":5,"number_of_nights":4},{"id":"996b7aed-3bc5-45c5-a1ad-4268e800e027","name":"something name","slug":"something-name-3","description":"aaa","number_of_days":5,"number_of_nights":4},{"id":"996c59dc-0a27-44de-94af-41df25c2164b","name":"Illum ipsa ea ut.","slug":"illum-ipsa-ea-ut","description":"Rerum id neque ut. Consequatur aut et sed omnis eum.","number_of_days":8,"number_of_nights":7},{"id":"996c5a0a-2dc9-480b-b100-eaaf9707b242","name":"Eveniet reiciendis.","slug":"eveniet-reiciendis","description":"Nihil sequi est quasi sint delectus. Praesentium minima impedit id nesciunt impedit.","number_of_days":8,"number_of_nights":7},{"id":"996ed21d-7af6-42f4-a340-650d8a2118bb","name":"my name nh","slug":"my-name-nh","description":"my description","number_of_days":6,"number_of_nights":5},{"id":"996ed25b-180f-4ddf-b2a0-c48d2d99b764","name":"my name","slug":"my-name","description":"my description","number_of_days":6,"number_of_nights":5},{"id":"997279cb-a7ce-4f54-bbff-1bf44dbfda6d","name":"test name","slug":"test-name","description":"test description","number_of_days":5,"number_of_nights":4}],"links":{"first":"http:\/\/127.0.0.1:8000\/api\/v1\/travels?page=1","last":"http:\/\/127.0.0.1:8000\/api\/v1\/travels?page=1","prev":null,"next":null},"meta":{"current_page":1,"from":1,"last_page":1,"links":[{"url":null,"label":"&laquo; Previous","active":false},{"url":"http:\/\/127.0.0.1:8000\/api\/v1\/travels?page=1","label":"1","active":true},{"url":null,"label":"Next &raquo;","active":false}],"path":"http:\/\/127.0.0.1:8000\/api\/v1\/travels","per_page":15,"to":8,"total":8}}
     */
    public function index()
    {
        $travels = Travel::where('is_public', true)->paginate();

        return TravelResource::collection($travels);
    }
}
