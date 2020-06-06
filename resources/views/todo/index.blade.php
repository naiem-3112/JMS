@extends('todo.layout')
@section('content')
    <h1 class="text-2xl">All Your Todos <a class="py-1 px-1 bg-green-400 border rounded" href="{{ route('create') }}">create
            new</a></h1>
    <x-notification/>
    @foreach($todos as $todo)
        <ul>
            <li class="my-5">{{ $todo->title }} <a href="{{ url('todo/edit/'. $todo->id) }}" class=" px-2 bg-yellow-400 border rounded">edit</a> </li>

        </ul>
    @endforeach
@endsection
