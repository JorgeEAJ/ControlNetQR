<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de usuario</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen dark:bg-zinc-900">
  @include('components.sidebar')
    <form action="{{ route('signup') }}" method="POST" class="bg-white dark:bg-black p-8 rounded-xl shadow-md w-96">
    @csrf
    @if ($errors->any())
  <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
    <ul class="list-disc list-inside text-sm">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
    <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Crear cuenta</h2>

    <div class="mb-4">
      <x-ui.label>Nombre completo</x-ui.label>
      <x-ui.input type="text" placeholder="Ingresa tu nombre" name="numero_control" required />
    </div>

    <div class="mb-4">
      <x-ui.label>Número de Control</x-ui.label>
      <x-ui.input type="text" placeholder="21670000" name="numero_control" required />
    </div>

    <div class="mb-4">
      <x-ui.label>Correo</x-ui.label>
      <x-ui.input type="text" placeholder="21670000@itiguala.com.mx" name="correo" required />
      </div>
  
    <div class="mb-4">
      <x-ui.label>Contraseña</x-ui.label>
      <x-ui.input type="password" placeholder="Ingresa tu contraseña" name="password" required />
    </div>

    <div class="mb-6">
      <x-ui.label>Rol</x-ui.label>
      <x-ui.select name="rol" required>
        <option value="estudiante">Estudiante</option>
        <option value="admin">Administrador</option>
    </x-ui.select>
    </div>

    <x-ui.button>Registrar</x-ui.button>

    <div class="mb-4">
        <a href="{{ route('panel.admin') }}" class="mt-4 w-full inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-[color,box-shadow]
         [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px]
         aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:bg-white bg-black dark:text-black text-white shadow-xs hover:bg-white/90 h-9 px-4 py-2">
            Regresar
        </a>
    </div>
  </form>
</body>
</html>