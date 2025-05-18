<div>
  <!-- Formulario oculto que ambos métodos usan -->
  <form id="qrForm" action="{{ route('procesar.qr') }}" method="POST" class="w-full max-w-sm mx-auto mb-4">
    @csrf
    <input
      type="text"
      name="qr_code"
      id="qr_code_input"
      autofocus
      autocomplete="off"
      class="w-full p-4 rounded border border-gray-300 shadow focus:outline-none focus:ring-2 focus:ring-blue-500"
      placeholder="Escanea aquí con el lector físico"
    >
  </form>

  <!-- Botón para activar la cámara -->
  <div class="text-center">
    <button
      onclick="iniciarCamara()"
      class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition mb-4">
      Usar cámara
    </button>
  </div>

  <!-- Lector por cámara -->
  <div id="reader" class="w-full max-w-sm mx-auto hidden border border-gray-300 rounded"></div>

  <div id="result" class="text-center text-green-600 font-semibold mt-4"></div>
</div>

@push('scripts')
<script src="https://unpkg.com/html5-qrcode"></script>
<script>
  const input = document.getElementById('qr_code_input');
  input.addEventListener('input', function () {
    setTimeout(() => {
      if (input.value.trim() !== '') {
        document.getElementById('qrForm').submit();
      }
    }, 200);
  });

  let camaraActiva = false;
  function iniciarCamara() {
    const readerDiv = document.getElementById('reader');
    readerDiv.classList.remove('hidden');

    if (camaraActiva) return;
    camaraActiva = true;

    const html5QrCode = new Html5Qrcode("reader");

    Html5Qrcode.getCameras().then(cameras => {
      if (cameras.length) {
        html5QrCode.start(
          cameras[0].id,
          { fps: 10, qrbox: { width: 250, height: 250 } },
          (decodedText) => {
            document.getElementById('qr_code_input').value = decodedText;
            html5QrCode.stop();
            document.getElementById('qrForm').submit();
          }
        );
      }
    });
  }
</script>
@endpush
