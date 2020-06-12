<div>
    <span>Create New Step <i wire:click="increment" class="fa fa-plus" style="cursor: pointer"></i></span>

    @foreach($steps as $step)
    <div class="py-1">
        <input type="text" name="steps[]" placeholder="step {{ $step }}" class="p-2 border rounded"><i style="cursor: pointer" wire:click="decrement({{ $loop->index }})" class="fa fa-times"></i>
    </div>
    @endforeach

</div>
