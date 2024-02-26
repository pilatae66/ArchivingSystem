<x-guest-layout>
    <table class="border-collapse table-auto w-full text-sm text-white">
        <thead>
            <tr >
                <th>Image</th>
                <th>Item Code</th>
                <th>Description</th>
                <th>UOM</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
            <tr class="text-center">
                <td><img class="rounded-full" width="200" height="200" src="https://media.istockphoto.com/id/475912934/photo/paradise-beach-on-an-island-in-philippines.jpg?s=1024x1024&w=is&k=20&c=J_ASO7pqHriALqgi2C_UE0SRp4qPdNPgMU0--7kbF7I=" alt=""></td>
                <td>{{ $item->item_code }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->unit_of_measure }}</td>
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
    <table class="border-collapse table-auto w-full text-sm text-white">
        <thead>
            <tr>
                <th>Song</th>
                <th>Artist</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                <td>Malcolm Lockyer</td>
                <td>1961</td>
            </tr>
            <tr>
                <td>Witchy Woman</td>
                <td>The Eagles</td>
                <td>1972</td>
            </tr>
            <tr>
                <td>Shining Star</td>
                <td>Earth, Wind, and Fire</td>
                <td>1975</td>
            </tr>
        </tbody>
    </table>
</x-guest-layout>