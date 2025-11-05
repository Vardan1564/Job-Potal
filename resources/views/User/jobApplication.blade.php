<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Applications - CareerLink</title>
    <link rel="stylesheet" href="../style/landing-common.css">
    <link rel="stylesheet" href="../style/page-common.css">
    <!-- Applications tracking page - follows existing project structure and design patterns -->
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
            <a href="{{ route('user') }}" class="nav-link">Home</a>
            <a href="{{ route('jobListings') }}" class="nav-link">View Jobs</a>
            <a href="{{ route('userApplicationsList') }}" class="nav-link">Job Application</a>
            <a href="{{ route('internships') }}" class="nav-link">Internships</a>
            <a href="{{ route('aboutUs') }}" class="nav-link">About Us</a>
            <a href="{{ route('contactUs') }}" class="nav-link">Contact Us</a>
            <div class="account" id="account">
                <button class="account-toggle" id="accountToggle" aria-haspopup="true" aria-expanded="false">Account
                    ▾</button>
                <div class="account-menu" id="accountMenu" role="menu">
                    <a href="{{ route('profile') }}" class="dropdown-link" role="menuitem">Profile View</a>
                    <a href="{{ route('signin') }}" class="dropdown-link" role="menuitem">Sign Out</a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <!-- Page Header -->
        <section class="page-header">
            <div class="container">
                <h1>My Applications</h1>
                <p>Track the status of your job applications</p>
            </div>
        </section>

       
        <!-- Applications List -->
        <section class="applications-section">
            <div class="container">
                <h2>Application History</h2>
                <div class="applications-list">

                @foreach ($applications as $app)
                
                
                    <article class="application-item">
                        <div class="application-header">
                            <h3>{{ $app->job_title }} </h3>
                            <span class="status status-review">{{ $app->status }}</span>
                        </div>
                        <p class="company">Company : {{ $app->company_name }}</p>
                        <p class="company">Location: {{ $app->city }},{{ $app->state }}</p>

                        <div class="application-actions">
                            <a href="{{ route('jobDetail',$app->J_ID) }}" class="btn btn-outline">View Details</a>
                        </div>
                    </article>

                    @endforeach

                    <!--  -->
                </div>
            </div>
        </section>

        <!-- Application Tips -->
        <section class="tips-section">
            <div class="container">
                <h2>Improve Your Applications</h2>
                <div class="tips-grid">
                    <div class="tip-card">
                        <h3>📈 Follow Up</h3>
                        <p>Send a polite follow-up email after 1-2 weeks if you haven't heard back.</p>
                    </div>
                    <div class="tip-card">
                        <h3>📚 Keep Learning</h3>
                        <p>Use waiting time to improve your skills and add new certifications.</p>
                    </div>
                    <div class="tip-card">
                        <h3>🔄 Apply More</h3>
                        <p>Don't put all your eggs in one basket - apply to multiple relevant positions.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 CareerLink. All rights reserved.</p>
        </div>
    </footer>

    <script src="../script/landing-common.js"></script>
    <script src="../script/page-common.js"></script>
</body>
</html>

