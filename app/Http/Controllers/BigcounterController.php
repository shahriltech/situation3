<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Attendance;

use App\Towtruck;

use App\Ron;

use App\TodoList;

use App\TodoItem;



class BigcounterController extends Controller
{
    public function getdetails()
    {
        $attend = "Yes";
        $employee = Attendance::where('attend',$attend)->get();
        // dd($employee);
        return view('showcase',compact('employee'));

    }


    public function gettowtruckdetails()
    {
        $id=1;
        $countercount = Towtruck::where('id',$id)->pluck('seen');
        $itemlatest = date("H:i:s d.m.y",strtotime(Towtruck::where('id',$id)->max('updated_at')));
        $calc = Towtruck::where('id',$id)->pluck('location');
        $itemplus = true;

        if ($countercount[0]=="No")
            $itemplus = false;
        else if ($countercount[0]=="Yes")
            $itemplus = true;
        


        //$itemlist = ["list"=>$list,"percentDone" => number_format($itemchecked/$itemall * 100), "latesttimestamp"=>$itemlatest,"optioncount"=>$option];

            $itemlist = ["countercount"=>$countercount,"latesttimestamp"=>$itemlatest,"isplus"=>$itemplus,"percent"=>$calc];
        return json_encode($itemlist);  

        //return response()->json($itemlist);    
    } 

    public function getcounterdetails()
    {
        $id=1;
    	$countercount = Ron::where('id',$id)->pluck('attend');
		$itemlatest = date("H:i:s d.m.y",strtotime(Ron::where('id',$id)->max('updated_at')));
        $calc = Ron::where('id',$id)->pluck('reason');
        $itemplus = true;

        if ($countercount[0]=="No")
            $itemplus = false;
        else if ($countercount[0]=="Yes")
            $itemplus = true;
        


		//$itemlist = ["list"=>$list,"percentDone" => number_format($itemchecked/$itemall * 100), "latesttimestamp"=>$itemlatest,"optioncount"=>$option];

			$itemlist = ["countercount"=>$countercount,"latesttimestamp"=>$itemlatest,"isplus"=>$itemplus,"percent"=>$calc];
		return json_encode($itemlist); 

        //return response()->json($itemlist);   	
    }

    public function getfeaturedlist()
    {
        return TodoList::where('todo_list_featured',1)->get();
    }

    

    public function getlistsummary(Request $request,$id)
    {
        $option = $request->input('option',0);
        //$option = Input::get('option', 0);
        $list = TodoList::findOrFail($id);
        $itemchecked = $list->listItems()->where('todo_list_checked',1)->count();
        $itemall = $list->listItems()->count();
        if ($itemall==0)
        {
            $itemlist = ["list"=>$list,"percentDone" => 0, "latesttimestamp"=>"none","optioncount"=>$option];
            return json_encode($itemlist);
        }
        $itemlatest = date("H:i:s d.m.y",strtotime($list->listItems()->max('updated_at')));


        $itemlist = ["list"=>$list,"percentDone" => number_format($itemchecked/$itemall * 100), "latesttimestamp"=>$itemlatest,"optioncount"=>$option];
        return json_encode($itemlist);
    }
}
