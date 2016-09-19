<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\TodoList;

use App\TodoItem;

class TodoListController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		//
		$todo_lists = TodoList::all();
		return view('todos.index',compact('todo_lists'));		
	}


	public function create()
	{
		return view('todos.create');
	}


	public function store(Request $request)
	{

		$this->validate($request, [
            'name' => 'required',
        ]);

		$user = TodoList::create([
    		'name' => $request->name,
		]);

		return $this->index()->with('status', 'To Do List updated!');
		//
	}

	public function itemfeature($id,$cnum)
	{	
		$list = TodoList::findOrFail($id);
		$list->todo_list_featured = $cnum;
		$list->update();


		if ($cnum==0)
			return $this->index()->with('List is unfeatured');			
		else
			return $this->index()->with('List is featured');			
	}	


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$list = TodoList::findOrFail($id);
		$items = $list->listItems()->where('todo_list_checked',0)->get();
		$citems = $list->listItems()->where('todo_list_checked',1)->get();
		session(['listID'=>$id]);

		return view('todos.show',compact('list','items','citems'))->with('status');	
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$list = TodoList::findOrFail($id);
		return view('todos.edit',compact('list'));
	}

	


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, TodoList $todolist)
	{

		$this->validate($request, [
            'name' => 'required',
         ]);

		$todolist->update($request->all());     //call update function, and update all that user have request (all input)
    	return $this->index()->with('status', 'To Do List updated!');


	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$list = TodoList::findOrFail($id)->delete();		
		return back()->with('status', 'To Do List updated!');
	}

}
