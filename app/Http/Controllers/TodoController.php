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

    public function edit($id)
    {
        return view('todo.edit');
    }

    public function update(Request $request)
    {
        return view('todo.create');
    }
}
