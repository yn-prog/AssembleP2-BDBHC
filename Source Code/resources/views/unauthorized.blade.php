<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Access Denied - Barangay Daang Bakal Health Center</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            height: 100vh;
            background: url('images/daangbakal.jpg') no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* Dark overlay matching login page design */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(10, 45, 94, 0.3);
            z-index: 1;
        }

        .unauthorized-container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 650px;
            padding: 20px;
        }

        .unauthorized-card {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 50px 70px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            min-height: 350px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        /* Removed logo styles and improved error icon centering */
        .error-icon {
            width: 100px;
            height: 100px;
            margin: 0 auto 30px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(220, 53, 69, 0.1);
            border-radius: 50%;
            font-size: 50px;
            color: #dc3545;
        }

        h1 {
            font-size: 32px;
            margin-bottom: 20px;
            color: #dc3545;
            font-weight: 700;
        }

        .error-message {
            font-size: 18px;
            margin-bottom: 30px;
            color: #6c757d;
            line-height: 1.6;
            max-width: 400px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #0a2d5e;
            color: white;
            padding: 15px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: #083a73;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(10, 45, 94, 0.3);
            color: white;
            text-decoration: none;
        }

        /* Responsive design matching login page */
        @media (max-width: 768px) {
            .unauthorized-container {
                padding: 15px;
                max-width: 90%;
            }
            
            .unauthorized-card {
                padding: 40px 30px;
                min-height: auto;
            }
            
            .error-icon {
                width: 80px;
                height: 80px;
                font-size: 40px;
                margin-bottom: 25px;
            }
            
            h1 {
                font-size: 28px;
                margin-bottom: 15px;
            }
            
            .error-message {
                font-size: 16px;
                margin-bottom: 25px;
            }
            
            .back-button {
                padding: 12px 24px;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .unauthorized-card {
                padding: 30px 20px;
            }
            
            .error-icon {
                width: 70px;
                height: 70px;
                font-size: 35px;
            }
            
            h1 {
                font-size: 24px;
            }
            
            .error-message {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="unauthorized-container">
        <div class="unauthorized-card">
            <div class="error-icon">🚫</div>
            
            <h1>Access Denied</h1>
            
            <p class="error-message">
                @if(session('error'))
                    {{ session('error') }}
                @else
                    Your email address is not registered in the system or you don't have the required permissions to access this area. Please contact the administrator for assistance.
                @endif
            </p>
            
            <a href="{{ route('login') }}" class="back-button">
                ← Back to Login
            </a>
        </div>
    </div>
</body>
</html>
