<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Companies | CareerLink Admin</title>
  <link rel="stylesheet" href="../style/manage-companies.css">
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

  <main class="container admin-main">
    <section class="panel">
      <div class="panel-header">
        <h1>Manage Applications</h1>
      </div>
      
      <div class="table-wrapper">
        <table class="table" id="companiesTable">
          <thead>
            <tr>
              <th>Job Title</th>
              <th>Company Name</th>
              <th>Seeker Name</th>
              <th>Seeker Email</th>
              <th>Seeker Resume</th>
            
            </tr>
          </thead>
          <tbody>
           @foreach ($applications as $users)
                    <tr>
                      <td>{{ $users->job_title }}</td>
                      <td>{{ $users->company_name }}</td>
                      <td>{{ $users->user_name }}</td>
                      <td>{{ $users->user_email }}</td>
                      <td>  <a
                        href="/Resumes/{{ $users->resume }}"
                        download="{{ $users->resume }}"
                        class="resume-download-link"
                        title="Download Resume"
                    >
                    resme-{{ $users->user_name }}.pdf
                    </a></td>
    
                      
                      <!-- <td>
                        <button class="btn btn-outline btn-sm">View</button>
                        <button class="btn btn-outline btn-sm">Suspend</button>
                      </td> -->
                    
                @endforeach
          </tbody>
        </table>
      </div>
      <div class="pagination">
    @if ($applications->onFirstPage())
        <button class="page-btn" disabled>&lt;</button>
    @else
        <a href="{{ $applications->previousPageUrl() }}" class="page-btn">&lt;</a>
    @endif

    <span class="page-current">
        Page {{ $applications->currentPage() }} of {{ $applications->lastPage() }}
    </span>

    @if ($applications->hasMorePages())
        <a href="{{ $applications->nextPageUrl() }}" class="page-btn">&gt;</a>
    @else
        <button class="page-btn" disabled>&gt;</button>
    @endif
</div>
    </section>
  </main>

  <footer class="footer">
    <div class="container">
      <p>&copy; 2023 CareerLink. All rights reserved.</p>
    </div>
  </footer>
  <script src="../script/manage-companies.js"></script>
</body>
</html>
