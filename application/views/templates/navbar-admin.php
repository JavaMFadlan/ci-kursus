<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= base_url('admin')?>">Admin</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar-->
    <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-20"></div>
    <ul class="navbar-nav ml-auto ml-md-0 ">
        
        <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" id="userDropdown"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('Home')?>">Home</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('Login/logout')?>">Logout</a>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Home</div>
                    <a class="nav-link <?= ($this->uri->segment(1) == 'admin')? 'active' : ''?>" href="<?= base_url('admin')?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Index
                    </a>
                    <div class="sb-sidenav-menu-heading">Mata pelajaran</div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Materi
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link <?= ($this->uri->segment(1) == 'Mapel')? 'active' : ''?>" href="<?= base_url('Mapel');?>">Mata pelajaran</a>
                            <?php if ($_SESSION['role'] == 'guru') {
                            ?>
                            <a class="nav-link <?= ($this->uri->segment(1) == 'Materi')? 'active' : ''?>" href="<?= base_url('Materi');?>">Materi</a>
                            <a class="nav-link <?= ($this->uri->segment(1) == 'Latihan')? 'active' : ''?>" href="<?= base_url('Latihan');?>">Latihan</a>
                            <?php }?>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">
                        <a class="nav-link <?= ($this->uri->segment(1) == 'guru')? 'active' : ''?>" href="<?= base_url('guru')?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Guru
                        </a>
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?= $_SESSION['nama'];?>
            </div>
        </nav>
    </div>