<x-guest-layout>
    <div class="flex text-gray-200">
        <div class="flex flex-col w-full bg-gray-300 dark:bg-gray-700 p-10 rounded-lg">
            <div>
                <a href="{{ route('item.index') }}">
                    <x-bx-left-arrow-alt width="30" height="30" class="text-gray-500 hover:text-gray-300" />
                </a>
            </div>
            <div class="flex justify-center mb-5">
                @if($item->img_url)
                    <img width="500" height="500" class="rounded-lg" src="{{ asset($item->img_url) }}" alt="#">
                @else
                    <div class="flex flex-col justify-center items-center h-96 w-96">
                        <x-carbon-no-image width="500" height="500" class="rounded-full" />
                        <p>No image</p>
                    </div>
                @endif
            </div>
            <div class="flex flex-col justify-center border-t">
                <div class="flex flex-col justify-center items-center">
                    <p>Item Code</p>
                    <h1 class="text-3xl">{{ $item->item_code }}</h1>
                </div>
                <hr class="my-5">
                <div class="flex flex-col justify-center items-center">
                    <p>Description</p>
                    <h1 class="text-3xl">{{ $item->description }}</h1>
                </div>
                <hr class="my-5">
                <div class="flex flex-col justify-center items-center">
                    <p>Unit of Measurement</p>
                    <h1 class="text-3xl">{{ $item->unit_of_measure }}</h1>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>