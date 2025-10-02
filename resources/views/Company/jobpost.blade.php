<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a Job - CareerLink</title>
    <!-- Standalone stylesheet replicating site theme; does not import existing CSS -->
    <link rel="stylesheet" href="../style/job-post.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <meta name="description" content="Create a new job posting on CareerLink. Fully responsive and consistent with site style.">
</head>
<body>
    <header class="header-main">
        <div class="logo">
            <img src="../Images/Logo/logo_2.png" alt="CareerLink Logo">
        </div>
        <button id="menu-toggle" class="menu-toggle" aria-label="Toggle menu" aria-controls="primary-nav" aria-expanded="false">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
        <nav class="nav" id="primary-nav">
            <a href="{{ route('company') }}" class="nav-link">Home</a>
            <a href="{{route('jobpost')}}" class="nav-link active" aria-current="page">Post Job</a>
            <a href="{{ route('aboutUs') }}" class="nav-link">About</a>
            <a href="{{ route('contactUs') }}" class="nav-link">Contact</a>
            <div class="account" id="account">
                <button class="account-toggle" id="accountToggle" aria-haspopup="true" aria-expanded="false">Account ▾</button>
                <div class="account-menu" id="accountMenu" role="menu">
                    <a href="{{ route('Cprofile') }}" class="dropdown-link" role="menuitem">Profile</a>
                    <a href="{{ route('signin') }}" class="dropdown-link" role="menuitem">Sign Out</a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <!-- Page Header -->
        <section class="page-header">
            <div class="container">
                <h1>Post a New Job</h1>
                <p>Share your opportunity and connect with great candidates</p>
            </div>
        </section>

        <!-- Job Post Form -->
        <section class="form-section" id="post-section">
            <div class="container">
                <div class="form-container" role="region" aria-labelledby="formTitle">
                    <h2 id="formTitle" class="sr-only">Job Post Form</h2>

                    <form action="{{ route('jobpost_save') }}" method="post" 
                        id="jobPostForm" class="job-post-form" novalidate>

                        @csrf

                        <!-- Basic Information -->
                        <div class="form-section-header">
                            <h2>Basic Information</h2>
                        </div>
                        <div class="form-row">
                            <div class="form-group form-group-double">
                                <label for="jobTitle">Job Title <span class="required" aria-hidden="true">*</span></label>
                                <input type="text" id="jobTitle" name="jobtitle" placeholder="e.g. Frontend Developer" required>
                                <p class="field-error" id="jobTitleError" aria-live="polite"></p>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="location">City <span class="required" aria-hidden="true">*</span></label>
                                <input type="text" id="location" name="city" placeholder="e.g. Rajkot" required>
                                <p class="field-error" id="locationError" aria-live="polite"></p>
                            </div>
                            <div class="form-group">
                                <label for="state">State <span class="required" aria-hidden="true">*</span></label>
                                <input type="text" id="state" name="state" placeholder="e.g. Gujarat" required>
                                <p class="field-error" id="stateError" aria-live="polite"></p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="jobType">Job Type <span class="required" aria-hidden="true">*</span></label>
                                <select id="jobType" name="jobtype" required>
                                    <option value="">Select Type</option>
                                    <option value="full-time">Full-time</option>
                                    <option value="part-time">Part-time</option>
                                    <option value="contract">Contract</option>
                                    <option value="internship">Internship</option>
                                </select>
                                <p class="field-error" id="jobTypeError" aria-live="polite"></p>
                            </div>
                            <div class="form-group">
                                <label for="experienceLevel">Experience Level</label>
                                <select id="experienceLevel" name="experience_level">
                                    <option value="">Select Level</option>
                                    <option value="entry">Entry (0-2 years)</option>
                                    <option value="mid">Mid (2-5 years)</option>
                                    <option value="senior">Senior (5+ years)</option>
                                    <option value="lead">Lead/Manager (8+ years)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="form-section-header">
                            <h2>Role Details</h2>
                        </div>
                        <div class="form-group">
                            <label for="jobDescription">Job Description <span class="required" aria-hidden="true">*</span></label>
                            <textarea id="jobDescription" name="job_description" rows="6" placeholder="Describe responsibilities, tech stack, and impact" required></textarea>
                            <p class="field-error" id="jobDescriptionError" aria-live="polite"></p>
                        </div>
                        <div class="form-group">
                            <label for="qualifications">Qualifications <span class="required" aria-hidden="true">*</span></label>
                            <textarea id="qualifications" name="qualifications" rows="4" placeholder="Skills, education, experience" required></textarea>
                            <p class="field-error" id="qualificationsError" aria-live="polite"></p>
                        </div>

                        <!-- Company & Settings -->
                        <div class="form-section-header">
                            <h2>Company & Settings</h2>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="companyName">Company Name <span class="required" aria-hidden="true">*</span></label>
                                <input type="text" id="companyName" name="company_name" placeholder="Your company" value="{{ $company->name }}" required>
                                <p class="field-error" id="companyNameError" aria-live="polite"></p>
                            </div>
                            <div class="form-group">
                                <label for="applicationDeadline">Application Deadline</label>
                                <input type="date" id="applicationDeadline" name="job_deadline">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="salaryRange">Salary Range</label>
                                <input type="text" id="salaryRange" name="salary_range" placeholder="e.g. ₹5–8 LPA">
                            </div>
                            <div class="form-group">
                                <label for="hiringEmail">Hiring Manager Email</label>
                                <input type="email" id="hiringEmail" name="email" placeholder="hiring@company.com">
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Post Job</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 CareerLink. All rights reserved.</p>
        </div>
    </footer>

    <!-- Standalone script; does not import existing JS -->
    <script src="../script/job-post.js"></script>
</body>
</html>



