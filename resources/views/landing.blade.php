<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FastF - Pesan Makanan</title>
    @vite('resources/css/app.css')
    @include('partials.theme')
</head>
<body class="bg-orange-50 dark:bg-gray-900 min-h-screen pb-24 text-gray-800 dark:text-gray-100">

    <header id="navbar" class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-md shadow px-4 py-3 fixed top-0 left-0 w-full z-50 transition-transform duration-300 ease-in-out">
        <div class="flex items-center gap-4 max-w-5xl mx-auto">
            <!-- Logo -->
            <h1 class="text-xl font-bold text-orange-600 dark:text-orange-400 whitespace-nowrap">FastF</h1>
            
            <!-- Search Input -->
            <div class="flex-1 relative">
                <input type="text" id="searchInput" oninput="searchProducts()" placeholder="Cari menu..."
                    class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-full pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400 text-sm md:text-base">
                <svg class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.35 4.35a7.5 7.5 0 0012.3 12.3z"/>
                </svg>
            </div>

            <!-- Toggle Theme Button -->
            <button onclick="toggleTheme()" class="w-10 h-10 shrink-0 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center text-lg hover:scale-105 transition">
                <span id="themeIcon">🌙</span>
            </button>

            <!-- Cart Button -->
            <button onclick="toggleCart()" class="relative shrink-0 w-10 h-10 rounded-full bg-orange-500 text-white flex items-center justify-center hover:bg-orange-600 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                <span id="cartCount" class="absolute -top-1 -right-1 bg-red-500 text-xs rounded-full w-5 h-5 flex items-center justify-center font-bold">0</span>
            </button>
        </div>
    </header>

<!-- Spacer agar konten di bawahnya tidak tertutup header karena position fixed -->
<div class="h-16"></div>

<section class="relative bg-gradient-to-r from-red-600 to-orange-500 min-h-[85vh] flex items-center px-6 lg:px-16 overflow-hidden rounded-b-3xl">
    <div class="max-w-7xl mx-auto w-full grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-12">
        
        <div class="text-white space-y-6 z-10">
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight tracking-tight">
                Pesan Makanan Favoritmu Dalam Hitungan Menit.
            </h1>
            <p class="text-lg md:text-xl text-orange-100 max-w-lg">
                Nikmati kelezatan burger dan menu pilihan terbaik dengan pelayanan cepat langsung ke tempatmu.
            </p>
            <div class="pt-2">
                <a href="#productGrid" class="inline-block bg-yellow-400 hover:bg-yellow-300 text-gray-900 font-bold px-8 py-4 rounded-full shadow-lg hover:shadow-xl transition transform hover:-translate-y-1">
                    Pesan Sekarang
                </a>
            </div>
        </div>

        <!-- Gambar Utama Hero -->
        <div class="relative flex justify-center items-center">
            <img src="{{ asset('images/premium_photo-1683655058728-415f4f2674bf-removebg-preview.png') }}" 
                 alt="Delicious Burger" 
                 class="w-full max-w-md lg:max-w-lg object-contain drop-shadow-2xl hover:scale-105 transition duration-500 ease-in-out">
        </div>

    </div>
