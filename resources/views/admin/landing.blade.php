<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nhat Phone - Hệ Thống Quản Lý Admin</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

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
      --nhat-gradient-light: linear-gradient(135deg, rgba(13, 110, 253, 0.1) 0%, rgba(102, 16, 242, 0.1) 100%);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
      min-height: 100vh;
      background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
      color: #ffffff;
      overflow-x: hidden;
      position: relative;
    }

    /* Background Animation */
    .login-bg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      overflow: hidden;
    }

    .bg-shape {
      position: absolute;
      border-radius: 50%;
      background: var(--nhat-gradient);
      opacity: 0.1;
      filter: blur(60px);
      animation: float 20s infinite ease-in-out;
    }

    .shape-1 {
      width: 600px;
      height: 600px;
      top: -200px;
      left: -200px;
      animation-delay: 0s;
    }

    .shape-2 {
      width: 400px;
      height: 400px;
      bottom: -100px;
      right: -100px;
      animation-delay: -5s;
      background: linear-gradient(135deg, #6610f2 0%, #dc3545 100%);
    }

    .shape-3 {
      width: 300px;
      height: 300px;
      top: 50%;
      left: 80%;
      animation-delay: -10s;
      background: linear-gradient(135deg, #198754 0%, #20c997 100%);
    }

    @keyframes float {
      0%, 100% {
        transform: translate(0, 0) scale(1);
      }
      33% {
        transform: translate(30px, -30px) scale(1.1);
      }
      66% {
        transform: translate(-20px, 20px) scale(0.9);
      }
    }

    /* Main Container */
    .login-container {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
      position: relative;
    }

    /* Login Card */
    .login-card {
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(20px);
      border-radius: 28px;
      border: 1px solid rgba(255, 255, 255, 0.15);
      box-shadow: 
        0 25px 50px -12px rgba(0, 0, 0, 0.5),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
      overflow: hidden;
      max-width: 440px;
      width: 100%;
      position: relative;
      z-index: 10;
      animation: slideUp 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }

    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(40px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Card Header */
    .card-header {
      background: rgba(255, 255, 255, 0.05);
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      padding: 2.5rem 2rem 1.5rem;
      text-align: center;
    }

    .brand-logo {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 1rem;
      margin-bottom: 1rem;
    }

    .logo-icon {
      width: 60px;
      height: 60px;
      background: var(--nhat-gradient);
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.8rem;
      color: white;
      box-shadow: 0 8px 20px rgba(13, 110, 253, 0.4);
    }

    .logo-text {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }

    .logo-text h1 {
      font-size: 2.2rem;
      font-weight: 800;
      background: linear-gradient(135deg, #ffffff, #e0e0ff);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
      margin: 0;
      line-height: 1;
    }

    .logo-text span {
      font-size: 0.9rem;
      opacity: 0.8;
      font-weight: 400;
      margin-top: 0.25rem;
    }

    .welcome-text {
      margin-top: 1.5rem;
    }

    .welcome-text h2 {
      font-size: 1.6rem;
      font-weight: 600;
      margin-bottom: 0.5rem;
      color: white;
    }

    .welcome-text p {
      font-size: 0.95rem;
      opacity: 0.7;
      margin: 0;
    }

    /* Card Body */
    .card-body {
      padding: 2.5rem 2rem;
    }

    /* Form Styles */
    .form-group {
      margin-bottom: 1.5rem;
    }

    .form-label {
      display: block;
      font-size: 0.9rem;
      font-weight: 500;
      margin-bottom: 0.5rem;
      color: rgba(255, 255, 255, 0.9);
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .input-group {
      position: relative;
    }

    .form-control {
      width: 100%;
      padding: 1rem 1rem 1rem 3.5rem;
      background: rgba(255, 255, 255, 0.07);
      border: 2px solid rgba(255, 255, 255, 0.15);
      border-radius: 14px;
      color: white;
      font-size: 1rem;
      font-weight: 400;
      transition: all 0.3s ease;
    }

    .form-control::placeholder {
      color: rgba(255, 255, 255, 0.5);
    }

    .form-control:focus {
      outline: none;
      border-color: var(--nhat-primary);
      background: rgba(255, 255, 255, 0.1);
      box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.2);
    }

    .input-icon {
      position: absolute;
      left: 1rem;
      top: 50%;
      transform: translateY(-50%);
      color: rgba(255, 255, 255, 0.6);
      font-size: 1.2rem;
      z-index: 2;
    }

    .toggle-password {
      position: absolute;
      right: 1rem;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: rgba(255, 255, 255, 0.6);
      cursor: pointer;
      font-size: 1.2rem;
      z-index: 2;
      transition: color 0.3s ease;
    }

    .toggle-password:hover {
      color: white;
    }

    /* Remember Me */
    .remember-forgot {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
    }

    .form-check {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .form-check-input {
      width: 18px;
      height: 18px;
      background-color: rgba(255, 255, 255, 0.1);
      border: 2px solid rgba(255, 255, 255, 0.3);
      cursor: pointer;
    }

    .form-check-input:checked {
      background-color: var(--nhat-primary);
      border-color: var(--nhat-primary);
    }

    .form-check-label {
      font-size: 0.9rem;
      color: rgba(255, 255, 255, 0.8);
      cursor: pointer;
    }

    .forgot-link {
      font-size: 0.9rem;
      color: var(--nhat-primary);
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .forgot-link:hover {
      color: #0b5ed7;
      text-decoration: underline;
    }

    /* Login Button */
    .login-btn {
      width: 100%;
      padding: 1rem;
      background: var(--nhat-gradient);
      border: none;
      border-radius: 14px;
      color: white;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      box-shadow: 0 8px 20px rgba(13, 110, 253, 0.4);
    }

    .login-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 30px rgba(13, 110, 253, 0.5);
    }

    .login-btn:active {
      transform: translateY(0);
    }

    .login-btn.loading {
      opacity: 0.8;
      cursor: wait;
    }

    .login-btn.loading .spinner {
      display: block;
    }

    .spinner {
      display: none;
      width: 20px;
      height: 20px;
      border: 2px solid rgba(255, 255, 255, 0.3);
      border-top-color: white;
      border-radius: 50%;
      animation: spin 0.8s linear infinite;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    /* Divider */
    .divider {
      display: flex;
      align-items: center;
      margin: 2rem 0;
      color: rgba(255, 255, 255, 0.5);
      font-size: 0.9rem;
    }

    .divider::before,
    .divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: rgba(255, 255, 255, 0.2);
    }

    .divider span {
      padding: 0 1rem;
    }

    /* Social Login */
    .social-login {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 1rem;
      margin-bottom: 1.5rem;
    }

    .social-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      padding: 0.8rem;
      background: rgba(255, 255, 255, 0.07);
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 12px;
      color: white;
      text-decoration: none;
      font-size: 0.9rem;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .social-btn:hover {
      background: rgba(255, 255, 255, 0.12);
      transform: translateY(-2px);
    }

    .social-btn.google {
      border-color: #ea4335;
    }

    .social-btn.microsoft {
      border-color: #00a4ef;
    }

    /* Footer */
    .card-footer {
      padding: 1.5rem 2rem;
      background: rgba(255, 255, 255, 0.03);
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      text-align: center;
    }

    .footer-text {
      font-size: 0.85rem;
      color: rgba(255, 255, 255, 0.6);
      margin: 0;
    }

    .footer-text a {
      color: var(--nhat-primary);
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .footer-text a:hover {
      text-decoration: underline;
      color: #0b5ed7;
    }

    /* Security Badges */
    .security-badges {
      display: flex;
      justify-content: center;
      gap: 1.5rem;
      margin-top: 1rem;
    }

    .security-badge {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.75rem;
      color: rgba(255, 255, 255, 0.5);
    }

    .security-badge i {
      color: var(--nhat-success);
      font-size: 0.9rem;
    }

    /* Particle Effects */
    .particles {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 1;
    }

    .particle {
      position: absolute;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      animation: particleFloat 20s linear infinite;
    }

    @keyframes particleFloat {
      0% {
        transform: translateY(100vh) rotate(0deg);
        opacity: 0;
      }
      10% {
        opacity: 1;
      }
      90% {
        opacity: 1;
      }
      100% {
        transform: translateY(-100px) rotate(360deg);
        opacity: 0;
      }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .login-container {
        padding: 1rem;
      }
      
      .login-card {
        border-radius: 24px;
      }
      
      .card-header {
        padding: 2rem 1.5rem 1rem;
      }
      
      .logo-icon {
        width: 50px;
        height: 50px;
        font-size: 1.5rem;
      }
      
      .logo-text h1 {
        font-size: 1.8rem;
      }
      
      .card-body {
        padding: 2rem 1.5rem;
      }
      
      .social-login {
        grid-template-columns: 1fr;
      }
      
      .shape-1, .shape-2, .shape-3 {
        display: none;
      }
    }

    @media (max-width: 576px) {
      .login-card {
        border-radius: 20px;
      }
      
      .logo-icon {
        width: 45px;
        height: 45px;
        font-size: 1.3rem;
      }
      
      .logo-text h1 {
        font-size: 1.5rem;
      }
      
      .welcome-text h2 {
        font-size: 1.3rem;
      }
      
      .form-control {
        padding: 0.875rem 0.875rem 0.875rem 3rem;
      }
      
      .input-icon, .toggle-password {
        font-size: 1rem;
      }
    }

    /* Error State */
    .form-control.error {
      border-color: var(--nhat-danger);
      box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.2);
    }

    .error-message {
      display: none;
      font-size: 0.85rem;
      color: var(--nhat-danger);
      margin-top: 0.5rem;
    }

    /* Success State */
    .form-control.success {
      border-color: var(--nhat-success);
      box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.2);
    }
  </style>
</head>
<body>

<!-- Background Elements -->
<div class="login-bg">
  <div class="bg-shape shape-1"></div>
  <div class="bg-shape shape-2"></div>
  <div class="bg-shape shape-3"></div>
</div>

<!-- Particles -->
<div class="particles" id="particles"></div>

<!-- Main Container -->
<div class="login-container">
  <!-- Login Card -->
  <div class="login-card">
    <!-- Header -->
    <div class="card-header">
      <div class="brand-logo">
        <div class="logo-icon">
          <i class="bi bi-phone"></i>
        </div>
        <div class="logo-text">
          <h1>Nhat Phone</h1>
          <span>Hệ thống quản lý admin</span>
        </div>
      </div>
      
      <div class="welcome-text">
        <h2>Đăng nhập hệ thống</h2>
        <p>Vui lòng nhập thông tin đăng nhập để tiếp tục</p>
      </div>
    </div>

    <!-- Body -->
    <div class="card-body">
      <!-- Login Form -->
      <form id="loginForm" action="{{ url('admin/login') }}" method="POST">
        @csrf
        
        <!-- Username Field -->
        <div class="form-group">
          <label for="username" class="form-label">Tên đăng nhập</label>
          <div class="input-group">
            <i class="bi bi-person input-icon"></i>
            <input 
              type="text" 
              id="username" 
              name="username" 
              class="form-control" 
              placeholder="Nhập tên đăng nhập" 
              required
              autocomplete="username"
              autofocus
            >
          </div>
          <div class="error-message" id="usernameError"></div>
        </div>

        <!-- Password Field -->
        <div class="form-group">
          <label for="password" class="form-label">Mật khẩu</label>
          <div class="input-group">
            <i class="bi bi-lock input-icon"></i>
            <input 
              type="password" 
              id="password" 
              name="password" 
              class="form-control" 
              placeholder="Nhập mật khẩu" 
              required
              autocomplete="current-password"
            >
            <button type="button" class="toggle-password" id="togglePassword">
              <i class="bi bi-eye"></i>
            </button>
          </div>
          <div class="error-message" id="passwordError"></div>
        </div>

        <!-- Remember & Forgot -->
        <div class="remember-forgot">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="remember" name="remember">
            <label class="form-check-label" for="remember">
              Ghi nhớ đăng nhập
            </label>
          </div>
          <a href="#" class="forgot-link">Quên mật khẩu?</a>
        </div>

        <!-- Login Button -->
        <button type="submit" class="login-btn" id="loginButton">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Đăng nhập</span>
          <div class="spinner"></div>
        </button>
      </form>

      <!-- Divider -->
      <div class="divider">
        <span>Hoặc đăng nhập với</span>
      </div>

      <!-- Social Login -->
      <div class="social-login">
        <a href="#" class="social-btn google">
          <i class="bi bi-google"></i>
          Google
        </a>
        <a href="#" class="social-btn microsoft">
          <i class="bi bi-microsoft"></i>
          Microsoft
        </a>
      </div>

      <!-- Demo Credentials -->
      <div class="alert alert-info bg-info bg-opacity-10 border-info border-opacity-25 text-info mt-3 mb-0">
        <div class="d-flex align-items-center">
          <i class="bi bi-info-circle me-2"></i>
          <small>
            <strong>Demo Credentials:</strong><br>
            Username: <code>admin</code> | Password: <code>admin123</code>
          </small>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <div class="card-footer">
      <p class="footer-text">
        © {{ date('Y') }} Nhat Phone. Bảo lưu mọi quyền.
        <br>
        <a href="#">Chính sách bảo mật</a> • <a href="#">Điều khoản sử dụng</a>
      </p>
      
      <div class="security-badges">
        <div class="security-badge">
          <i class="bi bi-shield-check"></i>
          <span>Bảo mật SSL</span>
        </div>
        <div class="security-badge">
          <i class="bi bi-clock-history"></i>
          <span>24/7 Hỗ trợ</span>
        </div>
        <div class="security-badge">
          <i class="bi bi-cloud-check"></i>
          <span>Đám mây</span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Create particles
  createParticles();
  
  // Password visibility toggle
  const togglePassword = document.getElementById('togglePassword');
  const passwordInput = document.getElementById('password');
  
  togglePassword.addEventListener('click', function() {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
  });
  
  // Form validation
  const loginForm = document.getElementById('loginForm');
  const loginButton = document.getElementById('loginButton');
  
  loginForm.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const username = document.getElementById('username').value.trim();
    const password = passwordInput.value.trim();
    let isValid = true;
    
    // Reset errors
    document.querySelectorAll('.error-message').forEach(el => {
      el.style.display = 'none';
    });
    document.querySelectorAll('.form-control').forEach(el => {
      el.classList.remove('error', 'success');
    });
    
    // Validate username
    if (!username) {
      showError('usernameError', 'Vui lòng nhập tên đăng nhập');
      isValid = false;
    }
    
    // Validate password
    if (!password) {
      showError('passwordError', 'Vui lòng nhập mật khẩu');
      isValid = false;
    } else if (password.length < 6) {
      showError('passwordError', 'Mật khẩu phải có ít nhất 6 ký tự');
      isValid = false;
    }
    
    if (isValid) {
      // Simulate login process
      loginButton.classList.add('loading');
      loginButton.disabled = true;
      
      // Simulate API call delay
      setTimeout(() => {
        // In real scenario, this would be an actual form submission
        // For demo, we'll simulate a successful login
        simulateLoginSuccess();
      }, 2000);
    }
  });
  
  function showError(elementId, message) {
    const element = document.getElementById(elementId);
    const input = element.previousElementSibling.querySelector('.form-control');
    
    element.textContent = message;
    element.style.display = 'block';
    input.classList.add('error');
    input.classList.remove('success');
  }
  
  function showSuccess(inputId) {
    const input = document.getElementById(inputId);
    input.classList.add('success');
    input.classList.remove('error');
  }
  
  function simulateLoginSuccess() {
    // Add success animation
    loginForm.classList.add('animate__animated', 'animate__bounceOut');
    
    // Simulate redirect
    setTimeout(() => {
      // In production, this would be:
      // window.location.href = "{{ url('admin/dashboard') }}";
      
      // For demo, we'll show an alert
      loginButton.classList.remove('loading');
      loginButton.disabled = false;
      
      alert('Đăng nhập thành công! Trong thực tế, bạn sẽ được chuyển đến trang dashboard.');
      loginForm.classList.remove('animate__animated', 'animate__bounceOut');
      
      // Reset form
      loginForm.reset();
    }, 1000);
  }
  
  // Real-time validation
  document.getElementById('username').addEventListener('input', function() {
    if (this.value.trim()) {
      this.classList.remove('error');
      this.classList.add('success');
      document.getElementById('usernameError').style.display = 'none';
    }
  });
  
  passwordInput.addEventListener('input', function() {
    if (this.value.trim()) {
      this.classList.remove('error');
      document.getElementById('passwordError').style.display = 'none';
    }
  });
  
  // Keyboard shortcuts
  document.addEventListener('keydown', function(e) {
    // Ctrl + Enter to submit
    if (e.ctrlKey && e.key === 'Enter') {
      loginForm.requestSubmit();
    }
    
    // Escape to clear form
    if (e.key === 'Escape') {
      loginForm.reset();
    }
  });
  
  // Create floating particles
  function createParticles() {
    const particlesContainer = document.getElementById('particles');
    const particleCount = 20;
    
    for (let i = 0; i < particleCount; i++) {
      const particle = document.createElement('div');
      particle.className = 'particle';
      
      // Random properties
      const size = Math.random() * 6 + 2;
      const left = Math.random() * 100;
      const delay = Math.random() * 20;
      const duration = Math.random() * 10 + 20;
      
      particle.style.width = `${size}px`;
      particle.style.height = `${size}px`;
      particle.style.left = `${left}%`;
      particle.style.animationDelay = `${delay}s`;
      particle.style.animationDuration = `${duration}s`;
      
      // Random color
      const colors = [
        'rgba(13, 110, 253, 0.3)',
        'rgba(102, 16, 242, 0.3)',
        'rgba(25, 135, 84, 0.3)',
        'rgba(220, 53, 69, 0.3)'
      ];
      particle.style.background = colors[Math.floor(Math.random() * colors.length)];
      
      particlesContainer.appendChild(particle);
    }
  }
  
  // Add ripple effect to buttons
  document.querySelectorAll('.login-btn, .social-btn').forEach(button => {
    button.addEventListener('click', function(e) {
      const ripple = document.createElement('span');
      const rect = this.getBoundingClientRect();
      const size = Math.max(rect.width, rect.height);
      const x = e.clientX - rect.left - size / 2;
      const y = e.clientY - rect.top - size / 2;
      
      ripple.style.cssText = `
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.4);
        transform: scale(0);
        animation: rippleEffect 0.6s linear;
        width: ${size}px;
        height: ${size}px;
        top: ${y}px;
        left: ${x}px;
        pointer-events: none;
      `;
      
      this.appendChild(ripple);
      
      setTimeout(() => ripple.remove(), 600);
    });
  });
  
  // Add CSS for ripple effect
  const style = document.createElement('style');
  style.textContent = `
    @keyframes rippleEffect {
      to {
        transform: scale(4);
        opacity: 0;
      }
    }
  `;
  document.head.appendChild(style);
});
</script>

</body>
</html>