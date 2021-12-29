<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Category') }}
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
                @livewire('category.table-category')
            </div>
        </x-content>

        @livewire('category.function-category')
    </div>
</div>
