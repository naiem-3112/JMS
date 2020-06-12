@extends('todo.layout')
@section('content')
    <h1 class="text-2xl border-b pb-4">All Your Todos <a class="py-2 px-2 text-green-300  " href="{{ route('todo.create') }}"><i class="fa fa-plus-circle"></i></a></h1>
    <x-notification/>
    @forelse($todos as $todo)
        <ul>
            <li class="my-5">

                @include('todo.complete-button')

                @if($todo->completed)
                    <a href="{{ route('todo.show',$todo->id) }}" style="cursor: pointer; display: inline-block; text-decoration: line-through">{{ $todo->title }}</a>
                @else
                    <a href="{{ route('todo.show',$todo->id) }}" style="cursor: pointer; display: inline-block">{{ $todo->title }}</a>

                @endif
                <a href="{{ route('todo.edit',$todo->id) }}" class="px-5 text-orange-600 ">
                    <i class="fa fa-edit"></i></a>

                <i onclick=" if(confirm('are you sure to delete this task?')){
                    document.getElementById('form-delete-{{ $todo->id }}').submit()
                    }" class="fa fa-trash px-2 text-red-400 cursor-pointer"></i>
                <form style="display: none" id="{{ 'form-delete-'. $todo->id }}"
                      action="{{ route('todo.destroy', $todo->id) }}" method="post">
                    @csrf
                    @method('delete')

                </form>
            </li>
        </ul>
    @empty
        <p>No task available, create one</p>
    @endforelse
@endsection
