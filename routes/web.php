<?php

use App\Models\Tour;
use App\Models\Travel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    // $travel = Travel::factory()->create();
    $tour = Tour::factory(4)->create(['travel_id' => '996c619f-5d7d-49ec-8c44-d8daaa14cdf0']);

    return $response = '/api/v1/travels/velit-nulla-nemo/tours';

});
