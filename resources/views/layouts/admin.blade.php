<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'HappyCare Admin')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --sidebar-width: 240px;
            --header-height: 60px;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f8fa;
            margin: 0;
            padding: 0;
        }
        
        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background-color: #1e2a38;
            color: #fff;
            z-index: 1000;
            transition: all 0.3s;
        }
        
        .sidebar-header {
            padding: 20px;
            background-color: #172331;
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
            color: #a8b6c7;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .sidebar-menu a:hover, .sidebar-menu a.active {
            background-color: #2c3e50;
            color: #fff;
        }
        
        .sidebar-menu i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            min-height: calc(100vh - var(--header-height));
        }
        
        /* Header */
        .header {
            height: var(--header-height);
            background-color: #1e2a38;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
        }
        
        /* Dashboard Cards */
        .dashboard-card {
            border-radius: 8px;
            padding: 20px;
            color: #fff;
            position: relative;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
        
        .dashboard-card .icon {
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .dashboard-card .title {
            font-size: 16px;
            font-weight: 500;
        }
        
        .dashboard-card .value {
            font-size: 36px;
            font-weight: 700;
        }
        
        .dashboard-card .details {
            font-size: 12px;
            margin-top: 10px;
        }
        
        .bg-blue { background: linear-gradient(135deg, #0d6efd, #0a58ca); }
        .bg-cyan { background: linear-gradient(135deg, #0dcaf0, #0aa2c0); }
        .bg-green { background: linear-gradient(135deg, #198754, #146c43); }
        .bg-yellow { background: linear-gradient(135deg, #ffc107, #cc9a05); }
        .bg-gray { background: linear-gradient(135deg, #6c757d, #565e64); }
        
        /* Tables */
        .data-table {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }
        
        .data-table .table {
            margin-bottom: 0;
        }
        
        .data-table-header {
            padding: 15px 20px;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .data-table-header h5 {
            margin: 0;
            font-weight: 600;
        }
        
        .data-table-body {
            padding: 0;
        }
        
        .data-table-footer {
            padding: 15px 20px;
            border-top: 1px solid #e9ecef;
            text-align: right;
        }
        
        /* Realtime indicator */
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
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .connected { background: #10b981; color: white; }
        .disconnected { background: #ef4444; color: white; }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                overflow: hidden;
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .sidebar.active {
                width: var(--sidebar-width);
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
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
                    <button class="btn btn-sm btn-dark dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown">
                        <i class="fas fa-globe"></i> EN
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">English</a></li>
                        <li><a class="dropdown-item" href="#">Indonesia</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-sm btn-dark dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown">
                        <i class="fas fa-user"></i> Admin User
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
                <a href="{{ route('home') }}" class="btn btn-outline-light btn-sm ms-3">
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