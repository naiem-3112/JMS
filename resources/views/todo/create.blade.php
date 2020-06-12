@extends('todo.layout')
    @section('content')
        <h1 class="text-2xl border-b pb-4">What Next You Need To-Do</h1>
        <x-notification/>

        <form action="{{ route('todo.store') }}" method="post" class="py-5">
            @csrf
            <div class="py-1">
                <input type="text" name="title" placeholder="Title" class="p-2 border rounded">
            </div>
            <div class="py-1">
                <textarea name="description" placeholder="Description" cols="22" class="p-2 border rounded"></textarea>
            </div>
            <div>
                <input type="submit" value="create" class="p-2 border rounded">
            </div>

            @livewire('step')

        </form>
        <h1><a class="bg-yellow-300 py-2 px-2 border rounded " href="{{ route('todo.index') }}">Back To The List</a></h1>
@endsection

