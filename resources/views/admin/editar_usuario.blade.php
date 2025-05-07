<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen dark:bg-zinc-900">
    @include('components.sidebar')
    @if ($errors->any())
    <div class="mb-4 text-red-500">
        <ul>
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class="bg-white dark:bg-black p-8 rounded-xl shadow-md w-96">
        @csrf
        @method('PUT')

        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Editar Usuario</h2>

        <div class="mb-4">
            <x-ui.label>Nombre</x-ui.label>
            <x-ui.input name="nombre" type="text" placeholder="nombre" value="{{ old('nombre', $usuario->nombre)}}" required />
        </div>

        <div class="mb-4">
            <x-ui.label>Número de Control</x-ui.label>
            <x-ui.input name="numero_control" type="text" placeholder="Número de Control" value="{{ old('numero_control', $usuario->numero_control) }}"  required />
          </div>
      
        <div class="mb-4">
            <x-ui.label>Correo</x-ui.label>
            <x-ui.input name="correo" type="text" placeholder="correo" value="{{ old('correo', $usuario->correo) }}"  required />
          </div>

        <div class="mb-4">
            <x-ui.label>Contraseña</x-ui.label>
            <x-ui.password-input id="password" name="password"/>
          </div>

        <div class="mb-4">
            <x-ui.label>Estado</x-ui.label>
            <x-ui.select name="estado" required>
                <option value="activo" {{ $usuario->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ $usuario->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
            </x-ui.select>
        </div>
        
        <div class="mb-4">
        <x-ui.button>Guardar cambios</x-ui.button>
        </div>
        <div class="mb-4">
        <a href="{{ route('panel.admin') }}" class="block text-center mt-4 bg-gray-300 hover:bg-gray-400 text-black font-semibold py-2 px-4 rounded transition duration-200">
            Regresar
        </a>
    </div>
    </form>

</body>
</html>
