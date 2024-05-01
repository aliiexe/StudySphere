<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Pages</div>
                <a class="nav-link" href="{{ route('liste_utilisateurs') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Liste Utilisateurs
                </a>

                <a class="nav-link" href="{{ route('liste_posts') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>
                    Liste Posts
                </a>
                <a class="nav-link" href="{{ route('static.page') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Statique
                </a>
                <a class="nav-link" href="{{ route('liste_courses') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Liste Courses
                </a>
                <div class="sb-sidenav-menu-heading">ADDONS</div>
                <a class="nav-link" href="{{ route('chart') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                    Charts
                </a>

  </div>
        </div>

    </nav>
</div>