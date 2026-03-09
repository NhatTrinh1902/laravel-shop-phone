@include('admin/template/header')

<div class="container-fluid px-4 py-5">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">Danh Mục Sản Phẩm</h2>
            <p class="text-muted mb-0">Quản lý tất cả danh mục trong hệ thống</p>
        </div>
        <a href="{{ url('admin/insert-form') }}" class="btn btn-primary d-flex align-items-center gap-2 px-4 py-3">
            <i class="bi bi-plus-lg fs-5"></i>
            <span class="fw-semibold">Thêm Danh Mục</span>
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="stats-icon bg-primary">
                        <i class="bi bi-grid-3x3-gap text-white"></i>
                    </div>
                    <div class="ms-3">
                        <p class="text-muted mb-0">Tổng Danh Mục</p>
                        <h3 class="fw-bold mb-0">{{ count($categories) }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="stats-icon bg-success">
                        <i class="bi bi-check-circle text-white"></i>
                    </div>
                    <div class="ms-3">
                        <p class="text-muted mb-0">Đang Hiển Thị</p>
                        <h3 class="fw-bold mb-0">{{ count($categories) }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="stats-icon bg-info">
                        <i class="bi bi-clock-history text-white"></i>
                    </div>
                    <div class="ms-3">
                        <p class="text-muted mb-0">Cập Nhật Gần Nhất</p>
                        <h3 class="fw-bold mb-0">Hôm nay</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Table Card -->
    <div class="main-card">
        <!-- Table Header -->
        <div class="table-header d-flex justify-content-between align-items-center p-4">
            <div>
                <h5 class="fw-semibold mb-0">Tất Cả Danh Mục</h5>
                <p class="text-muted small mb-0">Kéo để xem thêm</p>
            </div>
            <div class="d-flex gap-2">
                <div class="search-box">
                    <i class="bi bi-search"></i>
                    <input type="text" placeholder="Tìm kiếm danh mục..." id="searchInput">
                </div>
                <button class="btn btn-outline-secondary d-flex align-items-center gap-2">
                    <i class="bi bi-filter"></i>
                    Lọc
                </button>
            </div>
        </div>

        <!-- Table Content -->
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="categoryTable">
                <thead>
                    <tr>
                        <th class="ps-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="selectAll">
                            </div>
                        </th>
                        <th class="fw-semibold">TÊN DANH MỤC</th>
                        <th class="fw-semibold">SỐ SẢN PHẨM</th>
                        <th class="fw-semibold">TRẠNG THÁI</th>
                        <th class="fw-semibold text-end pe-4">THAO TÁC</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                    <tr class="category-item" data-index="{{ $index }}">
                        <td class="ps-4">
                            <div class="form-check">
                                <input class="form-check-input row-checkbox" type="checkbox">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="category-icon">
                                    <i class="bi bi-phone"></i>
                                </div>
                                <div>
                                    <h6 class="fw-semibold mb-0">{{ $category->category_name }}</h6>
                                    <p class="text-muted small mb-0">ID: {{ $category->category_id }}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark">0 sản phẩm</span>
                        </td>
                        <td>
                            <span class="status-badge active">Đang hiển thị</span>
                        </td>
                        <td class="text-end pe-4">
                            <div class="btn-group" role="group">
                                <a href="{{ url('admin/info-form/'.$category->category_id) }}" 
                                   class="btn btn-outline-primary btn-sm d-flex align-items-center gap-1">
                                    <i class="bi bi-pencil"></i>
                                    <span class="d-none d-md-inline">Sửa</span>
                                </a>
                                <a href="{{ url('admin/xoa-danh-muc/'.$category->category_id) }}" 
                                   class="btn btn-outline-danger btn-sm d-flex align-items-center gap-1 delete-btn"
                                   onclick="return confirm('Bạn có chắc muốn xóa danh mục này?')">
                                    <i class="bi bi-trash"></i>
                                    <span class="d-none d-md-inline">Xóa</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Table Footer -->
        <div class="table-footer d-flex justify-content-between align-items-center p-3">
            <div class="text-muted small">
                Hiển thị {{ count($categories) }} danh mục
            </div>
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-outline-danger btn-sm d-flex align-items-center gap-2" id="deleteSelected">
                    <i class="bi bi-trash"></i>
                    Xóa đã chọn
                </button>
            </div>
        </div>
    </div>

    <!-- Empty State (Hidden by default) -->
    @if(count($categories) == 0)
    <div class="text-center py-5">
        <div class="empty-state-icon">
            <i class="bi bi-inboxes"></i>
        </div>
        <h4 class="fw-semibold mt-3">Chưa có danh mục nào</h4>
        <p class="text-muted">Bắt đầu bằng cách thêm danh mục đầu tiên</p>
        <a href="{{ url('admin/insert-form') }}" class="btn btn-primary mt-2">
            <i class="bi bi-plus me-2"></i>
            Thêm danh mục đầu tiên
        </a>
    </div>
    @endif
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
/* ===== APPLE/MODERN STYLES ===== */
:root {
    --primary-color: #007AFF;
    --success-color: #34C759;
    --danger-color: #FF3B30;
    --warning-color: #FF9500;
    --dark-color: #1D1D1F;
    --light-bg: #F5F5F7;
    --border-color: #D1D1D6;
}

body {
    background-color: #F2F2F7;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
}

/* Stats Cards */
.stats-card {
    background: white;
    border-radius: 16px;
    padding: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    border: 1px solid #E5E5EA;
    transition: all 0.3s ease;
}

.stats-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
}

.stats-icon {
    width: 56px;
    height: 56px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

/* Main Card */
.main-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 24px rgba(0,0,0,0.06);
    border: 1px solid #E5E5EA;
}

.table-header {
    background: #F5F5F7;
    border-bottom: 1px solid #E5E5EA;
}

/* Search Box */
.search-box {
    position: relative;
    width: 280px;
}

.search-box i {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #8E8E93;
}

.search-box input {
    width: 100%;
    padding: 12px 16px 12px 44px;
    border: 1px solid #D1D1D6;
    border-radius: 12px;
    font-size: 14px;
    background: white;
    transition: all 0.3s ease;
}

.search-box input:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(0, 122, 255, 0.1);
}

