<?php


use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('allTerminology','TerminologyController@allTerminology')->name('allTerminology');
Route::post('addTerminology','TerminologyController@store')->name('addTerminology');
Route::post('removeTerminology','TerminologyController@removeTerminology')->name('removeTerminology');
Route::post('editTerminology','TerminologyController@editTerminology')->name('editTerminology');
Route::post('updateTerminology','TerminologyController@updateTerminology')->name('updateTerminology');


Route::get('allSpecification','SpecificationController@allSpecification')->name('allSpecification');
Route::post('addSpecification','SpecificationController@store')->name('addSpecification');
Route::post('removeSpecification','SpecificationController@removeSpecification')->name('removeSpecification');
Route::post('editSpecification','SpecificationController@editSpecification')->name('editSpecification');
Route::post('updateSpecification','SpecificationController@updateSpecification')->name('updateSpecification');
Route::post('searchSpecification','SpecificationController@searchSpecification')->name('searchSpecification');
