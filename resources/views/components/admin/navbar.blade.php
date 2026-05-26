<header class="bg-white dark:bg-navy-800 border-b border-gray-100 dark:border-navy-700 py-4 px-6 flex items-center justify-between transition-colors duration-300">
    <!-- Left: Sidebar Toggle & Search -->
    <div class="flex items-center space-x-4">
        <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-navy-700 transition-colors">
            <i data-lucide="menu" class="w-6 h-6 text-gray-500 dark:text-gray-300"></i>
        </button>
        
        <div class="hidden md:flex items-center bg-gray-50 dark:bg-navy-900 border border-gray-100 dark:border-navy-700 rounded-xl px-3 py-1.5 w-64 group focus-within:ring-2 focus-within:ring-accent/20 transition-all">
            <i data-lucide="search" class="w-4 h-4 text-gray-400"></i>
            <input type="text" placeholder="Cari berita..." class="bg-transparent border-none focus:ring-0 text-sm ml-2 w-full text-gray-600 dark:text-gray-300 placeholder-gray-400">
        </div>
    </div>

    <!-- Right: Notif, Theme, Profile -->
    <div class="flex items-center space-x-4">
        <!-- Dark Mode Toggle -->
        <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-navy-700 transition-colors">
            <i x-show="!darkMode" data-lucide="moon" class="w-5 h-5 text-gray-500"></i>
            <i x-show="darkMode" data-lucide="sun" class="w-5 h-5 text-yellow-400" x-cloak></i>
        </button>

        <!-- Notifications -->
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-navy-700 transition-colors relative">
                <i data-lucide="bell" class="w-5 h-5 text-gray-500 dark:text-gray-300"></i>
                <span class="absolute top-2 right-2.5 w-2 h-2 bg-red-500 rounded-full border-2 border-white dark:border-navy-800"></span>
            </button>
            
            <div x-show="open" @click.away="open = false" x-cloak
                 class="absolute right-0 mt-2 w-80 glass rounded-2xl shadow-2xl z-50 p-4 border border-gray-100 dark:border-navy-600">
                <h3 class="font-bold text-gray-800 dark:text-white mb-4">Notifikasi</h3>
                <div class="space-y-3">
                    <div class="flex space-x-3 p-2 rounded-xl hover:bg-gray-50 dark:hover:bg-navy-700 cursor-pointer transition-colors">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                            <i data-lucide="file-text" class="w-5 h-5 text-blue-600"></i>
                        </div>
                        <div>
                            <p class="text-xs font-medium dark:text-gray-200">Berita baru ditambahkan oleh Penulis</p>
                            <span class="text-[10px] text-gray-400">2 menit yang lalu</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Profile -->
        <div class="flex items-center space-x-3 pl-4 border-l border-gray-100 dark:border-navy-700">
            <div class="text-right hidden sm:block">
                <p class="text-sm font-bold text-gray-800 dark:text-white">{{ Auth::user()->name }}</p>
                <p class="text-[10px] font-medium text-gray-400 uppercase tracking-wider">Administrator</p>
            </div>
            <div class="relative group cursor-pointer">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=3b82f6&color=fff" 
                     class="w-10 h-10 rounded-xl border-2 border-white dark:border-navy-700 shadow-sm" alt="Admin Avatar">
                <div class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-green-500 rounded-full border-2 border-white dark:border-navy-800"></div>
            </div>
        </div>
    </div>
</header>
