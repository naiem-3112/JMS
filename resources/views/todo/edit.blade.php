@extends('todo.layout')
@section('content')
    <h1 class="text-2xl">What Next You Need To-Do</h1>
    <x-notification/>

    <form action="{{ url('todo/update/'.$todo->id) }}" method="post" class="py-5">
        @csrf
        <input type="text" name="title" value="{{ $todo->title }}" class="py-2 px-2 border rounded">
        <input type="submit" value="update" class="p-2 border rounded">
    </form>
    <h1><a class="bg-yellow-300 py-2 px-2 border rounded " href="{{ route('index') }}">Back To The List</a></h1>
@endsection
