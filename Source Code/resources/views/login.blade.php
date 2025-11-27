<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barangay Daang Bakal Health Center</title>
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

        /* Dark overlay for better text readability */
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

        .login-container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 650px; /* Increased size */
            padding: 20px;
        }

        .login-card {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 40px 70px; /* Adjusted padding for new dimensions */
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            min-height: 425px; /* Adjusted for 4:3 approximation (700 * 3/4) */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .logo {
            width: 140px; /* Increased logo size */
            height: 140px; /* Increased logo size */
            margin-bottom: 30px; /* Adjusted margin */
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #0a2d5e;
        }

        h2 {
            font-size: 36px; /* Increased font size of Welcome Brgy Daang Bakal*/
            margin-bottom: 60px; /* Adjusted margin */
            color: #0a2d5e;
            font-weight: 750; /* Changed from 600 to 700 for bolder text */
            line-height: 1.3; /* Adjusted line height for better fit */
        }

        .google-login {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            border: 2px solid #e0e0e0;
            padding: 20px 30px; /* Increased padding */
            border-radius: 12px;
            cursor: pointer;
            text-decoration: none;
            color: #444;
            font-weight: 600;
            font-size: 20px; /* Increased font size */
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .google-login:hover {
            background-color: #f8f9fa;
            border-color: #0a2d5e;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .google-login img {
            width: 32px; /* Increased icon size */
            height: 32px; /* Increased icon size */
            margin-right: 18px; /* Adjusted margin */
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .login-container {
                padding: 15px;
                max-width: 90%;
            }
            
            .login-card {
                padding: 40px 30px;
                min-height: auto;
            }
            
            h2 {
                font-size: 28px; /* Adjusted for smaller screens */
                margin-bottom: 45px;
            }
            
            .logo {
                width: 100px;
                height: 100px;
                margin-bottom: 25px;
            }
            .google-login {
                padding: 16px 22px;
                font-size: 18px;
            }
            .google-login img {
                width: 28px;
                height: 28px;
                margin-right: 15px;
            }
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 30px 20px;
            }
            
            h2 {
                font-size: 22px;
                margin-bottom: 35px;
            }
            
            .google-login {
                padding: 14px 18px;
                font-size: 16px;
            }
            .google-login img {
                width: 24px;
                height: 24px;
                margin-right: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <img src="{{ asset('images/logo2.png') }}" alt="Barangay Logo" class="logo">
            <h2>Welcome to Barangay Daang Bakal Health Center</h2>

            <!-- wag nyo na to galawin hehe -->
            <a href="{{ route('auth.google.redirect') }}" class="google-login">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" alt="Google Logo">
                Sign in with Google
            </a>
        </div>
    </div>
</body>
</html>
