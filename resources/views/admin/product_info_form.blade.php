@include('admin/template/header')

<div class="container-fluid px-4 py-5">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12">
            <!-- Apple Style Header -->
            <div class="d-flex align-items-center justify-content-between mb-5">
                <div class="d-flex align-items-center gap-3">
                    <div class="apple-icon-circle">
                        <i class="bi bi-phone-fill text-white"></i>
                    </div>
                    <div>
                        <h1 class="fw-bold mb-1 text-dark">Cập Nhật Sản Phẩm</h1>
                        <p class="text-muted mb-0">Chỉnh sửa thông tin chi tiết sản phẩm</p>
                    </div>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary d-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i>
                    <span class="d-none d-md-inline">Quay lại</span>
                </a>
            </div>

            <!-- Main Samsung Glass Card -->
            <div class="samsung-glass-card p-0">
                @foreach ($products as $product)
                <form action="/admin/xu-ly-cap-nhat-san-pham" method="post" enctype="multipart/form-data" class="p-5">
                    @csrf
                    
                    <div class="row g-4">
                        <!-- Left Column - Product Info -->
                        <div class="col-lg-7">
                            <!-- Product Name - Apple Style -->
                            <div class="form-section mb-4">
                                <label class="form-label apple-label">TÊN SẢN PHẨM</label>
                                <div class="input-group apple-input-group">
                                    <span class="input-group-text bg-transparent border-end-0">
                                        <i class="bi bi-tag-fill text-primary"></i>
                                    </span>
                                    <input type="text" 
                                           name="name" 
                                           class="form-control apple-input border-start-0 ps-2" 
                                           value="{{ $product->product_name }}" 
                                           placeholder="Ví dụ: iPhone 15 Pro Max 256GB"
                                           required>
                                </div>
                            </div>

                            <!-- Price - Samsung Style -->
                            <div class="form-section mb-4">
                                <label class="form-label apple-label">GIÁ BÁN (VNĐ)</label>
                                <div class="samsung-price-input">
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent border-end-0">
                                            <i class="bi bi-currency-dollar text-success"></i>
                                        </span>
                                        <input type="number" 
                                               name="price" 
                                               class="form-control samsung-input border-start-0" 
                                               value="{{ $product->product_price }}" 
                                               required>
                                        <span class="input-group-text bg-transparent border-start-0">VNĐ</span>
                                    </div>
                                    <div class="form-text text-muted mt-2">
                                        Giá chính thức của sản phẩm trên thị trường
                                    </div>
                                </div>
                            </div>

                            <!-- Category - Xiaomi Dropdown -->
                            <div class="form-section mb-4">
                                <label class="form-label apple-label">DANH MỤC</label>
                                <div class="xiaomi-select">
                                    <select name="category" class="form-select xiaomi-select-input" id="lcategory">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->category_id}}" {{ $category->category_id == $product->product_category ? 'selected' : '' }}>
                                                {{$category->category_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="select-arrow">
                                        <i class="bi bi-chevron-down"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Description - Realme Textarea -->
                            <div class="form-section mb-4">
                                <label class="form-label apple-label">MÔ TẢ SẢN PHẨM</label>
                                <div class="realme-textarea">
                                    <textarea name="description" 
                                              class="form-control realme-textarea-input" 
                                              rows="6"
                                              placeholder="Mô tả chi tiết về sản phẩm, tính năng, thông số kỹ thuật...">{{ $product->product_description }}</textarea>
                                    <div class="textarea-counter">
                                        <span id="charCount">0</span>/1000 ký tự
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - Image & Actions -->
                        <div class="col-lg-5">
                            <!-- Image Upload - Huawei Style -->
                            <div class="huawei-image-upload mb-4">
                                <label class="form-label apple-label mb-3">HÌNH ẢNH SẢN PHẨM</label>
                                
                                <!-- Current Image -->
                                <div class="current-image-section mb-4">
                                    <label class="form-label text-muted small mb-2">ẢNH HIỆN TẠI</label>
                                    <div class="image-preview">
                                        <img src="{{ asset($product->product_img) }}" 
                                             alt="Ảnh hiện tại" 
                                             class="current-image">
                                        <div class="image-overlay">
                                            <i class="bi bi-image"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- New Image Upload -->
                                <div class="upload-new-section">
                                    <label class="form-label text-muted small mb-2">TẢI ẢNH MỚI LÊN</label>
                                    <div class="upload-zone" id="uploadZone">
                                        <i class="bi bi-cloud-arrow-up upload-icon"></i>
                                        <p class="upload-text mb-2">Kéo thả ảnh hoặc click để chọn</p>
                                        <p class="upload-subtext text-muted small">PNG, JPG, WebP tối đa 5MB</p>
                                        <input type="file" 
                                               id="limg" 
                                               name="img" 
                                               class="upload-input"
                                               accept="image/*">
                                    </div>
                                    <div class="selected-file mt-3" id="selectedFile" style="display: none;">
                                        <div class="d-flex align-items-center justify-content-between bg-light rounded p-2">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="bi bi-file-image text-primary"></i>
                                                <span class="small" id="fileName"></span>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeFile()">
                                                <i class="bi bi-x"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <input type="hidden" name="img_old" value="{{ $product->product_img }}">
                            </div>

                            <!-- Specifications - Oppo Style -->
                            <div class="oppo-specs mb-4">
                                <label class="form-label apple-label mb-3">THÔNG SỐ KỸ THUẬT</label>
                                <div class="specs-grid">
                                    <div class="spec-item">
                                        <div class="spec-icon">
                                            <i class="bi bi-cpu"></i>
                                        </div>
                                        <input type="text" class="form-control spec-input" placeholder="CPU">
                                    </div>
                                    <div class="spec-item">
                                        <div class="spec-icon">
                                            <i class="bi bi-camera"></i>
                                        </div>
                                        <input type="text" class="form-control spec-input" placeholder="Camera">
                                    </div>
                                    <div class="spec-item">
                                        <div class="spec-icon">
                                            <i class="bi bi-battery-full"></i>
                                        </div>
                                        <input type="text" class="form-control spec-input" placeholder="Pin">
                                    </div>
                                    <div class="spec-item">
                                        <div class="spec-icon">
                                            <i class="bi bi-display"></i>
                                        </div>
                                        <input type="text" class="form-control spec-input" placeholder="Màn hình">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hidden ID -->
                    <input type="hidden" name="id" value="{{ $product->product_id }}">

                    <!-- Action Buttons - Vivo Style -->
                    <div class="action-buttons mt-5 pt-4 border-top">
                        <div class="d-flex justify-content-end gap-3">
                            <button type="reset" class="btn btn-outline-danger btn-lg d-flex align-items-center gap-2">
                                <i class="bi bi-arrow-clockwise"></i>
                                Đặt lại
                            </button>
                            <button type="submit" class="btn btn-primary btn-lg d-flex align-items-center gap-2 vivo-button">
                                <i class="bi bi-pencil-square"></i>
                                Cập Nhật Sản Phẩm
                            </button>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>

            <!-- Google Style Status Bar -->
            <div class="status-bar mt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        <div class="status-indicator success"></div>
                        <span class="text-muted small">Sẵn sàng cập nhật</span>
                    </div>
                    <div class="text-muted small">
                        Lần sửa cuối: {{ date('d/m/Y H:i') }}
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
    --apple-primary: #007AFF;
    --apple-gray: #F5F5F7;
    --apple-dark: #1D1D1F;
    --samsung-blue: #1428A0;
    --xiaomi-orange: #FF6B00;
    --huawei-red: #E60012;
    --realme-yellow: #FFD300;
    --oppo-green: #008B5E;
    --vivo-blue: #4A7BFF;
}

body {
    background-color: var(--apple-gray);
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Inter', sans-serif;
}

/* Apple Icon Circle */
.apple-icon-circle {
    width: 56px;
    height: 56px;
    background: linear-gradient(135deg, var(--apple-primary), #5856D6);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

/* Samsung Glass Card */
.samsung-glass-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 32px;
    border: 1px solid rgba(0, 0, 0, 0.08);
    box-shadow: 
        0 20px 60px rgba(0, 0, 0, 0.08),
        0 0 0 1px rgba(0, 0, 0, 0.03);
    overflow: hidden;
}

/* Form Labels */
.apple-label {
    font-size: 13px;
    font-weight: 600;
    color: var(--apple-dark);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 8px;
}

/* Apple Inputs */
.apple-input-group {
    background: var(--apple-gray);
    border-radius: 16px;
    border: 2px solid transparent;
    transition: all 0.3s ease;
}

.apple-input-group:focus-within {
    border-color: var(--apple-primary);
    background: white;
    box-shadow: 0 0 0 4px rgba(0, 122, 255, 0.1);
}

.apple-input {
    background: transparent;
    border: none !important;
    height: 56px;
    font-size: 16px;
    color: var(--apple-dark);
}

.apple-input:focus {
    box-shadow: none !important;
}

/* Samsung Price Input */
.samsung-price-input .input-group {
    background: white;
    border: 2px solid #E5E7EB;
    border-radius: 16px;
    overflow: hidden;
}

.samsung-price-input .input-group-text {
    color: #6B7280;
    font-weight: 500;
}

.samsung-input {
    border: none;
    height: 56px;
    font-size: 16px;
    font-weight: 600;
    color: var(--apple-dark);
}

.samsung-input:focus {
    box-shadow: none;
}

/* Xiaomi Select */
.xiaomi-select {
    position: relative;
}

.xiaomi-select-input {
    height: 56px;
    border-radius: 16px;
    border: 2px solid #E5E7EB;
    font-size: 16px;
    padding-right: 48px;
    background: white;
    cursor: pointer;
    appearance: none;
}

.xiaomi-select-input:focus {
    border-color: var(--xiaomi-orange);
    box-shadow: 0 0 0 4px rgba(255, 107, 0, 0.1);
}

.select-arrow {
    position: absolute;
    right: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #6B7280;
    pointer-events: none;
}

/* Realme Textarea */
.realme-textarea {
    position: relative;
}

.realme-textarea-input {
    min-height: 180px;
    border-radius: 16px;
    border: 2px solid #E5E7EB;
    padding: 16px;
    font-size: 15px;
    resize: vertical;
    background: white;
}

.realme-textarea-input:focus {
    border-color: var(--realme-yellow);
    box-shadow: 0 0 0 4px rgba(255, 211, 0, 0.1);
}

.textarea-counter {
    position: absolute;
    bottom: 12px;
    right: 12px;
    font-size: 12px;
    color: #6B7280;
    background: white;
    padding: 2px 8px;
    border-radius: 12px;
}

/* Huawei Image Upload */
.huawei-image-upload {
    background: white;
    border-radius: 24px;
    padding: 24px;
    border: 2px solid #E5E7EB;
}

.image-preview {
    position: relative;
    width: 100%;
    height: 200px;
    border-radius: 16px;
    overflow: hidden;
    background: var(--apple-gray);
}

.current-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 20px;
    background: white;
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, 
        rgba(230, 0, 18, 0.05) 0%, 
        rgba(230, 0, 18, 0) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--huawei-red);
    font-size: 3rem;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.image-preview:hover .image-overlay {
    opacity: 1;
}

.upload-zone {
    border: 2px dashed #D1D5DB;
    border-radius: 16px;
    padding: 40px 20px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    background: white;
    position: relative;
}

.upload-zone:hover {
    border-color: var(--huawei-red);
    background: rgba(230, 0, 18, 0.02);
}

.upload-icon {
    font-size: 48px;
    color: var(--huawei-red);
    margin-bottom: 12px;
}

.upload-text {
    font-weight: 500;
    color: var(--apple-dark);
}

.upload-subtext {
    font-size: 13px;
}

.upload-input {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    opacity: 0;
    cursor: pointer;
}

/* Oppo Specs Grid */
.oppo-specs {
    background: white;
    border-radius: 24px;
    padding: 24px;
    border: 2px solid #E5E7EB;
}

.specs-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
}

