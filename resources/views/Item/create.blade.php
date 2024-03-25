<x-guest-layout>
    <div class="flex flex-col justify-center w-1/2 bg-gray-300 dark:bg-gray-700 p-10 rounded-lg mx-auto text-gray-200">
        <div class="mb-5">
            <a href="{{ route('home') }}">
                <x-bx-left-arrow-alt width="30" height="30" class="text-gray-500 hover:text-gray-300" />
            </a>
        </div>
        <div class="flex pb-5 mb-5 border-b-2 border-slate-500">
            <h1 class="text-3xl">Create Item</h1>
        </div>
        <div class="">
            <form method="POST" action="{{ route('item.store') }}" class="" enctype="multipart/form-data">
                @csrf
                <div class="flex grid grid-cols-2 auto-cols-max gap-x-6 gap-y-4">
                    <div>
                        <x-input-label for="item_code" :value="__('Item Code')" />
                        <x-text-input id="item_code" class="block mt-1 w-full" type="text" name="item_code" :value="old('item_code')" autofocus autocomplete="item_code" />
                        <x-input-error :messages="$errors->get('item_code')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="department" :value="__('Department')" />
                        <x-text-input id="department" class="block mt-1 w-full" type="text" name="department" :value="old('department')" autofocus autocomplete="department" />
                        <x-input-error :messages="$errors->get('department')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="unit_of_measure" :value="__('Unit of Measure')" />
                        <x-select-input id="unit_of_measure" class="block mt-1 w-full" name="unit_of_measure" autocomplete="unit_of_measure" :options="$unit_of_measures" />
                        <x-input-error :messages="$errors->get('unit_of_measure')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="end_user" :value="__('End User')" />
                        <x-text-input id="end_user" class="block mt-1 w-full" type="text" name="end_user" :value="old('end_user')" autofocus autocomplete="end_user" />
                        <x-input-error :messages="$errors->get('end_user')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <x-text-area id="description" class="block mt-1 w-full" name="description" :value="old('description')" autocomplete="description" />
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="requestor" :value="__('Requestor')" />
                        <x-text-input id="requestor" class="block mt-1 w-full" type="text" name="requestor" :value="old('requestor')" autofocus autocomplete="requestor" />
                        <x-input-error :messages="$errors->get('requestor')" class="mt-2" />
                    </div>

                </div>
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Specification')" />
                    <x-text-area id="specification" class="block mt-1 w-full" name="specification" :value="old('specification')" autocomplete="specification" />
                    <x-input-error :messages="$errors->get('specification')" class="mt-2" />
                </div>
                
                <div class="mt-4">
                    <x-input-label class="mb-2" for="img_url" :value="__('Image')" />
                    <x-bladewind.filepicker name="img_url" placeholder="Upload the image of the item"  />
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