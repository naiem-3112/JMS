@extends('todo.layout')
@section('content')
    <h1 class="text-2xl">All Your Todos</h1>
    <x-notification/>
    @foreach($todos as $todo)
        <ul>
            <li>{{ $todo->title }}</li>
        </ul>
    @endforeach
@endsection
