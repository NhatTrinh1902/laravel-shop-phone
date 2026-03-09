@include('admin/template/header')

<div class="container-fluid px-4 py-5">
    <!-- Page Header -->
    <div class="page-header-section mb-5">
        <div class="row align-items-center">
            <div class="col-md-8">
                <nav class="breadcrumb-nav mb-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}"><i class="bi bi-house-door me-1"></i>Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/danh-sach-san-pham') }}">Sản phẩm</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm mới</li>
                    </ol>
                </nav>
                <div class="d-flex align-items-center">
                    <div class="header-icon-wrapper bg-primary bg-opacity-10 p-3 rounded-3 me-3">
                        <i class="bi bi-plus-circle text-primary fs-4"></i>
                    </div>
                    <div>
                        <h1 class="display-6 fw-bold mb-2">Thêm Sản Phẩm Mới</h1>
                        <p class="lead text-muted mb-0">Thêm sản phẩm mới vào hệ thống Nhat Phone</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="{{ url('admin/danh-sach-san-pham') }}" class="btn btn-outline-secondary btn-lg">
                    <i class="bi bi-arrow-left me-2"></i>
                    Quay lại
                </a>
            </div>
        </div>
        
        <!-- Progress Steps -->
        <div class="progress-steps mt-4">
            <div class="d-flex align-items-center">
                <div class="step active">
                    <div class="step-icon">1</div>
                    <div class="step-label">Thông tin cơ bản</div>
                </div>
                <div class="step-divider"></div>
                <div class="step">
                    <div class="step-icon">2</div>
                    <div class="step-label">Hình ảnh & Mô tả</div>
                </div>
                <div class="step-divider"></div>
                <div class="step">
                    <div class="step-icon">3</div>
                    <div class="step-label">Xem trước & Hoàn tất</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Main Form Column -->
        <div class="col-lg-8">
            <!-- Basic Information Card -->
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-header bg-white py-4 border-bottom">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-info-circle text-primary me-2"></i>
                        Thông tin sản phẩm
                    </h5>
                </div>
                <div class="card-body p-5">
                    <form action="/admin/xu-ly-them-san-pham" method="post" enctype="multipart/form-data" id="addProductForm">
                        @csrf
                        
                        <!-- Product Name -->
                        <div class="form-group mb-5">
                            <label class="form-label fw-bold mb-3">
                                <i class="bi bi-tag text-primary me-2"></i>
                                Tên sản phẩm
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-card-heading text-primary"></i>
                                </span>
                                <input type="text" 
                                       id="fname"
                                       name="name" 
                                       class="form-control form-control-lg border-start-0 ps-3" 
                                       placeholder="Ví dụ: iPhone 15 Pro Max 256GB Chính hãng VN/A"
                                       required
                                       maxlength="200"
                                       autofocus>
                            </div>
                            <div class="form-text text-muted mt-2">
                                <i class="bi bi-lightbulb me-1"></i> Tên sản phẩm nên ngắn gọn, rõ ràng và chứa từ khóa chính
                            </div>
                            <div class="invalid-feedback mt-2" id="nameError">
                                Vui lòng nhập tên sản phẩm
                            </div>
                        </div>

                        <!-- Price & Category -->
                        <div class="row g-4 mb-5">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label fw-bold mb-3">
                                        <i class="bi bi-cash-coin text-primary me-2"></i>
                                        Giá bán (VNĐ)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-white border-end-0">
                                            <i class="bi bi-currency-dollar text-primary"></i>
                                        </span>
                                        <input type="number" 
                                               id="fprice"
                                               name="price" 
                                               class="form-control form-control-lg border-start-0 ps-3" 
                                               placeholder="0"
                                               required
                                               min="0"
                                               step="1000">
                                        <span class="input-group-text bg-white border-start-0">VNĐ</span>
                                    </div>
                                    <div class="form-text text-muted mt-2">
                                        <i class="bi bi-info-circle me-1"></i> Giá sẽ hiển thị cho khách hàng
                                    </div>
                                    <div class="price-preview mt-2">
                                        <span class="badge bg-light text-dark">
                                            <i class="bi bi-eye me-1"></i>
                                            Xem trước: <span id="formattedPrice">0 VNĐ</span>
                                        </span>
                                    </div>
                                    <div class="invalid-feedback mt-2" id="priceError">
                                        Vui lòng nhập giá hợp lệ
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label fw-bold mb-3">
                                        <i class="bi bi-grid-3x3-gap text-primary me-2"></i>
                                        Danh mục
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="category-select">
                                        <select name="category" class="form-select form-select-lg" id="lcategory" required>
                                            <option value="" selected disabled>Chọn danh mục...</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->category_id }}">
                                                    {{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="select-arrow">
                                            <i class="bi bi-chevron-down"></i>
                                        </div>
                                    </div>
                                    <div class="form-text text-muted mt-2">
                                        <i class="bi bi-tags me-1"></i> Chọn danh mục phù hợp cho sản phẩm
                                    </div>
                                    <div class="invalid-feedback mt-2" id="categoryError">
                                        Vui lòng chọn danh mục
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="form-group mb-5">
                            <label class="form-label fw-bold mb-3">
                                <i class="bi bi-card-text text-primary me-2"></i>
                                Mô tả sản phẩm
                            </label>
                            <div class="rich-text-editor">
                                <textarea name="description" 
                                          id="ldescription"
                                          class="form-control" 
                                          rows="8"
                                          placeholder="Mô tả chi tiết về sản phẩm, tính năng nổi bật, thông số kỹ thuật, phụ kiện đi kèm..."
                                          maxlength="2000"></textarea>
                                <div class="editor-toolbar mt-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="editor-actions">
                                            <button type="button" class="btn btn-sm btn-outline-secondary" data-format="bold">
                                                <i class="bi bi-type-bold"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary" data-format="italic">
                                                <i class="bi bi-type-italic"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary" data-format="list">
                                                <i class="bi bi-list-ul"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-primary" onclick="generateDescription()">
                                                <i class="bi bi-magic me-1"></i>Gợi ý
                                            </button>
                                        </div>
                                        <div class="char-counter">
                                            <span id="charCount">0</span>/2000 ký tự
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-text text-muted mt-2">
                                <i class="bi bi-info-circle me-1"></i> Mô tả chi tiết giúp khách hàng hiểu rõ hơn về sản phẩm
                            </div>
                        </div>

                        <!-- Image Upload -->
                        <div class="form-group">
                            <label class="form-label fw-bold mb-3">
                                <i class="bi bi-image text-primary me-2"></i>
                                Hình ảnh sản phẩm
                                <span class="text-danger">*</span>
                            </label>
                            
                            <!-- Image Preview -->
                            <div class="image-preview-container mb-4">
                                <div class="image-preview" id="imagePreview">
                                    <div class="preview-placeholder">
                                        <i class="bi bi-image text-muted fs-1"></i>
                                        <p class="text-muted mt-2 mb-0">Ảnh xem trước sẽ hiển thị ở đây</p>
                                    </div>
                                    <img src="" alt="Preview" class="preview-image" style="display: none;">
                                </div>
                                <div class="preview-actions mt-3">
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="clearImage()" style="display: none;" id="clearImageBtn">
                                        <i class="bi bi-trash me-1"></i>Xóa ảnh
                                    </button>
                                </div>
                            </div>

                            <!-- Upload Zone -->
                            <div class="upload-zone" id="uploadZone">
                                <div class="upload-content">
                                    <i class="bi bi-cloud-arrow-up-fill text-primary fs-1 mb-3"></i>
                                    <h6 class="mb-2">Kéo thả ảnh vào đây</h6>
                                    <p class="text-muted small mb-3">hoặc click để chọn file</p>
                                    <div class="upload-requirements">
                                        <span class="badge bg-light text-dark me-2">JPG</span>
                                        <span class="badge bg-light text-dark me-2">PNG</span>
                                        <span class="badge bg-light text-dark">WebP</span>
                                        <div class="mt-2">
                                            <small class="text-muted">Tối đa 5MB • Tối thiểu 800x800px</small>
                                        </div>
                                    </div>
                                </div>
                                <input type="file" 
                                       id="fimg" 
                                       name="img" 
                                       class="upload-input"
                                       accept="image/*"
                                       required>
                            </div>
                            
                            <!-- Upload Progress -->
                            <div class="upload-progress mt-3" style="display: none;" id="uploadProgress">
                                <div class="d-flex justify-content-between mb-2">
                                    <small>Đang tải lên...</small>
                                    <small id="progressPercent">0%</small>
                                </div>
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar" id="progressBar" style="width: 0%"></div>
                                </div>
                            </div>
                            
                            <!-- File Info -->
                            <div class="selected-file mt-3" id="selectedFile" style="display: none;">
                                <div class="alert alert-light d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-file-earmark-image text-primary fs-5 me-3"></i>
                                        <div>
                                            <div class="fw-medium" id="fileName"></div>
                                            <small class="text-muted" id="fileSize"></small>
                                        </div>
                                    </div>
                                    <div class="file-status">
                                        <span class="badge bg-success" id="fileStatus">Đã tải lên</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="invalid-feedback mt-2" id="imageError">
                                Vui lòng chọn ảnh sản phẩm
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Specifications Card -->
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-header bg-white py-4 border-bottom">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-gear text-primary me-2"></i>
                        Thông số kỹ thuật
                    </h5>
                </div>
                <div class="card-body p-5">
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-icon">
                                <i class="bi bi-cpu"></i>
                            </div>
                            <div class="spec-content">
                                <label class="form-label small fw-bold">Bộ xử lý</label>
                                <input type="text" class="form-control" placeholder="Ví dụ: Apple A17 Pro">
                            </div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-icon">
                                <i class="bi bi-display"></i>
                            </div>
                            <div class="spec-content">
                                <label class="form-label small fw-bold">Màn hình</label>
                                <input type="text" class="form-control" placeholder="Ví dụ: 6.7 inch Super Retina XDR">
                            </div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-icon">
                                <i class="bi bi-memory"></i>
                            </div>
                            <div class="spec-content">
                                <label class="form-label small fw-bold">RAM</label>
                                <input type="text" class="form-control" placeholder="Ví dụ: 8GB">
                            </div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-icon">
                                <i class="bi bi-device-ssd"></i>
                            </div>
                            <div class="spec-content">
                                <label class="form-label small fw-bold">Bộ nhớ</label>
                                <input type="text" class="form-control" placeholder="Ví dụ: 256GB">
                            </div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-icon">
                                <i class="bi bi-camera"></i>
                            </div>
                            <div class="spec-content">
                                <label class="form-label small fw-bold">Camera</label>
                                <input type="text" class="form-control" placeholder="Ví dụ: 48MP + 12MP + 12MP">
                            </div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-icon">
                                <i class="bi bi-battery-full"></i>
                            </div>
                            <div class="spec-content">
                                <label class="form-label small fw-bold">Pin</label>
                                <input type="text" class="form-control" placeholder="Ví dụ: 4441 mAh">
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="button" class="btn btn-outline-primary" onclick="addSpecField()">
                            <i class="bi bi-plus-circle me-2"></i>
                            Thêm thông số khác
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Column -->
        <div class="col-lg-4">
            <!-- Product Status Card -->
            <div class="card border-0 shadow-lg rounded-4 mb-4 sticky-top" style="top: 20px;">
                <div class="card-header bg-white py-4 border-bottom">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-toggle-on text-primary me-2"></i>
                        Trạng thái & Hiển thị
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="status-options mb-4">
                        <div class="form-check form-switch form-switch-lg mb-3">
                            <input class="form-check-input" type="checkbox" id="statusToggle" checked>
                            <label class="form-check-label fw-medium" for="statusToggle">
                                Hiển thị sản phẩm
                            </label>
                        </div>
                        <div class="form-check form-switch form-switch-lg mb-3">
                            <input class="form-check-input" type="checkbox" id="featuredToggle">
                            <label class="form-check-label fw-medium" for="featuredToggle">
                                Sản phẩm nổi bật
                            </label>
                        </div>
                        <div class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox" id="inStockToggle" checked>
                            <label class="form-check-label fw-medium" for="inStockToggle">
                                Còn hàng
                            </label>
                        </div>
                    </div>
                    
                    <!-- Stock Management -->
                    <div class="stock-management mb-4">
                        <label class="form-label fw-bold mb-3">Quản lý tồn kho</label>
                        <div class="input-group">
                            <button class="btn btn-outline-secondary" type="button" onclick="decreaseStock()">
                                <i class="bi bi-dash"></i>
                            </button>
                            <input type="number" 
                                   class="form-control text-center" 
                                   value="10"
                                   min="0"
                                   id="stockQuantity">
                            <button class="btn btn-outline-secondary" type="button" onclick="increaseStock()">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                        <div class="form-text text-muted mt-2">
                            Số lượng sản phẩm có sẵn trong kho
                        </div>
                    </div>
                    
                    <!-- SKU -->
                    <div class="sku-section">
                        <label class="form-label fw-bold mb-3">Mã sản phẩm (SKU)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <i class="bi bi-upc-scan text-primary"></i>
                            </span>
                            <input type="text" 
                                   class="form-control" 
                                   placeholder="Tự động tạo"
                                   id="skuInput"
                                   readonly>
                            <button class="btn btn-outline-primary" type="button" onclick="generateSKU()">
                                <i class="bi bi-arrow-repeat"></i>
                            </button>
                        </div>
                        <div class="form-text text-muted mt-2">
                            Mã duy nhất để quản lý sản phẩm
                        </div>
                    </div>
                </div>
            </div>

            <!-- Preview Card -->
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-header bg-white py-4 border-bottom">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-eye text-primary me-2"></i>
                        Xem trước
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="product-preview">
                        <div class="preview-image mb-3">
                            <div class="placeholder-image">
                                <i class="bi bi-phone text-muted fs-1"></i>
                            </div>
                        </div>
                        <div class="preview-info">
                            <h6 class="fw-bold mb-2" id="previewName">Tên sản phẩm</h6>
                            <div class="preview-price mb-2">
                                <span class="text-primary fw-bold" id="previewPrice">0 VNĐ</span>
                            </div>
                            <div class="preview-status">
                                <span class="badge bg-success">
                                    <i class="bi bi-check-circle me-1"></i> Còn hàng
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="updatePreview()">
                            <i class="bi bi-arrow-clockwise me-1"></i>
                            Cập nhật xem trước
                        </button>
                    </div>
                </div>
            </div>

            <!-- Action Card -->
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header bg-white py-4 border-bottom">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-lightning-charge text-primary me-2"></i>
                        Thao tác
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="action-buttons">
                        <button type="submit" form="addProductForm" class="btn btn-primary btn-lg w-100 mb-3">
                            <i class="bi bi-plus-circle me-2"></i>
                            Thêm sản phẩm
                        </button>
                        <button type="reset" form="addProductForm" class="btn btn-outline-secondary btn-lg w-100 mb-3">
                            <i class="bi bi-arrow-clockwise me-2"></i>
                            Đặt lại
                        </button>
                        <a href="{{ url('admin/danh-sach-san-pham') }}" class="btn btn-outline-danger btn-lg w-100">
                            <i class="bi bi-x-circle me-2"></i>
                            Hủy bỏ
                        </a>
                    </div>
                    
                    <div class="quick-info mt-4 pt-4 border-top">
                        <h6 class="fw-bold mb-3">Thông tin nhanh</h6>
                        <div class="info-grid">
                            <div class="info-item">
                                <i class="bi bi-clock text-muted me-2"></i>
                                <small>Thời gian tạo: <span class="fw-medium">Hôm nay</span></small>
                            </div>
                            <div class="info-item">
                                <i class="bi bi-person text-muted me-2"></i>
                                <small>Người thêm: <span class="fw-medium">Quản trị viên</span></small>
                            </div>
                            <div class="info-item">
                                <i class="bi bi-file-earmark-text text-muted me-2"></i>
                                <small>Loại: <span class="fw-medium">Sản phẩm mới</span></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Icons -->
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
    margin-bottom: 1rem;
}

.breadcrumb-item a {
    text-decoration: none;
    color: var(--nhat-primary);
}

.header-icon-wrapper {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Progress Steps */
.progress-steps {
    padding: 1rem 0;
}

.step {
    display: flex;
    flex-direction: column;
    align-items: center;
    flex: 1;
}

.step-icon {
    width: 40px;
    height: 40px;
    background: #e9ecef;
    color: var(--nhat-secondary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    margin-bottom: 0.5rem;
    transition: all 0.3s ease;
}

.step.active .step-icon {
    background: var(--nhat-primary);
    color: white;
    box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
}

.step-label {
    font-size: 0.9rem;
    font-weight: 500;
    color: var(--nhat-secondary);
    text-align: center;
}

.step.active .step-label {
    color: var(--nhat-primary);
    font-weight: 600;
}

.step-divider {
    flex: 1;
    height: 2px;
    background: #e9ecef;
    margin: 0 1rem;
    margin-top: 19px;
}

/* Card Styling */
.card {
    border: none;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.1) !important;
}

.rounded-4 {
    border-radius: 20px !important;
}

/* Form Elements */
.form-label {
    font-weight: 600;
    color: var(--nhat-dark);
}

.input-group-lg {
    border-radius: 12px;
    overflow: hidden;
}

.input-group-text {
    background: white;
    border: 2px solid #dee2e6;
    border-right: none;
}

.form-control {
    border: 2px solid #dee2e6;
    border-radius: 12px;
    padding: 0.875rem 1rem;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: var(--nhat-primary);
    box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.15);
}

.form-control-lg {
    padding: 1rem 1.25rem;
    font-size: 1.05rem;
}

.form-select-lg {
    padding: 1rem 3rem 1rem 1.25rem;
    font-size: 1.05rem;
    border-radius: 12px;
    border: 2px solid #dee2e6;
    background-image: none;
}

.category-select {
    position: relative;
}

.select-arrow {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--nhat-secondary);
    pointer-events: none;
}

