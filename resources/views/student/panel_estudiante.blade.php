<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panel del Estudiante</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-slate-100 dark:bg-zinc-900 text-gray-900 dark:text-white font-sans transition-colors duration-300">

  <header class="bg-blue-600 dark:bg-blue-800 text-white p-6 text-center">
    <h1 class="text-3xl font-bold">Panel del Estudiante</h1>
  </header>

  <div class="container max-w-screen-lg mx-auto mt-8 bg-white dark:bg-zinc-800 rounded-xl shadow-lg p-6 sm:p-8">
    <h2 class="text-2xl font-semibold mb-6">Bienvenido, {{ $nombre }}</h2>

    <div class="flex flex-col md:flex-row md:space-x-4 mb-8">
      <div class="flex-1 bg-blue-100 dark:bg-blue-900 p-6 rounded-lg text-center mb-4 md:mb-0">
        <h3 class="text-lg font-semibold text-blue-700 dark:text-blue-200 mb-2">Horas cumplidas</h3>
        <p class="text-2xl font-bold text-blue-900 dark:text-white">{{ number_format($total_horas, 1) }} / 480</p>
      </div>
      <div class="flex-1 bg-blue-100 dark:bg-blue-900 p-6 rounded-lg text-center">
        <h3 class="text-lg font-semibold text-blue-700 dark:text-blue-200 mb-2">Asistencias</h3>
        <p class="text-2xl font-bold text-blue-900 dark:text-white">{{ $num_asistencias }} días</p>
      </div>
    </div>

    <h3 class="text-xl font-semibold mb-4">Historial de Asistencia</h3>

    <div class="overflow-x-auto">
      <table class="min-w-full text-sm text-center border-collapse">
        <thead>
          <tr class="bg-gray-100 dark:bg-zinc-700 text-gray-700 dark:text-gray-300">
            <th class="py-3 px-4 border-b">Fecha</th>
            <th class="py-3 px-4 border-b">Hora de Entrada</th>
            <th class="py-3 px-4 border-b">Hora de Salida</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($asistencias as $asis)
          <tr class="hover:bg-gray-50 dark:hover:bg-zinc-600">
            <td class="py-3 px-4 border-b">{{ $asis['fecha'] }}</td>
            <td class="py-3 px-4 border-b">{{ $asis['hora_entrada'] }}</td>
            <td class="py-3 px-4 border-b">{{ $asis['hora_salida'] ?? '—' }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <form action="{{ route('logout') }}" method="POST" class="mt-6">
      @csrf
      <button type="submit" class="w-full sm:w-auto bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded transition duration-200">
        Cerrar sesión
      </button>
    </form>

    <div class="flex justify-center my-6">
      {!! $qr !!}
    </div>
  </div>

</body>
</html>
