<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escáner QR</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white min-h-screen">
  <div class="flex min-h-screen">
    @include('components.sidebar')

    <main class="flex-1 p-6">
      <h1 class="text-xl font-bold text-center my-4">Escanea tu código QR</h1>

      {{-- Se incluye el componente del lector QR --}}
      @include('components.qr-scanner')
    </main>
  </div>

  {{-- Se insertan los scripts del componente --}}
  @stack('scripts')
</body>
</html>
