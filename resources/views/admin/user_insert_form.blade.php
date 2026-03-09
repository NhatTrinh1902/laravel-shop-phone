<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký tài khoản - Nhật Phone</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <style>
    :root {
      --nh-primary: #0066CC;
      --nh-secondary: #003366;
      --nh-accent: #FF6600;
      --nh-light: #F5F8FF;
      --nh-dark: #1A2B4D;
      --nh-gradient: linear-gradient(135deg, var(--nh-primary) 0%, var(--nh-secondary) 100%);
      --nh-gradient-light: linear-gradient(135deg, rgba(0, 102, 204, 0.1) 0%, rgba(0, 51, 102, 0.1) 100%);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #f0f7ff 0%, #e6f0ff 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      color: var(--nh-dark);
    }

    .nhatphone-container {
      width: 100%;
      max-width: 500px;
      position: relative;
    }

    /* Header với logo Nhật Phone */
    .nhatphone-header {
      text-align: center;
      margin-bottom: 40px;
    }

    .logo-wrapper {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 15px;
      margin-bottom: 20px;
    }

    .logo-icon {
      width: 70px;
      height: 70px;
      background: var(--nh-gradient);
      border-radius: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 10px 30px rgba(0, 102, 204, 0.3);
      transform: rotate(-5deg);
    }

    .logo-icon i {
      font-size: 32px;
      color: white;
      transform: rotate(5deg);
    }

    .brand-text h1 {
      font-size: 36px;
      font-weight: 800;
      background: var(--nh-gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
      letter-spacing: 1px;
    }

    .brand-text p {
      color: #666;
      font-size: 14px;
      margin-top: 5px;
      letter-spacing: 2px;
      text-transform: uppercase;
    }

    /* Main card */
    .register-card {
      background: white;
      border-radius: 24px;
      padding: 40px;
      box-shadow: 0 20px 60px rgba(0, 51, 102, 0.15);
      border: 1px solid rgba(0, 102, 204, 0.1);
      position: relative;
      overflow: hidden;
    }

    .register-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 6px;
      background: var(--nh-gradient);
      border-radius: 24px 24px 0 0;
    }

    .card-header {
      text-align: center;
      margin-bottom: 30px;
    }

    .card-header h2 {
      color: var(--nh-secondary);
      font-weight: 700;
      margin-bottom: 10px;
      font-size: 28px;
    }

    .card-header p {
      color: #666;
      font-size: 16px;
    }

    /* Form styling */
    .form-group {
      margin-bottom: 25px;
    }

    .form-label {
      font-weight: 600;
      color: var(--nh-secondary);
      margin-bottom: 10px;
      font-size: 14px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .form-label i {
      color: var(--nh-primary);
      font-size: 16px;
    }

    .input-group-nh {
      position: relative;
    }

    .input-group-nh .input-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: #999;
      font-size: 18px;
      z-index: 2;
    }

    .input-group-nh .form-control {
      padding-left: 50px;
      height: 56px;
      border: 2px solid #e1e8ff;
      border-radius: 14px;
      font-size: 16px;
      color: var(--nh-dark);
      background: #fafcff;
      transition: all 0.3s ease;
    }

    .input-group-nh .form-control:focus {
      border-color: var(--nh-primary);
      box-shadow: 0 0 0 4px rgba(0, 102, 204, 0.1);
      background: white;
    }

    /* Role selection */
    .role-section {
      background: var(--nh-light);
      border-radius: 16px;
      padding: 25px;
      margin: 30px 0;
      border: 2px solid #e1e8ff;
    }

    .role-title {
      color: var(--nh-secondary);
      font-weight: 700;
      margin-bottom: 20px;
      font-size: 18px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .role-title i {
      color: var(--nh-accent);
    }

    .role-options {
      display: flex;
      gap: 15px;
    }

    .role-option {
      flex: 1;
    }

    .role-option input {
      display: none;
    }

    .role-label {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
      background: white;
      border: 2px solid #e1e8ff;
      border-radius: 14px;
      cursor: pointer;
      transition: all 0.3s ease;
      text-align: center;
      height: 100%;
    }

    .role-label i {
      font-size: 28px;
      margin-bottom: 12px;
    }

    .role-label[for="user"] i {
      color: var(--nh-primary);
    }

    .role-label[for="admin"] i {
      color: var(--nh-accent);
    }

    .role-label .role-name {
      font-weight: 700;
      color: var(--nh-secondary);
      margin-bottom: 5px;
    }

    .role-label .role-desc {
      font-size: 12px;
      color: #888;
    }

    .role-option input:checked + .role-label {
      border-color: var(--nh-primary);
      background: var(--nh-gradient-light);
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 102, 204, 0.15);
    }

    /* Password strength */
    .password-strength {
      margin-top: 10px;
    }

    .strength-bar {
      height: 6px;
      background: #e1e8ff;
      border-radius: 3px;
      overflow: hidden;
      margin-bottom: 8px;
    }

    .strength-fill {
      height: 100%;
      width: 0%;
      border-radius: 3px;
      transition: width 0.3s ease;
      background: var(--nh-gradient);
    }

    .strength-text {
      font-size: 12px;
      color: #888;
      display: flex;
      justify-content: space-between;
    }

    /* Buttons */
    .btn-nh-primary {
      background: var(--nh-gradient);
      color: white;
      border: none;
      border-radius: 14px;
      height: 58px;
      font-size: 18px;
      font-weight: 700;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 12px;
      transition: all 0.3s ease;
      box-shadow: 0 10px 30px rgba(0, 102, 204, 0.3);
      margin-top: 10px;
    }

    .btn-nh-primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 40px rgba(0, 102, 204, 0.4);
    }

    .btn-nh-secondary {
      background: white;
      color: var(--nh-primary);
      border: 2px solid var(--nh-primary);
      border-radius: 14px;
      height: 54px;
      font-size: 16px;
      font-weight: 600;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      transition: all 0.3s ease;
      margin-top: 15px;
    }

    .btn-nh-secondary:hover {
      background: var(--nh-light);
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(0, 102, 204, 0.15);
    }

    /* Footer */
    .register-footer {
      margin-top: 40px;
      padding-top: 25px;
      border-top: 1px solid #e1e8ff;
      text-align: center;
    }

    .security-notice {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      color: #888;
      font-size: 14px;
    }

    .security-notice i {
      color: var(--nh-primary);
    }

    /* Animation */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .register-card {
      animation: fadeInUp 0.6s ease-out;
    }

    /* Responsive */
    @media (max-width: 576px) {
      .register-card {
        padding: 30px 20px;
        border-radius: 20px;
      }

      .logo-wrapper {
        flex-direction: column;
        gap: 10px;
      }

      .brand-text h1 {
        font-size: 32px;
      }

      .role-options {
        flex-direction: column;
      }

      .form-control {
        height: 52px;
      }

      .btn-nh-primary,
      .btn-nh-secondary {
        height: 52px;
        font-size: 16px;
      }
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
    }

    ::-webkit-scrollbar-track {
      background: #f1f5ff;
    }

    ::-webkit-scrollbar-thumb {
      background: var(--nh-gradient);
      border-radius: 4px;
    }
  </style>
