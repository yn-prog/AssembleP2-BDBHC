<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - Barangay Daang Bakal Health Center</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        
        <!-- Mapbox CSS -->
        <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet" />
        <!-- Mapbox JS -->
        <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>

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
            }

            .searchbar input {
                padding: 0.75rem 1rem 0.75rem 2.5rem;
                border-radius: 12px;
                border: 1px solid var(--border-color);
                width: 320px;
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
                padding: 1.5rem;
                border-radius: 16px;
                margin-bottom: 1.5rem;
                box-shadow: var(--shadow-md);
                border: 1px solid var(--border-color);
                transition: all 0.2s ease;
            }

            .card h4 {
                font-weight: 600;
                color: var(--text-primary);
                margin-bottom: 1rem;
                font-size: 1.125rem;
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

            /* Enhanced Layout */
            .content-grid {
                display: grid;
                grid-template-columns: 2fr 1fr;
                gap: 2rem;
            }

            .main-content {
                display: flex;
                flex-direction: column;
                gap: 1.5rem;
            }

            .sidebar-content {
                display: flex;
                flex-direction: column;
                gap: 1.5rem;
            }

            /* Enhanced Map */
            #map {
                border-radius: 16px;
                box-shadow: var(--shadow-lg);
                width: 100%;
                height: 450px;
                border: 1px solid var(--border-color);
            }

            /* Map Controls */
            .map-controls {
                position: absolute;
                top: 10px;
                right: 10px;
                z-index: 1000;
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
            }

            .map-control-btn {
                background: var(--bg-secondary);
                border: 1px solid var(--border-color);
                border-radius: 8px;
                padding: 0.5rem;
                cursor: pointer;
                box-shadow: var(--shadow-sm);
                transition: all 0.2s ease;
            }

            .map-control-btn:hover {
                background: var(--bg-primary);
                box-shadow: var(--shadow-md);
            }

            /* Map Legend */
            .map-legend {
                position: absolute;
                bottom: 10px;
                left: 10px;
                background: var(--bg-secondary);
                padding: 1rem;
                border-radius: 8px;
                box-shadow: var(--shadow-md);
                border: 1px solid var(--border-color);
                font-size: 0.875rem;
            }

            .legend-item {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                margin-bottom: 0.5rem;
            }

            .legend-color {
                width: 16px;
                height: 16px;
                border-radius: 4px;
            }

            /* Enhanced Calendar */
            .calendar-container {
                background: var(--bg-secondary);
                padding: 1.5rem;
                border-radius: 16px;
                box-shadow: var(--shadow-md);
                border: 1px solid var(--border-color);
                 height: 55%;
            }

            .calendar-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                font-weight: 600;
                margin-bottom: 1rem;
                color: var(--text-primary);
            }

            .calendar-header button {
                background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
                color: white;
                border: none;
                padding: 0.5rem 0.75rem;
                border-radius: 8px;
                cursor: pointer;
                font-size: 0.875rem;
                transition: all 0.2s ease;
            }

            .calendar-header button:hover {
                transform: translateY(-1px);
                box-shadow: var(--shadow-md);
            }

            #calendarTable {
                width: 100%;
                text-align: center;
                border-collapse: collapse;
            }

            #calendarTable th {
                padding: 0.75rem 0.5rem;
                font-weight: 600;
                color: var(--text-secondary);
                font-size: 0.875rem;
                border-bottom: 1px solid var(--border-color);
            }

            #calendarBody td {
                padding: 0.75rem 0.5rem;
                cursor: pointer;
                transition: all 0.2s ease;
                border-radius: 8px;
            }

            #calendarBody td:hover {
                background: var(--secondary-color);
                color: var(--primary-color);
            }

            #calendarBody td.today {
                background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
                color: white;
                font-weight: 600;
                border-radius: 8px;
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

            /* Custom Popup Styles */
            .mapboxgl-popup-content {
                border-radius: 12px;
                box-shadow: var(--shadow-xl);
                border: 1px solid var(--border-color);
                font-family: 'Inter', sans-serif;
            }

            .popup-header {
                background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
                color: white;
                padding: 1rem;
                margin: -15px -15px 1rem -15px;
                border-radius: 12px 12px 0 0;
                font-weight: 600;
            }

            .popup-content {
                padding: 0 15px 15px 15px;
            }

            .diagnosis-item {
                display: flex;
                justify-content: space-between;
                padding: 0.5rem 0;
                border-bottom: 1px solid var(--border-color);
            }

            .diagnosis-item:last-child {
                border-bottom: none;
            }

            /* Responsive Design */
            @media (max-width: 1024px) {
                .content-grid {
                    grid-template-columns: 1fr;
                }
                
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
                
                .searchbar input {
                    width: 100%;
                }
                
                .overview-title {
                    font-size: 1.5rem;
                }

                #map {
                    height: 300px;
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

            /* Utility Classes */
            .text-gradient {
                background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .pulse {
                animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
            }

            @keyframes pulse {
                0%, 100% {
                    opacity: 1;
                }
                50% {
                    opacity: .5;
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

            <div class="overview-title">Dashboard Overview</div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-calendar-day"></i>
                    </div>
                    <h4>Patients Today</h4>
                    <h2 id="today-count" class="today-patients">
                        <div class="loading"></div>
                    </h2>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4>Total Patients</h4>
                    <h2 id="total-count" class="total-patients">
                        <div class="loading"></div>
                    </h2>
                </div>
            </div>

            <div class="content-grid">
                <div class="main-content">
                    <div class="card">
                        <h4><i class="fas fa-map-marker-alt" style="margin-right: 0.5rem; color: var(--primary-color);"></i>Barangay Daang Bakal Health Map</h4>
                        <div style="position: relative;">
                            <div id="map"></div>
                            <div class="map-legend">
                                <div class="legend-item">
                                    <div class="legend-color" style="background: #1f78b4;"></div>
                                    <span>Street Boundaries</span>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-color" style="background: #ff6b6b;"></div>
                                    <span>High Case Areas ({{ $thresholds['high']->min_cases }}+ cases)</span>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-color" style="background: #ffa726;"></div>
                                    <span>Medium Case Areas ({{ $thresholds['medium']->min_cases }}–{{ $thresholds['medium']->max_cases }})</span>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-color" style="background: #66bb6a;"></div>
                                    <span>Low Case Areas ({{ $thresholds['low']->min_cases }}–{{ $thresholds['low']->max_cases }})</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <h4><i class="fas fa-clock" style="margin-right: 0.5rem; color: var(--success-color);"></i>Latest Patients</h4>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date Consulted</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Street</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($latestPatients as $index => $record)
                                        <tr>
                                            {{-- Patient record format --}}
                                            <td>
                                                @php
                                                    $prefix = 'PR';
                                                    $year = $record->created_at ? $record->created_at->format('y') : now()->format('y');
                                                    $month = $record->created_at->format('m'); // ✅ with leading zero
                                                    $formattedId = str_pad($record->id, 2, '0', STR_PAD_LEFT);
                                                @endphp
                                                {{ $prefix . '-' . $year . $month . $formattedId }}
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($record->date_consulted)->format('M d, Y') }}</td>
                                            <td>{{ $record->first_name ?? '—' }}</td>
                                            <td>{{ $record->last_name ?? '—' }}</td>
                                            <td>{{ $record->age ?? '—' }}</td>
                                            <td>
                                                @php
                                                    $genderClass = $record->gender === 'Male' 
                                                        ? 'bg-blue-100 text-blue-900' 
                                                        : 'bg-pink-100 text-pink-700';
                                                @endphp

                                                <span class="px-2 py-1 rounded text-sm font-medium {{ $genderClass }}">
                                                    {{ $record->gender ?? '—' }}
                                                </span>
                                            </td>
                                            <td>{{ $record->street ?? '—' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="sidebar-content">
                    <div class="calendar-container">
                        <div class="calendar-header">
                            <button onclick="changeMonth(-1)">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <span id="calendarHeader"></span>
                            <button onclick="changeMonth(1)">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                        <table id="calendarTable">
                            <thead>
                                <tr>
                                    <th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th>
                                </tr>
                            </thead>
                            <tbody id="calendarBody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <script>
    const caseThresholds = @json($thresholds);
</script>

    <script>
        // Initialize Mapbox
        mapboxgl.accessToken = 'pk.eyJ1IjoiZG1uY2FsbXpuIiwiYSI6ImNtYWY0bG16cTAxd2YycXB0dXQyZ3RrNGMifQ.0jdj2Y4qDnzBn-HrGTRIUw';

        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/light-v11',
            center: [121.029, 14.593],
            zoom: 16,
            pitch: 0,
            bearing: 0,
            antialias: true
        });

        // Set map bounds to focus on Barangay Daang Bakal
        const bounds = [
            [121.025, 14.590], // Southwest coordinates
            [121.033, 14.597]  // Northeast coordinates
        ];
        map.fitBounds(bounds, { padding: 20 });
        map.setMaxBounds(bounds);

        // Store health data globally
        function normalizeStreet(str) {
    return str.toLowerCase().replace(/[^a-z0-9]/g, '');
}
        let healthData = {};

        map.on('load', () => {
            console.log('🗺️ Map loaded successfully');

            map.addSource('streets', {
            type: 'geojson',
            data: '/geo/barangay-daang-bakal.geojson',
            generateId: true // ✅ Comma added above
        });

            // Add street boundary layer
            map.addLayer({
                id: 'streets-layer',
                type: 'line',
                source: 'streets',
                paint: {
                    'line-color': '#1f78b4',
                    'line-width': 3,
                    'line-opacity': 0.8
                }
            });

            // Add street fill layer for hover effects
            map.addLayer({
                id: 'streets-fill',
                type: 'fill',
                source: 'streets',
                paint: {
                    'fill-color': [
                        'case',
                        ['boolean', ['feature-state', 'hover'], false],
                        '#AEC4F5',
                        'transparent'
                    ],
                    'fill-opacity': 0.3
                }
            });

            // Fetch health data and update map
            fetchHealthData();
        });

        function fetchHealthData() {
    console.log('📊 Fetching health data...');

    fetch('/geo-data')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
    console.log('✅ Health data received:', data);

    healthData = {};
    Object.entries(data).forEach(([key, val]) => {
        healthData[key] = val;
    });
            updateMapStyling(healthData); // ✅ apply border color logic
            // updateMapStyling();
            addMapInteractions();
        })
        .catch(error => {
            console.error('❌ Error fetching health data:', error);
            addMapInteractions();
        });
}

       function updateMapStyling(healthData) {
    const colorExpression = ['match', ['get', 'street']];

    // Always show Barangay Daang Bakal in blue
    colorExpression.push('Barangay Daang Bakal', '#007bff');

    const highMin = caseThresholds?.high?.min_cases ?? 10;
    const highMax = caseThresholds?.high?.max_cases ?? null;
    const mediumMin = caseThresholds?.medium?.min_cases ?? 5;
    const mediumMax = caseThresholds?.medium?.max_cases ?? 9;
    const lowMin = caseThresholds?.low?.min_cases ?? 1;
    const lowMax = caseThresholds?.low?.max_cases ?? 4;

    Object.values(healthData).forEach(entry => {
        const label = entry.label;
        const cases = entry.total_cases;

        let color = '#ccc'; // default color for no data

        if (cases >= highMin && (highMax === null || cases <= highMax)) {
            color = 'red';
        } else if (cases >= mediumMin && cases <= mediumMax) {
            color = 'orange';
        } else if (cases >= lowMin && cases <= lowMax) {
            color = 'green';
        }

        colorExpression.push(label, color);
    });

    colorExpression.push('#888'); // fallback color

    // Apply color styling to the line layer
    map.setPaintProperty('streets-layer', 'line-color', colorExpression);
}


        function addMapInteractions() {
            let hoveredStreetId = null;

            // Click event for street details
            map.on('click', 'streets-layer', (e) => {
                const streetName = e.features[0].properties.street;
                console.log('🖱️ Clicked on street:', streetName);
                
                showStreetPopup(e.lngLat, streetName);
            });

            // Click event for fill layer as well
            map.on('click', 'streets-fill', (e) => {
                const streetName = e.features[0].properties.street;
                console.log('🖱️ Clicked on street fill:', streetName);
                
                showStreetPopup(e.lngLat, streetName);
            });

            

            // Hover effects
            map.on('mouseenter', 'streets-layer', (e) => {
                map.getCanvas().style.cursor = 'pointer';
                
                if (e.features.length > 0) {
                    if (hoveredStreetId !== null) {
                        map.setFeatureState(
                            { source: 'streets', id: hoveredStreetId },
                            { hover: false }
                        );
                    }
                    hoveredStreetId = e.features[0].id;
                    map.setFeatureState(
                        { source: 'streets', id: hoveredStreetId },
                        { hover: true }
                    );
                }
            });

            map.on('mouseleave', 'streets-layer', () => {
                map.getCanvas().style.cursor = '';
                
                if (hoveredStreetId !== null) {
                    map.setFeatureState(
                        { source: 'streets', id: hoveredStreetId },
                        { hover: false }
                    );
                }
                hoveredStreetId = null;
            });

            // Same hover effects for fill layer
            map.on('mouseenter', 'streets-fill', (e) => {
                map.getCanvas().style.cursor = 'pointer';
            });

            map.on('mouseleave', 'streets-fill', () => {
                map.getCanvas().style.cursor = '';
            });
        }

        function normalizeStreet(str) {
    return str.toLowerCase().replace(/[^a-z0-9]/g, '');
}

