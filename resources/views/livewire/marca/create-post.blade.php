<div>
    <button type="button" wire:click="$set('open', true)" class="m-auto text-sm  bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
        Agregar
    </button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Agregar Nueva Marca
        </x-slot>
        <x-slot name="content">
            <x-label value="Nombre De La Marca" class="ml-2 text-left"/>
            <input type="text" wire:model="nombre" wire:keydown.enter="save" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nombre">
            <x-input-error for="nombre" class="ml-2 mt-2 text-left"/>
        </x-slot>
        <x-slot name="footer">
            <button type="button" wire:click="$set('open', false)" class="m-auto text-sm  bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                Cancelar
            </button>
            <button type="button" wire:click="save" wire:target="save" wire:loading.remove class="m-auto text-sm  bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                Agregar
            </button>
            <i wire:loading wire:target="save" class="fa-solid fa-circle-notch fa-spin m-auto"></i>
        </x-slot>
    </x-jet-dialog-modal>
</div>
