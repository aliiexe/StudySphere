<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Pages</div>
                <a class="nav-link" href="{{ route('liste_utilisateurs') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Liste Utilisateurs
                </a>

                <a class="nav-link" href="{{ route('liste_posts') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Liste Posts
                </a>
                <a class="nav-link" href="{{ route('static.page') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Statique
                </a>
                {{-- <a class="nav-link" href="{{ route('liste_courses') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Liste Courses
                </a> --}}
                <div class="sb-sidenav-menu-heading">ADDONS</div>
                <a class="nav-link" href="{{ route('chart') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Charts
                </a>
                {{-- <div class="sb-sidenav-menu-heading">Interface</div> --}}


                {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUtilisateurs" aria-expanded="false" aria-controls="collapseUtilisateurs">
    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
    Utilisateurs
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a> --}}
{{-- <div class="collapse" id="collapseUtilisateurs" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="utilisateurs.html">Liste des Utilisateurs</a>
        <!-- Ajoutez d'autres liens pour d'autres pages d'utilisateurs ici -->
    </nav>
</div> --}}

{{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePosts" aria-expanded="false" aria-controls="collapsePosts">
    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
    Posts
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="collapsePosts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="">Liste des Posts</a>
        <!-- Ajoutez d'autres liens pour d'autres pages de posts ici -->
    </nav>
</div> --}}

{{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseStatique" aria-expanded="false" aria-controls="collapseStatique">
    <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
    Statique
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="collapseStatique" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="page-statique.html">Page Statique</a>
        <!-- Ajoutez d'autres liens pour d'autres pages statiques ici -->
    </nav>
</div> --}}

{{--
<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
            Authentication
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="login.html">Login</a>
                <a class="nav-link" href="register.html">Register</a>
                <a class="nav-link" href="password.html">Forgot Password</a>
            </nav>
        </div>
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
            Error
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="401.html">401 Page</a>
                <a class="nav-link" href="404.html">404 Page</a>
                <a class="nav-link" href="500.html">500 Page</a>
            </nav>
        </div>
    </nav>
</div>
<div class="sb-sidenav-menu-heading">Addons</div>
<a class="nav-link" href="charts.html">
    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
    Charts
</a>
<a class="nav-link" href="tables.html">
    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
    Tables
</a> --}}






            </div>
        </div>

    </nav>
</div>
