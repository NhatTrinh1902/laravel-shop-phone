
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>Nhật Phone – Điện thoại chính hãng</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>

<!-- Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet"/>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>

<style>
:root{
  --dark:#0b0b0c;
  --dark-2:#151517;
  --red:#e11d48;
  --red-light:#fb7185;
  --gray:#9ca3af;
  --white:#ffffff;
}

body{
  font-family:Poppins,sans-serif;
  background:linear-gradient(180deg,#0b0b0c,#151517);
  color:#fff;
  padding-top:80px;
}

/* ================= HEADER ================= */
.header{
  position:fixed;
  top:0;left:0;right:0;
  z-index:999;
  background:rgba(11,11,12,.95);
  backdrop-filter:blur(12px);
  border-bottom:1px solid rgba(255,255,255,.08);
}

.navbar-brand{
  font-weight:800;
  font-size:1.7rem;
  color:var(--red);
}

.nav-link{
  color:#e5e7eb!important;
  font-weight:500;
  padding:.6rem 1.2rem;
  border-radius:10px;
}
.nav-link:hover,
.nav-link.active{
  background:rgba(225,29,72,.15);
  color:#fff!important;
}

/* ================= HERO ================= */
.hero{
  padding:4rem 0;
}
.hero-title{
  font-size:3.2rem;
  font-weight:800;
  color:#fff;
}
.hero-title span{
  color:var(--red);
}
.hero-sub{
  color:var(--gray);
  font-size:1.15rem;
  max-width:600px;
}
.hero-box{
  background:linear-gradient(135deg,#1f1f22,#0f0f10);
  border-radius:24px;
  padding:2rem;
  border:1px solid rgba(255,255,255,.08);
}

/* ================= BRAND ================= */
.brand-card{
  background:#0f0f10;
  border-radius:16px;
  padding:1.5rem;
  text-align:center;
  border:1px solid rgba(255,255,255,.08);
  transition:.3s;
}
.brand-card:hover{
  transform:translateY(-6px);
  border-color:var(--red);
}

/* ================= PRODUCT ================= */
.product-card{
  background:#0f0f10;
  border-radius:20px;
  overflow:hidden;
  border:1px solid rgba(255,255,255,.08);
  transition:.3s;
}
.product-card:hover{
  transform:translateY(-8px);
  border-color:var(--red);
}
.product-body{
  padding:1.5rem;
}
.price{
  color:var(--red-light);
  font-weight:700;
  font-size:1.1rem;
}

/* ================= FOOTER ================= */
<style>
/* FOOTER - TONE ĐEN ĐỎ */
footer {
    background: linear-gradient(180deg, #0a0a0a 0%, #1a1a1a 100%);
    color: #f0f0f0;
    padding: 3rem 0 1.5rem;
    margin-top: 4rem !important;
    border-top: 3px solid #d32f2f;
    position: relative;
    overflow: hidden;
}

/* Hiệu ứng nền tinh tế */
footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #d32f2f, #ff5252, #d32f2f);
    background-size: 200% 100%;
    animation: gradient-shift 3s ease infinite;
}

@keyframes gradient-shift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Tiêu đề footer */
.footer-title {
    color: #fff;
    font-weight: 700;
    font-size: 1.25rem;
    margin-bottom: 1.2rem;
    position: relative;
    padding-bottom: 0.5rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.footer-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 40px;
    height: 3px;
    background: #d32f2f;
    border-radius: 2px;
}

/* Link footer */
.footer-link {
    display: block;
    color: #b0b0b0 !important;
    text-decoration: none;
    margin-bottom: 0.7rem;
    padding: 0.3rem 0;
    transition: all 0.3s ease;
    border-left: 2px solid transparent;
    padding-left: 10px;
}

.footer-link:hover {
    color: #fff !important;
    border-left: 2px solid #d32f2f;
    padding-left: 15px;
    transform: translateX(5px);
}

/* Đoạn văn bản */
footer .text-muted {
    color: #aaa !important;
    line-height: 1.6;
    font-size: 0.95rem;
}

/* Thông tin liên hệ */
footer .col-md-4:last-child p {
    padding-left: 10px;
    position: relative;
}

footer .col-md-4:last-child p::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 4px;
    height: 4px;
    background: #d32f2f;
    border-radius: 50%;
}

/* Đường phân cách */
footer hr {
    border-color: #333 !important;
    background: linear-gradient(90deg, transparent, #d32f2f, transparent);
    height: 1px;
    opacity: 0.7;
    margin: 2rem 0;
}

/* Bản quyền */
footer .text-center {
    color: #888 !important;
    font-size: 0.9rem;
    padding-top: 1rem;
    border-top: 1px solid #333;
    position: relative;
}

/* Hiệu ứng hover cho các cột */
footer .col-md-4 {
    transition: transform 0.3s ease;
}

footer .col-md-4:hover {
    transform: translateY(-5px);
}

/* Responsive */
@media (max-width: 768px) {
    footer {
        padding: 2rem 0 1rem;
        text-align: center;
    }
    
    .footer-title::after {
        left: 50%;
        transform: translateX(-50%);
    }
    
    .footer-link {
        border-left: none;
        padding-left: 0;
        border-bottom: 1px solid transparent;
        display: inline-block;
        margin: 0 10px;
    }
    
    .footer-link:hover {
        border-left: none;
        padding-left: 0;
        border-bottom: 1px solid #d32f2f;
        transform: translateY(-3px);
    }
    
    footer .col-md-4:last-child p::before {
        display: none;
    }
    
    footer .col-md-4 {
        margin-bottom: 2rem;
    }
}

/* Hiệu ứng logo/brand */
.footer-title:first-child {
    color: #fff;
    font-size: 1.5rem;
    background: linear-gradient(45deg, #fff, #ff5252);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Tăng độ tương phản cho số điện thoại */
footer .col-md-4:last-child .mb-1 {
    color: #fff !important;
    font-weight: 600;
    font-size: 1.1rem;
}
</style>
</style>
</head>

<body>

<!-- HEADER -->
<header class="header">
<nav class="navbar navbar-expand-lg navbar-dark container">
<a class="navbar-brand" href="{{ route('users.index') }}">NHẬT PHONE</a>

<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMain">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navMain">
<ul class="navbar-nav me-auto">
<li class="nav-item"><a class="nav-link active" href="{{ route('users.index') }}">Trang chủ</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('users.products') }}">Sản Phẩm</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('users.contact') }}">Liên hệ</a></li>
</ul>

@php
$cartCount = 0;
if(session()->has('cart')){
$cartCount = array_sum(array_column(session('cart'),'quantity'));
}
@endphp

<a href="{{ route('users.cart') }}" class="btn btn-outline-danger me-3">
<i class="bi bi-cart3"></i> ({{ $cartCount }})
</a>

@if(session()->has('user'))
<a href="{{ url('/logout') }}" class="btn btn-danger">Đăng xuất</a>
@else
<a href="{{ url('/login') }}" class="btn btn-danger">Đăng nhập</a>
@endif
</div>
</nav>
</header>

<!-- HERO -->
<section class="hero container">
<div class="row align-items-center g-5">
<div class="col-lg-6">
<h1 class="hero-title">
Điện thoại chính hãng <br>
<span>Giá tốt mỗi ngày</span>
</h1>
<p class="hero-sub mt-3">
Nhật Phone chuyên cung cấp iPhone, Samsung, Xiaomi chính hãng 100%, bảo hành đầy đủ, giao nhanh trong ngày.
</p>
<a href="{{ route('users.products') }}" class="btn btn-danger btn-lg mt-4">
Xem sản phẩm
</a>
</div>

<div class="col-lg-6">
<div class="hero-box">
<img class="img-fluid rounded-4" src="https://images.unsplash.com/photo-1605236453806-6ff36851218e" alt="">
</div>
</div>
</div>
</section>

<!-- BRANDS -->
<section class="container mt-5">
<h3 class="mb-4">Hãng điện thoại</h3>
<div class="row g-4">
<div class="col-md-3"><div class="brand-card">Apple</div></div>
<div class="col-md-3"><div class="brand-card">Samsung</div></div>
</div>
</section>

<!-- CONTENT -->
<section class="container mt-5">
@yield('content')
</section>

<!-- FOOTER -->
<footer class="mt-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h5 class="footer-title">NHẬT PHONE</h5>
                <p class="text-muted">Cửa hàng điện thoại uy tín – chính hãng – giá tốt.</p>
            </div>
            <div class="col-md-4">
                <h5 class="footer-title">Hỗ trợ</h5>
                <a class="footer-link d-block" href="#">Bảo hành</a>
                <a class="footer-link d-block" href="#">Đổi trả</a>
                <a class="footer-link d-block" href="#">Thanh toán</a>
            </div>
            <div class="col-md-4">
                <h5 class="footer-title">Liên hệ</h5>
                <p class="text-muted mb-1">📱 0363565822</p>
                <p class="text-muted">📍 TP.HCM</p>
            </div>
        </div>

        <hr class="my-4 border-secondary">
        <p class="text-center text-muted mb-0">©2024 NhatPhone - All rights reserved</p>
    </div>
</footer>

</body>
</html>
