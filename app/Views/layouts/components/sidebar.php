<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard'); ?>">
        <div class="sidebar-brand-text mx-3 text-capitalize"><i class="fas fa-hospital-symbol"></i> pharmacy</div>
    </a>


    <hr class="sidebar-divider my-0">

    <?php if (!empty(session()->get('user_data')) && session()->get('user_data')['role'] != 'user') : ?>
        <li class="nav-item <?= uri_string() == "dashboard" ? "active" : "" ?>">
            <a class="nav-link" href="<?= base_url('dashboard'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <div class="sidebar-heading">
            master data
        </div>

        <li class="nav-item <?= uri_string() == "patients" ? "active" : "" ?>">
            <a class="nav-link" href="<?= base_url('patients'); ?>">
                <i class="fas fa-fw fa-hospital-user"></i>
                <span>Patients</span></a>
        </li>

        <li class="nav-item <?= uri_string() == "users" ? "active" : "" ?>">
            <a class="nav-link" href="<?= base_url('users'); ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Users</span></a>
        </li>

        <li class="nav-item <?= uri_string() == "medicines" ? "active" : "" ?>">
            <a class="nav-link" href="<?= base_url('medicines'); ?>">
                <i class="fas fa-fw fa-tablets"></i>
                <span>Medicines</span></a>
        </li>
    <?php elseif (!empty(session()->get('user_data')) && session()->get('user_data')['role'] != 'admin') : ?>
        <li class="nav-item <?= uri_string() == "user-page" ? "active" : "" ?>">
            <a class="nav-link" href="<?= base_url('user-page'); ?>">
                <i class="fas fa-user"></i>
                <span>User Page</span></a>
        </li>
    <?php endif; ?>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->