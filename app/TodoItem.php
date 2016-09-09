<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoItem extends Model
{
	protected $fillable = [
        'content', 'todo_list_id', 'completed_on', 'todo_list_checked',
    ];


    public function todoList()
	{
		return $this->belongsTo(TodoList::class);
	}
}
