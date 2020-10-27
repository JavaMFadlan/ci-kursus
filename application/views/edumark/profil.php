    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg overlay2">
        <h3>Profil</h3>
    </div>
    <!-- bradcam_area_end -->
    
    <?php foreach($join as $data){

    }?>

    <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="single_about_info">
                        <h2>Nama : <?= $pengguna->nama?></h2>
                        <h2>Email : <?= $pengguna->email?></h2>
                        <h2>No.hp : <?= $pengguna->hp?></h2>
                    </div>
                    <a href="#" class="genric-btn primary circle">Update</a>
                    <a href="#" class="genric-btn primary circle">Delete</a>
                </div>
                <div class="col-xl-6 offset-xl-1 col-lg-6">
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
                                    <p> Materi Belom Selesai</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end -->

    