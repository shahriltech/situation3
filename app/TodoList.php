<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
	protected $fillable = [
        'name', 'todo_list_featured',
    ];

    public function listItems()
	{
		return $this->hasMany(TodoItem::class);
	}
}
