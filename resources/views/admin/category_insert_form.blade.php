@include('admin/template/header')

<div class="container-fluid py-5 category-create-page">
    <div class="row justify-content-center">
        <div class="col-xxl-10 col-xl-11">

            <!-- PAGE HEADER -->
            <div class="page-header mb-4 animate__animated animate__fadeInDown">
                <div class="header-glass d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-4">
                        <div class="header-icon">
                            <i class="bi bi-folder-plus"></i>
                        </div>
                        <div>
                            <h3 class="mb-1 fw-bold">Thêm danh mục mới</h3>
                            <p class="mb-0 text-muted">Tạo danh mục sản phẩm cho hệ thống</p>
                        </div>
                    </div>
                    <a href="{{ url('admin/danh-sach-danh-muc') }}" class="btn btn-back">
                        <i class="bi bi-arrow-left"></i> Quay lại
                    </a>
                </div>
            </div>

            <div class="row g-4">
                <!-- FORM -->
                <div class="col-lg-8">
                    <div class="card glass-card animate__animated animate__fadeInUp">
                        <div class="card-body p-5">
                            <span class="section-badge mb-4">
                                <i class="bi bi-info-circle"></i> Thông tin danh mục
                            </span>

                            <form action="{{ url('admin/insert-form') }}" method="post" id="addCategoryForm">
                                @csrf

                                <!-- NAME -->
                                <div class="form-group-modern mb-4">
                                    <label>Tên danh mục <span class="text-danger">*</span></label>
                                    <div class="input-modern">
                                        <i class="bi bi-tag"></i>
                                        <input type="text"
                                               name="category_name"
                                               id="category_name"
                                               placeholder="VD: iPhone, Laptop Gaming..."
                                               maxlength="100"
                                               required>
                                    </div>
                                    <small class="hint-text">
                                        <span id="charCount">0</span>/100 ký tự
                                    </small>
                                    <div class="invalid-feedback" id="nameError"></div>
                                </div>

                                <!-- TYPE -->
                                <div class="mb-4">
                                    <label class="fw-semibold mb-3 d-block">Loại danh mục</label>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <div class="type-card active" data-type="product">
                                                <i class="bi bi-phone"></i>
                                                <h6>Sản phẩm</h6>
                                                <p>Điện thoại, laptop</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="type-card" data-type="accessory">
                                                <i class="bi bi-headphones"></i>
                                                <h6>Phụ kiện</h6>
                                                <p>Tai nghe, sạc</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="type-card" data-type="other">
                                                <i class="bi bi-cpu"></i>
                                                <h6>Linh kiện</h6>
                                                <p>Pin, màn hình</p>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="category_type" id="category_type" value="product">
                                </div>

                                <!-- STATUS -->
                                <div class="mb-4">
                                    <label class="fw-semibold mb-2 d-block">Trạng thái</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="statusSwitch" checked>
                                        <label class="form-check-label">Đang hoạt động</label>
                                    </div>
                                </div>

                                <!-- ICON -->
                                <div class="mb-4">
                                    <label class="fw-semibold mb-3 d-block">Biểu tượng</label>
                                    <div class="icon-grid" id="iconGrid"></div>
                                    <input type="hidden" name="category_icon" id="category_icon" value="bi-phone">
                                </div>

                                <!-- ACTION -->
                                <div class="action-bar mt-5">
                                    <button class="btn btn-save">
                                        <i class="bi bi-plus-circle"></i> Tạo danh mục
                                    </button>
                                    <button type="reset" class="btn btn-back">
                                        <i class="bi bi-arrow-clockwise"></i> Làm mới
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- PREVIEW -->
                <div class="col-lg-4">
                    <div class="card glass-card sticky-top" style="top:20px">
                        <div class="card-body p-4">
                            <h6 class="fw-bold mb-3">
                                <i class="bi bi-eye text-primary"></i> Xem trước
                            </h6>

                            <div class="preview-box">
                                <i class="bi bi-phone preview-icon" id="previewIcon"></i>
                                <div>
                                    <strong id="previewName">Tên danh mục</strong>
                                    <small class="d-block text-muted" id="previewType">Sản phẩm</small>
                                </div>
                            </div>

                            <span class="badge bg-success mt-3" id="previewStatus">
                                <i class="bi bi-check-circle"></i> Hoạt động
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>
/* ================= GLOBAL ================= */
.category-create-page{
    background:linear-gradient(180deg,#f8fbff,#eef3ff);
    min-height:100vh;
    font-family:Inter,system-ui,sans-serif;
}

/* ================= HEADER ================= */
.header-glass{
    padding:24px 28px;
    border-radius:22px;
    background:rgba(255,255,255,.85);
    backdrop-filter:blur(16px);
    box-shadow:0 25px 60px rgba(0,0,0,.08);
}
.header-icon{
    width:64px;height:64px;
    border-radius:18px;
    background:linear-gradient(135deg,#2563eb,#60a5fa);
    color:#fff;
    font-size:28px;
    display:flex;align-items:center;justify-content:center;
}

/* ================= CARD ================= */
.glass-card{
    border:none;
    border-radius:26px;
    background:rgba(255,255,255,.9);
    backdrop-filter:blur(18px);
    box-shadow:0 35px 80px rgba(0,0,0,.12);
}

/* ================= SECTION ================= */
.section-badge{
    display:inline-flex;
    gap:10px;
    align-items:center;
    padding:10px 18px;
    border-radius:999px;
    background:linear-gradient(135deg,#e0ecff,#f0f5ff);
    color:#2563eb;
    font-weight:600;
}

/* ================= FORM ================= */
.form-group-modern label{font-weight:600;margin-bottom:8px}
.input-modern{position:relative}
.input-modern i{
    position:absolute;left:16px;top:50%;
    transform:translateY(-50%);
    color:#2563eb;
}
.input-modern input{
    width:100%;height:54px;
    padding:0 16px 0 44px;
    border-radius:16px;
    border:2px solid #e5e7eb;
}
.input-modern input:focus{
    outline:none;border-color:#2563eb;
    box-shadow:0 0 0 4px rgba(37,99,235,.15);
}
.hint-text{font-size:13px;color:#6b7280}

/* ================= TYPE ================= */
.type-card{
    text-align:center;
    padding:20px;
    border-radius:18px;
    border:2px solid #e5e7eb;
    cursor:pointer;
    transition:.3s;
}
.type-card i{font-size:28px;color:#2563eb}
.type-card.active,
.type-card:hover{
    border-color:#2563eb;
    background:linear-gradient(135deg,#eef4ff,#f8fbff);
    transform:translateY(-3px);
}

/* ================= ICON ================= */
.icon-grid{
    display:grid;
    grid-template-columns:repeat(6,1fr);
    gap:12px;
}
.icon-grid div{
    height:48px;
    border-radius:12px;
    border:2px solid #e5e7eb;
    display:flex;align-items:center;justify-content:center;
    cursor:pointer;
}
.icon-grid .active{
    background:#2563eb;
    color:#fff;
    border-color:#2563eb;
}

/* ================= ACTION ================= */
.action-bar{display:flex;gap:16px}
.btn-save{
    flex:1;height:54px;
    border-radius:16px;border:none;
    background:linear-gradient(135deg,#2563eb,#60a5fa);
    color:#fff;font-weight:600;
}
.btn-save:hover{
    transform:translateY(-2px);
    box-shadow:0 15px 40px rgba(37,99,235,.4);
}
.btn-back{
    flex:1;height:54px;
    border-radius:16px;
    border:2px solid #e5e7eb;
    background:#fff;
}

/* ================= PREVIEW ================= */
.preview-box{
    display:flex;gap:16px;
    align-items:center;
    padding:16px;
    border-radius:18px;
    background:#f8fafc;
}
.preview-icon{
    font-size:28px;
    color:#2563eb;
}
</style>

<script>
document.addEventListener('DOMContentLoaded',()=>{
    const name=document.getElementById('category_name');
    const charCount=document.getElementById('charCount');
    const previewName=document.getElementById('previewName');
    const previewType=document.getElementById('previewType');
    const previewIcon=document.getElementById('previewIcon');

    name.addEventListener('input',()=>{
        charCount.textContent=name.value.length;
        previewName.textContent=name.value||'Tên danh mục';
    });

    document.querySelectorAll('.type-card').forEach(card=>{
        card.onclick=()=>{
            document.querySelectorAll('.type-card').forEach(c=>c.classList.remove('active'));
            card.classList.add('active');
            previewType.textContent=card.querySelector('h6').textContent;
        }
    });

    const icons=['bi-phone','bi-laptop','bi-headphones','bi-cpu','bi-watch','bi-camera'];
    const grid=document.getElementById('iconGrid');
    icons.forEach(i=>{
        const d=document.createElement('div');
        d.innerHTML=`<i class="bi ${i}"></i>`;
        d.onclick=()=>{
            document.querySelectorAll('#iconGrid div').forEach(x=>x.classList.remove('active'));
            d.classList.add('active');
            previewIcon.className=`bi ${i} preview-icon`;
        };
        if(i==='bi-phone')d.classList.add('active');
        grid.appendChild(d);
    });
});
</script>

@include('admin/template/footer')
