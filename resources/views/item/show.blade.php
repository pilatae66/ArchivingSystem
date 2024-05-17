<x-guest-layout>
    <div class="flex text-gray-200">
        <div class="flex flex-col w-full bg-gray-300 dark:bg-gray-700 p-10 rounded-lg">
            <div class="mb-2 w-8">
                <a href="{{ route('home') }}">
                    <x-bx-left-arrow-alt width="30" height="30" class="text-gray-500 hover:text-gray-300" />
                </a>
            </div>
            <div class="flex justify-center">
                @if($item->img_url)
                    <img width="500" height="500" class="rounded-lg" src="{{ asset($item->img_url) }}" alt="#">
                @else
                    <div class="flex flex-col justify-center items-center h-96 w-96">
                        <x-carbon-no-image width="500" height="500" class="rounded-full" />
                        <p>No image</p>
                    </div>
                @endif
            </div>
            <div class="border-b-2 border-gray-500 my-10"></div>
            <div class="grid grid-cols-4">
                <div class="flex flex-col justify-center items-center py-10 border-r-2 border-gray-500">
                    <p class="flex flex-col justify-center items-center">
                        <x-carbon-code-signing-service class="w-16 h-16" />
                        Item Code
                    </p>
                    <div class="flex justify-center items-center w-9/12 bg-gray-500 p-5 rounded-lg mt-4">
                        <h1 class="text-3xl">{{ $item->item_code }}</h1>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center py-10 border-r-2 border-gray-500">
                    <p class="flex flex-col justify-center items-center">
                        <x-carbon-text-long-paragraph class="w-16 h-16" />
                        Description
                    </p>
                    <div class="flex justify-center items-center w-9/12 bg-gray-500 p-5 rounded-lg mt-4">
                        <h1 class="text-3xl">{{ $item->description }}</h1>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center py-10 border-r-2 border-gray-500">
                    <p class="flex flex-col justify-center items-center">
                        <x-carbon-ruler-alt class="w-16 h-16" />
                        Unit of Measurement
                    </p>
                    <div class="flex justify-center items-center w-9/12 bg-gray-500 p-5 rounded-lg mt-4">
                        <h1 class="text-3xl">{{ $item->unit_of_measure }}</h1>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center py-10">
                    <p class="flex flex-col justify-center items-center">
                        <x-typ-group class="w-16 h-16" />
                        Department
                    </p>
                    <div class="flex justify-center items-center w-9/12 bg-gray-500 p-5 rounded-lg mt-4">
                        <h1 class="text-3xl">{{ $item->department }}</h1>
                    </div>
                </div>
                <div></div>
                <div class="flex flex-col justify-center items-center border-r-2 border-gray-500 py-10">
                    <p class="flex flex-col justify-center items-center">
                        <x-carbon-user-data class="w-16 h-16" />
                        End User
                    </p>
                    <div class="flex justify-center items-center w-9/12 bg-gray-500 p-5 rounded-lg mt-4">
                        <h1 class="text-3xl">{{ $item->end_user }}</h1>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center py-10">
                    <p class="flex flex-col justify-center items-center">
                        <x-bx-user-voice class="w-16 h-16" />
                        Requestor
                    </p>
                    <div class="flex justify-center items-center w-9/12 bg-gray-500 p-5 rounded-lg mt-4">
                        <h1 class="text-3xl">{{ $item->requestor }}</h1>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-items-center py-10">
                <p class="flex flex-col justify-center items-center">
                    <x-bladewind.icon name="swatch" class="!w-16 !h-16" />
                    Specification
                </p>
                <div class="flex flex-col justify-items-center align-center items-center mt-4">
                    <div class="w-9/12 bg-gray-500 p-10 rounded-lg">
                        <h1 class="text-xl">{!! nl2br($item->specification) !!}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>