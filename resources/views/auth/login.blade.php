<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white dark:bg-black min-h-screen flex flex-col lg:flex-row">

    <!-- Lado solo visible en pantallas grandes -->
    <div class="hidden lg:flex lg:w-1/2 bg-zinc-900 text-white flex-col p-10 bg-muted relative dark:border-r-black">
        <h2 class="text-3xl font-bold mb-4">Bienvenido</h2>

        @include('components.frases')

    <!-- Lado del formulario (visible en todas las pantallas) -->
    <div class="w-full lg:w-1/2 flex justify-center items-center p-6">
        <div class="w-full max-w-md">
            <h1 class="text-2xl font-bold mb-6 text-center text-gray-800 dark:text-gray-100">Iniciar Sesión</h1>

            @if($errors->any())
                <div class="bg-red-100 text-red-700 p-2 mb-4 rounded dark:bg-red-200 dark:text-red-900">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <x-ui.label for="numero_control">Número de Control</x-ui.label>
                    <x-ui.input type="text" id="numero_control" name="numero_control" required />
                </div>
                <div class="mb-6">
                    <x-ui.label for="password">Contraseña</x-ui.label>
                    <x-ui.password-input id="password" name="password" required/>
                </div>
                <x-ui.button>Entrar</x-ui.button>
            </form>
        </div>
    </div>
</body>
</html>