</head>

<body>

<div class="nhatphone-container">
  
  <!-- Header với logo -->
  <div class="nhatphone-header">
    <div class="logo-wrapper">
      <div class="logo-icon">
        <i class="fas fa-mobile-alt"></i>
      </div>
      <div class="brand-text">
        <h1>Nhật Phone</h1>
        <p>HỆ THỐNG QUẢN LÝ</p>
      </div>
    </div>
  </div>

  <!-- Main register form -->
  <div class="register-card">
    
    <div class="card-header">
      <h2><i class="fas fa-user-plus me-2"></i>TẠO TÀI KHOẢN MỚI</h2>
      <p>Đăng ký thành viên hệ thống Nhật Phone</p>
    </div>

    <form action="/admin/xu-ly-them-nguoi-dung" method="POST" id="registerForm">
      @csrf

      <!-- Tên đăng nhập -->
      <div class="form-group">
        <label for="username" class="form-label">
          <i class="fas fa-user-circle"></i>
          TÊN ĐĂNG NHẬP
        </label>
        <div class="input-group-nh">
          <i class="fas fa-at input-icon"></i>
          <input type="text" class="form-control" id="username" name="username" 
                 required placeholder="Nhập tên đăng nhập (3-20 ký tự)"
                 minlength="3" maxlength="20">
        </div>
      </div>

      <!-- Mật khẩu -->
      <div class="form-group">
        <label for="password" class="form-label">
          <i class="fas fa-lock"></i>
          MẬT KHẨU
        </label>
        <div class="input-group-nh">
          <i class="fas fa-key input-icon"></i>
          <input type="password" class="form-control" id="password" name="password" 
                 required placeholder="Nhập mật khẩu (ít nhất 6 ký tự)"
                 minlength="6">
        </div>
        <div class="password-strength">
          <div class="strength-bar">
            <div class="strength-fill" id="passwordStrength"></div>
          </div>
          <div class="strength-text">
            <span>Độ mạnh mật khẩu</span>
            <span id="strengthText">Rất yếu</span>
          </div>
        </div>
      </div>

      <!-- Họ và tên -->
      <div class="form-group">
        <label for="fullname" class="form-label">
          <i class="fas fa-user"></i>
          HỌ VÀ TÊN
        </label>
        <div class="input-group-nh">
          <i class="fas fa-id-card input-icon"></i>
          <input type="text" class="form-control" id="fullname" name="fullname" 
                 required placeholder="Nhập họ tên đầy đủ">
        </div>
      </div>

      <!-- Địa chỉ -->
      <div class="form-group">
        <label for="address" class="form-label">
          <i class="fas fa-map-marker-alt"></i>
          ĐỊA CHỈ
        </label>
        <div class="input-group-nh">
          <i class="fas fa-home input-icon"></i>
          <input type="text" class="form-control" id="address" name="address" 
                 required placeholder="Nhập địa chỉ liên hệ">
        </div>
      </div>

      <!-- Phân quyền -->
      <div class="role-section">
        <div class="role-title">
          <i class="fas fa-shield-alt"></i>
          PHÂN QUYỀN TRUY CẬP
        </div>
        <div class="role-options">
          <div class="role-option">
            <input type="radio" name="role" id="user" value="0" checked>
            <label class="role-label" for="user">
              <i class="fas fa-user-tie"></i>
              <div class="role-name">THÀNH VIÊN</div>
              <div class="role-desc">Truy cập cơ bản</div>
            </label>
          </div>
          <div class="role-option">
            <input type="radio" name="role" id="admin" value="1">
            <label class="role-label" for="admin">
              <i class="fas fa-user-cog"></i>
              <div class="role-name">QUẢN TRỊ</div>
              <div class="role-desc">Toàn quyền hệ thống</div>
            </label>
          </div>
        </div>
      </div>

      <!-- Action buttons -->
      <button type="submit" class="btn btn-nh-primary">
        <i class="fas fa-user-plus"></i>
        ĐĂNG KÝ TÀI KHOẢN
      </button>

      <a href="{{ url()->previous() }}" class="btn btn-nh-secondary">
        <i class="fas fa-arrow-left"></i>
        QUAY LẠI TRANG TRƯỚC
      </a>

    </form>

    <!-- Footer -->
    <div class="register-footer">
      <div class="security-notice">
        <i class="fas fa-shield-check"></i>
        <span>Thông tin được bảo mật theo tiêu chuẩn Nhật Phone</span>
      </div>
    </div>

  </div>
