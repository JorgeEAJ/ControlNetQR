<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panel del Estudiante</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-slate-100 font-sans">

  <header class="bg-blue-600 text-white p-6 text-center">
    <h1 class="text-3xl font-bold">Panel del Estudiante</h1>
  </header>

  <div class="max-w-5xl mx-auto mt-8 bg-white rounded-xl shadow-lg p-8">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Bienvenido, {{ $nombre }}</h2>

    <div class="flex flex-col md:flex-row md:space-x-4 mb-8">
      <div class="flex-1 bg-blue-100 p-6 rounded-lg text-center mb-4 md:mb-0">
        <h3 class="text-lg font-semibold text-blue-700 mb-2">Horas cumplidas</h3>
        <p class="text-2xl font-bold text-blue-900">{{ number_format($total_horas, 1) }} / 120</p>
      </div>
      <div class="flex-1 bg-blue-100 p-6 rounded-lg text-center">
        <h3 class="text-lg font-semibold text-blue-700 mb-2">Asistencias</h3>
        <p class="text-2xl font-bold text-blue-900">{{ $num_asistencias }} días</p>
      </div>
    </div>

    <h3 class="text-xl font-semibold text-gray-700 mb-4">Historial de Asistencia</h3>

    <div class="overflow-x-auto">
      <table class="w-full border-collapse">
        <thead>
          <tr class="bg-gray-100 text-gray-700">
            <th class="py-3 px-4 border-b text-center">Fecha</th>
            <th class="py-3 px-4 border-b text-center">Hora de Entrada</th>
            <th class="py-3 px-4 border-b text-center">Hora de Salida</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($asistencias as $asis)
          <tr class="hover:bg-gray-50">
            <td class="py-3 px-4 border-b text-center">{{ $asis['fecha'] }}</td>
            <td class="py-3 px-4 border-b text-center">{{ $asis['hora_entrada'] }}</td>
            <td class="py-3 px-4 border-b text-center">{{ $asis['hora_salida'] ?? '—' }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  
<form action="{{ route('logout') }}" method="POST" class="mt-4">
  @csrf
  <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded transition duration-200">Cerrar sesión</button>
</form>
  </div>
  
<div class="flex justify-center my-6">
    {!! $qr !!}
</div>

</body>
</html>
