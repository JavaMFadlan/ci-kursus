        <!-- bradcam_area_start -->
        <div class="bradcam_area breadcam_bg overlay2">
            <h3>Pelajaran</h3>
        </div>
        <!-- bradcam_area_end -->
        <?php 
        
        $no= 1;
        ini_set('display_errors','off');
        foreach ($mapel as $data) {
            ?>
            <div class="whole-wrap">
                <div class="container box_1170">
                    <div class="section-top-border">
                        <h3 class="mb-30"> <?php echo $no++.".  $data->nama_pel";?></h3>
                            <div class="row">
                            <?php 
                            foreach ($materiFooter as $row) {
                                if($data->id == $row['id_mapel']){
                                    echo '<div class="col-md-4">
                                    <div class="single-defination">
                                    <h4><a href=" '.base_url('Home/detail_materi/'.$row['id']).'"> '.$row['nama_materi'].'</a></h4>
                                        <p> '.$row['deskripsi'].'</p>
                                    </div>
                                </div>';
                                }
                            }?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        <!--end_courses-->

    <!-- our_courses_start -->
    <div class="our_courses">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>Pelajaran kita memiliki</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6 col-lg-6">
                    <div class="single_course text-center">
                        <div class="icon">
                            <i class="flaticon-art-and-design"></i>
                        </div>
                        <h3>Kualitas Premium</h3>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-6">
                    <div class="single_course text-center">
                        <div class="icon blue">
                            <i class="flaticon-business-and-finance"></i>
                        </div>
                        <h3>Mudah Diakses</h3>
                        
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-6">
                    <div class="single_course text-center">
                        <div class="icon">
                            <i class="flaticon-premium"></i>
                        </div>
                        <h3>Mudah Dipahami</h3>
                        
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-6">
                    <div class="single_course text-center">
                        <div class="icon gradient">
                            <i class="flaticon-crown"></i>
                        </div>
                        <h3>Premium Quality</h3>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- our_courses_end -->

    