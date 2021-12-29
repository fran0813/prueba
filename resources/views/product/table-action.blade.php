<div class="flex justify-center">
    <a class="btn btn-blue" wire:click="$emitTo('product.function-product', 'open', {{ $id }})">
        <i class="fa-edit fas"></i>
    </a>

    <a class="ml-2 btn btn-red" wire:click="$emit('deleteProduct', {{ $id }})">
        <i class="fa-trash fas"></i>
    </a>
</div>
