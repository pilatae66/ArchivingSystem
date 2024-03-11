<x-guest-layout>
    <div class="flex flex-col justify-center bg-gray-300 dark:bg-gray-700 p-10 rounded-lg w-1/2 mx-auto text-gray-200">
        <div class="mb-5">
            <a href="{{ route('item.index') }}">
                <x-bx-left-arrow-alt width="30" height="30" class="text-gray-500 hover:text-gray-300" />
            </a>
        </div>
        <div class="flex pb-5 mb-5 border-b-2 border-slate-500">
            <h1 class="text-3xl w-full">Edit Item</h1>
        </div>
        <div class="flex flex-col justify-center w-auto">
            <form method="POST" action="{{ route('item.update', $item->id) }}" class="" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="flex grid grid-cols-2 auto-cols-max gap-x-6 gap-y-4">
                    <div>
                        <x-input-label for="item_code" :value="__('Item Code')" />
                        <x-text-input id="item_code" class="block mt-1 w-full" type="text" name="item_code" :value="$item->item_code ?? old('item_code')" required autofocus autocomplete="item_code" />
                        <x-input-error :messages="$errors->get('item_code')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="department" :value="__('Department')" />
                        <x-text-input id="department" class="block mt-1 w-full" type="text" name="department" :value="$item->department ?? old('department')" autofocus autocomplete="department" />
                        <x-input-error :messages="$errors->get('department')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="unit_of_measure" :value="__('Unit of Measure')" />
                        <x-select-input id="unit_of_measure" class="block mt-1 w-full" name="unit_of_measure" required autocomplete="unit_of_measure" :options="$unit_of_measures" :value="$item->unit_of_measure ?? old('unit_of_measure')" />
                        <x-input-error :messages="$errors->get('unit_of_measure')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="end_user" :value="__('End User')" />
                        <x-text-input id="end_user" class="block mt-1 w-full" type="text" name="end_user" :value="$item->end_user ?? old('end_user')" autofocus autocomplete="end_user" />
                        <x-input-error :messages="$errors->get('end_user')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <x-text-area id="description" class="block mt-1 w-full" name="description" :value="$item->description ?? old('description')" required autocomplete="description" />
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="requestor" :value="__('Requestor')" />
                        <x-text-input id="requestor" class="block mt-1 w-full" type="text" name="requestor" :value="$item->requestor ?? old('requestor')" autofocus autocomplete="requestor" />
                        <x-input-error :messages="$errors->get('requestor')" class="mt-2" />
                    </div>
                </div>

                <div class="mt-4">
                    <x-input-label for="img_url" :value="__('Image')" />

                    @if($item->img_url)
                    <img class="rounded-lg mt-1" src="{{ asset($item->img_url) }}" alt="#">
                    @else
                    <div class="flex flex-col justify-center items-center mt-1">
                        <x-carbon-no-image />
                        <p>No image</p>
                    </div>
                    @endif

                    <x-text-input id="img_url" class="block mt-1 w-full mt-2" type="file" name="img_url" autocomplete="img_url" />
                    <x-input-error :messages="$errors->get('img_url')" class="mt-2" />
                </div>

                <div class="flex items-center justify-center mt-5 border-t-2 border-slate-500">
                    <x-primary-button class="mt-5">
                        {{ __('Update Item') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>