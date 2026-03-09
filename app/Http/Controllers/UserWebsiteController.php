<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class UserWebsiteController extends Controller
{
    /**
     * Trang chủ người dùng
     */
    public function index()
    {
        // Lấy 8 sản phẩm mới nhất làm sản phẩm nổi bật
        $featuredProducts = Product::orderBy('product_id', 'desc')->take(8)->get(); 

        // Lấy tất cả sản phẩm để hiển thị dưới carousel
        $allProducts = Product::all();

        return view('users.index', compact('featuredProducts', 'allProducts'));
    }

    /**
     * Trang danh sách sản phẩm (Sử dụng phân trang)
     */
    public function products()
    {
        // Phân trang: 12 sản phẩm mỗi trang
        $products = Product::paginate(12);
        return view('users.products', compact('products'));
    }

    /**
     * Trang liên hệ
     */
    public function contact()
    {
        return view('users.contact');
    }

    /**
     * Xử lý submit form liên hệ
     */
    public function submitContact(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'phone'   => 'nullable',
            'message' => 'required'
        ]);

        // Có thể xử lý gửi email hoặc lưu DB tại đây
        // Trả về thông báo thành công
        return redirect()->back()->with('success', 'Cảm ơn bạn đã liên hệ. Chúng tôi sẽ phản hồi sớm!');
    }
}
