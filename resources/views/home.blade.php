{{-- resources/views/admin/home.blade.php --}}
@include('admin/template/header')

<!-- Modern Admin Dashboard -->
<div class="admin-dashboard">
    <!-- Top Navigation Bar -->
    <nav class="admin-navbar">
        <div class="nav-container">
            <div class="nav-left">
                <div class="brand-logo">
                    <i class="bi bi-incognito"></i>
                    <span class="brand-text">Admin<span class="brand-highlight">Pro</span></span>
                </div>
                <h1 class="dashboard-title">
                    <i class="bi bi-speedometer2"></i>
                    <span>Bảng Điều Khiển</span>
                </h1>
            </div>
            <div class="nav-right">
                <div class="nav-actions">
                    <button class="nav-btn" title="Thông báo">
                        <i class="bi bi-bell"></i>
                        <span class="notification-badge">3</span>
                    </button>
                    <button class="nav-btn" title="Tin nhắn">
                        <i class="bi bi-chat-dots"></i>
                    </button>
                </div>
                <div class="user-profile-dropdown">
                    <div class="user-avatar">
                        <i class="bi bi-person-circle"></i>
                        <div class="status-indicator online"></div>
                    </div>
                    <div class="user-info">
                        @if(session()->has('user'))
                            <div class="user-name">{{ session('user.username') }}</div>
                        @else
                            <div class="user-name">Khách</div>
                        @endif
                        <div class="user-role">Quản trị viên</div>
                    </div>
                    <i class="bi bi-chevron-down dropdown-toggle"></i>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="dashboard-container">
        <!-- Welcome Banner -->
        <div class="welcome-banner">
            <div class="welcome-content">
                <h2 class="welcome-title">Chào mừng trở lại!</h2>
                <p class="welcome-text">Quản lý hệ thống của bạn một cách hiệu quả và thông minh</p>
                <div class="welcome-stats">
                    <div class="stat-item">
                        <span class="stat-value">24</span>
                        <span class="stat-label">Hoạt động hôm nay</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-value">98%</span>
                        <span class="stat-label">Hiệu suất hệ thống</span>
                    </div>
                </div>
            </div>
            <div class="welcome-graphic">
                <i class="bi bi-graph-up-arrow"></i>
            </div>
        </div>

        <!-- Main Management Cards -->
        <div class="management-section">
            <div class="section-header">
                <h3 class="section-title">
                    <i class="bi bi-gear-wide-connected"></i>
                    Quản lý Hệ thống
                </h3>
                <p class="section-subtitle">Truy cập nhanh vào các chức năng quản lý chính</p>
            </div>

            <div class="management-grid">
                <!-- User Management -->
                <div class="management-card card-user">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div class="card-badge">143</div>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Quản lý Người dùng</h4>
                        <p class="card-description">
                            Quản lý tài khoản, phân quyền và theo dõi hoạt động người dùng
                        </p>
                        <div class="card-actions">
                            <a href="{{ url('admin/danh-sach-nguoi-dung') }}" class="action-btn">
                                <span>Truy cập</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                            <div class="action-stats">
                                <span class="stat">
                                    <i class="bi bi-plus-circle"></i>
                                    5 mới
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Management -->
                <div class="management-card card-product">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <div class="card-badge">856</div>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Quản lý Sản phẩm</h4>
                        <p class="card-description">
                            Quản lý danh mục sản phẩm, tồn kho và thông tin chi tiết
                        </p>
                        <div class="card-actions">
                            <a href="{{ url('admin/danh-sach-san-pham') }}" class="action-btn">
                                <span>Truy cập</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                            <div class="action-stats">
                                <span class="stat">
                                    <i class="bi bi-tag"></i>
                                    12 loại
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Category Management -->
                <div class="management-card card-category">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="bi bi-tags-fill"></i>
                        </div>
                        <div class="card-badge">24</div>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Quản lý Danh mục</h4>
                        <p class="card-description">
                            Phân loại và tổ chức sản phẩm theo danh mục và bộ lọc
                        </p>
                        <div class="card-actions">
                            <a href="{{ url('admin/danh-sach-danh-muc') }}" class="action-btn">
                                <span>Truy cập</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                            <div class="action-stats">
                                <span class="stat">
                                    <i class="bi bi-layers"></i>
                                    3 cấp
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats & Actions -->
        <div class="dashboard-footer">
            <div class="quick-stats">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-eye"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-value">2.4K</div>
                        <div class="stat-label">Lượt xem hôm nay</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-cart-check"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-value">156</div>
                        <div class="stat-label">Đơn hàng mới</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-value">24.5M</div>
                        <div class="stat-label">Doanh thu</div>
                    </div>
                </div>
            </div>

            <div class="quick-actions">
                <button class="quick-btn" onclick="window.location.href='{{ url('admin/danh-sach-nguoi-dung') }}'">
                    <i class="bi bi-person-plus"></i>
                    <span>Thêm người dùng</span>
                </button>
                <button class="quick-btn" onclick="window.location.href='{{ url('admin/danh-sach-san-pham') }}'">
                    <i class="bi bi-plus-square"></i>
                    <span>Thêm sản phẩm</span>
                </button>
                <button class="quick-btn" onclick="window.location.href='{{ url('admin/danh-sach-danh-muc') }}'">
                    <i class="bi bi-folder-plus"></i>
                    <span>Thêm danh mục</span>
                </button>
                <button class="quick-btn btn-report">
                    <i class="bi bi-file-earmark-bar-graph"></i>
                    <span>Báo cáo</span>
                </button>
            </div>
        </div>
    </div>
