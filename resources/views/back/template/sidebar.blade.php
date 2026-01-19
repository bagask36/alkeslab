<ul class="navbar-nav bg-white sidebar sidebar-light accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('app') }}/assets/logo.png" alt="" width="80%">
        </div>
        <div class="sidebar-brand-text mx-3" style="color: var(--primary);">Alkeslab Primatama</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard" style="color: var(--primary);">
            <i class="fas fa-fw fa-tachometer-alt" style="color: var(--primary);"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading" style="color: var(--primary);">
        Tampilan
    </div>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities" style="color: var(--primary);">
            <i class="fas fa-fw fa-wrench" style="color: var(--primary);"></i>
            <span>Utilitas</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/products" style="color: var(--primary);">Produk Kami</a>
                <a class="collapse-item" href="/clients" style="color: var(--primary);">Klien Kami</a>
                <a class="collapse-item" href="/projects" style="color: var(--primary);">Proyek Lainnya</a>
                <a class="collapse-item" href="/teknis" style="color: var(--primary);">Teknis Medis</a>
                <a class="collapse-item" href="/layanan" style="color: var(--primary);">Layanan</a>
                <a class="collapse-item" href="/legalitas" style="color: var(--primary);">Legalitas</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading" style="color: var(--primary);">
        Konten
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="/articles" style="color: var(--primary);">
            <i class="fas fa-fw fa-table" style="color: var(--primary);"></i>
            <span>Berita</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
