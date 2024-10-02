
<div class="sidebar" data-background-color="dark">
  <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
          <a href="#" class="logo">
              <img src="{{ asset('assets') }}/img/logo-sisusana.png" alt="navbar brand" class="navbar-brand"
                  height="50" />
          </a>
          <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
              </button>
          </div>
          <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
          </button>
      </div>
      <!-- End Logo Header -->
  </div>
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
          <ul class="nav nav-secondary">
              <li class="nav-section">
                  <span class="sidebar-mini-icon">
                      <i class="fa fa-ellipsis-h"></i>
                  </span>
                  <h4 class="text-section">MENU</h4>
              </li>
              <li class="nav-item">
                  <a href="/beranda">
                      <i class="fas fa-home"></i>
                      <p>Beranda</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="/manajemen-user">
                      <i class="fas fa-user"></i>
                      <p>Manajemen User</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="/manajemen-grup">
                      <i class="fas fa-layer-group"></i>
                      <p>Manajemen Grup</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="/manajemen-pertanyaan">
                      <i class="fas fa-question-circle"></i>
                      <p>Manajemen Pertanyaan</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="/hasil/grafik-keseluruhan">
                      <i class="fas fa-book"></i>
                      <p>Hasil Kuisioner</p>
                  </a>
              </li>
          </ul>
      </div>
  </div> 
</div>
<div class="main-panel">
  <div class="main-header">
      <div class="main-header-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
              <a href="../index.html" class="logo">
                  <img src="../assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" />
              </a>
              <div class="nav-toggle">
                  <button class="btn btn-toggle toggle-sidebar">
                      <i class="gg-menu-right"></i>
                  </button>
                  <button class="btn btn-toggle sidenav-toggler">
                      <i class="gg-menu-left"></i>
                  </button>
              </div>
              <button class="topbar-toggler more">
                  <i class="gg-more-vertical-alt"></i>
              </button>
          </div>
          <!-- End Logo Header -->
      </div>

      <!-- NAV Header -->
      <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
          <div class="container-fluid">
              <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                  <h3 class="fw-bold p-0">@yield('namepage')</h3>
              </nav>

              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
<li class="nav-item topbar-user dropdown hidden-caret">
                      <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                          aria-expanded="false">
                          <div class="avatar-sm">
                              <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle" />
                          </div>
                          <span class="profile-username">
                              <span class="op-7">Hi,</span>
                              <span class="fw-bold">Hizrian</span>
                          </span>
                      </a>
                      <ul class="dropdown-menu dropdown-user animated fadeIn">
                          <div class="dropdown-user-scroll scrollbar-outer">
                              <li>
                                  <div class="user-box">
                                      <div class="avatar-lg">
                                          <img src="../assets/img/profile.jpg" alt="image profile"
                                              class="avatar-img rounded" />
                                      </div>
                                      <div class="u-text">
                                          <h4>Hizrian</h4>
                                          <p class="text-muted">hello@example.com</p>
                                          <a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View
                                              Profile</a>
                                      </div>
                                  </div>
                              </li>
                              <li>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="#">My Profile</a>
                                  <a class="dropdown-item" href="#">My Balance</a>
                                  <a class="dropdown-item" href="#">Inbox</a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="#">Account Setting</a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="#">Logout</a>
                              </li>
                          </div>
                      </ul>
                  </li>
              </ul>
          </div>
      </nav>
      <!-- End Navbar -->
  </div>