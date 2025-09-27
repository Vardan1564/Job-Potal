<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Job Portal | Sign In</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="../style/style.css" />

    <!-- Local CSS Start -->
    <style>
        .formWrapper {
            border: 1px solid #e1e8ed;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .chkboxGroup {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            margin: 3px 0;
        }
    </style>
    <!-- Local CSS End -->
</head>

<body class="LoginBody">

         

    <!-- Header Start -->
    <header class="loginHeader">
        <!-- Logo Section Start -->
        <a href="{{route('index')}}">
            <img class="logo" src="../Images/Logo/logo_2.png" alt="CareerLink Logo" />
        </a>
        <!-- Logo Section End -->
    </header>
    <!-- Header End -->

    <!-- main Start -->
    <main class="loginMain">
        <!-- Sign In Section Start -->
        <section class="formWrapper">
            <div class="formSection">
                <h2 class="h2Title">Welcome</h2>
                <form class="LoginForm" action="{{route('login')}}" method="post">
                   
                @csrf

                    <div class="formGroup">
                        <label for="loginEmail">Email<span class="forRequired">*</span></label>
                        
                        <input type="email" id="loginEmail" name="email" placeholder="Enter Email" required />
                    </div>

                    <div class="formGroup">
                        <label for="loginPassword">Password<span class="forRequired">*</span></label>
                        
                        <input type="password" id="loginPassword" name="password" placeholder="Enter Password" required />
                    </div>


                    <div class="btnWrapper">
                        <button type="submit" class="btnSubmit">
                            Sign In
                        </button>
                    </div>
                </form>
                     @if(session('error'))
                        <div style="color: red; margin-bottom: 10px;">
                            {{ session('error') }}
                        </div>
                    @endif
            </div>

            <div class="linkPrompt">
                <p>Don't have an account? <a href="{{route('signUp')}}">Sign Up</a></p>
            </div>
        </section>
        <!-- Sign In Section End -->
    </main>
    <!-- main End -->
</body>

</html>