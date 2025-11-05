<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Users | CareerLink Admin</title>
  <link rel="stylesheet" href="../style/manage-users.css">
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
        <h1>Manage Users</h1>
      </div>
      <!-- <div class="controls">
        <input type="text" id="search" placeholder="Search by name or email">
        <select id="role">
          <option value="">All Roles</option>
          <option value="user">User</option>
          <option value="company">Company</option>
          <option value="admin">Admin</option>
        </select>
        <button id="applyFilters" class="btn btn-primary">Apply</button>
      </div> -->

      
          
      
     
      <div class="table-wrapper">
       
        <table class="table" id="usersTable">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Number</th>
              <th>Role</th>
              <th>location</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($user as $users)
                    <tr>
                      <td>{{ $users->name }}</td>
                      <td>{{ $users->email }}</td>
                      <td>{{ $users->number }}</td>
                      <td>{{ $users->role }}</td>
                      <td>{{ $users->location }}</td>
    
                      
                      <!-- <td>
                        <button class="btn btn-outline btn-sm">View</button>
                        <button class="btn btn-outline btn-sm">Suspend</button>
                      </td> -->
                    
                @endforeach
          </tbody>
        </table>
         
      </div>

      <div class="pagination">
    @if ($user->onFirstPage())
        <button class="page-btn" disabled>&lt;</button>
    @else
        <a href="{{ $user->previousPageUrl() }}" class="page-btn">&lt;</a>
    @endif

    <span class="page-current">
        Page {{ $user->currentPage() }} of {{ $user->lastPage() }}
    </span>

    @if ($user->hasMorePages())
        <a href="{{ $user->nextPageUrl() }}" class="page-btn">&gt;</a>
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
  <script src="../script/manage-users.js"></script>
</body>
</html>
