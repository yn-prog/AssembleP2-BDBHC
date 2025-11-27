<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient History Records - Barangay Daang Bakal Health Center</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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

        .breadcrumb {
            display: flex;
            align-items: center;
            font-size: 0.875rem;
            color: var(--text-secondary);
        }

        .breadcrumb-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .breadcrumb-separator {
            margin: 0 0.5rem;
            color: var(--text-secondary);
        }

        .breadcrumb-current {
            font-weight: 600;
            color: var(--text-primary);
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

        /* Enhanced Title Section with Back Button and Print Button */
        .title-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .title-with-back {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .overview-title {
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            font-size: 2rem;
            color: var(--primary-color);
            margin: 0;
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

        /* Enhanced Back Button */
        .btn-submit {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            color: white;
            padding: 0.75rem 1.25rem;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.875rem;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: var(--shadow-md);
            position: relative;
            overflow: hidden;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-submit:hover::before {
            left: 100%;
        }

        /* Print Button aligned with title */
        .print-button {
            background: var(--bg-secondary);
            color: var(--text-primary);
            border: 2px solid var(--border-color);
            padding: 0.75rem 1.25rem;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.875rem;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .print-button:hover {
            background: var(--bg-primary);
            border-color: var(--text-secondary);
            transform: translateY(-1px);
            box-shadow: var(--shadow-sm);
        }

        /* Filter Section */
        .filter-section {
            background: var(--bg-secondary);
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
        }

        .filter-grid {
            display: grid;
            grid-template-columns: 1fr 1fr auto;
            gap: 1.5rem;
            align-items: end;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
        }

        .filter-label {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        /* Enhanced Date Picker Styling */
        .filter-input {
            padding: 0.875rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            font-size: 0.875rem;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
            background: var(--bg-secondary);
            color: var(--text-primary);
            position: relative;
        }

        .filter-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(16, 61, 135, 0.1);
            transform: translateY(-1px);
        }

        .filter-input::placeholder {
            color: var(--text-secondary);
            font-style: italic;
        }

        /* Simplified Flatpickr Styling */
        .flatpickr-calendar {
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            box-shadow: var(--shadow-xl);
            font-family: 'Inter', sans-serif;
            overflow: hidden;
        }

        .flatpickr-calendar.open {
            animation: flatpickrFadeIn 0.3s ease-out;
        }

        @keyframes flatpickrFadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Simplified Month Header - White background with dark text */
        .flatpickr-months {
            background: var(--bg-secondary);
            color: var(--text-primary);
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        .flatpickr-month {
            color: var(--text-primary);
        }

        .flatpickr-current-month .flatpickr-monthDropdown-months {
            background: var(--bg-secondary);
            color: var(--text-primary);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 0.25rem 0.5rem;
            font-weight: 600;
        }

        .flatpickr-current-month .flatpickr-monthDropdown-months:hover {
            background: var(--bg-primary);
        }

        .flatpickr-current-month .numInputWrapper {
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 0.25rem;
        }

        .flatpickr-current-month input.cur-year {
            background: transparent;
            color: var(--text-primary);
            border: none;
            font-weight: 600;
        }

        .flatpickr-prev-month,
        .flatpickr-next-month {
            color: var(--text-primary);
            fill: var(--text-primary);
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .flatpickr-prev-month:hover,
        .flatpickr-next-month:hover {
            background: var(--bg-primary);
            color: var(--primary-color);
            fill: var(--primary-color);
            transform: scale(1.1);
        }

        .flatpickr-weekdays {
            background: var(--bg-primary);
            padding: 0.75rem 0;
        }

        .flatpickr-weekday {
            color: var(--text-secondary);
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .flatpickr-days {
            padding: 0.5rem;
        }

        .flatpickr-day {
            color: var(--text-primary);
            border-radius: 8px;
            margin: 1px;
            font-weight: 500;
            transition: all 0.2s ease;
            width: 36px;
            height: 36px;
            line-height: 36px;
        }

        .flatpickr-day:hover {
            background: var(--secondary-color);
            color: var(--primary-color);
            transform: scale(1.05);
        }

        .flatpickr-day.selected {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            color: white;
            font-weight: 600;
            box-shadow: var(--shadow-sm);
        }

        .flatpickr-day.today {
            background: var(--warning-color);
            color: white;
            font-weight: 600;
        }

        .flatpickr-day.today:hover {
            background: #d97706;
        }

        .flatpickr-day.prevMonthDay,
        .flatpickr-day.nextMonthDay {
            color: var(--text-secondary);
            opacity: 0.5;
        }

        .flatpickr-day.disabled {
            color: var(--text-secondary);
            opacity: 0.3;
            cursor: not-allowed;
        }

        .filter-actions {
            display: flex;
            gap: 0.75rem;
        }

        /* Enhanced Cards */
        .card {
            background: var(--bg-secondary);
            padding: 0;
            border-radius: 16px;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
            overflow: hidden;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--border-color);
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
        }

        .card-title {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
        }

        .record-count {
            font-size: 0.875rem;
            color: var(--text-secondary);
            background: var(--border-color);
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-weight: 500;
        }

        /* Enhanced Table */
        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: linear-gradient(135deg, var(--bg-primary) 0%, #f1f5f9 100%);
            padding: 1rem 1.5rem;
            text-align: left;
            font-weight: 600;
            color: var(--text-primary);
            font-size: 0.875rem;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        th i {
            margin-right: 0.5rem;
            color: var(--primary-color);
        }

        td {
            padding: 1rem 1.5rem;
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

        /* Enhanced Date Display */
        .date-display {
            display: flex;
            flex-direction: column;
        }

        .date-main {
            font-weight: 600;
            color: var(--text-primary);
            font-size: 0.875rem;
        }

        .date-day {
            font-size: 0.75rem;
            color: var(--text-secondary);
        }

        /* Enhanced Purpose Badge */
        .purpose-badge {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: var(--primary-color);
            padding: 0.375rem 0.875rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-block;
            border: 1px solid #93c5fd;
        }

        /* Enhanced Diagnosis Text */
        .diagnosis-text {
            color: var(--text-primary);
            font-weight: 500;
            line-height: 1.4;
        }

        /* Enhanced Medicine Text */
        .medicine-text {
            color: var(--success-color);
            font-weight: 500;
            font-style: italic;
        }

        /* Enhanced Timestamp */
        .timestamp {
            display: flex;
            flex-direction: column;
        }

        .time-main {
            font-weight: 500;
            color: var(--text-primary);
            font-size: 0.875rem;
        }

        .time-sub {
            font-size: 0.75rem;
            color: var(--text-secondary);
        }

        /* Enhanced Editor Info */
        .editor-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-secondary);
            font-weight: 500;
        }

        .editor-info i {
            color: var(--primary-color);
        }

        /* Empty State */
        .empty-cell {
            padding: 3rem 1.5rem;
            text-align: center;
        }

        .empty-state {
            color: var(--text-secondary);
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #d1d5db;
        }

        .empty-state h4 {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0 0 0.5rem 0;
        }

        .empty-state p {
            margin: 0;
            font-size: 0.875rem;
            line-height: 1.5;
        }

        /* Button Styles */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.25rem;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            font-family: 'Inter', sans-serif;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            color: white;
            box-shadow: var(--shadow-sm);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
            color: white;
            box-shadow: var(--shadow-sm);
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-outline {
            background: var(--bg-secondary);
            color: var(--text-primary);
            border: 2px solid var(--border-color);
        }

        .btn-outline:hover {
            background: var(--bg-primary);
            border-color: var(--text-secondary);
            transform: translateY(-1px);
        }

        /* Print Styles */
        @media print {
            .sidebar,
            .filter-section,
            .topbar,
            .btn-submit,
            .print-button {
                display: none !important;
            }
            
            .main {
                margin-left: 0;
                padding: 1rem;
            }
            
            .overview-title {
                border-bottom: 2px solid #000;
                padding-bottom: 0.5rem;
                margin-bottom: 1rem;
            }
            
            table {
                font-size: 12px;
            }
            
            th, td {
                padding: 0.5rem;
                border: 1px solid #000;
            }
            
            .card {
                box-shadow: none;
                border: 1px solid #000;
            }
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
            
            .filter-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
        }

        @media (max-width: 768px) {
            .main {
                padding: 1rem;
            }
            
            .title-section {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .title-with-back {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
                width: 100%;
            }
            
            .overview-title {
                font-size: 1.5rem;
            }
            
            .topbar {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
            
            th, td {
                padding: 0.75rem;
                font-size: 0.75rem;
            }

            .btn-submit,
            .print-button {
                width: 100%;
                justify-content: center;
            }
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
            <div class="breadcrumb">
                <a href="{{ route('health.records') }}" class="breadcrumb-link">Patient Health Records</a>
                <span class="breadcrumb-separator">/</span>
                <span class="breadcrumb-current">History Records</span>
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

        <div class="title-section">
    <div class="title-with-back">
        <div class="overview-title">
            Patient Health Records of {{ $patient->first_name }} {{ $patient->last_name }}
        </div>
        <button onclick="window.close()" class="btn-submit">
            <i class="fas fa-arrow-left"></i> Back to Record
        </button>
    </div>

    <!-- ✅ Updated Print Form -->
    <form action="{{ route('patients.printReport', $patient->id) }}" method="GET" target="_blank" style="display:inline;">
        <!-- Pass existing filters -->
        <input type="hidden" name="from" value="{{ request('from') }}">
        <input type="hidden" name="to" value="{{ request('to') }}">
        <input type="hidden" name="diagnosis" value="{{ request('diagnosis') }}">

        <button type="submit" class="btn btn-primary">
            <i class="fa fa-print"></i> Print Report
        </button>
    </form>
</div>


        {{-- Filter Controls --}}
        <div class="filter-section">
            <form method="GET" action="{{ route('health.records.history', $patient->id) }}" class="filter-form">
                <div class="filter-grid">
                    <div class="filter-group">
                        <label for="date" class="filter-label">Filter by Date</label>
                        <input type="text" id="date" name="date" value="{{ request('date') }}" class="filter-input datepicker" placeholder="Select date...">
                    </div>
                    <div class="filter-group">
    <label for="diagnosis" class="filter-label">Filter by Diagnosis</label>
    <input type="text" id="diagnosis" name="diagnosis" 
           value="{{ request('diagnosis') }}" 
           class="filter-input" 
           placeholder="Enter diagnosis..."
           onblur="this.form.submit()">
</div>

                    <div class="filter-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-filter"></i>
                            <span>Apply Filter</span>
                        </button>
                        <a href="{{ route('health.records.history', $patient->id) }}" class="btn btn-outline">
                            <i class="fas fa-times"></i>
                            <span>Clear</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>

        {{-- History Records Table --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-history"></i>
                    Medical History
                </h3>
                <div class="record-count">
                    {{ $history->count() }} {{ Str::plural('record', $history->count()) }} found
                </div>
            </div>
            
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>
                                <i class="fas fa-calendar-alt"></i>
                                Consultation Date
                            </th>
                            <th>
                                <i class="fas fa-stethoscope"></i>
                                Visit Purpose
                            </th>
                            <th>
                                <i class="fas fa-diagnoses"></i>
                                Medical Diagnosis
                            </th>
                            <th>
                                <i class="fas fa-pills"></i>
                                Given Medicine
                            </th>
                            <th>
                                <i class="fas fa-clock"></i>
                                Status
                            </th>
                            <th>
                                <i class="fas fa-clock"></i>
                                Recorded At
                            </th>
                            <th>
                                <i class="fas fa-user-md"></i>
                                Edited By
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($history as $entry)
                            <tr>
                                <td>
                                    <div class="date-display">
                                        <span class="date-main">{{ \Carbon\Carbon::parse($entry->consultation_date)->format('M d, Y') }}</span>
                                        <span class="date-day">{{ \Carbon\Carbon::parse($entry->consultation_date)->format('l') }}</span>
                                    </div>
                                </td>
                                <td>
                                        <div class="purpose-badge">
                                            {{ $entry->visit_purpose ?? '—' }}
                                        </div>
                                    </td>
                                <td>
                                    <div class="diagnosis-text">
                                        {{ $entry->medical_diagnosis ?? '—' }}
                                    </div>
                                </td>
                                <td>
                                    <div class="medicine-text" style='color : #1b4467;'>
                                        {{ $entry->given_medicine ?? '—' }}
                                    </div>
                                </td>
                               <td>
    <div class="record-value">
        @switch($entry->status)
            @case('Cleared')
                <span class="record-value highlight" style='color : #00b60f;'>Cleared</span>
                @break

            @case('Under Treatment')
                <span class="record-value" style="color: #f59e0b;">Under Treatment</span>
                @break

            @default
                <span class="record-value" style="color: #9cafa0;">Unknown</span>
        @endswitch
    </div>
</td>


                                <td>
                                    <div class="timestamp">
                                        <span class="time-main">{{ \Carbon\Carbon::parse($entry->created_at)->format('M d, Y') }}</span>
                                        <span class="time-sub">{{ \Carbon\Carbon::parse($entry->created_at)->format('h:i A') }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="editor-info">
                                        <i class="fas fa-user-circle"></i>
                                        <span>{{ $entry->user->name ?? '—' }}</span>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="empty-cell">
                                    <div class="empty-state">
                                        <i class="fas fa-file-medical-alt"></i>
                                        <h4>No History Records Found</h4>
                                        <p>There are no medical history records for this patient yet.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // Initialize Flatpickr with simplified styling
        flatpickr(".datepicker", {
            dateFormat: "Y-m-d",
            maxDate: "today",
            allowInput: true,
            clickOpens: true,
            theme: "light",
            locale: {
                firstDayOfWeek: 1
            },
            onReady: function(selectedDates, dateStr, instance) {
                // Add custom styling when calendar opens
                instance.calendarContainer.classList.add('flatpickr-enhanced');
            },
            onChange: function(selectedDates, dateStr, instance) {
                // Optional: Add any change handlers here
                console.log('Date selected:', dateStr);
            }
        });

        window.addEventListener('DOMContentLoaded', function () {
            const urlHash = window.location.hash;
            if (urlHash.startsWith("#record-")) {
                const id = urlHash.replace("#record-", "");
                const viewBtn = document.querySelector(`.action-btn.view[data-id="${id}"]`);
                if (viewBtn) {
                    viewBtn.click();
                }
            }
        });

        // Enhanced print functionality
        function printHistory() {
            window.print();
        }

        // Add keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl+P for print
            if (e.ctrlKey && e.key === 'p') {
                e.preventDefault();
                printHistory();
            }
            
            // Escape or Ctrl+B for back
            if (e.key === 'Escape' || (e.ctrlKey && e.key === 'b')) {
                e.preventDefault();
                window.close();
            }
        });

        // Auto-hide alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateY(-20px)';
                    setTimeout(() => {
                        alert.remove();
                    }, 300);
                }, 5000);
            });
        });

        // Enhanced button interactions
        document.addEventListener('DOMContentLoaded', function() {
            const backButton = document.querySelector('.btn-submit');
            
            // Add ripple effect
            backButton.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    background: rgba(255, 255, 255, 0.3);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    pointer-events: none;
                `;
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Add ripple animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>