/* Table Styles */
.table th {
    font-weight: 600;
    color: #1D1D1F;
    border-bottom: 2px solid #F2F2F7;
    padding: 20px 16px;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.table td {
    padding: 20px 16px;
    vertical-align: middle;
    border-bottom: 1px solid #F2F2F7;
}

.category-item:hover {
    background-color: #F8F8FA;
}

/* Category Icon */
.category-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #007AFF, #5856D6);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
}

/* Status Badge */
.status-badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    display: inline-block;
}

.status-badge.active {
    background: rgba(52, 199, 89, 0.1);
    color: var(--success-color);
}

.status-badge.inactive {
    background: rgba(255, 59, 48, 0.1);
    color: var(--danger-color);
}

/* Buttons */
.btn {
    border-radius: 12px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary-color), #5856D6);
    border: none;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 122, 255, 0.3);
}

.btn-outline-primary, .btn-outline-danger {
    border-width: 1.5px;
}

.btn-sm {
    padding: 8px 16px;
    font-size: 13px;
}

.btn-group {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.btn-group .btn {
    border-radius: 0;
    border-right: 1px solid #E5E5EA;
}

.btn-group .btn:last-child {
    border-right: none;
}

/* Checkbox Styling */
.form-check-input {
    width: 18px;
    height: 18px;
    border-radius: 6px;
    border: 2px solid #D1D1D6;
    cursor: pointer;
}

.form-check-input:checked {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
}

/* Table Footer */
.table-footer {
    background: #F5F5F7;
    border-top: 1px solid #E5E5EA;
}

/* Empty State */
.empty-state-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #F2F2F7, #E5E5EA);
    border-radius: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    color: #8E8E93;
    font-size: 2rem;
}

/* Loading Animation */
.loading-skeleton {
    animation: pulse 1.5s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    .table-header {
        flex-direction: column;
        gap: 16px;
        align-items: stretch;
    }
    
    .search-box {
        width: 100%;
    }
    
    .stats-card {
        text-align: center;
    }
    
    .stats-card .d-flex {
        flex-direction: column;
    }
    
    .stats-icon {
        margin: 0 auto 16px;
    }
    
    .btn-group {
        flex-direction: column;
    }
    
    .btn-group .btn {
        border-right: none;
        border-bottom: 1px solid #E5E5EA;
    }
    
    .btn-group .btn:last-child {
        border-bottom: none;
    }
}

@media (max-width: 576px) {
    .container-fluid {
        padding: 20px 16px;
    }
    
    .table td, .table th {
        padding: 12px 8px;
    }
    
    .category-icon {
        width: 32px;
        height: 32px;
        font-size: 1rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Select all checkbox
    const selectAll = document.getElementById('selectAll');
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');
    
    if (selectAll) {
        selectAll.addEventListener('change', function() {
            rowCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    }
    
    // Delete selected rows
    const deleteSelectedBtn = document.getElementById('deleteSelected');
    if (deleteSelectedBtn) {
        deleteSelectedBtn.addEventListener('click', function() {
            const selectedRows = Array.from(rowCheckboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.closest('tr'));
            
            if (selectedRows.length === 0) {
                alert('Vui lòng chọn ít nhất một danh mục để xóa');
                return;
            }
            
            if (confirm(`Bạn có chắc muốn xóa ${selectedRows.length} danh mục đã chọn?`)) {
                // Add loading state
                deleteSelectedBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Đang xóa...';
                deleteSelectedBtn.disabled = true;
                
                // Simulate deletion
                setTimeout(() => {
                    selectedRows.forEach(row => {
                        row.style.opacity = '0';
                        row.style.transform = 'translateX(-20px)';
                        setTimeout(() => row.remove(), 300);
                    });
                    
                    // Reset button
                    deleteSelectedBtn.innerHTML = '<i class="bi bi-trash"></i> Xóa đã chọn';
                    deleteSelectedBtn.disabled = false;
                    
                    // Update select all
                    selectAll.checked = false;
                }, 1000);
            }
        });
    }
    
    // Search functionality
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('.category-item');
            
            rows.forEach(row => {
                const categoryName = row.querySelector('h6').textContent.toLowerCase();
                if (categoryName.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
    
    // Row hover effects
    const rows = document.querySelectorAll('.category-item');
    rows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(4px)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
    
    // Delete confirmation
    const deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            if (!confirm('Bạn có chắc chắn muốn xóa danh mục này?')) {
                e.preventDefault();
            }
        });
    });
});
</script>

@include('admin/template/footer')