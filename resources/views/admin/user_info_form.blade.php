@include('admin/template/header')

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <!-- Header với logo Nhật Phone -->
            <div class="text-center mb-5">
                <div class="d-flex justify-content-center align-items-center mb-3">
                    <div class="bg-primary rounded-circle p-3 me-3 shadow-sm" style="background: linear-gradient(135deg, #007bff 0%, #6610f2 100%);">
                        <i class="fas fa-mobile-alt text-white fs-4"></i>
                    </div>
                    <h1 class="text-primary fw-bold mb-0">Nhật Phone</h1>
                </div>
                <h2 class="text-dark fw-bold">CẬP NHẬT THÔNG TIN KHÁCH HÀNG</h2>
                <p class="text-muted">Quản lý thông tin người dùng hệ thống</p>
                <div class="bg-light p-2 rounded d-inline-block">
                    <span class="badge bg-primary me-2">Admin</span>
                    <small class="text-muted">ID: {{ $users[0]->user_id ?? '' }}</small>
                </div>
            </div>

            @foreach ($users as $user)
            <div class="card border-0 shadow-lg mb-4" style="border-radius: 15px; overflow: hidden;">
                <!-- Card header -->
                <div class="card-header bg-gradient-primary text-white py-4" style="background: linear-gradient(135deg, #007bff 0%, #6610f2 100%);">
                    <div class="d-flex align-items-center">
                        <div class="bg-white rounded-circle p-2 me-3">
                            <i class="fas fa-user-edit text-primary"></i>
                        </div>
                        <div>
                            <h4 class="mb-0 fw-bold">Chỉnh sửa tài khoản</h4>
                            <p class="mb-0 opacity-75">Cập nhật thông tin chi tiết</p>
                        </div>
                    </div>
                </div>

                <!-- Card body -->
                <div class="card-body p-4">
                    <form action="/admin/xu-ly-cap-nhat-nguoi-dung" method="post" id="updateUserForm">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->user_id }}">

                        <!-- Thông tin cơ bản -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary border-bottom pb-2 mb-3">
                                    <i class="fas fa-info-circle me-2"></i>Thông tin cá nhân
                                </h5>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-dark">
                                    <i class="fas fa-user me-1 text-primary"></i>
                                    Tên đăng nhập
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-at text-muted"></i>
                                    </span>
                                    <input type="text" class="form-control border-start-0 ps-0" 
                                           id="username" name="username" 
                                           value="{{ $user->user_username }}" 
                                           required
                                           placeholder="Nhập tên đăng nhập">
                                </div>
                                <small class="form-text text-muted">Tên dùng để đăng nhập hệ thống</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-dark">
                                    <i class="fas fa-id-card me-1 text-primary"></i>
                                    Họ và tên
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-user-circle text-muted"></i>
                                    </span>
                                    <input type="text" class="form-control border-start-0 ps-0" 
                                           id="fullname" name="fullname" 
                                           value="{{ $user->user_fullname }}" 
                                           required
                                           placeholder="Nhập họ và tên">
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label fw-semibold text-dark">
                                    <i class="fas fa-map-marker-alt me-1 text-primary"></i>
                                    Địa chỉ
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-home text-muted"></i>
                                    </span>
                                    <input type="text" class="form-control border-start-0 ps-0" 
                                           id="address" name="address" 
                                           value="{{ $user->user_address }}" 
                                           required
                                           placeholder="Nhập địa chỉ">
                                </div>
                            </div>
                        </div>

                        <!-- Phân quyền -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary border-bottom pb-2 mb-3">
                                    <i class="fas fa-shield-alt me-2"></i>Phân quyền hệ thống
                                </h5>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="role-card {{ $user->user_role == 0 ? 'active' : '' }}" 
                                             onclick="selectRole(0)">
                                            <input type="radio" name="role" id="user" 
                                                   value="0" {{ $user->user_role == 0 ? 'checked' : '' }} hidden>
                                            <div class="text-center p-4 h-100">
                                                <div class="mb-3">
                                                    <i class="fas fa-user-circle fa-3x text-secondary"></i>
                                                </div>
                                                <h5 class="fw-bold">Người dùng</h5>
                                                <p class="text-muted small mb-3">Truy cập cơ bản, xem thông tin</p>
                                                <div class="badge bg-secondary">Standard</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="role-card {{ $user->user_role == 1 ? 'active' : '' }}" 
                                             onclick="selectRole(1)">
                                            <input type="radio" name="role" id="admin" 
                                                   value="1" {{ $user->user_role == 1 ? 'checked' : '' }} hidden>
                                            <div class="text-center p-4 h-100">
                                                <div class="mb-3">
                                                    <i class="fas fa-crown fa-3x text-warning"></i>
                                                </div>
                                                <h5 class="fw-bold">Quản trị viên</h5>
                                                <p class="text-muted small mb-3">Toàn quyền hệ thống</p>
                                                <div class="badge bg-warning text-dark">Premium</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Thông tin bổ sung -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="bg-light p-3 rounded">
                                    <h6 class="text-dark mb-2">
                                        <i class="fas fa-history me-2 text-primary"></i>
                                        Thông tin tài khoản
                                    </h6>
                                    <div class="row small">
                                        <div class="col-md-6">
                                            <span class="text-muted">Ngày tạo:</span>
                                            <span class="text-dark fw-semibold">Không xác định</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="text-muted">Trạng thái:</span>
                                            <span class="badge bg-success">Đang hoạt động</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action buttons -->
                        <div class="row mt-5">
                            <div class="col-md-6 mb-2">
                                <button type="submit" class="btn btn-primary w-100 py-3 fw-bold">
                                    <i class="fas fa-save me-2"></i>
                                    LƯU THAY ĐỔI
                                </button>
                            </div>
                            <div class="col-md-6 mb-2">
                                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary w-100 py-3 fw-bold">
                                    <i class="fas fa-arrow-left me-2"></i>
                                    QUAY LẠI
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Card footer -->
                <div class="card-footer bg-light py-3">
                    <div class="text-center text-muted small">
                        <i class="fas fa-exclamation-circle me-1"></i>
                        Nhật Phone - Hệ thống quản lý người dùng © 2024
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
    body {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
    }

    .role-card {
        border: 2px solid #dee2e6;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        height: 100%;
        background: white;
    }

    .role-card:hover {
        border-color: #007bff;
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 123, 255, 0.1);
    }

    .role-card.active {
        border-color: #007bff;
        background: linear-gradient(135deg, rgba(0, 123, 255, 0.05) 0%, rgba(102, 16, 242, 0.05) 100%);
        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.2);
    }

    .role-card.active .badge {
        background: #007bff !important;
        color: white !important;
    }

    .bg-gradient-primary {
        background: linear-gradient(135deg, #007bff 0%, #6610f2 100%) !important;
    }

    .input-group:focus-within {
        border-radius: 8px;
        box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25);
    }

    .input-group-text {
        background-color: #f8f9fa;
        border-right: none;
    }

    .form-control {
        border-left: none;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #ced4da;
    }

    .btn-primary {
        background: linear-gradient(135deg, #007bff 0%, #6610f2 100%);
        border: none;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 15px rgba(0, 123, 255, 0.3);
    }

    .btn-outline-secondary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 15px rgba(108, 117, 125, 0.2);
    }

    /* Animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card {
        animation: fadeIn 0.6s ease-out;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .container-fluid {
            padding: 20px 15px;
        }
        
        .card-header .d-flex {
            flex-direction: column;
            text-align: center;
        }
        
        .card-header .bg-white {
            margin-bottom: 15px;
            margin-right: 0 !important;
        }
        
        .role-card {
            margin-bottom: 15px;
        }
        
        .btn {
            padding: 12px !important;
        }
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #007bff 0%, #6610f2 100%);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #0056b3 0%, #520dc2 100%);
    }
</style>

<script>
    function selectRole(roleId) {
        // Remove active class from all cards
        document.querySelectorAll('.role-card').forEach(card => {
            card.classList.remove('active');
        });
        
        // Add active class to selected card
        event.currentTarget.classList.add('active');
        
        // Check the corresponding radio button
        if (roleId === 0) {
            document.getElementById('user').checked = true;
        } else {
            document.getElementById('admin').checked = true;
        }
    }

    // Form validation
    document.getElementById('updateUserForm').addEventListener('submit', function(e) {
        const username = document.getElementById('username').value.trim();
        const fullname = document.getElementById('fullname').value.trim();
        const address = document.getElementById('address').value.trim();
        
        if (!username || !fullname || !address) {
            e.preventDefault();
            alert('Vui lòng điền đầy đủ thông tin trước khi cập nhật!');
            return false;
        }
        
        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>ĐANG XỬ LÝ...';
        submitBtn.disabled = true;
        
        return true;
    });

    // Add animation on load
    document.addEventListener('DOMContentLoaded', function() {
        const inputs = document.querySelectorAll('input');
        inputs.forEach((input, index) => {
            input.style.animationDelay = (index * 0.1) + 's';
        });
    });
</script>

@include('admin/template/footer')