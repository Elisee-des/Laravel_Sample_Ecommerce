<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Navigation</div>
            
            @if ( auth()->user()->role == 'admin')
            <a class="nav-link" href="{{ route("dashboard") }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Gestion du site</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Gestion
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route("categorie.index") }}">Categories</a>
                    <a class="nav-link" href="{{ route("product.index") }}">Produits</a>
                </nav>
            </div>

            <div class="sb-sidenav-menu-heading">Gestion des utilisateurs</div>
            <a class="nav-link collapsed" href="{{ route("user.index") }}" >
                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                Utilisateurs
            </a>
            @endif

            <div class="sb-sidenav-menu-heading">Personnel</div>
            <a class="nav-link" href="{{ route("profil") }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-address-card"></i></div>
                Mon Profil
            </a>
            <a class="nav-link collapsed" href="{{ route("profil.parametre") }}" >
                <div class="sb-nav-link-icon"><i class="fa-solid fa-sliders"></i></div>
                Edition du compte
            </a>
            
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Developpé par SABIDANI</div>
    </div>
</nav>