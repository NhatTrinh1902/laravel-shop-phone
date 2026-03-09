@extends('layouts.user')

@section('content')
<style>
    /* ========== VARIABLES & GLOBAL ========== */
    :root {
        --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --gradient-tech: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        --shadow-lg: 0 20px 40px rgba(0, 0, 0, 0.15);
        --shadow-hover: 0 25px 50px rgba(0, 0, 0, 0.25);
    }

    /* ========== HERO BANNER ========== */
    .hero-banner {
        background: var(--gradient-tech);
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        margin-bottom: 4rem;
    }
    
    .hero-banner::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%2300d4ff' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
    }

    /* ========== PRODUCT CARDS ========== */
    .product-card {
        background: white;
        border: none;
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        position: relative;
        height: 100%;
    }

    .product-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-primary);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.4s ease;
    }

    .product-card:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: var(--shadow-hover);
    }

    .product-card:hover::before {
        transform: scaleX(1);
    }

    .product-card .card-img-top {
        height: 200px;
        object-fit: cover;
        transition: transform 0.6s ease;
        padding: 1rem;
    }

    .product-card:hover .card-img-top {
        transform: scale(1.1);
    }

    .product-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: var(--gradient-primary);
        color: white;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        z-index: 2;
    }

    /* ========== CAROUSEL STYLING ========== */
    .premium-carousel {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        position: relative;
        background: linear-gradient(to bottom, #ffffff, #f8f9fa);
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        opacity: 0;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .premium-carousel:hover .carousel-control-prev,
    .premium-carousel:hover .carousel-control-next {
        opacity: 1;
    }

    .carousel-control-prev { left: -25px; }
    .carousel-control-next { right: -25px; }

    .carousel-indicators {
        bottom: -40px;
    }

    .carousel-indicators button {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        border: 2px solid #667eea;
        background: transparent;
        margin: 0 5px;
    }

    .carousel-indicators button.active {
        background: #667eea;
    }

    /* ========== ANIMATIONS ========== */
    @keyframes floatIn {
        0% {
            opacity: 0;
            transform: translateY(30px) scale(0.95);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .fade-in {
        animation: floatIn 0.6s ease forwards;
        opacity: 0;
    }

    .fade-in:nth-child(2) { animation-delay: 0.1s; }
    .fade-in:nth-child(3) { animation-delay: 0.2s; }
    .fade-in:nth-child(4) { animation-delay: 0.3s; }

    /* ========== TYPOGRAPHY ========== */
    .section-title {
        position: relative;
        display: inline-block;
        margin-bottom: 3rem;
        font-weight: 700;
        color: #2d3748;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: var(--gradient-primary);
        border-radius: 2px;
    }

    .price-tag {
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 700;
        font-size: 1.25rem;
    }

    /* ========== BUTTONS ========== */
    .btn-premium {
        background: var(--gradient-primary);
        border: none;
        color: white;
        padding: 10px 24px;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-premium::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .btn-premium:hover::before {
        left: 100%;
    }

    .btn-premium:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 768px) {
        .product-card .card-img-top {
            height: 150px;
        }
        
        .hero-banner {
            border-radius: 10px;
            margin-bottom: 2rem;
        }
        
        .carousel-control-prev,
        .carousel-control-next {
            display: none;
        }
    }
</style>

<div class="container py-5">

    <!-- ======= HERO BANNER ======= -->
    <div class="hero-banner p-5 text-center text-white mb-5">
        <div class="position-relative z-1">
            <h1 class="display-4 fw-bold mb-3">CÔNG NGHỆ ĐỈNH CAO</h1>
            <p class="lead mb-4">Khám phá bộ sưu tập sản phẩm công nghệ hiện đại<br>Ưu đãi độc quyền cho thành viên TechHub</p>
            <a href="#featuredProducts" class="btn btn-premium btn-lg">
                <i class="bi bi-arrow-down me-2"></i>Khám phá ngay
            </a>
        </div>
    </div>

    <!-- ======= SẢN PHẨM NỔI BẬT ======= -->
    <div class="mb-5" id="featuredProducts">
        <h2 class="section-title text-center">✨ SẢN PHẨM NỔI BẬT</h2>
        
        <div id="featuredCarousel" class="carousel slide premium-carousel" data-bs-ride="carousel">
            <div class="carousel-inner px-4 py-5">
                @php
                    $chunks = $featuredProducts->chunk(4);
                @endphp
                
                @foreach($chunks as $key => $chunk)
                    <div class="carousel-item @if($key==0) active @endif">
                        <div class="row g-4">
                            @foreach($chunk as $product)
                                <div class="col-lg-3 col-md-6">
                                    <div class="product-card h-100 position-relative">
                                        @if($product->featured)
                                            <span class="product-badge">
                                                <i class="bi bi-star-fill me-1"></i>NỔI BẬT
                                            </span>
                                        @endif
                                        
                                        <div class="position-relative overflow-hidden" style="height: 200px;">
                                            <img src="{{ asset($product->product_img) }}" 
                                                 class="card-img-top h-100 w-100" 
                                                 alt="{{ $product->product_name }}"
                                                 style="object-fit: contain;">
                                        </div>
                                        
                                        <div class="card-body d-flex flex-column p-4">
                                            <h5 class="card-title fw-bold mb-2">{{ $product->product_name }}</h5>
                                            <p class="card-text text-muted small flex-grow-1">
                                                {{ Str::limit($product->product_description, 60) }}
                                            </p>
                                            
                                            <div class="d-flex justify-content-between align-items-center mt-3">
                                                <span class="price-tag">{{ number_format($product->product_price) }} ₫</span>
                                                <a href="{{ route('product.detail', $product->product_id) }}" 
                                                   class="btn btn-premium btn-sm">
                                                    <i class="bi bi-eye me-1"></i>Xem chi tiết
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#featuredCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Trước</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#featuredCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Tiếp</span>
            </button>
            
            <div class="carousel-indicators position-relative mt-4">
                @foreach($chunks as $key => $chunk)
                    <button type="button" data-bs-target="#featuredCarousel" 
                            data-bs-slide-to="{{ $key }}" 
                            class="{{ $key == 0 ? 'active' : '' }}"></button>
                @endforeach
            </div>
        </div>
    </div>

    <!-- ======= TẤT CẢ SẢN PHẨM ======= -->
    <div class="mt-5 pt-5">
        <h2 class="section-title text-center">🎯 TẤT CẢ SẢN PHẨM</h2>
        
        <div class="row g-4">
            @foreach($allProducts as $index => $product)
                <div class="col-xl-3 col-lg-4 col-md-6 fade-in">
                    <div class="product-card h-100">
                        <div class="position-relative overflow-hidden" style="height: 200px; background: #f8f9fa;">
                            <img src="{{ asset($product->product_img) }}" 
                                 class="card-img-top h-100 w-100" 
                                 alt="{{ $product->product_name }}"
                                 style="object-fit: contain; padding: 1.5rem;">
                        </div>
                        
                        <div class="card-body d-flex flex-column p-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title fw-bold mb-0" style="flex: 1;">{{ $product->product_name }}</h5>
                                @if($product->stock < 10)
                                    <span class="badge bg-danger ms-2">Sắp hết hàng</span>
                                @endif
                            </div>
                            
                            <p class="card-text text-muted small mb-3 flex-grow-1">
                                {{ Str::limit($product->product_description, 70) }}
                            </p>
                            
                            <div class="d-flex justify-content-between align-items-center mt-auto pt-3">
                                <div>
                                    <span class="price-tag d-block">{{ number_format($product->product_price) }} ₫</span>
                                    @if($product->original_price > $product->product_price)
                                        <small class="text-muted text-decoration-line-through">
                                            {{ number_format($product->original_price) }} ₫
                                        </small>
                                    @endif
                                </div>
                                
                                <div class="d-flex gap-2">
                                    <a href="{{ route('product.detail', $product->product_id) }}" 
                                       class="btn btn-premium btn-sm">
                                        <i class="bi bi-eye me-1"></i>Chi tiết
                                    </a>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- ======= CALL TO ACTION ======= -->
    <div class="text-center mt-5 pt-5">
        <div class="p-5 rounded-3" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
            <h3 class="fw-bold mb-3">Chưa tìm thấy sản phẩm phù hợp?</h3>
            <p class="text-muted mb-4">Đội ngũ tư vấn của chúng tôi sẵn sàng hỗ trợ bạn 24/7</p>
            <a href="{{ route('users.contact') }}" class="btn btn-premium btn-lg px-5">
                <i class="bi bi-headset me-2"></i>Liên hệ tư vấn
            </a>
        </div>
    </div>

</div>

<script>
    // Auto animate carousel
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = new bootstrap.Carousel('#featuredCarousel', {
            interval: 3000,
            wrap: true
        });

        // Add scroll animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationDelay = '0s';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
    });
</script>
@endsection