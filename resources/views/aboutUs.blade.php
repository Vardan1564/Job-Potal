<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>About Us | CareerLink</title>
    <link rel="stylesheet" href="../aboutUs.css" />
    <link rel="stylesheet" href="../style/landing-common.css">
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
    <main>
        <section class="hero-about">
            <div class="container">
                <h1>About Our Project Team</h1>
                <p>A collaborative college project by three dedicated students.</p>
            </div>
        </section>

        <section class="project-overview">
            <div class="container">
                <h2>Project Overview</h2>
                <p>This project is a comprehensive job portal website developed as part of our college curriculum. It aims to provide a seamless platform for job seekers and employers to connect efficiently.</p>
            </div>
        </section>

        <section class="team">
            <div class="container">
                <h2>Meet the Team</h2>
                <div class="team-members">
                    <div class="member">
                        <img src="../Images/Img/iron_man.png" alt="Student 1" />
                        <h4>Brijesh</h4>
                        <p>Frontend Developer & UI Designer</p>
                    </div>
                    <div class="member">
                        <img src="../Images/team/profile_photo.jpg" alt="Student 2" />
                        <h4>Vardan</h4>
                        <p>Backend Developer & Database Manager</p>
                    </div>
                    <div class="member">
                        <img src="../Images/Img/iron_man.png" alt="Student 3" />
                        <h4>Jaxit</h4>
                        <p>Project Manager & QA Tester</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="project-goals">
            <div class="container">
                <h2>Project Goals</h2>
                <ul>
                    <li>Develop a user-friendly job portal with modern UI/UX.</li>
                    <li>Implement efficient job search and application features.</li>
                    <li>Ensure responsive design for all devices.</li>
                    <li>Collaborate effectively as a team to deliver a quality project.</li>
                </ul>
            </div>
        </section>

        <section class="call-to-action">
            <div class="container text-center">
                <h2>Get In Touch</h2>
                <p>Feel free to contact us for any queries or feedback regarding the project.</p>
                <a href="{{ route('contactUs') }}" class="btn btn-primary">Contact Us</a>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2023 CareerLink College Project. All rights reserved.</p>
        </div>
    </footer>
    <script src="../script/menu.js"></script>
     <script src="../landing-common.js"></script>
    <!-- Note: Script is standalone and mirrors project interactions (menu toggle, form). -->
</body>
</html>
