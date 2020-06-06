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
        $todos = Todo::all();
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
        $todo->title = $request->title;
        $todo->save();
        return redirect()->back()->with('message', 'todo updated successfully');
    }
}
