<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Images') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <!-- ACTION BUTTON -->
        <div class="w-4/5 flex justify-end mt-4">
            <div>
                <a href="/images/create">
                    <button
                        type="button"
                        class="border border-zinc-500 bg-zinc-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-zinc-600 focus:outline-none focus:shadow-outline"
                    >
                        Add Image
                    </button>
                </a>
            </div>
        </div>
        <!-- TABLE IMAGES -->
        <table class="w-4/5 border-collapse text-center text-sm text-gray-500 mb-12 mt-4">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">ID</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Titulo</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Baneada</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @if(sizeof($images) > 0)
                    @foreach($images as $image)
                        <tr class="hover:bg-gray-50 font-bold">
                            <td class="px-6 py-4">{{ $image->id }}</td>
                            <td class="px-6 py-4">{{ $image->titulo }}</td>
                            <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold {{  $image->baneada ? 'bg-green-50 text-red-600' : 'bg-yellow-50 text-green-600' }}"
                        >
                            <span class="h-1.5 w-1.5 rounded-full {{ $image->baneada ? 'bg-red-600' : 'bg-green-600' }}"></span>
                            {{ $image->baneada ? 'YES' : 'NO' }}
                        </span>
                            </td>
                            <td class="flex justify-center">
                                <a href="/images/{{ $image->id }}/edit">
                                    <button
                                        type="button"
                                        class="border border-blue-500 bg-blue-500 text-white rounded-md px-2 py-2 m-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                                    >
                                        Editar
                                    </button>
                                </a>
                                <form action="{{ route('images.destroy', $image->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input
                                        type="submit"
                                        class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline"
                                        value="Eliminar"
                                    />
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="hover:bg-gray-50 font-bold">
                        <td colspan="4">
                            <p>No se han encontrado imagenes</p>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </x-slot>


</x-app-layout>
