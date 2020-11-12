    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg overlay2">
        <h3>Profil</h3>
    </div>
    <!-- bradcam_area_end -->
    <?php
    ini_set('display_errors','off');
    $ds = 0;
    foreach ($trans as $key) {
        if (isset($key)) {
            $ds = 1;
        }
    }
?>

    <!-- about_area_start -->
    <div class="about_area" style="padding: 100px 0 ;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <?php if($_SESSION['role'] == 'siswa' || $login->role == 'siswa'){ ?>
                        <div class="single_about_info">
                            <h4>Nama : <?= $pengguna->nama?></h4>
                            <h4>Email : <?= $pengguna->email?></h4>
                            <h4>No.hp : <?= $pengguna->hp?></h4>
                        </div>
                        <?php if ($_SESSION['role'] != 'admin') {?>
                            <a href="<?= base_url('Pengguna/edit_profil/'.$pengguna->id.'/'.$_SESSION['id']);?>" class="genric-btn primary circle">Update</a>
                            <a href="<?= base_url('profil/delete/'.$pengguna->id);?>" class="genric-btn primary circle">Delete</a>
                        <?php }?>
                        <div class="mt-5">
                            <div class="table-responsive" style="max-height: 300px; overflow-y: auto; display: block;">
                                <table class="table" >
                                    <thead >
                                        <tr>
                                            <th>Materi</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($join as $data){?>
                                        <tr>
                                            <td><?= $data['nama_materi']?></td>
                                            <td><?= $data['nilai']?>/100
                                            <div class="percentage">
                                                    <div class="progress">
                                                        <div class="progress-bar color-1" role="progressbar" style="width: <?= $data['nilai']?>%" aria-valuenow="<?= $data['nilai']?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col"></div>
                    <div class="col-xl-6 offset-xl-1 col-lg-5">
                        <div class="about_tutorials">
                            <div class="courses">
                                <div class="inner_courses">
                                    <div class="text_info">
                                        <span><?= $join_data?></span>
                                        <p> Tugas Selesai</p>
                                    </div>
                                </div>
                            </div>
                            <div class="courses-blue">
                                <div class="inner_courses">
                                    <div class="text_info">
                                        <span><?= $total_materi->Total_materi?></span>
                                        <p> Total Materi</p>
                                    </div>
                                </div>
                            </div>
                            <div class="courses-sky">
                                <div class="inner_courses">
                                    <div class="text_info">
                                        <span><?= $total_materi->Total_materi-$join_data?></span>
                                        <p> Materi Belum Selesai</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($ds == 0 ){?>
                <div class="our_courses">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-lg-6">
                                <div class="single_course text-center">
                                    <div class="icon blue">
                                        <i class="flaticon-business-and-finance"></i>
                                    </div>
                                    <h3>Paket Belajar</h3>
                                    <p>
                                        <form action="<?= base_url('Pengguna/transaksi/'.$pengguna->id);?>" method="post">
                                            <input type="submit" class="genric-btn primary circle" value="submit">
                                        </form>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }
                }
                else {?>
                
                        <div class="col-lg-6 col-md-5">
                            <div class="single_about_info ">
                                <h4>Nama : <?= $pengguna->nama?></h4>
                                <h4>Tanggal Lahir : <?= $pengguna->tgl_lahir?></h4>
                                <h4>jenis kelamin : <?= $pengguna->jk?></h4>
                            </div>
                            <a href="<?= base_url('pengguna/edit_profil/'.$_SESSION['id_user'].'/'.$_SESSION['id']);?>" class="genric-btn primary circle">Update</a>
                            <a href="<?= base_url('guru/delete/'.$pengguna->id);?>" class="genric-btn primary circle">Delete</a>
                        </div>
                        <!-- table -->
                        <div class="col-lg-5    ">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nama Materi</th>
                                            <th>tingkatan</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($materi_guru as $data){?>
                                        <tr>
                                            <td><?= $data['nama_materi']?></td>
                                            <td><?= $data['tingkatan']?></td>
                                            <td><a href="<?= base_url('Materi/show/').$data['id'];?>" class="btn btn-info">Show</a>
                                                <a href="<?= base_url('Materi/edit/').$data['id'];?>" class="btn btn-warning">Edit</a>
                                                <a type="button" class="btn btn-primary float-right login popup-with-form" href="#test-form-<?= $data['id']?>">
                                                    Tambah
                                                </a>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                    <?php   }?>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end -->

<!-- Modal -->
<?php foreach($materi_guru as $data){?>
<div class="modal" id="ModalCenter-<?= $data['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <?php    var_dump($data['id']);?>
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
<?php }?>

<?php foreach($materi_guru as $data){?>
<form id="test-form-<?=$data['id']?>" class="white-popup-block mfp-hide "  action="<?= base_url('Latihan/tambah'); ?>" method="post">
    <div class="popup_box" style="margin-left:30%;">
        <div class="popup_inner">
            <div class="logo text-center">
                    <a href="#">
                        <img src="<?=base_url('assets/edumark/img/form-logo.png')?>" alt="">
                    </a>
                </div>
            <h3>Jumlah</h3>
            <div class="row">
            <input type="hidden" name="id_materi" value="<?= $data['id']?>">
                <div class="col-xl-12 col-md-12">
                    <input type="number" name="jumlah">
                </div>
                <div class="col-xl-12">
                    <button type="submit" class="boxed_btn_orange">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php }?>
