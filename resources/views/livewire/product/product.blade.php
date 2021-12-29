<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-content class="mb-4 max-w-7xl">
            <div class="p-4">
                <form class="grid gap-2" wire:submit.prevent="save">
                    <div class="mb-2">
                        <x-jet-label value="{{ __('Name') }}" />
                        <x-jet-input type="text" class="w-full" placeholder="{{ __('Name') }}"
                            wire:model="name" />
                        <x-jet-input-error for="name" />
                    </div>

                    <div class="mb-2">
                        <x-jet-label value="{{ __('Quantity') }}" />
                        <x-jet-input type="number" class="w-full" placeholder="{{ __('Quantity') }}"
                            wire:model="quantity" />
                        <x-jet-input-error for="quantity" />
                    </div>

                    <div class="mb-2">
                        <x-jet-label value="{{ __('Category') }}" />
                        <select class="w-full form-control" wire:model="category_id">
                            <option value="" selected>Seleccione</option>
                            @foreach ($select_category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="category_id" />
                    </div>

                    <div>
                        <x-button-green type="submit" wire:loading.attr="disabled">
                            {{ __('Save') }}
                        </x-button-green>
                    </div>
                </form>
            </div>
        </x-content>

        <x-content class="max-w-7xl">
            <div class="p-4">
                @livewire('product.table-product')
            </div>
        </x-content>

        @livewire('product.function-product')
    </div>
</div>
