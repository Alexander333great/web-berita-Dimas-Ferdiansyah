<aside class="w-64 bg-navy-800 text-white flex-shrink-0 transition-all duration-300 transform" 
       :class="{ '-ml-64': !sidebarOpen }">
    <div class="h-full flex flex-col">
        <!-- Logo Area -->
        <div class="p-6 flex items-center space-x-3">
            <div class="w-10 h-10 bg-accent rounded-lg flex items-center justify-center shadow-lg shadow-accent/20">
                <i data-lucide="newspaper" class="w-6 h-6 text-white"></i>
            </div>
            <span class="text-xl font-bold tracking-tight">WEB BERITA</span>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-4 space-y-2 py-4 overflow-y-auto">
            <p class="text-xs font-semibold text-navy-300 uppercase px-2 mb-2">Menu Utama</p>
            
            <a href="/admin/dashboard" class="flex items-center space-x-3 p-3 rounded-xl transition-all hover:bg-navy-700 group {{ request()->is('admin/dashboard') ? 'bg-accent shadow-lg shadow-accent/30' : '' }}">
                <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                <span class="font-medium">Dashboard</span>
            </a>

            <p class="text-xs font-semibold text-navy-300 uppercase px-2 mb-2 pt-4">Kelola Konten</p>
            
            <a href="/admin/berita" class="flex items-center space-x-3 p-3 rounded-xl transition-all hover:bg-navy-700 group {{ request()->is('admin/berita*') ? 'bg-accent shadow-lg shadow-accent/30' : '' }}">
                <i data-lucide="file-text" class="w-5 h-5"></i>
                <span class="font-medium">Berita</span>
                <i data-lucide="chevron-right" class="w-4 h-4 ml-auto opacity-0 group-hover:opacity-100 transition-opacity"></i>
            </a>

            <a href="/admin/kategori" class="flex items-center space-x-3 p-3 rounded-xl transition-all hover:bg-navy-700 group {{ request()->is('admin/kategori*') ? 'bg-accent shadow-lg shadow-accent/30' : '' }}">
                <i data-lucide="tag" class="w-5 h-5"></i>
                <span class="font-medium">Kategori</span>
            </a>

            <a href="#" class="flex items-center space-x-3 p-3 rounded-xl transition-all hover:bg-navy-700 group">
                <i data-lucide="users" class="w-5 h-5"></i>
                <span class="font-medium">Penulis</span>
            </a>

            <a href="#" class="flex items-center space-x-3 p-3 rounded-xl transition-all hover:bg-navy-700 group">
                <i data-lucide="message-square" class="w-5 h-5"></i>
                <span class="font-medium">Komentar</span>
            </a>

            <p class="text-xs font-semibold text-navy-300 uppercase px-2 mb-2 pt-4">Sistem</p>
            
            <a href="#" class="flex items-center space-x-3 p-3 rounded-xl transition-all hover:bg-navy-700 group">
                <i data-lucide="user-cog" class="w-5 h-5"></i>
                <span class="font-medium">Pengguna</span>
            </a>

            <a href="#" class="flex items-center space-x-3 p-3 rounded-xl transition-all hover:bg-navy-700 group">
                <i data-lucide="settings" class="w-5 h-5"></i>
                <span class="font-medium">Pengaturan</span>
            </a>
        </nav>

        <!-- Logout -->
        <div class="p-4 border-t border-navy-700">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center space-x-3 w-full p-3 rounded-xl transition-all hover:bg-red-500/10 text-red-400 group">
                    <i data-lucide="log-out" class="w-5 h-5"></i>
                    <span class="font-medium">Keluar</span>
                </button>
            </form>
        </div>
    </div>
</aside>
