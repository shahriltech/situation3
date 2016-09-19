<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Towtruck;

use DB;

class TowtrucksController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{

		$towtruck = DB::table('towtrucks')->where('id', 1)->first();
		return view('towtruck.index', compact('towtruck'));
	}

	public function update(Request $request, Towtruck $towtruck)
	{

		$this->validate($request, [
        'seen' => 'required'
        ]);

		$towtruck->update($request->all());     //call update function, and update all that user have request (all input)
    	return back()->with('status', 'Attendance updated!');
	}
}
