@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tất cả sản phẩm</h2>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    {{-- Đường dẫn hình ảnh được lấy từ cột product_img --}}
                    <img src="{{ asset($product->product_img) }}" 
     class="card-img-top" 
     alt="{{ $product->product_name }}">

     <div class="card-body">
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                        <p class="card-text">{{ Str::limit($product->product_description, 50) }}</p>
                        <p class="text-primary fw-bold">{{ number_format($product->product_price) }} VNĐ</p>
                        <a href="{{ route('product.detail', $product->product_id) }}" class="btn btn-sm btn-primary">
                            Xem chi tiết
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@include('admin/template/footer')
    {{-- Hiển thị liên kết phân trang --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection