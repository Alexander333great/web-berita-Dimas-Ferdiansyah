@extends('layouts.admin')

@section('title', 'Manajemen Kategori')

@section('content')
<div class="space-y-6 animate-in slide-in-from-right-4 duration-700">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Kategori Berita</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Kelola kategori untuk mengelompokkan berita Anda.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Form Tambah/Edit Kategori -->
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-navy-800 p-6 rounded-2xl border border-gray-50 dark:border-navy-700 shadow-sm sticky top-6">
                <h3 class="font-bold text-gray-800 dark:text-white mb-6 flex items-center">
                    <i data-lucide="plus-circle" class="w-5 h-5 mr-2 text-accent"></i>
                    Tambah Kategori Baru
                </h3>
                <form class="space-y-4">
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600 dark:text-gray-300">Nama Kategori</label>
                        <input type="text" placeholder="Contoh: Teknologi" 
                               class="w-full px-4 py-2.5 bg-gray-50 dark:bg-navy-900 border border-transparent focus:border-accent/30 focus:ring-4 focus:ring-accent/10 rounded-xl text-sm outline-none transition-all dark:text-gray-300"
                               onkeyup="document.getElementById('slug-preview').value = this.value.toLowerCase().replace(/ /g, '-')">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600 dark:text-gray-300">Slug (Otomatis)</label>
                        <div class="relative">
                            <i data-lucide="link" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                            <input type="text" id="slug-preview" readonly placeholder="slug-kategori" 
                                   class="w-full pl-10 pr-4 py-2.5 bg-gray-100 dark:bg-navy-950 border border-transparent rounded-xl text-sm text-gray-500 outline-none cursor-not-allowed">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600 dark:text-gray-300">Deskripsi (Opsional)</label>
                        <textarea rows="3" placeholder="Jelaskan kategori ini..." 
                                  class="w-full px-4 py-2.5 bg-gray-50 dark:bg-navy-900 border border-transparent focus:border-accent/30 focus:ring-4 focus:ring-accent/10 rounded-xl text-sm outline-none transition-all dark:text-gray-300"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-accent py-3 rounded-xl text-sm font-bold text-white shadow-lg shadow-accent/30 hover:shadow-accent/40 transition-all transform hover:-translate-y-0.5 active:scale-95">
                        Simpan Kategori
                    </button>
                </form>
            </div>
        </div>

        <!-- Tabel Kategori -->
        <div class="lg:col-span-2 space-y-4">
            <!-- Search & Count -->
            <div class="bg-white dark:bg-navy-800 p-4 rounded-2xl border border-gray-50 dark:border-navy-700 shadow-sm flex items-center justify-between">
                <div class="relative w-full max-w-xs group">
                    <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 group-focus-within:text-accent transition-colors"></i>
                    <input type="text" placeholder="Cari kategori..." 
                           class="w-full pl-10 pr-4 py-2 bg-gray-50 dark:bg-navy-900 border border-transparent focus:border-accent/30 focus:ring-4 focus:ring-accent/10 rounded-xl text-sm outline-none transition-all dark:text-gray-300">
                </div>
                <p class="text-xs font-medium text-gray-400">Total: <span class="text-gray-800 dark:text-white font-bold">7 Kategori</span></p>
            </div>

            <div class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-50 dark:border-navy-700 shadow-sm overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50/50 dark:bg-navy-900/50">
                        <tr>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Nama Kategori</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Slug</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Jumlah Berita</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 dark:divide-navy-700">
                        @php
                            $categories = [
                                ['name' => 'Teknologi', 'slug' => 'teknologi', 'count' => 45],
                                ['name' => 'Olahraga', 'slug' => 'olahraga', 'count' => 32],
                                ['name' => 'Politik', 'slug' => 'politik', 'count' => 28],
                                ['name' => 'Hiburan', 'slug' => 'hiburan', 'count' => 20],
                                ['name' => 'Pendidikan', 'slug' => 'pendidikan', 'count' => 18],
                                ['name' => 'Bisnis', 'slug' => 'bisnis', 'count' => 15],
                                ['name' => 'Kesehatan', 'slug' => 'kesehatan', 'count' => 12],
                            ];
                        @endphp
                        @foreach($categories as $cat)
                        <tr class="hover:bg-gray-50 dark:hover:bg-navy-700/50 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-2 h-2 rounded-full bg-accent"></div>
                                    <span class="text-sm font-bold text-gray-800 dark:text-gray-200">{{ $cat['name'] }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <code class="text-xs font-medium px-2 py-1 rounded bg-gray-100 dark:bg-navy-900 text-gray-500 dark:text-gray-400">/{{ $cat['slug'] }}</code>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    <span class="text-sm font-bold text-gray-700 dark:text-gray-300">{{ $cat['count'] }}</span>
                                    <span class="text-xs text-gray-400">Berita</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <button title="Edit" class="p-2 rounded-xl border border-gray-100 dark:border-navy-600 hover:bg-amber-50 dark:hover:bg-amber-500/10 hover:border-amber-200 transition-all text-amber-500">
                                        <i data-lucide="edit-3" class="w-4 h-4"></i>
                                    </button>
                                    <button title="Hapus" class="p-2 rounded-xl border border-gray-100 dark:border-navy-600 hover:bg-red-50 dark:hover:bg-red-500/10 hover:border-red-200 transition-all text-red-500">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Empty State Example (Hidden) -->
            <div class="hidden flex flex-col items-center justify-center py-12 bg-white dark:bg-navy-800 rounded-2xl border border-dashed border-gray-200 dark:border-navy-700">
                <div class="w-20 h-20 bg-gray-50 dark:bg-navy-900 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="tag" class="w-10 h-10 text-gray-300"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 dark:text-white">Belum Ada Kategori</h3>
                <p class="text-sm text-gray-500 text-center max-w-xs px-4 mt-1">Silakan tambahkan kategori baru menggunakan form di samping kiri.</p>
            </div>
        </div>
    </div>
</div>
@endsection
