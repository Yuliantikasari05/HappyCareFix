<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'HappyCare Admin')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 240px;
            --header-height: 70px;
            --primary: #1696b7; /* Biru sesuai gambar user */
            --secondary: #fbbf24; /* Tailwind yellow-400 */
        }
        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f8fa 60%, #e0e7ff 100%);
            margin: 0;
            padding: 0;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(135deg, var(--primary) 80%, #1e293b 100%);
            color: #fff;
            z-index: 1000;
            transition: all 0.3s;
            border-top-right-radius: 18px;
            border-bottom-right-radius: 18px;
            box-shadow: 2px 0 12px rgba(30,42,56,0.08);
        }
        .sidebar-header {
            padding: 24px 20px 16px 20px;
            background: rgba(255,255,255,0.07);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .sidebar-header img {
            width: 72px;
            height: 72px;
            border-radius: 18px;
            margin-bottom: 12px;
        }
        .sidebar-header h4 {
            font-weight: 700;
            font-size: 1.2rem;
            margin: 0;
            letter-spacing: 1px;
        }
        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .sidebar-menu li {
            margin-bottom: 5px;
        }
        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #e0e7ff;
            text-decoration: none;
            border-radius: 8px 0 0 8px;
            font-weight: 500;
            transition: background 0.2s, color 0.2s, padding-left 0.2s;
        }
        .sidebar-menu a:hover, .sidebar-menu a.active {
            background: linear-gradient(90deg, var(--secondary) 10%, var(--primary) 90%);
            color: #fff;
            padding-left: 28px;
        }
        .sidebar-menu i {
            margin-right: 12px;
            width: 22px;
            text-align: center;
            font-size: 1.1rem;
        }
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 28px 24px 24px 24px;
            min-height: calc(100vh - var(--header-height));
            transition: margin-left 0.3s;
        }
        .header {
            height: var(--header-height);
            background: linear-gradient(90deg, #fff 80%, var(--secondary) 100%);
            color: #1e293b;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(30,42,56,0.07);
            margin-bottom: 32px;
        }
        .header .admin-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 8px;
            border: 2px solid var(--secondary);
        }
        .dashboard-card {
            border-radius: 10px;
            padding: 22px 20px 18px 20px;
            color: #fff;
            position: relative;
            margin-bottom: 22px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .dashboard-card:hover {
            transform: translateY(-4px) scale(1.01);
            box-shadow: 0 8px 24px rgba(0,0,0,0.13);
        }
        .dashboard-card .icon {
            font-size: 28px;
            margin-bottom: 10px;
        }
        .dashboard-card .title {
            font-size: 16px;
            font-weight: 600;
        }
        .dashboard-card .value {
            font-size: 36px;
            font-weight: 700;
        }
        .dashboard-card .details {
            font-size: 13px;
            margin-top: 10px;
        }
        .bg-blue { background: linear-gradient(135deg, #2563eb, #1d4ed8); }
        .bg-cyan { background: linear-gradient(135deg, #38bdf8, #0ea5e9); }
        .bg-green { background: linear-gradient(135deg, #22c55e, #16a34a); }
        .bg-yellow { background: linear-gradient(135deg, #fbbf24, #f59e42); color: #1e293b; }
        .bg-gray { background: linear-gradient(135deg, #64748b, #334155); }
        .data-table {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            margin-bottom: 24px;
        }
        .data-table .table {
            margin-bottom: 0;
        }
        .data-table-header {
            padding: 18px 24px 12px 24px;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .data-table-header h5 {
            margin: 0;
            font-weight: 700;
        }
        .data-table-body {
            padding: 0;
        }
        .data-table-footer {
            padding: 15px 24px;
            border-top: 1px solid #e9ecef;
            text-align: right;
        }
        .realtime-indicator {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 8px;
            height: 8px;
            background: #10b981;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { opacity: 1; box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
            70% { opacity: 0.7; box-shadow: 0 0 0 6px rgba(16, 185, 129, 0); }
            100% { opacity: 1; box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }
        .connection-status {
            padding: 5px 12px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 600;
        }
        .connected { background: #10b981; color: white; }
        .disconnected { background: #ef4444; color: white; }
        @media (max-width: 900px) {
            .sidebar {
                width: 0;
                overflow: hidden;
            }
            .main-content {
                margin-left: 0;
                padding: 16px 6px 16px 6px;
            }
            .sidebar.active {
                width: var(--sidebar-width);
            }
        }
        @media (max-width: 600px) {
            .header {
                flex-direction: column;
                height: auto;
                padding: 12px 8px;
                gap: 8px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="/images/logo.png" alt="Logo">
            <h4>HappyCare Admin</h4>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i> Users Management
                </a>
            </li>
            <li>
                <a href="{{ route('admin.articles.index') }}" class="{{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
                    <i class="fas fa-newspaper"></i> Article Management
                </a>
            </li>
            <li>
                <a href="{{ route('admin.testimonials.index') }}" class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                    <i class="fas fa-comment-dots"></i> Testimonial Management
                </a>
            </li>
            <li>
                <a href="{{ route('admin.hospitals.index') }}" class="{{ request()->routeIs('admin.hospitals.*') ? 'active' : '' }}">
                    <i class="fas fa-hospital"></i> Hospital Management
                </a>
            </li>
            <li>
                <a href="{{ route('admin.tours.index') }}" class="{{ request()->routeIs('admin.tours.*') ? 'active' : '' }}">
                    <i class="fas fa-map-marked-alt"></i> Tours Management
                </a>
            </li>
            <li>
                <a href="{{ route('admin.settings') }}" class="{{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                    <i class="fas fa-cog"></i> Settings
                </a>
            </li>
        </ul>
    </div>
    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header mb-4">
            <div>
                <button id="sidebar-toggle" class="btn btn-sm btn-dark d-md-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="d-flex align-items-center">
                <span id="connection-status" class="connection-status disconnected me-3">
                    Disconnected
                </span>
                <div class="dropdown me-3">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown">
                        <span class="me-1">🇬🇧</span> EN
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><span class="me-1">🇬🇧</span> English</a></li>
                        <li><a class="dropdown-item" href="#"><span class="me-1">🇮🇩</span> Indonesia</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown">
                        <img src="https://ui-avatars.com/api/?name=Admin+User&background=0d6efd&color=fff&rounded=true&size=36" class="admin-avatar" alt="Admin Avatar">
                        <span class="ms-1">Admin User</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm ms-3">
                    <i class="fas fa-external-link-alt"></i> View Site
                </a>
            </div>
        </div>
        <!-- Content -->
        <div class="container-fluid px-0">
            @yield('content')
        </div>
    </div>
    <!-- Pusher JS -->
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar toggle for mobile
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });
        // Setup Pusher
        const pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
            cluster: '{{ env("PUSHER_APP_CLUSTER") }}',
            wsHost: '{{ env("PUSHER_HOST") }}',
            wsPort: {{ env("PUSHER_PORT") }},
            wssPort: {{ env("PUSHER_PORT") }},
            forceTLS: false,
            enabledTransports: ['ws', 'wss'],
        });
        // Connection status
        const statusElement = document.getElementById('connection-status');
        pusher.connection.bind('connected', function() {
            statusElement.textContent = 'Connected';
            statusElement.className = 'connection-status connected me-3';
            console.log('✅ WebSocket Connected');
        });
        pusher.connection.bind('disconnected', function() {
            statusElement.textContent = 'Disconnected';
            statusElement.className = 'connection-status disconnected me-3';
            console.log('❌ WebSocket Disconnected');
        });
        // Subscribe to admin dashboard channel
        const channel = pusher.subscribe('admin-dashboard');
        // Listen for dashboard updates
        channel.bind('dashboard.updated', function(data) {
            console.log('📊 Dashboard data updated:', data);
            updateDashboardUI(data.data);
        });
        // Function to update UI - will be overridden in specific pages
        function updateDashboardUI(data) {
            // Default implementation - will be overridden
            console.log('Dashboard data received:', data);
        }
    </script>
    @stack('scripts')
</body>
</html>