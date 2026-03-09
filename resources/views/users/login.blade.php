<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NhatPhone - Đăng nhập tài khoản</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-tech: #3b82f6;
            --primary-light: #60a5fa;
            --primary-dark: #1d4ed8;
            --secondary-tech: #8b5cf6;
            --accent-tech: #06b6d4;
            --bg-dark: #0c1117;
            --bg-card: rgba(255, 255, 255, 0.05);
            --text-primary: #ffffff;
            --text-secondary: #e2e8f0;
            --text-muted: #94a3b8;
            --shadow-heavy: 0 20px 60px rgba(0, 0, 0, 0.4);
            --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Inter", "Segoe UI", system-ui, sans-serif;
            background: linear-gradient(135deg, #0c1117 0%, #141a22 50%, #1d2530 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--text-primary);
            position: relative;
            overflow-x: hidden;
        }

        /* Animated Background */
        .bg-animation {
            position: fixed;
            inset: 0;
            z-index: -3;
            pointer-events: none;
            background: 
                radial-gradient(circle at 20% 30%, rgba(59, 130, 246, 0.15) 0%, transparent 30%),
                radial-gradient(circle at 80% 70%, rgba(139, 92, 246, 0.12) 0%, transparent 30%),
                radial-gradient(circle at 40% 50%, rgba(6, 182, 212, 0.08) 0%, transparent 25%);
            filter: blur(80px);
            opacity: 0.6;
            animation: float 20s ease-in-out infinite alternate;
        }

        @keyframes float {
            0% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(2%, -1%) scale(1.02); }
            100% { transform: translate(-1%, 2%) scale(1); }
        }

        .bg-particles {
            position: fixed;
            inset: 0;
            z-index: -2;
            pointer-events: none;
            opacity: 0.3;
            background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='400' height='400' viewBox='0 0 400 400'><filter id='n'><feTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='2' stitchTiles='stitch'/></filter><rect width='100%' height='100%' filter='url(%23n)'/></svg>");
            mix-blend-mode: overlay;
        }

        /* Login Container */
        .login-container {
            width: 100%;
            max-width: 480px;
            padding: 20px;
        }

        /* Login Card - Premium Design */
        .login-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 48px 40px;
            box-shadow: var(--shadow-heavy);
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
        }

        .login-card:hover {
            border-color: rgba(59, 130, 246, 0.3);
            transform: translateY(-5px);
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.5);
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-tech), var(--accent-tech), var(--secondary-tech));
            border-radius: 4px 4px 0 0;
        }

        .login-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.03), transparent);
            transition: left 0.7s ease;
        }

        .login-card:hover::after {
            left: 100%;
        }

        /* Brand Header */
        .brand-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .brand-logo {
            font-family: "Space Grotesk", sans-serif;
            font-weight: 800;
            font-size: 2.2rem;
            letter-spacing: -0.02em;
            background: linear-gradient(135deg, var(--text-primary) 0%, var(--primary-light) 50%, var(--accent-tech) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .brand-logo i {
            font-size: 2.5rem;
            background: linear-gradient(135deg, var(--primary-tech), var(--secondary-tech));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .brand-subtitle {
            color: var(--text-secondary);
            font-size: 1.1rem;
            font-weight: 400;
            letter-spacing: 0.01em;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 28px;
            position: relative;
        }

        .form-label {
            font-family: "Space Grotesk", sans-serif;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 10px;
            font-size: 0.95rem;
            letter-spacing: 0.02em;
            display: block;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 1.2rem;
            transition: var(--transition-smooth);
            z-index: 2;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: var(--text-primary);
            font-family: "Inter", sans-serif;
            font-weight: 400;
            font-size: 1rem;
            padding: 16px 20px 16px 52px;
            height: 56px;
            transition: var(--transition-smooth);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--primary-tech);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
            outline: none;
        }

        .form-control:focus + .input-icon {
            color: var(--primary-light);
            transform: translateY(-50%) scale(1.1);
        }

        .form-control::placeholder {
            color: var(--text-muted);
            font-weight: 400;
        }

        /* Password Toggle */
        .password-toggle {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            transition: var(--transition-smooth);
            z-index: 2;
        }

        .password-toggle:hover {
            color: var(--primary-light);
        }

        /* Error Alert */
        .alert-error {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.15), rgba(220, 38, 38, 0.1));
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 12px;
            color: #fecaca;
            padding: 16px 20px;
            font-size: 0.95rem;
            margin-bottom: 24px;
            backdrop-filter: blur(10px);
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Login Button */
        .btn-login {
            background: linear-gradient(135deg, var(--primary-tech), var(--primary-dark));
            border: none;
            border-radius: 12px;
            font-family: "Space Grotesk", sans-serif;
            font-weight: 700;
            font-size: 1.1rem;
            color: white;
            padding: 18px;
            width: 100%;
            transition: var(--transition-smooth);
            letter-spacing: 0.02em;
            position: relative;
            overflow: hidden;
            margin-top: 10px;
            box-shadow: 0 8px 24px rgba(59, 130, 246, 0.3);
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(59, 130, 246, 0.4);
        }

        .btn-login:active {
            transform: translateY(-1px);
        }

        .btn-login::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s ease;
        }

        .btn-login:hover::after {
            left: 100%;
        }

        .btn-login i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        /* Footer Links */
        .login-footer {
            margin-top: 32px;
            text-align: center;
            padding-top: 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 24px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .footer-link {
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: var(--transition-smooth);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .footer-link:hover {
            color: var(--primary-light);
            transform: translateY(-2px);
        }

        .btn-back {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.2);
            color: var(--text-secondary);
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            transition: var(--transition-smooth);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-back:hover {
            border-color: var(--primary-tech);
            background: rgba(59, 130, 246, 0.1);
            color: var(--text-primary);
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 576px) {
            .login-container {
                padding: 16px;
            }
            
            .login-card {
                padding: 32px 24px;
            }
            
            .brand-logo {
                font-size: 1.8rem;
            }
            
            .form-control {
                padding: 14px 18px 14px 48px;
                height: 52px;
            }
            
            .footer-links {
                flex-direction: column;
                gap: 16px;
            }
        }

        /* Loading Animation */
        .loading-spinner {
            display: none;
            width: 24px;
            height: 24px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-left: 10px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>

<div class="bg-animation"></div>
<div class="bg-particles"></div>

<div class="login-container">
    <div class="login-card">
        <!-- Brand Header -->
        <div class="brand-header">
            <h1 class="brand-logo">
                <i class="bi bi-cpu-fill"></i>
                NhatPhone
            </h1>
            <p class="brand-subtitle">Đăng nhập tài khoản để trải nghiệm công nghệ đỉnh cao</p>
        </div>

        @if(session('error'))
            <div class="alert-error">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        <!-- Login Form -->
        <form action="{{ url('/login') }}" method="POST" id="loginForm">
            @csrf

            <!-- Username Field -->
            <div class="form-group">
                <label class="form-label">Tài khoản</label>
                <div class="input-wrapper">
                    <i class="bi bi-person-circle input-icon"></i>
                    <input 
                        type="text" 
                        name="username" 
                        class="form-control" 
                        placeholder="Nhập tên đăng nhập hoặc email" 
                        required
                        autocomplete="username"
                    >
                </div>
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <label class="form-label">Mật khẩu</label>
                <div class="input-wrapper">
                    <i class="bi bi-lock-fill input-icon"></i>
                    <input 
                        type="password" 
                        name="password" 
                        id="passwordInput"
                        class="form-control" 
                        placeholder="Nhập mật khẩu của bạn" 
                        required
                        autocomplete="current-password"
                    >
                    <button type="button" class="password-toggle" id="togglePassword">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-login" id="submitBtn">
                <i class="bi bi-box-arrow-in-right"></i>
                Đăng nhập
                <div class="loading-spinner" id="loadingSpinner"></div>
            </button>
        </form>

        <!-- Footer Links -->
        <div class="login-footer">
            <div class="footer-links">
                <a href="{{ url('/register') }}" class="footer-link">
                    <i class="bi bi-person-plus-fill"></i>
                    Tạo tài khoản mới
                </a>
                <a href="#" class="footer-link" id="forgotPassword">
                    <i class="bi bi-key-fill"></i>
                    Quên mật khẩu?
                </a>
            </div>
            
            <a href="{{ url('/users') }}" class="btn-back">
                <i class="bi bi-arrow-left-circle"></i>
                Quay lại trang chủ
            </a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Password visibility toggle
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('passwordInput');
        const eyeIcon = togglePassword.querySelector('i');
        
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            eyeIcon.classList.toggle('bi-eye');
            eyeIcon.classList.toggle('bi-eye-slash');
        });

        // Form submission with loading state
        const loginForm = document.getElementById('loginForm');
        const submitBtn = document.getElementById('submitBtn');
        const loadingSpinner = document.getElementById('loadingSpinner');
        
        loginForm.addEventListener('submit', function(e) {
            submitBtn.disabled = true;
            loadingSpinner.style.display = 'inline-block';
            submitBtn.innerHTML = '<i class="bi bi-box-arrow-in-right"></i> Đang xử lý...';
        });

        // Forgot password modal
        const forgotPassword = document.getElementById('forgotPassword');
        forgotPassword.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Create modal
            const modal = document.createElement('div');
            modal.className = 'modal fade show d-block';
            modal.style.background = 'rgba(0,0,0,0.5)';
            modal.innerHTML = `
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="background: rgba(255,255,255,0.05); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.1); border-radius: 20px; color: var(--text-primary);">
                        <div class="modal-header border-0">
                            <h5 class="modal-title"><i class="bi bi-key me-2"></i>Quên mật khẩu</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p>Vui lòng liên hệ với bộ phận hỗ trợ qua email <strong>support@techhub.vn</strong> hoặc gọi hotline <strong>1800 1234</strong> để được hỗ trợ khôi phục mật khẩu.</p>
                            <div class="alert alert-info mt-3" style="background: rgba(59,130,246,0.1); border-color: rgba(59,130,246,0.2);">
                                <i class="bi bi-info-circle me-2"></i>
                                Chúng tôi sẽ hỗ trợ bạn trong vòng 24h làm việc.
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <a href="mailto:support@techhub.vn" class="btn btn-primary">
                                <i class="bi bi-envelope me-2"></i>Gửi email
                            </a>
                        </div>
                    </div>
                </div>
            `;
            
            document.body.appendChild(modal);
            document.body.style.overflow = 'hidden';
            
            // Close modal functionality
            const closeBtn = modal.querySelector('.btn-close, .btn-secondary');
            closeBtn.addEventListener('click', function() {
                modal.remove();
                document.body.style.overflow = '';
            });
            
            // Close on backdrop click
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.remove();
                    document.body.style.overflow = '';
                }
            });
        });

        // Add focus animation to inputs
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });

        // Auto-focus username field
        const usernameInput = document.querySelector('input[name="username"]');
        if (usernameInput) {
            usernameInput.focus();
        }
    });
</script>
</body>
</html>