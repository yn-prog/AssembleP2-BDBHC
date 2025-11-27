<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System History - Barangay Daang Bakal Health Center</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

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

        /* Add live search suggestions dropdown styles */
        .search-suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            box-shadow: var(--shadow-lg);
            z-index: 1000;
            max-height: 300px;
            overflow-y: auto;
            display: none;
        }

        .search-suggestions.show {
            display: block;
        }

        .suggestion-item {
            padding: 0.75rem 1rem;
            cursor: pointer;
            border-bottom: 1px solid var(--border-color);
            transition: background-color 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .suggestion-item:last-child {
            border-bottom: none;
        }

        .suggestion-item:hover {
            background: var(--bg-primary);
        }

        .suggestion-item.active {
            background: var(--secondary-color);
            color: var(--primary-color);
        }

        .suggestion-icon {
            width: 16px;
            height: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-primary);
            cursor: default;
            padding: 0.5rem;
            border-radius: 12px;
            transition: all 0.2s ease;
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
            padding: 1.5rem;
            border-radius: 16px;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
            transition: all 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* Enhanced Table */
        .table-container {
            overflow-x: auto;
            border-radius: 16px;
            border: 1px solid var(--border-color);
            background: var(--bg-secondary);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: linear-gradient(135deg, var(--bg-primary) 0%, #f1f5f9 100%);
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: var(--text-primary);
            font-size: 0.875rem;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-secondary);
            font-size: 0.875rem;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: var(--bg-primary);
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* Action Type Badge Styling */
        .action-badge {
            padding: 0.375rem 0.75rem;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.025em;
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
        }

        .action-badge.createdrecord {
            background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
            color: #166534;
        }

        .action-badge.editedrecord {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #92400e;
        }

        .action-badge.deletedrecord {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
        }

        .action-badge.viewedrecord {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1e40af;
        }

        /* Date/Time Styling */
        .datetime-cell {
            font-family: 'Inter', monospace;
            font-weight: 500;
            color: var(--text-primary);
        }

        .date-part {
            display: block;
            font-size: 0.875rem;
        }

        .time-part {
            display: block;
            font-size: 0.75rem;
            color: var(--text-secondary);
            margin-top: 0.125rem;
        }

        /* Patient Name Styling */
        .patient-name {
            font-weight: 600;
            color: var(--text-primary);
        }

        /* Performed By Styling */
        .performer-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .performer-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .performer-details {
            display: flex;
            flex-direction: column;
        }

        .performer-name {
            font-weight: 600;
            color: var(--text-primary);
            font-size: 0.875rem;
        }

        .performer-role {
            font-size: 0.75rem;
            color: var(--text-secondary);
        }

        /* Filter Controls */
        .filter-controls {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .filter-label {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .filter-select {
            padding: 0.5rem 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background: var(--bg-secondary);
            font-size: 0.875rem;
            color: var(--text-primary);
            min-width: 150px;
        }

        .filter-select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(16, 61, 135, 0.1);
        }

        /* Enhanced Alerts */
        .alert {
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .alert-danger {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
            border: 1px solid #fecaca;
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
        }

        @media (max-width: 768px) {
            .main {
                padding: 1rem;
            }
            
            .overview-title {
                font-size: 1.5rem;
            }
            
            .filter-controls {
                flex-direction: column;
            }
        }

        /* Enhanced Pagination */
        .pagination-wrapper {
            margin-top: 2rem;
            text-align: center;
        }

        .pagination {
            display: inline-flex;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
        }

        .pagination-button,
        .pagination-page {
            padding: 0.75rem 1rem;
            font-family: 'Inter', sans-serif;
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .pagination-button {
            color: var(--primary-color);
            background-color: var(--bg-secondary);
        }

        .pagination-button:hover:not(.disabled) {
            background: var(--secondary-color);
            color: var(--primary-color);
        }

        .pagination-button.disabled {
            color: var(--text-secondary);
            background-color: var(--bg-primary);
            cursor: not-allowed;
            pointer-events: none;
        }

        .pagination-page.current {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            color: white;
            font-weight: 600;
        }

        /* Archived Record Styling */


        .archived-record .patient-name {
            font-weight: 700;
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
            <div class="nav-separator"></div>
            
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-line"></i>
                Admin Dashboard
            </a>
            <a href="{{ route('admin.staff') }}" class="nav-link {{ request()->routeIs('admin.staff') ? 'active' : '' }}">
                <i class="fas fa-users"></i>
                Staff Management
            </a>
            
            <li class="{{ request()->is('admin/health-records*') ? 'active' : '' }}">
    <a href="{{ route('admin.health-records.index') }}" class="nav-link">
        <i class="fa-solid fa-notes-medical"></i>
        <span>Patient Health Records</span>
    </a>
</li>

            <a href="{{ route('admin.history') }}" class="nav-link {{ request()->routeIs('admin.history') ? 'active' : '' }}">
                <i class="fas fa-history"></i>
                System History
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
            <!-- Update search form to submit to backend for database search -->
            <form method="GET" action="{{ route('admin.history') }}" class="searchbar">
                <i class="fas fa-search"></i>
                <input type="text" 
                       id="searchInput" 
                       name="search" 
                       value="{{ request('search') }}"
                       placeholder="Search by patient name or staff member..." 
                       autocomplete="off">
                <!-- Add live search suggestions dropdown -->
                <div class="search-suggestions" id="searchSuggestions"></div>
                
                <!-- Preserve other filter parameters when searching -->
                @if(request('action_type'))
                    <input type="hidden" name="action_type" value="{{ request('action_type') }}">
                @endif
                @if(request('date_range'))
                    <input type="hidden" name="date_range" value="{{ request('date_range') }}">
                @endif
                @if(request('staff_id'))
                    <input type="hidden" name="staff_id" value="{{ request('staff_id') }}">
                @endif
            </form>
            
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user-shield"></i>
                </div>
                <div>
                    <div style="font-weight: 600;">Administrator</div>
                    <div style="font-size: 0.75rem; color: var(--text-secondary);">System Admin</div>
                </div>
            </div>
        </div>

        <div class="overview-title">System History</div>

        <!-- Filter Controls -->
        <form method="GET" action="{{ route('admin.history') }}" class="filter-controls">
            <div class="filter-group">
                <label class="filter-label">Action Type</label>
                <select name="action_type" class="filter-select" onchange="this.form.submit()">
                    <option value="">All Actions</option>
                    <option value="Created Record" {{ request('action_type') == 'Created Record' ? 'selected' : '' }}>Created Record</option>
                    <option value="Edited Record" {{ request('action_type') == 'Edited Record' ? 'selected' : '' }}>Edited Record</option>
                    <option value="Archived Record" {{ request('action_type') == 'Archived Record' ? 'selected' : '' }}>
    Archived Record
</option>
                </select>
            </div>

            <div class="filter-group">
                <label class="filter-label">Date Range</label>
                <select name="date_range" class="filter-select" onchange="this.form.submit()">
                    <option value="">All Time</option>
                    <option value="today" {{ request('date_range') == 'today' ? 'selected' : '' }}>Today</option>
                    <option value="week" {{ request('date_range') == 'week' ? 'selected' : '' }}>This Week</option>
                    <option value="month" {{ request('date_range') == 'month' ? 'selected' : '' }}>This Month</option>
                    <option value="year" {{ request('date_range') == 'year' ? 'selected' : '' }}>This Year</option>
                </select>
            </div>

            <div class="filter-group">
                <label class="filter-label">Staff Member</label>
                <select name="staff_id" class="filter-select" onchange="this.form.submit()">
                    <option value="">All Staff</option>
                    @foreach($staff ?? [] as $staffMember)
                        <option value="{{ $staffMember->id }}" {{ request('staff_id') == $staffMember->id ? 'selected' : '' }}>
                            {{ $staffMember->name }} ({{ ucfirst($staffMember->role) }})
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        <!-- Success/Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle"></i>
                <div>
                    <ul style="margin: 0; padding-left: 1rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Date & Time</th>
                            <th>Action Type</th>
                            <th>Patient Name</th>
                            <th>Performed By</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody id="historyTable">
                        @forelse ($actionLogs ?? [] as $log)
                            <!-- Add archived record class for deleted records -->
                            <tr class="{{ $log->action_type === 'Archived Record' ? 'archived-record' : '' }}">
                                <td>
                                    <div class="datetime-cell">
                                        <span class="date-part">{{ $log->created_at->format('M d, Y') }}</span>
                                        <span class="time-part">{{ $log->created_at->format('h:i A') }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="action-badge {{ strtolower(str_replace(' ', '', $log->action_type)) }}">
                                        @switch($log->action_type)
                                            @case('Created Record')
                                                <i class="fas fa-plus"></i>
                                                @break
                                            @case('Edited Record')
                                                <i class="fas fa-edit"></i>
                                                @break
                                            @case('Deleted Record')
                                                <i class="fas fa-archive"></i>
                                                @break
                                            @default
                                                <i class="fas fa-info"></i>
                                        @endswitch
                                        {{ $log->action_type === 'Deleted Record' ? 'Archived Record' : $log->action_type }}
                                    </span>
                                </td>
                                <td>
                                    <span class="patient-name">
                                        {{ $log->patient->first_name ?? 'Unknown' }} {{ $log->patient->last_name ?? 'Patient' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="performer-info">
                                        <div class="performer-avatar">
                                            {{ substr($log->user->name ?? 'U', 0, 1) }}
                                        </div>
                                        <div class="performer-details">
                                            <span class="performer-name">{{ $log->user->name ?? 'Unknown User' }}</span>
                                            <span class="performer-role">{{ ucfirst($log->user->role ?? 'Staff') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span style="color: var(--text-secondary); font-size: 0.875rem;">
                                        {{ $log->details ?? 'No additional details' }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 2rem; color: var(--text-secondary);">
                                    <i class="fas fa-history" style="font-size: 2rem; margin-bottom: 1rem; display: block;"></i>
                                    No activity logs found. Patient record activities will appear here once staff members start making changes.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Enhanced Pagination -->
        @if(isset($actionLogs) && $actionLogs->hasPages())
            <div class="pagination-wrapper">
                <div class="pagination">
                    @if ($actionLogs->onFirstPage())
                        <span class="pagination-button disabled">
                            <i class="fas fa-chevron-left"></i>
                            Previous
                        </span>
                    @else
                        <a href="{{ $actionLogs->previousPageUrl() }}" class="pagination-button">
                            <i class="fas fa-chevron-left"></i>
                            Previous
                        </a>
                    @endif

                    <span class="pagination-page current">{{ $actionLogs->currentPage() }}</span>

                    @if ($actionLogs->hasMorePages())
                        <a href="{{ $actionLogs->nextPageUrl() }}" class="pagination-button">
                            Next
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    @else
                        <span class="pagination-button disabled">
                            Next
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    @endif
                </div>
            </div>
        @endif
    </div>

    <!-- Enhanced JavaScript with live search and form submission -->
    <script>
        // Live search functionality
        let searchTimeout;
        let currentSuggestionIndex = -1;
        const searchInput = document.getElementById('searchInput');
        const searchSuggestions = document.getElementById('searchSuggestions');
        const searchForm = searchInput.closest('form');

        searchInput.addEventListener('input', function() {
            const query = this.value.trim();
            
            clearTimeout(searchTimeout);
            
            if (query.length >= 1) {
                searchTimeout = setTimeout(() => {
                    fetchSuggestions(query);
                }, 300); // Debounce for 300ms
            } else {
                hideSuggestions();
            }
        });

        // Handle keyboard navigation
        searchInput.addEventListener('keydown', function(e) {
            const suggestions = searchSuggestions.querySelectorAll('.suggestion-item');
            
            if (e.key === 'ArrowDown') {
                e.preventDefault();
                currentSuggestionIndex = Math.min(currentSuggestionIndex + 1, suggestions.length - 1);
                updateSuggestionHighlight(suggestions);
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                currentSuggestionIndex = Math.max(currentSuggestionIndex - 1, -1);
                updateSuggestionHighlight(suggestions);
            } else if (e.key === 'Enter') {
                if (currentSuggestionIndex >= 0 && suggestions[currentSuggestionIndex]) {
                    e.preventDefault();
                    selectSuggestion(suggestions[currentSuggestionIndex].dataset.value);
                }
                // Let form submit naturally for Enter key
            } else if (e.key === 'Escape') {
                hideSuggestions();
            }
        });

        // Hide suggestions when clicking outside
        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) && !searchSuggestions.contains(e.target)) {
                hideSuggestions();
            }
        });

        function fetchSuggestions(query) {
            fetch(`{{ route('admin.live-search') }}?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    displaySuggestions(data);
                })
                .catch(error => {
                    console.error('Error fetching suggestions:', error);
                    hideSuggestions();
                });
        }

        function displaySuggestions(suggestions) {
            if (suggestions.length === 0) {
                hideSuggestions();
                return;
            }

            let html = '';
            suggestions.forEach((suggestion, index) => {
                const icon = suggestion.type === 'patient' ? 'fas fa-user' : 'fas fa-user-md';
            });

            searchSuggestions.innerHTML = html;
            searchSuggestions.classList.add('show');
            currentSuggestionIndex = -1;

            // Add click handlers
            searchSuggestions.querySelectorAll('.suggestion-item').forEach(item => {
                item.addEventListener('click', function() {
                    selectSuggestion(this.dataset.value);
                });
            });
        }

        function updateSuggestionHighlight(suggestions) {
            suggestions.forEach((item, index) => {
                item.classList.toggle('active', index === currentSuggestionIndex);
            });
        }

        function selectSuggestion(value) {
            searchInput.value = value;
            hideSuggestions();
            // Submit the form to perform database search
            searchForm.submit();
        }

        function hideSuggestions() {
            searchSuggestions.classList.remove('show');
            currentSuggestionIndex = -1;
        }
    </script>
</body>
</html>
