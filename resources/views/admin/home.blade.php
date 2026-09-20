<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - FastF</title>
    @vite('resources/css/app.css')
    @include('partials.theme')
</head>
<body class="bg-orange-50 dark:bg-gray-900 min-h-screen flex items-center justify-center p-6">
    <div class="max-w-md w-full text-center">
        <div class="flex justify-end mb-4">
            @include('partials.theme-toggle')
        </div>

        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-2">FastF Admin</h1>
        <p class="text-gray-500 dark:text-gray-400 mb-10">Pilih menu yang ingin dikelola</p>

        <div class="flex flex-col gap-4">
            <a href="{{ route('products.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-4 rounded-xl shadow transition">
                Tambah Menu
            </a>

            <a href="{{ route('admin.dashboard') }}" class="bg-white dark:bg-gray-800 border-2 border-orange-500 text-orange-600 dark:text-orange-400 hover:bg-orange-100 dark:hover:bg-gray-700 font-semibold py-4 rounded-xl shadow transition">
                Validasi Struk
            </a>
        </div>
    </div>
</body>
</html>