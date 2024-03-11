<x-guest-layout>

    @if(session()->has('message'))
    <x-bladewind.alert type="success" class="mb-5">
        {{ session('message') }}
    </x-bladewind.alert>
    @endif
    <div class="flex text-gray-200">
        <div class="flex flex-col w-full bg-gray-300 dark:bg-gray-700 p-10 rounded-lg">
            <div class="flex justify-between py-5 mb-5 border-b-2 border-gray-500">
                <h1 class="text-3xl w-full">Item List</h1>
                <div class="flex space-x-6">
                    <form class="flex flex-row" action="{{ route('item.search') }}" method="get">
                        @csrf
                        <x-text-input name="search_text" id="search_text" class="rounded-none rounded-l-lg dark:border-gray-900 w-60" type="text" placeholder="Search..." :value="old('search_text')" />
                        <x-primary-button class="rounded-none rounded-r-lg dark:bg-gray-900 dark:text-gray-300 dark:hover:bg-gray-600 dark:active:bg-gray-600 dark:focus:bg-gray-600">
                            <x-bi-search class="w-4 h-4 my-auto p-0 m-0 text-gray-500" />
                        </x-primary-button>
                    </form>
                    <x-bladewind.button type="primary" radius="medium" tag="a" size="tiny" icon="plus" icon_right="true" color="green" href="{{ route('item.create') }}" name="p-0 m-0">Create</x-bladewind.button>
                </div>
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
                                        <div class="flex flex-row justify-center space-x-2">
                                            <x-bladewind.button type="primary" tag="a" size="small" radius="small" color="blue" href="{{ route('item.edit', $item->id) }}" name="p-0 m-0">Edit</x-bladewind.button>
                                            <form action="{{ route('item.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <x-bladewind.button type="primary" size="small" radius="small" color="red" can_submit="true">Delete</x-bladewind.button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-gray-500 text-center my-10 py-10" colspan="8">
                                        @if(session()->has('empty_message'))
                                            {{ session('empty_message') }}
                                        @else
                                            No items available
                                        @endif
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