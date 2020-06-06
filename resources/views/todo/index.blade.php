@extends('todo.layout')
@section('content')
    <h1 class="text-2xl border-b pb-4">All Your Todos <a class="py-2 px-2 bg-green-300 border rounded"
                                                         href="{{ route('todo.create') }}">Create
            New</a></h1>
    <x-notification/>
    @foreach($todos as $todo)
        <ul>
            <li class="my-5">
                @if($todo->completed)
                    <p style="display: inline-block; text-decoration: line-through">{{ $todo->title }}</p>
                @else
                    <p style="display: inline-block">{{ $todo->title }}</p>

                @endif
                <a href="{{ route('todo.edit',$todo->id) }}" class="px-5 text-orange-600 ">
                    <i class="fa fa-edit"></i></a>
                @if($todo->completed)
                    <i onclick=" document.getElementById('form-incomplete-{{ $todo->id }}').submit()"
                       class="fa fa-check px-2 text-green-400 cursor-pointer"></i>
                    <form style="display: none" id="{{ 'form-incomplete-'. $todo->id }}"
                          action="{{ route('todo.incomplete', $todo->id) }}" method="post">
                        @csrf
                        @method('put')

                    </form>
                @else
                    <i onclick=" document.getElementById('form-complete-{{ $todo->id }}').submit()"
                       class="fa fa-check text-gray-400 px-2 cursor-pointer"></i>
                    <form style="display: none" id="{{ 'form-complete-'. $todo->id }}"
                          action="{{ route('todo.complete', $todo->id) }}" method="post">
                        @csrf
                        @method('put')

                    </form>
                @endif
            </li>
        </ul>
    @endforeach
@endsection
