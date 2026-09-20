<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Services\QueueService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
        'payment_method' => 'required|in:cod,qris',
        'payment_proof' => 'required_if:payment_method,qris|image|max:5120',
            ]);

            $items = json_decode($request->items, true);


        $items = json_decode($request->items, true);

        $total = 0;
        foreach ($items as $item) {
            $total += $item['price'] * $item['qty'];
        }

        $proofPath = null;
        if ($request->hasFile('payment_proof')) {
            $proofPath = $request->file('payment_proof')->store('proofs', 'public');
        }

        $order = Order::create([
            'queue_code' => QueueService::generate(),
            'receipt_code' => QueueService::generateReceipt(),
            'payment_method' => $request->payment_method,
            'total' => $total,
            'expires_at' => now()->addMinutes(15),
            'payment_proof' => $proofPath,
        ]);

        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'variant_id' => $item['variant_id'] ?? null,
                'product_name' => $item['name'],
                'variant_label' => $item['variant_label'] ?? null,
                'qty' => $item['qty'],
                'price' => $item['price'],
            ]);
        }

        return redirect()->route('order.receipt', $order->receipt_code);
    }

    public function receipt($code)
    {
        $order = Order::where('receipt_code', $code)->with('items')->firstOrFail();
        return view('receipt', compact('order'));
    }
}