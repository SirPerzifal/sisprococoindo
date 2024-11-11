<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
       <!-- Menambahkan CSS Inline -->
       <style>
        .main-content {
            flex-grow: 1;
            min-height: 100vh;
            padding: 1rem; /* Atur padding sesuai kebutuhan */
        }

        .custom-dashboard-text {
            color: #1D4ED8; /* Warna biru untuk teks */
        }
    </style>
    <!-- Mengurangi padding -->
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>Selamat Datang di Dashboard</h3>
                    <p>Ini adalah konten tambahan di halaman Dashboard.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
