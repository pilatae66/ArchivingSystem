<x-guest-layout>

    @if(session()->has('message'))
    <x-bladewind.alert type="success" class="mb-5">
        {{ session('message') }}
    </x-bladewind.alert>
    @endif
    <div class="flex text-gray-200">
        <div class="flex flex-col w-full bg-gray-300 dark:bg-gray-700 p-10 rounded-lg">
            <div class="flex justify-between py-5 mb-5 border-b-2">
                <h1 class="text-3xl w-full">Item List</h1>
                <form class="flex flex-row block w-1/4 p-0 m-0" action="{{ route('item.search') }}" method="get">
                    @csrf
                    <x-text-input name="search_text" id="search_text" class="rounded-none rounded-l-lg dark:border-gray-900" type="text" placeholder="Search" />
                    <x-primary-button class="rounded-none rounded-r-lg dark:bg-gray-900 dark:text-gray-300 dark:hover:bg-gray-600">
                        <x-bi-search class="w-4 h-4 my-auto p-0 m-0 text-gray-500" />
                    </x-primary-button>
                </form>
                <a class="bg-green-700 hover:bg-green-500 rounded-lg my-auto p-2 flex flex-row" href="{{ route('item.create') }}">Create <x-typ-plus class="w-4 h-4 my-auto" /></a>
            </div>
            <div class="relative rounded-t-xl overflow-auto mt-2">
                <div class="shadow-sm overflow-hidden bg-white dark:bg-slate-800">
                    <table class="border-collapse table-auto w-full text-sm">
                        <thead class="border-b border-gray-500">
                            <tr>
                                <th class="w-40 p-5">Images</th>
                                <th>Item Code</th>
                                <th>Description</th>
                                <th>UOM</th>
                                <th>Department</th>
                                <th>End User</th>
                                <th>Requestor</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-slate-800">
                            @forelse($items as $item)
                                <tr class="text-center border-b border-gray-500">
                                    <td class="p-3">
                                        @if($item->img_url)
                                            <a href="{{ route('item.show', $item->id) }}">
                                                <img class="rounded-lg" width="200px" height="200px" src="{{ asset($item->img_url) }}" alt="">
                                            </a>
                                        @else
                                            <a href="{{ route('item.show', $item->id) }}">
                                                <div class="flex flex-col justify-center items-center">
                                                    <x-carbon-no-image />
                                                    <p>No image</p>
                                                </div>
                                            </a>
                                        @endif
                                    </td>
                                    <td>{{ $item->item_code }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->unit_of_measure }}</td>
                                    <td>{{ $item->department }}</td>
                                    <td>{{ $item->end_user }}</td>
                                    <td>{{ $item->requestor }}</td>
                                    <td>
                                        <div class="flex flex-row justify-center">
                                            <a href="{{ route('item.edit', $item->id) }}" class="bg-blue-700 hover:bg-blue-500 text-center rounded-lg p-3 mx-2">Edit<a />
                                            <form action="{{ route('item.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-700 hover:bg-red-500 rounded-lg p-3">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-white text-center my-10 py-10" colspan="5">
                                        No items available
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>