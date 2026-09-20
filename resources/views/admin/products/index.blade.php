<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu - FastF</title>
    @vite('resources/css/app.css')
    @include('partials.theme')
</head>
<body class="bg-orange-50 dark:bg-gray-900 min-h-screen p-6">
    <div class="max-w-2xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('admin.home') }}" class="text-orange-600 font-medium">&larr; Kembali</a>
            @include('partials.theme-toggle')
        </div>

        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Daftar Menu</h1>

        <div class="flex flex-col gap-3">
            @forelse($products as $p)
                <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="font-semibold text-gray-800 dark:text-gray-100">{{ $p->name }}</p>
                            @if($p->description)
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $p->description }}</p>
                            @endif
                        </div>
                        <form action="{{ route('products.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus menu ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 text-sm font-medium hover:underline">Hapus</button>
                        </form>
                    </div>

                    @if($p->variants->count())
                        <div class="mt-3 flex flex-col gap-1 border-t dark:border-gray-700 pt-2">
                            @foreach($p->variants as $v)
                                <div class="flex justify-between text-sm text-gray-600 dark:text-gray-300">
                                    <span>{{ $v->label }}</span>
                                    <span class="font-medium">Rp{{ number_format($v->price, 0, ',', '.') }}</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="mt-2 font-bold text-orange-600">Rp{{ number_format($p->price, 0, ',', '.') }}</p>
                    @endif
                </div>
            @empty
                <p class="text-gray-400 text-center py-8">Belum ada menu</p>
            @endforelse
        </div>

        <a href="{{ route('products.create') }}" class="block text-center mt-6 bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-lg transition shadow">
            + Tambah Menu Baru
        </a>
    </div>
</body>
</html>