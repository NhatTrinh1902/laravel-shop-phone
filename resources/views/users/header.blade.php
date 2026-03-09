<nav class="navbar navbar-expand-lg navbar-dark bg-black">
  <div class="container">
    <!-- Logo và tìm kiếm -->
    <div class="d-flex align-items-center w-100">
      <a class="navbar-brand me-4" href="{{ route('users.index') }}">
        <img src="/logo-techhub.svg" alt="TechHub" height="30">
      </a>
      
      <div class="d-none d-lg-flex flex-grow-1 me-4">
        <div class="input-group">
          <span class="input-group-text bg-dark border-dark text-white">
            <i class="bi bi-search"></i>
          </span>
          <input type="text" class="form-control bg-dark border-dark text-white" placeholder="Tìm kiếm sản phẩm công nghệ...">
          <button class="btn btn-outline-light">Tìm</button>
        </div>
      </div>
    </div>

    <!-- Menu chính -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <i class="bi bi-grid-3x3-gap me-1"></i>
            Danh mục
          </a>
          <div class="dropdown-menu dropdown-menu-dark dropdown-menu-end p-3" style="min-width: 300px;">
            <div class="row">
              <div class="col-6">
                <h6 class="text-info mb-2">Thiết bị</h6>
                <a href="#" class="dropdown-item">Laptop</a>
                <a href="#" class="dropdown-item">PC Gaming</a>
                <a href="#" class="dropdown-item">Máy tính bảng</a>
              </div>
              <div class="col-6">
                <h6 class="text-info mb-2">Phụ kiện</h6>
                <a href="#" class="dropdown-item">Chuột/Bàn phím</a>
                <a href="#" class="dropdown-item">Tai nghe</a>
                <a href="#" class="dropdown-item">Màn hình</a>
              </div>
            </div>
          </div>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="{{ route('users.products') }}">
            <i class="bi bi-tags me-1"></i>
            Sản phẩm
          </a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle me-1"></i>
            Tài khoản
          </a>
          <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
            <li><a class="dropdown-item" href="{{ route('users.profile') }}">Hồ sơ</a></li>
            <li><a class="dropdown-item" href="{{ route('users.orders') }}">Đơn hàng</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Mobile Search Bar -->
<div class="d-lg-none bg-dark p-2">
  <div class="container">
    <div class="input-group input-group-sm">
      <input type="text" class="form-control bg-black text-white border-dark" placeholder="Tìm kiếm...">
      <button class="btn btn-outline-info">
        <i class="bi bi-search"></i>
      </button>
    </div>
  </div>
</div>  