@include('admin/template/header')

<div class="container-fluid px-4 py-5">
    <!-- Page Header -->
    <div class="page-header-section mb-5">
        <div class="row align-items-center">
            <div class="col-md-8">
                <nav class="breadcrumb-nav mb-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}"><i class="bi bi-house-door me-1"></i>Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Quản lý sản phẩm</li>
                    </ol>
                </nav>
                <div class="d-flex align-items-center">
                    <div class="header-icon-wrapper bg-primary bg-opacity-10 p-3 rounded-3 me-3">
                        <i class="bi bi-phone text-primary fs-4"></i>
                    </div>
                    <div>
                        <h1 class="display-6 fw-bold mb-2">Quản Lý Sản Phẩm</h1>
                        <p class="lead text-muted mb-0">Quản lý tất cả sản phẩm điện thoại và phụ kiện của Nhat Phone</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="them-san-pham" class="btn btn-primary btn-lg px-4 py-3 shadow-sm hover-lift">
                    <i class="bi bi-plus-circle me-2"></i>
                    <span class="fw-bold">Thêm Sản Phẩm</span>
                </a>
            </div>
        </div>
        
        <!-- Quick Stats -->
        <div class="quick-stats mt-4">
            <div class="row g-3">
                <div class="col-xl-2 col-md-4 col-6">
                    <div class="stat-card bg-white rounded-3 p-3 text-center">
                        <div class="stat-value text-primary fw-bold fs-3">{{ count($products) }}</div>
                        <div class="stat-label small text-muted">Tổng sản phẩm</div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-6">
                    <div class="stat-card bg-white rounded-3 p-3 text-center">
                        <div class="stat-value text-success fw-bold fs-3">
                            {{ number_format(collect($products)->avg('product_price') ?? 0, 0) }}₫
                        </div>
                        <div class="stat-label small text-muted">Giá trung bình</div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-6">
                    <div class="stat-card bg-white rounded-3 p-3 text-center">
                        <div class="stat-value text-info fw-bold fs-3">
                            {{ count(collect($products)->pluck('category_id')->unique()) }}
                        </div>
                        <div class="stat-label small text-muted">Danh mục</div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-6">
                    <div class="stat-card bg-white rounded-3 p-3 text-center">
                        <div class="stat-value text-warning fw-bold fs-3">0</div>
                        <div class="stat-label small text-muted">Đã bán hôm nay</div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-6">
                    <div class="stat-card bg-white rounded-3 p-3 text-center">
                        <div class="stat-value text-danger fw-bold fs-3">0</div>
                        <div class="stat-label small text-muted">Hết hàng</div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-6">
                    <div class="stat-card bg-white rounded-3 p-3 text-center">
                        <div class="stat-value text-purple fw-bold fs-3">0</div>
                        <div class="stat-label small text-muted">Đang giảm giá</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <div class="card-header bg-white py-4 px-5 border-bottom">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="fw-bold mb-0">Danh sách sản phẩm</h5>
                    <p class="text-muted small mb-0">Tổng cộng {{ count($products) }} sản phẩm</p>
                </div>
                <div class="col-md-6">
                    <div class="d-flex gap-3 justify-content-md-end">
                        <div class="search-wrapper position-relative flex-grow-1" style="max-width: 300px;">
                            <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                            <input type="text" 
                                   class="form-control ps-5" 
                                   placeholder="Tìm kiếm sản phẩm..." 
                                   id="productSearch">
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary d-flex align-items-center" type="button" 
                                    data-bs-toggle="dropdown">
                                <i class="bi bi-filter me-2"></i>
                                <span>Bộ lọc</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-filter="all">Tất cả sản phẩm</a></li>
                                <li><a class="dropdown-item" href="#" data-filter="in-stock">Còn hàng</a></li>
                                <li><a class="dropdown-item" href="#" data-filter="out-of-stock">Hết hàng</a></li>
                                <li><a class="dropdown-item" href="#" data-filter="featured">Nổi bật</a></li>
                                <li><a class="dropdown-item" href="#" data-filter="discount">Đang giảm giá</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#" data-filter="price-low">Giá: Thấp → Cao</a></li>
                                <li><a class="dropdown-item" href="#" data-filter="price-high">Giá: Cao → Thấp</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="productsTable">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-5" width="50">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="selectAll">
                                </div>
                            </th>
                            <th class="fw-bold text-uppercase small text-muted">Sản phẩm</th>
                            <th class="fw-bold text-uppercase small text-muted">Giá bán</th>
                            <th class="fw-bold text-uppercase small text-muted">Danh mục</th>
                            <th class="fw-bold text-uppercase small text-muted">Tồn kho</th>
                            <th class="fw-bold text-uppercase small text-muted">Trạng thái</th>
                            <th class="fw-bold text-uppercase small text-muted text-end pe-5">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr class="product-row" data-product-id="{{ $product->product_id }}">
                            <td class="ps-5">
                                <div class="form-check">
                                    <input class="form-check-input product-checkbox" type="checkbox" 
                                           value="{{ $product->product_id }}">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="product-thumbnail me-3">
                                        <img src="{{ asset($product->product_img) }}" 
                                             alt="{{ $product->product_name }}"
                                             class="rounded-3"
                                             style="width: 60px; height: 60px; object-fit: cover;">
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1">{{ $product->product_name }}</h6>
                                        <p class="text-muted small mb-0">ID: <code>{{ $product->product_id }}</code></p>
                                        <div class="product-tags mt-2">
                                            @if($loop->index < 3)
                                            <span class="badge bg-danger bg-opacity-10 text-danger me-1">Hot</span>
                                            @endif
                                            @if($product->product_price > 30000000)
                                            <span class="badge bg-primary bg-opacity-10 text-primary">Premium</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="price-display">
                                    <div class="fw-bold text-primary">
                                        {{ number_format($product->product_price, 0, ',', '.') }}₫
                                    </div>
                                    @if($product->product_price > 20000000)
                                    <small class="text-danger">
                                        <i class="bi bi-arrow-down me-1"></i>Giảm 15%
                                    </small>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">{{ $product->category_name }}</span>
                            </td>
                            <td>
                                <div class="stock-indicator">
                                    @php
                                        $stock = $product->product_price > 20000000 ? 5 : 25;
                                        $stockClass = $stock > 10 ? 'success' : ($stock > 0 ? 'warning' : 'danger');
                                    @endphp
                                    <span class="badge bg-{{ $stockClass }} bg-opacity-10 text-{{ $stockClass }} border border-{{ $stockClass }} border-opacity-25">
                                        {{ $stock }} sản phẩm
                                    </span>
                                </div>
                            </td>
                            <td>
                                @if($stock > 0)
                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 rounded-pill px-3 py-1">
                                    <i class="bi bi-check-circle me-1"></i>
                                    Đang bán
                                </span>
                                @else
                                <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 rounded-pill px-3 py-1">
                                    <i class="bi bi-x-circle me-1"></i>
                                    Hết hàng
                                </span>
                                @endif
                            </td>
                            <td class="text-end pe-5">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="thong-tin-san-pham/{{ $product->product_id }}" 
                                       class="btn btn-outline-primary rounded-start" 
                                       data-bs-toggle="tooltip" 
                                       title="Chỉnh sửa">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="#" 
                                       class="btn btn-outline-secondary" 
                                       data-bs-toggle="tooltip" 
                                       title="Xem chi tiết">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="xoa-san-pham/{{ $product->product_id }}" 
                                       class="btn btn-outline-danger rounded-end delete-product" 
                                       data-bs-toggle="tooltip" 
                                       title="Xóa"
                                       onclick="return confirmDelete(event, '{{ $product->product_name }}')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="empty-state">
                                    <div class="empty-icon mb-4">
                                        <i class="bi bi-box text-muted fs-1"></i>
                                    </div>
                                    <h5 class="fw-bold mb-3">Chưa có sản phẩm nào</h5>
                                    <p class="text-muted mb-4">Bắt đầu bằng cách thêm sản phẩm đầu tiên</p>
                                    <a href="them-san-pham" class="btn btn-primary">
                                        <i class="bi bi-plus-circle me-2"></i>
                                        Thêm sản phẩm đầu tiên
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white py-3 px-5 border-top">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="text-muted small">
                        Hiển thị <span id="visibleCount">{{ count($products) }}</span> trên {{ count($products) }} sản phẩm
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-md-end gap-2">
                        <button class="btn btn-outline-danger" id="deleteSelected" disabled>
                            <i class="bi bi-trash me-2"></i>
                            Xóa đã chọn (<span id="selectedCount">0</span>)
                        </button>
                        <button class="btn btn-outline-secondary" id="exportProducts">
                            <i class="bi bi-download me-2"></i>
                            Xuất Excel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bulk Actions Modal -->
    <div class="modal fade" id="bulkActionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold">Thao tác hàng loạt</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted mb-4" id="modalMessage">Bạn đã chọn <span id="selectedCountModal">0</span> sản phẩm</p>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <button class="btn btn-success w-100" id="activateSelected">
                                <i class="bi bi-check-circle me-2"></i>Kích hoạt
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-warning w-100" id="deactivateSelected">
                                <i class="bi bi-pause-circle me-2"></i>Tạm ẩn
                            </button>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-danger w-100" id="confirmDeleteSelected">
                                <i class="bi bi-trash me-2"></i>Xóa vĩnh viễn
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Panel -->
    <div class="quick-actions-panel mt-4">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="quick-action-card bg-white rounded-4 p-4 shadow-sm text-center">
                    <div class="action-icon bg-primary bg-opacity-10 p-3 rounded-3 mx-auto mb-3">
                        <i class="bi bi-arrow-clockwise text-primary fs-4"></i>
                    </div>
                    <h6 class="fw-bold mb-2">Cập nhật giá</h6>
                    <p class="text-muted small mb-0">Cập nhật giá đồng loạt nhiều sản phẩm</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="quick-action-card bg-white rounded-4 p-4 shadow-sm text-center">
                    <div class="action-icon bg-success bg-opacity-10 p-3 rounded-3 mx-auto mb-3">
                        <i class="bi bi-tags text-success fs-4"></i>
                    </div>
                    <h6 class="fw-bold mb-2">Thêm giảm giá</h6>
                    <p class="text-muted small mb-0">Áp dụng khuyến mãi cho nhiều sản phẩm</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="quick-action-card bg-white rounded-4 p-4 shadow-sm text-center">
                    <div class="action-icon bg-info bg-opacity-10 p-3 rounded-3 mx-auto mb-3">
                        <i class="bi bi-printer text-info fs-4"></i>
                    </div>
                    <h6 class="fw-bold mb-2">In mã vạch</h6>
                    <p class="text-muted small mb-0">In mã vạch cho sản phẩm được chọn</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="quick-action-card bg-white rounded-4 p-4 shadow-sm text-center">
                    <div class="action-icon bg-warning bg-opacity-10 p-3 rounded-3 mx-auto mb-3">
                        <i class="bi bi-shuffle text-warning fs-4"></i>
                    </div>
                    <h6 class="fw-bold mb-2">Chuyển danh mục</h6>
                    <p class="text-muted small mb-0">Di chuyển sản phẩm sang danh mục khác</p>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
