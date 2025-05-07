<select {{ $attributes->merge([
    'class' => 'focus:outline-none focus:ring-2 focus:ring-blue-400 input-visible-selection 
    dark:bg-gray-800 dark:text-white dark:border-gray-600 border-input flex h-9 w-full items-center 
    justify-between rounded-md border bg-transparent px-3 py-2 text-sm shadow-xs focus:ring-ring/50'
]) }}>
    {{ $slot }}
</select>
