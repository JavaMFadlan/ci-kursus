    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg overlay2">
        <h3>Profil</h3>
    </div>
    <!-- bradcam_area_end -->
    
    <?php foreach($join as $data){

    }?>

    <!-- about_area_start -->
    <div class="about_area" style="padding: 100px 0 ;">
        <div class="container">
            <div class="row">
                <div class="col-xl-auto col-lg-8">
                <?php if($_SESSION['role'] == 'siswa'){ ?>
                    <div class="single_about_info">
                        <h2>Nama : <?= $pengguna->nama?></h2>
                        <h2>Email : <?= $pengguna->email?></h2>
                        <h2>No.hp : <?= $pengguna->hp?></h2>
                    </div>
                    <a href="<?= base_url('profil/edit-profil/'.$pengguna->id);?>" class="genric-btn primary circle">Update</a>
                    <a href="<?= base_url('profil/delete/'.$pengguna->id);?>" class="genric-btn primary circle">Delete</a>
                    <div class="mt-5">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="">
                                    <tr>
                                        <th>Materi</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                    <span><?= $data['Total']?></span>
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
                                    <span><?= $total_materi->Total_materi-$data['Total']?></span>
                                    <p> Materi Belum Selesai</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
                <?php }
                else {?>
                    <div class="row mb-5">
                        <div class="col-lg-6 col-md-5">
                            <div class="single_about_info ">
                                <h4>Nama : <?= $pengguna->nama?></h4>
                                <h4>Tanggal Lahir : <?= $pengguna->tgl_lahir?></h4>
                                <h4>jenis kelamin : <?= $pengguna->jk?></h4>
                                <h4>pekerjaan : <?= $pengguna->pekerjaan?></h4>
                                <h4>lulusan : <?= $pengguna->lulusan?></h4>
                            </div>
                            <a href="<?= base_url('guru/edit/'.$pengguna->id);?>" class="genric-btn primary circle">Update</a>
                            <a href="<?= base_url('guru/delete/'.$pengguna->id);?>" class="genric-btn primary circle">Delete</a>
                        </div>
                        <!-- table -->
                        <div class="col-lg-6 col-md-8 mt-sm-30">
                            <div class="progress-table-wrap">
                                <div class="progress-table">
                                    <div class="table-head">
                                        <div class="serial">no</div>
                                        <div class="visit">Visits</div>
                                        <div class="percentage">Persen</div>
                                    </div>
                                    <div class="table-row">
                                        <div class="serial">01</div>
                                        <div class="visit">645032</div>
                                        <div class="percentage">
                                            <div class="progress">
                                                <div class="progress-bar color-1" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
                }?>
            </div>
        </div>
    </div>
    <!-- about_area_end -->