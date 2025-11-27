<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Health Records - Barangay Daang Bakal Health Center</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            flex: 1;
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


/* Enhanced Table */
        .table-container {
            overflow: visible !important;
            border-radius: 16px;
            border: 1px solid var(--border-color);
            background: var(--bg-secondary);
            position: relative;
        }

        table {
            width: 100%;
            min-width: 1400px;
            border-collapse: collapse;
            table-layout: fixed;
        }

        th {
            position: relative; /* make dropdown positioned correctly under header */
  overflow: visible !important;
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
            white-space: nowrap;
            vertical-align: middle;
        }

        th:nth-child(1) { width: 100px; } /* ID */
        th:nth-child(2) { width: 120px; } /* Date Consulted */
        th:nth-child(3) { width: 110px; } /* First Name */
        th:nth-child(4) { width: 110px; } /* Last Name */
        th:nth-child(5) { width: 110px; } /* Age */
        th:nth-child(6) { width: 100px; } /* Gender */
        th:nth-child(7) { width: 150px; } /* Visit Purpose */
        th:nth-child(8) { width: 150px; } /* Medical Diagnosis */
        th:nth-child(9) { width: 120px; } /* Status */
        th:nth-child(10) { width: 270px; } /* Actions */

        td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-secondary);
            font-size: 0.875rem;
            vertical-align: middle;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        tbody tr:last-child td {
            border-bottom: none;
        }

        /* Enhanced Action Buttons */
        .action-buttons {
            display: flex;
            gap: 0.5rem;
            align-items: center;
            justify-content: flex-start;
            flex-wrap: nowrap;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            padding: 0.5rem 0.875rem;
            border-radius: 8px;
            font-size: 0.813rem;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .action-btn i {
            font-size: 0.875rem;
        }

        .action-btn.view {
            background: #10b981;
            color: white;
        }

        .action-btn.view:hover {
            background: #059669;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .action-btn.edit {
            background: #f59e0b;
            color: white;
        }

        .action-btn.edit:hover {
            background: #d97706;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        }

        .action-btn.archive {
            background: #ef4444;
            color: white;
        }

        .action-btn.archive:hover {
            background: #dc2626;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
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
        }

        .add-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* ENHANCED MODALS - MAJOR IMPROVEMENTS */
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
            max-width: 700px;
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

        /* Enhanced Modal Header */
        .modal-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            color: white;
            padding: 2rem 2.5rem 1.5rem;
            border-radius: 20px 20px 0 0;
            position: relative;
            text-align: center;
        }

        .modal-header h2 {
            font-size: 1.75rem;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .modal-header .modal-subtitle {
            font-size: 0.875rem;
            opacity: 0.9;
            margin-top: 0.5rem;
            font-weight: 400;
        }
       .action-btn.archive {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
}

.action-btn.archive:hover {
    transform: translateY(-1px);
    box-shadow: var(--shadow-md);
    background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
}

.action-btn.archive:active {
    transform: translateY(0);
    box-shadow: var(--shadow-sm);
}

        /* Enhanced Close Button */
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
        /* Enhanced Modal Body */
        .modal-body {
            padding: 2rem 2.5rem;
            overflow-y: auto;
            flex: 1;
        }

        /* Enhanced Form Groups */
        .form-group {
            margin-bottom: 1.75rem;
            position: relative;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 1.75rem;
        }

        .form-row-triple {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.75rem;
        }

        /* Enhanced Labels */
        .modal-content label {
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 600;
            color: var(--text-primary);
            font-size: 0.875rem;
            position: relative;
        }

        .required-field::after {
            content: '*';
            color: var(--danger-color);
            margin-left: 0.25rem;
            font-weight: 700;
        }

        /* Enhanced Form Inputs */
        .modal-content input,
        .modal-content textarea,
        .modal-content select {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            font-size: 0.875rem;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
            background: var(--bg-secondary);
            color: var(--text-primary);
        }

        .modal-content input:focus,
        .modal-content textarea:focus,
        .modal-content select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(16, 61, 135, 0.1);
            transform: translateY(-1px);
        }

        .modal-content input::placeholder,
        .modal-content textarea::placeholder {
            color: var(--text-secondary);
            font-style: italic;
        }

        /* Enhanced Input Icons */
        .input-with-icon {
            position: relative;
        }

        .input-with-icon input {
            padding-left: 3rem;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            font-size: 1rem;
            z-index: 2;
        }

        /* Enhanced Textarea */
        .modal-content textarea {
            resize: vertical;
            min-height: 100px;
            line-height: 1.5;
        }

        /* Enhanced Select Styling */
        .modal-content select {
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.75rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 3rem;
            appearance: none;
        }

        /* Enhanced Choices.js Styling */
        .choices__inner {
            padding: 1rem 1.25rem;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            background-color: var(--bg-secondary);
            font-family: 'Inter', sans-serif;
            font-size: 0.875rem;
            color: var(--text-primary);
            min-height: 52px;
            transition: all 0.3s ease;
        }

        .choices__inner:focus,
        .choices.is-focused .choices__inner {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(16, 61, 135, 0.1);
            transform: translateY(-1px);
        }

        .choices__list--multiple .choices__item {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            color: white;
            border-radius: 8px;
            padding: 0.5rem 0.75rem;
            margin: 0.25rem;
            font-size: 0.75rem;
            font-weight: 500;
            border: none;
            box-shadow: var(--shadow-sm);
        }
        .choices__list--dropdown {
    overflow-x: hidden !important;
    max-width: 100% !important;
}
.choices__list--dropdown .choices__item {
    white-space: normal !important;
    word-break: break-word !important;
}
        .choices__item--selectable.is-highlighted {
            background: var(--secondary-color);
            color: var(--primary-color);
            transform: none !important;
            padding-left: 1rem !important; /* Optional: adjust spacing */
        }

        .choices[data-type*="select-multiple"] .choices__button {
            color: white;
            border-left: 1px solid rgba(255,255,255,0.3);
            opacity: 0.8;
            transition: opacity 0.2s ease;
        }

        .choices[data-type*="select-multiple"] .choices__button:hover {
            opacity: 1;
        }

        /* Enhanced Optional Fields */
        .optional-field {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 1rem;
            border: 1px solid var(--border-color);
        }

        .optional-note {
            font-size: 0.75rem;
            color: var(--text-secondary);
            margin-top: 0.5rem;
            font-style: italic;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .optional-note::before {
            content: '💡';
            font-style: normal;
        }

        /* Enhanced Submit Button */
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
            padding: 1rem 2.5rem;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            box-shadow: var(--shadow-md);
            position: relative;
            overflow: hidden;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-cancel {
            background: var(--bg-secondary);
            color: var(--text-primary);
            padding: 1rem 2rem;
            border-radius: 12px;
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

        /* Enhanced View Modal */
        .view-modal .modal-content {
            max-width: 800px;
        }
        
        .view-modal {
    overflow: hidden; /* prevents double scrollbars */
}

        .view-records-container {
            background: var(--bg-secondary);
            border-radius: 20px;
            box-shadow: var(--shadow-xl);
            padding: 0;
            max-width: 800px;
            margin: 0 auto;
            font-family: 'Inter', sans-serif;
            overflow: hidden;
        }

        .view-records-header {
            background: linear-gradient(135deg, var(--success-color) 0%, #059669 100%);
            color: white;
            font-size: 1.75rem;
            font-weight: 700;
            margin: 0;
            padding: 2rem 2.5rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-align: center;
            justify-content: center;
        }

        .view-content {
            padding: 2rem 2.5rem;
        }

        .record-section {
            margin-bottom: 2rem;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 16px;
            padding: 1.5rem;
            border: 1px solid var(--border-color);
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .record-row {
            display: grid;
            grid-template-columns: 1fr 2fr;
            align-items: start;
            gap: 1.5rem;
            margin-bottom: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(16, 61, 135, 0.1);
        }

        .record-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .record-label {
            color: var(--text-secondary);
            font-weight: 600;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .record-value {
            font-weight: 500;
            color: var(--text-primary);
            font-size: 0.875rem;
            word-wrap: break-word;
            line-height: 1.5;
        }

        .record-value.highlight {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
        }

        /* Enhanced Alerts */
        .alert {
            padding: 1.25rem 1.75rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 1rem;
            border: 1px solid;
            position: relative;
            overflow: hidden;
        }

        .alert::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: currentColor;
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
            border-color: #a7f3d0;
        }

        .alert-danger {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
            border-color: #fecaca;
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

        /* Enhanced Confirmation Modal */
        .modal-content.confirm-box {
            max-width: 450px;
            text-align: center;
        }

        .confirm-actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
        }

        .confirm-yes {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            color: white;
            padding: 1rem 2rem;
            font-weight: 600;
            border-radius: 12px;
            font-size: 0.875rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-md);
        }

        .confirm-no {
            background: var(--bg-primary);
            color: var(--text-primary);
            padding: 1rem 2rem;
            font-weight: 600;
            border-radius: 12px;
            font-size: 0.875rem;
            border: 2px solid var(--border-color);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .confirm-yes:hover,
        .confirm-no:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* Enhanced Delete Modal */
        .modal-delete {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(8px);
        }

        .modal-delete-content {
            background: var(--bg-secondary);
            padding: 2.5rem;
            border-radius: 20px;
            max-width: 500px;
            width: 90%;
            box-shadow: var(--shadow-xl);
            position: relative;
            text-align: center;
            border: 1px solid var(--border-color);
            animation: modalSlideIn 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .modal-delete-close {
            position: absolute;
            top: 1.5rem;
            right: 2rem;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-secondary);
            transition: all 0.2s ease;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--bg-primary);
        }

        .modal-delete-close:hover {
            color: var(--danger-color);
            background: #fee2e2;
        }

        .modal-delete-content h2 {
            color: var(--danger-color);
            text-align: center;
            margin-bottom: 1.5rem;
            font-weight: 700;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        #deletePatientMessage {
            font-size: 0.875rem;
            color: var(--text-primary);
            line-height: 1.6;
            margin-bottom: 2rem;
            text-align: left;
        }

        .modal-delete-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .delete-btn {
            background: linear-gradient(135deg, var(--danger-color) 0%, #dc2626 100%);
            color: white;
            padding: 1rem 2rem;
            border-radius: 12px;
            border: none;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-md);
        }

        .cancel-btn {
            background: var(--bg-primary);
            color: var(--text-primary);
            padding: 1rem 2rem;
            border-radius: 12px;
            border: 2px solid var(--border-color);
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .delete-btn:hover,
        .cancel-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
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

        /* Hide number input spinners */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            appearance: textfield; -moz-appearance: textfield;
        }

        /* Enhanced Success/Error Messages */
        .message-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            backdrop-filter: blur(8px);
        }

        .message-box {
            background: var(--bg-secondary);
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: var(--shadow-xl);
            max-width: 450px;
            width: 90%;
            text-align: center;
            border: 1px solid var(--border-color);
            animation: messageSlideIn 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes messageSlideIn {
            from {
                opacity: 0;
                transform: translateY(-30px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .message-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            box-shadow: var(--shadow-md);
        }

        .message-icon.success {
            background: linear-gradient(135deg, var(--success-color) 0%, #059669 100%);
            color: white;
        }

        .message-icon.error {
            background: linear-gradient(135deg, var(--danger-color) 0%, #dc2626 100%);
            color: white;
        }

        .message-icon.warning {
            background: linear-gradient(135deg, var(--warning-color) 0%, #d97706 100%);
            color: white;
        }
        .confirm-actions {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-top: 1rem;
}

.confirm-yes {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
    color: white;
    padding: 1rem 2rem;
    border-radius: 12px;
    border: none;
    cursor: pointer;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    box-shadow: var(--shadow-md);
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.confirm-no {
    background: var(--bg-primary);
    color: var(--text-primary);
    padding: 1rem 2rem;
    border-radius: 12px;
    border: 2px solid var(--border-color);
    cursor: pointer;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.confirm-yes:hover,
.confirm-no:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

        .message-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            color: var(--text-primary);
        }

        .message-text {
            font-size: 0.875rem;
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .message-button {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-md);
        }

        .message-button:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* Loading Spinner for Forms */
        .form-loading {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(255, 255, 255, 0.95);
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: var(--shadow-lg);
        }

        .btn-submit {
            position: relative;
        }

        .btn-submit.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .btn-submit.loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px;
            height: 20px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        .dropdown-item {
            display: block;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            color: var(--text-primary);
            background: white;
            border-bottom: 1px solid var(--border-color);
            text-align: left;
            width: 100%;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .dropdown-item:hover {
            background: var(--bg-primary);
        }

        .dynamic-dropdown {
            display: none;
            position: absolute;
            top: 110%;
            left: 0;
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            box-shadow: var(--shadow-md);
            z-index: 10;
            max-height: 200px;
            overflow-y: auto;
            min-width: 150px;
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

            .modal-content {
                width: 98%;
                max-width: none;
                margin: 1rem;
            }

            .form-row,
            .form-row-triple {
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
            
            .modal-content {
                width: 95%;
                padding: 0;
            }

            .modal-header,
            .modal-body,
            .modal-footer {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .record-row {
                grid-template-columns: 1fr;
                gap: 0.5rem;
            }

            .form-row,
            .form-row-triple {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
        }

        /* Form Validation Styles */
        .form-group.error input,
        .form-group.error textarea,
        .form-group.error select {
            border-color: var(--danger-color);
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
        }

        .error-message {
            color: var(--danger-color);
            font-size: 0.75rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .error-message::before {
            content: '⚠️';
        }

        /* Success States */
        .form-group.success input,
        .form-group.success textarea,
        .form-group.success select {
            border-color: var(--success-color);
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        /* Progress Indicator for Multi-step Forms */
        .form-progress {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
            padding: 0 2.5rem;
        }

        .progress-step {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--bg-primary);
            border: 2px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--text-secondary);
            position: relative;
        }

        .progress-step.active {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        .progress-step.completed {
            background: var(--success-color);
            border-color: var(--success-color);
            color: white;
        }

        .progress-step:not(:last-child)::after {
            content: '';
            position: absolute;
            left: 100%;
            top: 50%;
            transform: translateY(-50%);
            width: 60px;
            height: 2px;
            background: var(--border-color);
        }

        .progress-step.completed:not(:last-child)::after {
            background: var(--success-color);
        }

        /* Enhanced View Modal with Scrollbar */
.view-modal .modal-content {
    max-width: 800px;
    max-height: 90vh; /* Limit height to 90% of viewport */
    display: flex;
    flex-direction: column;
}

.view-records-container {
    background: var(--bg-secondary);
    border-radius: 20px;
    box-shadow: var(--shadow-xl);
    padding: 0;
    max-width: 800px;
    margin: 0 auto;
    font-family: 'Inter', sans-serif;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    max-height: 90vh; /* Ensure container doesn't exceed viewport */
}

.view-records-header {
    background: linear-gradient(135deg, var(--success-color) 0%, #059669 100%);
    color: white;
    font-size: 1.75rem;
    font-weight: 700;
    margin: 0;
    padding: 2rem 2.5rem 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    text-align: center;
    justify-content: center;
    flex-shrink: 0; /* Prevent header from shrinking */
    position: relative;
}

/* Enhanced Close Button for View Modal */
.view-records-header .close {
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

.view-records-header .close:hover {
    color: white;
    background: rgba(255, 255, 255, 0.2);
    transform: scale(1.1);
}

/* Scrollable Content Area */
.view-content {
    padding: 2rem 2.5rem;
    overflow-y: auto; /* Enable vertical scrolling */
    flex: 1; /* Take remaining space */
    max-height: calc(90vh - 120px); /* Subtract header height */
}

/* Custom Scrollbar Styling */
.view-content::-webkit-scrollbar {
    width: 8px;
}

.view-content::-webkit-scrollbar-track {
    background: var(--bg-primary);
    border-radius: 4px;
}

.view-content::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
    border-radius: 4px;
    transition: background 0.2s ease;
}

.view-content::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);
}

/* Firefox Scrollbar */
.view-content {
    scrollbar-width: thin;
    scrollbar-color: var(--primary-color) var(--bg-primary);
}

/* Enhanced Record Sections with Better Spacing */
.record-section {
    margin-bottom: 2rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 16px;
    padding: 1.5rem;
    border: 1px solid var(--border-color);
    box-shadow: var(--shadow-sm);
    transition: all 0.2s ease;
}

.record-section:last-child {
    margin-bottom: 0;
}

.section-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid var(--border-color);
}

.record-row {
    display: grid;
    grid-template-columns: 1fr 2fr;
    align-items: start;
    gap: 1.5rem;
    margin-bottom: 1rem;
    padding: 1rem 0;
    border-bottom: 1px solid rgba(16, 61, 135, 0.1);
    transition: all 0.2s ease;
}

.record-row:last-child {
    border-bottom: none;
    margin-bottom: 0;
}

.record-label {
    color: var(--text-secondary);
    font-weight: 600;
    font-size: 0.875rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.record-value {
    font-weight: 500;
    color: var(--text-primary);
    font-size: 0.875rem;
    word-wrap: break-word;
    line-height: 1.5;
}

.record-value.highlight {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-weight: 600;
    box-shadow: var(--shadow-sm);
}

/* Responsive Design for View Modal */
@media (max-width: 768px) {
    .view-records-container {
        max-height: 95vh;
    }
    
    .view-content {
        padding: 1.5rem;
        max-height: calc(95vh - 100px);
    }
    
    .view-records-header {
        padding: 1.5rem;
        font-size: 1.5rem;
    }
    
    .record-row {
        grid-template-columns: 1fr;
        gap: 0.5rem;
    }
    
    .record-section {
        padding: 1rem;
        margin-bottom: 1.5rem;
    }
}

/* Scroll Indicator */
.view-content::before {
    content: '';
    position: sticky;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, 
        var(--primary-color) 0%, 
        var(--primary-light) 50%, 
        var(--primary-color) 100%);
    z-index: 10;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.view-content.scrolled::before {
    opacity: 1;
}

/* Add scroll detection script */
.view-content {
    position: relative;
}

/* Enhanced spacing for better readability */
.record-value {
    min-height: 1.5rem;
    display: flex;
    align-items: center;
}

.record-value:empty::after {
    content: '—';
    color: var(--text-secondary);
    font-style: italic;
}

/* Better visual hierarchy */
.section-title i {
    color: var(--primary-light);
    font-size: 1.2rem;
}

.record-label i {
    color: var(--primary-color);
    width: 16px;
    text-align: center;
}

/* Smooth scrolling */
.view-content {
    scroll-behavior: smooth;
}

/* Loading state for view modal */
.view-content.loading {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 200px;
}

.view-content.loading::after {
    content: '';
    width: 40px;
    height: 40px;
    border: 4px solid var(--border-color);
    border-top: 4px solid var(--primary-color);
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

.history-button-wrapper {
    display: flex;
    align-items: center;
}

.history-button {
    background: rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(10px);
    color: white;
    padding: 0.625rem 1.25rem;
    font-size: 0.875rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    transition: all 0.3s ease;
    text-decoration: none;
    cursor: pointer;
    font-family: 'Inter', sans-serif;
}

.history-button:hover {
    background: rgba(0, 0, 0, 0.5);
    border-color: rgba(255, 255, 255, 0.3);
    transform: translateY(-1px);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    color: white;
}

.history-button:active {
    transform: translateY(0);
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.history-button i {
    font-size: 1rem;
    color: white;
}
        /* Enhanced Filter Section Styling */
        .filter-header {
              display: flex;
  align-items: center;
  justify-content: flex-start;
  gap: 0.1rem;
  position: relative;
  min-width: 100px;
        }

        .filter-title {
            font-weight: 600;
            color: var(--text-primary);
            font-size: 0.875rem;
            flex: 1;
            white-space: nowrap;
        }

        /* Enhanced Filter Button */
        .filter-btn {
              margin-left: 0.25rem;
  padding: 0.25rem;
  height: 26px;
  width: 26px;
  min-width: 26px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 6px;
  border: 1px solid var(--border-color);
  background: white;
  color: var(--primary-color);
        }

        .filter-btn:hover {
            background: linear-gradient(135deg, var(--secondary-color) 0%, #c7d7ff 100%);
            border-color: var(--primary-color);
            color: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .filter-btn:active {
            transform: translateY(0);
            box-shadow: var(--shadow-sm);
        }

        .filter-btn.active {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            color: white;
            border-color: var(--primary-dark);
            box-shadow: var(--shadow-md);
        }

        .filter-btn i {
            font-size: 0.875rem;
            display: block;
        }

        /* Enhanced Dropdown Container */
        .filter-dropdown {
  display: none;
  position: absolute;
  top: calc(100% + 8px);
  right: 0;
  background: var(--bg-secondary);
  border: 1px solid var(--border-color);
  border-radius: 12px;
  box-shadow: var(--shadow-xl);
  z-index: 9999 !important; /* Make sure it's on top */
  min-width: 200px;
  max-height: 300px; /* Enough room to scroll */
  overflow-y: auto;
  overflow-x: hidden;
  backdrop-filter: blur(10px);
  
}

        @keyframes dropdownSlideIn {
            from {
                opacity: 0;
                transform: translateY(-10px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .filter-dropdown.show {
            display: block;
        }

        /* Enhanced Dropdown Header */
        .dropdown-header {
            padding: 1rem 1.25rem 0.75rem;
            border-bottom: 1px solid var(--border-color);
            background: linear-gradient(135deg, var(--bg-primary) 0%, #f1f5f9 100%);
            border-radius: 12px 12px 0 0;
        }

        .dropdown-title {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 0.875rem;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dropdown-subtitle {
            font-size: 0.75rem;
            color: var(--text-secondary);
            margin-top: 0.25rem;
            font-weight: 400;
        }

        /* Enhanced Dropdown Items */
        .dropdown-item {
            display: block;
            width: 100%;
            padding: 0.75rem 1.25rem;
            font-size: 0.875rem;
            color: var(--text-primary);
            background: transparent;
            border: none;
            text-align: left;
            cursor: pointer;
            transition: all 0.2s ease;
            border-bottom: 1px solid rgba(229, 231, 235, 0.5);
            font-weight: 500;
            position: relative;
        }

        .dropdown-item:last-child {
            border-bottom: none;
            border-radius: 0 0 12px 12px;
        }

        .dropdown-item:hover {
            background: linear-gradient(135deg, var(--secondary-color) 0%, #c7d7ff 100%);
            color: var(--primary-color);
            transform: translateX(4px);
            padding-left: 1.5rem;
        }

        .dropdown-item:active {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            color: white;
        }

        /* Special styling for Reset button */
        .dropdown-item.reset {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: var(--danger-color);
            font-weight: 600;
            border-top: 2px solid var(--border-color);
            margin-top: 0.5rem;
        }

        .dropdown-item.reset:hover {
            background: linear-gradient(135deg, var(--danger-color) 0%, #dc2626 100%);
            color: white;
            transform: translateX(0);
            padding-left: 1.25rem;
        }

        /* Enhanced Gender Filter Dropdown */
        #genderFilterDropdown {
            display: none;
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            box-shadow: var(--shadow-xl);
            z-index: 1000;
            min-width: 160px;
            overflow: hidden;
            backdrop-filter: blur(10px);
            animation: dropdownSlideIn 0.2s ease-out;
        }

        #genderFilterDropdown.show {
            display: block;
        }
/* Professional Archive Modal Styling - Red Theme */
.archive-actions {
    display: flex;
    justify-content: center;
    gap: 1rem;
    width: 100%;
}

.btn-archive-confirm {
    background: linear-gradient(135deg, var(--danger-color) 0%, #dc2626 100%);
    color: white;
    padding: 1rem 2rem;
    border-radius: 12px;
    border: none;
    cursor: pointer;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    box-shadow: var(--shadow-md);
    min-width: 160px;
    justify-content: center;
}

.btn-archive-cancel {
    background: var(--bg-secondary);
    color: var(--text-primary);
    padding: 1rem 2rem;
    border-radius: 12px;
    border: 2px solid var(--border-color);
    cursor: pointer;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    min-width: 120px;
    justify-content: center;
}

.btn-archive-confirm:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
    background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
}

.btn-archive-cancel:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
    border-color: var(--text-secondary);
    background: var(--bg-primary);
}

.btn-archive-confirm:active,
.btn-archive-cancel:active {
    transform: translateY(0);
}

/* Red header styling for archive modal */
#archivePatientModal .modal-header {
    background: linear-gradient(135deg, var(--danger-color) 0%, #dc2626 100%);
}

#archivePatientModal .modal-header h2 {
    color: white;
}

#archivePatientModal .modal-header .close {
    color: rgba(255, 255, 255, 0.8);
    background: rgba(255, 255, 255, 0.1);
}

#archivePatientModal .modal-header .close:hover {
    color: white;
    background: rgba(255, 255, 255, 0.2);
    transform: scale(1.1);
}

.unsaved-modal-content {
    max-width: 450px;
    width: 90%;
    margin: 0 auto;
}

.unsaved-actions {
    display: flex;
    justify-content: center;
    gap: 1rem;
    width: 100%;
}

.btn-discard-confirm {
    background: linear-gradient(135deg, var(--warning-color) 0%, #d97706 100%);
    color: white;
    padding: 1rem 2rem;
    border-radius: 12px;
    border: none;
    cursor: pointer;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    box-shadow: var(--shadow-md);
    min-width: 180px;
    justify-content: center;
}

.btn-discard-cancel {
    background: var(--bg-secondary);
    color: var(--text-primary);
    padding: 1rem 2rem;
    border-radius: 12px;
    border: 2px solid var(--border-color);
    cursor: pointer;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    min-width: 120px;
    justify-content: center;
}

.btn-discard-confirm:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
    background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
}

.btn-discard-cancel:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
    border-color: var(--text-secondary);
    background: var(--bg-primary);
}

.btn-discard-confirm:active,
.btn-discard-cancel:active {
    transform: translateY(0);
}

/* Yellow-Orange header styling for unsaved changes modal */
#unsavedChangesModal .modal-header {
    background: linear-gradient(135deg, var(--warning-color) 0%, #d97706 100%);
    padding: 2rem 2rem 1.5rem;
}

#unsavedChangesModal .modal-header h2 {
    color: white;
    font-size: 1.5rem;
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
}

#unsavedChangesModal .modal-header .close {
    color: rgba(255, 255, 255, 0.8);
    background: rgba(255, 255, 255, 0.1);
    top: 1.5rem;
    right: 1.5rem;
}

#unsavedChangesModal .modal-header .close:hover {
    color: white;
    background: rgba(255, 255, 255, 0.2);
    transform: scale(1.1);
}

/* Adjust modal body and footer spacing */
#unsavedChangesModal .modal-body {
    padding: 2rem;
}

#unsavedChangesModal .modal-footer {
    padding: 1.5rem 2rem 2rem;
    background: (#ffffff 100%);
    border-top: 1px solid #686868;
}

/* Responsive adjustments for smaller screens */
@media (max-width: 768px) {
    .unsaved-modal-content {
        width: 95%;
        margin: 1rem;
    }
    
    #unsavedChangesModal .modal-header {
        padding: 1.5rem 1.5rem 1rem;
    }
    
    #unsavedChangesModal .modal-body {
        padding: 1.5rem;
    }
    
    #unsavedChangesModal .modal-footer {
        padding: 1rem 1.5rem 1.5rem;
    }
    
    .unsaved-actions {
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .btn-discard-confirm,
    .btn-discard-cancel {
        min-width: auto;
        width: 100%;
    }
}

/* Enhanced warning color variables if not already defined */
:root {
    --warning-color: #f59e0b;
    --warning-light: #fbbf24;
    --warning-dark: #d97706;
}

<!-- ADD BLUE EDIT CONFIRMATION MODAL STYLING (add after the archive-style modal styles) -->

/* Blue Edit Confirmation Modal Styling */
.modal-header-minimal {
    background: transparent;
    padding: 1.5rem 2rem 0;
    position: relative;
}

.modal-header-minimal .close {
    position: absolute;
    top: 1.5rem;
    right: 2rem;
    font-size: 1.5rem;
    cursor: pointer;
    color: var(--text-secondary);
    background: transparent;
    border: none;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}

.modal-header-minimal .close:hover {
    background: var(--bg-primary);
    color: var(--text-primary);
    transform: scale(1.1);
}

.icon-circle {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    font-size: 2rem;
    box-shadow: var(--shadow-md);
}

.icon-circle.blue-theme {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
    color: white;
}

.modal-title-center {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    text-align: center;
    margin-bottom: 1.5rem;
    line-height: 1.3;
}

.modal-description {
    color: var(--text-secondary);
    font-size: 0.875rem;
    line-height: 1.6;
    text-align: center;
    margin-bottom: 2.5rem;
    font-weight: 400;
    max-width: 400px;
    margin-left: auto;
    margin-right: auto;
}

.btn-primary-blue {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
    color: white;
    padding: 1rem 2rem;
    border-radius: 12px;
    border: none;
    cursor: pointer;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    box-shadow: var(--shadow-md);
    min-width: 180px;
    justify-content: center;
}

.btn-primary-blue:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
    background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);
}

.btn-primary-blue:active {
    transform: translateY(0);
}

/* Adjust modal body for edit confirmation */
/* Edit Confirmation Modal - Staff Management Style */

#editConfirmModal .modal-footer {
    padding: 1.5rem 2.5rem 2rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-top: 1px solid var(--border-color);
    display: flex;
    justify-content: center; /* Changed from flex-end to center */
    gap: 1rem;
}

#editConfirmModal .btn-submit {
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
    box-shadow: var(--shadow-md);
}

#editConfirmModal .btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

#editConfirmModal .btn-cancel {
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

#editConfirmModal .btn-cancel:hover {
    background: var(--bg-primary);
    border-color: var(--text-secondary);
}

/* Responsive Design for Edit Confirmation Modal */
@media (max-width: 768px) {
    #editConfirmModal .modal-content {
        width: 95%;
        margin: 1rem;
    }

    #editConfirmModal .modal-header,
    #editConfirmModal .modal-body,
    #editConfirmModal .modal-footer {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }
    
    #editConfirmModal .modal-footer {
        flex-direction: column;
        gap: 0.75rem;
        justify-content: center; /* Keep centered on mobile too */
    }
    
    #editConfirmModal .btn-submit,
    #editConfirmModal .btn-cancel {
        width: 100%;
        justify-content: center;
    }
}

/* Enhanced Confirmation Modal Styling */
.modal-content.confirm-box {
    max-width: 450px;
    text-align: left; /* Changed from center to left */
}

.modal-content.confirm-box .modal-header {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
    color: white;
    padding: 2rem 2.5rem 1.5rem;
    border-radius: 20px 20px 0 0;
    position: relative;
    text-align: center;
}

.modal-content.confirm-box .modal-header h2 {
    font-size: 1.5rem;
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    color: white;
}

.modal-content.confirm-box .modal-header .close {
    position: absolute;
    top: 1.5rem;
    right: 2rem;
    font-size: 1.5rem;
    cursor: pointer;
    color: rgba(255, 255, 255, 0.8);
    background: rgba(255, 255, 255, 0.1);
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}

.modal-content.confirm-box .modal-header .close:hover {
    color: white;
    background: rgba(255, 255, 255, 0.2);
    transform: scale(1.1);
}

.modal-content.confirm-box .modal-body {
    padding: 2rem 2.5rem;
}

.modal-content.confirm-box .modal-footer {
    padding: 1.5rem 2.5rem 2rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-top: 1px solid var(--border-color);
    display: flex;
    justify-content: center;
    gap: 1rem;
}

.modal-content.confirm-box .btn-submit {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
    color: white;
    padding: 1rem 2rem;
    border-radius: 12px;
    border: none;
    cursor: pointer;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    box-shadow: var(--shadow-md);
}

.modal-content.confirm-box .btn-cancel {
    background: var(--bg-secondary);
    color: var(--text-primary);
    padding: 1rem 2rem;
    border-radius: 12px;
    border: 2px solid var(--border-color);
    cursor: pointer;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
}

.modal-content.confirm-box .btn-submit:hover,
.modal-content.confirm-box .btn-cancel:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

/* Remove old confirm-actions styling */
.confirm-actions {
    display: none; /* Hide old styling */
}

/* Title Section - Horizontal Layout with button on same line */
.title-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    gap: 1rem;
}

.overview-title {
    font-size: 2rem;
    font-weight: 700;
    color: #1e40af; /* Keep the blue color for the text */
    margin: 0;
    /* Remove the border-bottom and padding-bottom */
    /* border-bottom: 3px solid #1e40af; */
    /* padding-bottom: 0.5rem; */
    display: inline-block;
}

/* Remove the ::after pseudo-element that creates the underline */
.overview-title::after {
    display: none;
}

/* Print Button aligned on same line as title */
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
    white-space: nowrap;
    margin: 0;
}

.print-button:hover {
    background: var(--bg-primary);
    border-color: var(--text-secondary);
    transform: translateY(-1px);
    box-shadow: var(--shadow-sm);
}

/* Responsive Design */
@media (max-width: 768px) {
    .title-section {
        flex-direction: row;
        gap: 0.5rem;
        align-items: flex-start;
    }
    
    .overview-title {
        font-size: 1.5rem;
        flex: 1;
    }
    
    .print-button {
        padding: 0.5rem 0.75rem;
        font-size: 0.75rem;
        flex-shrink: 0;
    }
}

.filter-search {
    width: 90%;
    margin: 0.5rem auto;
    display: block;
    padding: 0.5rem 0.75rem;
    border-radius: 8px;
    border: 1px solid var(--border-color);
    font-size: 0.8rem;
    color: var(--text-primary);
    background: var(--bg-primary);
}


    
    </style>
</head>
<body>
        <div class="sidebar">
            <div class="sidebar-header">
                <img src="{{ asset('images/logo2.png') }}" alt="Barangay Logo" class="sidebar-logo">
                <h2>Barangay Daang Bakal<br>Health Center</h2>
            </div>
            
             <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-line"></i>
                Admin Dashboard
            </a>
            <a href="{{ route('admin.staff') }}" class="nav-link {{ request()->routeIs('admin.staff') ? 'active' : '' }}">
                <i class="fas fa-users"></i>
                Staff Management
            </a>
                <a href="{{ route('admin.health-records.index') }}" class="nav-link {{ request()->routeIs('admin.health-records.index') ? 'active' : '' }}">
    <i class="fas fa-file-medical"></i>
    Patient Health Records
</a>

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
                    <i class="fas fa-user-md"></i>
                </div>
                <div>
                    <div style="font-weight: 600;">{{ Auth::user()->name }}</div>
                    <div style="font-size: 0.75rem; color: var(--text-secondary);">{{ Auth::user()->role ?? 'User' }}</div>
                </div>
            </div>
        </div>
        
        

               <div class="title-section">
    <h1 class="overview-title">Patient Health Records</h1>
    
     <div class="searchbar">
    <form method="GET" action="{{ route('health.records') }}">
        <i class="fas fa-search"></i>
        <input 
    type="text" 
    name="search" 
    id="searchInput" 
    placeholder="Search by ID, First or Last Name..."
    value="{{ request('search') }}"
    autofocus>
    </form>
</div>

    <form id="printForm" action="{{ route('patients.printAll') }}" method="GET" target="_blank">
        <!-- Hidden inputs to pass active filters -->
        <input type="hidden" name="last_name" id="printLastName" value="{{ request('last_name') }}">
        <input type="hidden" name="gender" id="printGender" value="{{ request('gender') }}">
        <input type="hidden" name="visit_purpose" id="printVisitPurpose" value="{{ request('visit_purpose') }}">
        <input type="hidden" name="medical_diagnosis" id="printDiagnosis" value="{{ request('medical_diagnosis') }}">
        <button type="submit" class="print-button">
            <i class="fas fa-print"></i>
            <span>Print History</span>
        </button>
    </form>
</div>



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
                            <th>ID</th>
                            <th>Date Consulted</th>
                            <th>First Name</th>
                            <th>
                                    <div class="filter-header">
                                        <span class="filter-title">Last Name</span>
                                        <div class="filter-dropdown-container">
                                            <button onclick="sortByLastName()" class="filter-btn" id="lastnameSortBtn">
                                                <i class="fas fa-sort-alpha-down"></i>
                                            </button>
                                        </div>
                                    </div>
                                </th>
                            <th>Age</th>
                             <th>
            <div class="filter-header">
                <span class="filter-title">Gender</span>
                <div class="filter-dropdown-container">
                    <button onclick="toggleGenderFilter()" class="filter-btn" id="genderFilterBtn">
                        <i class="fas fa-filter"></i>
                    </button>
                    <div id="genderFilterDropdown" class="filter-dropdown">
                        <div class="dropdown-header">
                            <div class="dropdown-title">
                                <i class="fas fa-venus-mars"></i>
                                Filter by Gender
                            </div>
                            <div class="dropdown-subtitle">Select gender to filter</div>
                        </div>
                        <form method="GET" action="{{ route('health.records') }}">
                            <input type="hidden" name="visit_purpose" value="{{ request('visit_purpose') }}">
                            <input type="hidden" name="medical_diagnosis" value="{{ request('medical_diagnosis') }}">

                            <button type="submit" name="gender" value="Male" class="dropdown-item">
                                <i class="fas fa-mars" style="color: #3b8ch2f6; margin-right: 0.5rem;"></i>
                                Male
                            </button>
                            <button type="submit" name="gender" value="Female" class="dropdown-item">
                                <i class="fas fa-venus" style="color: #ec4899; margin-right: 0.5rem;"></i>
                                Female
                            </button>
                            <button type="submit" name="gender" value="" class="dropdown-item reset">
                                <i class="fas fa-undo" style="margin-right: 0.5rem;"></i>
                                Reset Filter
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </th>

<th>
    <div class="filter-header">
        <span class="filter-title">Visit Purpose</span>
        <div class="filter-dropdown-container">
            <button onclick="toggleDropdown('purpose')" class="filter-btn" id="purposeFilterBtn">
                <i class="fas fa-filter"></i>
            </button>
            <div id="visitPurposeDropdown" class="filter-dropdown">
                <div class="dropdown-header">
                    <div class="dropdown-title">
                        <i class="fas fa-clipboard-list"></i>
                        Filter by Visit Purpose
                    </div>
                    <div class="dropdown-subtitle">Select purpose to filter</div>
                    <input type="text" class="filter-search" placeholder="Search purpose..."
                           onkeyup="filterDropdown(this, 'visitPurposeDropdown')">
                </div>

                {{-- ✅ Pulling from $allPurposes (full dataset) --}}
                <form method="GET" action="{{ route('health.records') }}">
                    <input type="hidden" name="gender" value="{{ request('gender') }}">
                    <input type="hidden" name="medical_diagnosis" value="{{ request('medical_diagnosis') }}">
                    <input type="hidden" name="medical_diagnosis_search" value="{{ request('medical_diagnosis_search') }}">

                    @foreach($allPurposes as $purpose)
                        <button type="submit" name="visit_purpose" value="{{ $purpose }}" class="dropdown-item">
                            {{ $purpose }}
                        </button>
                    @endforeach

                    <button type="submit" name="visit_purpose" value="" class="dropdown-item reset">
                        <i class="fas fa-undo" style="margin-right: 0.5rem;"></i>
                        Reset Filter
                    </button>
                </form>
            </div>
        </div>
    </div>
</th>


<th>
    <div class="filter-header">
        <span class="filter-title">Medical Diagnosis</span>
        <div class="filter-dropdown-container">
            <button onclick="toggleDropdown('diagnosis')" class="filter-btn" id="diagnosisFilterBtn">
                <i class="fas fa-filter"></i>
            </button>
            <div id="medicalDiagnosisDropdown" class="filter-dropdown">
                <div class="dropdown-header">
                    <div class="dropdown-title">
                        <i class="fas fa-stethoscope"></i>
                        Filter by Diagnosis
                    </div>
                    <div class="dropdown-subtitle">Select diagnosis to filter</div>
                    <input type="text" class="filter-search" placeholder="Search diagnosis..."
                           onkeyup="filterDropdown(this, 'medicalDiagnosisDropdown')">
                </div>

                {{-- ✅ Pulling from $diagnoses (full dataset) --}}
                <form method="GET" action="{{ route('health.records') }}">
                        <input type="hidden" name="gender" value="{{ request('gender') }}">
                        <input type="hidden" name="visit_purpose" value="{{ request('visit_purpose') }}">
                        <input type="hidden" name="visit_purpose_search" value="{{ request('visit_purpose_search') }}">
                        <input type="hidden" name="medical_diagnosis" value=""> {{-- ✅ Hidden for dynamic submit --}}

                        @foreach($diagnoses as $diag)
                        <button type="button" 
                                class="dropdown-item diagnosis-filter" 
                                data-diagnosis="{{ $diag->diagnosis_name }}">
                            {{ $diag->diagnosis_name }}
                        </button>
                    @endforeach


                        <button type="submit" name="medical_diagnosis" value="" class="dropdown-item reset">
                            <i class="fas fa-undo" style="margin-right: 0.5rem;"></i>
                            Reset Filter
                        </button>
                    </form>

                                </div>
                            </div>
                        </div>
                    </th>

                    <th>Status</th>
                            <th>
                                <div style="display: flex; align-items: center; justify-content: space-between;">
                                    <span>Actions</span>
                                    <button onclick="openModal()" class="add-btn">
                                        <i class="fas fa-plus"></i>
                                        Add Patient
                                    </button>
                                </div>
                            </th>
                        </tr>
                    </thead>
                  <tbody id="patientTable">
    @if($healthRecords->count() > 0)
        @foreach ($healthRecords as $record)
            <tr>
                {{-- Patient ID --}}
                <td>
                    @php
                        $prefix = 'PR';
                        $year = $record->created_at ? $record->created_at->format('y') : now()->format('y');
                        $month = $record->created_at ? $record->created_at->format('m') : now()->format('m');
                        $formattedId = str_pad($record->id, 2, '0', STR_PAD_LEFT);
                    @endphp
                    {{ $prefix . '-' . $year . $month . $formattedId }}
                </td>
                <td>{{ \Carbon\Carbon::parse($record->date_consulted)->format('M d, Y') }}</td>
                <td>{{ $record->first_name ?? '—' }}</td>
                <td>{{ $record->last_name ?? '—' }}</td>
                <td>{{ $record->age ? $record->age . ' old' : '—' }}</td>

                {{-- GENDER --}}
                <td>
                    @if($record->gender)
                        @php
                            $genderClass = $record->gender === 'Male' 
                                ? 'bg-blue-100 text-blue-900' 
                                : 'bg-pink-100 text-pink-700';
                        @endphp
                        <span class="px-2 py-1 rounded text-sm font-medium {{ $genderClass }}">
                            {{ $record->gender }}
                        </span>
                    @endif
                </td>

                {{-- VISIT PURPOSE --}}
                <td>
                    {{ is_array($record->visit_purpose)
                        ? implode(', ', $record->visit_purpose)
                        : implode(', ', json_decode($record->visit_purpose, true)) }}
                </td>

                {{-- DIAGNOSIS --}}
                <td>
                    @php
                        $diagnosisList = $record->diagnoses->pluck('diagnosis_name')->toArray();
                        if (!empty($record->other_diagnosis)) {
                            $diagnosisList[] = $record->other_diagnosis;
                        }
                    @endphp
                    {{ implode(', ', $diagnosisList) }}
                </td>

                {{-- STATUS --}}
                <td>
                    <span class="status-badge {{ strtolower($record->status) }}">
            {{ ucfirst($record->status) }}
        </span>

                {{-- ACTION BUTTONS --}}
                <td>
                    <div class="action-buttons">
                        <button class="action-btn view" onclick="openViewModalFromData(this)" data-record='@json($record)'>
                            <i class="fas fa-eye"></i>
                            View
                        </button>
                        @php
                            $recordData = $record->toArray();
                            $recordData['medical_diagnosis'] = $record->diagnoses->pluck('id');
                        @endphp
                        <button class="action-btn edit" onclick="openEditModalFromData(this)" data-record='@json($recordData)'>
                            <i class="fas fa-edit"></i>
                            Edit
                        </button>
                        @auth
                            @if(auth()->user()->role === 'admin')
                                <form action="{{ route('health-records.archive', $record->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="button" class="action-btn archive" onclick="openArchivePatientModal({{ $record->id }}, '{{ $record->first_name }}', '{{ $record->last_name }}')">
                                        <i class="fas fa-archive"></i> Archive
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="9" style="text-align:center; padding:1rem; color: var(--text-secondary); font-style:italic;">
                <i class="fas fa-info-circle"></i> No medical diagnosis record found
            </td>
        </tr>
    @endif
</tbody>


                </table>
            </div>

            <!-- Pagination -->
        <div class="pagination-wrapper">
            <div class="pagination">
                {{-- Previous --}}
                @if ($healthRecords->onFirstPage())
                    <span class="pagination-button disabled">
                        <i class="fas fa-chevron-left"></i> Previous
                    </span>
                @else
                    <a href="{{ $healthRecords->previousPageUrl() }}" class="pagination-button">
                        <i class="fas fa-chevron-left"></i> Previous
                    </a>
                @endif
        
                {{-- Page Numbers --}}
                @php
                    $start = max($healthRecords->currentPage() - 1, 1);
                    $end = min($start + 2, $healthRecords->lastPage());
                @endphp
        
                @if ($start > 1)
                    <a href="{{ $healthRecords->url(1) }}" class="pagination-page">1</a>
                    @if ($start > 2)
                        <span class="pagination-dots">…</span>
                    @endif
                @endif
        
                @for ($i = $start; $i <= $end; $i++)
                    @if ($i == $healthRecords->currentPage())
                        <span class="pagination-page current">{{ $i }}</span>
                    @else
                        <a href="{{ $healthRecords->url($i) }}" class="pagination-page">{{ $i }}</a>
                    @endif
                @endfor
        
                @if ($end < $healthRecords->lastPage())
                    @if ($end < $healthRecords->lastPage() - 1)
                        <span class="pagination-dots">…</span>
                    @endif
                    <a href="{{ $healthRecords->url($healthRecords->lastPage()) }}" class="pagination-page">
                        {{ $healthRecords->lastPage() }}
                    </a>
                @endif
        
                {{-- Next --}}
                @if ($healthRecords->hasMorePages())
                    <a href="{{ $healthRecords->nextPageUrl() }}" class="pagination-button">
                        Next <i class="fas fa-chevron-right"></i>
                    </a>
                @else
                    <span class="pagination-button disabled">
                        Next <i class="fas fa-chevron-right"></i>
                    </span>
                @endif
            </div>
        </div>

        <!-- ENHANCED ADD PATIENT MODAL -->
        <div id="addModal" class="modal add-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <h2>
                        <i class="fas fa-user-plus"></i>
                        Add New Patient
                    </h2>
                    <div class="modal-subtitle">Enter patient information to create a new health record</div>
                </div>
                
                <div class="modal-body">
                    <form id="patientForm" action="{{ route('health.records.store') }}" method="POST">
                        @csrf
                        
                        <!-- Personal Information Section -->
                        <div class="record-section">
                            <div class="section-title">
                                <i class="fas fa-user"></i>
                                Personal Information
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="first_name" class="required-field">First Name</label>
                                    <div class="input-with-icon">
                                        <i class="fas fa-user input-icon"></i>
                                        <input type="text" name="first_name" placeholder="Enter first name" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="last_name" class="required-field">Last Name</label>
                                    <div class="input-with-icon">
                                        <i class="fas fa-user input-icon"></i>
                                        <input type="text" name="last_name" placeholder="Enter last name" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row-triple">
                                <div class="form-group">
                                    <label for="gender" class="required-field">Gender</label>
                                    <select id="gender" name="gender" required>
                                        <option value="" disabled selected>Select gender</option>
                                        <option value="Male"> Male</option>
                                        <option value="Female"> Female</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="birth_date" class="required-field">Birth Date</label>
                                    <div class="input-with-icon">
                                        <i class="fas fa-birthday-cake input-icon"></i>
                                        <input type="text" id="birth_date" name="birth_date" placeholder="Select birth date" class="datepicker" required>
                                    </div>
                                </div>

                                <!-- Blood Type -->
                                <div class="form-group">
                                    <label for="blood_type">Blood Type</label>
                                    <select name="blood_type" id="blood_type" class="form-select">
                                        <option value="">Select Blood Type</option>
                                        @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $type)
                                            <option value="{{ $type }}" {{ old('blood_type', $record->blood_type ?? '') === $type ? 'selected' : '' }}>{{ $type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Physical Information Section -->
                        <div class="record-section">
                            <div class="section-title">
                                <i class="fas fa-weight"></i>
                                Physical Information
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="height">Height (cm)</label>
                                    <div class="input-with-icon">
                                        <i class="fas fa-ruler-vertical input-icon"></i>
                                        <input type="number" step="0.01" name="height" id="height" placeholder="Enter height in cm">
                                    </div>
                                    <div class="optional-note">Optional - Leave blank if not measured</div>
                                </div>
                                <div class="form-group">
                                    <label for="weight">Weight (kg)</label>
                                    <div class="input-with-icon">
                                        <i class="fas fa-weight input-icon"></i>
                                        <input type="number" step="0.01" name="weight" id="weight" placeholder="Enter weight in kg">
                                    </div>
                                    <div class="optional-note">Optional - Leave blank if not measured</div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information Section -->
                        <div class="record-section">
                            <div class="section-title">
                                <i class="fas fa-address-book"></i>
                                Contact Information
                            </div>
                            
                            <div class="form-group">
                                <label for="contact_number">Contact Number</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-phone input-icon"></i>
                                    <input type="text" id="contact_number" name="contact_number" placeholder="Enter contact number (e.g. +63 912 345 6789)">
                                </div>
                                <div class="optional-note">Optional - For emergency contact purposes</div>
                            </div>

                        <div class="form-group">
                            <label for="philhealth_number">PhilHealth Number (Optional)</label>
                            <input type="text" name="philhealth_number" id="philhealth_number" class="form-control" value="{{ old('philhealth_number') }}">
                            <div class="optional-note">Optional</div>
                        </div>

                            <div class="form-group">
                                    <label for="street" class="required-field">Street</label>
                                    <select id="street" name="street" required> 
                                        <option value="P. Martinez Street">P. Martinez Street</option>
                                            <option value="Sen. Neptali Gonzales Street">Sen. Neptali Gonzales Street</option>
                                            <option value="V. Fabella Street">V. Fabella Street</option>
                                            <option value="E. Magalona Street">E. Magalona Street</option>
                                            <option value="F. Bernardo St.">F. Bernardo St.</option>
                                            <option value="Gen.Kalentong Street">Gen.Kalentong Street</option>
                                            <option value="Haig Street">Haig Street</option>
                                            <option value="J. Tiosejo">J. Tiosejo</option>
                                            <option value="Romualdez Street">Romualdez Street</option>
                                            <option value="Ochoa Building">Ochoa Building</option>
                                            <option value="Gomega Condominiums">Gomega Condominiums</option>
                                    </select>
                                </div>
                            <div class="form-group">
                                <label for="address" class="required-field">Specify Address</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-map-marker-alt input-icon"></i>
                                    <input type="text" id="address" name="address" placeholder="Enter complete address" required>
                                </div>
                            </div>
                        </div>

                        <!-- Medical Information Section -->
                         
                        <div class="record-section">
                            <div class="section-title">
                                <i class="fas fa-stethoscope"></i>
                                Medical Information
                            </div>
                            <div class="form-group">
                                <label for="date_of_consultation" class="required-field">Date of Consultation</label>
                                <div class="input-with-icon">
                                    {{-- <i class="fas fa-calendar-check input-icon"></i> --}}
                                    <input type="text" id="date_consulted" name="date_consulted" placeholder="MM/DD/YYYY" class="datepicker" required>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="visit_purpose_add" class="required-field">Visit Purpose</label>
                            <select name="visit_purpose[]" multiple class="form-select" id="visit_purpose_add">
                            @if (in_array($userRole, ['physician', 'nurse','admin']))
                                @foreach ($allPurposes as $purpose)
                                    <option value="{{ $purpose }}">{{ $purpose }}</option>
                                @endforeach

                            @elseif ($userRole == 'dentist')
                                @foreach ($dentistPurposes as $purpose)
                                    <option value="{{ $purpose }}">{{ $purpose }}</option>
                                @endforeach

                            @elseif ($userRole == 'midwife')
                                @foreach ($midwifePurposes as $purpose)
                                    <option value="{{ $purpose }}">{{ $purpose }}</option>
                                @endforeach
                                @endif
                            <option value="Others">Others</option>
                        </select>


                            <div id="otherPurposeWrapperAdd" class="optional-field" style="display: none;">
                                <label for="other_purpose_add">Please specify other purpose</label>
                                <textarea id="other_purpose_add" name="other_purpose" rows="3" placeholder="Describe the specific purpose of visit..."></textarea>
                            </div>
                        </div>

                            <div class="form-group">
                                <label for="medical_diagnosis_add" class="required-field">Medical Diagnosis</label>
                                <select name="medical_diagnosis[]" multiple class="form-select" id="medical_diagnosis_add">
                            @foreach ($diagnoses as $diagnosis)
                                <option value="{{ $diagnosis->id }}">{{ $diagnosis->diagnosis_name }}</option>
                            @endforeach
                            <option value="Others">Others</option>
                        </select>

                                <div id="otherDiagnosisWrapperAdd" class="optional-field" style="display: none;">
                                    <label for="other_diagnosis_add">Please specify other diagnosis</label>
                                    <textarea id="other_diagnosis_add" name="other_diagnosis" rows="3" placeholder="Describe the specific diagnosis..."></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="given_medicine">Given Medicine</label>
                                <div class="input-with-icon">
                                    <!-- <i class="fas fa-pills input-icon"></i> -->
                                    <textarea id="given_medicine" name="given_medicine" rows="3" placeholder="Enter prescribed medicine and dosage (if any)"></textarea>
                                </div>
                                <div class="optional-note">Only fill if medicine was prescribed during this visit</div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                   <button type="button" class="btn-cancel" onclick="onCancelClicked()">
                            <i class="fas fa-times"></i>
                            Cancel
                        </button>
                    <button type="submit" class="btn-submit" form="patientForm">
                        <i class="fas fa-save"></i>
                        Save Patient Record
                    </button>
                </div>
            </div>
        </div>

        <!-- ENHANCED VIEW PATIENT MODAL -->

        <div id="viewModal" class="modal view-modal">
            <div class="modal-content view-records-container">
                <div class="view-records-header">
                    <span class="close" onclick="closeViewModal()">&times;</span>
                    <i class="fas fa-file-medical"></i>
                    Patient Record Details

                    <div class="history-button-wrapper">
                        <a href="#" id="viewHistoryBtn" class="history-button" target="_blank">
                            <i class="fas fa-history"></i> View History
                        </a>
                    </div>
                
                </div>
                
                <div class="view-content" id="viewContent">
                    <!-- Personal Information Section -->
                    <div class="record-section">
                        <div class="section-title">
                            <i class="fas fa-user"></i>
                            Personal Information
                        </div>
                        <div class="record-row">
                            <div class="record-label">
                                <i class="fas fa-user"></i>
                                First Name:
                            </div>
                            <div class="record-value" id="viewFirstName"></div>
                        </div>
                        <div class="record-row">
                            <div class="record-label">
                                <i class="fas fa-user"></i>
                                Last Name:
                            </div>
                            <div class="record-value" id="viewLastName"></div>
                        </div>
                        <div class="record-row">
                            <div class="record-label">
                                <i class="fas fa-calendar-alt"></i>
                                Age:
                            </div>
                            <div class="record-value" id="viewAge"></div>
                        </div>
                        <div class="record-row">
                            <div class="record-label">
                                <i class="fas fa-venus-mars"></i>
                                Gender:
                            </div>
                            <div class="record-value" id="viewGender"></div>
                        </div>
                        <div class="record-row">
                            <div class="record-label">
                                <i class="fas fa-birthday-cake"></i>
                                Birth Date:
                            </div>
                            <div class="record-value" id="viewBirthDate"></div>
                        </div>
                        <div class="record-row">
                            <div class="record-label">
                                <i class="fa-solid fa-droplet" style="color: #10008a;"></i>
                                Blood Type:
                            </div>
                            <div class="record-value" id="viewBloodType">Loading...</div>
                        </div>
                    </div>
                
                    <!-- Physical Information Section -->
                    <div class="record-section">
                        <div class="section-title">
                            <i class="fas fa-weight"></i>
                            Physical Information
                        </div>
                        <div class="record-row">
                            <div class="record-label">
                                <i class="fas fa-ruler-vertical"></i>
                                Height:
                            </div>
                            <div class="record-value" id="viewHeight"></div>
                        </div>
                        <div class="record-row">
                            <div class="record-label">
                                <i class="fas fa-weight"></i>
                                Weight:
                            </div>
                            <div class="record-value" id="viewWeight"></div>
                        </div>
                    </div>

                    <!-- Contact Information Section -->
                    <div class="record-section">
                        <div class="section-title">
                            <i class="fas fa-address-book"></i>
                            Contact Information
                        </div>
                        <div class="record-row">
                            <div class="record-label">
                                <i class="fas fa-phone"></i>
                                Contact Number:
                            </div>
                            <div class="record-value" id="viewContact"></div>
                        </div>

                        <div class="record-row">
                                <div class="record-label">
                                    <i class="fa-solid fa-notes-medical" style="color: #374e74;"></i>
                                    PhilHealth Number:
                                </div>
                                <div class="record-value" id="viewPhilHealth">—</div>
                            </div>


                        <div class="record-row">
                                <div class="record-label">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Street:
                                </div>
                                <div class="record-value" id="viewStreet">—</div>
                            </div>
                        <div class="record-row">
                            <div class="record-label">
                                <i class="fa-solid fa-street-view" style="color: #233a61;"></i>
                                Specify Address:
                            </div>
                            <div class="record-value" id="viewAddress"></div>
                        </div>
                    </div>

                    <!-- Medical Information Section -->

                    <div class="record-section">
                        <div class="section-title">
                            <i class="fas fa-stethoscope"></i>
                            Medical Information
                        </div>

                         <div class="record-row">
                        <div class="record-label">
                            <i class="fas fa-calendar-check"></i>
                            Date of Consultation:
                        </div>
                        <div class="record-value" id="viewDateConsulted"></div>
                    </div>

                        <div class="record-row">
                            <div class="record-label">
                                <i class="fas fa-clipboard-list"></i>
                                Visit Purpose:
                            </div>
                            <div class="record-value" id="viewVisitPurpose"></div>
                        </div>

                        <div class="record-row">
                            <div class="record-label">
                                <i class="fas fa-diagnoses"></i>
                                Medical Diagnosis:
                            </div>
                            <div class="record-value"id="viewDiagnosis"></div>
                        </div>
                        
                        <div class="record-row">
                            <div class="record-label">
                                <i class="fas fa-pills"></i>
                                Given Medicine:
                            </div>
                            <div class="record-value" id="viewMedicine"></div>
                        </div>
                        <!-- Status -->
                       <div class="record-row">
                            <div class="record-label">
                                <i class="fa-solid fa-circle-check" style="color: #445f8e;"></i>
                                Status:
                            </div>
                            <div class="record-value" id="viewStatus">
                                <span class="badge bg-secondary">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ENHANCED EDIT PATIENT MODAL -->
        <div id="editModal" class="modal edit-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" onclick="closeEditModal()">&times;</span>
                    <h2>
                        <i class="fas fa-edit"></i>
                        Edit Patient Record
                    </h2>
                    <div class="modal-subtitle">Update patient information and medical details</div>
                </div>
                
                <div class="modal-body">
                    <form id="editPatientForm" method="POST" action="">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editRecordId" name="id">

                        <!-- Personal Information Section -->
                        <div class="record-section">
                            <div class="section-title">
                                <i class="fas fa-user"></i>
                                Personal Information
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="editFirstName" class="required-field">First Name</label>
                                    <div class="input-with-icon">
                                        <i class="fas fa-user input-icon"></i>
                                        <input type="text" id="editFirstName" name="first_name" placeholder="Enter first name" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="editLastName" class="required-field">Last Name</label>
                                    <div class="input-with-icon">
                                        <i class="fas fa-user input-icon"></i>
                                        <input type="text" id="editLastName" name="last_name" placeholder="Enter last name" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row-triple">

                                <div class="form-group">
                                    <label for="editGender" class="required-field">Gender</label>
                                    <select id="editGender" name="gender" required>
                                        <option value="" disabled>Select gender</option>
                                        <option value="Male"> Male</option>
                                        <option value="Female"> Female</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="editBirthDate" class="required-field">Birth Date</label>
                                    <div class="input-with-icon">
                                        <i class="fas fa-birthday-cake input-icon"></i>
                                        <input type="text" id="editBirthDate" name="birth_date" placeholder="Select birth date" class="datepicker" required>
                                    </div>
                                </div>

                                <!-- Blood Type -->
                                <div class="form-group">
                                    <label for="blood_type_edit">Blood Type</label>
                                    <select name="blood_type" id="blood_type_edit" class="form-select">
                                        <option value="">Select Blood Type</option>
                                        @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $type)
                                            <option value="{{ $type }}">{{ $type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Physical Information Section -->
                        <div class="record-section">
                            <div class="section-title">
                                <i class="fas fa-weight"></i>
                                Physical Information
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="editHeight">Height (cm)</label>
                                    <div class="input-with-icon">
                                        <i class="fas fa-ruler-vertical input-icon"></i>
                                        <input type="number" step="0.01" id="editHeight" name="height" placeholder="Enter height in cm">
                                    </div>
                                    <div class="optional-note">Optional - Leave blank if not measured</div>
                                </div>
                                <div class="form-group">
                                    <label for="editWeight">Weight (kg)</label>
                                    <div class="input-with-icon">
                                        <i class="fas fa-weight input-icon"></i>
                                        <input type="number" step="0.01" id="editWeight" name="weight" placeholder="Enter weight in kg">
                                    </div>
                                    <div class="optional-note">Optional - Leave blank if not measured</div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information Section -->
                        <div class="record-section">
                            <div class="section-title">
                                <i class="fas fa-address-book"></i>
                                Contact Information
                            </div>
                            
                            <div class="form-group">
                                <label for="editContactNumber">Contact Number</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-phone input-icon"></i>
                                    <input type="text" id="editContactNumber" name="contact_number" placeholder="Enter contact number">
                                </div>
                                <div class="optional-note">Optional - For emergency contact purposes</div>
                            </div>

                            <div class="form-group">
                                <label for="philhealth_number_edit">PhilHealth Number</label>
                               <input type="text" name="philhealth_number" id="philhealth_number_edit" class="form-control" value="">
                                <div class="optional-note">Optional</div>
                            </div>
                            <div class="form-group">
                                <label for="editStreet" class="required-field">Street</label>
                                <select id="editStreet" name="street" required>
                                    <option value="P. Martinez Street">P. Martinez Street</option>
                                        <option value="Sen. Neptali Gonzales Street">Sen. Neptali Gonzales Street</option>
                                        <option value="V. Fabella Street">V. Fabella Street</option>
                                        <option value="E. Magalona Street">E. Magalona Street</option>
                                        <option value="F. Bernardo St.">F. Bernardo St.</option>
                                        <option value="Gen.Kalentong Street">Gen.Kalentong Street</option>
                                        <option value="Haig Street">Haig Street</option>
                                        <option value="J. Tiosejo">J. Tiosejo</option>
                                        <option value="Romualdez Street">Romualdez Street</option>
                                        <option value="Ochoa Building">Ochoa Building</option>
                                        <option value="Gomega Condominiums">Gomega Condominiums</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="editAddress" class="required-field">Specify Address</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-map-marker-alt input-icon"></i>
                                    <input type="text" id="editAddress" name="address" placeholder="Enter complete address" required>
                                </div>
                            </div>
                        </div>

                        <!-- Medical Information Section -->
                        <div class="record-section">
                            <div class="section-title">
                                <i class="fas fa-stethoscope"></i>
                                Medical Information
                            </div>
                               @php
    $visitPurpose = json_decode($record?->visit_purpose ?? '[]', true);
@endphp


                            <div class="form-group">
                                <label for="editDateConsulted" class="required-field">Date of Consultation</label>
                                <div class="input-with-icon">
                                    {{-- <i class="fas fa-calendar-check input-icon"></i> --}}
                                    <input type="text" id="editDateConsulted" name="date_consulted" placeholder="MM/DD/YYYY" class="datepicker" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="editVisitPurpose" class="required-field">Visit Purpose</label>
                                 <select name="visit_purpose[]" multiple class="form-select" id="visit_purpose_edit">

        @if (in_array($userRole, ['physician', 'nurse', 'admin']))
            @foreach ($allPurposes as $purpose)
                <option value="{{ $purpose }}">{{ $purpose }}</option>
            @endforeach

        @elseif ($userRole == 'dentist')
            @foreach ($dentistPurposes as $purpose)
                <option value="{{ $purpose }}">{{ $purpose }}</option>
            @endforeach

        @elseif ($userRole == 'midwife')
            @foreach ($midwifePurposes as $purpose)
                <option value="{{ $purpose }}">{{ $purpose }}</option>
            @endforeach
        @endif   <!-- ✅ MISSING ENDIF ADDED -->

        <option value="Others">Others</option>
    </select>


                                <div id="editOtherPurposeWrapper" class="optional-field" style="display: none;">
                                    <label for="editOtherPurpose">Please specify other purpose</label>
                                    <textarea id="editOtherPurpose" name="other_purpose" rows="3" placeholder="Describe the specific purpose..."></textarea>
                                </div>
                            </div>

                            <div class="form-group">
    <label for="editMedicalDiagnosis" class="required-field">Medical Diagnosis</label>
    <select name="medical_diagnosis[]" multiple class="form-select" id="medical_diagnosis_edit">
        @foreach ($diagnoses as $diagnosis)
            <option value="{{ $diagnosis->id }}"
                {{ in_array($diagnosis->id, $selectedDiagnoses ?? []) ? 'selected' : '' }}>
                {{ $diagnosis->diagnosis_name }}
            </option>
        @endforeach
        <option value="Others" 
            {{ (isset($record) && in_array('Others', $record->medical_diagnosis ?? [])) ? 'selected' : '' }}>
            Others
        </option>
    </select>

    <div id="otherDiagnosisWrapperEdit" class="optional-field" 
         style="{{ (isset($record) && in_array('Others', $record->medical_diagnosis ?? [])) ? '' : 'display: none;' }}">
        <label for="other_diagnosis">Please specify other diagnosis</label>
        <textarea id="editOtherDiagnosis" name="other_diagnosis" rows="3" 
        placeholder="Describe the specific diagnosis...">{{ old('other_diagnosis', $record->other_diagnosis ?? '') }}</textarea>

    </div>
</div>


                            <div class="form-group">
                                <label for="editGivenMedicine">Given Medicine</label>
                                <div class="input-with-icon">
                                    <!-- <i class="fas fa-pills input-icon"></i> -->
                                    <textarea id="editGivenMedicine" name="given_medicine" rows="3" placeholder="Enter prescribed medicine and dosage"></textarea>
                                </div>
                                <div class="optional-note">Only fill if medicine was prescribed during this visit</div>
                            </div>

                            <div class="form-group">
    <label for="status" class="required-field">Medical Status</label>
    <select name="status" id="status" class="form-select" required>
    <option value="Cleared">Cleared</option>
    <option value="Under Treatment">Under Treatment</option>
    </select>
</div>

                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeEditModal()">
                        <i class="fas fa-times"></i>
                        Cancel
                    </button>


                    <button type="button" class="btn-submit" onclick="showUpdateConfirm()">
                        <i class="fas fa-save"></i>
                        Update Record
                    </button>
                </div>
            </div>
        </div>

                    <!-- Enhanced Confirmation Modal for Add -->
            <div id="confirmModal" class="modal">
                <div class="modal-content confirm-box">
                    <div class="modal-header">
                        <span class="close" onclick="closeConfirmModal()">&times;</span>
                        <h2>
                            <i class="fas fa-edit"></i>
                            Confirm Submission
                        </h2>
                    </div>
                    
                    <div class="modal-body">
                        <p style="font-size: 0.875rem; color: var(--text-primary); line-height: 1.6; margin-bottom: 0; text-align: center;">
                            Are you sure you want to add this patient record? Please review all information before confirming.
                        </p>
                    </div>

                    <div class="modal-footer">
                        <button class="btn-cancel" onclick="closeConfirmModal()">
                            Cancel
                        </button>
                        <button class="btn-submit" onclick="submitForm()">
                            <i class="fas fa-save"></i>
                            Yes, Add Record
                        </button>
                    </div>
                </div>
            </div>

                    <!-- Enhanced Confirmation Modal for Edit  -->
                <div id="editConfirmModal" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <span class="close" onclick="closeEditConfirmModal()">&times;</span>
                            <h2>
                                <i class="fas fa-edit"></i>
                                Confirm Update
                            </h2>
                        </div>
                        
                        <div class="modal-body">
                            <p style="font-size: 0.875rem; color: var(--text-primary); line-height: 1.6; margin-bottom: 0; text-align: center;">
                                Are you sure you want to update this patient record? All changes will be saved permanently.
                            </p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn-cancel" onclick="closeEditConfirmModal()">
                                Cancel
                            </button>
                            <button type="button" class="btn-submit" onclick="submitEditForm()">
                                <i class="fas fa-save"></i>
                                Update Record
                            </button>
                        </div>
                    </div>
                </div>

                            <!-- Archive Patient Record Modal -->
                                <div id="archivePatientModal" class="modal">
                        <div class="modal-content">
                            <div class="modal-header">
                                <span class="close" onclick="closeArchivePatientModal()">&times;</span>
                                <h2>
                                    <i class="fas fa-archive"></i>
                                    Confirm Archive
                                </h2>
                            </div>
                            
                            <div class="modal-body">
                                <p id="archivePatientMessage" style="font-size: 1rem; font-weight: 600; color: var(--text-primary); text-align: center; margin-bottom: 1.5rem; line-height: 1.4;">
                                    Are you sure you want to archive the record for<br><strong>Firstname Lastname</strong>?
                                </p>
                                
                                <div style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); border-radius: 12px; padding: 1.5rem; margin-bottom: 1.5rem; border: 1px solid var(--border-color);">
                                    <p style="color: var(--text-primary); font-size: 0.875rem; line-height: 1.6; text-align: center; margin-bottom: 1rem; font-weight: 500;">
                                        This action will move the patient record to the archive. The record will be preserved but removed from the active patient list.
                                    </p>
                                    
                                    <p style="color: var(--text-secondary); font-size: 0.875rem; text-align: center; margin-bottom: 0; font-weight: 400;">
                                        You can restore archived records later if needed.
                                    </p>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <form id="archivePatientForm" method="POST" action="" style="width: 100%;">
                                    @csrf
                                    @method('PUT')
                                    <div class="archive-actions">
                                        <button type="submit" class="btn-archive-confirm">
                                            <i class="fas fa-archive"></i>
                                            Yes, Archive Record
                                        </button>
                                        <button type="button" class="btn-archive-cancel" onclick="closeArchivePatientModal()">
                                            <i class="fas fa-times"></i>
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                                                <!-- Unsaved Changes Confirmation Modal -->
                            <div id="unsavedChangesModal" class="modal">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <span class="close" onclick="hideUnsavedConfirm()">&times;</span>
                                        <h2>
                                            <i class="fas fa-exclamation-triangle"></i>
                                            Unsaved Changes
                                        </h2>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <p style="font-size: 1rem; font-weight: 600; color: var(--text-primary); text-align: center; margin-bottom: 1.5rem; line-height: 1.4;">
                                            Are you sure you want to close this form?
                                        </p>
                                        
                                        <div style="background:">
                                        </div>
                                        
                                        <p style="color: var(--text-secondary); font-size: 0.875rem; text-align: center; margin-bottom: 0; font-weight: 400;">
                                            Make sure you have saved any important information before proceeding.
                                        </p>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="unsaved-actions">
                                            <button class="btn-discard-confirm" id="confirmCloseBtn">
                                                <i class="fas fa-check"></i>
                                                Yes, Discard Changes
                                            </button>
                                            <button class="btn-discard-cancel" onclick="hideUnsavedConfirm()">
                                                <i class="fas fa-times"></i>
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

    </div>
{{-- ---------------------------------------------------------------------------------------------------------------------------------------------------------- --}}
                                        <!-- JavaScript -->


<script>
function filterByGender(gender) {
    const base = "{{ route('health.records') }}"; // <-- ensure this route exists
    const params = new URLSearchParams(window.location.search);

    if (gender) { params.set('gender', gender); }
    else { params.delete('gender'); }

    params.delete('page'); // reset page when filtering
    const q = params.toString();
    window.location.href = q ? (base + '?' + q) : base;
}

function filterDropdown(input, dropdownId) {
    const filter = input.value.toLowerCase();
    const dropdown = document.getElementById(dropdownId);
    const items = dropdown.querySelectorAll('.dropdown-item');

    items.forEach(item => {
        const text = item.textContent || item.innerText;
        if (text.toLowerCase().indexOf(filter) > -1 || item.classList.contains('reset')) {
            item.style.display = "";
        } else {
            item.style.display = "none";
        }
    });
}

function searchPurpose(input) {
    let query = input.value;
    fetch(`/health/records/search-purpose?term=${encodeURIComponent(query)}`)
        .then(res => res.json())
        .then(data => {
            let dropdown = document.querySelector('#visitPurposeDropdown .dropdown-items');
            dropdown.innerHTML = '';
            data.forEach(purpose => {
                dropdown.innerHTML += `<button type="submit" name="visit_purpose" value="${purpose}" class="dropdown-item">${purpose}</button>`;
            });
        });
}


</script>
<script>
document.querySelectorAll('.diagnosis-filter').forEach(button => {
    button.addEventListener('click', function() {
        const diagnosis = this.getAttribute('data-diagnosis');

        // ✅ Check rows for diagnosis
        const rows = Array.from(document.querySelectorAll('#patientTable tr')).filter(row => {
            return row.querySelector('td:nth-child(8)')?.innerText.includes(diagnosis);
        });

        if (rows.length === 0) {
            // ✅ SweetAlert Popup
            Swal.fire({
                icon: 'info',
                title: 'No Records Found',
                text: 'No medical diagnosis record found for "' + diagnosis + '".',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        } else {
            // ✅ Submit the form with selected diagnosis
            const form = this.closest('form');
            form.querySelector('input[name="medical_diagnosis"]').value = diagnosis;
            form.submit();
        }
    });
});
</script>

<script>
    // =============================================================================
// HEALTH RECORDS MANAGEMENT SYSTEM - ORGANIZED JAVASCRIPT (FIXED)
// =============================================================================

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all components when DOM is ready
    initializeFormTracking();
    initializeChoicesJS();
    initializeEventListeners();
    initializeFilters();
    initializeValidation();
    initializeAlerts();
});

// =============================================================================
// 1. FORM TRACKING & UNSAVED CHANGES
// =============================================================================

let isAddFormDirty = false;
let isEditFormDirty = false;
let confirmCloseCallback = null;

function initializeFormTracking() {
    // Add form tracking
    const addForm = document.querySelector('#patientForm');
    if (addForm && !addForm.classList.contains('tracking-attached')) {
        addForm.querySelectorAll('input, select, textarea').forEach(input => {
            input.addEventListener('input', () => {
                isAddFormDirty = true;
                console.log("✏️ Add form changed → isAddFormDirty = true");
            });
        });
        addForm.classList.add('tracking-attached');
    }

    // Edit form tracking
    const editForm = document.querySelector('#editPatientForm');
    if (editForm && !editForm.classList.contains('tracking-attached')) {
        editForm.querySelectorAll('input, select, textarea').forEach(input => {
            input.addEventListener('input', () => {
                isEditFormDirty = true;
                console.log("✏️ Edit form changed → isEditFormDirty = true");
            });
        });
        editForm.classList.add('tracking-attached');
    }
}

function showUnsavedConfirm(callback) {
    confirmCloseCallback = callback;
    document.getElementById('unsavedChangesModal').style.display = 'flex';
}

function hideUnsavedConfirm() {
    confirmCloseCallback = null;
    document.getElementById('unsavedChangesModal').style.display = 'none';
}

// =============================================================================
// 2. CHOICES.JS INITIALIZATION
// =============================================================================

let visitPurposeChoices = null;
let diagnosisChoices = null;
let editVisitPurposeChoices = null;
let addVisitPurposeChoices;
let addMedicalDiagnosisChoices;
let editMedicalDiagnosisChoices = null;

function initializeChoicesJS() {
    // Add form - Visit Purpose
    const visitPurposeEl = document.getElementById('visit_purpose_add');
    if (visitPurposeEl && !visitPurposeChoices) {
        visitPurposeChoices = new Choices(visitPurposeEl, {
            removeItemButton: true,
            placeholder: true,
            placeholderValue: 'Select reason for visit',
            shouldSort: false,
            searchEnabled: true
        });

        // Add event listener for "Others" toggle
        visitPurposeEl.addEventListener('change', () => {
            toggleOtherField(visitPurposeChoices, 'Others', 'otherPurposeWrapperAdd');
        });
    }

    // Add form - Medical Diagnosis
    const diagnosisEl = document.getElementById('medical_diagnosis_add');
    if (diagnosisEl && !diagnosisChoices) {
        diagnosisChoices = new Choices(diagnosisEl, {
            removeItemButton: true,
            placeholder: true,
            placeholderValue: 'Select medical diagnosis',
            shouldSort: false,
            searchEnabled: true
        });

        // Add event listener for "Others" toggle
        diagnosisEl.addEventListener('change', () => {
            toggleOtherField(diagnosisChoices, 'Others', 'otherDiagnosisWrapperAdd');
        });
    }
    
    // ... rest of the edit form code stays the same
}

    // Edit form - Visit Purpose
    const editVisitPurposeEl = document.getElementById('visit_purpose_edit');
    if (editVisitPurposeEl && !editVisitPurposeChoices) {
        editVisitPurposeChoices = new Choices(editVisitPurposeEl, {
            removeItemButton: true,
            placeholder: true,
            placeholderValue: 'Select reason for visit',
            shouldSort: false,
            searchEnabled: true
        });

        // Add event listener for "Others" toggle
        editVisitPurposeEl.addEventListener('change', () => {
            toggleEditOtherField(editVisitPurposeChoices, 'Others', 'editOtherPurposeWrapper');
        });
    }

    // Edit form - Medical Diagnosis
    const editMedicalDiagnosisEl = document.getElementById('medical_diagnosis_edit');
    if (editMedicalDiagnosisEl && !editMedicalDiagnosisChoices) {
        editMedicalDiagnosisChoices = new Choices(editMedicalDiagnosisEl, {
            removeItemButton: true,
            placeholder: true,
            placeholderValue: 'Select medical diagnosis',
            shouldSort: false,
            searchEnabled: true
        });

        // Add event listener for "Others" toggle
        editMedicalDiagnosisEl.addEventListener('change', () => {
            toggleEditOtherField(editMedicalDiagnosisChoices, 'Others', 'otherDiagnosisWrapperEdit');
        });
    }


function toggleOtherField(choicesInstance, targetValue, wrapperId) {
    if (!choicesInstance) return;
    
    const selected = choicesInstance.getValue(true);
    const wrapper = document.getElementById(wrapperId);
    if (wrapper) {
        wrapper.style.display = selected.includes(targetValue) ? 'block' : 'none';
    }
}

function toggleEditOtherField(choicesInstance, targetValue, wrapperId) {
    if (!choicesInstance) return;
    
    const selected = choicesInstance.getValue(true);
    const wrapper = document.getElementById(wrapperId);
    if (wrapper) {
        wrapper.style.display = selected.includes(targetValue) ? 'block' : 'none';
    }
}

// =============================================================================
// 3. MODAL FUNCTIONS
// =============================================================================

function openModal() {
    document.getElementById('addModal').style.display = 'flex';
    initializeFormTracking();
}

function closeModal() {
    onCancelClicked();
}

function onCancelClicked() {
    console.log("onCancelClicked called, isAddFormDirty =", isAddFormDirty);
    if (isAddFormDirty) {
        showUnsavedConfirm(() => {
            actuallyCloseAddModal();
        });
    } else {
        actuallyCloseAddModal();
    }
}

function actuallyCloseAddModal() {
    isAddFormDirty = false;
    document.getElementById('addModal').style.display = 'none';
}

function closeEditModal() {
    console.log("closeEditModal called, isEditFormDirty =", isEditFormDirty);
    if (isEditFormDirty) {
        showUnsavedConfirm(() => {
            actuallyCloseEditModal();
        });
        return;
    }
    actuallyCloseEditModal();
}

function actuallyCloseEditModal() {
    isEditFormDirty = false;
    document.getElementById('editModal').style.display = 'none';
}

// =============================================================================
// 4. VIEW MODAL FUNCTIONS
// =============================================================================

function openViewModalFromData(button) {

    const record = JSON.parse(button.getAttribute('data-record'));
    const viewContent = document.querySelector('.view-content');

    console.log(record);

    // ✅ Call the backend to log the view
    fetch(`/admin/records/${record.id}/view`)
        .catch(err => console.error('Log failed', err));

    // Add loading state
    viewContent.classList.add('loading');

    // Show modal first
    document.getElementById('viewModal').style.display = 'flex';

    // Simulate loading delay for better UX
    setTimeout(() => {
        // Remove loading state
        viewContent.classList.remove('loading');
        
        // Populate personal information
        document.getElementById('viewFirstName').textContent = record.first_name || '—';
        document.getElementById('viewLastName').textContent = record.last_name || '—';
        document.getElementById('viewAge').textContent = record.age || '—';
        document.getElementById('viewGender').textContent = record.gender || '—';
        document.getElementById('viewBirthDate').textContent = record.birth_date || '—';
        document.getElementById('viewBloodType').textContent = record.blood_type || '—';

        
        // Populate physical information
        document.getElementById('viewHeight').textContent = record.height ? record.height + ' cm' : '—';
        document.getElementById('viewWeight').textContent = record.weight ? record.weight + ' kg' : '—';
        
        // Populate contact information
        document.getElementById('viewContact').textContent = record.contact_number || '—';
        document.getElementById('viewPhilHealth').textContent = record.philhealth_number || '—';
        document.getElementById('viewStreet').innerText = record.street || '—';
        document.getElementById('viewAddress').textContent = record.address || '—';
        document.getElementById('viewDateConsulted').textContent = record.date_consulted || '—';
        document.getElementById('viewHistoryBtn').setAttribute('href', `/health-records/history/${record.id}`);

        // Populate medical information
        // Visit purpose
       let visitPurpose = record.visit_purpose;
let visitPurposeText = '—';

try {
  if (typeof visitPurpose === 'string') {
    visitPurpose = JSON.parse(visitPurpose);
  }

  if (Array.isArray(visitPurpose)) {
    let othersText = '';
    const filtered = visitPurpose.filter(item => item !== 'Others');
    if (record.other_purpose?.trim()) {
      othersText = ` (${record.other_purpose.trim()})`;
    }
    visitPurposeText = filtered.join(', ') + othersText;
  }
} catch (e) {
  console.warn("⚠ Visit purpose parsing failed", e);
  visitPurposeText = record.visit_purpose ?? '—';
}
document.getElementById('viewVisitPurpose').textContent = visitPurposeText;

        // Medical Diagnosis
        let diagnosis = record.diagnoses;
let diagnosisText = '—';


let diagnosisList = record.diagnoses.map(d => d.diagnosis_name);

// Append the manually entered "Other Diagnosis" if it exists
if (record.other_diagnosis && record.other_diagnosis.trim() !== '') {
    diagnosisList.push(record.other_diagnosis.trim());
}

document.getElementById('viewDiagnosis').innerText = diagnosisList.join(', ');


       document.getElementById('viewMedicine').textContent = record.given_medicine || '—';

       let statusSpan = document.getElementById('viewStatus');

if (record.status === 'Cleared') {
    statusSpan.innerHTML = '<span class="badge bg-success">Cleared</span>';
} else if (record.status === 'Under Treatment') {
    statusSpan.innerHTML = '<span class="badge bg-warning text-dark">Under Treatment</span>';
} else {
    statusSpan.innerHTML = '<span class="badge bg-secondary">Unknown</span>';
}

        // Handle other purpose and diagnosis blocks
        const otherPurposeBlock = document.getElementById('viewOtherPurposeBlock');
        if (record.other_purpose && record.other_purpose.trim() !== '') {
            if (otherPurposeBlock) {
                document.getElementById('viewOtherPurpose').textContent = record.other_purpose;
                otherPurposeBlock.style.display = 'grid';
            }
        } else {
            if (otherPurposeBlock) otherPurposeBlock.style.display = 'none';
        }

        const otherDiagnosisBlock = document.getElementById('viewOtherDiagnosisBlock');
        if (record.other_diagnosis && record.other_diagnosis.trim() !== '') {
            if (otherDiagnosisBlock) {
                document.getElementById('viewOtherDiagnosis').textContent = record.other_diagnosis;
                otherDiagnosisBlock.style.display = 'grid';
            }
        } else {
            if (otherDiagnosisBlock) otherDiagnosisBlock.style.display = 'none';
        }
        
        // Reset scroll position to top
        viewContent.scrollTop = 0;
        viewContent.classList.remove('scrolled');
        
        // Add smooth entrance animation
        viewContent.style.opacity = '0';
        viewContent.style.transform = 'translateY(20px)';
        
        requestAnimationFrame(() => {
            viewContent.style.transition = 'all 0.3s ease';
            viewContent.style.opacity = '1';
            viewContent.style.transform = 'translateY(0)';
        });
        
    }, 50);
}

function closeViewModal() {
    const viewModal = document.getElementById('viewModal');
    const viewContent = document.querySelector('.view-content');

    // Add exit animation
    viewContent.style.transition = 'all 0.2s ease';
    viewContent.style.opacity = '0';
    viewContent.style.transform = 'translateY(-20px)';

    setTimeout(() => {
        viewModal.style.display = 'none';
        
        // Reset styles
        viewContent.style.opacity = '';
        viewContent.style.transform = '';
        viewContent.style.transition = '';
        viewContent.classList.remove('scrolled', 'loading');
        
        // Clear content to prevent flash of old content
        const recordValues = viewContent.querySelectorAll('.record-value');
        recordValues.forEach(element => {
            if (element.id) {
                element.textContent = '';
            }
        });
        
    }, 200);
}

// =============================================================================
// 5. EDIT MODAL FUNCTIONS
// =============================================================================

function initializeSearch() {
    const searchInput = document.getElementById('searchInput');
    if (!searchInput) return;

    searchInput.addEventListener('input', function () {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll('#patientTable tr');

        rows.forEach(row => {
            const id = row.cells[0].textContent.toLowerCase();
            const firstName = row.cells[2].textContent.toLowerCase();
            const lastName = row.cells[3].textContent.toLowerCase();

            if (id.includes(filter) || firstName.includes(filter) || lastName.includes(filter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
}

// ✅ run after DOM loads
document.addEventListener("DOMContentLoaded", initializeSearch);

function openEditModalFromData(button) {
    const record = JSON.parse(button.getAttribute('data-record'));

    // Reset previous values only if instances exist
    if (editVisitPurposeChoices) {
        editVisitPurposeChoices.removeActiveItems();
    }
    if (editMedicalDiagnosisChoices) {
        editMedicalDiagnosisChoices.removeActiveItems();
    }

    // Handle visit purpose array
    const visitPurposeArray = typeof record.visit_purpose === 'string'
        ? JSON.parse(record.visit_purpose)
        : record.visit_purpose || [];

    // ✅ Only define once
    const diagnosisArray = record.medical_diagnosis || [];

    // Set choices for visit purpose
    if (editVisitPurposeChoices) {
        visitPurposeArray.forEach(value => {
            editVisitPurposeChoices.setChoiceByValue(value);
        });
    }

    // Set choices for medical diagnoses
    if (editMedicalDiagnosisChoices) {
        setTimeout(() => {
            diagnosisArray.forEach(value => {
                editMedicalDiagnosisChoices.setChoiceByValue(String(value));
            });
        }, 200); // ✅ leave delay to prevent UI bugs
    }


    // Populate form fields
    document.getElementById('editRecordId').value = record.id;
    document.getElementById('editFirstName').value = record.first_name || '';
    document.getElementById('editLastName').value = record.last_name || '';
    document.getElementById('editBirthDate').value = record.birth_date || '';
    document.getElementById('blood_type_edit').value = record.blood_type || '';
    document.getElementById('editHeight').value = record.height || '';
    document.getElementById('editWeight').value = record.weight || '';
    document.getElementById('editContactNumber').value = record.contact_number || '';
    document.getElementById('philhealth_number_edit').value = record.philhealth_number ?? '';
    document.getElementById('editStreet').value = record.street || '';
    document.getElementById('editAddress').value = record.address || '';
    document.getElementById('editOtherPurpose').value = record.other_purpose || '';
    document.getElementById('editOtherDiagnosis').value = record.other_diagnosis || '';
    document.getElementById('editGivenMedicine').value = record.given_medicine || '';
    document.getElementById('editGender').value = record.gender || '';
    document.getElementById('editDateConsulted').value = record.date_consulted || '';
    const statusInput = document.getElementById('status_edit');
if (statusInput) {
    statusInput.value = record.status ?? 'Under Treatment';
}




    // Show or hide "Other" fields
    document.getElementById('editOtherPurposeWrapper').style.display =
        visitPurposeArray.includes('Others') ? 'block' : 'none';
    document.getElementById('otherDiagnosisWrapperEdit').style.display =
        diagnosisArray.includes('Others') ? 'block' : 'none';

    // Set form action
    document.getElementById('editPatientForm').action = `/health-records/${record.id}`;

    // Show modal
    document.getElementById('editModal').style.display = 'flex';
    initializeFormTracking();
}


function showUpdateConfirm() {
    document.getElementById('editConfirmModal').style.display = 'flex';
}

function closeEditConfirmModal() {
    document.getElementById('editConfirmModal').style.display = 'none';
}

function submitEditForm() {
    const form = document.getElementById('editPatientForm');

    // Get selected values
    const visitPurposeValues = editVisitPurposeChoices ? editVisitPurposeChoices.getValue(true) : [];
    const diagnosisValues = editMedicalDiagnosisChoices ? editMedicalDiagnosisChoices.getValue(true) : [];

    // Clear old hidden inputs
    const oldHiddenInputs = form.querySelectorAll('input[name="visit_purpose[]"], input[name="medical_diagnosis[]"]');
    oldHiddenInputs.forEach(input => input.remove());

    // Add hidden inputs for visit purpose
    visitPurposeValues.forEach(val => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'visit_purpose[]';
        input.value = val;
        form.appendChild(input);
    });

    // Add hidden inputs for diagnoses
    diagnosisValues.forEach(val => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'medical_diagnosis[]';
        input.value = val;
        form.appendChild(input);
    });

    closeEditConfirmModal();
    form.submit();
}


// =============================================================================
// 6. CONFIRMATION FUNCTIONS
// =============================================================================

function submitForm() {
    const form = document.getElementById('patientForm');
    if (!form) {
        console.error('❌ Form with ID "addPatientForm" not found!');
        return;
    }

    const visitPurposeValues = addVisitPurposeChoices ? addVisitPurposeChoices.getValue(true) : [];
    const diagnosisValues = addMedicalDiagnosisChoices ? addMedicalDiagnosisChoices.getValue(true) : [];

    // Clear old hidden inputs
    const oldHiddenInputs = form.querySelectorAll('input[name="visit_purpose[]"], input[name="medical_diagnosis[]"]');
    oldHiddenInputs.forEach(input => input.remove());

    // Add hidden inputs for visit purpose
    visitPurposeValues.forEach(val => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'visit_purpose[]';
        input.value = val;
        form.appendChild(input);
    });

    // // Add hidden inputs for diagnoses
    // diagnosisValues.forEach(val => {
    //     const input = document.createElement('input');
    //     input.type = 'hidden';
    //     input.name = 'medical_diagnosis[]';
    //     input.value = val;
    //     form.appendChild(input);
    // });

    form.submit();
}



function closeConfirmModal() {
    document.getElementById('confirmModal').style.display = 'none';
}

// =============================================================================
// 7. ARCHIVE FUNCTIONS
// =============================================================================

function openArchivePatientModal(id, firstName, lastName) {
    const modal = document.getElementById("archivePatientModal");
    const form = document.getElementById("archivePatientForm");
    const message = document.getElementById("archivePatientMessage");

    if (!modal || !form || !message) {
        console.error("Archive modal elements not found.");
        return;
    }

    form.action = `/health-records/${id}/archive`;
    message.innerHTML = `Are you sure you want to archive the record for <strong>${firstName} ${lastName}</strong>?`;

    modal.style.display = "flex";
}

function closeArchivePatientModal() {
    const modal = document.getElementById("archivePatientModal");
    if (modal) modal.style.display = "none";
}

// =============================================================================
// 8. SEARCH FUNCTIONALITY
// =============================================================================
let searchTimeout;

document.getElementById('searchInput').addEventListener('input', function () {
    clearTimeout(searchTimeout);

    searchTimeout = setTimeout(() => {
        this.form.submit();
    }, 500); // wait 0.5s after typing stops
});


// =============================================================================
// 9. FILTER FUNCTIONS
// =============================================================================

function toggleGenderFilter() {
    const dropdown = document.getElementById("genderFilterDropdown");
    const btn = document.getElementById("genderFilterBtn");

    closeAllDropdowns();

    if (dropdown.style.display === "block") {
        dropdown.style.display = "none";
        btn.classList.remove('active');
    } else {
        dropdown.style.display = "block";
        btn.classList.add('active');
    }
}

function toggleDropdown(type) {
    const dropdownId = type === 'purpose' ? 'visitPurposeDropdown' : 'medicalDiagnosisDropdown';
    const btnId = type === 'purpose' ? 'purposeFilterBtn' : 'diagnosisFilterBtn';
    const dropdown = document.getElementById(dropdownId);
    const btn = document.getElementById(btnId);

    closeAllDropdowns();

    if (dropdown.style.display === "block") {
        dropdown.style.display = "none";
        btn.classList.remove('active');
    } else {
        dropdown.style.display = "block";
        btn.classList.add('active');
        
        if (dropdown.children.length <= 1) {
            populateDropdown(type);
        }
    }
}

function closeAllDropdowns() {
    document.querySelectorAll('.filter-dropdown').forEach(dropdown => {
        dropdown.style.display = 'none';
    });
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('active');
    });
}

function filterByGender(selectedGender) {
    const rows = document.querySelectorAll("#patientTable tr");
    let visibleCount = 0;

    rows.forEach(row => {
        const genderCell = row.cells[5];
        if (!genderCell) return;
        
        const text = genderCell.textContent.trim();
        const shouldShow = selectedGender === '' || text === selectedGender;
        
        row.style.display = shouldShow ? '' : 'none';
        if (shouldShow) visibleCount++;
    });

    updateFilterBadge('gender', selectedGender, visibleCount);
    closeAllDropdowns();
}

function filterByPurpose(selectedPurpose) {
    filterByColumnValue(selectedPurpose, 6);
}

function filterByDiagnosis(selectedDiagnosis) {
    filterByColumnValue(selectedDiagnosis, 7);
}

function filterByColumnValue(value, columnIndex) {
    const rows = document.querySelectorAll('#patientTable tr');

    rows.forEach(row => {
        const cell = row.cells[columnIndex];
        if (!cell) return;
        
        const text = cell.textContent;
        const shouldShow = value === '' || text.includes(value);
        
        row.style.display = shouldShow ? '' : 'none';
    });
}

function updateFilterBadge(type, value, count = null) {
    const btnId = type === 'purpose' ? 'purposeFilterBtn' : 
                 type === 'diagnosis' ? 'diagnosisFilterBtn' : 'genderFilterBtn';
    const btn = document.getElementById(btnId);

    if (value && value !== '') {
        btn.classList.add('has-filter');
        
        let badge = btn.querySelector('.filter-badge');
        if (!badge) {
            badge = document.createElement('span');
            badge.className = 'filter-badge';
            btn.appendChild(badge);
        }
        badge.textContent = count !== null ? count : '✓';
    } else {
        clearFilterBadge(type);
    }
}

function clearFilterBadge(type) {
    const btnId = type === 'purpose' ? 'purposeFilterBtn' : 
                 type === 'diagnosis' ? 'diagnosisFilterBtn' : 'genderFilterBtn';
    const btn = document.getElementById(btnId);

    btn.classList.remove('has-filter');
    const badge = btn.querySelector('.filter-badge');
    if (badge) badge.remove();
}

// =============================================================================
// 10. FORM VALIDATION
// =============================================================================

function validateForm(formId) {
    const form = document.getElementById(formId);
    const requiredFields = form.querySelectorAll('[required]');
    let isValid = true;
    let firstInvalidField = null;

    requiredFields.forEach(field => {
        const formGroup = field.closest('.form-group');
        
        if (!field.value.trim()) {
            field.style.borderColor = 'var(--danger-color)';
            field.style.boxShadow = '0 0 0 4px rgba(239, 68, 68, 0.1)';
            formGroup.classList.add('error');
            
            if (!formGroup.querySelector('.error-message')) {
                const errorMsg = document.createElement('div');
                errorMsg.className = 'error-message';
                errorMsg.textContent = 'This field is required';
                formGroup.appendChild(errorMsg);
            }
            
            isValid = false;
            
            if (!firstInvalidField) {
                firstInvalidField = field;
            }
        } else {
            field.style.borderColor = 'var(--success-color)';
            field.style.boxShadow = '0 0 0 4px rgba(16, 185, 129, 0.1)';
            formGroup.classList.remove('error');
            formGroup.classList.add('success');
            
            const errorMsg = formGroup.querySelector('.error-message');
            if (errorMsg) {
                errorMsg.remove();
            }
        }
    });

    if (!isValid && firstInvalidField) {
        firstInvalidField.focus();
        firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
        showMessage('error', 'Validation Error', 'Please fill in all required fields marked with *');
    }

    return isValid;
}

// =============================================================================
// 11. MESSAGE SYSTEM
// =============================================================================

function showMessage(type, title, message, callback = null) {
    const overlay = document.createElement('div');
    overlay.className = 'message-overlay';

    const iconClass = type === 'success' ? 'fas fa-check' : 
                     type === 'error' ? 'fas fa-times' : 
                     type === 'warning' ? 'fas fa-exclamation-triangle' : 'fas fa-info';

    overlay.innerHTML = `
        <div class="message-box">
            <div class="message-icon ${type}">
                <i class="${iconClass}"></i>
            </div>
            <div class="message-title">${title}</div>
            <div class="message-text">${message}</div>
            <button class="message-button" onclick="closeMessage(this)">OK</button>
        </div>
    `;

    document.body.appendChild(overlay);

    if (callback) {
        overlay.dataset.callback = callback.toString();
    }
}

function closeMessage(button) {
    const overlay = button.closest('.message-overlay');
    const callback = overlay.dataset.callback;

    overlay.remove();

    if (callback) {
        try {
            eval(callback)();
        } catch (e) {
            console.log('Callback execution completed');
        }
    }
}

// =============================================================================
// 12. EVENT LISTENERS AND INITIALIZATION
// =============================================================================

function initializeEventListeners() {
    // Initialize search functionality
    initializeSearch();

    // Initialize form submission handlers
    const addForm = document.getElementById('patientForm');
    if (addForm) {
        addForm.addEventListener('submit', function(e) {
            e.preventDefault();
            if (validateForm('patientForm')) {
                document.getElementById('confirmModal').style.display = 'flex';
            }
        });
    }

    // Initialize unsaved changes confirmation
    const confirmCloseBtn = document.getElementById('confirmCloseBtn');
    if (confirmCloseBtn) {
        confirmCloseBtn.addEventListener('click', () => {
            if (confirmCloseCallback) confirmCloseCallback();
            hideUnsavedConfirm();
        });
    }

    // Initialize view content scroll detection
    const viewContent = document.querySelector('.view-content');
    if (viewContent) {
        viewContent.addEventListener('scroll', function() {
            if (this.scrollTop > 10) {
                this.classList.add('scrolled');
            } else {
                this.classList.remove('scrolled');
            }
        });
    }

    // Initialize real-time validation
    const inputs = document.querySelectorAll('input[required], textarea[required], select[required]');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            const formGroup = this.closest('.form-group');
            
            if (this.value.trim()) {
                this.style.borderColor = 'var(--success-color)';
                this.style.boxShadow = '0 0 0 4px rgba(16, 185, 129, 0.1)';
                formGroup.classList.remove('error');
                formGroup.classList.add('success');
                
                const errorMsg = formGroup.querySelector('.error-message');
                if (errorMsg) {
                    errorMsg.remove();
                }
            }
        });
    });
}

