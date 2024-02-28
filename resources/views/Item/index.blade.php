<x-guest-layout>
    <div class="flex">
        <div class="flex flex-col w-full bg-gray-300 dark:bg-gray-700 p-10 rounded-lg mt-10">
            <div class="flex justify-between text-white py-5 mb-5 border-b-2">
                <h1 class="text-3xl w-full">Item List</h1>
                <form class="flex flex-row block w-1/4 p-0 m-0" action="{{ route('item.search') }}" method="get">
                    @csrf
                    <x-text-input name="search_text" id="search_text" class="rounded-none rounded-l-lg dark:border-gray-900" type="text" placeholder="Search" />
                    <x-primary-button class="rounded-none rounded-r-lg dark:bg-gray-900 dark:text-gray-300 dark:hover:bg-gray-600">
                        <x-bi-search class="w-4 h-4 my-auto p-0 m-0 text-gray-500" />
                    </x-primary-button>
                </form>
                <a class="bg-green-500 rounded-lg my-auto p-2 flex flex-row" href="{{ route('item.create') }}">Create <x-typ-plus class="w-4 h-4 my-auto"/></a>
            </div> 
            <table class="text-white py-5">
                <thead>
                    <tr class="border">
                        <th class="w-40 p-5">Image</th>
                        <th>Item Code</th>
                        <th>Description</th>
                        <th>UOM</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                    <tr class="text-center border-b border-gray-200">
                        <td class="p-3">
                            @if($item->img_url)
                                <img class="rounded-lg" width="200px" height="200px" src="{{ asset($item->img_url) }}" alt="">
                            @else
                                <div class="flex flex-col justify-center items-center">
                                    <x-carbon-no-image />
                                    <p>No image</p>
                                </div>
                            @endif
                        </td>
                        <td>{{ $item->item_code }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->unit_of_measure }}</td>
                        <td class="flex flex-row justify-center mt-12">
                            <a href="{{ route('item.edit', $item->id) }}" class="bg-blue-500 hover:bg-blue text-center rounded-lg p-3 mx-2">Edit<a/>
                            <form action="{{ route('item.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 rounded-lg p-3">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <div class="flex justify-center">
                        <div class="flex items-center text-white">
                            No items available
                        </div>
                    </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-guest-layout>