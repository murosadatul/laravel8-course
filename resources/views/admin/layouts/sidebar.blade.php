<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="index.html"><img src="{{ asset('admin/images/logo.svg') }}" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{ asset('admin/images/logo-mini.svg') }}" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle " src="{{ asset('admin/images/faces/face15.jpg') }}" alt="">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal">{{ session()->get('user.name') }}</h5>
              <span>Gold Member</span>
            </div>
          </div>
          <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
          <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-settings text-primary"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-onepassword  text-info"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-calendar-today text-success"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
              </div>
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="/dashboard">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#ui-posts" aria-expanded="false" aria-controls="ui-posts">
          <span class="menu-icon">
            <i class="mdi mdi-folder-multiple"></i>
          </span>
          <span class="menu-title">Master</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-posts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="/masterpost">Posts</a></li>
            <li class="nav-item"> <a class="nav-link" href="/category">Categories</a></li>
            <li class="nav-item"> <a class="nav-link" href="/tag">Tags</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#preference" aria-expanded="false" aria-controls="preference">
          <span class="menu-icon">
            <i class="mdi mdi-settings"></i>
          </span>
          <span class="menu-title">Preference</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="preference">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> Portals </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> Roles </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> Navigations </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Users </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Permissions </a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="false" aria-controls="report">
          <span class="menu-icon">
            <i class="mdi mdi-file-document"></i>
          </span>
          <span class="menu-title">Report</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="report">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="/report/sale">Sales</a></li>
            <li class="nav-item"> <a class="nav-link" href="/report/revenue">Revenue</a></li>
            <li class="nav-item"> <a class="nav-link" href="/purchase">Purchase</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#integration_api" aria-expanded="false" aria-controls="integration_api">
          <span class="menu-icon">
            <i class="mdi mdi-link"></i>
          </span>
          <span class="menu-title">Integration API</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="integration_api">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="/api_presensi">Presensi</a></li>
            <li class="nav-item"> <a class="nav-link" href="/api_keuangan">Keuangan</a></li>
            <li class="nav-item"> <a class="nav-link" href="/api_ppdb">PPDB</a></li>
          </ul>
        </div>
      </li>

    </ul>
  </nav>
