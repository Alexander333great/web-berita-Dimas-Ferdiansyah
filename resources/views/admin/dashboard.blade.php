@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6 animate-in fade-in duration-700">
    <!-- Header Section -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Halo, {{ Auth::user()->name }} 👋</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Selamat datang kembali di panel manajemen berita.</p>
        </div>
        <div class="flex space-x-3">
            <button class="flex items-center space-x-2 bg-white dark:bg-navy-800 border border-gray-100 dark:border-navy-700 px-4 py-2 rounded-xl text-sm font-medium text-gray-600 dark:text-gray-300 shadow-sm hover:shadow-md transition-all">
                <i data-lucide="download" class="w-4 h-4"></i>
                <span>Laporan</span>
            </button>
            <button class="flex items-center space-x-2 bg-accent px-4 py-2 rounded-xl text-sm font-medium text-white shadow-lg shadow-accent/30 hover:shadow-accent/40 transition-all">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span>Berita Baru</span>
            </button>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Berita -->
        <div class="bg-white dark:bg-navy-800 p-6 rounded-2xl border border-gray-50 dark:border-navy-700 shadow-sm group hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-50 dark:bg-blue-500/10 rounded-xl flex items-center justify-center transition-transform group-hover:scale-110">
                    <i data-lucide="file-text" class="w-6 h-6 text-blue-500"></i>
                </div>
                <span class="text-xs font-bold text-green-500 bg-green-500/10 px-2 py-1 rounded-full">+12%</span>
            </div>
            <p class="text-sm font-medium text-gray-400">Total Berita</p>
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white">125</h3>
        </div>

        <!-- Total Kategori -->
        <div class="bg-white dark:bg-navy-800 p-6 rounded-2xl border border-gray-50 dark:border-navy-700 shadow-sm group hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-purple-50 dark:bg-purple-500/10 rounded-xl flex items-center justify-center transition-transform group-hover:scale-110">
                    <i data-lucide="tag" class="w-6 h-6 text-purple-500"></i>
                </div>
                <span class="text-xs font-bold text-gray-400 bg-gray-100 dark:bg-navy-700 px-2 py-1 rounded-full">Tetap</span>
            </div>
            <p class="text-sm font-medium text-gray-400">Total Kategori</p>
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white">7</h3>
        </div>

        <!-- Total Pengguna -->
        <div class="bg-white dark:bg-navy-800 p-6 rounded-2xl border border-gray-50 dark:border-navy-700 shadow-sm group hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-orange-50 dark:bg-orange-500/10 rounded-xl flex items-center justify-center transition-transform group-hover:scale-110">
                    <i data-lucide="users" class="w-6 h-6 text-orange-500"></i>
                </div>
                <span class="text-xs font-bold text-green-500 bg-green-500/10 px-2 py-1 rounded-full">+2</span>
            </div>
            <p class="text-sm font-medium text-gray-400">Total Pengguna</p>
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white">8</h3>
        </div>

        <!-- Total Viewer -->
        <div class="bg-white dark:bg-navy-800 p-6 rounded-2xl border border-gray-50 dark:border-navy-700 shadow-sm group hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-green-50 dark:bg-green-500/10 rounded-xl flex items-center justify-center transition-transform group-hover:scale-110">
                    <i data-lucide="eye" class="w-6 h-6 text-green-500"></i>
                </div>
                <span class="text-xs font-bold text-green-500 bg-green-500/10 px-2 py-1 rounded-full">+2.5k</span>
            </div>
            <p class="text-sm font-medium text-gray-400">Total Viewer</p>
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white">24,500</h3>
        </div>
    </div>

    <!-- Charts and Popular Categories -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Chart -->
        <div class="lg:col-span-2 bg-white dark:bg-navy-800 p-6 rounded-2xl border border-gray-50 dark:border-navy-700 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <h3 class="font-bold text-gray-800 dark:text-white">Statistik Pengunjung</h3>
                <select class="bg-gray-50 dark:bg-navy-900 border-none text-xs rounded-lg px-2 py-1 outline-none">
                    <option>7 Hari Terakhir</option>
                    <option>30 Hari Terakhir</option>
                </select>
            </div>
            <canvas id="visitorChart" height="280"></canvas>
        </div>

        <!-- Popular Categories -->
        <div class="bg-white dark:bg-navy-800 p-6 rounded-2xl border border-gray-50 dark:border-navy-700 shadow-sm">
            <h3 class="font-bold text-gray-800 dark:text-white mb-6">Kategori Populer</h3>
            <div class="space-y-4">
                @php
                    $popularCats = [
                        ['name' => 'Teknologi', 'count' => 45, 'color' => 'bg-blue-500'],
                        ['name' => 'Olahraga', 'count' => 32, 'color' => 'bg-green-500'],
                        ['name' => 'Politik', 'count' => 28, 'color' => 'bg-red-500'],
                        ['name' => 'Hiburan', 'count' => 20, 'color' => 'bg-yellow-500'],
                        ['name' => 'Bisnis', 'count' => 15, 'color' => 'bg-purple-500'],
                    ];
                @endphp
                @foreach($popularCats as $cat)
                <div class="space-y-1">
                    <div class="flex justify-between text-sm font-medium">
                        <span class="dark:text-gray-300">{{ $cat['name'] }}</span>
                        <span class="text-gray-400">{{ $cat['count'] }}%</span>
                    </div>
                    <div class="w-full h-2 bg-gray-100 dark:bg-navy-900 rounded-full overflow-hidden">
                        <div class="{{ $cat['color'] }} h-full" style="width: {{ $cat['count'] }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="w-full mt-6 py-2 text-sm font-semibold text-accent border border-accent/20 rounded-xl hover:bg-accent hover:text-white transition-all">
                Lihat Semua Kategori
            </button>
        </div>
    </div>

    <!-- Recent News Table -->
    <div class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-50 dark:border-navy-700 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-gray-50 dark:border-navy-700 flex items-center justify-between">
            <h3 class="font-bold text-gray-800 dark:text-white">Berita Terbaru</h3>
            <a href="#" class="text-sm font-semibold text-accent">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 dark:bg-navy-900/50">
                    <tr>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Berita</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Penulis</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 dark:divide-navy-700">
                    @php
                        $news = [
                            ['title' => 'Perkembangan AI di Tahun 2026', 'cat' => 'Teknologi', 'author' => 'Dimas Ferdi', 'status' => 'Published', 'date' => '24 Mei 2026'],
                            ['title' => 'Tim Nasional Menang Dramatis', 'cat' => 'Olahraga', 'author' => 'Andi Wijaya', 'status' => 'Published', 'date' => '23 Mei 2026'],
                            ['title' => 'Teknologi Cloud Semakin Populer', 'cat' => 'Teknologi', 'author' => 'Siti Aminah', 'status' => 'Draft', 'date' => '22 Mei 2026'],
                            ['title' => 'Tips Belajar Coding untuk Pemula', 'cat' => 'Pendidikan', 'author' => 'Budi Santoso', 'status' => 'Published', 'date' => '21 Mei 2026'],
                            ['title' => 'Startup Indonesia Berkembang Pesat', 'cat' => 'Bisnis', 'author' => 'Rina Putri', 'status' => 'Published', 'date' => '20 Mei 2026'],
                        ];
                    @endphp
                    @foreach($news as $item)
                    <tr class="hover:bg-gray-50 dark:hover:bg-navy-700 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-navy-900 overflow-hidden flex-shrink-0">
                                    <img src="https://picsum.photos/seed/{{ $loop->index }}/100/100" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-800 dark:text-gray-200 line-clamp-1">{{ $item['title'] }}</p>
                                    <span class="text-[10px] text-gray-400">{{ $item['date'] }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-xs font-medium px-2 py-1 rounded-lg bg-accent/10 text-accent">{{ $item['cat'] }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $item['author'] }}</td>
                        <td class="px-6 py-4">
                            @if($item['status'] == 'Published')
                                <span class="flex items-center text-green-500 text-xs font-bold">
                                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-2"></span>
                                    Published
                                </span>
                            @else
                                <span class="flex items-center text-orange-500 text-xs font-bold">
                                    <span class="w-1.5 h-1.5 bg-orange-500 rounded-full mr-2"></span>
                                    Draft
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <button class="p-1.5 rounded-lg border border-gray-100 dark:border-navy-600 hover:bg-gray-100 dark:hover:bg-navy-600 transition-all">
                                    <i data-lucide="edit-3" class="w-4 h-4 text-blue-500"></i>
                                </button>
                                <button class="p-1.5 rounded-lg border border-gray-100 dark:border-navy-600 hover:bg-gray-100 dark:hover:bg-navy-600 transition-all">
                                    <i data-lucide="trash-2" class="w-4 h-4 text-red-500"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const ctx = document.getElementById('visitorChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            datasets: [{
                label: 'Pengunjung',
                data: [1200, 1900, 1500, 2500, 2200, 3000, 2800],
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointRadius: 4,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#3b82f6',
                pointBorderWidth: 2
            }, {
                label: 'Berita',
                data: [5, 8, 3, 10, 6, 12, 9],
                borderColor: '#8b5cf6',
                borderWidth: 2,
                borderDash: [5, 5],
                fill: false,
                tension: 0.4,
                pointRadius: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(156, 163, 175, 0.1)'
                    },
                    ticks: {
                        color: '#9ca3af',
                        font: { size: 10 }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#9ca3af',
                        font: { size: 10 }
                    }
                }
            }
        }
    });
</script>
@endpush
