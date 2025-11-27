<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Barangay Daang Bakal Health Center</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">


    <style>
        /* All existing styles remain the same */
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

        /* Enhanced Statistics Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--bg-secondary);
            padding: 2rem;
            border-radius: 16px;
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
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-card .stat-icon {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--secondary-color) 0%, #c7d7ff 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 1.25rem;
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

        /* Enhanced Table */
        .table-container {
            overflow-x: auto;
            border-radius: 12px;
            border: 1px solid var(--border-color);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: var(--bg-secondary);
        }

        th {
            background: linear-gradient(135deg, var(--bg-primary) 0%, #f1f5f9 100%);
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: var(--text-primary);
            font-size: 0.875rem;
            border-bottom: 1px solid var(--border-color);
        }

        td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        tbody tr:hover {
            background: var(--bg-primary);
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* Status badges */
        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .status-active {
            background-color: #dcfce7;
            color: #166534;
        }

        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-completed {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .status-high {
            background-color: #fecaca;
            color: #dc2626;
        }

        .status-medium {
            background-color: #fed7aa;
            color: #ea580c;
        }

        .status-low {
            background-color: #bbf7d0;
            color: #059669;
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
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .main {
                padding: 1rem;
            }
            
            .topbar {
                flex-direction: column;
                gap: 1rem;
            }
            
            .searchbar {
                max-width: none;
            }
            
            .overview-title {
                font-size: 1.5rem;
            }

            .card {
                padding: 1.5rem;
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

        .hr-badge {
            background-color: #f3f4f6;
            color: #374151;
            padding: 4px 8px;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 9999px;
            display: inline-block;
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
            <div class="searchbar">
            </div>
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user-shield"></i>
                </div>
                <div>
                    <div style="font-weight: 600;">{{ Auth::user()->name ?? 'Administrator' }}</div>
                    <div style="font-size: 0.75rem; color: var(--text-secondary);">System Admin</div>
                </div>
            </div>
        </div>

        <div class="overview-title">Admin Dashboard</div>

        <!-- Statistics Overview -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h4>Total Patients</h4>
                <h2 id="total-patients">{{ $totalPatients }}</h2>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h4>Patients Today</h4>
                <h2 id="today-patients">{{ $newToday }}</h2>
                </h2>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-edit"></i>
                </div>
                <h4>Records Edited</h4>
                <h2 id="edited-records">{{ $editedRecordsCount }}</h2>
            </div>
            {{-- <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-brain"></i>
                </div>
                <h4>Predictions Made</h4>
                <h2 id="predictions-count">
                    <div class="loading"></div>
                </h2>
            </div> --}}
        </div>

        <!-- Latest Patients -->
        <div class="card">
            <h4>
                <i class="fas fa-user-plus" style="color: var(--success-color);"></i>
                Latest Patients
            </h4>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Patient Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Date Consulted</th>
                        </tr>
                    </thead>
                   <tbody id="latest-patients-table">
                    @foreach ($latestPatients as $patient)
                    <tr>
                        {{-- Latest Patient ID format --}}
                        <td>
                            @php
                                $prefix = 'PR';
                                $year = $patient->created_at ? $patient->created_at->format('y') : now()->format('y');
                                $month = $patient->created_at ? $patient->created_at->format('m') : now()->format('m');
                                $formattedId = str_pad($patient->id, 2, '0', STR_PAD_LEFT);
                            @endphp
                            {{ $prefix . '-' . $year . $month . $formattedId }}
                        </td>
                        <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
                        <td>{{ $patient->age }}</td>
                        <td>
                            @php
                                $genderClass = $patient->gender === 'Male'
                                    ? 'bg-blue-100 text-blue-900'
                                    : 'bg-pink-100 text-pink-700';
                            @endphp
                            <span class="px-2 py-1 rounded text-sm font-medium {{ $genderClass }}">
                                {{ $patient->gender ?? '—' }}
                            </span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($patient->consulted_at)->format('M d, Y') }}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>

        <!-- Latest Edited/Added Records -->
        <div class="card">
            <h4>
                <i class="fas fa-edit" style="color: var(--warning-color);"></i>
                Latest Edited/Added Records
            </h4>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Record ID</th>
                            <th>Patient</th>
                            <th>Action</th>
                            <th>Modified By</th>
                            <th>Date</th>
                            <th>Changes</th>
                        </tr>
                    </thead>
                    <tbody id="latest-records-table">
                        @foreach ($latestEditedRecords as $log)
                        <tr>
                            {{-- Patient ID FORMAT --}}
                            <td>
                                @php
                                    $prefix = 'PR';
                                    $year = $log->patient->created_at ? $log->patient->created_at->format('y') : now()->format('y');
                                    $month = $log->patient->created_at ? $log->patient->created_at->format('m') : now()->format('m');
                                    $formattedId = str_pad($log->patient->id, 2, '0', STR_PAD_LEFT);
                                @endphp
                                {{ $prefix . '-' . $year . $month . $formattedId }}
                            </td>
                            {{-- Added null safety checks for patient data --}}
                            <td>{{ $log->patient ? $log->patient->first_name . ' ' . $log->patient->last_name : 'Unknown Patient' }}</td>
                            <td>
                                @if ($log->action_type === 'Edited Record')
                                    <span class="status-badge status-pending">Edited</span>
                                @else
                                    <span class="status-badge status-active">Added</span>
                                @endif
                            </td>
                            <td>{{ $log->user->name ?? '—' }}</td>
                            <td>{{ \Carbon\Carbon::parse($log->created_at)->format('M d, Y h:i A') }}</td>
                            <td>{{ $log->details }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        {{-- <!-- Latest Predicted Reports -->
        <div class="card">
            <h4>
                <i class="fas fa-brain" style="color: var(--accent-color);"></i>
                Latest Predicted Reports
            </h4>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Report ID</th>
                            <th>Prediction Type</th>
                            <th>Risk Level</th>
                            <th>Affected Area</th>
                            <th>Generated Date</th>
                            <th>Confidence</th>
                        </tr>
                    </thead>
                    <tbody id="latest-predictions-table">
                        <!-- Sample data - replace with dynamic content -->
                        <tr>
                            <td><strong>#PR-001</strong></td>
                            <td>Flu Outbreak Prediction</td>
                            <td><span class="status-badge status-high">High</span></td>
                            <td>Street A</td>
                            <td>Dec 7, 2024 3:45 PM</td>
                            <td>87%</td>
                        </tr>
                        <tr>
                            <td><strong>#PR-002</strong></td>
                            <td>Dengue Risk Assessment</td>
                            <td><span class="status-badge status-medium">Medium</span></td>
                            <td>Street B</td>
                            <td>Dec 7, 2024 1:20 PM</td>
                            <td>72%</td>
                        </tr>
                        <tr>
                            <td><strong>#PR-003</strong></td>
                            <td>Hypertension Trend</td>
                            <td><span class="status-badge status-high">High</span></td>
                            <td>40+ Age Group</td>
                            <td>Dec 7, 2024 10:15 AM</td>
                            <td>91%</td>
                        </tr>
                        <tr>
                            <td><strong>#PR-004</strong></td>
                            <td>Respiratory Illness Alert</td>
                            <td><span class="status-badge status-low">Low</span></td>
                            <td>Street C</td>
                            <td>Dec 6, 2024 5:30 PM</td>
                            <td>65%</td>
                        </tr>
                        <tr>
                            <td><strong>#PR-005</strong></td>
                            <td>Diabetes Risk Forecast</td>
                            <td><span class="status-badge status-medium">Medium</span></td>
                            <td>35-50 Age Group</td>
                            <td>Dec 6, 2024 2:45 PM</td>
                            <td>78%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}

    <!-- JavaScript -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    fetch('/health-records/count-total')
        .then(res => res.json())
        .then(data => {
            document.getElementById('total-patients').textContent = data.count;
        });

    fetch('/health-records/count-today')
        .then(res => res.json())
        .then(data => {
            document.getElementById('today-patients').textContent = data.count;
        });

    fetch('/admin/records-edited-count')
        .then(res => res.json())
        .then(data => {
            document.getElementById('edited-records').textContent = data.count;
        })
        .catch(() => {
            document.getElementById('edited-records').textContent = '0';
        });

    fetch('/admin/predictions-count')
        .then(res => res.json())
        .then(data => {
            document.getElementById('predictions-count').textContent = data.count + '%';
        })
        .catch(() => {
            document.getElementById('predictions-count').textContent = '0';
        });
});
</script>

</body>
</html>