/* Rich Text Editor */
.rich-text-editor {
    border: 2px solid #dee2e6;
    border-radius: 12px;
    overflow: hidden;
}

.rich-text-editor textarea {
    border: none;
    resize: vertical;
    min-height: 200px;
    padding: 1.25rem;
}

.rich-text-editor textarea:focus {
    box-shadow: none;
}

.editor-toolbar {
    background: var(--nhat-light);
    padding: 0.75rem 1.25rem;
    border-top: 1px solid #dee2e6;
}

.char-counter {
    font-size: 0.85rem;
    color: var(--nhat-secondary);
}

/* Image Upload */
.image-preview-container {
    position: relative;
}

.image-preview {
    width: 100%;
    aspect-ratio: 16/9;
    background: var(--nhat-light);
    border: 2px dashed #dee2e6;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.preview-placeholder {
    text-align: center;
    color: var(--nhat-secondary);
}

.preview-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 1rem;
    background: white;
}

.upload-zone {
    border: 2px dashed #adb5bd;
    border-radius: 12px;
    padding: 2.5rem 1rem;
    text-align: center;
    background: var(--nhat-light);
    position: relative;
    cursor: pointer;
    transition: all 0.3s ease;
}

.upload-zone:hover {
    border-color: var(--nhat-primary);
    background: rgba(13, 110, 253, 0.05);
}

