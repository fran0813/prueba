<div>
    <x-jet-dialog-modal wire:model="modal" maxWidth="4xl">
        <x-slot name="title">
            Editar {{ __('Product') }}
        </x-slot>

        <x-slot name="content">
            <div class="mb-2">
                <x-jet-label value="{{ __('Name') }}" />
                <x-jet-input type="text" class="w-full" placeholder="{{ __('Name') }}"
                    wire:model="product.name" />
                <x-jet-input-error for="product.name" />
            </div>

            <div class="mb-2">
                <x-jet-label value="{{ __('Quantity') }}" />
                <x-jet-input type="number" class="w-full" placeholder="{{ __('Quantity') }}"
                    wire:model="product.quantity" />
                <x-jet-input-error for="product.quantity" />
            </div>

            <div class="mb-2">
                <x-jet-label value="{{ __('Category') }}" />
                <select class="w-full form-control" wire:model="product.category_id">
                    <option value="" selected>Seleccione</option>
                    @foreach ($select_category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="product.category_id" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="$set('modal', false)" class="mb-2">
                {{ __('Close') }}
            </x-jet-danger-button>

            <x-button-blue wire:click="update" wire:loading.attr="disabled">
                {{ __('Update') }}
            </x-button-blue>
        </x-slot>
    </x-jet-dialog-modal>

    @push('script')
        <script>
            // Alerta para eliminar
            livewire.on('deleteProduct', product_id => {
                Swal.fire({
                    icon: 'warning',
                    title: 'Estas seguro?',
                    text: 'No podrás revertir esto!',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('product.function-product', 'delete', product_id);
                    }
                })
            })
        </script>
    @endpush
</div>
