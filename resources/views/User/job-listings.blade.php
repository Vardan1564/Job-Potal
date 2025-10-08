<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Job Listings - CareerLink</title>
  <meta name="description" content="Browse and explore job listings on CareerLink.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../style/job-listings.css" />
</head>

<body>
  <!-- Header -->
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

  <!-- Page Header -->
  <section class="page-header">
    <div class="container">
      <h1>Find Your Next Role</h1>
      <p>Explore curated job opportunities that match your skills</p>
    </div>
  </section>

  <!-- Filters -->
  <section class="filter-section" aria-label="Search filters">
    <div class="container">
      <form class="filters">
        <div class="filter-group">
          <label for="searchTitle">Job Title/Keyword</label>
          <input type="text" id="searchTitle" placeholder="e.g. Frontend, Designer" />
        </div>
        <div class="filter-group">
          <label for="searchLocation">Location</label>
          <input type="text" id="searchLocation" placeholder="e.g. Mumbai, Remote" />
        </div>
        <div class="filter-group">
          <label for="filterType">Type</label>
          <select id="filterType">
            <option>Any</option>
            <option>Full-time</option>
            <option>Part-time</option>
            <option>Contract</option>
            <option>Internship</option>
          </select>
        </div>
        <div class="filter-group">
          <label for="filterExperience">Experience</label>
          <select id="filterExperience">
            <option>Any</option>
            <option>Entry</option>
            <option>Mid</option>
            <option>Senior</option>
          </select>
        </div>
        <div class="filter-actions">
          <button type="button" class="btn btn-primary">Search</button>
          <button type="reset" class="btn btn-outline">Reset</button>
        </div>
      </form>
    </div>
  </section>

  <!-- Job Listings -->
  <section class="job-listings-section">
    <div class="container job-grid">

    @foreach ($jobs as $job )
    
    <article class="job-card">
        <div class="job-header">
            <img src="/ProfilePhotos/{{ $job->profile_photo }}" alt="TechNova Logo" class="company-logo">
            <div>
                <h3>{{ $job->jobtitle }}</h3>
                <p class="job-meta">{{ $job->company_name }} • {{ $job->state }} • {{ $job->city }}</p>
            </div>
        </div>
        <p class="job-meta">{{ $job->jobtype }} • {{ $job->experience_level }}</p>
        <p class="job-desc">{{ $job->job_description }}</p>
        <div class="card-actions">
            <a href="job-detail.html" class="btn btn-outline">View Details</a>
            <a href="user-apply.html" class="btn btn-primary">Apply</a>
        </div>
    </article>
    
    @endforeach
      

    </div>
  </section>

  <footer class="footer">
    <div class="container">
      <p>&copy; 2025 CareerLink. All rights reserved.</p>
    </div>
  </footer>

  <!-- <script src="../job-listings.js"></script> -->
  <script src="{{ asset('menu.js') }}"></script>
  <script src="{{ asset('landing-common.js') }}"></script>
</body>
</html>
