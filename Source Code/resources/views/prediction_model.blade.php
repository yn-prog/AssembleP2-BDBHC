<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediction Model - Barangay Daang Bakal Health Center</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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
            --info-color: #06b6d4;
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

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card-title i {
            color: var(--primary-color);
        }

        /* Grid Layout */
        .grid {
            display: grid;
            gap: 1.5rem;
        }

        .grid-cols-1 { grid-template-columns: 1fr; }
        .grid-cols-2 { grid-template-columns: repeat(2, 1fr); }
        .grid-cols-3 { grid-template-columns: repeat(3, 1fr); }
        .grid-cols-4 { grid-template-columns: repeat(4, 1fr); }

        /* Stat Cards */
        .stat-card {
            background: var(--bg-secondary);
            padding: 1.5rem;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
            transition: all 0.2s ease;
            position: relative;
            overflow: hidden;
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

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .stat-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .stat-card-title {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .stat-card-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: white;
        }

        .stat-card-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .stat-card-change {
            font-size: 0.875rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .stat-card-change.positive {
            color: var(--success-color);
        }

        .stat-card-change.negative {
            color: var(--danger-color);
        }

        /* Prediction Controls */
        .prediction-controls {
            background: var(--bg-secondary);
            padding: 1.5rem;
            border-radius: 16px;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
        }

        .controls-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .control-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .control-label {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .control-input {
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            background: var(--bg-secondary);
        }

        .control-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(16, 61, 135, 0.1);
        }

        .predict-btn {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .predict-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .predict-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        /* Chart Container */
        .chart-container {
            position: relative;
            height: 400px;
            margin: 1rem 0;
        }

        /* Map Container */
        .map-container {
            position: relative;
            height: 500px;
            background: var(--bg-primary);
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px dashed var(--border-color);
        }

        .map-placeholder {
            text-align: center;
            color: var(--text-secondary);
        }

        .map-placeholder i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        /* Prediction Results */
        .prediction-results {
            display: none;
            animation: fadeInUp 0.5s ease-out;
        }

        .prediction-results.show {
            display: block;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Alert Messages */
        .alert {
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .alert-info {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1e40af;
            border: 1px solid #bfdbfe;
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .alert-warning {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #92400e;
            border: 1px solid #fde68a;
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

            .grid-cols-2,
            .grid-cols-3,
            .grid-cols-4 {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .main {
                padding: 1rem;
            }
            
            .overview-title {
                font-size: 1.5rem;
            }
            
            .controls-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Disease Risk Indicators */
        .risk-indicator {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .risk-low {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
        }

        .risk-medium {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #92400e;
        }

        .risk-high {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
        }

        /* Prediction Table */
        .prediction-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .prediction-table th,
        .prediction-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        .prediction-table th {
            background: var(--bg-primary);
            font-weight: 600;
            color: var(--text-primary);
        }

        .prediction-table tbody tr:hover {
            background: var(--bg-primary);
        }

        /* Interactive Tabs */
        .tab-container {
            background: var(--bg-secondary);
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
            overflow: hidden;
        }

        .tab-header {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        .tab-header h2 {
            color: var(--primary-color);
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .tab-header p {
            color: var(--text-secondary);
            font-size: 0.95rem;
        }

        .tab-navigation {
            display: flex;
            background: var(--bg-primary);
            border-bottom: 1px solid var(--border-color);
            overflow-x: auto;
        }

        .tab-button {
            padding: 1rem 1.5rem;
            background: none;
            border: none;
            cursor: pointer;
            font-weight: 500;
            font-size: 0.875rem;
            color: var(--text-secondary);
            transition: all 0.2s ease;
            white-space: nowrap;
            border-bottom: 3px solid transparent;
        }

        .tab-button:hover {
            background: var(--bg-secondary);
            color: var(--text-primary);
        }

        .tab-button.active {
            background: var(--bg-secondary);
            color: var(--primary-color);
            border-bottom-color: var(--primary-color);
            font-weight: 600;
        }

        .tab-content {
            padding: 2rem;
        }

        .tab-panel {
            display: none;
            animation: fadeInUp 0.3s ease-out;
        }

        .tab-panel.active {
            display: block;
        }

        .visualization-summary {
            background: linear-gradient(135deg, #f0f4ff 0%, #e0e9ff 100%);
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            border-left: 4px solid var(--primary-color);
        }

        .visualization-summary h3 {
            color: var(--primary-color);
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }

        .visualization-summary p {
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 0.5rem;
        }

        .visualization-image {
            text-align: center;
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
        }

        .visualization-image img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: var(--shadow-md);
        }

        .key-insights {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .insight-card {
            background: white;
            padding: 1rem;
            border-radius: 8px;
            border-left: 3px solid var(--primary-color);
        }

        .insight-card h4 {
            color: var(--primary-color);
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .insight-card p {
            color: var(--text-secondary);
            font-size: 0.85rem;
            line-height: 1.5;
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

        <!-- Interactive Tabs -->
        <div class="tab-container">
            <div class="tab-header">
                <h2>Prediction Visualization</h2>
                <p>AI-Powered Predictions: This model uses machine learning algorithms to predict disease outbreaks based on historical data, weather patterns, and population demographics.</p>
            </div>

            <div class="tab-navigation">
                <button class="tab-button active" onclick="showTab('data-overview')">Data Overview</button>
                <button class="tab-button" onclick="showTab('seasonal-patterns')">Seasonal Patterns</button>
                <button class="tab-button" onclick="showTab('historical-analysis')">Historical Analysis</button>
                <button class="tab-button" onclick="showTab('future-predictions')">Future Predictions</button>
                <button class="tab-button" onclick="showTab('historical-vs-forecast')">Historical vs Forecast</button>
            </div>

            <div class="tab-content">
                <!-- Data Overview Tab -->
                <div id="data-overview" class="tab-panel active">
                    <div class="visualization-summary">
                        <h3>Data Overview & Patient Demographics</h3>
                        <p>Analysis shows majority of patients are infants/children (0-10 years) with ~700 cases, indicating high pediatric healthcare needs. Total consultations peaked at 200 in 2024 before declining, suggesting seasonal outbreak patterns.</p>
                        <p>Top diagnosis is "essentially well" with ~400 cases, followed by respiratory conditions (URTI viral, URTI) and chronic diseases, revealing community health priorities.</p>
                    </div>
                    <div class="visualization-image">
                        <img src="{{ asset('images/prediction_images/data_overview1.png') }}" alt="Data Overview - Age Distribution, Consultations, and Top Diagnoses">
                    </div>
                    <div class="key-insights">
                        <div class="insight-card">
                            <h4>Pediatric Focus</h4>
                            <p>70% of patients are under 10 years old, requiring specialized pediatric healthcare resources and child-friendly facilities.</p>
                        </div>
                        <div class="insight-card">
                            <h4>Consultation Peak</h4>
                            <p>2024 showed highest consultation volume at 200 cases, likely due to seasonal outbreaks or health campaigns.</p>
                        </div>
                        <div class="insight-card">
                            <h4>Preventive Care Success</h4>
                            <p>"Essentially well" visits dominate at 400 cases, indicating strong preventive care and routine check-up culture.</p>
                        </div>
                    </div>
                </div>

                <!-- Seasonal Patterns Tab -->
                <div id="seasonal-patterns" class="tab-panel">
                    <div class="visualization-summary">
                        <h3>Seasonal Patterns Analysis</h3>
                        <p>Allergic cough shows dual peaks in January (~20 cases) and July (~11 cases), indicating both dry season and rainy season triggers. Hypertension cases drop dramatically from 42 cases in January to 3 cases by April.</p>
                        <p>"Essentially well" visits peak at 60 cases during months 6-8, suggesting increased health awareness during mid-year periods. Most conditions show cyclical patterns with distinct seasonal variations.</p>
                    </div>
                    <div class="visualization-image">
                        <img src="{{ asset('images/prediction_images/seasonal_patterns.png') }}" alt="Seasonal Patterns for Different Medical Conditions">
                    </div>
                    <div class="key-insights">
                        <div class="insight-card">
                            <h4>Allergy Season</h4>
                            <p>Allergic cough peaks in January and July, requiring increased antihistamine supplies and air quality monitoring during these periods.</p>
                        </div>
                        <div class="insight-card">
                            <h4>Hypertension Decline</h4>
                            <p>Sharp drop from 42 to 3 cases (Jan-Apr) may indicate seasonal lifestyle changes or medication compliance improvements.</p>
                        </div>
                        <div class="insight-card">
                            <h4>Mid-Year Health Focus</h4>
                            <p>Wellness visits surge to 60 cases in months 6-8, possibly due to school health programs or community health drives.</p>
                        </div>
                    </div>
                </div>

                <!-- Historical Analysis Tab -->
                <div id="historical-analysis" class="tab-panel">
                    <div class="visualization-summary">
                        <h3>Historical Time Series Data</h3>
                        <p>Allergic cough shows sporadic spikes with highest peak around 2024 at 12 cases. Hypertension had dramatic spike in 2023 reaching 25 cases before dropping to near zero, suggesting successful intervention.</p>
                        <p>"Essentially well" visits maintain consistent activity with major peaks in 2024 reaching 40+ cases. Most conditions show volatile patterns with significant year-to-year variations indicating outbreak cycles.</p>
                    </div>
                    <div class="visualization-image">
                        <img src="{{ asset('images/prediction_images/historical_time_series.png') }}" alt="Historical Time Series Data for Medical Conditions">
                    </div>
                    <div class="key-insights">
                        <div class="insight-card">
                            <h4>Hypertension Success</h4>
                            <p>2023 spike of 25 cases followed by dramatic decline suggests successful blood pressure management program implementation.</p>
                        </div>
                        <div class="insight-card">
                            <h4>Respiratory Volatility</h4>
                            <p>URTI and allergic conditions show irregular spikes, indicating environmental or seasonal triggers requiring monitoring.</p>
                        </div>
                        <div class="insight-card">
                            <h4>Wellness Consistency</h4>
                            <p>Steady "essentially well" visits demonstrate community engagement in preventive healthcare throughout the period.</p>
                        </div>
                    </div>
                </div>

                <!-- Future Predictions Tab -->
                <div id="future-predictions" class="tab-panel">
                    <div class="visualization-summary">
                        <h3>Predicted Patient Counts Until 2028 - Random Forest</h3>
                        <p>Model predicts "essentially well" visits will maintain highest levels at ~3.5 cases consistently through 2028. Hypertension and HTN show stable predictions around 3 cases with regular cyclical patterns.</p>
                        <p>All conditions display predictable seasonal cycles with relatively low case counts (1-3 range), suggesting effective disease management and stable community health patterns through 2028.</p>
                    </div>
                    <div class="visualization-image">
                        <img src="{{ asset('images/prediction_images/predicted_counts2.png') }}" alt="Predicted Patient Counts Until 2028 using Random Forest Model">
                    </div>
                    <div class="key-insights">
                        <div class="insight-card">
                            <h4>Stable Health Outlook</h4>
                            <p>Predictions show controlled case counts (1-3.5 range) indicating effective current health management strategies.</p>
                        </div>
                        <div class="insight-card">
                            <h4>Preventive Care Dominance</h4>
                            <p>"Essentially well" visits predicted to remain highest at 3.5 cases, showing sustained community health engagement.</p>
                        </div>
                        <div class="insight-card">
                            <h4>Cyclical Patterns</h4>
                            <p>Regular seasonal cycles predicted for all conditions, enabling proactive resource planning and staff scheduling.</p>
                        </div>
                    </div>
                </div>

                <!-- Historical vs Forecast Tab -->
                <div id="historical-vs-forecast" class="tab-panel">
                    <div class="visualization-summary">
                        <h3>Historical vs Forecast Analysis</h3>
                        <p>Forecasts predict significantly lower and more stable case counts compared to volatile historical data. Historical allergic cough reached 12 cases, but forecast predicts steady ~1 case. Hypertension historical spike of 25 cases contrasts with forecast prediction of stable 2-3 cases.</p>
                        <p>The model appears to predict normalized, controlled health outcomes, suggesting current interventions will maintain lower disease burden compared to past outbreak periods.</p>
                    </div>
                    <div class="visualization-image">
                        <img src="{{ asset('images/prediction_images/historical_vs_forecast.png') }}" alt="Historical Data vs Forecast Comparison for Medical Conditions">
                    </div>
                    <div class="key-insights">
                        <div class="insight-card">
                            <h4>Outbreak Prevention</h4>
                            <p>Forecasts predict no major spikes like historical data, indicating current prevention strategies will be effective.</p>
                        </div>
                        <div class="insight-card">
                            <h4>Controlled Disease Burden</h4>
                            <p>Future predictions show 80% lower case counts than historical peaks, suggesting improved disease management.</p>
                        </div>
                        <div class="insight-card">
                            <h4>Model Confidence</h4>
                            <p>Stable forecast patterns indicate high model confidence in predicting controlled, manageable health outcomes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Interactive Tabs Functionality
        function showTab(tabId) {
            // Hide all tab panels
            const panels = document.querySelectorAll('.tab-panel');
            panels.forEach(panel => {
                panel.classList.remove('active');
            });

            // Remove active class from all buttons
            const buttons = document.querySelectorAll('.tab-button');
            buttons.forEach(button => {
                button.classList.remove('active');
            });

            // Show selected tab panel
            document.getElementById(tabId).classList.add('active');

            // Add active class to clicked button
            event.target.classList.add('active');
        }

        document.addEventListener('DOMContentLoaded', function() {
            console.log('Interactive prediction visualization page loaded');
        });
    </script>
</body>
</html>
