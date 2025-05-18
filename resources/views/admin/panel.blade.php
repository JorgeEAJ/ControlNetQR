<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel del Administrador</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white min-h-screen">

    @include('components.sidebar')

<div id="main-content" class="transition-all duration-300 ml-0 min-h-screen flex flex-col">
  @if (session('success'))
    <div class="bg-green-500 text-white p-2 rounded mb-4 text-center">
        {{ session('success') }}
    </div>
@endif

@if (session('info'))
    <div class="bg-blue-800 text-white p-2 rounded mb-4 text-center">
        {{ session('info') }}
    </div>
@endif
@if (session('error'))
    <div class="bg-red-500 text-white p-2 rounded mb-4 text-center">
        {{ session('info') }}
    </div>
@endif
    <!-- Main Content -->
    <main class="flex-1 p-6">
      <!-- Contenido -->
       <!-- Header -->
      <header class="bg-blue-800 dark:bg-blue-900 text-white p-6 text-center rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold">Panel del Administrador</h1>
      </header>
      <section class="mt-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">

        <!-- Resumen General -->
        <h2 class="text-xl font-bold mb-6">Resumen General</h2>
        
        <div class="flex justify-center grid-cols-1 md:grid-cols-3 gap-6 mb-8">
          <div class="bg-blue-50 dark:bg-blue-950 p-6 rounded-lg shadow-md text-center">
            <h3 class="font-semibold text-lg">Estudiantes Activos</h3>
            <p class="text-2xl font-bold text-blue-600 dark:text-blue-400"><?php echo $totalEstudiantes; ?></p>
          </div>
          <div class="bg-blue-50 dark:bg-blue-950 p-6 rounded-lg shadow-md text-center">
            <h3 class="font-semibold text-lg">Asistencias del Dia</h3>
            <p class="text-2xl font-bold text-blue-600 dark:text-blue-400"><?php echo $asistenciasHoy; ?></p>
          </div>
        </div>

        <!-- Tabla Estudiantes -->
        <h2 class="text-xl font-bold mb-4">Listado de Estudiantes</h2>
        <div class="overflow-x-auto">
          <table class="min-w-full bg-white dark:bg-gray-700 border-collapse rounded-lg shadow-md">
            <thead>
              <tr class="bg-gray-200 dark:bg-gray-600">
                <th class="py-3 px-4 text-left">Nombre</th>
                <th class="py-3 px-4 text-left">Horas</th>
                <th class="py-3 px-4 text-left">Último Registro</th>
                <th class="py-3 px-4 text-left">Estado</th>
                <th class="py-3 px-4 text-left">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($listadoEstudiantes as $estudiante)
              <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600">
                <td class="py-3 px-4">{{ $estudiante->nombre }}</td>
                <td class="py-3 px-4">{{ $estudiante->horas_cumplidas ?? 0 }} / 480</td>
                <td class="py-3 px-4">{{ $estudiante->ultimo_registro ?? 'Sin registro' }}</td>
                <td class="py-3 px-4">{{ $estudiante->estado }}</td>
                <td class="py-3 px-4 flex flex-wrap gap-2">
                  <a href="{{ route('usuarios.edit', $estudiante->numero_control) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded text-sm">Editar</a>
                  <form action="{{ route('usuarios.destroy', $estudiante->numero_control) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar a este usuario?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-sm">Eliminar</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </section>
    </main>
    </div>
</body>
</html>