</div>

@include('admin/template/footer')

{{-- Modern Dashboard CSS --}}
<style>
    :root {
        --primary-color: #6366f1;
        --primary-dark: #4f46e5;
        --secondary-color: #8b5cf6;
        --success-color: #10b981;
        --info-color: #3b82f6;
        --warning-color: #f59e0b;
        --danger-color: #ef4444;
        --light-bg: #f8fafc;
        --card-bg: #ffffff;
        --sidebar-bg: #1e293b;
        --text-primary: #1e293b;
        --text-secondary: #64748b;
        --text-light: #94a3b8;
        --border-color: #e2e8f0;
        --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
        --radius-sm: 0.375rem;
        --radius-md: 0.5rem;
        --radius-lg: 0.75rem;
        --radius-xl: 1rem;
        --transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .admin-dashboard {
        min-height: 100vh;
        background: linear-gradient(135deg, var(--light-bg) 0%, #f1f5f9 100%);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        color: var(--text-primary);
    }

    /* Navigation Bar */
    .admin-navbar {
        background: var(--card-bg);
        border-bottom: 1px solid var(--border-color);
        box-shadow: var(--shadow-sm);
        position: sticky;
        top: 0;
        z-index: 100;
        backdrop-filter: blur(10px);
    }

    .nav-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 1.5rem;
        height: 64px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .nav-left {
        display: flex;
        align-items: center;
        gap: 2rem;
    }

    .brand-logo {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-color);
    }

    .brand-highlight {
        color: var(--secondary-color);
    }

    .dashboard-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--text-primary);
    }

    .nav-right {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .nav-actions {
        display: flex;
        gap: 0.5rem;
    }

    .nav-btn {
        width: 40px;
        height: 40px;
        border-radius: var(--radius-md);
        border: 1px solid var(--border-color);
        background: var(--card-bg);
        color: var(--text-secondary);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: var(--transition);
        position: relative;
    }

    .nav-btn:hover {
        background: var(--light-bg);
        color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .notification-badge {
        position: absolute;
        top: -4px;
        right: -4px;
        background: var(--danger-color);
        color: white;
        font-size: 0.75rem;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .user-profile-dropdown {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.5rem;
        border-radius: var(--radius-lg);
        cursor: pointer;
        transition: var(--transition);
    }

    .user-profile-dropdown:hover {
        background: var(--light-bg);
    }

    .user-avatar {
        position: relative;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
    }

    .status-indicator {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: var(--success-color);
        border: 2px solid var(--card-bg);
    }

    .status-indicator.online {
        background: var(--success-color);
    }

    .user-info {
        display: flex;
        flex-direction: column;
    }

    .user-name {
        font-weight: 600;
        font-size: 0.875rem;
        color: var(--text-primary);
    }

    .user-role {
        font-size: 0.75rem;
        color: var(--text-secondary);
    }

    .dropdown-toggle {
        font-size: 0.875rem;
        color: var(--text-light);
    }

    /* Dashboard Container */
    .dashboard-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 1.5rem;
    }

    /* Welcome Banner */
    .welcome-banner {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: var(--radius-xl);
        padding: 2rem;
        margin-bottom: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: white;
        box-shadow: var(--shadow-lg);
    }

    .welcome-content {
        flex: 1;
    }

    .welcome-title {
        font-size: 2rem;
        font-weight: 700;
        margin: 0 0 0.5rem 0;
    }

    .welcome-text {
        font-size: 1rem;
        opacity: 0.9;
        margin: 0 0 1.5rem 0;
    }

    .welcome-stats {
        display: flex;
        gap: 2rem;
    }

    .stat-item {
        display: flex;
        flex-direction: column;
    }

    .stat-value {
        font-size: 1.5rem;
        font-weight: 700;
    }

    .stat-label {
        font-size: 0.875rem;
        opacity: 0.8;
    }

    .welcome-graphic {
        font-size: 4rem;
        opacity: 0.2;
    }

    /* Management Section */
    .management-section {
        margin-bottom: 2rem;
    }

    .section-header {
        margin-bottom: 1.5rem;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0 0 0.5rem 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--text-primary);
    }

    .section-subtitle {
        color: var(--text-secondary);
        margin: 0;
    }

    .management-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 1.5rem;
    }

    /* Management Cards */
    .management-card {
        background: var(--card-bg);
        border-radius: var(--radius-xl);
        padding: 1.5rem;
        box-shadow: var(--shadow-md);
        transition: var(--transition);
        border: 1px solid var(--border-color);
        display: flex;
        flex-direction: column;
    }

    .management-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary-color);
    }

    .card-user {
        border-top: 4px solid var(--primary-color);
    }

    .card-product {
        border-top: 4px solid var(--success-color);
    }

    .card-category {
        border-top: 4px solid var(--secondary-color);
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 1.5rem;
    }

    .card-icon {
        width: 56px;
        height: 56px;
        border-radius: var(--radius-lg);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
    }

    .card-user .card-icon {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    }

    .card-product .card-icon {
        background: linear-gradient(135deg, var(--success-color), #059669);
    }

    .card-category .card-icon {
        background: linear-gradient(135deg, var(--secondary-color), #7c3aed);
    }

    .card-badge {
        background: var(--light-bg);
        color: var(--text-primary);
        font-size: 0.875rem;
        font-weight: 600;
        padding: 0.25rem 0.75rem;
        border-radius: var(--radius-md);
    }

    .card-content {
        flex: 1;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: 700;
        margin: 0 0 0.75rem 0;
        color: var(--text-primary);
    }

    .card-description {
        color: var(--text-secondary);
        line-height: 1.6;
        margin: 0 0 1.5rem 0;
    }

    .card-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
    }

    .action-btn {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.625rem 1.25rem;
        background: var(--primary-color);
        color: white;
        text-decoration: none;
        border-radius: var(--radius-md);
        font-weight: 600;
        font-size: 0.875rem;
        transition: var(--transition);
        border: none;
        cursor: pointer;
    }

    .action-btn:hover {
        background: var(--primary-dark);
        transform: translateX(4px);
    }

    .action-stats {
        display: flex;
        gap: 0.5rem;
    }

    .stat {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        font-size: 0.75rem;
        color: var(--text-light);
    }

    /* Dashboard Footer */
    .dashboard-footer {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 1.5rem;
    }

    .quick-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
    }

    .stat-card {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 1rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--border-color);
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: var(--radius-md);
        background: var(--light-bg);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        color: var(--primary-color);
    }

    .stat-info {
        flex: 1;
    }

    .stat-value {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--text-primary);
    }

    .stat-label {
        font-size: 0.875rem;
        color: var(--text-secondary);
    }

    .quick-actions {
        display: grid;
        grid-template-columns: 1fr;
        gap: 0.75rem;
    }

    .quick-btn {
        padding: 0.75rem 1rem;
        background: var(--card-bg);
        border: 1px solid var(--border-color);
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        transition: var(--transition);
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--text-primary);
    }

    .quick-btn:hover {
        background: var(--light-bg);
        border-color: var(--primary-color);
        transform: translateX(4px);
    }

    .quick-btn.btn-report {
        background: linear-gradient(135deg, var(--info-color), #2563eb);
        color: white;
        border: none;
    }

    .quick-btn.btn-report:hover {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .management-grid {
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }
        
        .dashboard-footer {
            grid-template-columns: 1fr;
        }
        
        .quick-stats {
            order: 2;
        }
        
        .quick-actions {
            order: 1;
        }
    }

    @media (max-width: 768px) {
        .nav-container {
            padding: 0 1rem;
        }
        
        .nav-left {
            gap: 1rem;
        }
        
        .brand-logo span {
            display: none;
        }
        
        .welcome-banner {
            flex-direction: column;
            text-align: center;
            gap: 1.5rem;
        }
        
        .welcome-stats {
            justify-content: center;
        }
        
        .management-grid {
            grid-template-columns: 1fr;
        }
        
        .quick-stats {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {
        .user-info {
            display: none;
        }
        
        .dropdown-toggle {
            display: none;
        }
        
        .card-actions {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
        }
        
        .action-btn {
            justify-content: center;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add interactive effects
        const managementCards = document.querySelectorAll('.management-card');
        const quickButtons = document.querySelectorAll('.quick-btn');
        
        // Card hover animation
        managementCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-4px)';
                this.style.boxShadow = '0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = 'var(--shadow-md)';
            });
        });
        
        // Quick button animation
        quickButtons.forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(4px)';
            });
            
            btn.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });
        
        // Nav button notifications
        const notificationBtn = document.querySelector('.nav-btn:nth-child(1)');
        notificationBtn.addEventListener('click', function() {
            const badge = this.querySelector('.notification-badge');
            if (badge) {
                badge.style.transform = 'scale(0)';
                setTimeout(() => {
                    badge.style.display = 'none';
                }, 300);
            }
        });
        
        // Simulate loading animation
        const stats = document.querySelectorAll('.stat-value');
        stats.forEach(stat => {
            const originalValue = stat.textContent;
            stat.textContent = '0';
            
            let count = 0;
            const target = parseInt(originalValue.replace(/[^\d]/g, ''));
            const increment = target / 50;
            
            const timer = setInterval(() => {
                count += increment;
                if (count >= target) {
                    stat.textContent = originalValue;
                    clearInterval(timer);
                } else {
                    stat.textContent = Math.floor(count).toLocaleString();
                }
            }, 20);
        });
        
        // Add ripple effect to buttons
        document.querySelectorAll('.action-btn, .quick-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    });
</script>

<style>
    /* Ripple effect */
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.4);
        transform: scale(0);
        animation: ripple-animation 0.6s linear;
    }

    @keyframes ripple-animation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
</style>