.upload-content {
    pointer-events: none;
}

.upload-input {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
}

/* Specifications Grid */
.specs-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.25rem;
}

@media (max-width: 768px) {
    .specs-grid {
        grid-template-columns: 1fr;
    }
}

.spec-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: var(--nhat-light);
    border-radius: 12px;
    border: 1px solid #dee2e6;
    transition: all 0.3s ease;
}

.spec-item:hover {
    border-color: var(--nhat-primary);
    background: rgba(13, 110, 253, 0.03);
}

.spec-icon {
    width: 40px;
    height: 40px;
    background: var(--nhat-primary);
    color: white;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}

.spec-content {
    flex: 1;
}

.spec-content .form-control {
    border: 1px solid #dee2e6;
    padding: 0.5rem 0.75rem;
    font-size: 0.95rem;
}

/* Toggle Switches */
.form-switch-lg .form-check-input {
    width: 3.5rem;
    height: 1.75rem;
    margin-right: 0.75rem;
}

.form-switch-lg .form-check-input:checked {
    background-color: var(--nhat-success);
    border-color: var(--nhat-success);
}

/* Stock Management */
.stock-management .input-group {
    border-radius: 12px;
    overflow: hidden;
}

.stock-management .btn {
    width: 48px;
    background: white;
    border: 2px solid #dee2e6;
}

