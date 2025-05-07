@props(['id' => 'password', 'name' => 'password'])

<div class="relative w-full">
    <input 
        {{ $attributes->merge([
            'type' => 'password',
            'id' => $id,
            'name' => $name,
            'class' => 'focus:outline-none focus:ring-2 focus:ring-blue-400 input-visible-selection dark:bg-gray-800 dark:text-white dark:border-gray-600 
                        border-input placeholder:text-muted-foreground selection:bg-white selection:text-white-foreground h-9 w-full min-w-0 
                        rounded-md bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none inline-flex border-0 
                        font-medium md:text-sm pr-10'
        ]) }}
    />

    <button type="button" onclick="togglePasswordVisibility('{{ $id }}', this)" class="absolute inset-y-0 right-2 flex items-center text-gray-500">
        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path id="eye-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <path id="eye-outline" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
        </svg>
    </button>
</div>

@once
<script>
    function togglePasswordVisibility(id, btn) {
        const input = document.getElementById(id);
        if (!input) return;

        const icon = btn.querySelector('svg');
        if (input.type === 'password') {
            input.type = 'text';
            icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 012.216-3.592m3.34-2.49A9.953 9.953 0 0112 5c4.478 0 
                8.268 2.943 9.542 7a9.953 9.953 0 01-4.165 5.225M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 3l18 18" />`;
        } else {
            input.type = 'password';
            icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>`;
        }
    }
</script>
@endonce
