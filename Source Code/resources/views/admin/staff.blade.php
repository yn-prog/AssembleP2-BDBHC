<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Management - Barangay Daang Bakal Health Center</title>
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

        /* Section Headers with Right-aligned Buttons */
        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 2rem 0 1rem 0;
            padding: 1rem 1.5rem;
            background: linear-gradient(135deg, var(--bg-secondary) 0%, #f8fafc 100%);
            border-radius: 12px;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
        }

        .section-title {
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            font-size: 1.5rem;
            color: var(--primary-color);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-title::after {
            display: none; /* Remove the underline since we're using a different layout */
        }
        
        .case-range-inputs input[disabled] {
    background: none;
    border: none;
    color: var(--text-secondary);
    cursor: default;
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

        /* Role Badge Styling */
        .role-badge {
            padding: 0.375rem 0.75rem;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .role-badge.physician {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1e40af;
        }

        .role-badge.nurse {
            background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
            color: #166534;
        }

        .role-badge.midwife {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #92400e;
        }

        .role-badge.dentist {
            background: linear-gradient(135deg, #fce7f3 0%, #fbcfe8 100%);
            color: #be185d;
        }

        .role-badge.staff {
            background: linear-gradient(135deg, #f3e8ff 0%, #e9d5ff 100%);
            color: #7c3aed;
        }

        /* Case Area Badge Styling */
        .case-badge {
            padding: 0.375rem 0.75rem;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .case-badge.high {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
        }

        .case-badge.medium {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #92400e;
        }

        .case-badge.low {
            background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
            color: #166534;
        }

        /* Enhanced Action Buttons */
        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            padding: 0 0.5rem;
        }

        .action-btn {
            padding: 0.5rem 0.875rem;
            font-family: 'Inter', sans-serif;
            font-size: 0.75rem;
            font-weight: 500;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            color: white;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.25rem;
            text-decoration: none;
        }

        .action-btn:hover {
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .action-btn.edit {
            background: linear-gradient(135deg, var(--warning-color) 0%, #d97706 100%);
        }

        .action-btn.delete {
            background: linear-gradient(135deg, var(--danger-color) 0%, #dc2626 100%);
        }

        .action-btn.restore {
            background: linear-gradient(135deg, var(--success-color) 0%, #059669 100%);
        }

        .add-btn {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .add-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
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

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(8px);
            animation: modalFadeIn 0.3s ease-out;
        }

        @keyframes modalFadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .modal-content {
            background: var(--bg-secondary);
            border-radius: 20px;
            padding: 0;
            width: 95%;
            max-width: 500px;
            max-height: 95vh;
            font-family: 'Inter', sans-serif;
            position: relative;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--border-color);
            animation: modalSlideIn 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-30px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            color: white;
            padding: 2rem 2.5rem 1.5rem;
            border-radius: 20px 20px 0 0;
            position: relative;
            text-align: center;
        }

        /* Green themed modal header for restore actions */
        .modal-header.restore-theme {
            background: linear-gradient(135deg, var(--success-color) 0%, #059669 100%);
        }

        .modal-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .close {
            position: absolute;
            top: 1.5rem;
            right: 2rem;
            font-size: 1.5rem;
            cursor: pointer;
            color: rgba(255, 255, 255, 0.8);
            transition: all 0.2s ease;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
        }

        .close:hover {
            color: white;
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.1);
        }

        .modal-body {
            padding: 2rem 2.5rem;
            overflow-y: auto;
            flex: 1;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text-primary);
            font-size: 0.875rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.875rem;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
            background: var(--bg-secondary);
            color: var(--text-primary);
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(16, 61, 135, 0.1);
        }

        .modal-footer {
            padding: 1.5rem 2.5rem 2rem;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* Green themed submit button for restore actions */
        .btn-submit.restore-theme {
            background: linear-gradient(135deg, var(--success-color) 0%, #059669 100%);
        }

        .btn-cancel {
            background: var(--bg-secondary);
            color: var(--text-primary);
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            border: 2px solid var(--border-color);
            cursor: pointer;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }

        .btn-cancel:hover {
            background: var(--bg-primary);
            border-color: var(--text-secondary);
        }

        /* Confirmation Modal */
        .confirm-modal .modal-content {
            max-width: 400px;
            text-align: center;
        }

        .confirm-modal .modal-header {
            background: linear-gradient(135deg, var(--warning-color) 0%, #d97706 100%);
        }

        .confirm-actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 0;
        }

        /* Recycle Bin Styles */
        .recycle-section {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 2px solid var(--border-color);
        }

        .recycle-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
            cursor: pointer;
            padding: 1rem;
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            border-radius: 12px;
            border: 1px solid #fecaca;
            transition: all 0.2s ease;
        }

        .recycle-header:hover {
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .recycle-header h3 {
            color: #991b1b;
            font-size: 1.25rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .recycle-toggle {
            color: #991b1b;
            font-size: 1.25rem;
            transition: transform 0.3s ease;
        }

        .recycle-toggle.expanded {
            transform: rotate(180deg);
        }

        .recycle-content {
            display: none;
            margin-top: 1rem;
        }

        .recycle-content.show {
            display: block;
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
            
            .action-buttons {
                flex-direction: column;
            }

            .modal-content {
                width: 95%;
                margin: 1rem;
            }

            .modal-header,
            .modal-body,
            .modal-footer {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }
        }

        .form-group select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.875rem;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
            background: var(--bg-secondary);
            color: var(--text-primary);
        }

        .form-group select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(16, 61, 135, 0.1);
        }

        .section-header-with-search {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 2rem 0 1rem 0;
            padding: 1rem 1.5rem;
            background: linear-gradient(135deg, var(--bg-secondary) 0%, #f8fafc 100%);
            border-radius: 12px;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
        }

        .section-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .section-search {
            position: relative;
            min-width: 250px;
        }

        .section-search input {
            padding: 0.5rem 0.75rem 0.5rem 2rem;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            width: 100%;
            font-size: 0.875rem;
            background: var(--bg-primary);
            transition: all 0.2s ease;
        }

        .section-search input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(16, 61, 135, 0.1);
        }

        .section-search i {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        th:last-child {
            text-align: center;
        }

        td:last-child {
            text-align: center;
        }

        /* Case Range Input Styling */
        .case-range-inputs {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
        }

        .case-range-inputs input {
            width: 80px;
            padding: 0.25rem 0.5rem;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            text-align: center;
            font-size: 0.75rem;
        }

        .case-range-inputs span {
            color: var(--text-secondary);
            font-weight: 500;
        }
        
        /* Patient Restore Modal Specific Styles */
.modal-header.patient-restore-theme {
    background: linear-gradient(135deg, var(--success-color) 0%, #059669 100%);
}

.btn-submit.patient-restore-theme {
    background: linear-gradient(135deg, var(--success-color) 0%, #059669 100%);
}

.patient-restore-message {
    text-align: center;
    margin-bottom: 1.5rem;
}

.patient-restore-message h3 {
    color: var(--text-primary);
    font-weight: 600;
    margin-bottom: 0.5rem;
    font-size: 1.125rem;
}

.patient-restore-message p {
    color: var(--text-secondary);
    font-size: 0.875rem;
    line-height: 1.5;
}

.patient-restore-info {
    background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
    border: 1px solid #bbf7d0;
    border-radius: 12px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
}

.patient-restore-info h4 {
    color: var(--success-color);
    font-weight: 600;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 1rem;
}

.patient-restore-details {
    display: grid;
    grid-template-columns: 1fr;
    gap: 0.75rem;
    font-size: 0.875rem;
}

.patient-restore-detail {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.5rem 0;
    border-bottom: 1px solid rgba(187, 247, 208, 0.3);
}

.patient-restore-detail:last-child {
    border-bottom: none;
}

.patient-restore-detail label {
    font-weight: 600;
    color: var(--text-primary);
}

.patient-restore-detail span {
    color: var(--text-secondary);
    font-weight: 500;
}

.patient-restore-warning {
    background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
    border: 1px solid #bbf7d0;
    border-radius: 8px;
    padding: 1rem;
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
}

.patient-restore-warning i {
    color: var(--success-color);
    font-size: 1.25rem;
    margin-top: 0.125rem;
    flex-shrink: 0;
}

.patient-restore-warning div {
    flex: 1;
}

.patient-restore-warning h5 {
    color: var(--success-color);
    font-weight: 600;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
}

.patient-restore-warning p {
    color: var(--text-secondary);
    font-size: 0.8125rem;
    line-height: 1.4;
    margin: 0;
}

/* Success notification styles */
.patient-restore-success {
    position: fixed;
    top: 2rem;
    right: 2rem;
    z-index: 10000;
    max-width: 400px;
    background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
    color: #065f46;
    border: 1px solid #a7f3d0;
    border-radius: 12px;
    padding: 1rem 1.5rem;
    font-weight: 500;
    display: none;
    align-items: center;
    gap: 0.75rem;
    box-shadow: var(--shadow-lg);
    animation: slideInRight 0.3s ease-out;
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(100%);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.patient-restore-success.fade-out {
    animation: fadeOut 0.3s ease-out forwards;
}

@keyframes fadeOut {
    from {
        opacity: 1;
        transform: translateX(0);
    }
    to {
        opacity: 0;
        transform: translateX(100%);
    }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .patient-restore-details {
        grid-template-columns: 1fr;
    }
    
    .patient-restore-detail {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.25rem;
    }
    
    .patient-restore-success {
        top: 1rem;
        right: 1rem;
        left: 1rem;
        max-width: none;
    }
}


.role-checkbox-wrapper {
    display: flex;
    flex-direction: column;
    gap: 8px;
    font-family: inherit;
}

.role-checkbox-line {
    display: flex;
    align-items: center;
    gap: 8px; /* ✅ Adjust this gap to your liking */
    font-family: inherit;
}


.role-label {
    font-size: 14px;
    width: 80px;
    display: inline-block;
}
.pagination-wrapper {
    margin-top: 1.5rem; /* space from table */
    text-align: center; /* center it */
    padding: 0 1rem;    /* add left/right spacing */
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
                    <div style="font-weight: 600;">Administrator</div>
                    <div style="font-size: 0.75rem; color: var(--text-secondary);">System Admin</div>
                </div>
            </div>
        </div>

        <div class="overview-title">Staff Management</div>

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
        
             <div class="section-header">
            <div class="section-title">
                <i class="fa-solid fa-clipboard-user"></i>
                Staff Members
            </div>
            
        </div>

        <!-- Staff Table -->
        <div class="card">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="staffTable">
                        @forelse ($staff as $user)
                            <tr>
                                <td><strong>{{ $user->id }}</strong></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="role-badge {{ strtolower($user->role) }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn edit"
                                            onclick='openRoleEditModal({{ $user->id }}, @json($user->name), @json($user->role ?? "user"))'>
                                            <i class="fas fa-edit"></i>
                                            Edit Role
                                        </button>
                                        {{-- <button class="action-btn restore" onclick="confirmRestoreStaff({{ $user->id }}, '{{ $user->name ?? $user->first_name }}')">
                                            <i class="fas fa-undo"></i>
                                            Restore
                                        </button> --}}
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 2rem; color: var(--text-secondary);">
                                    <i class="fas fa-users" style="font-size: 2rem; margin-bottom: 1rem; display: block;"></i>
                                    No staff members found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Health Map Cases Section -->
        <div class="section-header">
            <div class="section-title">
                <i class="fas fa-map-marked-alt"></i>
                Barangay Daang Bakal Health Map Cases
            </div>
        </div>

        <div class="card">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Case Area</th>
                            <th>Min Cases</th>
                            <th>Max Cases</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="healthMapTable">
    <tr>
        <td>
            <span class="case-badge high">High Case Area</span>
        </td>
        <td>
            <div class="case-range-inputs">
                <span>Min:</span>
                <input id="min-high" type="number" value="{{ $thresholds['high']->min_cases }}" disabled>
            </div>
        </td>
        <td>
            <div class="case-range-inputs">
                <span>Max:</span>
                <input id="max-high" type="number" value="{{ $thresholds['high']->max_cases }}" disabled>
                <span style="font-size: 0.75rem; color: var(--text-secondary);">
                    (or 99999999)
                </span>
            </div>
        </td>
        <td>
            <div class="action-buttons">
                <button class="action-btn edit" 
                    onclick="editCaseArea('high', {{ $thresholds['high']->min_cases }}, {{ $thresholds['high']->max_cases ?? 'null' }})">
                    <i class="fas fa-edit"></i>
                    Edit
                </button>
            </div>
        </td>
    </tr>

    <tr>
        <td>
            <span class="case-badge medium">Medium Case Area</span>
        </td>
        <td>
            <div class="case-range-inputs">
                <span>Min:</span>
                <input id="min-medium" type="number" value="{{ $thresholds['medium']->min_cases }}" disabled>
            </div>
        </td>
        <td>
            <div class="case-range-inputs">
                <span>Max:</span>
                <input id="max-medium" type="number" value="{{ $thresholds['medium']->max_cases }}" disabled>
            </div>
        </td>
        <td>
            <div class="action-buttons">
                <button class="action-btn edit" 
                    onclick="editCaseArea('medium', {{ $thresholds['medium']->min_cases }}, {{ $thresholds['medium']->max_cases }})">
                    <i class="fas fa-edit"></i>
                    Edit
                </button>
            </div>
        </td>
    </tr>

    <tr>
        <td>
            <span class="case-badge low">Low Case Area</span>
        </td>
        <td>
            <div class="case-range-inputs">
                <span>Min:</span>
                <input id="min-low" type="number" value="{{ $thresholds['low']->min_cases }}" disabled>
            </div>
        </td>
        <td>
            <div class="case-range-inputs">
                <span>Max:</span>
                <input id="max-low" type="number" value="{{ $thresholds['low']->max_cases }}" disabled>
            </div>
        </td>
        <td>
            <div class="action-buttons">
                <button class="action-btn edit" 
                    onclick="editCaseArea('low', {{ $thresholds['low']->min_cases }}, {{ $thresholds['low']->max_cases }})">
                    <i class="fas fa-edit"></i>
                    Edit
                </button>
            </div>
        </td>
    </tr>
</tbody>

                </table>
            </div>
        </div>

        <!-- Diagnosis Management Section -->
        <div class="section-header-with-search">
            <div class="section-left">
                <div class="section-title">
                    <i class="fas fa-stethoscope"></i>
                    All Diagnosis List
                </div>
                
                <form method="GET" action="{{ route('admin.staff') }}">
    <div class="section-search">
        <i class="fas fa-search"></i>
        <input 
            type="text"
            id="diagnosisLiveSearch" 
            name="search" 
            value="{{ request('search') }}" 
            placeholder="Search diagnosis..."
        >
    </div>
</form>

            </div>
            <button onclick="openDiagnosisModal()" class="add-btn" style="margin: 0;">
                <i class="fas fa-plus"></i>
                Add Diagnosis
            </button>
        </div>

        <div class="card">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Diagnosis Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="diagnosisTable">
                        <!-- Sample data - replace with your backend data -->
                       @foreach ($diagnoses as $diagnosis)
<tr>
    <td><strong>{{ $diagnosis->id }}</strong></td>
    <td>{{ $diagnosis->diagnosis_name }}</td>
    <td>
        <div class="action-buttons">
            <button class="action-btn edit"
    onclick="editDiagnosis({{ $diagnosis->id }}, '{{ $diagnosis->diagnosis_name }}', {{ json_encode($diagnosis->visible_to_roles) }})">
    <i class="fas fa-edit"></i> Edit
</button>
        </div>
    </td>

</tr>
@endforeach

                    </tbody>
                </table>
                
<div class="pagination-wrapper">
    <div class="pagination">
        {{-- Previous --}}
        @if ($diagnoses->onFirstPage())
            <span class="pagination-button disabled">
                <i class="fas fa-chevron-left"></i> Previous
            </span>
        @else
            <a href="{{ $diagnoses->previousPageUrl() }}" class="pagination-button">
                <i class="fas fa-chevron-left"></i> Previous
            </a>
        @endif

        {{-- Page Numbers --}}
        @php
            $start = max($diagnoses->currentPage() - 1, 1);
            $end = min($start + 2, $diagnoses->lastPage());
        @endphp

        @if ($start > 1)
            <a href="{{ $diagnoses->url(1) }}" class="pagination-page">1</a>
            @if ($start > 2)
                <span class="pagination-dots">…</span>
            @endif
        @endif

        @for ($i = $start; $i <= $end; $i++)
            @if ($i == $diagnoses->currentPage())
                <span class="pagination-page current">{{ $i }}</span>
            @else
                <a href="{{ $diagnoses->url($i) }}" class="pagination-page">{{ $i }}</a>
            @endif
        @endfor

        @if ($end < $diagnoses->lastPage())
            @if ($end < $diagnoses->lastPage() - 1)
                <span class="pagination-dots">…</span>
            @endif
            <a href="{{ $diagnoses->url($diagnoses->lastPage()) }}" class="pagination-page">
                {{ $diagnoses->lastPage() }}
            </a>
        @endif

        {{-- Next --}}
        @if ($diagnoses->hasMorePages())
            <a href="{{ $diagnoses->nextPageUrl() }}" class="pagination-button">
                Next <i class="fas fa-chevron-right"></i>
            </a>
        @else
            <span class="pagination-button disabled">
                Next <i class="fas fa-chevron-right"></i>
            </span>
        @endif
    </div>
</div>

            </div>
        </div>

        

        <!-- Visit Purpose Management Section -->
        {{-- <div class="section-header-with-search">
            <div class="section-left">
                <div class="section-title">
                    <i class="fas fa-clipboard-list"></i>
                    All Visit Purpose
                </div>
                <div class="section-search">
                    <i class="fas fa-search"></i>
                    <input type="text" id="visitPurposeSearch" placeholder="Search visit purpose...">
                </div>
            </div>
            <button onclick="openVisitPurposeModal()" class="add-btn" style="margin: 0;">
                <i class="fas fa-plus"></i>
                Add Visit Purpose
            </button>
        </div>

        <div class="card">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Visit Purpose Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="visitPurposeTable">
                        <!-- Sample data - replace with your backend data -->
                        <tr>
                            <td><strong>1</strong></td>
                            <td>General Check-up</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn edit" onclick="editVisitPurpose(1, 'General Check-up')">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </button>
                                    <button class="action-btn restore" onclick="confirmRestore('visit_purpose', 1, 'General Check-up')">
                                        <i class="fas fa-undo"></i>
                                        Restore
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>2</strong></td>
                            <td>Prenatal Check</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn edit" onclick="editVisitPurpose(2, 'Prenatal Check')">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </button>
                                    <button class="action-btn restore" onclick="confirmRestore('visit_purpose', 2, 'Prenatal Check')">
                                        <i class="fas fa-undo"></i>
                                        Restore
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>3</strong></td>
                            <td>Dental Check-up</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn edit" onclick="editVisitPurpose(3, 'Dental Check-up')">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </button>
                                    <button class="action-btn restore" onclick="confirmRestore('visit_purpose', 3, 'Dental Check-up')">
                                        <i class="fas fa-undo"></i>
                                        Restore
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>4</strong></td>
                            <td>Immunization</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn edit" onclick="editVisitPurpose(4, 'Immunization')">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </button>
                                    <button class="action-btn restore" onclick="confirmRestore('visit_purpose', 4, 'Immunization')">
                                        <i class="fas fa-undo"></i>
                                        Restore
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>5</strong></td>
                            <td>Blood Pressure Monitoring</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn edit" onclick="editVisitPurpose(5, 'Blood Pressure Monitoring')">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </button>
                                    <button class="action-btn restore" onclick="confirmRestore('visit_purpose', 5, 'Blood Pressure Monitoring')">
                                        <i class="fas fa-undo"></i>
                                        Restore
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> --}}

        <!-- Recycle Bin Section -->
        <div class="recycle-section">
            <div class="section-header">
                <div class="section-title">
                    <i class="fas fa-trash-restore"></i>
                    Recycle Bin
                </div>
            </div>
            
            <!-- Combined Archived Records -->
            <div class="card">
                <h4 style="margin-bottom: 1rem; color: var(--text-primary); font-weight: 600;">
                    <i class="fas fa-archive" style="color: #374e74;"></i>
                    All Archived Records
                </h4>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Archived Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="combinedRecycleTable">
                            {{-- <tr>
                                <td><strong>1</strong></td>
                                <td>Fever</td>
                                <td><span class="role-badge physician">Diagnosis</span></td>
                                <td>2024-01-15</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn restore" onclick="confirmRestore('diagnosis', 1, 'Fever')">
                                            <i class="fas fa-undo"></i>
                                            Restore
                                        </button>
                                    </div>
                                </td>
                            </tr> --}}
                            {{-- <tr>
                                <td><strong>2</strong></td>
                                <td>Emergency Visit</td>
                                <td><span class="role-badge nurse">Visit Purpose</span></td>
                                <td>2024-01-10</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn restore" onclick="confirmRestore('visit_purpose', 2, 'Emergency Visit')">
                                            <i class="fas fa-undo"></i>
                                            Restore
                                        </button>
                                    </div>
                                </td>
                            </tr> --}}
                            @forelse ($archivedRecords as $record)
    <tr>
        <td>{{ $record->id }}</td>
        <td>{{ $record->first_name }} {{ $record->last_name }}</td>
        <td><span class="role-badge staff">Patient Record</span></td>
        <td>{{ $record->deleted_at->format('Y-m-d H:i') }}</td>
        <td>
            <div class="action-buttons">
                <!-- REPLACED: Remove the form and onclick="return confirm()" -->
                <button type="button" 
                        class="action-btn restore" 
                        onclick="showPatientRestoreModal({{ $record->id }}, '{{ $record->first_name }} {{ $record->last_name }}', '{{ $record->deleted_at->format('Y-m-d H:i') }}')">
                    <i class="fas fa-undo"></i>
                    Restore
                </button>
            </div>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="5" style="text-align: center;">No archived records found.</td>
    </tr>
@endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Role Edit Modal -->
        <div id="roleEditModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" onclick="closeRoleEditModal()">&times;</span>
                    <h2 id="roleEditModalTitle">
                        <i class="fas fa-user-edit"></i>
                        Edit Staff Role
                    </h2>
                </div>
                
                <div class="modal-body">
                    <p id="staffMemberName" style="margin-bottom: 1.5rem; font-weight: 600; color: var(--text-primary);"></p>
                    <form id="roleEditForm">
                        <div class="form-group">
                            <label for="staffRole">Select Role</label>
                            <select id="staffRole" name="role" required>
                                <option value="physician">Physician</option>
                                <option value="dentist">Dentist</option>
                                <option value="midwife">Midwife</option>
                                <option value="nurse">Nurse</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <div class="confirm-actions">
                        <button type="button" class="btn-cancel" onclick="closeRoleEditModal()">Cancel</button>
                        <button type="button" class="btn-submit" onclick="confirmRoleChange()">
                            <i class="fas fa-save"></i>
                            Update Role
                        </button>
                    </div>
                </div>
            </div>
        </div>
<div id="patientRestoreModal" class="modal patient-restore-modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close" onclick="closePatientRestoreModal()">&times;</span>
            <h2>
                <i class="fas fa-user-injured"></i>
                Restore Patient Record
            </h2>
        </div>
        
        <div class="modal-body">
            <div class="patient-restore-message">
                <h3>Are you sure you want to restore this record?</h3>
                <p>This action will restore the patient's health record and make it available in the active records again.</p>
            </div>

            <div class="patient-restore-info">
                <h4>
                    <i class="fas fa-user"></i>
                    Patient Information
                </h4>
                <div class="patient-restore-details">
                    <div class="patient-restore-detail">
                        <label>Patient Name:</label>
                        <span id="modalPatientName"></span>
                    </div>
                    <div class="patient-restore-detail">
                        <label>Patient ID:</label>
                        <span id="modalPatientId"></span>
                    </div>
                    <div class="patient-restore-detail">
                        <label>Archived Date:</label>
                        <span id="modalArchivedDate"></span>
                    </div>
                </div>
            </div>

            <div class="patient-restore-warning">
                <i class="fas fa-info-circle"></i>
                <div>
                    <h5>What happens when you restore this record?</h5>
                    <p>The patient record will be moved back to active records, allowing staff to schedule appointments, add new visits, and update medical information. All historical data will remain intact.</p>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn-cancel" onclick="closePatientRestoreModal()">
                <i class="fas fa-times"></i>
                Cancel
            </button>
            <button type="button" class="btn-submit" onclick="confirmPatientRestore()">
                <i class="fas fa-undo"></i>
                Restore Record
            </button>
        </div>
    </div>
</div>
        <!-- Case Area Edit Modal -->
        <div id="caseAreaModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" onclick="closeCaseAreaModal()">&times;</span>
                    <h2 id="caseAreaModalTitle">
                        <i class="fas fa-map-marked-alt"></i>
                        Edit Case Area Range
                    </h2>
                </div>
                
                <div class="modal-body">
                    <p id="caseAreaName" style="margin-bottom: 1.5rem; font-weight: 600; color: var(--text-primary);"></p>
                    <form id="caseAreaForm">
                        <div class="form-group">
                            <label for="minCases">Minimum Cases</label>
                            <input type="number" id="minCases" name="min_cases" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="maxCases">Maximum Cases</label>
                            <input type="number" id="maxCases" name="max_cases" min="1" placeholder="Leave empty for unlimited">
                            <small style="color: var(--text-secondary); font-size: 0.75rem;">Leave empty or enter 999+ for unlimited maximum</small>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <div class="confirm-actions">
                        <button type="button" class="btn-cancel" onclick="closeCaseAreaModal()">Cancel</button>
                        <button type="button" class="btn-submit" onclick="confirmCaseAreaSave()">
    <i class="fas fa-save"></i>
    Update Range
</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Add/Edit Diagnosis Modal -->
<div id="diagnosisModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close" onclick="closeDiagnosisModal()">&times;</span>
            <h2 id="diagnosisModalTitle">
                <i class="fas fa-stethoscope"></i>
                Add New Diagnosis
            </h2>
        </div>
        
        <div class="modal-body">
            <!-- ✅ FORM starts here and stays open -->
            <form id="diagnosisForm" action="{{ route('admin.diagnosis.store') }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="POST"> {{-- default to POST; will be changed to PUT on edit --}}
                <input type="hidden" id="diagnosisId" name="diagnosis_id">

                <div class="form-group">
                    <label for="diagnosisName">Diagnosis Name</label>
                    <input type="text" id="diagnosisName" name="diagnosis_name" class="form-control" placeholder="Enter diagnosis name" required>
                </div>

                <!-- ✅ Add Visible To Roles Here -->
            <div class="form-group">
    <label for="roles">Visible To Roles:</label>
    <div class="role-checkbox-wrapper">
        @php
            $roles = ['physician', 'nurse', 'midwife', 'dentist','admin'];
        @endphp
        @foreach ($roles as $role)
            <div class="role-checkbox-line">
                <span class="role-label">{{ ucfirst($role) }}</span>
                <input type="checkbox" name="roles[]" value="{{ $role }}"
                    class="role-checkbox"
                    {{ in_array($role, old('roles', [])) ? 'checked' : '' }}>
            </div>
        @endforeach
    </div>
</div>

                <!-- ✅ Submit and Cancel Buttons (still inside form) -->
                <div class="modal-footer">
                    <div class="confirm-actions">
                        <button type="button" class="btn-cancel" onclick="closeDiagnosisModal()">Cancel</button>
                        <button type="button" class="btn-submit" onclick="confirmDiagnosisSave()">
    <i class="fas fa-save"></i>
    Save Diagnosis
</button>

                    </div>
                </div>
            </form>
            <!-- ✅ FORM ends here -->
        </div>
    </div>
</div>


        <!-- Add/Edit Visit Purpose Modal -->
        <div id="visitPurposeModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" onclick="closeVisitPurposeModal()">&times;</span>
                    <h2 id="visitPurposeModalTitle">
                        <i class="fas fa-clipboard-list"></i>
                        Add New Visit Purpose
                    </h2>
                </div>
                
                <div class="modal-body">
                    <form id="visitPurposeForm">
                        <div class="form-group">
                            <label for="visitPurposeName">Visit Purpose Name</label>
                            <input type="text" id="visitPurposeName" name="visit_purpose_name" placeholder="Enter visit purpose name" required>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <div class="confirm-actions">
                        <button type="button" class="btn-cancel" onclick="closeVisitPurposeModal()">Cancel</button>
                        <button type="button" class="btn-submit" onclick="saveVisitPurpose()">
                            <i class="fas fa-save"></i>
                            Save Visit Purpose
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Confirmation Modal with Green Theme for Restore -->
        <div id="confirmModal" class="modal confirm-modal">
            <div class="modal-content">
                <div class="modal-header" id="confirmModalHeader">
                    <span class="close" onclick="closeConfirmModal()">&times;</span>
                    <h2 id="confirmModalTitle">
                        <i class="fas fa-exclamation-triangle"></i>
                        Confirm Action
                    </h2>
                </div>
                
                <div class="modal-body">
                    <p id="confirmMessage">Are you sure you want to perform this action?</p>
                    <div id="confirmDetails" style="margin-top: 1rem; padding: 1rem; background: var(--bg-primary); border-radius: 8px; font-size: 0.875rem; color: var(--text-secondary); display: none;">
                        <!-- Additional details will be shown here -->
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="confirm-actions">
                        <button type="button" class="btn-cancel" onclick="closeConfirmModal()">Cancel</button>
                        <button type="button" class="btn-submit" id="confirmButton" onclick="executeConfirmAction()">
                            <i class="fas fa-check"></i>
                            Confirm
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- JavaScript -->
<script>
document.getElementById('diagnosisLiveSearch').addEventListener('input', function () {
    const filter = this.value.trim();
    const tbody = document.getElementById('diagnosisTable');

    if (filter.length === 0) {
        location.reload(); // reload to default pagination if search cleared
        return;
    }

    fetch(`/admin/diagnosis/search?search=${encodeURIComponent(filter)}`)
        .then(res => res.json())
        .then(data => {
            tbody.innerHTML = '';

            if (data.length === 0) {
                tbody.innerHTML = `<tr><td colspan="3" style="text-align:center;">No diagnosis found.</td></tr>`;
                return;
            }

            // ...existing code...
// ...existing code...
data.forEach(diagnosis => {
    // Ensure roles is always an array
    let roles = [];
    if (Array.isArray(diagnosis.visible_to_roles)) {
        roles = diagnosis.visible_to_roles;
    } else if (diagnosis.visible_to_roles) {
        try {
            roles = JSON.parse(diagnosis.visible_to_roles);
            if (!Array.isArray(roles)) roles = [];
        } catch {
            roles = [];
        }
    }
    // If roles is still not an array, make it empty array
    if (!Array.isArray(roles)) roles = [];

    // Escape single and double quotes, and backslashes
    const safeName = String(diagnosis.diagnosis_name)
        .replace(/\\/g, '\\\\')
        .replace(/'/g, "\\'")
        .replace(/"/g, '\\"');

    // Always output a valid array for roles
    tbody.innerHTML += `
<tr>
  <td><strong>${diagnosis.id}</strong></td>
  <td>${diagnosis.diagnosis_name}</td>
  <td>
    <div class="action-buttons">
      <button class="action-btn edit"
        data-id="${diagnosis.id}"
        data-name="${diagnosis.diagnosis_name.replace(/"/g, '&quot;')}"
        data-roles='${JSON.stringify(roles)}'>
        <i class="fas fa-edit"></i> Edit
      </button>
    </div>
  </td>
</tr>
`;
});
// Attach click event to all new edit buttons
tbody.querySelectorAll('.action-btn.edit').forEach(btn => {
  btn.addEventListener('click', () => {
    const id = btn.dataset.id;
    const name = btn.dataset.name;
    const roles = JSON.parse(btn.dataset.roles || '[]');
    editDiagnosis(id, name, roles);
  });
});

        })
        .catch(err => {
            console.error('Search fetch error:', err);
            tbody.innerHTML = `<tr><td colspan="3" style="text-align:center;color:red;">Error loading results</td></tr>`;
        });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const diagnosisTable = document.getElementById('diagnosisTable');

  // Intercept pagination clicks
  document.querySelectorAll('.pagination a').forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault(); // stop page reload
      const url = this.href;

      fetch(url, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      })
      .then(res => res.text())
      .then(html => {
        // Parse the returned HTML to extract the new tbody + pagination
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        const newRows = doc.querySelector('#diagnosisTable').innerHTML;
        const newPagination = doc.querySelector('.pagination-wrapper').innerHTML;

        // Replace current table rows + pagination
        diagnosisTable.innerHTML = newRows;
        document.querySelector('.pagination-wrapper').innerHTML = newPagination;

        // Re-bind pagination links for the newly injected content
        document.querySelectorAll('.pagination a').forEach(newLink => {
          newLink.addEventListener('click', arguments.callee, false);
        });
      })
      .catch(err => console.error('Pagination AJAX error:', err));
    });
  });
});
</script>


        <script>
   function editDiagnosis(id, name, roles) {
    const nameInput = document.getElementById('diagnosisName');
    const idInput = document.getElementById('diagnosisId');
    const form = document.getElementById('diagnosisForm');

    if (!nameInput || !idInput || !form) {
        console.error('Form inputs not found. Make sure script runs after modal is loaded.');
        return;
    }

    // Populate form
    nameInput.value = name;
    idInput.value = id;
    form.action = `/admin/diagnosis/update/${id}`;
    form.querySelector('input[name="_method"]').value = 'PUT';

    // Clear & check relevant roles
    form.querySelectorAll('input[name="roles[]"]').forEach(cb => cb.checked = false);
    if (Array.isArray(roles)) {
        roles.forEach(role => {
            const cb = form.querySelector(`input[name="roles[]"][value="${role}"]`);
            if (cb) cb.checked = true;
        });
    }

    // Show modal
    document.getElementById('diagnosisModal').style.display = 'flex';
}
function confirmDiagnosisSave() {
    document.getElementById('confirmModalTitle').innerHTML = `
        <i class="fas fa-exclamation-triangle"></i> Confirm Save
    `;
    document.getElementById('confirmMessage').innerText = 
        "Are you sure you want to save these changes to the diagnosis?";

    confirmAction = () => {
        document.getElementById('diagnosisForm').submit();
    };

    document.getElementById('confirmModal').style.display = 'flex';
}



function openDiagnosisEditModal({ id, name, roles }) {
    const nameInput = document.getElementById('diagnosisName');
    const idInput = document.getElementById('diagnosisId');
    const form = document.getElementById('diagnosisForm');

    if (!nameInput || !idInput || !form) {
        console.error('Form inputs not found. Make sure script runs after modal is loaded.');
        return;
    }

    // Populate form
    nameInput.value = name;
    idInput.value = id;
    form.action = `/admin/diagnosis/update/${id}`;
    form.querySelector('input[name="_method"]').value = 'PUT';

    // Clear & check relevant roles
    form.querySelectorAll('input[name="roles[]"]').forEach(cb => cb.checked = false);
    roles.forEach(role => {
        const cb = form.querySelector(`input[name="roles[]"][value="${role}"]`);
        if (cb) cb.checked = true;
    });

    // Show modal
    document.getElementById('diagnosisModal').style.display = 'flex';
}

function confirmCaseAreaSave() {
    document.getElementById('confirmModalTitle').innerHTML = `
        <i class="fas fa-exclamation-triangle"></i> Confirm Save
    `;
    document.getElementById('confirmMessage').innerText = 
        "Are you sure you want to update this case area range?";

    confirmAction = () => {
        saveCaseArea(); // ✅ only executes after confirmation
    };

    document.getElementById('confirmModal').style.display = 'flex';
}


        </script>
        <script>
            let currentEditId = null;
            let currentEditType = null;
            let confirmAction = null;
            let currentCaseAreaType = null;

            // Search functionality
            document.getElementById('searchInput').addEventListener('input', function () {
                const filter = this.value.toLowerCase();
                const rows = document.querySelectorAll('#staffTable tr');

                rows.forEach(row => {
                    if (row.cells.length > 1) {
                        const name = row.cells[1].textContent.toLowerCase();
                        const email = row.cells[2].textContent.toLowerCase();
                        const role = row.cells[3].textContent.toLowerCase();

                        if (name.includes(filter) || email.includes(filter) || role.includes(filter)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    }
                });
            });

            // Case Area Modal Functions
            function editCaseArea(type, minCases, maxCases) {
                currentCaseAreaType = type;
                const typeText = type.charAt(0).toUpperCase() + type.slice(1);
                
                document.getElementById('caseAreaName').textContent = `Editing ${typeText} Case Area Range`;
                document.getElementById('minCases').value = minCases;
                document.getElementById('maxCases').value = maxCases === 999 ? '' : maxCases;
                document.getElementById('caseAreaModal').style.display = 'flex';
            }

            function closeCaseAreaModal() {
                document.getElementById('caseAreaModal').style.display = 'none';
                currentCaseAreaType = null;
            }

           function saveCaseArea() {
                const minCases = parseInt(document.getElementById('minCases').value);
                const maxCases = document.getElementById('maxCases').value;
                const maxCasesInt = maxCases === '' ? 999 : parseInt(maxCases);

                if (isNaN(minCases) || minCases < 0 || (maxCases !== '' && isNaN(maxCasesInt))) {
                    alert('Please enter valid numbers.');
                    return;
                }

                fetch(`/admin/case-areas/update/${currentCaseAreaType}`, {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({
        min_cases: minCases,
        max_cases: maxCasesInt
    })
})
                .then(res => res.json())
                .then(data => {
                    showSuccessMessage(data.message || 'Updated!');
                    document.getElementById(`min-${currentCaseAreaType}`).value = minCases;
    document.getElementById(`max-${currentCaseAreaType}`).value = maxCasesInt;
                    closeCaseAreaModal();
                    // Optional: reload the section or update DOM manually
                })
                .catch(() => alert('Failed to update case area'));
            }

            // Diagnosis Modal Functions
            function openDiagnosisModal() {
    const form = document.getElementById('diagnosisForm');
    form.reset();
    form.action = '{{ route('admin.diagnosis.store') }}';
    form.querySelector('input[name="_method"]').value = 'POST';
    document.getElementById('diagnosisId').value = '';
    document.getElementById('diagnosisModalTitle').innerHTML = '<i class="fas fa-stethoscope"></i> Add New Diagnosis';
    document.getElementById('diagnosisModal').style.display = 'flex';
}

        
            function closeDiagnosisModal() {
                document.getElementById('diagnosisModal').style.display = 'none';
            }

            function saveDiagnosis() {
                const name = document.getElementById('diagnosisName').value;
                if (!name.trim()) {
                    alert('Please enter a diagnosis name');
                    return;
                }

                if (currentEditId) {
                    showSuccessMessage('Diagnosis successfully updated!');
                } else {
                    showSuccessMessage('Diagnosis successfully added!');
                }
                
                closeDiagnosisModal();
                // Here you would typically send the data to your backend
            }

            // Visit Purpose Modal Functions
            function openVisitPurposeModal() {
                currentEditId = null;
                document.getElementById('visitPurposeModalTitle').innerHTML = '<i class="fas fa-clipboard-list"></i> Add New Visit Purpose';
                document.getElementById('visitPurposeName').value = '';
                document.getElementById('visitPurposeModal').style.display = 'flex';
            }

            function editVisitPurpose(id, name) {
                currentEditId = id;
                currentEditType = 'visit_purpose';
                document.getElementById('visitPurposeModalTitle').innerHTML = '<i class="fas fa-edit"></i> Edit Visit Purpose';
                document.getElementById('visitPurposeName').value = name;
                document.getElementById('visitPurposeModal').style.display = 'flex';
            }

            function closeVisitPurposeModal() {
                document.getElementById('visitPurposeModal').style.display = 'none';
            }

            function saveVisitPurpose() {
                const name = document.getElementById('visitPurposeName').value;
                if (!name.trim()) {
                    alert('Please enter a visit purpose name');
                    return;
                }

                if (currentEditId) {
                    showSuccessMessage('Visit purpose successfully updated!');
                } else {
                    showSuccessMessage('Visit purpose successfully added!');
                }
                
                closeVisitPurposeModal();
                // Here you would typically send the data to your backend
            }

            // Enhanced Confirmation Functions with Green Theme for Restore
            function confirmRestore(type, id, name) {
                const typeText = type === 'diagnosis' ? 'diagnosis' : 'visit purpose';
                
                // Set green theme for restore confirmation
                const modalHeader = document.getElementById('confirmModalHeader');
                const confirmButton = document.getElementById('confirmButton');
                const confirmTitle = document.getElementById('confirmModalTitle');
                
                modalHeader.classList.add('restore-theme');
                confirmButton.classList.add('restore-theme');
                
                confirmTitle.innerHTML = '<i class="fas fa-undo"></i> Confirm Restore';
                
                document.getElementById('confirmMessage').innerHTML = `
                    <strong>Are you sure you want to restore this ${typeText}?</strong><br>
                    <span style="color: var(--text-secondary); font-size: 0.875rem;">Name: "${name}"</span>
                `;
                
                const detailsDiv = document.getElementById('confirmDetails');
                detailsDiv.style.display = 'block';
                detailsDiv.innerHTML = `
                    <i class="fas fa-info-circle" style="color: var(--success-color);"></i>
                    This action will restore the ${typeText} and make it available for use again.
                `;
                
                confirmAction = () => restoreItem(type, id, name);
                document.getElementById('confirmModal').style.display = 'flex';
            }

            function closeConfirmModal() {
                // Reset modal theme
                const modalHeader = document.getElementById('confirmModalHeader');
                const confirmButton = document.getElementById('confirmButton');
                const confirmTitle = document.getElementById('confirmModalTitle');
                
                modalHeader.classList.remove('restore-theme');
                confirmButton.classList.remove('restore-theme');
                
                confirmTitle.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Confirm Action';
                document.getElementById('confirmDetails').style.display = 'none';
                
                document.getElementById('confirmModal').style.display = 'none';
                confirmAction = null;
            }

            function executeConfirmAction() {
                if (confirmAction) {
                    confirmAction();
                }
                closeConfirmModal();
            }

            function restoreItem(type, id, name) {
                const typeText = type === 'diagnosis' ? 'Diagnosis' : 'Visit purpose';
                showSuccessMessage(`${typeText} "${name}" successfully restored!`);
                // Here you would typically send the restore request to your backend
            }

            // Success Message Function
            function showSuccessMessage(message) {
                // Create and show success alert
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-success';
                alertDiv.innerHTML = `<i class="fas fa-check-circle"></i> ${message}`;
                
                const main = document.querySelector('.main');
                const firstCard = main.querySelector('.card');
                main.insertBefore(alertDiv, firstCard);
                
                // Auto-hide after 5 seconds
                setTimeout(() => {
                    alertDiv.style.opacity = '0';
                    setTimeout(() => {
                        alertDiv.remove();
                    }, 300);
                }, 5000);
            }

            // Close modals when clicking outside
            window.onclick = function(event) {
                const modals = document.querySelectorAll('.modal');
                modals.forEach(modal => {
                    if (event.target === modal) {
                        modal.style.display = 'none';
                    }
                });
            };

            // Auto-hide alerts after 5 seconds
            document.addEventListener('DOMContentLoaded', function() {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(alert => {
                    setTimeout(() => {
                        alert.style.opacity = '0';
                        setTimeout(() => {
                            alert.remove();
                        }, 300);
                    }, 5000);
                });
            });
document.addEventListener('DOMContentLoaded', () => {
    let currentStaffId = null;
    let currentStaffName = null;
    let currentStaffRole = null;

    window.openRoleEditModal = function(staffId, staffName, currentRole) {
        currentStaffId = staffId;
        currentStaffName = staffName;
        currentStaffRole = currentRole;

        document.getElementById('staffMemberName').textContent = `Changing role for ${staffName}`;
        document.getElementById('staffRole').value = currentRole.toLowerCase();
        document.getElementById('roleEditModal').style.display = 'flex';
    };
});

            function openRoleEditModal(staffId, staffName, currentRole) {
                currentStaffId = staffId;
                currentStaffName = staffName;
                currentStaffRole = currentRole;

                document.getElementById('staffMemberName').textContent = `Changing role for ${staffName}`;
                document.getElementById('staffRole').value = currentRole.toLowerCase();
                document.getElementById('roleEditModal').style.display = 'flex';
            }

            function closeRoleEditModal() {
                document.getElementById('roleEditModal').style.display = 'none';
                currentStaffId = null;
                currentStaffName = null;
                currentStaffRole = null;
            }

            function confirmRoleChange() {
                const newRole = document.getElementById('staffRole').value;
                const newRoleText = newRole.charAt(0).toUpperCase() + newRole.slice(1);

                if (newRole === currentStaffRole.toLowerCase()) {
                    showSuccessMessage('No changes made to the role.');
                    closeRoleEditModal();
                    return;
                }

                document.getElementById('confirmMessage').textContent =
                    `Are you sure you want to change ${currentStaffName}'s role to ${newRoleText}?`;

                confirmAction = () => updateStaffRole(newRole, newRoleText);
                document.getElementById('confirmModal').style.display = 'flex';
            }

            function updateStaffRole(newRole, newRoleText) {
                fetch(`/admin/staff/${currentStaffId}/role`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify({ role: newRole })
                })
                .then(response => {
                    if (!response.ok) throw new Error('Failed to update role.');
                    return response.json();
                })
                .then(data => {
                    closeRoleEditModal(); // ✅ Now safe to close
                    showSuccessMessage(`${currentStaffName}'s role successfully updated to ${newRoleText}!`);
                    setTimeout(() => location.reload(), 1000);
                })
                .catch(error => {
                    alert('Error updating role: ' + error.message);
                });
            }

            function confirmRestoreStaff(staffId, staffName) {
                // Set green theme for staff restore confirmation
                const modalHeader = document.getElementById('confirmModalHeader');
                const confirmButton = document.getElementById('confirmButton');
                const confirmTitle = document.getElementById('confirmModalTitle');
                
                modalHeader.classList.add('restore-theme');
                confirmButton.classList.add('restore-theme');
                
                confirmTitle.innerHTML = '<i class="fas fa-undo"></i> Confirm Staff Restore';
                
                document.getElementById('confirmMessage').innerHTML = `
                    <strong>Are you sure you want to restore this staff member?</strong><br>
                    <span style="color: var(--text-secondary); font-size: 0.875rem;">Name: "${staffName}"</span>
                `;
                
                const detailsDiv = document.getElementById('confirmDetails');
                detailsDiv.style.display = 'block';
                detailsDiv.innerHTML = `
                    <i class="fas fa-info-circle" style="color: var(--success-color);"></i>
                    This action will restore ${staffName} to active staff status and they will be able to access the system again.
                `;
                
                confirmAction = () => restoreStaff(staffId, staffName);
                document.getElementById('confirmModal').style.display = 'flex';
            }

            function restoreStaff(staffId, staffName) {
                // Here you would typically send the restore request to your backend
                showSuccessMessage(`${staffName} has been successfully restored to active staff!`);
            }

            const maxInitial = 10;
const rows = document.querySelectorAll('#diagnosisTable tr');

function updateVisibleDiagnoses(filter = '') {
    let count = 0;
    rows.forEach(row => {
        const diagnosis = row.cells[1].textContent.toLowerCase().trim();
        const matches = diagnosis.includes(filter);
        if ((filter && matches) || (!filter && count < maxInitial)) {
            row.style.display = '';
            if (!filter) count++;
        } else {
            row.style.display = 'none';
        }
    });
}



updateVisibleDiagnoses(); // show first 10 on load


            // Search functionality for visit purpose table
            // document.getElementById('visitPurposeSearch').addEventListener('input', function () {
            //     const filter = this.value.toLowerCase();
            //     const rows = document.querySelectorAll('#visitPurposeTable tr');

            //     rows.forEach(row => {
            //         if (row.cells.length > 1) {
            //             const visitPurposeName = row.cells[1].textContent.toLowerCase();
            //             if (visitPurposeName.includes(filter)) {
            //                 row.style.display = '';
            //             } else {
            //                 row.style.display = 'none';
            //             }
            //         }
            //     });
            // });
        </script>

        <script>
    function changeRole(staffId, selectedRole) {
        fetch(`/admin/staff/${staffId}/role`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({
                role: selectedRole
            })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.success || data.error);
        });
    }
</script>


        <script>
let currentPatientRestoreId = null;

// Show patient restore modal
function showPatientRestoreModal(patientId, patientName, archivedDate) {
    currentPatientRestoreId = patientId;
    
    // Populate modal with patient information
    document.getElementById('modalPatientName').textContent = patientName;
    document.getElementById('modalPatientId').textContent = `#${patientId}`;
    document.getElementById('modalArchivedDate').textContent = archivedDate;
    
    // Show modal
    document.getElementById('patientRestoreModal').style.display = 'flex';
}

// Close patient restore modal
function closePatientRestoreModal() {
    document.getElementById('patientRestoreModal').style.display = 'none';
    currentPatientRestoreId = null;
}

// Confirm patient restore
function confirmPatientRestore() {
    if (!currentPatientRestoreId) return;
    
    // Create and submit form
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = `/health-records/restore/${currentPatientRestoreId}`;
    
    // Add CSRF token
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '_token';
    csrfInput.value = csrfToken;
    form.appendChild(csrfInput);
    
    // Add to body
    document.body.appendChild(form);
    
    // Close modal first
    closePatientRestoreModal();
    
    // Show success message
    showPatientRestoreSuccess();
    
    // Submit form after showing success message
    setTimeout(() => {
        form.submit();
    }, 1500);
}

// Show success notification
function showPatientRestoreSuccess() {
    // Create success notification if it doesn't exist
    let successNotification = document.getElementById('patientRestoreSuccess');
    if (!successNotification) {
        successNotification = document.createElement('div');
        successNotification.id = 'patientRestoreSuccess';
        successNotification.className = 'patient-restore-success';
        successNotification.innerHTML = `
            <i class="fas fa-check-circle"></i>
            <div>
                <strong>Patient Record Restored!</strong><br>
                <span style="font-size: 0.875rem; opacity: 0.9;">The patient record has been successfully restored to active records.</span>
            </div>
        `;
        document.body.appendChild(successNotification);
    }
    
    // Show notification
    successNotification.style.display = 'flex';
    
    // Auto-hide after 4 seconds
    setTimeout(() => {
        successNotification.classList.add('fade-out');
        setTimeout(() => {
            successNotification.style.display = 'none';
            successNotification.classList.remove('fade-out');
        }, 300);
    }, 4000);
}

// Enhanced modal close functionality for patient restore
window.addEventListener('click', function(event) {
    const patientModal = document.getElementById('patientRestoreModal');
    if (event.target === patientModal) {
        closePatientRestoreModal();
    }
});

// Close patient modal with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const patientModal = document.getElementById('patientRestoreModal');
        if (patientModal && patientModal.style.display === 'flex') {
            closePatientRestoreModal();
        }
    }
});
</script>

<script>
    function openAddDiagnosisModal() {
    const form = document.getElementById('diagnosisForm');
    form.action = '{{ route('admin.diagnosis.store') }}';
    form.querySelector('input[name="_method"]').value = 'POST';
    form.reset();
}
</script>
    </div>
</body>
</html>