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

      <form id="qrForm" action="{{ route('procesar.qr') }}" method="POST" class="w-full max-w-sm mx-auto">
        @csrf
        <input
          type="text"
          name="qr_code"
          id="qr_code_input"
          autofocus
          autocomplete="off"
          class="w-full p-4 rounded border border-gray-300 shadow focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Escanea el código aquí"
        >
      </form>

      <div id="result" class="text-center text-green-600 font-semibold mt-4"></div>

      <script>
        const input = document.getElementById('qr_code_input');
        input.addEventListener('input', function () {
          // Esperar unos milisegundos para asegurar que se capturó todo el código
          setTimeout(() => {
            if (input.value.trim() !== '') {
              document.getElementById('qrForm').submit();
            }
          }, 200);
        });
      </script>
    </main>
  </div>
</body>
</html>
