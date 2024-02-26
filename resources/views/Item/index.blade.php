<x-guest-layout>
    <div class="flex w-4/5" style="width:80%; margin:auto;">
        <div class="flex flex-col w-full bg-gray-300 dark:bg-gray-700 p-10 rounded-lg" style="margin-top: 100px; padding:20px;">
            <div class="flex text-white">
                <h1 class="text-5xl">Items</h1>
            </div>
            <table class="table-auto text-white mt-5 py-5">
                <thead>
                    <tr class="p-2">
                        <th class="w-40">Image</th>
                        <th>Item Code</th>
                        <th>Description</th>
                        <th>UOM</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                    <tr class="text-center border-b border-gray-200 p-20">
                        <td><img class="rounded-full" width="200px" height="200px" src="https://media.istockphoto.com/id/475912934/photo/paradise-beach-on-an-island-in-philippines.jpg?s=1024x1024&w=is&k=20&c=J_ASO7pqHriALqgi2C_UE0SRp4qPdNPgMU0--7kbF7I=" alt=""></td>
                        <td>{{ $item->item_code }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->unit_of_measure }}</td>
                        <td class="flex flex-row justify-center items-center content-center mt-10">
                            <a href="{{ route('item.edit', $item->id) }}" class="bg-blue-500 hover:bg-blue text-center rounded-lg p-3 mx-2">Edit<a/>
                            <form action="">
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