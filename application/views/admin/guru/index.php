            <div id="layoutSidenav_content">
                    <div class="card">
                        <div class="card-body">
                            <?php if( $this->session->flashdata('pesan') ) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Data 
                                <strong>berhasil</strong> 
                                <?= $this->session->flashdata('pesan'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                    </div>
                    <?php endif; ?> 
                    <div class="container-fluid">
                        <h1 class="mt-4">Tabel-Guru</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?= base_url('login')?>">Home</a></li>
                            <li class="breadcrumb-item active">Tabel-Guru</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h3>Menambah Data</h3>  
                                    </div>
                                    <div class="col">

                                    </div>
                                    <div class="col">
                                        <a href="<?= base_url('Guru/tambah');?>" class="btn btn-primary float-right">Tambah</a>      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Data
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama </th>
                                                <th>Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($guru as $row) { 
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $no; ?></td>
                                                <td><?= $row->nama; ?></td>
                                                <td><?= $row->tgl_lahir; ?></td>
                                                <td><?= $row->jk; ?></td>
                                                <td>
                                                    <a href="<?= base_url('Home/profil/').$row->id;?>" class="btn btn-info">Show</a>
                                                    <a href="<?= base_url('guru/delete/').$row->id;?>" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>