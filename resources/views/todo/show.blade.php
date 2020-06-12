@extends('todo.layout')
@section('content')
    <h1 class="text-2xl border-b pb-4">{{ $todo->title }} <a class=" text-gray-400" href="{{ route('todo.index') }}"><i
                class="fa fa-arrow-left"></i></a></h1>

    <x-notification/>
    @if($todo->description)
        <b>Description of this task</b>
        <p>{{ $todo->description }}</p>
    @else
        <p>No description for this task</p>
    @endif
    <hr>
    <b>Steps of this task</b>

    @forelse($todo->steps as $step)
        <ul>
            <li>{{ $step->name }}</li>
        </ul>
    @empty
        <p>No steps available for this task</p>
    @endforelse

@endsection
