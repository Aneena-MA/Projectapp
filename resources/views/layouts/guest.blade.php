<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
            }
            
            .login-container {
                min-height: 100vh;
                display: grid;
                grid-template-columns: 1fr 1fr;
                background: linear-gradient(135deg, rgba(102, 126, 234, 0.95) 0%, rgba(118, 75, 162, 0.95) 100%),
                            url('https://images.unsplash.com/photo-1601598851547-4302969d0614?w=1200&h=1200&fit=crop');
                background-size: cover;
                background-position: center;
            }
            
            .image-section {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 40px;
            }
            
            .image-content {
                text-align: center;
                color: white;
            }
            
            .image-content h1 {
                font-size: 48px;
                font-weight: bold;
                margin-bottom: 20px;
                text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            }
            
            .image-content p {
                font-size: 20px;
                margin-bottom: 30px;
                text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
            }
            
            .product-features {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
                margin-top: 40px;
            }
            
            .feature-box {
                background: rgba(255, 255, 255, 0.2);
                padding: 20px;
                border-radius: 10px;
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.3);
            }
            
            .feature-box h3 {
                font-size: 18px;
                font-weight: 600;
                margin-bottom: 10px;
            }
            
            .feature-box p {
                font-size: 14px;
                margin: 0;
            }
            
            .form-section {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 40px;
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
            }
            
            .form-wrapper {
                width: 100%;
                max-width: 450px;
            }
            
            .logo-wrapper {
                text-align: center;
                margin-bottom: 30px;
            }
            
            .logo-wrapper svg {
                filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));
            }
            
            .form-header {
                text-align: center;
                margin-bottom: 30px;
                color: white;
            }
            
            .form-header h2 {
                font-size: 28px;
                font-weight: bold;
                margin-bottom: 10px;
                text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
            }
            
            .form-header p {
                font-size: 14px;
                opacity: 0.9;
            }
            
            .form-card {
                background: white;
                border-radius: 12px;
                padding: 32px;
                box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            }
            
            @media (max-width: 768px) {
                .login-container {
                    grid-template-columns: 1fr;
                }
                
                .image-section {
                    min-height: 300px;
                }
                
                .image-content h1 {
                    font-size: 32px;
                }
                
                .product-features {
                    grid-template-columns: 1fr;
                }
                
                .form-section {
                    background: rgba(255, 255, 255, 0.15);
                }
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="login-container">
            <!-- Image Section -->
            <div class="image-section">
                <div class="image-content">
                    <h1>🛒 Welcome Back!</h1>
                    <p>Your one-stop shop for all your needs</p>
                    
                  
                </div>
            </div>
            
            <!-- Form Section -->
            <div class="form-section">
                <div class="form-wrapper">
                    <div class="logo-wrapper">
                        <a href="/">
                            <x-application-logo class="w-20 h-20 fill-current text-white mx-auto" />
                        </a>
                    </div>
                    
                    <div class="form-header">
                        <h2>Sign in to your account</h2>
                        <p>Manage your products and orders</p>
                    </div>

                    <div class="form-card">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>