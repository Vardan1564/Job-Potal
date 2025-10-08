<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerLink - For Job Seekers</title>
    <link rel="stylesheet" href="../style/landing-common.css">
    <link rel="shortcut icon" href="../Images/Logo/Logo_3.png" type="image/x-icon">
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
            <a href="user-apply.html" class="nav-link">Job Apply</a>
            <a href="internships.html" class="nav-link">Internships</a>
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
        <!-- 1) Hero / Introduction -->
        <section class="hero hero-user">
            <div class="container hero-content">
                <h1>Find Your Next Opportunity</h1>
                <p>Discover roles tailored to your skills with a modern, guided experience.</p>
                <div class="cta-group">
                    <a href="#search" class="btn btn-primary">Search Jobs</a>
                    <a href="#features" class="btn btn-outline">Explore Features</a>
                </div>
            </div>
        </section>

        <!-- 2) Quick Job Search -->
        <section id="search" class="search-section">
            <div class="container">
                <h2>Quick Job Search</h2>
                <form class="search-form" id="userSearchForm" novalidate>
                    <div class="form-group">
                        <label for="job-title">Job Title or Keywords</label>
                        <input type="text" id="job-title" placeholder="e.g. Frontend Developer" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" id="location" placeholder="e.g. Ahmedabad" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </section>

        <!-- 3) Key Features -->
        <section id="features" class="features">
            <div class="container">
                <h2>Designed for Job Seekers</h2>
                <div class="features-grid">
                    <article class="feature-card">
                        <h3>Smart Matching</h3>
                        <p>Role recommendations based on your profile and search intent.</p>
                    </article>
                    <article class="feature-card">
                        <h3>Application Tracker</h3>
                        <p>Stay on top of applications with clear status updates.</p>
                    </article>
                    <article class="feature-card">
                        <h3>Resources & Tips</h3>
                        <p>Interview guides, resume templates, and career advice.</p>
                    </article>
                </div>
            </div>
        </section>

        <!-- 4) Spotlight / Latest Jobs -->
        <section class="latest-jobs">
            <div class="container">
                <h2>Latest Opportunities</h2>
                <div class="job-listings">
                    <article class="job-item">
                        <h3>Frontend Developer</h3>
                        <p class="company">Tech Solutions Inc.</p>
                        <p class="location">Remote</p>
                        <p class="description">Build responsive UI with React and modern tooling.</p>
                        <a href="#" class="btn btn-primary">Apply Now</a>
                    </article>
                    <article class="job-item">
                        <h3>Data Analyst</h3>
                        <p class="company">Data Insights</p>
                        <p class="location">Surat</p>
                        <p class="description">Transform data into business decisions and insights.</p>
                        <a href="#" class="btn btn-primary">Apply Now</a>
                    </article>
                    <article class="job-item">
                        <h3>Mobile Engineer</h3>
                        <p class="company">AppWorks</p>
                        <p class="location">Ahmedabad</p>
                        <p class="description">Deliver delightful mobile experiences at scale.</p>
                        <a href="#" class="btn btn-primary">Apply Now</a>
                    </article>
                </div>
            </div>
        </section>

        <!-- 5) Testimonials / Success Stories -->
        <section class="testimonials">
            <div class="container">
                <h2>Success Stories</h2>
                <div class="testimonial-cards">
                    <blockquote class="testimonial">
                        <p>“I landed my ideal role within weeks. The process was smooth!”</p>
                        <footer>- Priya, UI Engineer</footer>
                    </blockquote>
                    <blockquote class="testimonial">
                        <p>“The resources helped me refresh my resume and ace interviews.”</p>
                        <footer>- Aarav, Data Analyst</footer>
                    </blockquote>
                    <blockquote class="testimonial">
                        <p>“Smart suggestions saved me hours every day.”</p>
                        <footer>- Neha, QA Specialist</footer>
                    </blockquote>
                </div>
            </div>
        </section>

        <!-- 6) CTA -->
        <section class="call-to-action">
            <div class="container text-center">
                <h2>Ready to Grow Your Career?</h2>
                <p>Create your profile to unlock personalized job matches.</p>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 CareerLink. All rights reserved.</p>
        </div>
    </footer>

    <script src="../landing-common.js"></script>
    <!-- Note: Script is standalone and mirrors project interactions (menu toggle, form). -->
</body>

</html>