:root {
    --nhat-primary: #0d6efd;
    --nhat-secondary: #6c757d;
    --nhat-success: #198754;
    --nhat-warning: #ffc107;
    --nhat-danger: #dc3545;
    --nhat-info: #0dcaf0;
    --nhat-light: #f8f9fa;
    --nhat-dark: #212529;
    --nhat-gradient: linear-gradient(135deg, #0d6efd 0%, #6610f2 100%);
}

/* Page Header */
.page-header-section {
    background: white;
    padding: 2rem;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
}

.breadcrumb-nav .breadcrumb {
    background: transparent;
    padding: 0;
    margin: 0;
}

.breadcrumb-item a {
    text-decoration: none;
    color: var(--nhat-primary);
}

.breadcrumb-item.active {
    color: var(--nhat-secondary);
}

.header-icon-wrapper {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Quick Stats */
.quick-stats .stat-card {
    border: 1px solid rgba(0,0,0,0.08);
    transition: all 0.3s ease;
}

.quick-stats .stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    border-color: var(--nhat-primary);
}

.stat-value {
    line-height: 1;
}

.text-purple {
    color: #6f42c1;
}

/* Main Card */
.card {
    border: none;
    border-radius: 16px;
    overflow: hidden;
}

.card-header {
    background: white;
    border-bottom: 2px solid var(--nhat-light);
}

/* Search Box */
.search-wrapper input {
    height: 48px;
    border-radius: 12px;
    border: 2px solid #dee2e6;
    padding-left: 2.5rem;
    transition: all 0.3s ease;
}

.search-wrapper input:focus {
    border-color: var(--nhat-primary);
    box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.15);
}

