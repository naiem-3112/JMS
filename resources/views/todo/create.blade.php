@extends('todo.layout')
    @section('content')
        <h1 class="text-2xl border-b pb-4">What Next You Need To-Do</h1>
        <x-notification/>

        <form action="{{ route('todo.store') }}" method="post" class="py-5">
            @csrf
            <input type="text" name="title" class="py-2 px-2 border rounded">
            <input type="submit" value="create" class="p-2 border rounded">
        </form>
        <h1><a class="bg-yellow-300 py-2 px-2 border rounded " href="{{ route('todo.index') }}">Back To The List</a></h1>
@endsection

