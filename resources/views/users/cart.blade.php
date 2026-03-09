@extends('layouts.user')

@section('content')
<div class="container py-5">

    <!-- TIÊU ĐỀ -->
    <div class="mb-4">
        <h2 class="fw-bold text-primary">🛒 Giỏ hàng Nhật Phone</h2>
        <p class="text-muted">Thêm hoặc bớt sản phẩm, giá sẽ tự động cập nhật</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm rounded-3">
            {{ session('success') }}
        </div>
    @endif

    @php $total = 0; @endphp

    @if(!empty($cart) && count($cart) > 0)
    <div class="row g-4">

        <!-- DANH SÁCH SẢN PHẨM -->
        <div class="col-lg-8">
            @foreach($cart as $id => $item)
                @php
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                @endphp

                <div class="card mb-3 shadow-sm border-0 rounded-4 cart-item"
                     data-price="{{ $item['price'] }}">
                    <div class="card-body">
                        <div class="row align-items-center">

                            <!-- HÌNH -->
                            <div class="col-md-2 text-center">
                                <img src="{{ asset($item['image']) }}"
                                     class="img-fluid rounded"
                                     style="max-height:90px">
                            </div>

                            <!-- TÊN -->
                            <div class="col-md-3">
                                <h6 class="fw-bold mb-1">{{ $item['name'] }}</h6>
                                <span class="text-muted">
                                    {{ number_format($item['price']) }} VNĐ
                                </span>
                            </div>

                            <!-- SỐ LƯỢNG -->
                            <div class="col-md-3">
                                <form action="{{ route('users.cart.update', $id) }}"
                                      method="POST"
                                      class="d-flex align-items-center quantity-form">
                                    @csrf

                                    <button type="button"
                                            class="btn btn-outline-secondary btn-sm btn-minus">−</button>

                                    <input type="number"
                                           name="quantity"
                                           value="{{ $item['quantity'] }}"
                                           min="1"
                                           class="form-control mx-2 text-center quantity-input"
                                           style="width:70px">

                                    <button type="button"
                                            class="btn btn-outline-secondary btn-sm btn-plus">+</button>

                                    <button type="submit"
                                            class="btn btn-sm btn-outline-primary ms-2">
                                        Lưu
                                    </button>
                                </form>
                            </div>

                            <!-- THÀNH TIỀN -->
                            <div class="col-md-2 text-end fw-bold text-danger item-subtotal">
                                {{ number_format($subtotal) }} VNĐ
                            </div>

                            <!-- XOÁ -->
                            <div class="col-md-2 text-end">
                                <form action="{{ route('users.cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-outline-danger btn-sm">
                                        Xóa
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- TỔNG TIỀN -->
        <div class="col-lg-4">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body">

                    <h5 class="fw-bold mb-3">🧾 Tổng đơn hàng</h5>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Tạm tính</span>
                        <span id="cart-total">
                            {{ number_format($total) }} VNĐ
                        </span>
                    </div>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Phí vận chuyển</span>
                        <span class="text-success">Miễn phí</span>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between fs-5 fw-bold text-primary mb-4">
                        <span>Tổng cộng</span>
                        <span id="cart-grand-total">
                            {{ number_format($total) }} VNĐ
                        </span>
                    </div>

                    <a href="{{ route('users.checkout') }}"
                       class="btn btn-success btn-lg w-100 rounded-3">
                        Thanh toán
                    </a>

                    <a href="{{ route('users.products') }}"
                       class="btn btn-outline-secondary w-100 mt-3">
                        ← Tiếp tục mua sắm
                    </a>

                </div>
            </div>
        </div>

    </div>

    @else
        <div class="text-center py-5">
            <h4>🛒 Giỏ hàng trống</h4>
            <p class="text-muted">Hãy chọn sản phẩm bạn yêu thích tại Nhật Phone</p>
            <a href="{{ route('users.products') }}" class="btn btn-primary btn-lg">
                Mua sắm ngay
            </a>
        </div>
    @endif

</div>

<!-- SCRIPT XỬ LÝ TĂNG GIẢM + TÍNH TIỀN -->
<script>
document.querySelectorAll('.cart-item').forEach(item => {
    const price = parseInt(item.dataset.price);
    const input = item.querySelector('.quantity-input');
    const subtotalEl = item.querySelector('.item-subtotal');

    item.querySelector('.btn-plus').onclick = () => {
        input.value++;
        update();
    };

    item.querySelector('.btn-minus').onclick = () => {
        if (input.value > 1) {
            input.value--;
            update();
        }
    };

    input.oninput = update;

    function update() {
        const subtotal = price * input.value;
        subtotalEl.innerText = subtotal.toLocaleString() + ' VNĐ';
        updateTotal();
    }
});

function updateTotal() {
    let total = 0;
    document.querySelectorAll('.cart-item').forEach(item => {
        const qty = item.querySelector('.quantity-input').value;
        const price = item.dataset.price;
        total += qty * price;
    });

    document.getElementById('cart-total').innerText =
    document.getElementById('cart-grand-total').innerText =
        total.toLocaleString() + ' VNĐ';
}
</script>
@endsection
