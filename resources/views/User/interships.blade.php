<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internships - CareerLink</title>
    <link rel="stylesheet" href="../style/landing-common.css">
    <link rel="stylesheet" href="../style/page-common.css">
    <!-- Internships page - follows existing project structure and design patterns -->
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
                <h1>Internship Opportunities</h1>
                <p>Kickstart your career with hands-on experience</p>
            </div>
        </section>

        <!-- Internship Search -->
        <section class="search-section">
            <div class="container">
                <h2>Find Your Perfect Internship</h2>
                <form class="search-form" id="internshipSearchForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="internship-role">Role or Field</label>
                            <input type="text" id="internship-role" placeholder="e.g. Software Development" required>
                        </div>
                        <div class="form-group">
                            <label for="internship-location">Location</label>
                            <input type="text" id="internship-location" placeholder="e.g. Remote, Mumbai" required>
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <select id="duration">
                                <option value="">Any Duration</option>
                                <option value="1-3">1-3 months</option>
                                <option value="3-6">3-6 months</option>
                                <option value="6+">6+ months</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Search Internships</button>
                </form>
            </div>
        </section>

        <!-- Featured Internships -->
        <section class="featured-section">
            <div class="container">
                <h2>Featured Internships</h2>
                @foreach ($internships as $internship) 

                <div class="internship-listings">
                    <article class="internship-item featured">
                        <div class="internship-header">
                            <h3>{{ $internship->jobtitle }}</h3>                           
                        </div>
                        <p class="company">{{ $internship->company_name }}</p>
                        <p class="location">📍 {{ $internship->company_name }}</p>
                        <p class="stipend">💰 {{ $internship->salary_range }}</p>
                        <p class="description">{{ $internship->job_description }}</p>
                        <div class="internship-actions">
                            <a href="#" class="btn btn-primary">Apply Now</a>
                            <a href="{{ route('jobDetail', ['id' => $internship->id]) }}" class="btn btn-outline">View Details</a>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </section>

        <!-- Internship Benefits -->
        <section class="benefits-section">
            <div class="container">
                <h2>Why Choose Internships?</h2>
                <div class="benefits-grid">
                    <div class="benefit-card">
                        <h3>🎯 Real Experience</h3>
                        <p>Work on actual projects and gain hands-on experience in your field of interest.</p>
                    </div>
                    <div class="benefit-card">
                        <h3>🤝 Professional Network</h3>
                        <p>Build connections with industry professionals and potential future employers.</p>
                    </div>
                    <div class="benefit-card">
                        <h3>📈 Skill Development</h3>
                        <p>Learn new technologies and improve your technical and soft skills.</p>
                    </div>
                    <div class="benefit-card">
                        <h3>💼 Job Opportunities</h3>
                        <p>Many internships lead to full-time job offers upon successful completion.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Application Tips -->
        <section class="tips-section">
            <div class="container">
                <h2>Internship Application Tips</h2>
                <div class="tips-grid">
                    <div class="tip-card">
                        <h3>📝 Create a Strong Resume</h3>
                        <p>Highlight your academic projects, relevant coursework, and any previous experience.</p>
                    </div>
                    <div class="tip-card">
                        <h3>📧 Write a Compelling Cover Letter</h3>
                        <p>Explain why you're interested in the role and what you hope to learn.</p>
                    </div>
                    <div class="tip-card">
                        <h3>🎯 Show Enthusiasm</h3>
                        <p>Demonstrate genuine interest in the company and the specific role you're applying for.</p>
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

