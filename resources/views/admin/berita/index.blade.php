@extends('layouts.admin')

@section('title', 'Manajemen Berita')

@section('content')
<div class="space-y-6 animate-in slide-in-from-bottom-4 duration-700">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Daftar Berita</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Kelola semua konten berita portal Anda di sini.</p>
        </div>
        <button class="flex items-center justify-center space-x-2 bg-accent px-6 py-2.5 rounded-xl text-sm font-bold text-white shadow-lg shadow-accent/30 hover:shadow-accent/40 transition-all transform hover:-translate-y-1">
            <i data-lucide="plus-circle" class="w-5 h-5"></i>
            <span>Tambah Berita Baru</span>
        </button>
    </div>

    <!-- Filters & Search -->
    <div class="bg-white dark:bg-navy-800 p-4 rounded-2xl border border-gray-50 dark:border-navy-700 shadow-sm flex flex-col md:flex-row gap-4 items-center justify-between">
        <div class="flex items-center space-x-2 w-full md:w-auto">
            <div class="relative w-full md:w-80 group">
                <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 group-focus-within:text-accent transition-colors"></i>
                <input type="text" placeholder="Cari judul berita atau penulis..." 
                       class="w-full pl-10 pr-4 py-2 bg-gray-50 dark:bg-navy-900 border border-transparent focus:border-accent/30 focus:ring-4 focus:ring-accent/10 rounded-xl text-sm outline-none transition-all dark:text-gray-300">
            </div>
            <button class="p-2 bg-gray-50 dark:bg-navy-900 rounded-xl border border-transparent hover:border-gray-200 dark:hover:border-navy-600 transition-all">
                <i data-lucide="sliders-horizontal" class="w-5 h-5 text-gray-500"></i>
            </button>
        </div>
        <div class="flex items-center space-x-3 w-full md:w-auto">
            <select class="bg-gray-50 dark:bg-navy-900 border-none text-sm rounded-xl px-4 py-2 outline-none dark:text-gray-300 w-full md:w-auto">
                <option>Semua Kategori</option>
                <option>Teknologi</option>
                <option>Olahraga</option>
            </select>
            <select class="bg-gray-50 dark:bg-navy-900 border-none text-sm rounded-xl px-4 py-2 outline-none dark:text-gray-300 w-full md:w-auto">
                <option>Status: Semua</option>
                <option>Published</option>
                <option>Draft</option>
            </select>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-50 dark:border-navy-700 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50/50 dark:bg-navy-900/50">
                    <tr>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Thumbnail & Judul</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Penulis</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 dark:divide-navy-700">
                    @php
                        $beritaList = [
                            ['id' => 1, 'title' => 'Perkembangan AI di Tahun 2026: Masa Depan yang Menjanjikan', 'cat' => 'Teknologi', 'author' => 'Dimas Ferdi', 'status' => 'Published', 'date' => '24 Mei 2026', 'img' => 'ai'],
                            ['id' => 2, 'title' => 'Tim Nasional Menang Dramatis Melawan Rival Abadi', 'cat' => 'Olahraga', 'author' => 'Andi Wijaya', 'status' => 'Published', 'date' => '23 Mei 2026', 'img' => 'sports'],
                            ['id' => 3, 'title' => 'Infrastruktur Cloud Semakin Terjangkau bagi UMKM', 'cat' => 'Teknologi', 'author' => 'Siti Aminah', 'status' => 'Draft', 'date' => '22 Mei 2026', 'img' => 'cloud'],
                            ['id' => 4, 'title' => '10 Tips Belajar Coding untuk Pemula di Era Digital', 'cat' => 'Pendidikan', 'author' => 'Budi Santoso', 'status' => 'Published', 'date' => '21 Mei 2026', 'img' => 'coding'],
                            ['id' => 5, 'title' => 'Startup Indonesia Siap Ekspansi ke Pasar Global', 'cat' => 'Bisnis', 'author' => 'Rina Putri', 'status' => 'Published', 'date' => '20 Mei 2026', 'img' => 'startup'],
                            ['id' => 6, 'title' => 'Pentingnya Menjaga Kesehatan Mental di Tempat Kerja', 'cat' => 'Kesehatan', 'author' => 'Dr. Aris', 'status' => 'Published', 'date' => '19 Mei 2026', 'img' => 'health'],
                        ];
                    @endphp
                    @foreach($beritaList as $item)
                    <tr class="hover:bg-gray-50 dark:hover:bg-navy-700/50 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-4">
                                <div class="w-16 h-12 rounded-xl bg-gray-100 dark:bg-navy-900 overflow-hidden flex-shrink-0 shadow-sm">
                                    <img src="https://picsum.photos/seed/{{ $item['img'] }}/200/150" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                </div>
                                <div class="max-w-xs">
                                    <p class="text-sm font-bold text-gray-800 dark:text-gray-200 line-clamp-2 leading-tight group-hover:text-accent transition-colors">{{ $item['title'] }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-[10px] font-bold px-2.5 py-1 rounded-full bg-blue-50 dark:bg-blue-500/10 text-blue-500 uppercase tracking-wider">{{ $item['cat'] }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-2">
                                <div class="w-6 h-6 rounded-full bg-accent/20 flex items-center justify-center text-[10px] font-bold text-accent">
                                    {{ substr($item['author'], 0, 1) }}
                                </div>
                                <span class="text-sm text-gray-600 dark:text-gray-400">{{ $item['author'] }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-500">{{ $item['date'] }}</td>
                        <td class="px-6 py-4">
                            @if($item['status'] == 'Published')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-green-100 dark:bg-green-500/10 text-green-600 dark:text-green-500 uppercase tracking-wider">
                                    Published
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-orange-100 dark:bg-orange-500/10 text-orange-600 dark:text-orange-500 uppercase tracking-wider">
                                    Draft
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end space-x-2">
                                <button title="Detail" class="p-2 rounded-xl border border-gray-100 dark:border-navy-600 hover:bg-blue-50 dark:hover:bg-blue-500/10 hover:border-blue-200 transition-all text-blue-500">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                </button>
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
        
        <!-- Pagination -->
        <div class="p-6 bg-gray-50/30 dark:bg-navy-900/30 border-t border-gray-50 dark:border-navy-700 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-sm text-gray-500">Menampilkan 1 sampai 6 dari 125 berita</p>
            <div class="flex items-center space-x-2">
                <button class="p-2 rounded-xl border border-gray-200 dark:border-navy-600 hover:bg-white dark:hover:bg-navy-700 disabled:opacity-50 transition-all" disabled>
                    <i data-lucide="chevron-left" class="w-4 h-4"></i>
                </button>
                <button class="w-10 h-10 rounded-xl bg-accent text-white font-bold shadow-lg shadow-accent/20 transition-all">1</button>
                <button class="w-10 h-10 rounded-xl hover:bg-white dark:hover:bg-navy-700 border border-transparent hover:border-gray-200 dark:hover:border-navy-600 font-bold transition-all">2</button>
                <button class="w-10 h-10 rounded-xl hover:bg-white dark:hover:bg-navy-700 border border-transparent hover:border-gray-200 dark:hover:border-navy-600 font-bold transition-all">3</button>
                <span class="px-2 text-gray-400">...</span>
                <button class="w-10 h-10 rounded-xl hover:bg-white dark:hover:bg-navy-700 border border-transparent hover:border-gray-200 dark:hover:border-navy-600 font-bold transition-all">21</button>
                <button class="p-2 rounded-xl border border-gray-200 dark:border-navy-600 hover:bg-white dark:hover:bg-navy-700 transition-all">
                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