function initializeFilters() {
    // Initialize dropdowns
    setTimeout(() => {
        populateDropdown('purpose');
        populateDropdown('diagnosis');
    }, 100);

    // Add data attributes to sections for navigation
    const sections = document.querySelectorAll('.record-section');
    const sectionNames = ['personal', 'physical', 'contact', 'medical'];

    sections.forEach((section, index) => {
        if (sectionNames[index]) {
            section.setAttribute('data-section', sectionNames[index]);
            section.id = `section-${sectionNames[index]}`;
        }
    });
}

function initializeValidation() {
    // Form validation is handled in initializeEventListeners
}

function initializeAlerts() {
    // Auto-hide alerts
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
}

// =============================================================================
// 13. GLOBAL EVENT LISTENERS
// =============================================================================

// Close modals when clicking outside
window.onclick = function (event) {
    const addModal = document.getElementById("addModal");
    const viewModal = document.getElementById("viewModal");
    const editModal = document.getElementById("editModal");
    const confirmModal = document.getElementById("confirmModal");
    const editConfirmModal = document.getElementById("editConfirmModal");
    const archiveModal = document.getElementById("archivePatientModal");
    const unsavedModal = document.getElementById("unsavedChangesModal");

    if (event.target === addModal) closeModal();
    if (event.target === viewModal) closeViewModal();
    if (event.target === editModal) closeEditModal();
    if (event.target === confirmModal) closeConfirmModal();
    if (event.target === editConfirmModal) closeEditConfirmModal();
    if (event.target === archiveModal) closeArchivePatientModal();
    if (event.target === unsavedModal) hideUnsavedConfirm();
};

