<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Jobs | CareerLink Admin</title>
  <link rel="stylesheet" href="../style/manage-jobs.css">
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
        <h1>Manage Jobs</h1>
      </div>
      <!-- <div class="controls">
        <input type="text" id="search" placeholder="Search by title or company">
        <select id="status">
          <option value="">All Status</option>
          <option value="active">Active</option>
          <option value="pending">Pending</option>
          <option value="closed">Closed</option>
        </select>
        <button id="applyFilters" class="btn btn-primary">Apply</button>
      </div> -->
      <div class="table-wrapper">
        <table class="table" id="jobsTable">
          <thead>
            <tr>
              <th>Job Title</th>
              <th>Company</th>
              <th>Company / HR Email</th>
              <th>Experience Level</th>
              <th>Salary Range</th>
              <th>Location</th>
              <th>Job Deadline</th>
              <th>Status</th>
              <th>Actions</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($jobs as $job)
              <tr>
                <td>{{ $job->jobtitle }}</td>
                <td>{{ $job->company_name }}</td>
                <td>{{ $job->Email }}</td>
                <td>{{ $job->experience_level }}</td>
                <td>{{ $job->salary_range }}</td>
                <td>{{ $job->city }},{{ $job->state }}</td>
                <td>{{ $job->job_deadline }}</td>
                <!-- <td>{{ $job->active_or_not }}</td> -->
                <td>

                  @if ($job->active_or_not == '0')
                    Deactivate
                    @else
                    Activate

                  @endif
                </td>

                <td>
                      <a href="{{ route('activeJobs', $job->id) }}" class="btn btn-outline btn-sm">Activate</a> 
                  <td>
                    <a href="{{ route('removeJobs', $job->id) }}" class="btn btn-outline btn-sm">Deactivate</a>

                </td></td>

            @endforeach
          </tbody>
        </table>
      </div>
      <div class="pagination">
    @if ($jobs->onFirstPage())
        <button class="page-btn" disabled>&lt;</button>
    @else
        <a href="{{ $jobs->previousPageUrl() }}" class="page-btn">&lt;</a>
    @endif

    <span class="page-current">
        Page {{ $jobs->currentPage() }} of {{ $jobs->lastPage() }}
    </span>

    @if ($jobs->hasMorePages())
        <a href="{{ $jobs->nextPageUrl() }}" class="page-btn">&gt;</a>
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
  <script src="../script/manage-jobs.js"></script>
</body>
</html>
