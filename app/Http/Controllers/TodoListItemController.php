<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\TodoList;

use App\TodoItem;

class TodoListItemController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
	{
		//
	}


	public function create()
	{
		$id = session('listID');
		$list = TodoList::findOrFail($id);
		$items = $list->listItems()->get();		

		//return View::make('todoslistitem.create')->withList($list)->withItems($items);
		return view('todoslistitem.create',compact('list','items'));
		//
	}


	public function store(Request $request)
	{
		$id = session('listID');

		// $rules = array(
		// 		"content" => array("required","unique:todo_items")
		// 	);
		// $validator = Validator::make(Input::all(),$rules);

		// if ($validator->fails())
		// {
		// 	//return Redirect::route('todos.create');	
		// 	$messages = $validator->messages();
		// 	//return $messages;
		// 	//return $id;
		// 	return Redirect::route('listitem.create')->withErrors($validator)->withInput();
		// }

		// $name = Input::get('content');
		// $list = new TodoItem();
		// $list->content = $name;
		// $list->todo_list_id = $id;
		// $list->save();

		$todo_id = (int)$id;

		$this->validate($request, [
            'content' => 'required',
         ]);


		$user = TodoItem::create([

    		'content' => $request->content,
    		'todo_list_id' => $todo_id,

		]);

		//redirect prob, create success
		return $this->show($id)->with('status', 'Task list created!');
	}


	public function show($id)
	{
		$list = TodoList::findOrFail($id);
		$items = $list->listItems()->where('todo_list_checked',0)->get();
		$citems = $list->listItems()->where('todo_list_checked',1)->get();
		session(['listID'=>$id]);

		return view('todos.show',compact('list','items','citems'))->with('status', 'To Do List updated!');		
	}


	public function edit($id)
	{
		//


		$listid = session('listID');
		$list = TodoList::findOrFail($listid);
		$itemmark = TodoItem::findOrFail($id);
		$items = $list->listItems()->get();		
		//return $list;
		return view('todoslistitem.edit',compact('list','items','itemmark'));
	}

	public function itemchecked($id,$cnum)
	{
		$listid = session('listID');		
		$list = TodoItem::findOrFail($id);
		$list->todo_list_checked = $cnum;
		$list->update();

		if ($cnum==0)
			return back()->with('Item was unchecked');			
		else
			return back()->with('Item was checked');		
	}


	public function update(Request $request, TodoItem $todoitem)
	{

		$listid = session('listID');


		$this->validate($request, [
            'content' => 'required',
         ]);

		$todoitem->update($request->all());     //call update function, and update all that user have request (all input)
    	
    	return back()->with('status', 'To Do List updated!');


		//return Redirect::route('todos.show',array($listid))->withMessage('Item was updated');

	}


	public function destroy($id)
	{
		//redirect problem, delete work well
		$theid = session('listID');
		$list = TodoItem::findOrFail($id)->delete();		
		return back()->with('status', 'To Do List updated!');	
	}
}
