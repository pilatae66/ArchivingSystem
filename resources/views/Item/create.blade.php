<x-guest-layout>
    <div class="flex flex-col justify-center bg-gray-300 dark:bg-gray-700 p-10 rounded-lg w-3/12 mx-auto text-gray-200">
        <div class="flex pb-5 mb-5 border-b-2 border-slate-500">
            <h1 class="text-3xl w-full">Create Item</h1>
        </div>
        <div class="flex flex-col justify-center w-auto">
            <form method="POST" action="{{ route('item.store') }}" class="" enctype="multipart/form-data">
                @csrf
    
                <!-- Name -->
                <div>
                    <x-input-label for="item_code" :value="__('Item Code')" />
                    <x-text-input id="item_code" class="block mt-1 w-full" type="text" name="item_code" :value="old('item_code')" required autofocus autocomplete="item_code" />
                    <x-input-error :messages="$errors->get('item_code')" class="mt-2" />
                </div>
    
                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-area id="description" class="block mt-1 w-full" name="description" :value="old('item_code')" required autocomplete="description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
    
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="unit_of_measure" :value="__('Unit of Measure')" />
                    <x-select-input id="unit_of_measure" class="block mt-1 w-full" name="unit_of_measure" required autocomplete="unit_of_measure" :options="$unit_of_measures" />
                    <x-input-error :messages="$errors->get('unit_of_measure')" class="mt-2" />
                </div>
    
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="img_url" :value="__('Image')" />
    
                    <x-text-input id="img_url" class="block mt-1 w-full" type="file" name="img_url" autocomplete="img_url" />
    
                    <x-input-error :messages="$errors->get('img_url')" class="mt-2" />
                </div>
    
                <div class="flex items-center justify-center mt-5 border-t-2 border-slate-500">
                    <x-primary-button class="mt-5">
                        {{ __('Register Item') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>