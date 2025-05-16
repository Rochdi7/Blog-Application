<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <!-- Dashboard Link -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.index') }}">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <!-- Categories Link -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.categories.index') }}">
        <i class="mdi mdi-folder-multiple menu-icon"></i>
        <span class="menu-title">Categories</span>
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.posts.index') }}">
        <i class="mdi mdi-file-document-outline menu-icon"></i>
        <span class="menu-title">Posts</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.users.index') }}">
        <i class="mdi mdi-account-multiple menu-icon"></i>
        <span class="menu-title">Manage Users</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.roles.index') }}">
        <i class="mdi mdi-account-key-outline menu-icon"></i>
        <span class="menu-title">Manage Roles</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.permissions.index') }}">
        <i class="mdi mdi-lock-outline menu-icon"></i>
        <span class="menu-title">Manage Permissions</span>
      </a>
    </li>




  </ul>
</nav>