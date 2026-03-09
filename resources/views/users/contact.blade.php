@extends('layouts.user')

@section('content')
<div class="nh-contact-dark">

    <!-- HERO -->
    <section class="nh-hero">
        <div class="hero-inner">
            <h1>
                <span class="brand">NHAT PHONE</span>
                <span class="title">LIÊN HỆ</span>
            </h1>
            <p>Uy tín – Nhanh chóng – Hỗ trợ tận tâm 24/7</p>
        </div>
    </section>

    <div class="container">

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <div class="contact-grid">

            <!-- FORM -->
            <div class="contact-form">
                <h2>GỬI YÊU CẦU HỖ TRỢ</h2>

                <form method="POST" action="{{ route('users.contact.submit') }}" id="contactForm">
                    @csrf

                    <div class="form-group">
                        <label>Họ và tên *</label>
                        <input type="text" name="name" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="tel" name="phone">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Loại yêu cầu *</label>
                        <select name="topic" required>
                            <option value="">-- Chọn --</option>
                            <option>Bán hàng</option>
                            <option>Bảo hành</option>
                            <option>Kỹ thuật</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nội dung *</label>
                        <textarea name="message" rows="4" required></textarea>
                    </div>

                    <label class="agree">
                        <input type="checkbox" id="agreement" required>
                        Tôi đồng ý với điều khoản dịch vụ
                    </label>

                    <button class="btn-red" id="submitBtn">
                        GỬI LIÊN HỆ
                    </button>
                </form>
            </div>

            <!-- INFO -->
            <div class="contact-info">

                <div class="info-box">
                    <h4>Hotline</h4>
                    <a href="tel:0363565822">0363 565 822</a>
                </div>

                <div class="info-box">
                    <h4>Email</h4>
                    <a href="mailto:support@nhatphone.vn">support@nhatphone.vn</a>
                </div>

                <div class="info-box">
                    <h4>Cửa hàng</h4>
                    <p>Ấp Lạc An, xã Thường Tân</p>
                    <p>8:00 – 22:00</p>

                    <iframe
                        src="https://www.google.com/maps?q=Thường Tân, Bình Dương&output=embed"
                        loading="lazy">
                    </iframe>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
/* ===== DARK RED THEME ===== */
:root{
    --red:#dc2626;
    --red-dark:#991b1b;
    --black:#0b0b0f;
    --gray:#9ca3af;
    --border:#27272a;
}

.nh-contact-dark{
    background:radial-gradient(circle at top,#1a0000,#000);
    min-height:100vh;
    color:#fff;
    font-family:'Inter',sans-serif;
}

/* HERO */
.nh-hero{
    padding:80px 20px 50px;
    text-align:center;
    background:linear-gradient(180deg,#150000,#000);
    border-bottom:1px solid var(--border);
}
.nh-hero h1{
    font-size:3rem;
    font-weight:900;
}
.brand{
    display:block;
    color:var(--red);
    letter-spacing:2px;
}
.title{
    color:#fff;
}
.nh-hero p{
    color:var(--gray);
    margin-top:10px;
}

/* LAYOUT */
.container{
    max-width:1200px;
    margin:auto;
    padding:40px 20px;
}
.contact-grid{
    display:grid;
    grid-template-columns:1.1fr .9fr;
    gap:30px;
}

/* FORM */
.contact-form{
    background:rgba(15,15,20,.95);
    border:1px solid var(--border);
    border-radius:16px;
    padding:30px;
}
.contact-form h2{
    color:var(--red);
    margin-bottom:20px;
}

.form-group{
    margin-bottom:16px;
}
.form-group label{
    font-size:.9rem;
    color:var(--gray);
}
.form-group input,
.form-group textarea,
.form-group select{
    width:100%;
    margin-top:6px;
    padding:12px;
    background:#000;
    border:1px solid var(--border);
    color:#fff;
    border-radius:8px;
}
.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus{
    outline:none;
    border-color:var(--red);
}

.form-row{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:12px;
}

.agree{
    display:flex;
    gap:8px;
    font-size:.85rem;
    color:var(--gray);
    margin:10px 0 20px;
}

/* BUTTON */
.btn-red{
    width:100%;
    padding:14px;
    background:linear-gradient(135deg,var(--red),var(--red-dark));
    border:none;
    color:white;
    font-weight:700;
    border-radius:10px;
    cursor:pointer;
    transition:.3s;
}
.btn-red:hover{
    box-shadow:0 0 25px rgba(220,38,38,.6);
    transform:translateY(-2px);
}

/* INFO */
.contact-info{
    display:flex;
    flex-direction:column;
    gap:20px;
}
.info-box{
    background:#0b0b0f;
    border:1px solid var(--border);
    border-radius:14px;
    padding:20px;
}
.info-box h4{
    color:var(--red);
    margin-bottom:6px;
}
.info-box a{
    color:#fff;
    font-weight:600;
}
.info-box iframe{
    width:100%;
    height:200px;
    border-radius:10px;
    border:0;
    margin-top:10px;
}

/* ALERT */
.alert-success{
    background:#052e16;
    border:1px solid #16a34a;
    padding:12px 16px;
    border-radius:10px;
    color:#86efac;
    margin-bottom:20px;
}

/* MOBILE */
@media(max-width:768px){
    .contact-grid{grid-template-columns:1fr}
    .form-row{grid-template-columns:1fr}
    .nh-hero h1{font-size:2.2rem}
}
</style>

<script>
const form = document.getElementById('contactForm');
form.addEventListener('submit', e=>{
    if(!document.getElementById('agreement').checked){
        e.preventDefault();
        alert('Vui lòng đồng ý điều khoản');
    }
});
</script>
@endsection
