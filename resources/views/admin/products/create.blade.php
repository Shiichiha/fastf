<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu - FastF</title>
    @vite('resources/css/app.css')
    @include('partials.theme')
</head>
<body class="bg-orange-50 dark:bg-gray-900 min-h-screen p-6">
    <div class="max-w-md mx-auto">
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('admin.home') }}" class="text-orange-600 font-medium">&larr; Kembali</a>
            @include('partials.theme-toggle')
        </div>

        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Tambah Menu</h1>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow flex flex-col gap-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Menu</label>
                <input type="text" name="name" placeholder="Contoh: Burger Keju" required
                    class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Deskripsi</label>
                <textarea name="description" placeholder="Deskripsi (opsional)" rows="3"
                    class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:outline-none"></textarea>
            </div>

            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" id="hasVariants" name="has_variants" value="1" class="w-5 h-5 accent-orange-500 rounded">
                <span class="text-gray-700 dark:text-gray-300 font-medium">Menu ini punya pilihan ukuran/varian</span>
            </label>

            <div id="singlePriceSection">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Harga</label>
                <input type="number" name="price" id="basePrice" placeholder="Contoh: 25000" required
                    class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-lg px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:outline-none">
            </div>

            <div id="variantSection" class="hidden flex-col gap-3">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Daftar Ukuran & Harga</label>
                <div id="variantList" class="flex flex-col gap-2"></div>
                <button type="button" id="addVariant" class="text-orange-600 font-medium text-sm text-left hover:underline">+ Tambah Ukuran</button>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Foto Menu</label>
                <input type="file" name="image" accept="image/*"
                    class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-lg px-4 py-2 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-orange-500 file:text-white hover:file:bg-orange-600">
            </div>

            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-lg transition shadow mt-2">
                Simpan Menu
            </button>
        </form>

        <a href="{{ route('products.index') }}" class="block text-center mt-4 text-gray-500 dark:text-gray-400 underline">
            Lihat Semua Menu
        </a>
    </div>

    <script>
        let variantIndex = 0;
        const hasVariants = document.getElementById('hasVariants');
        const singlePriceSection = document.getElementById('singlePriceSection');
        const variantSection = document.getElementById('variantSection');
        const variantList = document.getElementById('variantList');
        const basePrice = document.getElementById('basePrice');

        function addRow() {
            const i = variantIndex++;
            const row = document.createElement('div');
            row.className = 'flex gap-2 items-center';
            row.innerHTML = `
                <input type="text" name="variants[${i}][label]" placeholder="Label (ex: Small)" required
                    class="border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-lg px-3 py-2 flex-1">
                <input type="number" name="variants[${i}][price]" placeholder="Harga" required
                    class="border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-lg px-3 py-2 w-32">
                <button type="button" onclick="this.parentElement.remove()" class="text-red-500 font-bold px-2">&times;</button>
            `;
            variantList.appendChild(row);
        }

        hasVariants.addEventListener('change', () => {
            if (hasVariants.checked) {
                singlePriceSection.classList.add('hidden');
                basePrice.required = false;
                variantSection.classList.remove('hidden');
                variantSection.classList.add('flex');
                variantList.innerHTML = '';
                variantIndex = 0;
                addRow();
            } else {
                singlePriceSection.classList.remove('hidden');
                basePrice.required = true;
                variantSection.classList.add('hidden');
                variantSection.classList.remove('flex');
                variantList.innerHTML = '';
            }
        });

        document.getElementById('addVariant').addEventListener('click', addRow);
    </script>
</body>
</html>