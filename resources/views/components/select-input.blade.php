<select {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>
    <option value="" disabled hidden>Select unit of measure</option>
    @forelse($options as $option)
        <option value="{{ $option }}" {{ $option === $value ? 'selected' : '' }}>{{ $option }}</option>
    @empty
        <option value="">No unit of measure registered</option>
    @endforelse
</select>