<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
    <div class="me-3">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
        <span class="icon-menu"></span>
      </button>
    </div>
    <div>
      <a class="navbar-brand brand-logo" href="../index.php">
        <svg width="250" height="50" viewBox="0 0 250 50" fill="none">
          <text x="0" y="35" font-family="Arial, sans-serif" font-size="35" font-weight="800" fill="#a8fa4f">
            Blog Application
          </text>
        </svg>
      </a>
      <a class="navbar-brand brand-logo-mini" href="../index.php">
        <svg width="180" height="50" viewBox="0 0 180 50" fill="none">
          <text x="0" y="35" font-family="Arial, sans-serif" font-size="24" fill="#a8fa4f" font-weight="bold">
            Blog App
          </text>
        </svg>
      </a>
    </div>
  </div>

  <div class="navbar-menu-wrapper d-flex align-items-top">
    <ul class="navbar-nav">
      <li class="nav-item fw-semibold d-none d-lg-block ms-0">
        <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">John Doe</span></h1>
        <h3 class="welcome-sub-text">Manage your blog content efficiently</h3>
      </li>
    </ul>

    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <form class="search-form" action="#">
          <i class="icon-search"></i>
          <input type="search" class="form-control" placeholder="Search Here" title="Search here">
        </form>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link count-indicator" href="#" data-bs-toggle="dropdown">
          <i class="icon-bell"></i>
          <span class="count"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list pb-0">
          <a class="dropdown-item py-3 border-bottom">
            <p class="mb-0 fw-medium float-start">You have 4 new notifications</p>
            <span class="badge badge-pill badge-primary float-end">View all</span>
          </a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link count-indicator" href="#" data-bs-toggle="dropdown">
          <i class="icon-mail icon-lg"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list pb-0">
          <a class="dropdown-item py-3">
            <p class="mb-0 fw-medium float-start">You have 7 unread mails</p>
            <span class="badge badge-pill badge-primary float-end">View all</span>
          </a>
        </div>
      </li>

      <li class="nav-item dropdown d-none d-lg-block user-dropdown">
        <a class="nav-link" href="#" data-bs-toggle="dropdown">
          <img class="img-xs rounded-circle" src="/assets/images/default.png" alt="Profile image">
        </a>
        <div class="dropdown-menu dropdown-menu-end navbar-dropdown">
          <div class="dropdown-header text-center">
            <img class="img-md rounded-circle" src="/assets/images/default.png" alt="Profile image">
            <p class="mb-1 mt-3 fw-semibold">John Doe</p>
            <p class="fw-light text-muted mb-0">john.doe@example.com</p>
          </div>
          <a class="dropdown-item" href="profile.php">
            <i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile
          </a>
          <a class="dropdown-item" href="#">
            <i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages
          </a>
          <a class="dropdown-item" href="#">
            <i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity
          </a>
          <a class="dropdown-item" href="#">
            <i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ
          </a>
          <a class="dropdown-item" href="logout.php">
            <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i> Sign Out
          </a>
        </div>
      </li>
    </ul>

    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>
