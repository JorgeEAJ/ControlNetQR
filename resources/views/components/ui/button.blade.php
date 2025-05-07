<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'cursor-pointer mt-4 w-full inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium 
    transition-colors [&_svg]:pointer-events-none [&_svg:not([class*=\'size-\'])]:size-4 [&_svg]:shrink-0 outline-none 
    focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] 
    aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive 
    bg-blue-600 text-white hover:bg-blue-500 dark:bg-blue-600 dark:hover:bg-blue-500 
    shadow-xs h-9 px-4 py-2'
]) }}>
    {{ $slot }}
</button>