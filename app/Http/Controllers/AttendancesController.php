<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Attendance;

class AttendancesController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		//

		$list = Attendance::all();
		return view('attendance.index',compact('list'));
	}


	// public function edit($id)
	// {
	// 	//
	// 	$id = (int)$id;
	// 	$attendance = Attendance::find($id);


	// 	return view('attendance.edit',compact('attendance'));
	// }

	 public function edit(Attendance $attendance)
    {
    	return view('attendance.edit', compact('attendance'));
    }


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, Attendance $attendance)
	{
		$this->validate($request, [
        'attend' => 'required'
        ]);

		$attendance->update($request->all());     //call update function, and update all that user have request (all input)
    	
    	return back()->with('status', 'Attendance updated!');
		//
	}



}
