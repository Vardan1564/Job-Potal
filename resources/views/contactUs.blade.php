<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Job Portal | Contact Us | CareerLink</title>
  <link rel="stylesheet" href="../style/landing-common.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />

    <style>
        textarea {
            font-size: 0.95rem;
            font-family: "Poppins", sans-serif;
            padding: 10px 14px;
            border: 2px solid #e1e8ed;
            border-radius: 6px;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            transition: all 0.3s ease;
            resize: vertical;
            min-height: 80px;
        }

        textarea:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 4px rgba(52, 152, 219, 0.1);
            transform: translateY(-1px);
        }

        .nav-link a {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            color: #333;
            padding: 8px 16px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .nav-link a:hover {
            background-color: #f8f9fa;
            color: #007bff;
        }

        .header-main {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .logo-small img {
            height: 40px;
            width: auto;
        }

        .form-container {
            max-width: 500px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .form-wrapper {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .form-title {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 1.75rem;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }

        .required {
            color: #e74c3c;
        }

        .form-group input {
            width: 100%;
            padding: 10px 14px;
            border: 2px solid #e1e8ed;
            border-radius: 6px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            width: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        }

        @media (max-width: 768px) {
            .header-main {
                padding: 15px 20px;
            }

            .form-wrapper {
                padding: 24px;
            }

            .form-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <header class="header-main">
        <div class="logo">
            <img src="../Images/Logo/logo_2.png" alt="CareerLink Logo">
        </div>
        <button id="menu-toggle" class="menu-toggle" aria-label="Toggle menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
        <nav class="nav" id="primary-nav">
            <a href="{{ route('index') }}" class="nav-link">Home</a>
            <a href="{{ route('aboutUs') }}" class="nav-link">About Us</a>
            <a href="{{ route('contactUs') }}" class="nav-link">Contact Us</a>
            <a href="{{ route('signUp') }}" class="nav-link">Create Account</a>
            <a href="{{ route('signin') }}" class="nav-link">Login</a>
           
            </div>
        </nav>
    </header>

    <main class="container">
        <div class="form-container">
            <section class="form-wrapper">
                <div class="form-section">
                    <h2 class="form-title">Message Us</h2>
                    <form class="form" action="{{ route('contactUs.store') }}" method="post">
                        @csrf
                        
                        @if(session('success'))
                            <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 12px; border-radius: 6px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger" style="background: #f8d7da; color: #721c24; padding: 12px; border-radius: 6px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                                <ul style="margin: 0; padding-left: 20px;">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="userName">Name<span class="required">*</span></label>
                            <input type="text" id="userName" name="userName" placeholder="Enter Name" required />
                        </div>

                        <div class="form-group">
                            <label for="loginEmail">Email<span class="required">*</span></label>
                            <input type="email" id="loginEmail" name="email" placeholder="Enter Email" required />
                        </div>

            

                        <div class="form-group">
                            <label for="userMessage">Message<span class="required">*</span></label>
                            <textarea name="userMessage" id="userMessage" placeholder="Enter Message Here"
                                required></textarea>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </main>

     <script src="../landing-common.js"></script>
    <!-- Note: Script is standalone and mirrors project interactions (menu toggle, form). -->
</body>

</html>