</div>

<script>
  // Password strength indicator
  document.getElementById('password').addEventListener('input', function(e) {
    const password = e.target.value;
    const strengthBar = document.getElementById('passwordStrength');
    const strengthText = document.getElementById('strengthText');
    
    let strength = 0;
    let text = 'Rất yếu';
    let color = '#ff4444';
    
    if (password.length >= 8) strength += 25;
    if (/[A-Z]/.test(password)) strength += 25;
    if (/[0-9]/.test(password)) strength += 25;
    if (/[^A-Za-z0-9]/.test(password)) strength += 25;
    
    // Update bar and text
    strengthBar.style.width = strength + '%';
    
    if (strength < 25) {
      text = 'Rất yếu';
      color = '#ff4444';
    } else if (strength < 50) {
      text = 'Yếu';
      color = '#ff8800';
    } else if (strength < 75) {
      text = 'Khá';
      color = '#ffbb33';
    } else if (strength < 100) {
      text = 'Mạnh';
      color = '#00C851';
    } else {
      text = 'Rất mạnh';
      color = '#007E33';
    }
    
    strengthBar.style.background = color;
    strengthText.textContent = text;
    strengthText.style.color = color;
  });

  // Form validation
  document.getElementById('registerForm').addEventListener('submit', function(e) {
    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value;
    const fullname = document.getElementById('fullname').value.trim();
    const address = document.getElementById('address').value.trim();
    
    let isValid = true;
    let errorMessage = '';
    
    // Validate username
    if (username.length < 3 || username.length > 20) {
      isValid = false;
      errorMessage += 'Tên đăng nhập phải từ 3-20 ký tự\n';
    }
    
    // Validate password
    if (password.length < 6) {
      isValid = false;
      errorMessage += 'Mật khẩu phải có ít nhất 6 ký tự\n';
    }
    
    // Validate fullname
    if (fullname.length < 2) {
      isValid = false;
      errorMessage += 'Họ và tên không hợp lệ\n';
    }
    
    // Validate address
    if (address.length < 5) {
      isValid = false;
      errorMessage += 'Địa chỉ không hợp lệ\n';
    }
    
    if (!isValid) {
      e.preventDefault();
      alert('Vui lòng kiểm tra lại thông tin:\n\n' + errorMessage);
      return false;
    }
    
    // Show loading state
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> ĐANG XỬ LÝ...';
    submitBtn.disabled = true;
    
    // Re-enable button after 3 seconds if submission fails
    setTimeout(() => {
      submitBtn.innerHTML = originalText;
      submitBtn.disabled = false;
    }, 3000);
    
    return true;
  });

  // Add focus effects
  const inputs = document.querySelectorAll('.form-control');
  inputs.forEach(input => {
    input.addEventListener('focus', function() {
      this.parentElement.classList.add('focused');
    });
    
    input.addEventListener('blur', function() {
      this.parentElement.classList.remove('focused');
    });
  });

  // Role selection animation
  const roleLabels = document.querySelectorAll('.role-label');
  roleLabels.forEach(label => {
    label.addEventListener('click', function() {
      roleLabels.forEach(l => l.classList.remove('selected'));
      this.classList.add('selected');
    });
  });

  // Initialize
  document.addEventListener('DOMContentLoaded', function() {
    // Trigger password strength check on page load if there's already a value
    const passwordInput = document.getElementById('password');
    if (passwordInput.value) {
      passwordInput.dispatchEvent(new Event('input'));
    }
  });
</script>

</body>
</html>