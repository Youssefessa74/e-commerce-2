	<!-- partial:partials/_sidebar.html -->
    <nav class="sidebar">
        <div class="sidebar-header">
          <a href="#" class="sidebar-brand">
           Admin<span>Dashboard</span>
          </a>
          <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
        <div class="sidebar-body">
          <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
              <a href="dashboard.html" class="nav-link">
                <i class="link-icon" data-feather="box"></i>
                <span class="link-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item nav-category">Components</li>

            {{-- Management --}}

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#management" role="button" aria-expanded="false" aria-controls="management">
                <i class="link-icon" data-feather="mail"></i>
                <span class="link-title">Management</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
              </a>
              <div class="collapse" id="management">
                <ul class="nav sub-menu">
                  <li class="nav-item">
                    <a href="{{ route('admin.admin-list.index') }}" class="nav-link">Admin List</a>
                  </li>
                </ul>
              </div>
            {{-- End Management --}}

                   {{-- Manage Commerce --}}

                   <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#manage-commerce" role="button" aria-expanded="false" aria-controls="manage-commerce">
                      <i class="link-icon" data-feather="mail"></i>
                      <span class="link-title">Manage Commerce</span>
                      <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="manage-commerce">
                      <ul class="nav sub-menu">
                        <li class="nav-item">
                          <a href="{{ route('admin.category.index') }}" class="nav-link">Categories</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.sub-category.index') }}" class="nav-link">Sub Categories</a>
                          </li>

                      </ul>
                    </div>
                  {{-- End Manage Commerce --}}


            <li class="nav-item nav-category">Docs</li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
                <i class="link-icon" data-feather="hash"></i>
                <span class="link-title">Documentation</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
