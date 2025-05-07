<!-- Sidebar -->
<aside id="sidebar" class="dark:text-white w-64 h-screen flex flex-col bg-white dark:bg-gray-800 shadow-lg transition-transform transform fixed top-0 left-0 z-40 -translate-x-full">

    <!-- Logo -->
    <div class="p-6 text-center border-b border-gray-200 dark:border-gray-700">
      <h2 class="text-xl font-bold">Logo</h2>
    </div>
  
    <!-- Menú de navegación -->
    <nav class="flex flex-col p-4 space-y-2 flex-1 overflow-y-auto">
        <form action="{{ route('panel.admin') }}" method="GET">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
              Inicio
            </button>
          </form>
  
      <form action="{{ route('signup') }}" method="GET">
        @csrf
        <button type="submit" class="w-full text-left px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
          Registrar Usuario
        </button>
      </form>
  
      <form action="{{ route('escaner') }}" method="GET">
        @csrf
        <button type="submit" class="w-full text-left px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
          Escáner
        </button>
      </form>
    </nav>
  
    <!-- Menú de usuario -->
    <div class="relative p-4 border-t border-gray-200 dark:border-gray-700">
      <button onclick="toggleUserMenu()" class="w-full text-left flex items-center justify-between px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
        <div>
          <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">{{ Auth::User()->nombre }}</p>
          <p class="text-xs text-gray-500 dark:text-gray-400">{{ Auth::User()->correo }}</p>
        </div>
        <svg class="w-4 h-4 ml-2 transition-transform" id="arrow-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
      </button>
  
      <div id="user-menu" class="hidden mt-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded shadow-md">
        <a href="#" class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Perfil</a>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="block w-full text-left px-4 py-2 bg-red-600 text-white rounded hover:bg-red-500 active:bg-red-700 transition-colors">
            Cerrar sesión
          </button>
        </form>
      </div>
    </div>
  </aside>
  
  <!-- Botón flotante para abrir el sidebar -->
  <button onclick="toggleSidebar()" class="p-3 text-2xl fixed top-4 left-4 z-50 dark:bg-gray-800 bg-gray-400 text-white rounded">
    ☰
  </button>
  
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('-translate-x-full');
    }
  
    function toggleUserMenu() {
      const menu = document.getElementById('user-menu');
      const arrow = document.getElementById('arrow-icon');
      menu.classList.toggle('hidden');
      arrow.classList.toggle('rotate-180');
    }
  </script>
  