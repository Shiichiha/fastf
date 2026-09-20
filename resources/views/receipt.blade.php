<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk - FastF</title>
    @vite('resources/css/app.css')
    @include('partials.theme')
</head>
<body class="bg-orange-50 dark:bg-gray-900 min-h-screen flex items-center justify-center p-6">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6 max-w-sm w-full text-center relative">
        <div class="absolute top-4 right-4">
            @include('partials.theme-toggle')
        </div>

        <p class="text-gray-500 dark:text-gray-400 mb-1 text-sm">Nomor Antrian</p>
        <p class="text-5xl font-bold text-orange-600 mb-6">{{ $order->queue_code }}</p>

        <p class="text-gray-500 dark:text-gray-400 mb-1 text-xs uppercase tracking-wider">Kode Struk</p>
        <p class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-6">{{ $order->receipt_code }}</p>

        <div class="border-t dark:border-gray-700 pt-4 flex flex-col gap-2">
            @foreach($order->items as $item)
                <div class="flex justify-between text-sm text-gray-700 dark:text-gray-300">
                    <span class="text-left">{{ $item->product_name }} {{ $item->variant_label ? '('.$item->variant_label.')' : '' }} x{{ $item->qty }}</span>
                    <span class="font-medium">Rp{{ number_format($item->price * $item->qty, 0, ',', '.') }}</span>
                </div>
            @endforeach
        </div>

        <div class="border-t dark:border-gray-700 mt-4 pt-4 flex justify-between font-bold text-gray-800 dark:text-gray-100 text-lg">
            <span>Total</span>
            <span>Rp{{ number_format($order->total, 0, ',', '.') }}</span>
        </div>

        <p class="mt-6 text-sm text-gray-500 dark:text-gray-400">
            Status: <span class="font-semibold {{ $order->payment_status == 'paid' ? 'text-green-600' : 'text-orange-600' }}">
                {{ $order->payment_status == 'paid' ? 'Lunas' : 'Menunggu Konfirmasi' }}
            </span>
        </p>

        @if($order->payment_status == 'paid')
            <a href="{{ route('landing') }}" class="block mt-6 bg-orange-500 hover:bg-orange-600 text-white font-medium py-2 rounded-lg transition">Pesan Lagi</a>
        @else
            <button disabled class="block w-full mt-6 bg-gray-200 dark:bg-gray-700 text-gray-400 font-medium py-2 rounded-lg cursor-not-allowed">
                Menunggu Konfirmasi Admin
            </button>
            <script>
                setTimeout(() => location.reload(), 8000);
            </script>
        @endif
    </div>
</body>
</html>