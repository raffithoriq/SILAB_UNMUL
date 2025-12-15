<header class="border-b bg-white/80 backdrop-blur-sm">
  <div class="container mx-auto px-4 py-4 flex items-center justify-between">
    <a href="{{ url('/') }}" class="flex items-center space-x-2">
      <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
        {{-- BookOpen icon (SVG) --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
          <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
        </svg>
      </div>
      <span class="text-xl font-bold text-gray-900">SILAB UNMUL</span>
    </a>

    <nav class="hidden md:flex items-center space-x-6">
      <a href="#features" class="text-gray-600 hover:text-blue-600 transition-colors">Fitur</a>
      <a href="#how-it-works" class="text-gray-600 hover:text-blue-600 transition-colors">Cara Kerja</a>


      <a href="/login"
         class="inline-flex items-center justify-center rounded-md bg-blue-600 px-4 py-2 text-white font-medium hover:bg-blue-700 transition">
        Login
      </a>
    </nav>
  </div>
</header>
