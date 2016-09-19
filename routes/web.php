<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/ubercar', function () {
    return view('ubercar');
});

Route::get('/publicholiday', function () {
    return view('publicholiday');
});
Route::get('/annualleave', function () {
    return view('annualleave');
});

Route::get('/home', 'HomeController@index');



Route::get('testfeed', array('as' => 'testfeed', function()
{
	header('Content-type: application/xml');
	echo file_get_contents("http://feeds.feedburner.com/TechCrunch/");
}));



Route::get('/', 'BigcounterController@getdetails');


Route::get('bigbutton/getcounterdetails/', array('as' => 'bigbutton.getcounterdetails', 'uses' => 'BigcounterController@getcounterdetails'));
Route::get('bigbutton/gettowtruckdetails/', array('as' => 'bigbutton.gettowtruckdetails', 'uses' => 'BigcounterController@gettowtruckdetails'));
Route::get('bigbutton/getleavedetails/', array('as' => 'bigbutton.getleavedetails', 'uses' => 'BigcounterController@getleavedetails'));
Route::get('todos/getlistsummary/{id?}',array('as' => 'todos.getlistsummary', 'uses' => 'BigcounterController@getlistsummary'));
Route::get('todos/getfeaturedlist',array('as' => 'todos.getfeaturedlist', 'uses' => 'BigcounterController@getfeaturedlist'));





Route::get('todos/itemfeature/{id}/{cnum}',array('as' => 'todos.itemfeature', 'uses' => 'TodoListController@itemfeature'));
Route::resource('todos','TodoListController');
Route::patch('todos/update/{todolist}','TodoListController@update');



Route::get('listitem/itemchecked/{id}/{cnum}',array('as' => 'listitem.itemchecked', 'uses' => 'TodoListItemController@itemchecked'));
Route::resource('listitem', 'TodoListItemController');
Route::patch('listitem/update/{todoitem}','TodoListItemController@update');




//ron
Route::get('bigboss', 'RonsController@index');
Route::patch('bigboss/update/{ron}', 'RonsController@update');

//attendance

Route::get('employee', 'AttendancesController@index');
Route::get('employee/{attendance}/edit', 'AttendancesController@edit');
Route::patch('employee/update/{attendance}', 'AttendancesController@update');


//tow truck
//ron attendance
Route::get('towtruck', 'TowtrucksController@index');
Route::patch('towtruck/update/{towtruck}', 'TowtrucksController@update');

Auth::routes();

Route::get('/home', 'HomeController@index');