// Handle edit modal outside clicks
window.addEventListener('click', function(event) {
    const modal = document.getElementById('editModal');
    if (event.target === modal) {
        closeEditModal();
    }
});

// Handle add modal outside clicks
window.addEventListener('click', function (event) {
    const modal = document.getElementById('addModal');
    if (event.target === modal) {
        onCancelClicked();
    }
});

// Close dropdowns when clicking outside
document.addEventListener('click', function (e) {
    if (!e.target.closest('.filter-dropdown-container')) {
        closeAllDropdowns();
    }
});

// Keyboard shortcuts
document.addEventListener('keydown', function(e) {
    // Escape key to close modals
    if (e.key === 'Escape') {
        const modals = document.querySelectorAll('.modal[style*="flex"], .modal-delete[style*="flex"]');
        modals.forEach(modal => {
            if (modal.style.display === 'flex') {
                modal.style.display = 'none';
            }
        });
        closeAllDropdowns();
    }

    // Ctrl+N to add new patient
    if (e.ctrlKey && e.key === 'n') {
        e.preventDefault();
        openModal();
    }
});

// View modal keyboard navigation
document.addEventListener('keydown', function(e) {
    const viewModal = document.getElementById('viewModal');

    if (viewModal && viewModal.style.display === 'flex') {
        const viewContent = document.querySelector('.view-content');
        
        switch(e.key) {
            case 'Escape':
                closeViewModal();
                break;
            case 'ArrowDown':
                e.preventDefault();
                viewContent.scrollBy(0, 50);
                break;
            case 'ArrowUp':
                e.preventDefault();
                viewContent.scrollBy(0, -50);
                break;
            case 'PageDown':
                e.preventDefault();
                viewContent.scrollBy(0, viewContent.clientHeight * 0.8);
                break;
            case 'PageUp':
                e.preventDefault();
                viewContent.scrollBy(0, -viewContent.clientHeight * 0.8);
                break;
            case 'Home':
                e.preventDefault();
                viewContent.scrollTo(0, 0);
                break;
            case 'End':
                e.preventDefault();
                viewContent.scrollTo(0, viewContent.scrollHeight);
                break;
        }
    }
});


