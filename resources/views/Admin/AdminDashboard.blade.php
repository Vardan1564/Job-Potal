<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard | CareerLink</title>
  <link rel="stylesheet" href="../style/admin-dashboard.css">
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

    <!-- Recent Activity -->
    <section class="panel recent-activity">
      <div class="panel-header">
        <h2>Recent Activity</h2>
      </div>
      <ul class="activity-list" id="activityList">
        <li><span class="time">2m</span> New user registered: jane.doe@example.com</li>
        <li><span class="time">12m</span> Job approved: Senior Backend Engineer</li>
        <li><span class="time">23m</span> Company verified: Nimbus Softworks</li>
        <li><span class="time">1h</span> Account suspended: spam-user-1993</li>
      </ul>
    </section>

    <!-- Quick Links -->
    <section class="panel quick-links">
      <div class="panel-header">
        <h2>Quick Links</h2>
      </div>
      <div class="link-grid">
        <a class="btn btn-primary" href="{{ route('adminManageUsers') }}">Manage Users</a>
        <a class="btn btn-primary" href="{{ route('adminManageCompanies') }}">Manage Companies</a>
        <a class="btn btn-primary" href="{{ route('adminManageJobs') }}">Manage Jobs</a>
        <a class="btn btn-outline" href="{{ route('adminAnalysis') }}">Analytics</a>
      </div>
    </section>
  </main>

  <footer class="footer">
    <div class="container">
      <p>&copy; 2023 CareerLink. All rights reserved.</p>
    </div>
  </footer>

  <script src="../script/admin-dashboard.js"></script>
</body>
</html>
