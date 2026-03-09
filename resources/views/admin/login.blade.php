<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhat Phone - Đăng Nhập Hệ Thống Admin</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --nhat-primary: #0d6efd;
            --nhat-secondary: #6c757d;
            --nhat-success: #198754;
            --nhat-danger: #dc3545;
            --nhat-warning: #ffc107;
            --nhat-info: #0dcaf0;
            --nhat-light: #f8f9fa;
            --nhat-dark: #212529;
            --nhat-gradient: linear-gradient(135deg, #0d6efd 0%, #6610f2 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, 
                #0f172a 0%, 
                #1e293b 50%, 
                #334155 100%);
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        /* Abstract Background */
        .abstract-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 0;
            opacity: 0.4;
            filter: blur(80px);
        }

        .abstract-shape {
            position: absolute;
            background: var(--nhat-gradient);
            border-radius: 50%;
        }

        .shape-1 {
            width: 500px;
            height: 500px;
            top: -150px;
            left: -150px;
            opacity: 0.2;
        }

        .shape-2 {
            width: 300px;
            height: 300px;
            bottom: -100px;
            right: -100px;
            background: linear-gradient(135deg, #6610f2 0%, #dc3545 100%);
            opacity: 0.15;
        }

        .shape-3 {
            width: 200px;
            height: 200px;
            top: 30%;
            right: 10%;
            background: linear-gradient(135deg, #198754 0%, #20c997 100%);
            opacity: 0.1;
        }

        /* Main Container */
        .main-container {
            width: 100%;
            max-width: 500px;
            padding: 2rem;
            position: relative;
            z-index: 10;
        }

        /* Login Card */
        .login-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 28px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.5),
                inset 0 1px 0 rgba(255, 255, 255, 0.05),
                0 0 0 1px rgba(255, 255, 255, 0.03);
            overflow: hidden;
            padding: 3rem 2.5rem;
            position: relative;
            animation: cardSlideUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes cardSlideUp {
            from {
                opacity: 0;
                transform: translateY(60px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Brand Header */
        .brand-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .logo-wrapper {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 70px;
            height: 70px;
            background: var(--nhat-gradient);
            border-radius: 18px;
            margin-bottom: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .logo-wrapper::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                45deg,
                transparent 30%,
                rgba(255, 255, 255, 0.1) 50%,
                transparent 70%
            );
            animation: shine 3s infinite linear;
        }

        @keyframes shine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }

        .logo-wrapper i {
            font-size: 2rem;
            color: white;
            z-index: 1;
        }

        .brand-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #ffffff 0%, #a5b4fc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .brand-subtitle {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.6);
            font-weight: 400;
            letter-spacing: 0.3px;
        }

        /* Alert Message */
        .alert-container {
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .custom-alert {
            background: rgba(220, 53, 69, 0.15);
            border: 1px solid rgba(220, 53, 69, 0.3);
            border-radius: 14px;
            padding: 1rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
            backdrop-filter: blur(10px);
        }

        .custom-alert i {
            color: #ff6b6b;
            font-size: 1.25rem;
        }

        .custom-alert p {
            margin: 0;
            font-size: 0.95rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.9);
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 1.75rem;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-wrapper {
            position: relative;
            border-radius: 14px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input-wrapper:focus-within {
            border-color: var(--nhat-primary);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.15);
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.5);
            font-size: 1.1rem;
            transition: color 0.3s ease;
            z-index: 1;
        }

        .input-wrapper:focus-within .input-icon {
            color: var(--nhat-primary);
        }

        .form-input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            font-size: 1rem;
            color: #ffffff;
            background: transparent;
            border: none;
            outline: none;
            font-family: inherit;
            font-weight: 400;
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.5);
            font-size: 1.1rem;
            cursor: pointer;
            transition: color 0.3s ease;
            z-index: 1;
        }

        .password-toggle:hover {
            color: var(--nhat-primary);
        }

        /* Remember Me */
        .remember-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
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
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-check-input:checked {
            background-color: var(--nhat-primary);
            border-color: var(--nhat-primary);
        }

        .form-check-label {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
            cursor: pointer;
            user-select: none;
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
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(13, 110, 253, 0.3);
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(13, 110, 253, 0.4);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-btn.loading {
            opacity: 0.8;
            cursor: wait;
        }

        .login-btn.loading .btn-text {
            opacity: 0;
        }

        .login-btn.loading .spinner {
            display: block;
        }

        .spinner {
            display: none;
            position: absolute;
            width: 24px;
            height: 24px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Demo Credentials */
        .demo-credentials {
            background: rgba(13, 110, 253, 0.1);
            border: 1px solid rgba(13, 110, 253, 0.2);
            border-radius: 12px;
            padding: 1rem;
            margin-top: 1.5rem;
            text-align: center;
        }

        .demo-title {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--nhat-primary);
            margin-bottom: 0.5rem;
        }

        .demo-info {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.7);
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .demo-info code {
            background: rgba(255, 255, 255, 0.1);
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
            font-family: 'Courier New', monospace;
            font-size: 0.85rem;
        }

        /* Footer */
        .login-footer {
            text-align: center;
            margin-top: 2.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .copyright {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.5);
            margin-bottom: 0.5rem;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
        }

        .footer-link {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: var(--nhat-primary);
        }

        /* Security Badge */
        .security-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(25, 135, 84, 0.1);
            border: 1px solid rgba(25, 135, 84, 0.3);
            border-radius: 20px;
            padding: 0.5rem 1rem;
            margin-top: 1rem;
            font-size: 0.85rem;
            color: #20c997;
        }

        .security-badge i {
            font-size: 1rem;
        }

        /* Floating Elements */
        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 5;
            overflow: hidden;
        }

        .floating-element {
            position: absolute;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            animation: floatElement 20s linear infinite;
        }

        @keyframes floatElement {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }
            100% {
                transform: translate(100px, -100px) rotate(360deg);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-container {
                padding: 1.5rem;
            }
            
            .login-card {
                padding: 2.5rem 2rem;
                border-radius: 24px;
            }
            
            .brand-title {
                font-size: 2rem;
            }
            
            .logo-wrapper {
                width: 60px;
                height: 60px;
            }
            
            .logo-wrapper i {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 576px) {
            .main-container {
                padding: 1rem;
            }
            
            .login-card {
                padding: 2rem 1.5rem;
                border-radius: 20px;
            }
            
            .brand-title {
                font-size: 1.75rem;
            }
            
            .form-input {
                padding: 0.875rem 0.875rem 0.875rem 2.75rem;
            }
            
            .footer-links {
                flex-direction: column;
                gap: 0.5rem;
            }
        }

        /* Input Error State */
        .input-wrapper.error {
            border-color: var(--nhat-danger);
            background: rgba(220, 53, 69, 0.05);
        }

        .input-wrapper.error:focus-within {
            box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.15);
        }

        .error-message {
            display: none;
            font-size: 0.85rem;
            color: var(--nhat-danger);
            margin-top: 0.5rem;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <!-- Abstract Background -->
    <div class="abstract-bg">
        <div class="abstract-shape shape-1"></div>
        <div class="abstract-shape shape-2"></div>
        <div class="abstract-shape shape-3"></div>
    </div>

    <!-- Floating Elements -->
    <div class="floating-elements" id="floatingElements"></div>

    <!-- Main Container -->
    <div class="main-container">
        <!-- Login Card -->
        <div class="login-card">
            <!-- Brand Header -->
            <div class="brand-header">
                <div class="logo-wrapper">
                    <i class="bi bi-phone"></i>
                </div>
                <h1 class="brand-title">Nhat Phone</h1>
                <p class="brand-subtitle">Hệ thống quản lý admin chuyên nghiệp</p>
            </div>

            <!-- Error Alert -->
            @if(session('error'))
            <div class="alert-container">
                <div class="custom-alert">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <p>{{ session('error') }}</p>
                </div>
            </div>
            @endif

            <!-- Login Form -->
            <form action="{{ url('admin/xu-ly-dang-nhap') }}" method="POST" id="loginForm">
                @csrf

                <!-- Username Field -->
                <div class="form-group">
                    <label class="form-label">Tên đăng nhập</label>
                    <div class="input-wrapper" id="usernameWrapper">
                        <i class="bi bi-person-circle input-icon"></i>
                        <input type="text" 
                               name="username" 
                               class="form-input" 
                               placeholder="Nhập tên đăng nhập" 
                               required
                               autocomplete="username"
                               id="usernameInput">
                    </div>
                    <div class="error-message" id="usernameError"></div>
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label class="form-label">Mật khẩu</label>
                    <div class="input-wrapper" id="passwordWrapper">
                        <i class="bi bi-lock input-icon"></i>
                        <input type="password" 
                               name="password" 
                               class="form-input" 
                               placeholder="Nhập mật khẩu" 
                               required
                               autocomplete="current-password"
                               id="passwordInput">
                        <button type="button" class="password-toggle" id="togglePassword">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div class="error-message" id="passwordError"></div>
                </div>

                <!-- Remember & Forgot -->
                <div class="remember-wrapper">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">
                            Ghi nhớ đăng nhập
                        </label>
                    </div>
                    <a href="#" class="forgot-link" id="forgotPassword">Quên mật khẩu?</a>
                </div>

                <!-- Login Button -->
                <button type="submit" class="login-btn" id="loginButton">
                    <span class="btn-text">Đăng nhập hệ thống</span>
                    <i class="bi bi-box-arrow-in-right"></i>
                    <div class="spinner"></div>
                </button>
            </form>

            <!-- Demo Credentials -->
            <div class="demo-credentials">
                <div class="demo-title">
                    <i class="bi bi-info-circle me-2"></i>
                    Thông tin demo
                </div>
                <div class="demo-info">
                    <div>Tên đăng nhập: <code>admin</code></div>
                    <div>Mật khẩu: <code>admin123</code></div>
                </div>
            </div>

            <!-- Footer -->
            <div class="login-footer">
                <p class="copyright">© {{ date('Y') }} Nhat Phone. Bảo lưu mọi quyền.</p>
                <div class="footer-links">
                    <a href="#" class="footer-link">Chính sách bảo mật</a>
                    <a href="#" class="footer-link">Điều khoản sử dụng</a>
                    <a href="#" class="footer-link">Hỗ trợ kỹ thuật</a>
                </div>
                <div class="security-badge">
                    <i class="bi bi-shield-check"></i>
                    <span>Kết nối được bảo mật</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Create floating elements
            createFloatingElements();
            
            // Password toggle
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('passwordInput');
            
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.innerHTML = type === 'password' 
                    ? '<i class="bi bi-eye"></i>' 
                    : '<i class="bi bi-eye-slash"></i>';
            });
            
            // Form validation
            const loginForm = document.getElementById('loginForm');
            const loginButton = document.getElementById('loginButton');
            const usernameInput = document.getElementById('usernameInput');
            const passwordInput = document.getElementById('passwordInput');
            const usernameWrapper = document.getElementById('usernameWrapper');
            const passwordWrapper = document.getElementById('passwordWrapper');
            
            // Real-time validation
            usernameInput.addEventListener('input', function() {
                validateUsername();
            });
            
            passwordInput.addEventListener('input', function() {
                validatePassword();
            });
            
            // Form submission
            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const usernameValid = validateUsername();
                const passwordValid = validatePassword();
                
                if (usernameValid && passwordValid) {
                    // Show loading state
                    loginButton.classList.add('loading');
                    loginButton.disabled = true;
                    
                    // Simulate API call delay
                    setTimeout(() => {
                        // In production, this would be actual form submission
                        // For demo, we'll show a success message
                        showSuccessMessage();
                    }, 1500);
                }
            });
            
            // Validation functions
            function validateUsername() {
                const username = usernameInput.value.trim();
                const errorElement = document.getElementById('usernameError');
                
                if (!username) {
                    showError(usernameWrapper, errorElement, 'Vui lòng nhập tên đăng nhập');
                    return false;
                }
                
                if (username.length < 3) {
                    showError(usernameWrapper, errorElement, 'Tên đăng nhập phải có ít nhất 3 ký tự');
                    return false;
                }
                
                clearError(usernameWrapper, errorElement);
                return true;
            }
            
            function validatePassword() {
                const password = passwordInput.value.trim();
                const errorElement = document.getElementById('passwordError');
                
                if (!password) {
                    showError(passwordWrapper, errorElement, 'Vui lòng nhập mật khẩu');
                    return false;
                }
                
                if (password.length < 6) {
                    showError(passwordWrapper, errorElement, 'Mật khẩu phải có ít nhất 6 ký tự');
                    return false;
                }
                
                clearError(passwordWrapper, errorElement);
                return true;
            }
            
            function showError(wrapper, errorElement, message) {
                wrapper.classList.add('error');
                errorElement.textContent = message;
                errorElement.style.display = 'block';
            }
            
            function clearError(wrapper, errorElement) {
                wrapper.classList.remove('error');
                errorElement.style.display = 'none';
            }
            
            // Success simulation
            function showSuccessMessage() {
                // Add success animation to form
                loginForm.style.animation = 'cardSlideUp 0.5s reverse forwards';
                
                setTimeout(() => {
                    // Reset form and button
                    loginForm.reset();
                    loginButton.classList.remove('loading');
                    loginButton.disabled = false;
                    
                    // Reset animations
                    loginForm.style.animation = '';
                    
                    // Show success alert (in production, this would be a redirect)
                    alert('Đăng nhập thành công! Trong thực tế, bạn sẽ được chuyển đến trang quản trị.');
                }, 500);
            }
            
            // Forgot password modal simulation
            document.getElementById('forgotPassword').addEventListener('click', function(e) {
                e.preventDefault();
                alert('Tính năng khôi phục mật khẩu đang được phát triển. Vui lòng liên hệ quản trị viên.');
            });
            
            // Create floating elements function
            function createFloatingElements() {
                const container = document.getElementById('floatingElements');
                const elementCount = 15;
                
                for (let i = 0; i < elementCount; i++) {
                    const element = document.createElement('div');
                    element.className = 'floating-element';
                    
                    // Random properties
                    const size = Math.random() * 10 + 5;
                    const left = Math.random() * 100;
                    const top = Math.random() * 100;
                    const duration = Math.random() * 20 + 20;
                    const delay = Math.random() * -20;
                    
                    element.style.width = `${size}px`;
                    element.style.height = `${size}px`;
                    element.style.left = `${left}%`;
                    element.style.top = `${top}%`;
                    element.style.animationDuration = `${duration}s`;
                    element.style.animationDelay = `${delay}s`;
                    element.style.opacity = Math.random() * 0.2 + 0.05;
                    
                    container.appendChild(element);
                }
            }
            
            // Add hover effects to form inputs
            const inputWrappers = document.querySelectorAll('.input-wrapper');
            inputWrappers.forEach(wrapper => {
                wrapper.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });
                
                wrapper.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
            
            // Keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                // Ctrl + Enter to submit
                if (e.ctrlKey && e.key === 'Enter') {
                    loginForm.requestSubmit();
                }
                
                // Escape to reset
                if (e.key === 'Escape') {
                    loginForm.reset();
                    clearError(usernameWrapper, document.getElementById('usernameError'));
                    clearError(passwordWrapper, document.getElementById('passwordError'));
                }
            });
        });
    </script>
</body>
</html>