@extends('todo.layout')
    @section('content')
        <h1 class="text-2xl">What Next You Need To-Do</h1>
        <x-notification/>

        <form action="{{ route('store') }}" method="post" class="py-5">
            @csrf
            <input type="text" name="title" class="py-2 px-2 border rounded">
            <input type="submit" value="create" class="p-2 border rounded">
        </form>
@endsection

