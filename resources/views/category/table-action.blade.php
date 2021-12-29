<div class="flex justify-center">
    <a class="btn btn-blue" wire:click="$emitTo('category.function-category', 'open', {{ $id }})">
        <i class="fa-edit fas"></i>
    </a>

    <a class="ml-2 btn btn-red" wire:click="$emit('deleteCategory', {{ $id }})">
        <i class="fa-trash fas"></i>
    </a>
</div>