.stock-management .form-control {
    border-left: none;
    border-right: none;
    text-align: center;
    font-weight: 600;
}

/* Product Preview */
.product-preview {
    background: var(--nhat-light);
    border-radius: 12px;
    padding: 1.5rem;
    text-align: center;
}

.placeholder-image {
    width: 120px;
    height: 120px;
    background: white;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    border: 2px solid #dee2e6;
}

/* Buttons */
.btn {
    border-radius: 12px;
    font-weight: 500;
    padding: 0.875rem 1.5rem;
    transition: all 0.3s ease;
}

.btn-lg {
    padding: 1rem 1.75rem;
    font-size: 1.1rem;
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

.btn-outline-secondary:hover {
    background: #f8f9fa;
    border-color: #adb5bd;
    transform: translateY(-2px);
}

.btn-outline-danger:hover {
    background: #f8d7da;
    transform: translateY(-2px);
}

/* Action Buttons */
.action-buttons .btn {
    margin-bottom: 0.75rem;
}

/* Quick Info */
.quick-info {
    font-size: 0.9rem;
}

.info-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 0.75rem;
}

.info-item {
    display: flex;
    align-items: center;
}

/* Invalid State */
.invalid-feedback {
    display: none;
    font-size: 0.875rem;
    color: var(--nhat-danger);
}