.search-wrapper i {
    z-index: 4;
}

/* Table Styles */
.table {
    margin-bottom: 0;
}

.table thead th {
    font-weight: 600;
    color: var(--nhat-dark);
    border-bottom: 2px solid var(--nhat-light);
    padding: 1rem 1.5rem;
}

.table tbody td {
    padding: 1.25rem 1.5rem;
    vertical-align: middle;
    border-bottom: 1px solid var(--nhat-light);
}

.table tbody tr:hover {
    background-color: rgba(13, 110, 253, 0.02);
}

/* Product Thumbnail */
.product-thumbnail {
    width: 60px;
    height: 60px;
    flex-shrink: 0;
    border-radius: 12px;
    overflow: hidden;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.product-row:hover .product-thumbnail {
    border-color: var(--nhat-primary);
    transform: scale(1.05);
}

.product-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Product Tags */
.product-tags .badge {
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    font-weight: 500;
}

/* Price Display */
.price-display .fw-bold {
    font-size: 1.1rem;
}

.price-display small {
    font-size: 0.85rem;
}

/* Stock Indicator */
.stock-indicator .badge {
    font-size: 0.85rem;
    padding: 0.375rem 0.75rem;
}

/* Badge Styles */
.badge {
    font-weight: 500;
    font-size: 0.85rem;
    padding: 0.5rem 1rem;
}

/* Buttons */
.btn {
    border-radius: 12px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-primary {
    background: var(--nhat-primary);
    border: none;
}

.btn-primary:hover {
    background: #0b5ed7;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(13, 110, 253, 0.3);
}

.btn-outline-primary, .btn-outline-secondary, .btn-outline-danger {
    border-width: 2px;
}

.btn-group .btn {
    border-radius: 0;
}

.btn-group .btn:first-child {
    border-top-left-radius: 8px;
    border-bottom-left-radius: 8px;
}

.btn-group .btn:last-child {
    border-top-right-radius: 8px;
    border-bottom-right-radius: 8px;
}

/* Hover Lift Effect */
.hover-lift {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
}

/* Quick Actions */
.quick-action-card {
    transition: all 0.3s ease;
    border: 1px solid rgba(0,0,0,0.08);
}

.quick-action-card:hover {
    transform: translateY(-5px);
    border-color: var(--nhat-primary);
}

.action-icon {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Empty State */
.empty-state {
    padding: 3rem 1rem;
}

.empty-icon {
    width: 80px;
    height: 80px;
    background: var(--nhat-light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

/* Modal */
.modal-content {
    border: none;
    box-shadow: 0 20px 60px rgba(0,0,0,0.2);
}

/* Form Check */
.form-check-input {
    width: 18px;
    height: 18px;
    border: 2px solid #dee2e6;
    cursor: pointer;
}

.form-check-input:checked {
    background-color: var(--nhat-primary);
    border-color: var(--nhat-primary);
}

.form-check-input:focus {
    box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.15);
}

/* Responsive */
@media (max-width: 768px) {
    .page-header-section {
        padding: 1.5rem;
    }
    
    .quick-stats .col-6 {
        margin-bottom: 1rem;
    }
    
    .card-header .row {
        flex-direction: column;
        gap: 1rem;
    }
    
    .search-wrapper {
        max-width: 100% !important;
    }
    
    .btn-group {
        flex-wrap: wrap;
    }
    
    .btn-group .btn {
        margin-bottom: 0.25rem;
    }
    
    .product-thumbnail {
        width: 50px;
        height: 50px;
    }
}

@media (max-width: 576px) {
    .container-fluid {
        padding: 1rem;
    }
    
    .table td, .table th {
        padding: 0.75rem;
    }
    
    .product-thumbnail {
        width: 40px;
        height: 40px;
    }
    
    .quick-actions-panel .col-md-6 {
        margin-bottom: 1rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectAllCheckbox = document.getElementById('selectAll');
    const productCheckboxes = document.querySelectorAll('.product-checkbox');
    const deleteSelectedBtn = document.getElementById('deleteSelected');
    const selectedCountSpan = document.getElementById('selectedCount');
    const visibleCountSpan = document.getElementById('visibleCount');
    const productSearch = document.getElementById('productSearch');
    const bulkActionModal = new bootstrap.Modal(document.getElementById('bulkActionModal'));
    const selectedCountModal = document.getElementById('selectedCountModal');
    
    // Tooltip initialization
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    
    // Select All functionality
    if (selectAllCheckbox) {
        selectAllCheckbox.addEventListener('change', function() {
            productCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            updateSelectedCount();
        });
    }
    
    // Update selected count
    function updateSelectedCount() {
        const selectedCount = document.querySelectorAll('.product-checkbox:checked').length;
        selectedCountSpan.textContent = selectedCount;
        selectedCountModal.textContent = selectedCount;
        
        // Enable/disable delete button
        deleteSelectedBtn.disabled = selectedCount === 0;
        
        // Update modal message
        const modalMessage = `Bạn đã chọn ${selectedCount} sản phẩm`;
        document.getElementById('modalMessage').textContent = modalMessage;
    }
    
    // Add event listeners to individual checkboxes
    productCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateSelectedCount);
    });
    
    // Bulk delete functionality
    deleteSelectedBtn.addEventListener('click', function() {
        const selectedCount = document.querySelectorAll('.product-checkbox:checked').length;
        if (selectedCount > 0) {
            bulkActionModal.show();
        }
    });
    
    // Search functionality
    if (productSearch) {
        productSearch.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('.product-row');
            let visibleCount = 0;
            
            rows.forEach(row => {
                const productName = row.querySelector('h6').textContent.toLowerCase();
                const productId = row.querySelector('code').textContent.toLowerCase();
                if (productName.includes(searchTerm) || productId.includes(searchTerm)) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });
            
            visibleCountSpan.textContent = visibleCount;
        });
    }
    
    // Filter functionality
    document.querySelectorAll('[data-filter]').forEach(filter => {
        filter.addEventListener('click', function(e) {
            e.preventDefault();
            const filterType = this.dataset.filter;
            const rows = document.querySelectorAll('.product-row');
            let visibleCount = 0;
            
            rows.forEach(row => {
                let showRow = true;
                
                switch(filterType) {
                    case 'in-stock':
                        const stockBadge = row.querySelector('.stock-indicator .badge');
                        if (stockBadge && stockBadge.classList.contains('bg-danger')) {
                            showRow = false;
                        }
                        break;
                    case 'out-of-stock':
                        const stockBadge2 = row.querySelector('.stock-indicator .badge');
                        if (stockBadge2 && !stockBadge2.classList.contains('bg-danger')) {
                            showRow = false;
                        }
                        break;
                    case 'price-low':
                        // Sort by price low to high
                        const rowsArray = Array.from(rows);
                        const tbody = document.querySelector('tbody');
                        rowsArray.sort((a, b) => {
                            const priceA = parseInt(a.querySelector('.price-display .fw-bold').textContent.replace(/[^0-9]/g, ''));
                            const priceB = parseInt(b.querySelector('.price-display .fw-bold').textContent.replace(/[^0-9]/g, ''));
                            return priceA - priceB;
                        });
                        rowsArray.forEach(row => tbody.appendChild(row));
                        return;
                    case 'price-high':
                        // Sort by price high to low
                        const rowsArray2 = Array.from(rows);
                        const tbody2 = document.querySelector('tbody');
                        rowsArray2.sort((a, b) => {
                            const priceA = parseInt(a.querySelector('.price-display .fw-bold').textContent.replace(/[^0-9]/g, ''));
                            const priceB = parseInt(b.querySelector('.price-display .fw-bold').textContent.replace(/[^0-9]/g, ''));
                            return priceB - priceA;
                        });
                        rowsArray2.forEach(row => tbody2.appendChild(row));
                        return;
                }
                
                if (showRow) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });
            
            visibleCountSpan.textContent = visibleCount;
        });
    });
    
    // Delete confirmation
    window.confirmDelete = function(event, productName) {
        if (!confirm(`Bạn có chắc chắn muốn xóa sản phẩm "${productName}"?`)) {
            event.preventDefault();
            return false;
        }
        return true;
    };
    
    // Bulk actions
    document.getElementById('confirmDeleteSelected').addEventListener('click', function() {
        const selectedProducts = Array.from(document.querySelectorAll('.product-checkbox:checked'))
            .map(cb => cb.value);
        
        if (selectedProducts.length === 0) {
            alert('Vui lòng chọn ít nhất một sản phẩm');
            return;
        }
        
        if (confirm(`Bạn có chắc muốn xóa ${selectedProducts.length} sản phẩm đã chọn?`)) {
            // Simulate deletion
            selectedProducts.forEach(id => {
                const row = document.querySelector(`.product-row[data-product-id="${id}"]`);
                if (row) {
                    row.style.transition = 'all 0.3s ease';
                    row.style.opacity = '0';
                    row.style.transform = 'translateX(-50px)';
                    
                    setTimeout(() => {
                        row.remove();
                        updateVisibleCount();
                    }, 300);
                }
            });
            
            bulkActionModal.hide();
            updateSelectedCount();
        }
    });
    
    // Update visible count after operations
    function updateVisibleCount() {
        const visibleRows = document.querySelectorAll('.product-row:not([style*="display: none"])').length;
        visibleCountSpan.textContent = visibleRows;
    }
    
    // Activate/Deactivate selected
    document.getElementById('activateSelected').addEventListener('click', function() {
        const selected = document.querySelectorAll('.product-checkbox:checked');
        selected.forEach(checkbox => {
            const row = checkbox.closest('tr');
            const badge = row.querySelector('.badge.bg-success');
            if (badge) {
                badge.className = 'badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 rounded-pill px-3 py-1';
                badge.innerHTML = '<i class="bi bi-check-circle me-1"></i>Đang bán';
            }
        });
        bulkActionModal.hide();
    });
    
    document.getElementById('deactivateSelected').addEventListener('click', function() {
        const selected = document.querySelectorAll('.product-checkbox:checked');
        selected.forEach(checkbox => {
            const row = checkbox.closest('tr');
            const badge = row.querySelector('.badge.bg-success');
            if (badge) {
                badge.className = 'badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 rounded-pill px-3 py-1';
                badge.innerHTML = '<i class="bi bi-x-circle me-1"></i>Hết hàng';
            }
        });
        bulkActionModal.hide();
    });
    
    // Export functionality
    document.getElementById('exportProducts').addEventListener('click', function() {
        this.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Đang xuất...';
        this.disabled = true;
        
        setTimeout(() => {
            alert('Xuất file Excel thành công!');
            this.innerHTML = '<i class="bi bi-download me-2"></i>Xuất Excel';
            this.disabled = false;
        }, 1500);
    });
    
    // Row hover effects
    const productRows = document.querySelectorAll('.product-row');
    productRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.backgroundColor = 'rgba(13, 110, 253, 0.03)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.backgroundColor = '';
        });
    });
    
    // Initialize counts
    updateSelectedCount();
    updateVisibleCount();
});
</script>

@include('admin/template/footer')