<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechHub - Đăng ký tài khoản</title>

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
            --accent-green: #10b981;
            --bg-dark: #0c1117;
            --bg-card: rgba(255, 255, 255, 0.05);
            --text-primary: #ffffff;
            --text-secondary: #e2e8f0;
            --text-muted: #94a3b8;
            --shadow-heavy: 0 20px 60px rgba(0, 0, 0, 0.4);
            --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --radius-md: 12px;
            --radius-lg: 20px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Inter", system-ui, -apple-system, sans-serif;
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

        /* Register Container */
        .register-container {
            width: 100%;
            max-width: 520px;
            padding: 20px;
        }

        /* Register Card */
        .register-card {
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

        .register-card:hover {
            border-color: rgba(59, 130, 246, 0.3);
            transform: translateY(-5px);
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.5);
        }

        .register-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-tech), var(--accent-tech), var(--secondary-tech));
            border-radius: 4px 4px 0 0;
        }

        .register-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.03), transparent);
            transition: left 0.7s ease;
        }

        .register-card:hover::after {
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
            max-width: 400px;
            margin: 0 auto;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        .form-row {
            display: flex;
            gap: 16px;
            margin-bottom: 24px;
        }

        .form-row .form-group {
            flex: 1;
            margin-bottom: 0;
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
            border-radius: var(--radius-md);
            color: var(--text-primary);
            font-family: "Inter", sans-serif;
            font-weight: 400;
            font-size: 1rem;
            padding: 16px 20px 16px 52px;
            height: 56px;
            transition: var(--transition-smooth);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
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

        /* Password Strength */
        .password-strength {
            margin-top: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .strength-bar {
            flex: 1;
            height: 4px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 2px;
            overflow: hidden;
            position: relative;
        }

        .strength-fill {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, #ef4444, #f97316, #eab308, #22c55e);
            border-radius: 2px;
            transition: width 0.3s ease;
        }

        .strength-text {
            font-size: 0.8rem;
            color: var(--text-muted);
            min-width: 80px;
            text-align: right;
        }

        /* Validation Messages */
        .validation-message {
            font-size: 0.85rem;
            margin-top: 6px;
            display: none;
        }

        .valid-message {
            color: var(--accent-green);
        }

        .invalid-message {
            color: #ef4444;
        }

        /* Error/Success Alerts */
        .alert-section {
            margin-bottom: 28px;
        }

        .alert-error {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.15), rgba(220, 38, 38, 0.1));
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: var(--radius-md);
            color: #fecaca;
            padding: 16px 20px;
            font-size: 0.95rem;
            backdrop-filter: blur(10px);
            animation: slideDown 0.3s ease-out;
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.15), rgba(21, 128, 61, 0.1));
            border: 1px solid rgba(34, 197, 94, 0.2);
            border-radius: var(--radius-md);
            color: #bbf7d0;
            padding: 16px 20px;
            font-size: 0.95rem;
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

        /* Register Button */
        .btn-register {
            background: linear-gradient(135deg, var(--primary-tech), var(--primary-dark));
            border: none;
            border-radius: var(--radius-md);
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

        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(59, 130, 246, 0.4);
        }

        .btn-register:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none !important;
            box-shadow: none !important;
        }

        .btn-register::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s ease;
        }

        .btn-register:hover::after {
            left: 100%;
        }

        .btn-register i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        /* Terms & Conditions */
        .terms-checkbox {
            margin: 24px 0;
        }

        .terms-label {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 0.9rem;
            color: var(--text-secondary);
            cursor: pointer;
        }

        .terms-check {
            flex-shrink: 0;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 4px;
            background: transparent;
            position: relative;
            transition: var(--transition-smooth);
        }

        .terms-check:checked {
            background: var(--primary-tech);
            border-color: var(--primary-tech);
        }

        .terms-check:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 12px;
            font-weight: bold;
        }

        .terms-text {
            line-height: 1.5;
        }

        .terms-link {
            color: var(--primary-light);
            text-decoration: none;
            transition: var(--transition-smooth);
        }

        .terms-link:hover {
            color: var(--accent-tech);
            text-decoration: underline;
        }

        /* Footer Links */
        .register-footer {
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
            border-radius: var(--radius-md);
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

        /* Responsive */
        @media (max-width: 576px) {
            .register-container {
                padding: 16px;
            }
            
            .register-card {
                padding: 32px 24px;
            }
            
            .brand-logo {
                font-size: 1.8rem;
            }
            
            .form-control {
                padding: 14px 18px 14px 48px;
                height: 52px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 16px;
            }
            
            .footer-links {
                flex-direction: column;
                gap: 16px;
            }
        }
    </style>
</head>
<body>

<div class="bg-animation"></div>
<div class="bg-particles"></div>

<div class="register-container">
    <div class="register-card">
        <!-- Brand Header -->
        <div class="brand-header">
            <h1 class="brand-logo">
                <i class="bi bi-cpu-fill"></i>
                TechHub
            </h1>
            <p class="brand-subtitle">Tạo tài khoản để trải nghiệm thế giới công nghệ đỉnh cao</p>
        </div>

        <!-- Alert Section -->
        <div class="alert-section">
            @if ($errors->any())
                <div class="alert-error">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <strong>Vui lòng kiểm tra lại thông tin:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="alert-success">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <!-- Registration Form -->
        <form action="{{ url('/register') }}" method="POST" id="registerForm">
            @csrf

            <div class="form-row">
                <!-- Username -->
                <div class="form-group">
                    <label class="form-label">Tên đăng nhập</label>
                    <div class="input-wrapper">
                        <i class="bi bi-person-circle input-icon"></i>
                        <input 
                            type="text" 
                            name="username" 
                            class="form-control" 
                            placeholder="Nhập tên đăng nhập" 
                            required
                            autocomplete="username"
                            id="usernameInput"
                        >
                    </div>
                    <div class="validation-message invalid-message" id="usernameError">Tên đăng nhập phải có ít nhất 3 ký tự</div>
                </div>

                <!-- Full Name -->
                <div class="form-group">
                    <label class="form-label">Họ và tên</label>
                    <div class="input-wrapper">
                        <i class="bi bi-person-lines-fill input-icon"></i>
                        <input 
                            type="text" 
                            name="fullname" 
                            class="form-control" 
                            placeholder="Nhập họ và tên đầy đủ" 
                            required
                        >
                    </div>
                </div>
            </div>

            <!-- Address -->
            <div class="form-group">
                <label class="form-label">Địa chỉ</label>
                <div class="input-wrapper">
                    <i class="bi bi-geo-alt-fill input-icon"></i>
                    <input 
                        type="text" 
                        name="address" 
                        class="form-control" 
                        placeholder="Nhập địa chỉ của bạn" 
                        required
                    >
                </div>
            </div>

            <div class="form-row">
                <!-- Password -->
                <div class="form-group">
                    <label class="form-label">Mật khẩu</label>
                    <div class="input-wrapper">
                        <i class="bi bi-lock-fill input-icon"></i>
                        <input 
                            type="password" 
                            name="password" 
                            class="form-control" 
                            placeholder="Nhập mật khẩu" 
                            required
                            id="passwordInput"
                        >
                        <button type="button" class="password-toggle" id="togglePassword">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div class="password-strength">
                        <div class="strength-bar">
                            <div class="strength-fill" id="strengthFill"></div>
                        </div>
                        <span class="strength-text" id="strengthText">Yếu</span>
                    </div>
                    <div class="validation-message invalid-message" id="passwordError">Mật khẩu phải có ít nhất 6 ký tự</div>
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label class="form-label">Xác nhận mật khẩu</label>
                    <div class="input-wrapper">
                        <i class="bi bi-lock-fill input-icon"></i>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            class="form-control" 
                            placeholder="Nhập lại mật khẩu" 
                            required
                            id="confirmPasswordInput"
                        >
                        <button type="button" class="password-toggle" id="toggleConfirmPassword">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div class="validation-message invalid-message" id="confirmPasswordError">Mật khẩu không khớp</div>
                </div>
            </div>

            <!-- Terms & Conditions -->
            <div class="terms-checkbox">
                <label class="terms-label">
                    <input type="checkbox" class="terms-check" id="termsCheck" required>
                    <span class="terms-text">
                        Tôi đồng ý với 
                        <a href="#" class="terms-link" id="termsLink">Điều khoản dịch vụ</a> 
                        và 
                        <a href="#" class="terms-link" id="privacyLink">Chính sách bảo mật</a> 
                        của TechHub
                    </span>
                </label>
            </div>

            <!-- Register Button -->
            <button type="submit" class="btn-register" id="submitBtn" disabled>
                <i class="bi bi-person-plus-fill"></i>
                Tạo tài khoản
                <div class="loading-spinner" id="loadingSpinner"></div>
            </button>
        </form>

        <!-- Footer Links -->
        <div class="register-footer">
            <div class="footer-links">
                <a href="{{ url('/login') }}" class="footer-link">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Đã có tài khoản? Đăng nhập ngay
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
        // Elements
        const usernameInput = document.getElementById('usernameInput');
        const passwordInput = document.getElementById('passwordInput');
        const confirmPasswordInput = document.getElementById('confirmPasswordInput');
        const togglePassword = document.getElementById('togglePassword');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const strengthFill = document.getElementById('strengthFill');
        const strengthText = document.getElementById('strengthText');
        const termsCheck = document.getElementById('termsCheck');
        const submitBtn = document.getElementById('submitBtn');
        const registerForm = document.getElementById('registerForm');
        const loadingSpinner = document.getElementById('loadingSpinner');
        
        // Validation elements
        const usernameError = document.getElementById('usernameError');
        const passwordError = document.getElementById('passwordError');
        const confirmPasswordError = document.getElementById('confirmPasswordError');

        // Password visibility toggle
        function setupPasswordToggle(toggleBtn, input) {
            toggleBtn.addEventListener('click', function() {
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                const eyeIcon = toggleBtn.querySelector('i');
                eyeIcon.classList.toggle('bi-eye');
                eyeIcon.classList.toggle('bi-eye-slash');
            });
        }

        setupPasswordToggle(togglePassword, passwordInput);
        setupPasswordToggle(toggleConfirmPassword, confirmPasswordInput);

        // Password strength checker
        function checkPasswordStrength(password) {
            let strength = 0;
            
            // Length check
            if (password.length >= 6) strength += 20;
            if (password.length >= 8) strength += 20;
            
            // Character variety checks
            if (/[a-z]/.test(password)) strength += 20;
            if (/[A-Z]/.test(password)) strength += 20;
            if (/[0-9]/.test(password)) strength += 10;
            if (/[^a-zA-Z0-9]/.test(password)) strength += 10;
            
            // Update strength bar and text
            strengthFill.style.width = Math.min(strength, 100) + '%';
            
            if (strength < 40) {
                strengthText.textContent = 'Yếu';
                strengthText.style.color = '#ef4444';
                strengthFill.style.background = 'linear-gradient(90deg, #ef4444, #f97316)';
            } else if (strength < 70) {
                strengthText.textContent = 'Trung bình';
                strengthText.style.color = '#eab308';
                strengthFill.style.background = 'linear-gradient(90deg, #f97316, #eab308)';
            } else if (strength < 90) {
                strengthText.textContent = 'Mạnh';
                strengthText.style.color = '#22c55e';
                strengthFill.style.background = 'linear-gradient(90deg, #eab308, #22c55e)';
            } else {
                strengthText.textContent = 'Rất mạnh';
                strengthText.style.color = '#16a34a';
                strengthFill.style.background = 'linear-gradient(90deg, #22c55e, #16a34a)';
            }
            
            return strength >= 40; // Minimum acceptable strength
        }

        // Real-time validation
        function validateUsername(username) {
            const isValid = username.length >= 3 && /^[a-zA-Z0-9_]+$/.test(username);
            usernameError.style.display = isValid ? 'none' : 'block';
            return isValid;
        }

        function validatePassword(password) {
            const isValid = password.length >= 6 && checkPasswordStrength(password);
            passwordError.style.display = isValid ? 'none' : 'block';
            return isValid;
        }

        function validateConfirmPassword(password, confirmPassword) {
            const isValid = password === confirmPassword;
            confirmPasswordError.style.display = isValid ? 'none' : 'block';
            return isValid;
        }

        // Event listeners for real-time validation
        usernameInput.addEventListener('input', function() {
            validateUsername(this.value);
            updateSubmitButton();
        });

        passwordInput.addEventListener('input', function() {
            validatePassword(this.value);
            if (confirmPasswordInput.value) {
                validateConfirmPassword(this.value, confirmPasswordInput.value);
            }
            updateSubmitButton();
        });

        confirmPasswordInput.addEventListener('input', function() {
            validateConfirmPassword(passwordInput.value, this.value);
            updateSubmitButton();
        });

        // Update submit button state
        function updateSubmitButton() {
            const isUsernameValid = validateUsername(usernameInput.value);
            const isPasswordValid = validatePassword(passwordInput.value);
            const isConfirmPasswordValid = validateConfirmPassword(passwordInput.value, confirmPasswordInput.value);
            const isTermsAccepted = termsCheck.checked;
            
            submitBtn.disabled = !(isUsernameValid && isPasswordValid && isConfirmPasswordValid && isTermsAccepted);
        }

        // Terms checkbox listener
        termsCheck.addEventListener('change', updateSubmitButton);

        // Terms and Privacy modals
        document.getElementById('termsLink').addEventListener('click', function(e) {
            e.preventDefault();
            showModal('Điều khoản dịch vụ', `
                <p><strong>1. Chấp nhận điều khoản</strong></p>
                <p>Bằng việc sử dụng dịch vụ của TechHub, bạn đồng ý với các điều khoản này.</p>
                
                <p><strong>2. Tài khoản người dùng</strong></p>
                <p>Bạn chịu trách nhiệm bảo mật tài khoản và mật khẩu của mình.</p>
                
                <p><strong>3. Mua sắm và thanh toán</strong></p>
                <p>Tất cả giao dịch đều được bảo mật và mã hóa.</p>
                
                <p><strong>4. Bảo hành và đổi trả</strong></p>
                <p>Áp dụng theo chính sách bảo hành của từng hãng sản xuất.</p>
            `);
        });

        document.getElementById('privacyLink').addEventListener('click', function(e) {
            e.preventDefault();
            showModal('Chính sách bảo mật', `
                <p><strong>1. Thu thập thông tin</strong></p>
                <p>Chúng tôi chỉ thu thập thông tin cần thiết để cung cấp dịch vụ.</p>
                
                <p><strong>2. Sử dụng thông tin</strong></p>
                <p>Thông tin của bạn được bảo mật và không chia sẻ với bên thứ ba.</p>
                
                <p><strong>3. Bảo mật dữ liệu</strong></p>
                <p>Dữ liệu được mã hóa và lưu trữ trên hệ thống bảo mật cao.</p>
                
                <p><strong>4. Quyền của người dùng</strong></p>
                <p>Bạn có quyền yêu cầu xóa hoặc chỉnh sửa thông tin cá nhân.</p>
            `);
        });

        // Modal function
        function showModal(title, content) {
            const modal = document.createElement('div');
            modal.className = 'modal fade show d-block';
            modal.style.background = 'rgba(0,0,0,0.5)';
            modal.innerHTML = `
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="background: rgba(255,255,255,0.05); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.1); border-radius: 20px; color: var(--text-primary);">
                        <div class="modal-header border-0">
                            <h5 class="modal-title"><i class="bi bi-file-text me-2"></i>${title}</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            ${content}
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Đã hiểu</button>
                        </div>
                    </div>
                </div>
            `;
            
            document.body.appendChild(modal);
            document.body.style.overflow = 'hidden';
            
            const closeBtn = modal.querySelector('.btn-close, .btn-primary');
            closeBtn.addEventListener('click', function() {
                modal.remove();
                document.body.style.overflow = '';
            });
            
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.remove();
                    document.body.style.overflow = '';
                }
            });
        }

        // Form submission
        registerForm.addEventListener('submit', function(e) {
            const isUsernameValid = validateUsername(usernameInput.value);
            const isPasswordValid = validatePassword(passwordInput.value);
            const isConfirmPasswordValid = validateConfirmPassword(passwordInput.value, confirmPasswordInput.value);
            const isTermsAccepted = termsCheck.checked;
            
            if (!isUsernameValid || !isPasswordValid || !isConfirmPasswordValid || !isTermsAccepted) {
                e.preventDefault();
                return;
            }
            
            submitBtn.disabled = true;
            loadingSpinner.style.display = 'inline-block';
            submitBtn.innerHTML = '<i class="bi bi-person-plus-fill"></i> Đang xử lý...';
        });

        // Auto-focus username field
        usernameInput.focus();
    });
</script>
</body>
</html>