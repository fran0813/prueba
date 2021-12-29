<div>
    <x-jet-dialog-modal wire:model="modal" maxWidth="4xl">
        <x-slot name="title">
            Editar {{ __('Category') }}
        </x-slot>

        <x-slot name="content">
            <div>
                <x-jet-label value="{{ __('Name') }}" />
                <x-jet-input type="text" class="w-full" placeholder="{{ __('Name') }}"
                    wire:model="category.name" />
                <x-jet-input-error for="category.name" />
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
            livewire.on('deleteCategory', category_id => {
                Swal.fire({
                    icon: 'warning',
                    title: 'Estas seguro?',
                    text: 'Se eliminaran los productos relacionados a la categoría!',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('category.function-category', 'delete', category_id);
                    }
                })
            })
        </script>
    @endpush
</div>
