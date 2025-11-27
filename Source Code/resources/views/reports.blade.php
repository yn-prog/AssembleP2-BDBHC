<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - Barangay Daang Bakal Health Center</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

    <style>
        :root {
            --primary-color: #103D87;
            --primary-light: #2563eb;
            --primary-dark: #0c2d5f;
            --secondary-color: #AEC4F5;
            --accent-color: #3b82f6;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --bg-primary: #f8fafc;
            --bg-secondary: #ffffff;
            --border-color: #e5e7eb;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f0f4ff 0%, #e0e9ff 100%);
            display: flex;
            min-height: 100vh;
            color: var(--text-primary);
        }

            /* Enhanced Sidebar */
            .sidebar {
                width: 280px;
                background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
                height: 100vh;
                padding: 0;
                box-shadow: var(--shadow-xl);
                position: fixed;
                left: 0;
                top: 0;
                z-index: 1000;
                border-right: 1px solid var(--border-color);
                display: flex;
                flex-direction: column;
            }

            .sidebar-header {
                padding: 2rem 1.5rem;
                text-align: center;
                border-bottom: 1px solid var(--border-color);
                background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
                color: white;
            }

            .sidebar-logo {
                width: 70px;
                height: 70px;
                border-radius: 50%;
                margin: 0 auto 1rem;
                display: block;
                border: 3px solid rgba(255, 255, 255, 0.2);
                box-shadow: var(--shadow-md);
            }

            .sidebar h2 {
                font-family: 'Inter', sans-serif;
                color: white;
                font-weight: 600;
                font-size: 1.1rem;
                margin: 0;
                line-height: 1.4;
            }

            .sidebar-nav {
                padding: 1.5rem 0;
                flex: 1;
            }

            .nav-link {
                display: flex;
                align-items: center;
                padding: 0.875rem 1.5rem;
                color: var(--text-secondary);
                margin: 0.25rem 1rem;
                border-radius: 12px;
                text-decoration: none;
                font-weight: 500;
                font-size: 0.875rem;
                transition: all 0.2s ease;
                position: relative;
            }

            .nav-link i {
                width: 20px;
                margin-right: 0.75rem;
                font-size: 1rem;
            }

            .nav-link:hover {
                background: linear-gradient(135deg, var(--secondary-color) 0%, #c7d7ff 100%);
                color: var(--primary-color);
                transform: translateX(4px);
            }

            .nav-link.active {
                background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
                color: white;
                font-weight: 600;
                box-shadow: var(--shadow-md);
            }

            .nav-link.active::before {
                content: '';
                position: absolute;
                left: 0;
                top: 50%;
                transform: translateY(-50%);
                width: 4px;
                height: 24px;
                background: white;
                border-radius: 0 4px 4px 0;
            }

            /* Add styles for logout section at bottom */
            .sidebar-logout {
                padding: 1.5rem;
                border-top: 1px solid var(--border-color);
                margin-top: auto;
            }

        /* Main Content */
        .main {
            flex: 1;
            margin-left: 280px;
            padding: 2rem;
            min-height: 100vh;
        }

        /* Enhanced Topbar */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            background: var(--bg-secondary);
            padding: 1rem 1.5rem;
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
        }

        .searchbar {
            position: relative;
            flex: 1;
            max-width: 400px;
        }

        .searchbar input {
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            width: 100%;
            font-size: 0.875rem;
            background: var(--bg-primary);
            transition: all 0.2s ease;
        }

        .searchbar input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(16, 61, 135, 0.1);
        }

        .searchbar i {
            position: absolute;
            left: 0.875rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-primary);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        /* Enhanced Overview Title */
        .overview-title {
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 2rem;
            position: relative;
        }

        .overview-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color) 0%, var(--primary-light) 100%);
            border-radius: 2px;
        }

        /* Enhanced Cards */
        .card {
            background: var(--bg-secondary);
            padding: 2rem;
            border-radius: 16px;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
            transition: all 0.2s ease;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color) 0%, var(--primary-light) 100%);
        }


        .card h4 {
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1.5rem;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Enhanced Chart Containers */
        .chart-container {
            position: relative;
            background: var(--bg-primary);
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 1rem;
        }

        .chart-canvas {
            width: 100% !important;
            height: auto !important;
            max-height: 450px;
            min-height: 300px;
        }

        .age-chart-canvas {
            width: 100% !important;
            height: 400px !important;
        }

        .horizontal-chart-canvas {
            width: 100% !important;
            height: auto !important;
            min-height: 600px;
            max-height: 1000px;
        }

        /* Enhanced Layout */
        .reports-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 2rem;
        }

        .full-width-card {
            grid-column: 1 / -1;
        }

        /* Enhanced Select Dropdown */
        .enhanced-select {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .enhanced-select select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            background: var(--bg-secondary);
            font-family: 'Inter', sans-serif;
            font-size: 0.875rem;
            color: var(--text-primary);
            cursor: pointer;
            transition: all 0.2s ease;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20width%3D%2210%22%20height%3D%227%22%20viewBox%3D%220%200%2010%207%22%20xmlns%3D%22http://www.w3.org/2000/svg%22%3E%3Cpath%20d%3D%22M0%200l5%207%205-7z%22%20fill%3D%22%23103D87%22/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 10px 7px;
        }

        .enhanced-select select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(16, 61, 135, 0.1);
        }

        .enhanced-select label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text-primary);
            font-size: 0.875rem;
        }

        /* Enhanced Summary Display */
        .summary-display {
            background: linear-gradient(135deg, var(--secondary-color) 0%, #c7d7ff 100%);
            border-radius: 12px;
            padding: 1.5rem;
            margin: 1rem 0;
            text-align: center;
            border: 1px solid rgba(16, 61, 135, 0.2);
        }

        .summary-display h5 {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .summary-text {
            color: var(--primary-dark);
            font-weight: 600;
            font-size: 0.875rem;
            line-height: 1.6;
        }

        /* Enhanced Statistics Cards */
        .stats-overview {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--bg-secondary);
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color) 0%, var(--primary-light) 100%);
        }

        .stat-card h4 {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }

        .stat-card h2 {
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-card .stat-icon {
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--secondary-color) 0%, #c7d7ff 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 1rem;
        }

        /* Enhanced Table Styling */
        .table-section {
            background: var(--bg-secondary);
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
            position: relative;
            overflow: hidden;
        }

        .table-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--accent-color) 0%, var(--primary-light) 100%);
        }

        .table-filter-section {
            background: var(--bg-primary);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border: 1px solid var(--border-color);
        }

        .table-filter-section label {
            display: block;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
        }

        .table-filter-section select {
            width: 100%;
            max-width: 300px;
            padding: 0.875rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            background: var(--bg-secondary);
            font-family: 'Inter', sans-serif;
            font-size: 0.875rem;
            color: var(--text-primary);
            cursor: pointer;
            transition: all 0.2s ease;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20width%3D%2210%22%20height%3D%227%22%20viewBox%3D%220%200%2010%207%22%20xmlns%3D%22http://www.w3.org/2000/svg%22%3E%3Cpath%20d%3D%22M0%200l5%207%205-7z%22%20fill%3D%22%23103D87%22/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 10px 7px;
        }

        .table-filter-section select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(16, 61, 135, 0.1);
        }

        .table-section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .table-section-title i {
            color: var(--accent-color);
            font-size: 1.25rem;
        }

        .data-table-container {
            background: var(--bg-primary);
            border-radius: 12px;
            padding: 1.5rem;
            margin: 1.5rem 0;
            border: 1px solid var(--border-color);
            overflow-x: auto;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Inter', sans-serif;
            background: var(--bg-secondary);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .data-table thead {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
        }

        .data-table th {
            padding: 1.9rem 1.5rem;
            text-align: left;
            font-weight: 600;
            font-size: 0.95rem;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
        }

        .data-table td {
            padding: 1.50rem 1.50rem;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.95rem;
            color: var(--text-primary);
            font-weight: 500;
        }

        .data-table tbody tr {
            transition: all 0.2s ease;
        }

        .data-table tbody tr:last-child td {
            border-bottom: none;
        }

        .data-table td:first-child {
            font-weight: 600;
            color: var(--primary-color);
        }

        .data-table td:last-child {
            font-weight: 700;
            color: var(--accent-color);
            text-align: center;
            background: linear-gradient(135deg, var(--secondary-color) 0%, #c7d7ff 100%);
            border-radius: 8px;
            margin: 0.25rem;
            width: 120px;
        }

        .data-table .empty-state {
            text-align: center;
            padding: 3rem 1.5rem;
            color: var(--text-secondary);
            font-style: italic;
        }

        /* Export Button */
        .export-button {
            background: linear-gradient(135deg, var(--success-color) 0%, #059669 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .export-button:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* Chart Header */
        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .chart-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .chart-subtitle {
            font-size: 0.875rem;
            color: var(--text-secondary);
            margin-top: 0.25rem;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .main {
                margin-left: 0;
            }
            
            .topbar {
                flex-direction: column;
                gap: 1rem;
            }
            
            .searchbar {
                max-width: none;
            }
            
            .reports-grid {
                grid-template-columns: 1fr;
            }

            .data-table th,
            .data-table td {
                padding: 1rem;
                font-size: 0.875rem;
            }

            .horizontal-chart-canvas {
                min-height: 400px;
                max-height: 600px;
            }
        }

        @media (max-width: 768px) {
            .main {
                padding: 1rem;
            }
            
            .overview-title {
                font-size: 1.5rem;
            }
            
            .card {
                padding: 1.5rem;
            }
            
            .stats-overview {
                grid-template-columns: 1fr;
            }

            .table-section {
                padding: 1.5rem;
            }

            .data-table-container {
                padding: 1rem;
            }

            .data-table th,
            .data-table td {
                padding: 0.875rem;
                font-size: 0.8rem;
            }

            .table-section-title {
                font-size: 1.25rem;
            }

            .age-chart-canvas {
                height: 300px !important;
            }

            .horizontal-chart-canvas {
                min-height: 350px;
                max-height: 500px;
            }
        }

        /* Loading Animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(16, 61, 135, 0.3);
            border-radius: 50%;
            border-top-color: var(--primary-color);
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .print-button {
    background-color: #007bff; /* Bootstrap primary */
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 14px;
    transition: background-color 0.3s ease;
}
.print-button:hover {
    background-color: #0056b3;
}
.print-button i {
    font-size: 14px;
}

/* Add notification styles */
.notification {
    animation: slideInRight 0.3s ease-out;
}

@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

.notification:hover {
    transform: translateX(0) scale(1.02);
    transition: transform 0.2s ease;
}
    </style>
</head>
<body>
        <div class="sidebar">
            <div class="sidebar-header">
                <img src="{{ asset('images/logo2.png') }}" alt="Barangay Logo" class="sidebar-logo">
                <h2>Barangay Daang Bakal<br>Health Center</h2>
            </div>
            
            <nav class="sidebar-nav">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-line"></i>
                    Dashboard
                </a>
                <a href="{{ route('health.records') }}" class="nav-link {{ request()->routeIs('health.records') ? 'active' : '' }}">
                    <i class="fas fa-file-medical"></i>
                    Patient Health Records
                </a>
                <a href="{{ route('prediction.model') }}" class="nav-link {{ request()->routeIs('prediction.model') ? 'active' : '' }}">
                    <i class="fas fa-brain"></i>
                    Prediction Model
                </a>
                <a href="{{ route('reports') }}" class="nav-link {{ request()->routeIs('reports') ? 'active' : '' }}">
                    <i class="fas fa-chart-bar"></i>
                    Reports
                </a>
            </nav>

            <div class="sidebar-logout">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

    <div class="main">
        <div class="topbar">
            <div class="searchbar">
            </div>
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user-md"></i>
                </div>
                <div>
                    <div style="font-weight: 600;">{{ Auth::user()->name }}</div>
                    <div style="font-size: 0.75rem; color: var(--text-secondary);">{{ Auth::user()->role ?? 'User' }}</div>
                </div>
            </div>
        </div>

        <div class="overview-title">Health Analytics & Reports</div>

        <!-- Statistics Overview -->
        <div class="stats-overview">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h4>Total Patients</h4>
                <h2 id="total-patients">{{ array_sum($ageGroupsTotals ?? []) }}</h2>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <h4>Age Groups</h4>
                <h2>{{ count($ageGroupsTotals ?? []) }}</h2>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-virus"></i>
                </div>
                <h4>Total Diagnoses Tracked</h5>
                <h2>{{ $totalDiagnosesTracked }}</h2>
            </div>
        </div>


       <!-- Charts Grid -->
        <div class="reports-grid">
            <!-- Cases per Street - TABLE FORMAT -->
            <div class="card">
                <h4>
                    <i class="fas fa-map-marker-alt" style="color: var(--accent-color);"></i>
                    Cases per Street
                </h4>

                <div class="table-filter-section">
    <label for="streetFilter">Filter by Street:</label>
    <select id="streetFilter">
        <option value="">All Streets</option>
        @foreach ($allStreets as $street)
            <option value="{{ $street }}" {{ $selectedStreet == $street ? 'selected' : '' }}>
                {{ $street }}
            </option>
        @endforeach
    </select>
</div>


                <!-- Street Table -->
                <div class="data-table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>
                                    <i class="fas fa-road" style="margin-right: 0.5rem;"></i>
                                    Street Name
                                </th>
                                <th>
                                    <i class="fas fa-hashtag" style="margin-right: 0.5rem;"></i>
                                    Number of Cases
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($casesPerStreet as $row)
                                <tr>
                                    <td>{{ $row->street }}</td>
                                    <td>{{ $row->total }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="empty-state">
                                        <i class="fas fa-info-circle" style="margin-right: 0.5rem;"></i>
                                        No data available for the selected criteria.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Summary Display -->
                <div class="summary-display">
                    <h5>Total Cases by Street</h5>
                    <div class="summary-text">
                        @php
                            $totalStreetCases = collect($casesPerStreet)->sum('total');
                            $streetCount = count($casesPerStreet);
                        @endphp
                        <div style="font-weight: 600; margin-bottom: 0.5rem;">
                            {{ $totalStreetCases }} total cases across {{ $streetCount }} streets
                        </div>
                        @if($streetCount > 0)
                            @php
                                $topStreet = collect($casesPerStreet)->sortByDesc('total')->first();
                            @endphp
                            <div style="font-size: 0.8rem;">
                                Highest: {{ $topStreet->street }} ({{ $topStreet->total }} cases)
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Gender Distribution - CHART -->
            <div class="card">
                <h4>
                    <i class="fas fa-chart-pie" style="color: var(--success-color);"></i>
                    Gender Distribution
                </h4>
                
                <!-- Gender Summary matching street summary style -->
                <div class="summary-display">
                    <h5>Gender Breakdown</h5>
                    <div class="summary-text" id="genderSummaryText">
                        @php
                            $totalGenderCases = array_sum($genderTotals ?? []);
                            $maleCount = $genderTotals['Male'] ?? 0;
                            $femaleCount = $genderTotals['Female'] ?? 0;
                            $malePercentage = $totalGenderCases > 0 ? round(($maleCount / $totalGenderCases) * 100, 1) : 0;
                            $femalePercentage = $totalGenderCases > 0 ? round(($femaleCount / $totalGenderCases) * 100, 1) : 0;
                            $dominantGender = $maleCount > $femaleCount ? 'Male' : 'Female';
                            $dominantCount = max($maleCount, $femaleCount);
                            $dominantPercentage = $dominantGender === 'Male' ? $malePercentage : $femalePercentage;
                        @endphp
                        <div style="font-weight: 600; margin-bottom: 0.5rem;">
                            {{ $totalGenderCases }} total patients across 2 genders
                        </div>
                        <div style="font-size: 0.8rem;">
                            Highest: {{ $dominantGender }} ({{ $dominantCount }} patients - {{ $dominantPercentage }}%)
                        </div>
                    </div>
                </div>

                <div class="chart-container">
                    <canvas id="genderChart" class="chart-canvas"></canvas>
                </div>
            </div>
        </div>

        <!-- Age Group Distribution - VERTICAL BAR CHART with Blue Shades -->
<div class="table-section">
    <h4 class="table-section-title">
        <i class="fas fa-chart-bar"></i>
        Age Group Distribution
    </h4>

    <!-- <CHANGE> Add independent date filters for Age Group Distribution -->
    <div class="age-group-filter-section" style="margin-bottom: 20px; padding: 15px; background-color: #f8f9fa; border-radius: 8px; border: 1px solid #dee2e6;">
        <div style="display: flex; gap: 15px; align-items: center; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 200px;">
                <label for="ageFromDate" style="display: block; margin-bottom: 5px; font-weight: 600; color: #495057;">
                    <i class="fas fa-calendar" style="margin-right: 5px;"></i>From Date:
                </label>
                <input type="date" id="ageFromDate" 
                       style="width: 100%; padding: 8px 12px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px;">
            </div>
            <div style="flex: 1; min-width: 200px;">
                <label for="ageToDate" style="display: block; margin-bottom: 5px; font-weight: 600; color: #495057;">
                    <i class="fas fa-calendar" style="margin-right: 5px;"></i>To Date:
                </label>
                <input type="date" id="ageToDate" 
                       style="width: 100%; padding: 8px 12px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px;">
            </div>
            <div style="display: flex; gap: 10px; align-items: end;">
                <button onclick="applyAgeGroupDateRange()" 
                        style="padding: 8px 16px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">
                    <i class="fas fa-check" style="margin-right: 5px;"></i>Apply
                </button>
                <button onclick="clearAgeGroupDateRange()" 
                        style="padding: 8px 16px; background-color: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">
                    <i class="fas fa-times" style="margin-right: 5px;"></i>Clear
                </button>
            </div>
        </div>
    </div>

    <!-- Age Group Summary Display -->
    <div class="summary-display">
        <h5>Age Group Breakdown</h5>
        <div class="summary-text">
            @php
                $totalAgeGroupCases = array_sum($ageGroupsTotals ?? []);
                $ageGroupCount = count($ageGroupsTotals ?? []);
            @endphp
            <div style="font-weight: 600; margin-bottom: 0.5rem;">
                {{ $totalAgeGroupCases }} total patients across {{ $ageGroupCount }} age groups
            </div>
            @if($ageGroupCount > 0)
                @php
                    $topAgeGroup = collect($ageGroupsTotals ?? [])->sortDesc()->keys()->first();
                    $topAgeGroupCount = collect($ageGroupsTotals ?? [])->max();
                @endphp
                <div style="font-size: 0.8rem;">
                    Highest: {{ $topAgeGroup }} ({{ $topAgeGroupCount }} patients)
                </div>
            @endif
        </div>
    </div>

    <!-- Age Group Chart -->
    <div class="chart-container">
        <canvas id="ageChart" class="age-chart-canvas"></canvas>
    </div>
</div>

        <!-- Cases by Diagnosis - Full Width -->
        <div class="card full-width-card">
            <div class="chart-header">
                <div>
                    <h4>
                        <i class="fas fa-stethoscope" style="color: var(--warning-color);"></i>
                        Cases by Diagnosis
                    </h4>
                    <div class="chart-subtitle">Total cases per diagnosis (horizontal view)</div>
                </div>
                    
                <button id="printReportsBtn" class="btn btn-primary print-button">
    <i class="fas fa-print"></i>
    <span>Print Reports</span>
</button>
            </div>

            <div class="diagnosis-filter-section" style="margin-bottom: 20px; padding: 15px; background-color: #f8f9fa; border-radius: 8px; border: 1px solid #dee2e6;">
                <div style="display: flex; gap: 15px; align-items: center; flex-wrap: wrap;">
                    <div style="flex: 1; min-width: 250px;">
                        <label for="diagnosisSearch" style="display: block; margin-bottom: 5px; font-weight: 600; color: #495057;">
                            <i class="fas fa-search" style="margin-right: 5px;"></i>Search Diagnoses:
                        </label>
                        <!-- Added onkeydown event to handle Enter key press -->
                        <input type="text" id="diagnosisSearch" placeholder="Type to search diagnoses and press Enter..." 
                               style="width: 100%; padding: 8px 12px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px;"
                               onkeyup="filterDiagnosisList()" onkeydown="handleDiagnosisSearch(event)">
                    </div>
                    <div style="flex: 1; min-width: 250px;">
                        <label for="diagnosisSelect" style="display: block; margin-bottom: 5px; font-weight: 600; color: #495057;">
                            <i class="fas fa-filter" style="margin-right: 5px;"></i>Filter by Diagnosis:
                        </label>
                        <select id="diagnosisSelect" onchange="filterDiagnosisChart()" 
                                style="width: 100%; padding: 8px 12px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px;">
                            <option value="">All Diagnoses</option>
                            @foreach ($allDiagnoses->sort() as $diagnosis)
                                <option value="{{ $diagnosis }}">{{ $diagnosis }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <button onclick="resetDiagnosisFilter()" 
                                style="padding: 8px 16px; background-color: #6c757d; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">
                            <i class="fas fa-undo" style="margin-right: 5px;"></i>Reset
                        </button>
                        <button onclick="showAllDiagnoses()" 
                                style="padding: 8px 16px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">
                            <i class="fas fa-eye" style="margin-right: 5px;"></i>Show All
                        </button>
                    </div>
                </div>
                
                <!-- Added date range filter section -->
                <div style="display: flex; gap: 15px; align-items: center; flex-wrap: wrap; margin-top: 15px; padding-top: 15px; border-top: 1px solid #dee2e6;">
                    <div style="flex: 1; min-width: 200px;">
                        <label for="fromDate" style="display: block; margin-bottom: 5px; font-weight: 600; color: #495057;">
                            <i class="fas fa-calendar" style="margin-right: 5px;"></i>From Date:
                        </label>
                        <input type="date" id="fromDate" 
                               style="width: 100%; padding: 8px 12px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px;">
                    </div>
                    <div style="flex: 1; min-width: 200px;">
                        <label for="toDate" style="display: block; margin-bottom: 5px; font-weight: 600; color: #495057;">
                            <i class="fas fa-calendar" style="margin-right: 5px;"></i>To Date:
                        </label>
                        <input type="date" id="toDate" 
                               style="width: 100%; padding: 8px 12px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px;">
                    </div>
                    <div style="display: flex; gap: 10px; align-items: end;">
                        <button onclick="applyDateRange()" 
                                style="padding: 8px 16px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">
                            <i class="fas fa-check" style="margin-right: 5px;"></i>Apply
                        </button>
                        <button onclick="clearDateRange()" 
                                style="padding: 8px 16px; background-color: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">
                            <i class="fas fa-times" style="margin-right: 5px;"></i>Clear
                        </button>
                    </div>
                </div>
            </div>

            <div class="summary-display" id="diagnosisTotals">
                <h5>Total Diagnosis Cases</h5>
                <div class="summary-text" id="diagnosisTotalsText"></div>
            </div>

            <div class="chart-container">
                <canvas id="diagnosisChart" class="horizontal-chart-canvas"></canvas>
            </div>
        </div>
    </div>

    <!-- Added custom modal for no diagnosis found message -->
    <!-- Custom Modal for No Diagnosis Found -->
    <div id="noDiagnosisModal" class="modal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5);">
        <div class="modal-content" style="background-color: #fff; margin: 15% auto; padding: 0; border-radius: 8px; width: 400px; box-shadow: 0 4px 20px rgba(0,0,0,0.3); animation: modalSlideIn 0.3s ease-out;">
            <div class="modal-header" style="background: linear-gradient(135deg, #2563eb, #1d4ed8); color: white; padding: 20px; border-radius: 8px 8px 0 0; text-align: center;">
                <h4 style="margin: 0; font-size: 18px; font-weight: 600;">
                    <i class="fas fa-search" style="margin-right: 8px;"></i>
                    Search Result
                </h4>
            </div>
            <div class="modal-body" style="padding: 30px 20px; text-align: center;">
                <div style="color: #6b7280; font-size: 16px; margin-bottom: 20px;">
                    <i class="fas fa-exclamation-circle" style="color: #f59e0b; font-size: 24px; margin-bottom: 10px;"></i>
                    <p style="margin: 0; line-height: 1.5;">
                        No diagnosis found matching <strong id="searchedTerm" style="color: #2563eb;"></strong>
                    </p>
                    <p style="margin: 10px 0 0 0; font-size: 14px; color: #9ca3af;">
                        Please try a different search term or browse all diagnoses.
                    </p>
                </div>
            </div>
            <div class="modal-footer" style="padding: 0 20px 20px 20px; text-align: center;">
                <button onclick="closeNoDiagnosisModal()" style="background: #2563eb; color: white; border: none; padding: 10px 24px; border-radius: 6px; font-size: 14px; font-weight: 500; cursor: pointer; transition: background-color 0.2s;">
                    OK
                </button>
            </div>
        </div>
    </div>

    <!-- Data Script -->
    <script id="data-json" type="application/json">
        {!! json_encode([
            'ageGroupsTotals' => $ageGroupsTotals ?? [],
            'genderTotals' => $genderTotals ?? [],
            'diagnosisBreakdown' => $diagnosisBreakdown ?? (object)[],
            'casesPerStreet' => $casesPerStreet ?? [],
        ]) !!}
    </script>
    
    <script>
document.getElementById('streetFilter').addEventListener('change', function () {
    const selectedStreet = this.value;

    // Build request URL (point it to a new JSON route you expose in Laravel)
    const url = `{{ route('reports.casesPerStreetData') }}?street=${encodeURIComponent(selectedStreet)}`;

    fetch(url, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(res => res.json())
    .then(data => {
        const tbody = document.querySelector('.data-table tbody');
        tbody.innerHTML = '';

        if (!data.casesPerStreet || data.casesPerStreet.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="2" class="empty-state">
                        <i class="fas fa-info-circle" style="margin-right: 0.5rem;"></i>
                        No data available for the selected street.
                    </td>
                </tr>`;
        } else {
            data.casesPerStreet.forEach(row => {
                tbody.innerHTML += `
                    <tr>
                        <td>${row.street}</td>
                        <td>${row.total}</td>
                    </tr>`;
            });
        }

        // Update summary box too
        const total = data.casesPerStreet.reduce((sum, r) => sum + r.total, 0);
        const count = data.casesPerStreet.length;

        let summaryHtml = `<div style="font-weight: 600; margin-bottom: 0.5rem;">
            ${total} total cases across ${count} streets
        </div>`;

        if (count > 0) {
            const topStreet = data.casesPerStreet[0];
            summaryHtml += `<div style="font-size: 0.8rem;">
                Highest: ${topStreet.street} (${topStreet.total} cases)
            </div>`;
        }

        document.querySelector('.summary-display .summary-text').innerHTML = summaryHtml;
    })
    .catch(err => console.error('Street filter error:', err));
});
</script>

    <!-- Chart.js Scripts -->
    <script>
        // Register Chart.js plugins
        Chart.register(ChartDataLabels);

        // Parse data from backend
        const data = JSON.parse(document.getElementById('data-json').textContent);
        const ageData = Object.values(data.ageGroupsTotals);
        const ageLabels = Object.keys(data.ageGroupsTotals);
        const genderData = Object.values(data.genderTotals);
        const genderLabels = Object.keys(data.genderTotals);
        const diagnosisBreakdown = data.diagnosisBreakdown;

        // Enhanced color schemes aligned with design system
        const chartColors = {
            primary: '#103D87',
            primaryLight: '#2563eb',
            primaryDark: '#0c2d5f',
            secondary: '#AEC4F5',
            success: '#10b981',
            warning: '#f59e0b',
            danger: '#ef4444',
            info: '#3b82f6',
            accent: '#3b82f6'
        };

        // Blue shades for age groups - different shades of blue
        const blueShades = [
            '#0c2d5f',  // Very dark blue
            '#103D87',  // Primary dark blue
            '#2563eb',  // Primary light blue
            '#60a5fa',  // Light blue
            '#93c5fd',  // Very light blue
            '#dbeafe'   // Lightest blue
        ];

        // Age Group Chart - NOW AS VERTICAL BAR CHART with Blue Shades
        const ageCtx = document.getElementById('ageChart').getContext('2d');
        const totalPatients = ageData.reduce((a, b) => a + b, 0);

        // Generate blue shades for each age group
        const ageColors = ageLabels.map((_, index) => {
            return blueShades[index % blueShades.length];
        });

        new Chart(ageCtx, {
            type: 'bar',
            data: {
                labels: ageLabels,
                datasets: [{
                    label: `Number of Patients (Total: ${totalPatients})`,
                    data: ageData,
                    backgroundColor: ageColors,
                    borderColor: ageColors.map(color => color),
                    borderWidth: 2,
                    borderRadius: 8,
                    borderSkipped: false,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                indexAxis: 'x', // CHANGED: This makes it vertical (x-axis for categories)
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: {
                                family: 'Inter',
                                weight: '600'
                            },
                            color: '#1f2937'
                        }
                    },
                    datalabels: {
                        anchor: 'end',
                        align: 'top', // CHANGED: Labels on top for vertical bars
                        color: '#1f2937',
                        font: {
                            weight: 'bold',
                            family: 'Inter',
                            size: 12
                        },
                        formatter: function(value) {
                            return value + (value === 1 ? ' patient' : ' patients');
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(16, 61, 135, 0.9)',
                        titleFont: {
                            family: 'Inter',
                            weight: '600'
                        },
                        bodyFont: {
                            family: 'Inter'
                        },
                        borderColor: chartColors.primary,
                        borderWidth: 1,
                        callbacks: {
                            label: function(context) {
                                const patients = context.parsed.y; // CHANGED: y for vertical bars
                                return `${context.label}: ${patients} patient${patients !== 1 ? 's' : ''}`;
                            }
                        }
                    }
                },
                scales: {
                    y: { // CHANGED: y-axis for values in vertical chart
                        beginAtZero: true,
                        grid: {
                            color: '#e5e7eb'
                        },
                        ticks: {
                            font: {
                                family: 'Inter'
                            },
                            color: '#6b7280',
                            stepSize: 1
                        }
                    },
                    x: { // CHANGED: x-axis for categories in vertical chart
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                family: 'Inter',
                                weight: '500'
                            },
                            color: '#6b7280'
                        }
                    }
                },
                animation: {
                    duration: 1000,
                    easing: 'easeOutQuart'
                }
            },
            plugins: [ChartDataLabels]
        });

        // Gender Chart
        const genderCtx = document.getElementById('genderChart').getContext('2d');
        const genderLabelsWithCount = genderLabels.map((label, i) => `${label}: ${genderData[i]}`);

        new Chart(genderCtx, {
            type: 'doughnut',
            data: {
                labels: genderLabelsWithCount,
                datasets: [{
                    data: genderData,
                    backgroundColor: [chartColors.primary, chartColors.danger],
                    borderColor: '#ffffff',
                    borderWidth: 3,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                family: 'Inter',
                                weight: '500'
                            },
                            color: '#1f2937',
                            padding: 20,
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    },
                    datalabels: {
                        color: '#ffffff',
                        font: {
                            weight: 'bold',
                            size: 14,
                            family: 'Inter'
                        },
                        formatter: (value) => value
                    }
                }
            },
            plugins: [ChartDataLabels]
        });

        // Diagnosis Chart - Proper Horizontal Bar Chart showing diagnoses
        const diagnosisCtx = document.getElementById('diagnosisChart').getContext('2d');

        // Calculate total cases per diagnosis from the breakdown data
        function calculateDiagnosisTotals() {
            const diagnosisTotals = {};
            
            Object.keys(diagnosisBreakdown).forEach(diagnosis => {
                let total = 0;
                Object.keys(diagnosisBreakdown[diagnosis]).forEach(ageGroup => {
                    const ageData = diagnosisBreakdown[diagnosis][ageGroup];
                    total += (ageData.Male || 0) + (ageData.Female || 0);
                });
                diagnosisTotals[diagnosis] = total;
            });
            
            return diagnosisTotals;
        }

        const diagnosisTotals = calculateDiagnosisTotals();
        const diagnosisLabels = Object.keys(diagnosisTotals);
        const diagnosisValues = Object.values(diagnosisTotals);

        let currentDiagnosisChart = null;
        let allDiagnosesData = diagnosisLabels
            .map((label, index) => ({ label, value: diagnosisValues[index] }))
            .sort((a, b) => b.value - a.value);

        function filterDiagnosisList() {
            const searchTerm = document.getElementById('diagnosisSearch').value.toLowerCase();
            const select = document.getElementById('diagnosisSelect');
            const options = select.querySelectorAll('option');
            
            options.forEach(option => {
                if (option.value === '') return; // Keep "All Diagnoses" option
                const text = option.textContent.toLowerCase();
                option.style.display = text.includes(searchTerm) ? 'block' : 'none';
            });
        }
// <CHANGE> AJAX-based Age Group Distribution filter - updates only the table without page reload

let ageGroupChart = null; // Store chart instance for updating

// Initialize chart reference when page loads
document.addEventListener('DOMContentLoaded', function() {
    // Store reference to existing chart
    const chartCanvas = document.getElementById('ageChart');
    if (chartCanvas && chartCanvas.chart) {
        ageGroupChart = chartCanvas.chart;
    }
    
    // Check if age group filters were applied and show notification
    const urlParams = new URLSearchParams(window.location.search);
    const hasAgeGroupFilter = urlParams.has('age_date_from') && urlParams.has('age_date_to');
    
    if (hasAgeGroupFilter) {
        const fromDate = urlParams.get('age_date_from');
        const toDate = urlParams.get('age_date_to');
        showNotification(`Age group filter applied successfully! (${fromDate} to ${toDate})`, 'success');
    }
});

function applyAgeGroupDateRange() {
    const fromDate = document.getElementById('ageFromDate').value;
    const toDate = document.getElementById('ageToDate').value;
    
    if (!fromDate || !toDate) {
        showNotification('Please select both From Date and To Date', 'error');
        return;
    }
    
    if (fromDate > toDate) {
        showNotification('From Date cannot be later than To Date', 'error');
        return;
    }
    
    // Show loading notification
    showNotification('Applying age group date filter...', 'loading');
    
    // Build URL with age group date parameters for AJAX request
    const url = new URL('{{ route('reports') }}');
    url.searchParams.set('age_date_from', fromDate);
    url.searchParams.set('age_date_to', toDate);
    
    // Preserve existing diagnosis filters
    const diagnosisSelect = document.getElementById('diagnosisSelect');
    if (diagnosisSelect && diagnosisSelect.value) {
        url.searchParams.set('diagnosis', diagnosisSelect.value);
    }
    
    const fromDateDiagnosis = document.getElementById('fromDate');
    if (fromDateDiagnosis && fromDateDiagnosis.value) {
        url.searchParams.set('date_from', fromDateDiagnosis.value);
    }
    
    const toDateDiagnosis = document.getElementById('toDate');
    if (toDateDiagnosis && toDateDiagnosis.value) {
        url.searchParams.set('date_to', toDateDiagnosis.value);
    }
    
    // <CHANGE> Make AJAX request instead of full page reload
    fetch(url.toString())
        .then(response => response.text())
        .then(html => {
            // Parse the response HTML
            const parser = new DOMParser();
            const newDoc = parser.parseFromString(html, 'text/html');
            
            // Extract the age group data from the new document
            const newDataJson = newDoc.getElementById('data-json');
            if (newDataJson) {
                const newData = JSON.parse(newDataJson.textContent);
                
                // Update the age group summary display
                updateAgeGroupSummary(newData.ageGroupsTotals);
                
                // Update the chart with new data
                updateAgeGroupChart(newData.ageGroupsTotals);
                
                // Update URL without reloading
                window.history.pushState({}, '', url.toString());
                
                showNotification(`Age group filter applied successfully! (${fromDate} to ${toDate})`, 'success');
            }
        })
        .catch(error => {
            console.error('Error applying age group filter:', error);
            showNotification('Error applying filter. Please try again.', 'error');
        });
}

function clearAgeGroupDateRange() {
    document.getElementById('ageFromDate').value = '';
    document.getElementById('ageToDate').value = '';
    
    // Show loading notification
    showNotification('Clearing age group date filter...', 'loading');
    
    // Build URL without age group date parameters
    const url = new URL(window.location.href);
    url.searchParams.delete('age_date_from');
    url.searchParams.delete('age_date_to');
    
    // <CHANGE> Make AJAX request to clear filter
    fetch(url.toString())
        .then(response => response.text())
        .then(html => {
            // Parse the response HTML
            const parser = new DOMParser();
            const newDoc = parser.parseFromString(html, 'text/html');
            
            // Extract the age group data from the new document
            const newDataJson = newDoc.getElementById('data-json');
            if (newDataJson) {
                const newData = JSON.parse(newDataJson.textContent);
                
                // Update the age group summary display
                updateAgeGroupSummary(newData.ageGroupsTotals);
                
                // Update the chart with new data
                updateAgeGroupChart(newData.ageGroupsTotals);
                
                // Update URL without reloading
                window.history.pushState({}, '', url.toString());
                
                showNotification('Age group filter cleared successfully!', 'success');
            }
        })
        .catch(error => {
            console.error('Error clearing age group filter:', error);
            showNotification('Error clearing filter. Please try again.', 'error');
        });
}

function updateAgeGroupSummary(ageGroupsTotals) {
    // <CHANGE> Update the summary display with new data
    const totalAgeGroupCases = Object.values(ageGroupsTotals).reduce((a, b) => a + b, 0);
    const ageGroupCount = Object.keys(ageGroupsTotals).length;
    
    const summaryDisplay = document.querySelector('.age-group-filter-section').nextElementSibling;
    if (summaryDisplay && summaryDisplay.classList.contains('summary-display')) {
        const summaryText = summaryDisplay.querySelector('.summary-text');
        if (summaryText) {
            let html = `<div style="font-weight: 600; margin-bottom: 0.5rem;">
                ${totalAgeGroupCases} total patients across ${ageGroupCount} age groups
            </div>`;
            
            if (ageGroupCount > 0) {
                const topAgeGroup = Object.keys(ageGroupsTotals).reduce((a, b) => 
                    ageGroupsTotals[a] > ageGroupsTotals[b] ? a : b
                );
                const topAgeGroupCount = Math.max(...Object.values(ageGroupsTotals));
                html += `<div style="font-size: 0.8rem;">
                    Highest: ${topAgeGroup} (${topAgeGroupCount} patients)
                </div>`;
            }
            
            summaryText.innerHTML = html;
        }
    }
}

function updateAgeGroupChart(ageGroupsTotals) {
    // <CHANGE> Update chart data without reloading page
    const ageLabels = Object.keys(ageGroupsTotals);
    const ageData = Object.values(ageGroupsTotals);
    
    // Blue shades for age groups
    const blueShades = [
        '#0c2d5f',  // Very dark blue
        '#103D87',  // Primary dark blue
        '#2563eb',  // Primary light blue
        '#60a5fa',  // Light blue
        '#93c5fd',  // Very light blue
        '#dbeafe'   // Lightest blue
    ];
    
    const ageColors = ageLabels.map((_, index) => {
        return blueShades[index % blueShades.length];
    });
    
    const totalPatients = ageData.reduce((a, b) => a + b, 0);
    
    // Get the chart instance from the canvas
    const chartCanvas = document.getElementById('ageChart');
    const chartInstance = Chart.getChart(chartCanvas);
    
    if (chartInstance) {
        // Update chart data
        chartInstance.data.labels = ageLabels;
        chartInstance.data.datasets[0].data = ageData;
        chartInstance.data.datasets[0].backgroundColor = ageColors;
        chartInstance.data.datasets[0].borderColor = ageColors;
        chartInstance.data.datasets[0].label = `Number of Patients (Total: ${totalPatients})`;
        
        // Animate the update
        chartInstance.update('active');
    }
}
        function handleDiagnosisSearch(event) {
            if (event.key === 'Enter') {
                const searchTerm = document.getElementById('diagnosisSearch').value.toLowerCase().trim();
                
                if (searchTerm === '') {
                    // If search is empty, reset to show top 15
                    resetDiagnosisFilter();
                    return;
                }
                
                // Find exact or partial match in diagnoses
                const matchingDiagnosis = allDiagnosesData.find(item => 
                    item.label.toLowerCase().includes(searchTerm)
                );
                
                if (matchingDiagnosis) {
                    // Update the dropdown selection
                    document.getElementById('diagnosisSelect').value = matchingDiagnosis.label;
                    // Filter the chart to show only this diagnosis
                    const filteredData = [matchingDiagnosis];
                    updateDiagnosisChart(filteredData);
                } else {
                    showNoDiagnosisModal(searchTerm);
                }
            }
        }

        function showNoDiagnosisModal(searchTerm) {
            document.getElementById('searchedTerm').textContent = '"' + searchTerm + '"';
            document.getElementById('noDiagnosisModal').style.display = 'block';
        }

        function closeNoDiagnosisModal() {
            document.getElementById('noDiagnosisModal').style.display = 'none';
        }

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            const modal = document.getElementById('noDiagnosisModal');
            if (event.target == modal) {
                closeNoDiagnosisModal();
            }
        }

        function filterDiagnosisChart() {
            const selectedDiagnosis = document.getElementById('diagnosisSelect').value;
            let filteredData;
            
            if (selectedDiagnosis === '') {
                // Show top 15 when no filter is applied
                filteredData = allDiagnosesData.slice(0, 15);
            } else {
                // Show only selected diagnosis
                filteredData = allDiagnosesData.filter(item => item.label === selectedDiagnosis);
            }
            
            updateDiagnosisChart(filteredData);
        }

        function showAllDiagnoses() {
            document.getElementById('diagnosisSelect').value = '';
            updateDiagnosisChart(allDiagnosesData);
        }

        let originalDiagnosisData = allDiagnosesData; // Store original data
        let currentTimePeriod = 'all';

        function filterByTimePeriod() {
            const selectedPeriod = document.getElementById('timePeriodSelect').value;
            currentTimePeriod = selectedPeriod;
            
            if (selectedPeriod === 'all') {
                // Reset to original data
                allDiagnosesData = originalDiagnosisData;
            } else {
                // Filter diagnosis data based on time period
                allDiagnosesData = filterDiagnosisDataByTime(originalDiagnosisData, selectedPeriod);
            }
            
            // Apply current diagnosis filter if any
            const selectedDiagnosis = document.getElementById('diagnosisSelect').value;
            let filteredData;
            
            if (selectedDiagnosis === '') {
                filteredData = allDiagnosesData.slice(0, 15);
            } else {
                filteredData = allDiagnosesData.filter(item => item.label === selectedDiagnosis);
            }
            
            updateDiagnosisChart(filteredData);
        }

        function filterDiagnosisDataByTime(data, period) {
            // Get current date
            const now = new Date();
            let startDate;
            
            switch(period) {
                case 'today':
                    startDate = new Date(now.getFullYear(), now.getMonth(), now.getDate());
                    break;
                case 'week':
                    const dayOfWeek = now.getDay();
                    const diff = now.getDate() - dayOfWeek + (dayOfWeek === 0 ? -6 : 1); // Adjust when day is Sunday
                    startDate = new Date(now.setDate(diff));
                    startDate.setHours(0, 0, 0, 0);
                    break;
                case 'month':
                    startDate = new Date(now.getFullYear(), now.getMonth(), 1);
                    break;
                case 'year':
                    startDate = new Date(now.getFullYear(), 0, 1);
                    break;
                default:
                    return data;
            }
            
            // Filter the diagnosis breakdown data based on time period
            const filteredDiagnosisTotals = {};
            
            // Note: This is a simplified version. In a real implementation, you would need
            // to filter the actual health records by created_at date and then recalculate
            // the diagnosis totals. For now, we'll simulate this by reducing counts
            // based on the time period (this is just for demonstration)
            
            const reductionFactor = getReductionFactor(period);
            
            Object.keys(diagnosisBreakdown).forEach(diagnosis => {
                let total = 0;
                Object.keys(diagnosisBreakdown[diagnosis]).forEach(ageGroup => {
                    const ageData = diagnosisBreakdown[diagnosis][ageGroup];
                    total += Math.floor(((ageData.Male || 0) + (ageData.Female || 0)) * reductionFactor);
                });
                if (total > 0) {
                    filteredDiagnosisTotals[diagnosis] = total;
                }
            });
            
            return Object.keys(filteredDiagnosisTotals)
                .map(label => ({ label, value: filteredDiagnosisTotals[label] }))
                .sort((a, b) => b.value - a.value);
        }

        function getReductionFactor(period) {
            // Simulate different data volumes for different time periods
            switch(period) {
                case 'today': return 0.05; // ~5% of total data
                case 'week': return 0.15;  // ~15% of total data
                case 'month': return 0.35; // ~35% of total data
                case 'year': return 0.85;  // ~85% of total data
                default: return 1.0;
            }
        }

        function resetDiagnosisFilter() {
            document.getElementById('diagnosisSelect').value = '';
            document.getElementById('diagnosisSearch').value = '';
            document.getElementById('fromDate').value = '';
            document.getElementById('toDate').value = '';
            
            // Reset chart back to initial full dataset
    const initialData = allDiagnosesData.slice(0, 15); 
    updateDiagnosisChart(initialData);

    // Update totals text too
    const totalDiagnosisCases = allDiagnosesData.reduce((sum, d) => sum + d.value, 0);
    document.getElementById('diagnosisTotalsText').textContent =
        `Total: ${totalDiagnosisCases} cases across ${allDiagnosesData.length} diagnoses (showing top 15)`;
        }

        function updateDiagnosisChart(data) {
            const sortedLabels = data.map(item => item.label);
            const sortedValues = data.map(item => item.value);

            // Design-aligned color palette for diagnosis chart
            const designAlignedColors = [
                chartColors.primary,      // Primary blue
                chartColors.success,      // Success green
                chartColors.warning,      // Warning orange
                chartColors.danger,       // Danger red
                chartColors.info,         // Info blue
                chartColors.secondary,    // Secondary light blue
                '#8b5cf6',               // Purple
                '#06b6d4',               // Cyan
                '#84cc16',               // Lime
                '#f59e0b',               // Amber
                '#ef4444',               // Red
                '#10b981',               // Emerald
                '#6366f1',               // Indigo
                '#ec4899',               // Pink
                '#14b8a6',               // Teal
                '#f97316',               // Orange
                '#8b5cf6',               // Violet
                '#06b6d4',               // Sky
                '#65a30d',               // Green
                '#dc2626'                // Red
            ];

            // Generate colors for each diagnosis
            const diagnosisColors = sortedLabels.map((_, index) => {
                return designAlignedColors[index % designAlignedColors.length];
            });

            // Update diagnosis totals display
            const totalDiagnosisCases = sortedValues.reduce((sum, val) => sum + val, 0);
            const displayText = data.length === allDiagnosesData.length 
                ? `Total: ${totalDiagnosisCases} cases across ${diagnosisLabels.length} different diagnoses (showing all)`
                : data.length === 1 
                    ? `Showing: ${totalDiagnosisCases} cases for "${sortedLabels[0]}"`
                    : `Total: ${totalDiagnosisCases} cases across ${data.length} diagnoses (showing top 15)`;
            
            document.getElementById('diagnosisTotalsText').textContent = displayText;

            // Destroy existing chart if it exists
            if (currentDiagnosisChart) {
                currentDiagnosisChart.destroy();
            }

            // Create new chart
            currentDiagnosisChart = new Chart(diagnosisCtx, {
                type: 'bar',
                data: {
                    labels: sortedLabels,
                    datasets: [{
                        label: 'Total Cases',
                        data: sortedValues,
                        backgroundColor: diagnosisColors,
                        borderColor: diagnosisColors,
                        borderWidth: 1,
                        borderRadius: 6,
                        borderSkipped: false,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y', // This makes it horizontal
                    plugins: {
                        legend: {
                            display: false // Hide legend since each bar is a different diagnosis
                        },
                        datalabels: {
                            anchor: 'end',
                            align: 'right',
                            color: '#1f2937',
                            font: {
                                weight: 'bold',
                                family: 'Inter',
                                size: 11
                            },
                            formatter: function(value) {
                                return value + (value === 1 ? ' case' : ' cases');
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(16, 61, 135, 0.9)',
                            titleFont: {
                                family: 'Inter',
                                weight: '600'
                            },
                            bodyFont: {
                                family: 'Inter'
                            },
                            borderColor: chartColors.primary,
                            borderWidth: 1,
                            callbacks: {
                                label: function(context) {
                                    const cases = context.parsed.x;
                                    return `${context.label}: ${cases} case${cases !== 1 ? 's' : ''}`;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            grid: {
                                color: '#e5e7eb'
                            },
                            ticks: {
                                font: {
                                    family: 'Inter'
                                },
                                color: '#6b7280',
                                stepSize: 1
                            }
                        },
                        y: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    family: 'Inter',
                                    weight: '500'
                                },
                                color: '#6b7280',
                                callback: function(value, index) {
                                    const label = this.getLabelForValue(value);
                                    // Truncate long diagnosis names
                                    return label.length > 25 ? label.substring(0, 25) + '...' : label;
                                }
                            }
                        }
                    },
                    animation: {
                        duration: 1000,
                        easing: 'easeOutQuart'
                    }
                },
                plugins: [ChartDataLabels]
            });
        }

        const initialData = allDiagnosesData.slice(0, 15);
        updateDiagnosisChart(initialData);

        // Export function
        function exportChartData() {
            const exportData = {
                timestamp: new Date().toISOString(),
                ageGroups: data.ageGroupsTotals,
                genderTotals: data.genderTotals,
                diagnosisTotals: diagnosisTotals,
                diagnosisBreakdown: data.diagnosisBreakdown,
                casesPerStreet: data.casesPerStreet
            };

            const dataStr = JSON.stringify(exportData, null, 2);
            const dataBlob = new Blob([dataStr], {type: 'application/json'});
            const url = URL.createObjectURL(dataBlob);
            const link = document.createElement('a');
            link.href = url;
            link.download = `health-report-${new Date().toISOString().split('T')[0]}.json`;
            link.click();
            URL.revokeObjectURL(url);
        }
    </script>

    <script>
document.getElementById('printReportsBtn').addEventListener('click', function () {
    // Grab all charts (Chart.js canvases)
    const chartCanvases = document.querySelectorAll('canvas');
    const chartsBase64 = [];

    chartCanvases.forEach(canvas => {
        chartsBase64.push(canvas.toDataURL('image/png', 1.0));
    });

    // Send charts to Laravel
    fetch('{{ route("reports.print") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ charts: chartsBase64 })
    })
    .then(res => res.blob())
    .then(blob => {
        // Open PDF in a new tab
        const url = window.URL.createObjectURL(blob);
        window.open(url, '_blank');
    })
    .catch(err => console.error(err));
});

        function applyDateRange() {
            const fromDate = document.getElementById('fromDate').value;
            const toDate = document.getElementById('toDate').value;
            
            if (!fromDate || !toDate) {
                showNotification('Please select both From Date and To Date', 'error');
                return;
            }
            
            if (fromDate > toDate) {
                showNotification('From Date cannot be later than To Date', 'error');
                return;
            }
            
            // Show loading notification
            showNotification('Applying date filter...', 'loading');
            
            // Build URL with date parameters
            const url = new URL('{{ route('reports') }}');
            url.searchParams.set('date_from', fromDate);
            url.searchParams.set('date_to', toDate);
            
            // Preserve existing filters
            const diagnosisSelect = document.getElementById('diagnosisSelect');
            if (diagnosisSelect && diagnosisSelect.value) {
                url.searchParams.set('diagnosis', diagnosisSelect.value);
            }
            
            const timePeriodSelect = document.getElementById('timePeriodSelect');
            if (timePeriodSelect && timePeriodSelect.value !== 'all') {
                url.searchParams.set('time_period', timePeriodSelect.value);
            }
            
            // Make AJAX request
            fetch(url.toString(), {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'text/html'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(html => {
                // Parse the response and update the page content
                const parser = new DOMParser();
                const newDoc = parser.parseFromString(html, 'text/html');
                
                // Update the data script
                const newDataScript = newDoc.getElementById('data-json');
                const currentDataScript = document.getElementById('data-json');
                if (newDataScript && currentDataScript) {
                    currentDataScript.textContent = newDataScript.textContent;
                }
                
                // Update charts with new data
                updateChartsWithNewData();
                
                // Update URL without page refresh
                window.history.pushState({}, '', url.toString());
                
                showNotification('Date filter applied successfully!', 'success');
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Error applying date filter. Please try again.', 'error');
            });
        }
        
        function clearDateRange() {
            document.getElementById('fromDate').value = '';
            document.getElementById('toDate').value = '';
            
            // Show loading notification
            showNotification('Clearing date filter...', 'loading');
            
            // Remove date parameters from URL but keep other filters
            const url = new URL('{{ route('reports') }}');
            
            const diagnosisSelect = document.getElementById('diagnosisSelect');
            if (diagnosisSelect && diagnosisSelect.value) {
                url.searchParams.set('diagnosis', diagnosisSelect.value);
            }
            
            const timePeriodSelect = document.getElementById('timePeriodSelect');
            if (timePeriodSelect && timePeriodSelect.value !== 'all') {
                url.searchParams.set('time_period', timePeriodSelect.value);
            }
            
            // Make AJAX request
            fetch(url.toString(), {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'text/html'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(html => {
                // Parse the response and update the page content
                const parser = new DOMParser();
                const newDoc = parser.parseFromString(html, 'text/html');
                
                // Update the data script
                const newDataScript = newDoc.getElementById('data-json');
                const currentDataScript = document.getElementById('data-json');
                if (newDataScript && currentDataScript) {
                    currentDataScript.textContent = newDataScript.textContent;
                }
                
                // Update charts with new data
                updateChartsWithNewData();
                
                // Update URL without page refresh
                window.history.pushState({}, '', url.toString());
                
                showNotification('Date filter cleared successfully!', 'success');
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Error clearing date filter. Please try again.', 'error');
            });
        }

        function updateChartsWithNewData() {
            try {
                // Parse new data
                const newData = JSON.parse(document.getElementById('data-json').textContent);
                
                // Update age chart
                const newAgeData = Object.values(newData.ageGroupsTotals);
                const newAgeLabels = Object.keys(newData.ageGroupsTotals);
                
                // Update gender chart
                const newGenderData = Object.values(newData.genderTotals);
                const newGenderLabels = Object.keys(newData.genderTotals);
                
                // Update diagnosis data
                const newDiagnosisBreakdown = newData.diagnosisBreakdown;
                
                // Recalculate diagnosis totals
                function recalculateDiagnosisTotals() {
                    const diagnosisTotals = {};
                    Object.keys(newDiagnosisBreakdown).forEach(diagnosis => {
                        let total = 0;
                        Object.keys(newDiagnosisBreakdown[diagnosis]).forEach(ageGroup => {
                            const ageData = newDiagnosisBreakdown[diagnosis][ageGroup];
                            total += (ageData.Male || 0) + (ageData.Female || 0);
                        });
                        diagnosisTotals[diagnosis] = total;
                    });
                    return diagnosisTotals;
                }
                
                const newDiagnosisTotals = recalculateDiagnosisTotals();
                allDiagnosesData = Object.keys(newDiagnosisTotals)
                    .map((label, index) => ({ label, value: Object.values(newDiagnosisTotals)[index] }))
                    .sort((a, b) => b.value - a.value);
                
                // Update diagnosis chart
                const initialData = allDiagnosesData.slice(0, 15);
                updateDiagnosisChart(initialData);
                
                console.log('[v0] Charts updated successfully with new data');
            } catch (error) {
                console.error('[v0] Error updating charts:', error);
                showNotification('Charts updated but some data may be incomplete', 'warning');
            }
        }

        function showNotification(message, type = 'info') {
            // Remove existing notifications
            const existingNotifications = document.querySelectorAll('.notification');
            existingNotifications.forEach(notification => notification.remove());
            
            // Create notification element
            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            
            // Set notification styles and content
            const icons = {
                success: '<i class="fas fa-check-circle"></i>',
                error: '<i class="fas fa-exclamation-circle"></i>',
                warning: '<i class="fas fa-exclamation-triangle"></i>',
                info: '<i class="fas fa-info-circle"></i>',
                loading: '<i class="fas fa-spinner fa-spin"></i>'
            };
            
            const colors = {
                success: 'background: linear-gradient(135deg, #10b981, #059669); color: white;',
                error: 'background: linear-gradient(135deg, #ef4444, #dc2626); color: white;',
                warning: 'background: linear-gradient(135deg, #f59e0b, #d97706); color: white;',
                info: 'background: linear-gradient(135deg, #3b82f6, #2563eb); color: white;',
                loading: 'background: linear-gradient(135deg, #6b7280, #4b5563); color: white;'
            };
            
            notification.innerHTML = `
                <div style="display: flex; align-items: center; gap: 10px;">
                    ${icons[type] || icons.info}
                    <span>${message}</span>
                </div>
            `;
            
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                ${colors[type] || colors.info}
                padding: 16px 20px;
                border-radius: 8px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
                z-index: 10000;
                font-family: 'Inter', sans-serif;
                font-weight: 500;
                font-size: 14px;
                max-width: 400px;
                transform: translateX(100%);
                transition: transform 0.3s ease-in-out;
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
            `;
            
            // Add to page
            document.body.appendChild(notification);
            
            // Animate in
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 100);
            
            // Auto remove (except for loading notifications)
            if (type !== 'loading') {
                setTimeout(() => {
                    notification.style.transform = 'translateX(100%)';
                    setTimeout(() => {
                        if (notification.parentNode) {
                            notification.remove();
                        }
                    }, 300);
                }, 3000);
            }
        }
</script>

</body>
</html>

<style>
@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: translateY(-50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

#noDiagnosisModal .modal-footer button:hover {
    background: #1d4ed8 !important;
}

#noDiagnosisModal .modal-content {
    animation: modalSlideIn 0.3s ease-out;
}
</style>