function showStreetPopup(lngLat, streetName) {
  const normalized = normalizeStreet(streetName);
  const streetData = healthData[normalized];

  let content = '';

  if (streetData) {
    content += `<h4>${streetData.label}</h4>`;
    content += `<p><strong>Total Diagnoses:</strong> ${streetData.total_cases}</p>`;

    content += `<ul>`;
    for (const [diagnosis, count] of Object.entries(streetData.diagnosis_counts)) {
      content += `<li>🩺 ${diagnosis}: ${count}</li>`;
    }
    content += `</ul>`;
  } else {
    content = `<h4>${streetName}</h4><p>No recorded health cases for this street.</p>`;
  }

  new mapboxgl.Popup()
    .setLngLat(lngLat)
    .setHTML(content)
    .addTo(map);

  // Accessibility fix
  setTimeout(() => {
    const closeBtn = document.querySelector('.mapboxgl-popup-close-button');
    if (closeBtn) {
      closeBtn.removeAttribute('aria-hidden');
    }
  }, 0);
}



        // Calendar functionality
        let currentDate = new Date();
        let currentYear = currentDate.getFullYear();
        let currentMonth = currentDate.getMonth();

        function generateCalendar(year, month) {
            const today = new Date();
            const calendarBody = document.getElementById("calendarBody");
            const calendarHeader = document.getElementById("calendarHeader");

            const months = ["January", "February", "March", "April", "May", "June",
                            "July", "August", "September", "October", "November", "December"];
            calendarHeader.innerText = `${months[month]} ${year}`;

            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            calendarBody.innerHTML = "";
            let row = document.createElement("tr");
            for (let i = 0; i < firstDay; i++) {
                row.appendChild(document.createElement("td"));
            }

            for (let day = 1; day <= daysInMonth; day++) {
                const cell = document.createElement("td");
                cell.innerText = day;

                if (day === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                    cell.classList.add("today");
                }

                row.appendChild(cell);
                if ((firstDay + day) % 7 === 0 || day === daysInMonth) {
                    calendarBody.appendChild(row);
                    row = document.createElement("tr");
                }
            }
        }

        function changeMonth(offset) {
            currentMonth += offset;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            } else if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            generateCalendar(currentYear, currentMonth);
        }

        // Patient count functionality
        function updatePatientCounts() {
            fetch('/health-records/count-today')
                .then(res => res.json())
                .then(data => {
                    document.getElementById('today-count').textContent = data.count;
                })
                .catch(() => {
                    document.getElementById('today-count').textContent = '0';
                });

            fetch('/health-records/count-total')
                .then(res => res.json())
                .then(data => {
                    document.getElementById('total-count').textContent = data.count;
                })
                .catch(() => {
                    document.getElementById('total-count').textContent = '0';
                });
        }

        // Initialize everything when DOM is loaded
        document.addEventListener("DOMContentLoaded", function () {
            console.log('🚀 Dashboard initializing...');
            generateCalendar(currentYear, currentMonth);
            updatePatientCounts();
            
            // Refresh patient counts every 30 seconds
            setInterval(updatePatientCounts, 30000);
        });
    </script>

    </body>
    </html>
