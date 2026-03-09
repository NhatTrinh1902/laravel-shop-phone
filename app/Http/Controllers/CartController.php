<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class CartController extends Controller
{
    // Thêm sản phẩm vào giỏ hàng
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Lấy giỏ hàng hiện tại từ session, nếu chưa có thì tạo mảng rỗng
        $cart = $request->session()->get('cart', []);

        // Nếu sản phẩm đã có trong giỏ thì tăng số lượng
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Thêm sản phẩm mới
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->product_name,
                'price' => $product->product_price,
                'image' => $product->product_img,
                'quantity' => 1
            ];
        }

        // Lưu giỏ hàng vào session
        $request->session()->put('cart', $cart);

        // Flash message thông báo
        Session::flash('success', 'Đã thêm sản phẩm vào giỏ hàng!');

        return redirect()->back();
    }

    // Hiển thị giỏ hàng
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function remove(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);
        if(isset($cart[$id])) {
            unset($cart[$id]);
            $request->session()->put('cart', $cart);
            Session::flash('success', 'Đã xóa sản phẩm khỏi giỏ hàng.');
        }
        return redirect()->back();
    }

    // Xóa toàn bộ giỏ hàng
    public function clear(Request $request)
    {
        $request->session()->forget('cart');
        Session::flash('success', 'Đã xóa toàn bộ giỏ hàng.');
        return redirect()->back();
    }
}
