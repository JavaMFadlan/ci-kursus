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
                        <h1 class="mt-4">Tabel-Latihan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?= base_url('login')?>">Home</a></li>
                            <li class="breadcrumb-item active">Tabel-Latihan</li>
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
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">
                                            Tambah
                                        </button>     
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
                                                <th>Nama Materi</th>
                                                <th>Jumlah Soal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($latihan as $row) {
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $no; ?></td>
                                                <td><?= $row['nama_materi']; ?></td>
                                                <td><?= $row['Total'] ?></td>
                                                <td>
                                                    <a href="<?= base_url().'Latihan/show/'.$row['id_materi'];?>" class="btn btn-info">Show</a>
                                                    <a href="<?= base_url('Latihan/edit/').$row['id_materi'];?>" class="btn btn-warning">Edit</a>
                                                    <a href="<?= base_url('Latihan/delete/').$row['id'];?>" class="btn btn-danger">Delete</a>
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



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="<?= base_url('Latihan/tambah');?>" method="post">
                <div class="form-group">
                        <label>Nama materi</label>
                            <select class="form-control" name="id_materi">
                            <?php foreach ($materi as $data) {?>
                                <option value="<?= $data['id'];?>"><?= $data['nama_materi'];?></option>
                            <?php }?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label >Jumlah soal</label>
                        <input type="number" name="jumlah" class="form-control py-2">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>