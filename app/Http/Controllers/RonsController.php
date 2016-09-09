<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ron;

use DB;

class RonsController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		//
		$ron = DB::table('rons')->where('id', 1)->first();
		//$list = Ron::find(1);
		return view('ron.index', compact('ron'));
	}

	public function update(Request $request, Ron $ron)
	{

		$this->validate($request, [
        'attend' => 'required'
        ]);

		$ron->update($request->all());     //call update function, and update all that user have request (all input)
    	
    	return back()->with('status', 'Attendance updated!');
		//
	}
}
