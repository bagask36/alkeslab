<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Login - PT. Alkeslab Primatama" />
    <title>Login - PT. ALKESLAB PRIMATAMA</title>
    
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('app/assets/logo.png') }}" />
    
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    
    <!-- Google fonts - Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    @livewireStyles
    
    <style>
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .login-card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 450px;
            width: 100%;
        }
        
        .login-header {
            background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
            padding: 2rem;
            text-align: center;
            color: white;
        }
        
        .login-header img {
            width: 80px;
            height: auto;
            margin-bottom: 1rem;
            background: white;
            padding: 10px;
            border-radius: 10px;
        }
        
        .login-header h1 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
            color: white;
        }
        
        .login-body {
            padding: 2rem;
        }
        
        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
        
        .form-control {
            border: 2px solid #e5e7eb;
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #1e30f3;
            box-shadow: 0 0 0 3px rgba(30, 48, 243, 0.1);
        }
        
        .form-check-input {
            width: 1.25rem;
            height: 1.25rem;
            border: 2px solid #e5e7eb;
            border-radius: 0.25rem;
            cursor: pointer;
        }
        
        .form-check-input:checked {
            background-color: #1e30f3;
            border-color: #1e30f3;
        }
        
        .form-check-label {
            font-size: 0.9rem;
            color: #6b7280;
            cursor: pointer;
        }
        
        .btn-login {
            width: 100%;
            padding: 0.875rem;
            background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 100%);
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(30, 48, 243, 0.3);
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(30, 48, 243, 0.4);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .alert-danger {
            background-color: #fee2e2;
            border: 1px solid #fecaca;
            color: #991b1b;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .alert-danger ul {
            margin: 0;
            padding-left: 1.25rem;
        }
        
        .alert-danger li {
            margin-bottom: 0.25rem;
        }
        
        .text-danger {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        
        @media (max-width: 576px) {
            .login-container {
                padding: 1rem;
            }
            
            .login-header {
                padding: 1.5rem;
            }
            
            .login-header h1 {
                font-size: 1.25rem;
            }
            
            .login-body {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <img src="{{ asset('app/assets/logo.png') }}" alt="Logo">
                <h1>PT. ALKESLAB PRIMATAMA</h1>
            </div>
            
            <div class="login-body">
                <livewire:login />
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    @livewireScripts
</body>
</html>
