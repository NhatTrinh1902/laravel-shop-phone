@include('admin/template/header')

<style>
    :root {
        --nh-primary: #0066CC;
        --nh-secondary: #003366;
        --nh-accent: #FF6600;
        --nh-light: #F5F8FF;
        --nh-dark: #1A2B4D;
        --nh-gradient: linear-gradient(135deg, var(--nh-primary) 0%, var(--nh-secondary) 100%);
        --nh-gradient-light: linear-gradient(135deg, rgba(0, 102, 204, 0.1) 0%, rgba(0, 51, 102, 0.1) 100%);
        --surface-color: #ffffff;
        --text-primary: #1A2B4D;
        --text-secondary: #666666;
        --border-color: #E1E8FF;
        --shadow-sm: 0 4px 12px rgba(0, 51, 102, 0.08);
        --shadow-md: 0 8px 32px rgba(0, 51, 102, 0.12);
        --shadow-lg: 0 20px 60px rgba(0, 51, 102, 0.15);
        --radius-sm: 12px;
        --radius-md: 16px;
        --radius-lg: 20px;
    }

    body {
        background: linear-gradient(135deg, #f0f7ff 0%, #e6f0ff 100%);
        font-family: 'Segoe UI', 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        min-height: 100vh;
        color: var(--nh-dark);
    }

    /* Main Container */
    .nh-container {
        padding: 30px;
        max-width: 1400px;
        margin: 0 auto;
        animation: fadeIn 0.6s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Premium Card */
    .nh-card {
        background: var(--surface-color);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
        border: 1px solid rgba(0, 102, 204, 0.1);
        overflow: hidden;
        position: relative;
    }

    .nh-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: var(--nh-gradient);
        z-index: 1;
    }

    /* Header Section */
    .nh-header {
        padding: 30px 40px;
        background: linear-gradient(135deg, var(--nh-secondary) 0%, var(--nh-dark) 100%);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .nh-header::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -30%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        border-radius: 50%;
    }

    .header-content {
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .brand-section {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .brand-logo {
        width: 60px;
        height: 60px;
        background: white;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .brand-logo i {
        font-size: 28px;
        background: var(--nh-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .brand-text h1 {
        font-size: 32px;
        font-weight: 800;
        margin: 0;
        letter-spacing: -0.5px;
        background: linear-gradient(135deg, white 0%, #E6F0FF 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .brand-text p {
        font-size: 14px;
        opacity: 0.9;
        margin: 5px 0 0 0;
        letter-spacing: 1px;
    }

    /* Add Button */
    .nh-btn-primary {
        background: var(--nh-gradient);
        color: white;
        padding: 14px 32px;
        border-radius: 14px;
        font-weight: 700;
        font-size: 15px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
        box-shadow: 0 10px 30px rgba(0, 102, 204, 0.3);
        position: relative;
        overflow: hidden;
    }

    .nh-btn-primary::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: 0.6s;
    }

    .nh-btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(0, 102, 204, 0.4);
    }

    .nh-btn-primary:hover::after {
        left: 100%;
    }

    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        padding: 30px 40px;
        background: var(--nh-light);
        margin: 0 40px 20px;
        border-radius: var(--radius-md);
        border: 1px solid var(--border-color);
    }

    .stat-card {
        background: white;
        padding: 24px;
        border-radius: var(--radius-md);
        text-align: center;
        box-shadow: var(--shadow-sm);
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
        border-color: var(--nh-primary);
    }

    .stat-value {
        font-size: 36px;
        font-weight: 800;
        margin-bottom: 8px;
        background: var(--nh-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .stat-label {
        font-size: 14px;
        color: var(--text-secondary);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Table Container */
    .table-container {
        padding: 0 40px 40px;
    }

    .table-responsive {
        overflow: hidden;
        border-radius: var(--radius-md);
        border: 1px solid var(--border-color);
        background: white;
    }

    /* Modern Table */
    .nh-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin: 0;
    }

    .nh-table thead {
        background: var(--nh-light);
    }

    .nh-table thead th {
        padding: 22px 24px;
        font-size: 13px;
        font-weight: 700;
        color: var(--nh-dark);
        text-transform: uppercase;
        letter-spacing: 1px;
        border: none;
        text-align: left;
        position: relative;
    }

    .nh-table thead th::after {
        content: '';
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 1px;
        height: 20px;
        background: linear-gradient(to bottom, transparent, #CCD9FF, transparent);
    }

    .nh-table thead th:last-child::after {
        display: none;
    }

    /* Table Rows */
    .nh-table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid var(--border-color);
        animation: slideInRow 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        opacity: 0;
        transform: translateX(-20px);
    }

    @keyframes slideInRow {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .nh-table tbody tr:nth-child(1) { animation-delay: 0.05s; }
    .nh-table tbody tr:nth-child(2) { animation-delay: 0.1s; }
    .nh-table tbody tr:nth-child(3) { animation-delay: 0.15s; }
    .nh-table tbody tr:nth-child(4) { animation-delay: 0.2s; }
    .nh-table tbody tr:nth-child(5) { animation-delay: 0.25s; }
    .nh-table tbody tr:nth-child(6) { animation-delay: 0.3s; }
    .nh-table tbody tr:nth-child(7) { animation-delay: 0.35s; }
    .nh-table tbody tr:nth-child(8) { animation-delay: 0.4s; }

    .nh-table tbody tr:hover {
        background: var(--nh-gradient-light);
        transform: translateY(-2px);
        box-shadow: var(--shadow-sm);
    }

    .nh-table tbody td {
        padding: 20px 24px;
        font-size: 15px;
        color: var(--text-primary);
        vertical-align: middle;
        border: none;
    }

    /* User Avatar */
    .user-cell {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .user-avatar {
        width: 48px;
        height: 48px;
        background: var(--nh-gradient);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 16px;
        flex-shrink: 0;
        box-shadow: 0 8px 20px rgba(0, 102, 204, 0.3);
    }

    .user-info h5 {
        font-weight: 700;
        margin: 0 0 4px 0;
        color: var(--nh-dark);
        font-size: 16px;
    }

    .user-info small {
        color: var(--text-secondary);
        font-size: 12px;
        letter-spacing: 0.5px;
    }

    /* Role Badges */
    .role-badge {
        display: inline-flex;
        align-items: center;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.5px;
        gap: 6px;
    }

    .badge-admin {
        background: linear-gradient(135deg, #FF6600 0%, #FF3300 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(255, 102, 0, 0.3);
    }

    .badge-user {
        background: linear-gradient(135deg, #00CC66 0%, #00994D 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(0, 204, 102, 0.3);
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 12px;
        justify-content: flex-end;
    }

    .action-btn {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        border: 2px solid;
    }

    .action-btn i {
        font-size: 18px;
        transition: transform 0.3s ease;
    }

    .action-btn:hover i {
        transform: scale(1.2);
    }

    .btn-edit {
        background: linear-gradient(135deg, #0066CC 0%, #0052A3 100%);
        border-color: #0066CC;
        color: white;
    }

    .btn-delete {
        background: linear-gradient(135deg, #FF3333 0%, #CC0000 100%);
        border-color: #FF3333;
        color: white;
    }

    /* Empty State */
    .empty-state {
        padding: 60px 40px;
        text-align: center;
        background: var(--nh-light);
        border-radius: var(--radius-md);
        margin: 40px;
        border: 2px dashed var(--border-color);
    }

    .empty-state-icon {
        font-size: 64px;
        margin-bottom: 24px;
        opacity: 0.3;
        background: var(--nh-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .empty-state h3 {
        color: var(--nh-dark);
        font-size: 24px;
        margin-bottom: 12px;
        font-weight: 700;
    }

    .empty-state p {
        color: var(--text-secondary);
        max-width: 400px;
        margin: 0 auto 32px;
        font-size: 16px;
    }

    /* Footer */
    .nh-footer {
        padding: 24px 40px;
        background: var(--nh-light);
        border-top: 1px solid var(--border-color);
        text-align: center;
    }

    .footer-text {
        color: var(--text-secondary);
        font-size: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .footer-text i {
        color: var(--nh-primary);
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .nh-container {
            padding: 20px;
        }
        
        .nh-header {
            padding: 24px;
        }
        
        .header-content {
            flex-direction: column;
            text-align: center;
            gap: 24px;
        }
        
        .brand-section {
            flex-direction: column;
            text-align: center;
        }
        
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
            margin: 0 24px 20px;
            padding: 24px;
        }
        
        .table-container {
            padding: 0 24px 24px;
        }
        
        .nh-table thead th {
            padding: 18px 20px;
        }
        
        .nh-table tbody td {
            padding: 16px 20px;
        }
    }

    @media (max-width: 576px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
        
        .action-buttons {
            flex-direction: column;
            gap: 8px;
        }
        
        .action-btn {
            width: 40px;
            height: 40px;
        }
        
        .empty-state {
            padding: 40px 24px;
            margin: 24px;
        }
        
        .user-cell {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 10px;
        height: 10px;
    }

    ::-webkit-scrollbar-track {
        background: var(--nh-light);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: var(--nh-gradient);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #0052A3 0%, #003366 100%);
    }
</style>

<div class="nh-container">

    <div class="nh-card">
        
        <!-- Header -->
        <div class="nh-header">
            <div class="header-content">
                <div class="brand-section">
                    <div class="brand-logo">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <div class="brand-text">
                        <h1>Nhật Phone</h1>
                        <p>QUẢN LÝ NGƯỜI DÙNG HỆ THỐNG</p>
                    </div>
                </div>
                <a href="them-nguoi-dung" class="nh-btn-primary">
                    <i class="fas fa-user-plus"></i>
                    THÊM NGƯỜI DÙNG MỚI
                </a>
            </div>
        </div>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-value">{{ count($users) }}</div>
                <div class="stat-label">TỔNG TÀI KHOẢN</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ $users->where('user_role', 1)->count() }}</div>
                <div class="stat-label">QUẢN TRỊ VIÊN</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ $users->where('user_role', 0)->count() }}</div>
                <div class="stat-label">THÀNH VIÊN</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ $users->count() > 0 ? 'Đang hoạt động' : 'Không có' }}</div>
                <div class="stat-label">TRẠNG THÁI</div>
            </div>
        </div>

        <!-- Users Table -->
        @if(count($users) > 0)
        <div class="table-container">
            <div class="table-responsive">
                <table class="table nh-table">
                    <thead>
                        <tr>
                            <th>THÔNG TIN TÀI KHOẢN</th>
                            <th>HỌ VÀ TÊN</th>
                            <th>ĐỊA CHỈ</th>
                            <th>PHÂN QUYỀN</th>
                            <th class="text-end">THAO TÁC</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <div class="user-cell">
                                    <div class="user-avatar">
                                        {{ strtoupper(substr($user->user_username, 0, 1)) }}
                                    </div>
                                    <div class="user-info">
                                        <h5>{{ $user->user_username }}</h5>
                                        <small>ID: {{ $user->user_id }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <strong>{{ $user->user_fullname }}</strong>
                            </td>
                            <td>{{ $user->user_address }}</td>
                            <td>
                                @if($user->user_role == 1)
                                    <span class="role-badge badge-admin">
                                        <i class="fas fa-crown"></i>
                                        QUẢN TRỊ
                                    </span>
                                @else
                                    <span class="role-badge badge-user">
                                        <i class="fas fa-user"></i>
                                        THÀNH VIÊN
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a class="action-btn btn-edit" 
                                       href="thong-tin-nguoi-dung/{{ $user->user_id }}"
                                       title="Chỉnh sửa thông tin">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="action-btn btn-delete"
                                       onclick="return confirmDelete('{{ $user->user_username }}')"
                                       href="xoa-nguoi-dung/{{ $user->user_id }}"
                                       title="Xóa người dùng">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="fas fa-users-slash"></i>
            </div>
            <h3>CHƯA CÓ NGƯỜI DÙNG</h3>
            <p>Hệ thống chưa có người dùng nào. Hãy thêm người dùng đầu tiên để bắt đầu quản lý.</p>
            <a href="them-nguoi-dung" class="nh-btn-primary">
                <i class="fas fa-plus-circle"></i>
                THÊM NGƯỜI DÙNG ĐẦU TIÊN
            </a>
        </div>
        @endif

        <!-- Footer -->
        <div class="nh-footer">
            <div class="footer-text">
                <i class="fas fa-shield-alt"></i>
                <span>Nhật Phone - Hệ thống quản lý người dùng © 2024</span>
            </div>
        </div>

    </div>

</div>

<!-- JavaScript -->
<script>
    // Confirm delete function
    function confirmDelete(username) {
        return confirm(`Bạn có chắc chắn muốn xóa người dùng "${username}" không?\n\nThao tác này không thể hoàn tác!`);
    }

    // Add animation to stats cards on scroll
    document.addEventListener('DOMContentLoaded', function() {
        const statCards = document.querySelectorAll('.stat-card');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 100);
                }
            });
        }, { threshold: 0.1 });

        statCards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.6s ease';
            observer.observe(card);
        });

        // Add hover effect to table rows
        const tableRows = document.querySelectorAll('.nh-table tbody tr');
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.zIndex = '10';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.zIndex = '1';
            });
        });

        // Update page title
        document.title = `Nhật Phone - Quản lý người dùng (${countUsers})`;
    });

    // Count users variable (from PHP)
    const countUsers = {{ count($users) }};
</script>

@include('admin/template/footer')