<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodo;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todos = auth()->user()->todos->sortBy('completed');
        return view('todo.index', compact('todos'));
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(CreateTodo $request)
    {
        auth()->user()->todos()->create($request->all());
        return redirect()->back()->with('message', 'Todo added successfully');
    }

    public function edit(Todo $todo)
    {
        return view('todo.edit', compact('todo'));
    }

    public function update(CreateTodo $request, Todo $todo)
    {
        $todo->update( $request->all());
        return redirect(route('todo.index'))->with('message', 'todo updated successfully');
    }

    public function destroy(Todo $todo){
        $todo->delete();
        return redirect()->back()->with('message', 'todo has been deleted successfully');
    }

    public function show(Todo $todo){
        return view('todo.show', compact('todo'));
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', 'task marked as completed');
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', 'task marked as uncompleted');
    }
}
