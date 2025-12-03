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
      <form class="filters"  method="post" action="{{ route('searchJobList') }}">

      @csrf
        <div class="filter-group">
          <label for="searchTitle">Job Title/Keyword</label>
          <input type="text" id="searchTitle" name="searchJobTitle" placeholder="e.g. Frontend, Designer" />
        </div>
        
        
        <div class="filter-actions">
          <button type="submit" class="btn btn-primary">Search</button>
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
            <a href="{{ route('jobDetail',$job->id) }}" class="btn btn-outline">View Details</a>
            <a href="{{ route('applyJob',['c_id' => $job->company_id, 'j_id' => $job->id,'company_name'=>$job->company_name,'job_title'=>$job->jobtitle,'city'=>$job->city,'state'=>$job->state]) }}" class="btn btn-primary">Apply</a>
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
