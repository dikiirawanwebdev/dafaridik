<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $products = collect();
        $total = 0;

        if (!empty($cart)) {
            $ids = array_keys($cart);
            $products = Product::whereIn('id', $ids)->get()->map(function ($product) use ($cart) {
                $product->cart_qty = $cart[$product->id]['qty'];
                $product->subtotal = $product->price * $product->cart_qty;
                return $product;
            });
            $total = $products->sum('subtotal');
        }

        return view('cart.index', compact('products', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'integer|min:1|max:99',
        ]);

        $product = Product::findOrFail($request->product_id);
        $cart = session()->get('cart', []);
        $id = $product->id;

        if (isset($cart[$id])) {
            $cart[$id]['qty'] += $request->qty ?? 1;
        } else {
            $cart[$id] = [
                'qty' => $request->qty ?? 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:0|max:99',
        ]);

        $cart = session()->get('cart', []);
        $id = $request->product_id;

        if ($request->qty < 1) {
            unset($cart[$id]);
        } else {
            $cart[$id]['qty'] = $request->qty;
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil diperbarui!');
    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->product_id;

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang!');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong!');
        }

        $ids = array_keys($cart);
        $products = Product::whereIn('id', $ids)->get();
        $total = 0;
        $message = "Halo DAFARIDIK, saya ingin checkout dengan pesanan berikut:\n\n";

        foreach ($products as $product) {
            $qty = $cart[$product->id]['qty'];
            $subtotal = $product->price * $qty;
            $total += $subtotal;
            $message .= "- {$product->name} x{$qty} = Rp" . number_format($subtotal, 0, ',', '.') . "\n";
        }

        $message .= "\nTotal: Rp" . number_format($total, 0, ',', '.');
        $message .= "\n\nMohon info pembayaran dan pengiriman. Terima kasih!";

        $phone = '6283178132541';
        $url = 'https://wa.me/' . $phone . '?text=' . urlencode($message);

        return redirect()->away($url);
    }
}
