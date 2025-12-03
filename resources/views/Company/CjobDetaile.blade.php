<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $job->jobtitle }} - {{ $job->company_name }} | CareerLink</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../style/job-detail.css">
    <meta name="description"
        content="Frontend Developer position at TechNova. Join our team to build modern web interfaces with React and modern technologies.">
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
            <a href="{{ route('company') }}" class="nav-link">Home</a>
            <a href="{{route('jobpost')}}" class="nav-link active" aria-current="page">Post Job</a>
            <a href="{{ route('allCompanyJobs') }}" class="nav-link active" aria-current="page">All Company's Jobs</a>
            <div class="account" id="account">
                <button class="account-toggle" id="accountToggle" aria-haspopup="true" aria-expanded="false">Account
                    ▾</button>
                <div class="account-menu" id="accountMenu" role="menu">
                    <a href="{{ route('Cprofile') }}" class="dropdown-link" role="menuitem">Profile</a>
                    <a href="{{ route('signin') }}" class="dropdown-link" role="menuitem">Sign Out</a>
                </div>
            </div>
        </nav>
    </header>



    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <main>
        <!-- Job Header -->
        <section class="job-header-section">
            <div class="container">
                <div class="job-header-content">
                    <div class="company-info">
                        <img src="/ProfilePhotos/{{ $job->profile_photo }}" alt="TechNova Logo"
                            class="company-logo-large">
                        <div class="company-details">
                            <h1>{{ $job->company_name }}</h1>
                            <p class="company-name">{{  $job->jobtitle  }}</p>
                            <div class="job-meta">
                                <span class="meta-item">📍 {{ $job->city }}, {{ $job->state }}</span>
                                <span class="meta-item">⏰ {{ $job->jobtype }}</span>
                                <span class="meta-item">💼 {{ $job->experience_level }} level</span>
                                <span class="meta-item">💰 {{ $job->salary_range }}</span>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>

        <!-- Job Content -->
        <section class="job-content-section">
            <div class="container">
                <div class="content-layout">
                    <article class="main-content">
                        <section class="content-block">
                            <h2>Job Description</h2>
                            <p>{{ $job->job_description }}</p>
                        </section>


                    </article>

                    <aside class="sidebar">
                        <div class="info-card">
                            <h3>Job Summary</h3>
                            <div class="summary-item">
                                <span class="label">Company:</span>
                                <span class="value">{{ $job->company_name }}</span>
                            </div>
                            <div class="summary-item">
                                <span class="label">Location:</span>
                                <span class="value">{{ $job->city }}, {{ $job->state }}</span>
                            </div>
                            <div class="summary-item">
                                <span class="label">Job Type:</span>
                                <span class="value">{{ $job->jobtype }}</span>
                            </div>
                            <div class="summary-item">
                                <span class="label">Experience:</span>
                                <span class="value">{{ $job->experience_level }}</span>
                            </div>
                            <div class="summary-item">
                                <span class="label">Salary:</span>
                                <span class="value">{{ $job->salary_range }}</span>
                            </div>
                            <div class="summary-item">
                                <span class="label">Deadline:</span>
                                <span class="value">{{ $job->job_deadline }}</span>
                            </div>
                        </div>

                        <div class="info-card">
                            <h3>Benefits & Perks</h3>
                            <ul class="benefits-list">
                                <li>Health insurance coverage</li>
                                <li>Flexible working hours</li>
                                <li>Remote work options</li>
                                <li>Professional development budget</li>
                                <li>Stock options</li>
                                <li>Team building activities</li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 CareerLink. All rights reserved.</p>
        </div>
    </footer>

    <script src="../script/job-detail.js"></script>
</body>

</html>