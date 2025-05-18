<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faltas de Estudiantes</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white min-h-screen">
  @include('components.sidebar')

  <div id="main-content" class="transition-all duration-300 ml-0 min-h-screen flex flex-col">
    @if (session('success'))
    <div class="bg-green-500 text-white p-2 rounded mb-4 mx-6 mt-4 text-center">
        {{ session('success') }}
    </div>
  @endif
    <main class="flex-1 p-6">

      <!-- Encabezado -->
      <header class="bg-blue-800 dark:bg-blue-900 text-white p-6 text-center rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold">Faltas de Estudiantes</h1>
      </header>

      <!-- Sección Principal -->
      <section class="mt-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
        <h2 class="text-xl font-bold mb-4">Listado de Faltas</h2>

        <div class="overflow-x-auto">
          <table class="min-w-full bg-white dark:bg-gray-700 border-collapse rounded-lg shadow-md">
            <thead>
              <tr class="bg-gray-200 dark:bg-gray-600">
                <th class="p-3 border-b text-left">#</th>
                <th class="p-3 border-b text-left">Nombre</th>
                <th class="p-3 border-b text-left">Número de Control</th>
                <th class="p-3 border-b text-left">Fecha</th>
                <th class="p-3 border-b text-left">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($faltas as $index => $falta)
                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600">
                  <td class="p-3">{{ $index + 1 }}</td>
                  <td class="p-3">{{ $falta->nombre }}</td>
                  <td class="p-3">{{ $falta->numero_control }}</td>
                  <td class="p-3">{{ \Carbon\Carbon::parse($falta->fecha)->format('d/m/Y') }}</td>
                  <td class="p-3">
                    <form action="{{ route('faltas.destroy', $falta->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta falta?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-sm">Eliminar</button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="p-4 text-center text-gray-500 dark:text-gray-300">No hay faltas registradas.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

      </section>
    </main>
  </div>
</body>
</html>
