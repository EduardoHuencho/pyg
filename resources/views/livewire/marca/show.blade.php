<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="flex items-center">
        <span class="mb-5">Mostar</span>
        <select wire:model='cant' class="mb-5 mx-2 block w-20 rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        <input type="text" wire:model="search" class="mb-5 block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Buscar">
    </div>

    <div class="w-full flex justify-center">
        <table class="w-full text-md bg-blue-100 shadow-md rounded mb-4">
            <tbody>
                <tr class="border-b">
                    <th wire:click="order('id')" class="cursor-pointer text-left p-3 px-5 w-24">
                        Id
                        @if ($sort == 'id')
                            @if ($direction == 'desc')
                                <i class="fa-solid fa-arrow-down-9-1 ml-5"></i>
                            @else
                                <i class="fa-solid fa-arrow-up-9-1 ml-5"></i>
                            @endif
                        @else
                            <i class="fa-solid fa-sort ml-5"></i>
                        @endif
                    </th>
                    <th wire:click="order('nombre')" class="cursor-pointer text-left p-3 px-5">
                        Marca
                        @if ($sort == 'nombre')
                            @if ($direction == 'desc')
                                <i class="fa-solid fa-arrow-down-z-a ml-5"></i>
                            @else
                                <i class="fa-solid fa-arrow-up-z-a ml-5"></i>
                            @endif
                        @else
                            <i class="fa-solid fa-sort ml-5"></i>
                        @endif
                    </th>
                    <th class="w-40 ">
                        @livewire("marca.create-post")
                    </th>
                </tr>
                @foreach ($marcas as $marca)
                    <tr class="border-b hover:bg-orange-100 bg-blue-50">
                        <td class="p-3 px-5 w-10">
                            <div class="bg-transparent rounded">
                                {{$marca->id}}
                            </div>
                        </td>
                        <td class="p-3 px-5">
                            <div class="bg-transparent rounded">
                                {{$marca->nombre}}
                            </div>
                        </td>
                        <td class="p-3 px-5 flex justify-end w-40">
                            <button type="button" wire:click="edit({{$marca}})" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                Editar
                            </button>
                            <button type="button" wire:click="$emit('deleteMarca', {{$marca->id}})" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                Borrar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <x-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            Editar Marca {{ $marca ? $marca->nombre : '' }}
        </x-slot>
        <x-slot name="content">
            <x-label value="Nombre De La Marca" class="ml-2 text-left"/>
            <input type="text" wire:model="marca.nombre" wire:keydown.enter="update" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nombre">
            <x-input-error for="nombre" class="ml-2 mt-2 text-left"/>
        </x-slot>
        <x-slot name="footer">
            <button type="button" wire:click="$set('open_edit', false)" class="m-auto text-sm  bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                Cancelar
            </button>
            <button type="button" wire:click="update" wire:target="update" wire:loading.remove class="m-auto text-sm  bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                Editar
            </button>
            <i wire:loading wire:target="update" class="fa-solid fa-circle-notch fa-spin m-auto"></i>
        </x-slot>
    </x-jet-dialog-modal>
    <x-dialog-modal wire:model="open_del">
        <x-slot name="title">
            Eliminar Marca: {{ $marca ? $marca->nombre : '' }}
        </x-slot>
        <x-slot name="content">
            <x-label value="Esta Seguro Que Desea Eliminar La Marca: {{ $marca ? $marca->nombre : '' }}" class="ml-2 text-red-500 text-center"/>
        </x-slot>
        <x-slot name="footer">
            <button type="button" wire:click="$set('open_del', false)" class="m-auto text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                Cancelar
            </button>
            <button type="button" wire:click="delete" wire:target="delete" wire:loading.remove class="m-auto text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                Eliminar
            </button>
            <i wire:loading wire:target="delete" class="fa-solid fa-circle-notch fa-spin m-auto"></i>
        </x-slot>
    </x-jet-dialog-modal>    
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            livewire.on('deleteMarca', marcaId =>{
                Swal.fire({
                    title: 'Estás seguro?',
                    text: "No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminarlo'
                }).then((result) => {
                    if (result.isConfirmed) {
                        livewire.emitTo('marca.show', 'delete', marcaId);
                        Swal.fire(
                            'Eliminado!',
                            'El registro ha sido eliminado.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush
    @if ($marcas->hasPages())
        {{$marcas->links()}}
    @endif
</div>  