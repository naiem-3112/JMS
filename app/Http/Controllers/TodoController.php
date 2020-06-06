<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodo;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::orderBy('completed')->get();
        return view('todo.index', compact('todos'));
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(CreateTodo $request)
    {
        Todo::create($request->all());
        return redirect()->back()->with('message', 'Todo added successfully');
    }

    public function edit(Todo $todo)
    {
        return view('todo.edit', compact('todo'));
    }

    public function update(CreateTodo $request, Todo $todo)
    {
        $todo->update(['title' => $request->title]);
        return redirect(route('todo.index'))->with('message', 'todo updated successfully');
    }

    public function complete(Todo $todo){
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', 'task marked as completed');
    }
    public function incomplete(Todo $todo){
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', 'task marked as uncompleted');
    }
}
