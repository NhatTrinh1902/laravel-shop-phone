<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nhat Phone - Điện thoại chính hãng</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

  <style>
    /* =======================================
       GLOBAL STYLES - Nhat Phone Theme
    ======================================= */
    body {
      background-color: #f8f9fa;
      font-family: "Helvetica Neue", Arial, sans-serif;
      margin: 0;
      color: #333;
      background-image: linear-gradient(to bottom, #f8f9fa, #e9ecef);
    }

    /* =======================================
       HEADER NAVBAR - Nhat Phone Style
    ======================================= */
    .navbar-nhatphone {
      background: #ffffff;
      padding: 12px 0;
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 1000;
      transition: all 0.3s ease;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      border-bottom: 3px solid #e63946;
    }

    .navbar-nhatphone.scrolled {
      background: #ffffff;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .navbar-nhatphone .navbar-brand {
      font-weight: 800;
      font-size: 1.8rem;
      color: #e63946 !important;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .navbar-nhatphone .nav-link {
      padding: 8px 16px;
      font-size: 15px;
      color: #333 !important;
      border-radius: 4px;
      font-weight: 600;
      transition: all 0.2s ease;
      margin: 0 2px;
    }

    .navbar-nhatphone .nav-link:hover {
      background-color: rgba(230, 57, 70, 0.1);
      color: #e63946 !important;
    }

    .navbar-nhatphone .nav-link.active {
      background: linear-gradient(135deg, #e63946 0%, #f4a261 100%);
      color: #ffffff !important;
    }

    .nav-link.text-warning {
      color: #ff7b00 !important;
    }

    .nav-link.text-danger {
      color: #e63946 !important;
    }

    /* =======================================
       SWIPER BANNER - Nhat Phone Design
    ======================================= */
    .hero-slider-nhatphone {
      margin-top: 80px;
      height: 500px;
      position: relative;
      overflow: hidden;
      border-radius: 0 0 20px 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    /* Slide backgrounds - Nhat Phone Theme */
    .nhat-slide-1 {
      background: linear-gradient(135deg, 
        rgba(230, 57, 70, 0.9) 0%, 
        rgba(244, 162, 97, 0.9) 100%);
    }

    .nhat-slide-2 {
      background: linear-gradient(135deg, 
        rgba(42, 157, 143, 0.9) 0%, 
        rgba(38, 70, 83, 0.9) 100%);
    }

    .nhat-slide-3 {
      background: linear-gradient(135deg, 
        rgba(29, 53, 87, 0.9) 0%, 
        rgba(69, 123, 157, 0.9) 100%);
    }

    /* Slide content */
    .slide-content-nhat {
      text-align: center;
      color: white;
      padding: 0 30px;
      max-width: 900px;
      position: relative;
      z-index: 2;
      animation: slideInNhat 0.8s ease-out;
    }

    @keyframes slideInNhat {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .slide-content-nhat h1 {
      font-size: 3rem;
      font-weight: 800;
      margin-bottom: 20px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .slide-content-nhat p {
      font-size: 1.3rem;
      opacity: 0.95;
      margin-bottom: 30px;
      line-height: 1.6;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }

    /* Button Nhat Phone */
    .nhat-button {
      display: inline-block;
      padding: 15px 40px;
      background: #ffffff;
      color: #e63946;
      text-decoration: none;
      border-radius: 8px;
      font-weight: 700;
      font-size: 1.2rem;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .nhat-button:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
      color: #e63946;
      background: #f8f9fa;
    }

    /* Decorative elements */
    .nhat-decorations {
      position: absolute;
      width: 100%;
      height: 100%;
      pointer-events: none;
    }

    .nhat-decoration {
      position: absolute;
      opacity: 0.15;
      animation: floatNhat 8s ease-in-out infinite;
    }

    .decor-1 {
      top: 15%;
      left: 5%;
      font-size: 3rem;
      animation-delay: 0s;
      color: #ffffff;
    }

    .decor-2 {
      top: 10%;
      right: 10%;
      font-size: 2.5rem;
      animation-delay: 1s;
      color: #ffffff;
    }

    .decor-3 {
      bottom: 20%;
      left: 15%;
      font-size: 2rem;
      animation-delay: 2s;
      color: #ffffff;
    }

    @keyframes floatNhat {
      0%, 100% {
        transform: translateY(0) rotate(0deg);
      }
      33% {
        transform: translateY(-20px) rotate(5deg);
      }
      66% {
        transform: translateY(10px) rotate(-5deg);
      }
    }

    /* Swiper navigation - Nhat Phone */
    .swiper-button-next,
    .swiper-button-prev {
      color: #ffffff;
      background: rgba(230, 57, 70, 0.8);
      width: 60px;
      height: 60px;
      border-radius: 50%;
      transition: all 0.3s ease;
    }

    .swiper-button-next:after,
    .swiper-button-prev:after {
      font-size: 24px;
    }

    .swiper-button-next:hover,
    .swiper-button-prev:hover {
      background: rgba(230, 57, 70, 1);
      transform: scale(1.1);
    }

    /* Swiper pagination - Nhat Phone */
    .swiper-pagination-bullet {
      width: 12px;
      height: 12px;
      background: rgba(255, 255, 255, 0.6);
      opacity: 0.8;
    }

    .swiper-pagination-bullet-active {
      background: #ffffff;
      opacity: 1;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
    }

    /* Additional Nhat Phone Styles */
    .nhat-tagline {
      text-align: center;
      padding: 40px 20px;
      background: #ffffff;
      margin: 30px auto;
      max-width: 1200px;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }

    .nhat-tagline h2 {
      color: #e63946;
      font-weight: 800;
      margin-bottom: 20px;
    }

    .nhat-tagline p {
      color: #555;
      font-size: 1.1rem;
      max-width: 800px;
      margin: 0 auto;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .hero-slider-nhatphone {
        height: 400px;
        margin-top: 70px;
      }
      
      .slide-content-nhat h1 {
        font-size: 2.2rem;
      }
      
      .slide-content-nhat p {
        font-size: 1rem;
      }
      
      .nhat-button {
        padding: 12px 30px;
        font-size: 1rem;
      }
      
      .nhat-decoration {
        font-size: 1.5rem;
      }
      
      .nhat-tagline {
        margin: 20px 15px;
        padding: 30px 15px;
      }
    }

    @media (max-width: 576px) {
      .hero-slider-nhatphone {
        height: 350px;
      }
      
      .slide-content-nhat h1 {
        font-size: 1.8rem;
      }
      
      .slide-content-nhat p {
        font-size: 0.9rem;
      }
      
      .navbar-nhatphone .navbar-brand {
        font-size: 1.5rem;
      }
    }
  </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-nhatphone sticky-top" id="mainNavbar">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/home">
      <i class="bi bi-phone me-2"></i>Nhat Phone
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="/home">Trang chủ</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/admin/danh-sach-san-pham">
            <i class="bi bi-phone me-1"></i>Sản phẩm
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/admin/danh-sach-danh-muc">
            <i class="bi bi-laptop me-1"></i>Danh mục
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/admin/danh-sach-nguoi-dung">
            <i class="bi bi-people me-1"></i>Người Dùng
          </a>
        </li>

        @if(session()->has('user'))
          <li class="nav-item">
            <a class="nav-link text-warning" href="#">
              <i class="bi bi-person-circle me-1"></i>Admin: {{ session('user.username') }}
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-danger" href="{{ url('admin/logout') }}">
              <i class="bi bi-box-arrow-right me-1"></i>Đăng Xuất
            </a>
          </li>

        @else
          <li class="nav-item">
            <a class="nav-link text-warning" href="{{ url('admin/login') }}">
              <i class="bi bi-person-circle me-1"></i>Đăng Nhập
            </a>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>

<!-- Swiper Banner - Nhat Phone Design -->
<div class="hero-slider-nhatphone">
  <!-- Decorative elements -->
  <div class="nhat-decorations">
    <div class="nhat-decoration decor-1">
      <i class="bi bi-phone"></i>
    </div>
    <div class="nhat-decoration decor-2">
      <i class="bi bi-tablet"></i>
    </div>
    <div class="nhat-decoration decor-3">
      <i class="bi bi-headphones"></i>
    </div>
  </div>

  <!-- Swiper Container -->
  <div class="swiper">
    <div class="swiper-wrapper">
      <!-- Slide 1 -->
      <div class="swiper-slide nhat-slide-1">
        <div class="slide-content-nhat">
          <h1><i class="bi bi-star-fill me-2"></i>Nhat Phone - Đẳng cấp số 1</h1>
          <p>Chuyên cung cấp điện thoại chính hãng với giá tốt nhất thị trường. 
             Cam kết 100% hàng thật, bảo hành dài hạn, hỗ trợ trọn đời</p>
          <a href="/admin/danh-sach-san-pham" class="nhat-button">
            <i class="bi bi-cart-check me-2"></i>Mua Ngay
          </a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="swiper-slide nhat-slide-2">
        <div class="slide-content-nhat">
          <h1><i class="bi bi-shield-check me-2"></i>Bảo hành vàng 24 tháng</h1>
          <p>Chính sách bảo hành vàng độc quyền, đổi mới trong 30 ngày nếu lỗi, 
             hỗ trợ kỹ thuật 24/7 tại nhà hoặc trung tâm bảo hành</p>
          <a href="/admin/danh-sach-danh-muc" class="nhat-button">
            <i class="bi bi-search me-2"></i>Khám Phá
          </a>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="swiper-slide nhat-slide-3">
        <div class="slide-content-nhat">
          <h1><i class="bi bi-truck me-2"></i>Giao hàng siêu tốc</h1>
          <p>Miễn phí giao hàng toàn quốc trong 2 giờ tại thành phố, 
             nhận hàng trước khi thanh toán, kiểm tra kỹ trước khi nhận</p>
          <a href="#" class="nhat-button">
            <i class="bi bi-info-circle me-2"></i>Tìm Hiểu Thêm
          </a>
        </div>
      </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    
    <!-- Pagination -->
    <div class="swiper-pagination"></div>
  </div>
</div>

<!-- Tagline Section -->
<div class="container">
  <div class="nhat-tagline">
    <h2><i class="bi bi-award-fill me-2"></i>Vì sao chọn Nhat Phone?</h2>
    <p>Với hơn 10 năm kinh nghiệm trong lĩnh vực công nghệ, Nhat Phone tự hào là địa chỉ uy tín hàng đầu cung cấp điện thoại, tablet và phụ kiện chính hãng. Chúng tôi cam kết mang đến cho khách hàng sản phẩm chất lượng với giá cả cạnh tranh nhất.</p>
  </div>
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  // Initialize Swiper - Nhat Phone Version
  const swiper = new Swiper('.swiper', {
    direction: 'horizontal',
    loop: true,
    speed: 1000,
    autoplay: {
      delay: 6000,
      disableOnInteraction: false,
    },
    effect: 'slide',
    grabCursor: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      dynamicBullets: true,
    }
  });

  // Navbar scroll effect
  window.addEventListener('scroll', function() {
    const navbar = document.getElementById('mainNavbar');
    if (window.scrollY > 50) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });

  // Add slide content animation on change
  swiper.on('slideChange', function () {
    const activeContent = document.querySelector('.swiper-slide-active .slide-content-nhat');
    if (activeContent) {
      activeContent.style.animation = 'none';
      setTimeout(() => {
        activeContent.style.animation = 'slideInNhat 0.8s ease-out';
      }, 10);
    }
  });

  // Button hover effects
  document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.nhat-button');
    buttons.forEach(button => {
      button.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-3px) scale(1.05)';
      });
      
      button.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0) scale(1)';
      });
    });
    
    // Add some interactive effects to decorations
    const decorations = document.querySelectorAll('.nhat-decoration');
    decorations.forEach(decor => {
      decor.addEventListener('mouseenter', function() {
        this.style.opacity = '0.3';
      });
      
      decor.addEventListener('mouseleave', function() {
        this.style.opacity = '0.15';
      });
    });
  });
</script>

</body>
</html>