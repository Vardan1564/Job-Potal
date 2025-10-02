<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerLink - For Companies</title>
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
            <a href="{{ route('company') }}" class="nav-link">Home</a>
            <!-- <a href="#spotlight" class="nav-link">Company Spotlight</a> -->
            <a href="{{ route('jobpost') }}" class="nav-link">Post Job</a>
            <a href="" class="nav-link">View Jobs</a>
            <a href="{{ route('aboutUs') }}" class="nav-link">About Us</a>
            <a href="{{ route('contactUs') }}" class="nav-link">Contact Us</a>
            <div class="account" id="account">
                <button class="account-toggle" id="companyAccountToggle" aria-haspopup="true"
                    aria-expanded="false">Account ▾</button>
                <div class="account-menu" id="companyAccountMenu" role="menu">
                    <a href="{{ route('profile') }}" class="dropdown-link" role="menuitem">Profile View</a>
                    <a href="{{ route('signin' ) }}" class="dropdown-link" role="menuitem">Sign Out</a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <!-- 1) Hero / Introduction -->
        <section class="hero hero-company">
            <div class="container hero-content">
                <h1>Hire Faster. Hire Better.</h1>
                <p>Showcase your brand and reach qualified talent with targeted visibility.</p>
                <div class="cta-group">
                    <a href="#spotlight" class="btn btn-primary">Post a Job</a>
                    <a href="#features" class="btn btn-outline">See Features</a>
                </div>
            </div>
        </section>

        <!-- 2) Company Spotlight / Post a job CTA -->
        <section id="spotlight" class="spotlight-section">
            <div class="container">
                <h2>Company Spotlight</h2>
                <div class="spotlight-grid">
                    <article class="spotlight-card">
                        <h3>Branded Pages</h3>
                        <p>Tell your story with visuals, values, and benefits candidates love.</p>
                    </article>
                    <article class="spotlight-card">
                        <h3>Targeted Reach</h3>
                        <p>Promote roles to skill-matched seekers across web and mobile.</p>
                    </article>
                    <article class="spotlight-card">
                        <h3>Quality Applicants</h3>
                        <p>Smarter matching delivers fewer, more relevant applications.</p>
                    </article>
                </div>
            </div>
        </section>

        <!-- 3) Key Features for Employers -->
        <section id="features" class="features">
            <div class="container">
                <h2>Built for Hiring Teams</h2>
                <div class="features-grid">
                    <article class="feature-card">
                        <h3>Team Collaboration</h3>
                        <p>Share feedback, shortlist candidates, and decide together.</p>
                    </article>
                    <article class="feature-card">
                        <h3>Analytics</h3>
                        <p>Track views, applies, and funnels to optimize job performance.</p>
                    </article>
                    <article class="feature-card">
                        <h3>Message Candidates</h3>
                        <p>Connect quickly with promising applicants right from the platform.</p>
                    </article>
                </div>
            </div>
        </section>

        <!-- 4) Featured Roles / Sample Pipeline -->
        <section class="pipeline">
            <div class="container">
                <h2>Sample Pipeline</h2>
                <div class="steps">
                    <div class="step">
                        <h3>1. Post Job</h3>
                        <p>Create engaging listings with rich media and clear criteria.</p>
                    </div>
                    <div class="step">
                        <h3>2. Review Matches</h3>
                        <p>Filter by skills, experience, and location to find the best fit.</p>
                    </div>
                    <div class="step">
                        <h3>3. Hire Confidently</h3>
                        <p>Collaborate with your team and move the right talent forward.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5) Testimonials from Employers -->
        <section class="testimonials">
            <div class="container">
                <h2>What Employers Say</h2>
                <div class="testimonial-cards">
                    <blockquote class="testimonial">
                        <p>“We filled two critical roles in under 3 weeks.”</p>
                        <footer>- HR Lead, FinServe</footer>
                    </blockquote>
                    <blockquote class="testimonial">
                        <p>“Great candidate quality and intuitive tools for our team.”</p>
                        <footer>- Talent Head, InnoTech</footer>
                    </blockquote>
                    <blockquote class="testimonial">
                        <p>“The analytics gave clarity to our hiring strategy.”</p>
                        <footer>- People Ops, DataWorks</footer>
                    </blockquote>
                </div>
            </div>
        </section>

        <!-- 6) Strong CTA -->
        <section class="call-to-action">
            <div class="container text-center">
                <h2>Ready to Start Hiring?</h2>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 CareerLink. All rights reserved.</p>
        </div>
    </footer>

    <script src="../landing-common.js"></script>
</body>

</html>