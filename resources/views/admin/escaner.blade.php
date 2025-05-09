<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escaner</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white min-h-screen">
  <div class="flex min-h-screen">
    @include('components.sidebar')

    <main class="flex-1 p-6">
      <h1 class="text-xl font-bold text-center my-4">Escanea tu código QR</h1>
      <div id="reader" class="w-full max-w-sm mx-auto mb-4 border border-gray-300 rounded"></div>

      {{-- Formulario oculto para enviar el QR --}}
      <form id="qrForm" action="{{ route('procesar.qr') }}" method="POST" class="hidden">
        @csrf
        <input type="hidden" name="qr_code" id="qr_code_input">
      </form>

      <div id="result" class="text-center text-green-600 font-semibold mt-2"></div>

      <script src="https://unpkg.com/html5-qrcode"></script>
      <script>
        function onScanSuccess(decodedText) {
          // Rellenar el input oculto y enviar el formulario
          document.getElementById('qr_code_input').value = decodedText;
          document.getElementById('qrForm').submit();
        }

        const html5QrCode = new Html5Qrcode("reader");
        Html5Qrcode.getCameras().then(cameras => {
          if (cameras.length) {
            html5QrCode.start(
              cameras[0].id,
              { fps: 10, qrbox: { width: 259, height: 250 } },
              onScanSuccess
            );
          }
        });
      </script>
    </main>
  </div>
</body>
</html>