</section>

    <main class="max-w-5xl mx-auto">
        <section class="p-4 grid grid-cols-2 md:grid-cols-3 gap-4" id="productGrid">
            @foreach($products as $p)
            <div class="product-card bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow cursor-pointer hover:shadow-md transition"
                data-cat="{{ $p->category_id }}"
                data-product="{{ $p }}"
                onclick="openProduct(JSON.parse(this.dataset.product))">
                <div class="aspect-square bg-orange-100 dark:bg-gray-700 overflow-hidden">
                    @if(!empty($p->image))
                        <img src="{{ asset('storage/' . $p->image) }}" 
                            class="w-full h-full object-cover" 
                            alt="{{ $p->name }}"
                            onerror="this.onerror=null; this.src='{{ asset('images/12173861489050965.jpg') }}';">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-4xl">🍔</div>
                    @endif
                </div>
                <div class="p-3">
                    <p class="font-semibold text-gray-800 dark:text-gray-100 truncate">{{ $p->name }}</p>
                    <p class="text-orange-600 font-bold mt-1">
                        @if($p->variants && $p->variants->count())
                            Mulai Rp{{ number_format($p->variants->min('price'), 0, ',', '.') }}
                        @else
                            Rp{{ number_format($p->price, 0, ',', '.') }}
                        @endif
                    </p>
                </div>
            </div>
            @endforeach
        </section>
    </main>

    <!-- Modal Product -->
    <div id="productModal" class="fixed inset-0 bg-black/50 hidden items-end md:items-center justify-center z-40 p-0 md:p-4">
        <div class="bg-white dark:bg-gray-800 rounded-t-2xl md:rounded-3xl w-full md:max-w-md max-h-[90vh] overflow-y-auto p-6">
            <div class="flex justify-between items-start mb-4">
                <h2 id="modalName" class="text-xl font-bold text-gray-800 dark:text-gray-100"></h2>
                <button onclick="closeProduct()" class="text-gray-400 dark:text-gray-500 text-2xl leading-none">&times;</button>
            </div>
            <p id="modalDesc" class="text-gray-500 dark:text-gray-400 text-sm mb-4"></p>

            <div id="modalVariants" class="mb-4"></div>
            <div id="modalAddons" class="mb-4"></div>

            <div class="flex items-center justify-between mb-6">
                <span class="font-medium text-gray-700 dark:text-gray-300">Jumlah</span>
                <div class="flex items-center gap-3">
                    <button onclick="changeQty(-1)" class="w-8 h-8 rounded-full bg-gray-200 dark:bg-gray-600 dark:text-gray-100 font-bold">-</button>
                    <span id="modalQty" class="text-gray-800 dark:text-gray-100 font-semibold">1</span>
                    <button onclick="changeQty(1)" class="w-8 h-8 rounded-full bg-gray-200 dark:bg-gray-600 dark:text-gray-100 font-bold">+</button>
                </div>
            </div>

            <button onclick="addToCart()" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-xl transition">
                Tambah ke Keranjang - <span id="modalTotal">Rp0</span>
            </button>
        </div>
    </div>

    <!-- Slide-over Cart Panel -->
    <div id="cartPanel" class="fixed inset-0 bg-black/50 hidden justify-end z-50">
        <div class="bg-white dark:bg-gray-800 w-full md:w-96 h-full p-6 overflow-y-auto flex flex-col justify-between">
            <div>
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">Keranjang</h2>
                    <button onclick="toggleCart()" class="text-2xl text-gray-800 dark:text-gray-100">&times;</button>
                </div>
                <div id="cartItems" class="flex flex-col gap-3 mb-6"></div>
            </div>
            <div>
                <p class="text-right font-bold text-lg mb-4 text-gray-800 dark:text-gray-100">Total: <span id="cartTotal">Rp0</span></p>
                <button onclick="openCheckout()" id="checkoutBtn" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-xl disabled:bg-gray-300 disabled:cursor-not-allowed transition" disabled>
                    Bayar
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Checkout -->
    <div id="checkoutModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4">
        <div class="bg-white dark:bg-gray-800 rounded-3xl w-full max-w-md p-6 max-h-[90vh] overflow-y-auto">
            <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-100">Metode Pembayaran</h2>
            <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data" id="checkoutForm">
                @csrf
                <input type="hidden" name="items" id="itemsInput">

                <label class="flex items-center gap-2 mb-3 border dark:border-gray-600 rounded-xl p-3 cursor-pointer text-gray-800 dark:text-gray-100">
                    <input type="radio" name="payment_method" value="cod" checked onchange="togglePaymentFields()" class="accent-orange-500">
                    <span>Bayar di Tempat (COD)</span>
                </label>
                <label class="flex items-center gap-2 mb-3 border dark:border-gray-600 rounded-xl p-3 cursor-pointer text-gray-800 dark:text-gray-100">
                    <input type="radio" name="payment_method" value="qris" onchange="togglePaymentFields()" class="accent-orange-500">
                    <span>QRIS</span>
                </label>

                <div id="qrisSection" class="hidden mb-4">
                    <img src="/images/qris.jpg" class="w-48 mx-auto mb-3 rounded border dark:border-gray-600" alt="Kode QRIS">
                    <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-300">Upload Bukti Bayar</label>
                    <input type="file" name="payment_proof" accept="image/*" class="w-full border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-xl p-2">
                </div>

                <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-xl mt-2 transition">
                    Konfirmasi Pesanan
                </button>
                <button type="button" onclick="closeCheckout()" class="w-full text-gray-500 dark:text-gray-400 py-2 mt-2">Batal</button>
            </form>
        </div>
    </div>

    <footer class="bg-white dark:bg-gray-800 mt-10 pt-10 pb-6 px-6">
        <div class="max-w-5xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="col-span-2 md:col-span-1">
                <h2 class="text-xl font-bold text-orange-600 dark:text-orange-400 mb-2">FastF</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Makanan favoritmu, diantar cepat ke depan pintu. Nikmati pengalaman pesan yang mudah.
                </p>
            </div>

            <div>
                <h3 class="font-semibold text-gray-800 dark:text-gray-100 mb-3">Perusahaan</h3>
                <ul class="text-sm text-gray-500 dark:text-gray-400 flex flex-col gap-2">
                    <li>Tentang Kami</li>
                    <li>Karir</li>
                    <li>Blog</li>
                    <li>Kontak</li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold text-gray-800 dark:text-gray-100 mb-3">Bantuan</h3>
                <ul class="text-sm text-gray-500 dark:text-gray-400 flex flex-col gap-2">
                    <li>Pusat Bantuan</li>
                    <li>Lacak Pesanan</li>
                    <li>Pengembalian</li>
                    <li>FAQ</li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold text-gray-800 dark:text-gray-100 mb-3">Newsletter</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">Dapatkan update promo terbaru.</p>
                <div class="flex gap-2">
                    <input type="email" placeholder="Email kamu" class="flex-1 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-orange-500">
                    <button class="bg-orange-500 text-white px-4 py-2 rounded-xl text-sm font-medium hover:bg-orange-600">Subscribe</button>
                </div>
            </div>
        </div>

        <div class="max-w-5xl mx-auto border-t dark:border-gray-700 mt-8 pt-4 text-center text-xs text-gray-400 dark:text-gray-500">
            © 2026 FastF. All rights reserved.
        </div>
    </footer>

    <script>
    let cart = [];
    let currentProduct = null;
    let selectedVariant = null;
    let selectedAddons = [];
    let qty = 1;
    let lastScrollTop = 0;
    const navbar = document.getElementById('navbar');

    window.addEventListener('scroll', function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Cek jika scroll lebih dari 60px
        if (scrollTop > 60) {
            if (scrollTop > lastScrollTop) {
                // Scroll ke Bawah -> Sembunyikan Header ke atas
                navbar.classList.add('-translate-y-full');
            } else {
                // Scroll ke Atas -> Munculkan Header kembali
                navbar.classList.remove('-translate-y-full');
            }
        } else {
            // Berada di posisi paling atas halaman
            navbar.classList.remove('-translate-y-full');
        }
        
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    });

    function searchProducts() {
        const query = document.getElementById('searchInput').value.toLowerCase();
        document.querySelectorAll('.product-card').forEach(card => {
            const name = card.querySelector('p.font-semibold').innerText.toLowerCase();
            card.style.display = name.includes(query) ? '' : 'none';
        });
    }

    function toggleTheme() {
        const isDark = document.documentElement.classList.toggle('dark');
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
        document.getElementById('themeIcon').innerText = isDark ? '☀️' : '🌙';
    }
    
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('themeIcon').innerText = document.documentElement.classList.contains('dark') ? '☀️' : '🌙';
    });

    function openProduct(product) {
        currentProduct = product;
        selectedVariant = (product.variants && product.variants.length) ? product.variants[0] : null;
        selectedAddons = [];
        qty = 1;

        document.getElementById('modalName').innerText = product.name;
        document.getElementById('modalDesc').innerText = product.description || '';

        const variantBox = document.getElementById('modalVariants');
        variantBox.innerHTML = '';
        if (product.variants && product.variants.length) {
            variantBox.innerHTML = '<p class="font-medium text-gray-700 dark:text-gray-300 mb-2">Ukuran</p>';
            product.variants.forEach((v, i) => {
                variantBox.innerHTML += `
                    <label class="flex justify-between items-center border dark:border-gray-600 rounded-xl p-3 mb-2 cursor-pointer text-gray-800 dark:text-gray-100">
                        <span>
                            <input type="radio" name="variant" ${i === 0 ? 'checked' : ''} onchange='selectVariant(${JSON.stringify(v)})' class="mr-2 accent-orange-500">
                            ${v.label}
                        </span>
                        <span class="font-medium">Rp${Number(v.price).toLocaleString('id-ID')}</span>
                    </label>`;
            });
        }

        const addonBox = document.getElementById('modalAddons');
        addonBox.innerHTML = '';
        if (product.addons && product.addons.length) {
            addonBox.innerHTML = '<p class="font-medium text-gray-700 dark:text-gray-300 mb-2">Tambahan</p>';
            product.addons.forEach(a => {
                addonBox.innerHTML += `
                    <label class="flex justify-between items-center border dark:border-gray-600 rounded-xl p-3 mb-2 cursor-pointer text-gray-800 dark:text-gray-100">
                        <span>
                            <input type="checkbox" onchange='toggleAddon(${JSON.stringify(a)}, this.checked)' class="mr-2 accent-orange-500">
                            ${a.label}
                        </span>
                        <span class="font-medium">+Rp${Number(a.price).toLocaleString('id-ID')}</span>
                    </label>`;
            });
        }

        document.getElementById('modalQty').innerText = qty;
        updateModalTotal();
        document.getElementById('productModal').classList.remove('hidden');
        document.getElementById('productModal').classList.add('flex');
    }

    function selectVariant(v) {
        selectedVariant = v;
        updateModalTotal();
    }

    function toggleAddon(a, checked) {
        if (checked) {
            selectedAddons.push(a);
        } else {
            selectedAddons = selectedAddons.filter(x => x.id !== a.id);
        }
        updateModalTotal();
    }

    function changeQty(delta) {
        qty = Math.max(1, qty + delta);
        document.getElementById('modalQty').innerText = qty;
        updateModalTotal();
    }

    function updateModalTotal() {
        let base = selectedVariant ? Number(selectedVariant.price) : Number(currentProduct.price);
        let addonTotal = selectedAddons.reduce((sum, a) => sum + Number(a.price), 0);
        let total = (base + addonTotal) * qty;
        document.getElementById('modalTotal').innerText = 'Rp' + total.toLocaleString('id-ID');
    }

    function closeProduct() {
        document.getElementById('productModal').classList.add('hidden');
        document.getElementById('productModal').classList.remove('flex');
    }

    function addToCart() {
        let base = selectedVariant ? Number(selectedVariant.price) : Number(currentProduct.price);
        let addonTotal = selectedAddons.reduce((sum, a) => sum + Number(a.price), 0);
        let unitPrice = base + addonTotal;

        cart.push({
            product_id: currentProduct.id,
            variant_id: selectedVariant ? selectedVariant.id : null,
            name: currentProduct.name,
            variant_label: selectedVariant ? selectedVariant.label : null,
            addons: selectedAddons.map(a => a.label).join(', '),
            qty: qty,
            price: unitPrice,
        });

        renderCart();
        closeProduct();
    }

    function renderCart() {
        document.getElementById('cartCount').innerText = cart.reduce((s, i) => s + i.qty, 0);

        const list = document.getElementById('cartItems');
        list.innerHTML = '';
        let total = 0;

        cart.forEach((item, i) => {
            let lineTotal = item.price * item.qty;
            total += lineTotal;
            list.innerHTML += `
                <div class="border dark:border-gray-600 rounded-xl p-3 text-gray-800 dark:text-gray-100">
                    <div class="flex justify-between">
                        <span class="font-medium">${item.name} ${item.variant_label ? '(' + item.variant_label + ')' : ''}</span>
                        <button onclick="removeItem(${i})" class="text-red-500 text-sm hover:underline">Hapus</button>
                    </div>
                    ${item.addons ? `<p class="text-xs text-gray-500 dark:text-gray-400 mt-1">${item.addons}</p>` : ''}
                    <div class="flex justify-between mt-2 text-sm">
                        <span>x${item.qty}</span>
                        <span class="font-medium">Rp${lineTotal.toLocaleString('id-ID')}</span>
                    </div>
                </div>`;
        });

        document.getElementById('cartTotal').innerText = 'Rp' + total.toLocaleString('id-ID');
        document.getElementById('checkoutBtn').disabled = cart.length === 0;
    }

    function removeItem(i) {
        cart.splice(i, 1);
        renderCart();
    }

    function toggleCart() {
        const panel = document.getElementById('cartPanel');
        panel.classList.toggle('hidden');
        panel.classList.toggle('flex');
    }

    function openCheckout() {
        document.getElementById('itemsInput').value = JSON.stringify(cart);
        document.getElementById('checkoutModal').classList.remove('hidden');
        document.getElementById('checkoutModal').classList.add('flex');
    }

    function closeCheckout() {
        document.getElementById('checkoutModal').classList.add('hidden');
        document.getElementById('checkoutModal').classList.remove('flex');
    }

    function togglePaymentFields() {
        const method = document.querySelector('input[name="payment_method"]:checked').value;
        const qrisSection = document.getElementById('qrisSection');
        const fileInput = qrisSection.querySelector('input[type="file"]');
        qrisSection.classList.toggle('hidden', method !== 'qris');
        fileInput.required = method === 'qris';
    }
    </script>
</body>
</html>