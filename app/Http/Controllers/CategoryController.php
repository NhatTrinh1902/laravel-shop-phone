<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function get_all() {
        $categories = DB::table('category')->get();
        return view('admin.category_list', compact('categories'));
    }

    public function create() {
        return view('admin.category_insert_form');
    }

    public function store(Request $request) {
        DB::table('category')->insert([
            'category_name' => $request->category_name
        ]);
        return redirect('admin/danh-sach-danh-muc');
    }

    public function edit($id) {
        $category = DB::table('category')->where('category_id', $id)->first();
        return view('admin.category_info_form', compact('category'));
    }

    public function update(Request $request, $id) {
        DB::table('category')->where('category_id', $id)->update([
            'category_name' => $request->category_name
        ]);
        return redirect('admin/danh-sach-danh-muc');
    }

    public function destroy($id) {
        DB::table('category')->where('category_id', $id)->delete();
        return redirect('admin/danh-sach-danh-muc');
    }
}
