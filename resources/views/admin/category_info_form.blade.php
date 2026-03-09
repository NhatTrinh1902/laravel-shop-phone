@include('admin/template/header')

<div class="container-fluid py-5 category-edit-page">
    <div class="row justify-content-center">
        <div class="col-xxl-5 col-xl-6 col-lg-8">

            <!-- HEADER -->
            <div class="page-header mb-4 animate__animated animate__fadeInDown">
                <div class="header-glass d-flex align-items-center gap-4">
                    <div class="header-icon">
                        <i class="bi bi-folder2-open"></i>
                    </div>
                    <div>
                        <h3 class="mb-1 fw-bold text-dark">Chỉnh sửa danh mục</h3>
                        <p class="mb-0 text-muted">Quản lý và cập nhật danh mục sản phẩm</p>
                    </div>
                </div>
            </div>

            <!-- CARD -->
            <div class="card glass-card animate__animated animate__fadeInUp">
                <div class="card-body p-5">

                    <div class="section-title mb-4">
                        <span class="section-badge">
                            <i class="bi bi-info-circle"></i> Thông tin danh mục
                        </span>
                    </div>

                    <form action="{{ url('admin/info-form/'.$category->category_id) }}" 
                          method="post" 
                          id="editCategoryForm">
                        @csrf

                        <!-- INPUT -->
                        <div class="form-group-modern mb-4">
                            <label>Tên danh mục <span class="text-danger">*</span></label>

                            <div class="input-modern">
                                <i class="bi bi-tag"></i>
                                <input type="text"
                                       name="category_name"
                                       id="category_name"
                                       value="{{ $category->category_name }}"
                                       placeholder="Nhập tên danh mục..."
                                       required>
                            </div>

                            <div class="invalid-feedback" id="categoryError">
                                Vui lòng nhập tên danh mục
                            </div>

                            <small class="hint-text">
                                <i class="bi bi-lightbulb"></i>
                                Nên đặt tên ngắn gọn, dễ nhớ
                            </small>
                        </div>

                        <!-- ACTION -->
                        <div class="action-bar mt-5">
                            <button class="btn btn-save">
                                <i class="bi bi-check-circle"></i> Lưu thay đổi
                            </button>
                            <a href="{{ url('admin/danh-sach-danh-muc') }}" class="btn btn-back">
                                <i class="bi bi-arrow-left"></i> Quay lại
                            </a>
                        </div>

                        <!-- META -->
                        <div class="meta-info mt-4">
                            <div>
                                <i class="bi bi-clock-history"></i>
                                {{ now()->format('d/m/Y') }}
                            </div>
                            <div>
                                <i class="bi bi-hash"></i>
                                #{{ $category->category_id }}
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <!-- TIPS -->
            <div class="tips-card mt-4 animate__animated animate__fadeInUp">
                <div class="tips-body">
                    <i class="bi bi-stars"></i>
                    <div>
                        <h6>Mẹo quản lý</h6>
                        <ul>
                            <li>Không dùng ký tự đặc biệt</li>
                            <li>Tên hiển thị ngoài trang chủ</li>
                            <li>Dễ phân loại sản phẩm</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- TOAST -->
<div class="position-fixed bottom-0 end-0 p-4" style="z-index:9999">
    <div id="successToast" class="toast toast-glass">
        <div class="toast-body d-flex align-items-center gap-2">
            <i class="bi bi-check-circle"></i>
            <span id="toastMessage">Cập nhật thành công</span>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>
/* ================= GLOBAL ================= */
.category-edit-page{
    background: linear-gradient(180deg,#f8fbff,#eef3ff);
    min-height:100vh;
    font-family: Inter,system-ui,sans-serif;
}

/* ================= HEADER ================= */
.header-glass{
    padding:26px;
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
.form-group-modern label{
    font-weight:600;
    margin-bottom:8px;
}
.input-modern{
    position:relative;
}
.input-modern i{
    position:absolute;
    left:18px;
    top:50%;
    transform:translateY(-50%);
    color:#2563eb;
}
.input-modern input{
    width:100%;
    height:56px;
    padding:0 18px 0 48px;
    border-radius:16px;
    border:2px solid #e5e7eb;
    transition:.3s;
}
.input-modern input:focus{
    outline:none;
    border-color:#2563eb;
    box-shadow:0 0 0 4px rgba(37,99,235,.15);
}
.hint-text{
    color:#6b7280;
    margin-top:6px;
}

/* ================= ACTION ================= */
.action-bar{
    display:flex;
    gap:16px;
}
.btn-save{
    flex:1;
    height:54px;
    border-radius:16px;
    border:none;
    background:linear-gradient(135deg,#2563eb,#60a5fa);
    color:#fff;
    font-weight:600;
    transition:.3s;
}
.btn-save:hover{
    transform:translateY(-2px);
    box-shadow:0 15px 40px rgba(37,99,235,.4);
}
.btn-back{
    flex:1;
    height:54px;
    border-radius:16px;
    border:2px solid #e5e7eb;
    background:#fff;
    font-weight:600;
}

/* ================= META ================= */
.meta-info{
    display:flex;
    justify-content:space-between;
    color:#6b7280;
    font-size:14px;
}

/* ================= TIPS ================= */
.tips-card{
    background:linear-gradient(135deg,#eef4ff,#f8fbff);
    border-radius:22px;
    padding:22px;
}
.tips-body{
    display:flex;
    gap:16px;
}
.tips-body i{
    font-size:26px;
    color:#2563eb;
}

/* ================= TOAST ================= */
.toast-glass{
    border-radius:16px;
    background:rgba(37,99,235,.95);
    color:#fff;
    backdrop-filter:blur(12px);
}
</style>

<script>
document.addEventListener('DOMContentLoaded',()=>{
    const form=document.getElementById('editCategoryForm');
    const input=document.getElementById('category_name');
    const toast=new bootstrap.Toast(document.getElementById('successToast'));

    form.addEventListener('submit',e=>{
        if(!input.value.trim()){
            e.preventDefault();
            input.classList.add('is-invalid','animate__animated','animate__headShake');
            setTimeout(()=>input.classList.remove('animate__animated','animate__headShake'),800);
        }else{
            document.getElementById('toastMessage').textContent='Đang lưu thay đổi...';
            toast.show();
        }
    });
});
</script>

@include('admin/template/footer')
