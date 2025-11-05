<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Analytics Dashboard - CareerLink</title>
    <meta name="description"
        content="Access comprehensive job market analytics, salary insights, and career trends on CareerLink.">
    <link rel="stylesheet" href="../style/landing-common.css">
    <link rel="stylesheet" href="../style/page-common.css">
    <link rel="stylesheet" href="../style/job-analytics.css">
    <!-- Job Analytics Dashboard - follows existing project structure and design patterns -->
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
            <a href="{{ route('admin') }}" class="nav-link active">Dashboard</a>
            <a href="{{ route('adminManageUsers') }}" class="nav-link">Users</a>
            <a href="{{ route('adminManageCompanies') }}" class="nav-link">Companies</a>
            <a href="{{ route('adminManageJobs') }}" class="nav-link">Jobs</a>
            <a href="{{ route('adminManageApplications') }}" class="nav-link">Job Applications</a>
        </nav>
    </header>

    <main>
        <!-- Page Header -->
        <section class="page-header">
            <div class="container">
                <h1>Job Market Analytics</h1>
                <p>Data-driven insights to guide your career decisions</p>
            </div>
        </section>

        
        <section class="dashboard-overview">
            <div class="container">
                <h2>Market Overview</h2>
                <div class="overview-stats">
                    <div class="stat-card">
                        <div class="stat-icon">📊</div>
                        <h3>{{ $totalJobs }}</h3>
                        <p>Active Jobs</p>
                        <!-- <span class="stat-change positive">+12%</span> -->
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">💰</div>
                        <h3>₹5.2L</h3>
                        <p>Avg Salary</p>
                        <!-- <span class="stat-change positive">+8%</span> -->
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">🏢</div>
                        <h3>{{ $totalCompanies }}</h3>
                        <p>Companies</p>
                        <span class="stat-change positive">+15%</span>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">👥</div>
                        <h3>{{$totalUsers}} </h3>
                        <p>Job Seekers</p>
                        <span class="stat-change positive">+22%</span>
                    </div>
                </div>
            </div>
        </section>

       
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
    <script src="../script/job-analytics.js"></script>
</body>

</html>