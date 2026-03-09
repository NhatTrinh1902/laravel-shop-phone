@extends('layouts.user')

@section('content')
<div class="container py-4">

    <div class="row">
        <!-- Ảnh sản phẩm -->
        <div class="col-md-5">
            <div class="card shadow-sm">
                <img src="{{ asset($product->product_img) }}" 
                     alt="{{ $product->product_name }}" 
                     class="card-img-top">
            </div>
        </div>

        <!-- Thông tin sản phẩm -->
        <div class="col-md-7">
            <h2 class="fw-bold">{{ $product->product_name }}</h2>

            <p class="text-muted">
                Mã sản phẩm: <strong>{{ $product->product_id }}</strong>
            </p>

            <h3 class="text-primary fw-bold mb-3">
                {{ number_format($product->product_price) }} VNĐ
            </h3>

            <p class="mt-3">
                {!! nl2br(e($product->product_description)) !!}
            </p>

            <!-- Form thêm vào giỏ hàng -->
            <div class="mt-4">
            <form action="{{ route('users.cart.add', $product->product_id) }}" method="POST" class="d-flex align-items-center">
    @csrf
    <input type="number" name="quantity" value="1" min="1" class="form-control w-25 me-2">
    <button type="submit" class="btn btn-success flex-grow-1">
        <i class="bi bi-cart-plus"></i> Thêm vào giỏ hàng
    </button>
</form>



                <a href="{{ route('users.index') }}" class="btn btn-secondary btn-lg ms-2 mt-2">
                    Quay lại
                </a>
            </div>
        </div>
    </div>

    <!-- Mô tả chi tiết -->
    <div class="row mt-5">
        <div class="col-12">
            <h4 class="fw-bold">Thông tin chi tiết</h4>
            <div class="p-3 border rounded bg-light">
                {!! nl2br(e($product->product_detail ?? 'Không có thông tin chi tiết.')) !!}
            </div>
        </div>
    </div>

</div>
@endsection
