<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Product;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // ==================== Admin User ====================
    public function insert_form() {
        return view('admin.user_insert_form');
    }

    public function action_insert(Request $request) {
        $name = $request->input('username'); 
        $password = $request->input('password'); 
        $fullname = $request->input('fullname'); 
        $address = $request->input('address');
        $role = $request->input('role') == 1 ? 1 : 0;  

        Users::insert([
            'user_username' => $name,
            'user_password' => $password,
            'user_fullname' => $fullname,
            'user_address' => $address,
            'user_role' => $role
        ]);

        return redirect()->to('admin/danh-sach-nguoi-dung');
    }

    public function action_update(Request $request) {
        $id = $request->input('id'); 
        $role = $request->input('role') == 1 ? 1 : 0;

        Users::where('user_id', $id)->update([
            'user_username' => $request->input('username'),
            'user_fullname' => $request->input('fullname'),
            'user_address' => $request->input('address'),
            'user_role' => $role
        ]);

        return redirect()->to('admin/danh-sach-nguoi-dung');
    }

    public function get_all() {
        $users = Users::all();
        return view('admin.user_list', compact('users'));
    }

    public function del($id) {
        Users::where('user_id', $id)->delete();
        return redirect()->to('admin/danh-sach-nguoi-dung');
    }

    public function show($id) {
        $users = Users::where('user_id', $id)->get();
        return view('admin.user_info_form', compact('users'));
    }

    public function login() {
        return view('admin.login');
    }

    public function action_login(Request $request) {
        $user = Users::where('user_username', $request->username)
                     ->where('user_password', $request->password)
                     ->where('user_role', 1)
                     ->first();

        if($user){
            Session::put('user', [
                'id' => $user->user_id,
                'username'=> $user->user_username
            ]);
            return redirect()->to('admin/danh-sach-nguoi-dung');
        }

        return redirect()->back()->with('error', 'Tên đăng nhập hoặc mật khẩu sai');
    }

    public function logout() {
        session()->forget('user');
        return redirect()->to('admin/login');
    }

    public function landing() {
        return view('admin.landing');
    }

    // ==================== User Frontend ====================
    public function userLoginForm() {
        return view('users.login');
    }

    public function userLogin(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = Users::where('user_username', $request->username)
                     ->where('user_role', 0)
                     ->first();

        if ($user && Hash::check($request->password, $user->user_password)) {
            session(['user' => [
                'id' => $user->user_id,
                'username' => $user->user_username
            ]]);
            return redirect()->route('users.index');
        }

        return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không đúng.');
    }

    public function userLogout() {
        session()->forget('user');
        return redirect()->route('user.login');
    }

    public function showRegisterForm() {
        return view('users.register');
    }

    public function register(Request $request) {
        $request->validate([
            'username' => 'required|unique:user,user_username',
            'password' => 'required|min:6|confirmed',
            'fullname' => 'required',
            'address' => 'nullable'
        ]);

        Users::create([
            'user_username' => $request->username,
            'user_password' => Hash::make($request->password),
            'user_fullname' => $request->fullname,
            'user_address' => $request->address,
            'user_role' => 0
        ]);

        return redirect()->route('user.login')->with('success', 'Đăng ký thành công. Hãy đăng nhập!');
    }

    // ==================== Products ====================
    public function index() {
        $featuredProducts = Product::where('isFeatured', 1)->get();
         $allProducts = Product::all(); // tất cả sản phẩm
        return view('users.index', compact('featuredProducts','allProducts'));
    }

    public function products() {
        $products = Product::all();
        return view('users.products', compact('products'));
    }

    // ==================== Cart ====================
    public function cart() {
        $cart = session('cart', []);
        return view('users.cart', compact('cart'));
    }

    public function addCart(Request $request, $id) {
        $product = Product::findOrFail($id);
        $cart = $request->session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->quantity ?? 1;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->product_name,
                'price' => $product->product_price,
                'image' => $product->product_img,
                'quantity' => $request->quantity ?? 1,
            ];
        }

        $request->session()->put('cart', $cart);
        Session::flash('success', 'Đã thêm sản phẩm vào giỏ hàng!');
        return redirect()->back();
    }

    public function updateCart(Request $request, $id) {
        $cart = session('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = max(1, (int)$request->quantity);
            session(['cart' => $cart]);
            return redirect()->route('users.cart')->with('success', 'Cập nhật giỏ hàng thành công.');
        }
        return redirect()->route('users.cart')->with('error', 'Sản phẩm không tồn tại trong giỏ hàng.');
    }

    public function removeCart(Request $request, $id) {
        $cart = session('cart', []);
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session(['cart' => $cart]);
            return redirect()->route('users.cart')->with('success', 'Xóa sản phẩm khỏi giỏ hàng thành công.');
        }
        return redirect()->route('users.cart')->with('error', 'Sản phẩm không tồn tại trong giỏ hàng.');
    }

    public function checkout() {
        $cart = session('cart', []);
        return view('users.checkout', compact('cart'));
    }
}
