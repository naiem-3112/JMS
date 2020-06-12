@extends('todo.layout')
@section('content')
    <h1 class="text-2xl border-b pb-4">Update Your Task Schedule</h1>
    <x-notification/>

    <form action="{{ route('todo.update',$todo->id) }}" method="post" class="py-5">
        @csrf
        @method('put')
        <div class="py-1">
            <input type="text" name="title" value="{{ $todo->title }}" class="py-2 px-2 border rounded">

        </div>
        <div class="py-1">
            <textarea name="description" class="p-2 border rounded" cols="22">{{ $todo->description }}</textarea>
        </div>
        @livewire('edit-step', ['steps' => $todo->steps])
        <div>
            <input type="submit" value="update" class="p-2 border rounded">
        </div>
    </form>
    <h1><a class="bg-yellow-300 py-2 px-2 border rounded " href="{{ route('todo.index') }}">Back To The List</a></h1>
@endsection
