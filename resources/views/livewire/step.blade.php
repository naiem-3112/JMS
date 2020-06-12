<div>
    <span>Create New Step <i wire:click="increment" class="fa fa-plus" style="cursor: pointer"></i></span>

    @foreach($steps as $step)
    <div class="py-1" wire:key="{{ $step }}">
        <input type="text" name="steps[]" placeholder="{{'step'. ($step+1) }}" class="p-2 border rounded">
        <span style="cursor: pointer; color: red" wire:click="decrement({{ $step }})" class="fa fa-times"></span>
    </div>
    @endforeach

</div>