// =============================================================================
// 14. MAKE FUNCTIONS GLOBALLY AVAILABLE
// =============================================================================

window.openModal = openModal;
window.closeModal = closeModal;
window.onCancelClicked = onCancelClicked;
window.openViewModalFromData = openViewModalFromData;
window.closeViewModal = closeViewModal;
window.openEditModalFromData = openEditModalFromData;
window.closeEditModal = closeEditModal;
window.showUpdateConfirm = showUpdateConfirm;
window.closeEditConfirmModal = closeEditConfirmModal;
window.submitEditForm = submitEditForm;
window.submitForm = submitForm;
window.closeConfirmModal = closeConfirmModal;
window.openArchivePatientModal = openArchivePatientModal;
window.closeArchivePatientModal = closeArchivePatientModal;
window.toggleGenderFilter = toggleGenderFilter;
window.toggleDropdown = toggleDropdown;
window.filterByGender = filterByGender;
window.filterByPurpose = filterByPurpose;
window.filterByDiagnosis = filterByDiagnosis;
window.showMessage = showMessage;
window.closeMessage = closeMessage;
window.hideUnsavedConfirm = hideUnsavedConfirm;
</script>

<!-- Load Flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- Initialize Flatpickr -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    console.log("📅 Initializing Date Pickers...");

    // Check if flatpickr is available
    if (typeof flatpickr !== 'function') {
        console.warn("⚠️ Flatpickr not loaded. Retrying...");
        setTimeout(initializeDatePickers, 300);
        return;
    }

    // Apply to all fields with .datepicker
    flatpickr('.datepicker', {
        dateFormat: 'Y-m-d',
        maxDate: 'today',
        defaultDate: null,
        allowInput: true
    });

    // Set date values if record exists
    try {

        if (record) {
            if (record.date_consulted) {
                const dateConsultedEl = document.getElementById('editDateConsulted');
                if (dateConsultedEl) dateConsultedEl._flatpickr.setDate(record.date_consulted);
            }

            if (record.birth_date) {
                const birthDateEl = document.getElementById('birth_date');
                if (birthDateEl) birthDateEl._flatpickr.setDate(record.birth_date);
            }
        }
    } catch (e) {
        console.warn("Could not load record data", e);
    }
});
</script>
<script>
    function viewPatient(id) {
        fetch(`/admin/records/${id}/view`)
            .then(res => res.json())
            .then(data => {
                // Example: Populate modal with fetched data
                document.getElementById('viewName').innerText = data.first_name + ' ' + data.last_name;
                document.getElementById('viewBirthdate').innerText = data.birth_date;
                // Show the modal
                const modal = new bootstrap.Modal(document.getElementById('viewModal'));
                modal.show();
            })
            .catch(err => {
                console.error('Error fetching patient record:', err);
            });
    }
