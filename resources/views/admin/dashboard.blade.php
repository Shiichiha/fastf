<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Validasi Struk - FastF</title>
@vite('resources/css/app.css')
@include('partials.theme')
</head>
<body class="bg-orange-50 dark:bg-gray-900 min-h-screen p-6">
<div class="max-w-2xl mx-auto">
<div class="flex justify-between items-center mb-6">
<a href="{{ route('admin.home') }}" class="text-orange-600 font-medium">&larr; Kembali</a>
@include('partials.theme-toggle')
</div>

<div class="relative mb-6">
    <input type="text" id="searchStruk" oninput="filterOrders()" placeholder="Cari struk pembayaran..."
        class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-xl pl-10 pr-4 py-3 focus:ring-2 focus:ring-orange-500 focus:outline-none">
    <svg class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.35 4.35a7.5 7.5 0 0012.3 12.3z"/>
    </svg>
</div>

<h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-4">Pesanan Belum Divalidasi</h1>
<div class="flex flex-col gap-3 mb-10">
@forelse($pending as $order)
<div class="order-card bg-white dark:bg-gray-800 p-4 rounded-xl shadow flex justify-between items-center cursor-pointer"
     data-search="{{ strtolower($order->queue_code.' '.$order->receipt_code) }}"
     onclick='openOrderDetail(@json($order))'>
<div>
<p class="font-semibold text-gray-800 dark:text-gray-100">{{ $order->queue_code }} &middot; {{ $order->receipt_code }}</p>
<p class="text-sm text-gray-500 dark:text-gray-400">Rp{{ number_format($order->total, 0, ',', '.') }}</p>
</div>
<form action="{{ route('admin.validate', $order) }}" method="POST" onclick="event.stopPropagation()">
@csrf
<button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded-lg transition">
                            Validasi
</button>
</form>
</div>
@empty
<p class="text-gray-400 text-center py-4">Tidak ada pesanan pending</p>
@endforelse
</div>

<h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-4">Riwayat Pembayaran</h1>
<div class="flex flex-col gap-3">
@forelse($history as $order)
<div class="order-card bg-white dark:bg-gray-800 p-4 rounded-xl shadow flex justify-between items-center cursor-pointer"
     data-search="{{ strtolower($order->queue_code.' '.$order->receipt_code) }}"
     onclick='openOrderDetail(@json($order))'>
    <div>
        <p class="font-semibold text-gray-800 dark:text-gray-100">{{ $order->queue_code }} &middot; {{ $order->receipt_code }}</p>
        <p class="text-sm text-gray-500 dark:text-gray-400">Rp{{ number_format($order->total, 0, ',', '.') }}</p>
    </div>
    <span class="text-green-600 text-sm font-medium">Lunas</span>
</div>
@empty
<p class="text-gray-400 text-center py-4">Belum ada riwayat</p>
@endforelse
</div>

<div class="order-card bg-white dark:bg-gray-800 p-4 rounded-xl shadow flex justify-between items-center cursor-pointer {{ $order->expires_at < now() ? 'opacity-60' : '' }}"
     data-search="{{ strtolower($order->queue_code.' '.$order->receipt_code) }}"
     onclick='openOrderDetail(@json($order))'>
<div>
<p class="font-semibold text-gray-800 dark:text-gray-100">
    {{ $order->queue_code }} &middot; {{ $order->receipt_code }}
    @if($order->expires_at < now())
        <span class="text-red-500 text-xs ml-2">(Kadaluarsa)</span>
    @endif
</p>
<p class="text-sm text-gray-500 dark:text-gray-400">Rp{{ number_format($order->total, 0, ',', '.') }}</p>
</div>

<div id="orderModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white dark:bg-gray-800 rounded-2xl w-full max-w-sm p-6">
        <div class="flex justify-between items-start mb-4">
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Nomor Antrian</p>
                <p id="detailQueue" class="text-2xl font-bold text-orange-600"></p>
            </div>
            <button onclick="closeOrderDetail()" class="text-gray-400 dark:text-gray-500 text-2xl leading-none">&times;</button>
        </div>

        <p class="text-sm text-gray-500 dark:text-gray-400">Kode Struk</p>
        <p id="detailReceipt" class="font-bold text-gray-800 dark:text-gray-100 mb-4"></p>

        <div id="detailItems" class="flex flex-col gap-2 border-t dark:border-gray-700 pt-3 mb-3 text-sm text-gray-700 dark:text-gray-300"></div>

        <div class="flex justify-between font-bold border-t dark:border-gray-700 pt-3 text-gray-800 dark:text-gray-100">
            <span>Total</span>
            <span id="detailTotal"></span>
        </div>

        <p class="mt-3 text-sm text-gray-700 dark:text-gray-300">
            Metode: <span id="detailMethod" class="font-medium text-gray-800 dark:text-gray-100"></span>
        </p>
    </div>
</div>

<script>
function filterOrders() {
    const query = document.getElementById('searchStruk').value.toLowerCase();
    document.querySelectorAll('.order-card').forEach(card => {
        card.style.display = card.dataset.search.includes(query) ? '' : 'none';
    });
}

function openOrderDetail(order) {
    document.getElementById('detailQueue').innerText = order.queue_code;
    document.getElementById('detailReceipt').innerText = order.receipt_code;
    document.getElementById('detailTotal').innerText = 'Rp' + Number(order.total).toLocaleString('id-ID');
    document.getElementById('detailMethod').innerText = order.payment_method === 'qris' ? 'QRIS' : 'Bayar di Tempat';

    const itemsBox = document.getElementById('detailItems');
    itemsBox.innerHTML = '';
    order.items.forEach(item => {
        itemsBox.innerHTML += `
            <div class="flex justify-between">
                <span>${item.product_name}${item.variant_label ? ' (' + item.variant_label + ')' : ''} x${item.qty}</span>
                <span>Rp${Number(item.price * item.qty).toLocaleString('id-ID')}</span>
            </div>`;
    });

    document.getElementById('orderModal').classList.remove('hidden');
    document.getElementById('orderModal').classList.add('flex');
}

function closeOrderDetail() {
    document.getElementById('orderModal').classList.add('hidden');
    document.getElementById('orderModal').classList.remove('flex');
}
</script>
</body>
</html>