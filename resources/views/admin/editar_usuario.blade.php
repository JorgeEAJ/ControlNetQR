<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen dark:bg-zinc-900">
    @include('components.sidebar')

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class="bg-white dark:bg-black p-8 rounded-xl shadow-md w-96">
        @csrf
        @method('PUT')

        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Editar</h2>

        <div class="mb-4">
            <x-ui.label>Nombre</x-ui.label>
            <x-ui.input type="text" placeholder="nombre" value="{{ old('nombre', $usuario->nombre)}}" required />

        <div class="mb-4">
            <label class="text-sm leading-none font-medium select-none text-black dark:text-gray-200">Número de Control</label>
            <input type="text" name="numero_control" value="{{ old('numero_control', $usuario->numero_control) }}" class="selection:bg-blue-200 selection:text-black focus:outline-none focus:ring-2 
            focus:ring-blue-400 input-visible-selection dark:bg-gray-800 dark:text-white dark:border-gray-600 border-input placeholder:text-muted-foreground 
           selection:text-white-foreground h-9 w-full min-w-0 rounded-md bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow]
            outline-none inline-flex border-0 font-medium md:text-sm" required>
          </div>
      
        <div class="mb-4">
            <label class="text-sm leading-none font-medium select-none text-black dark:text-gray-200">Correo</label>
            <input type="text" name="correo" value="{{ old('correo', $usuario->correo) }}" class="selection:bg-blue-200 selection:text-black focus:outline-none focus:ring-2 focus:ring-blue-400 input-visible-selection 
            dark:bg-gray-800 dark:text-white dark:border-gray-600 border-input placeholder:text-muted-foreground selection:text-white-foreground
            h-9 w-full min-w-0 rounded-md bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow]
             outline-none inline-flex border-0 font-medium md:text-sm" required>
          </div>

        <div class="mb-4">
            <label class="text-sm leading-none font-medium select-none text-black dark:text-gray-200">Contraseña</label>
            <input type="password" name="password" value="{{ old('password', Hash::make($usuario->password)) }}" class="selection:bg-blue-200 selection:text-black focus:outline-none focus:ring-2 focus:ring-blue-400 
            input-visible-selection dark:bg-gray-800 dark:text-white dark:border-gray-600 border-input placeholder:text-muted-foreground selection:text-white-foreground
              h-9 w-full min-w-0 rounded-md bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow]
               outline-none inline-flex border-0 font-medium md:text-sm" required>
          </div>

        <div class="mb-4">
            <label class="text-sm leading-none font-medium select-none text-black dark:text-gray-200">Estado</label>
            <select name="estado" class="focus:outline-none focus:ring-2 focus:ring-blue-400 input-visible-selection 
            dark:bg-gray-800 dark:text-white dark:border-gray-600 border-input flex h-9 w-full items-center justify-between 
            rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-xs outline-none focus:ring-ring/50">
                <option value="activo" {{ $usuario->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ $usuario->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>
        
        <div class="mb-4">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white w-full py-2 px-4 rounded font-semibold">Guardar cambios</button>
        </div>
        <div class="mb-4">
        <a href="{{ route('panel.admin') }}" class="block text-center mt-4 bg-gray-300 hover:bg-gray-400 text-black font-semibold py-2 px-4 rounded transition duration-200">
            Regresar
        </a>
    </div>
    </form>

</body>
</html>