</script>
<script>
function filterDropdown(input, dropdownId) {
    const filter = input.value.toLowerCase();
    const dropdown = document.getElementById(dropdownId);
    const items = dropdown.querySelectorAll('.dropdown-item:not(.reset)');

    items.forEach(item => {
        const text = item.textContent || item.innerText;
        item.style.display = text.toLowerCase().includes(filter) ? '' : 'none';
    });
}
</script>
<script>
let lastNameSortAsc = true;

function sortByLastName() {
    const table = document.getElementById("patientTable");
    const rows = Array.from(table.querySelectorAll("tr"));

    rows.sort((a, b) => {
        const aText = (a.cells[3]?.textContent || '').trim().toLowerCase(); // 3 = Last Name column
        const bText = (b.cells[3]?.textContent || '').trim().toLowerCase();

        if (aText < bText) return lastNameSortAsc ? -1 : 1;
        if (aText > bText) return lastNameSortAsc ? 1 : -1;
        return 0;
    });

    const tbody = table.closest("table").querySelector("tbody"); // get actual tbody parent

    rows.forEach(row => {
        if (tbody && row.nodeType === 1) tbody.appendChild(row);
    });

    // Toggle sort direction
    lastNameSortAsc = !lastNameSortAsc;

    // Optionally toggle the icon
    const icon = document.getElementById("lastnameSortBtn").querySelector("i");
    icon.className = lastNameSortAsc ? "fas fa-sort-alpha-down" : "fas fa-sort-alpha-up";
}
</script>

</body>
</html>