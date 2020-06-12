
@if($todo->completed)
    <i onclick=" document.getElementById('form-incomplete-{{ $todo->id }}').submit()"
       class="fa fa-check px-2 text-green-400 cursor-pointer"></i>
    <form style="display: none" id="{{ 'form-incomplete-'. $todo->id }}"
          action="{{ route('todo.incomplete', $todo->id) }}" method="post">
        @csrf
        @method('delete')

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