.is-invalid {
    border-color: var(--nhat-danger) !important;
}

.is-invalid:focus {
    box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.15) !important;
}

/* Price Preview */
.price-preview .badge {
    font-size: 0.9rem;
    padding: 0.5rem 1rem;
}

/* Responsive Design */
@media (max-width: 992px) {
    .page-header-section {
        padding: 1.5rem;
    }
    
    .card-body {
        padding: 1.5rem !important;
    }
    
    .header-icon-wrapper {
        width: 50px;
        height: 50px;
    }
}

@media (max-width: 768px) {
    .container-fluid {
        padding: 1rem;
    }
    
    .step-divider {
        display: none;
    }
    
    .step {
        margin-bottom: 1rem;
    }
    
    .image-preview {
        aspect-ratio: 16/9;
    }
    
    .upload-zone {
        padding: 2rem 1rem;
    }
}

@media (max-width: 576px) {
    .page-header-section {
        padding: 1rem;
    }
    
    .form-control-lg,
    .form-select-lg {
        padding: 0.875rem 1rem;
        font-size: 1rem;
    }
    
    .btn-lg {
        padding: 0.875rem 1rem;
        font-size: 1rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize preview
    updatePreview();
    
    // Price formatting
    const priceInput = document.getElementById('fprice');
    const formattedPrice = document.getElementById('formattedPrice');
    const previewPrice = document.getElementById('previewPrice');
    
    function formatPrice(value) {
        return new Intl.NumberFormat('vi-VN').format(value) + ' VNĐ';
    }
    
    if (priceInput && formattedPrice && previewPrice) {
        priceInput.addEventListener('input', function() {
            const value = this.value.replace(/\D/g, '');
            formattedPrice.textContent = formatPrice(value || 0);
            previewPrice.textContent = formatPrice(value || 0);
        });
        
        // Initial formatting
        formattedPrice.textContent = formatPrice(0);
        previewPrice.textContent = formatPrice(0);
    }
    
    // Character counter
    const descriptionTextarea = document.getElementById('ldescription');
    const charCount = document.getElementById('charCount');
    
    if (descriptionTextarea && charCount) {
        descriptionTextarea.addEventListener('input', function() {
            const length = this.value.length;
            charCount.textContent = length;
            
            // Update color based on length
            if (length > 1800) {
                charCount.style.color = '#dc3545';
            } else if (length > 1500) {
                charCount.style.color = '#ffc107';
            } else {
                charCount.style.color = '#198754';
            }
        });
        
        // Initial count
        charCount.textContent = descriptionTextarea.value.length;
    }
    
    // Product name preview
    const productNameInput = document.getElementById('fname');
    const previewName = document.getElementById('previewName');
    
    if (productNameInput && previewName) {
        productNameInput.addEventListener('input', function() {
            previewName.textContent = this.value || 'Tên sản phẩm';
        });
    }
    
    // Image upload handling
    const fileInput = document.getElementById('fimg');
    const imagePreview = document.getElementById('imagePreview');
    const previewImage = imagePreview.querySelector('.preview-image');
    const previewPlaceholder = imagePreview.querySelector('.preview-placeholder');
    const clearImageBtn = document.getElementById('clearImageBtn');
    
    function handleImageUpload(event) {
        const file = event.target.files[0];
        if (!file) return;
        
        // Validate file type
        const validTypes = ['image/jpeg', 'image/png', 'image/webp'];
        if (!validTypes.includes(file.type)) {
            alert('Vui lòng chọn file ảnh (JPG, PNG, WebP)');
            return;
        }
        
        // Validate file size (5MB)
        if (file.size > 5 * 1024 * 1024) {
            alert('File ảnh không được vượt quá 5MB');
            return;
        }
        
        // Show selected file info
        document.getElementById('fileName').textContent = file.name;
        document.getElementById('fileSize').textContent = formatFileSize(file.size);
        document.getElementById('selectedFile').style.display = 'block';
        
        // Show progress bar
        const progressBar = document.getElementById('progressBar');
        const progressPercent = document.getElementById('progressPercent');
        const uploadProgress = document.getElementById('uploadProgress');
        
        uploadProgress.style.display = 'block';
        
        // Simulate upload progress
        let progress = 0;
        const interval = setInterval(() => {
            progress += 10;
            progressBar.style.width = progress + '%';
            progressPercent.textContent = progress + '%';
            
            if (progress >= 100) {
                clearInterval(interval);
                
                // Hide progress after 1 second
                setTimeout(() => {
                    uploadProgress.style.display = 'none';
                    document.getElementById('fileStatus').textContent = 'Đã tải lên';
                }, 1000);
                
                // Preview image
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                    previewPlaceholder.style.display = 'none';
                    clearImageBtn.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }, 200);
    }
    
    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }
    
    // Set up file input event listener
    if (fileInput) {
        fileInput.addEventListener('change', handleImageUpload);
    }
    
    // Clear image function
    window.clearImage = function() {
        fileInput.value = '';
        previewImage.style.display = 'none';
        previewPlaceholder.style.display = 'flex';
        clearImageBtn.style.display = 'none';
        document.getElementById('selectedFile').style.display = 'none';
    };
    
    // Drag and drop for upload zone
    const uploadZone = document.getElementById('uploadZone');
    if (uploadZone) {
        uploadZone.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.borderColor = 'var(--nhat-primary)';
            this.style.background = 'rgba(13, 110, 253, 0.1)';
        });
        
        uploadZone.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.style.borderColor = '#adb5bd';
            this.style.background = 'var(--nhat-light)';
        });
        
        uploadZone.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.borderColor = '#adb5bd';
            this.style.background = 'var(--nhat-light)';
            
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files;
                fileInput.dispatchEvent(new Event('change'));
            }
        });
    }
    
    // Stock management
    const stockQuantity = document.getElementById('stockQuantity');
    
    window.increaseStock = function() {
        stockQuantity.value = parseInt(stockQuantity.value) + 1;
    };
    
    window.decreaseStock = function() {
        const currentValue = parseInt(stockQuantity.value);
        if (currentValue > 0) {
            stockQuantity.value = currentValue - 1;
        }
    };
    
    // SKU generation
    window.generateSKU = function() {
        const prefix = 'NP';
        const timestamp = Date.now().toString().slice(-6);
        const random = Math.floor(Math.random() * 1000).toString().padStart(3, '0');
        const sku = `${prefix}-${timestamp}-${random}`;
        document.getElementById('skuInput').value = sku;
    };
    
    // Generate initial SKU
    generateSKU();
    
    // Description generation
    window.generateDescription = function() {
        const productName = document.getElementById('fname').value;
        const categorySelect = document.getElementById('lcategory');
        const selectedCategory = categorySelect.options[categorySelect.selectedIndex]?.text || 'sản phẩm';
        
        const descriptions = [
            `🏆 ${productName || 'Sản phẩm'} - Chính hãng 100%, bảo hành dài hạn`,
            `✨ ${productName || 'Sản phẩm'} với thiết kế hiện đại, sang trọng`,
            `🚀 ${productName || 'Sản phẩm'} - Hiệu năng vượt trội, trải nghiệm mượt mà`
        ];
        
        const randomDesc = descriptions[Math.floor(Math.random() * descriptions.length)];
        
        let description = `${randomDesc}\n\n`;
        description += `📱 Thông số kỹ thuật:\n`;
        description += `• Loại sản phẩm: ${selectedCategory}\n`;
        description += `• Tình trạng: Mới 100%\n`;
        description += `• Bảo hành: 12 tháng chính hãng\n`;
        description += `• Phụ kiện đi kèm: Đầy đủ\n\n`;
        description += `🎯 Tính năng nổi bật:\n`;
        description += `• Thiết kế cao cấp, sang trọng\n`;
        description += `• Hiệu năng mạnh mẽ, ổn định\n`;
        description += `• Hỗ trợ đầy đủ các tính năng hiện đại\n`;
        description += `• Trải nghiệm sử dụng tuyệt vời\n\n`;
        description += `📦 Chính sách bán hàng:\n`;
        description += `• Miễn phí giao hàng toàn quốc\n`;
        description += `• Đổi trả trong 30 ngày nếu lỗi\n`;
        description += `• Hỗ trợ kỹ thuật 24/7\n`;
        description += `• Thanh toán linh hoạt\n\n`;
        description += `🏪 Nhat Phone - Đối tác tin cậy của bạn!\n`;
        description += `Hotline: 1900 1234 - Website: nhatphone.vn`;
        
        descriptionTextarea.value = description;
        descriptionTextarea.dispatchEvent(new Event('input'));
    };
    
    // Add specification field
    window.addSpecField = function() {
        const specsGrid = document.querySelector('.specs-grid');
        const newSpec = document.createElement('div');
        newSpec.className = 'spec-item';
        newSpec.innerHTML = `
            <div class="spec-icon">
                <i class="bi bi-plus-circle"></i>
            </div>
            <div class="spec-content">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tên thông số">
                    <input type="text" class="form-control" placeholder="Giá trị">
                </div>
            </div>
        `;
        specsGrid.appendChild(newSpec);
    };
    
    // Update preview function
    window.updatePreview = function() {
        // This function would update the preview based on form values
        console.log('Preview updated');
    };
    
    // Form validation
    const form = document.getElementById('addProductForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const productName = document.getElementById('fname');
            const price = document.getElementById('fprice');
            const category = document.getElementById('lcategory');
            const image = document.getElementById('fimg');
            
            let isValid = true;
            
            // Validate product name
            if (!productName.value.trim()) {
                showError('nameError', 'Vui lòng nhập tên sản phẩm');
                productName.classList.add('is-invalid');
                isValid = false;
            } else {
                hideError('nameError');
                productName.classList.remove('is-invalid');
            }
            
            // Validate price
            if (!price.value || parseFloat(price.value) <= 0) {
                showError('priceError', 'Vui lòng nhập giá hợp lệ');
                price.classList.add('is-invalid');
                isValid = false;
            } else {
                hideError('priceError');
                price.classList.remove('is-invalid');
            }
            
            // Validate category
            if (!category.value) {
                showError('categoryError', 'Vui lòng chọn danh mục');
                category.classList.add('is-invalid');
                isValid = false;
            } else {
                hideError('categoryError');
                category.classList.remove('is-invalid');
            }
            
            // Validate image
            if (!image.files || image.files.length === 0) {
                showError('imageError', 'Vui lòng chọn ảnh sản phẩm');
                image.classList.add('is-invalid');
                isValid = false;
            } else {
                hideError('imageError');
                image.classList.remove('is-invalid');
            }
            
            if (isValid) {
                // Show loading state
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                
                submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Đang thêm sản phẩm...';
                submitBtn.disabled = true;
                
                // Simulate form submission
                setTimeout(() => {
                    // In production, this would be actual form submission
                    alert('Sản phẩm đã được thêm thành công!');
                    form.reset();
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    clearImage();
                }, 2000);
            }
        });
    }
    
    function showError(elementId, message) {
        const element = document.getElementById(elementId);
        element.textContent = message;
        element.style.display = 'block';
    }
    
    function hideError(elementId) {
        const element = document.getElementById(elementId);
        element.style.display = 'none';
    }
    
    // Remove error on input
    const inputs = form.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        input.addEventListener('input', function() {
            this.classList.remove('is-invalid');
            const errorId = this.id.replace('f', '').replace('l', '') + 'Error';
            hideError(errorId);
        });
    });
});
</script>

@include('admin/template/footer')