.spec-item {
    position: relative;
}

.spec-icon {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--oppo-green);
    font-size: 18px;
    z-index: 1;
}

.spec-input {
    height: 48px;
    border-radius: 12px;
    border: 2px solid #E5E7EB;
    padding-left: 40px;
    font-size: 14px;
    background: white;
}

.spec-input:focus {
    border-color: var(--oppo-green);
    box-shadow: 0 0 0 4px rgba(0, 139, 94, 0.1);
}

/* Vivo Button */
.vivo-button {
    background: linear-gradient(135deg, var(--vivo-blue), #6A93FF);
    border: none;
    border-radius: 16px;
    padding: 16px 32px;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 8px 24px rgba(74, 123, 255, 0.2);
}

.vivo-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 32px rgba(74, 123, 255, 0.3);
    background: linear-gradient(135deg, #6A93FF, var(--vivo-blue));
}

/* Status Bar */
.status-bar {
    background: white;
    border-radius: 16px;
    padding: 16px 24px;
    border: 1px solid #E5E7EB;
}

.status-indicator {
    width: 8px;
    height: 8px;
    border-radius: 50%;
}

.status-indicator.success {
    background: #10B981;
    box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
}

/* Responsive Design */
@media (max-width: 992px) {
    .samsung-glass-card {
        border-radius: 24px;
    }
    
    .huawei-image-upload,
    .oppo-specs {
        padding: 20px;
    }
    
    .image-preview {
        height: 180px;
    }
}

@media (max-width: 768px) {
    .container-fluid {
        padding: 20px;
    }
    
    .apple-icon-circle {
        width: 48px;
        height: 48px;
        font-size: 1.25rem;
    }
    
    h1 {
        font-size: 1.75rem;
    }
    
    .specs-grid {
        grid-template-columns: 1fr;
    }
    
    .action-buttons .btn {
        width: 100%;
        justify-content: center;
    }
    
    .action-buttons {
        flex-direction: column;
        gap: 12px;
    }
}

@media (max-width: 576px) {
    .samsung-glass-card {
        padding: 20px !important;
    }
    
    .upload-zone {
        padding: 30px 16px;
    }
    
    .upload-icon {
        font-size: 36px;
    }
    
    .apple-input,
    .samsung-input,
    .xiaomi-select-input {
        height: 48px;
        font-size: 15px;
    }
    
    .realme-textarea-input {
        min-height: 140px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Character counter for textarea
    const textarea = document.querySelector('.realme-textarea-input');
    const charCount = document.getElementById('charCount');
    
    if (textarea) {
        textarea.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });
        // Initial count
        charCount.textContent = textarea.value.length;
    }
    
    // File upload functionality
    const uploadZone = document.getElementById('uploadZone');
    const uploadInput = document.querySelector('.upload-input');
    const selectedFile = document.getElementById('selectedFile');
    const fileName = document.getElementById('fileName');
    
    if (uploadZone && uploadInput) {
        // Click zone to trigger file input
        uploadZone.addEventListener('click', function() {
            uploadInput.click();
        });
        
        // Handle file selection
        uploadInput.addEventListener('change', function(e) {
            if (this.files.length > 0) {
                const file = this.files[0];
                fileName.textContent = file.name;
                selectedFile.style.display = 'block';
                
                // Preview image if it's an image
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.querySelector('.current-image');
                        img.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        
        // Drag and drop
        uploadZone.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.borderColor = '#E60012';
            this.style.background = 'rgba(230, 0, 18, 0.05)';
        });
        
        uploadZone.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.style.borderColor = '#D1D5DB';
            this.style.background = 'white';
        });
        
        uploadZone.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.borderColor = '#D1D5DB';
            this.style.background = 'white';
            
            if (e.dataTransfer.files.length > 0) {
                uploadInput.files = e.dataTransfer.files;
                uploadInput.dispatchEvent(new Event('change'));
            }
        });
    }
    
    // Remove selected file
    window.removeFile = function() {
        const uploadInput = document.querySelector('.upload-input');
        uploadInput.value = '';
        selectedFile.style.display = 'none';
        
        // Reset to original image
        @foreach ($products as $product)
        const originalImg = "{{ asset($product->product_img) }}";
        const img = document.querySelector('.current-image');
        img.src = originalImg;
        @endforeach
    };
    
    // Form validation
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const productName = form.querySelector('input[name="name"]');
            const price = form.querySelector('input[name="price"]');
            
            if (!productName.value.trim()) {
                e.preventDefault();
                alert('Vui lòng nhập tên sản phẩm');
                productName.focus();
                return false;
            }
            
            if (!price.value || parseFloat(price.value) <= 0) {
                e.preventDefault();
                alert('Vui lòng nhập giá hợp lệ');
                price.focus();
                return false;
            }
            
            // Show loading state
            const submitBtn = form.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Đang cập nhật...';
            submitBtn.disabled = true;
        });
    }
    
    // Price formatting
    const priceInput = document.querySelector('input[name="price"]');
    if (priceInput) {
        priceInput.addEventListener('input', function() {
            let value = this.value.replace(/\D/g, '');
            if (value) {
                value = parseInt(value).toLocaleString('vi-VN');
                this.value = value;
            }
        });
    }
});
</script>

@include('admin/template/footer')