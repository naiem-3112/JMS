<div>
    <span>Create New Step <i wire:click="increment" class="fa fa-plus" style="cursor: pointer"></i></span>

    @foreach($steps as $step)
        <div class="py-1" wire:key="{{ $loop->index+1 }}">
            <input type="text" name="steps[]" placeholder="{{'step'. ($loop->index+1) }}" value="{{ $step['name'] }}" class="p-2 border rounded">
            <span style="cursor: pointer; color: red" wire:click="decrement({{ $loop->index+1 }})" class="fa fa-times"></span>
        </div>
    @endforeach

</div>
