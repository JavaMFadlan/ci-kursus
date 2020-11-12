
<!-- footer -->
<footer class="footer footer_bg_1" style="margin-top:100px; position:absolute; width:100%;">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="<?= base_url('assets/edumark/img/logo.png" ')?>"alt= "image">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 offset-xl-1 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Pelajaran
                            </h3>
                            <ul>
                            <?php foreach ($materiFooter as $row) {?>
                                <li><a href="<?= base_url('Home/detail_materi/'.$row['id'])?>"><?= $row['nama_materi']?></a></li>
                                <?php                            
                                    }
                                    ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Alamat
                            </h3>
                            <p>
                                Jl. Cibaduyut Raya, Cangkuang Kulon, Kec. Dayeuhkolot, Kota Bandung, Jawa Barat 40265  <br>
                                +62-8122-7714-950 <br>
                                edumark@contact.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer -->
    