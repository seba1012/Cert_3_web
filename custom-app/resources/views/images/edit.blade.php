<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Images') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="p-4 sm:px-6 sm:py-4">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Editar Imagen
            </h3>
        </div>
        <form action="{{ route('images.update', $image->id)  }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="px-4 sm:p-6">
                <div class="space-y-6">
                    <div class="flex justify-center">
                        <div class="w-4/5 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <div class="flex flex-col">
                                <label class="leading-loose" for="title">Titulo</label>
                                <input
                                    type="text"
                                    id="titulo"
                                    name="titulo"
                                    class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                    value="{{ $image->titulo }}"
                                >
                                @error('title')<small class="text-red-500 text-xs">{{ $message }}</small>@enderror
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose" for="archivo">Archivo</label>
                                <input type="file" id="archivo" name="archivo" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 pb-5 sm:px-4 sm:flex">
                <div class="flex w-full justify-center">
                    <div class="pt-4 flex justify-between w-4/5">
                        <button class="bg-red-500 text-white flex justify-center items-center w-6/12 px-4 py-3 rounded-md focus:outline-none">
                            Cancel
                        </button>
                        <button type="submit" class="bg-blue-500 flex justify-center items-center w-6/12 text-white px-4 py-3 rounded-md focus:outline-none">Actualizar</button>
                    </div>
                </div>
            </div>
        </form>
    </x-slot>


</x-app-layout>
