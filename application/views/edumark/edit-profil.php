<?php if ($_SESSION['role'] == 'siswa') {?>
<div class="bradcam_area breadcam_bg overlay2">
    <div class="row">
        <div class="mx-auto" style="margin-bottom : 100px;">
            <div class="course_text">
                <h3>Mengedit Data</h3>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="course_text" >
                        <h2 style="color : #ffffff">Profil</h2>
                    </div>
                </div>
                <div class="col">
                    <div class="course_text" >
                        <h2 style="color : #ffffff">Username</h2>
                    </div>
                </div>
            </div>
                
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col" style="border-right: 2px solid gray;">
                                <form action="<?= base_url('Pengguna/edit_aksi/') ?>" method="POST">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control" id="" value="<?= $pengguna->nama; ?>">
                                    </div>
                                    <input type="hidden" name="id" value="<?= $pengguna->id ?>">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" id="" value="<?= $pengguna->email; ?>">
                                    </div>
                                        <div class="form-group">
                                        <label>No. HP</label>
                                        <input type="text" name="hp" class="form-control" id="" value="<?= $pengguna->hp; ?>">
                                    </div>
                                </div>
                            <div class="col">
                                <div class="form-group" style="margin-top: 70px;">
                                    <input type="text" name="username" class="form-control" value="<?= $login->username; ?>">
                                </div>
                                <input type="hidden" name="id_login" value="<?= $login->id ?>">
                                    <div style="position : absolute; bottom: 10px; width: 90%;">
                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="genric-btn primary float-left">Simpan</button>
                                            </div>
                                            <div class="col">
                                                <a href="<?= base_url('Home/profil/'. $_SESSION['id_user']); ?>" class="genric-btn danger float-right">Batal</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
<?php } elseif($_SESSION['role'] == 'guru'){?>
    <div class="bradcam_area breadcam_bg overlay2">
    <div class="row">
        <div class="mx-auto" style="margin-bottom : 100px;">
            <div class="course_text">
                <h3>Mengedit Data</h3>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="course_text" >
                        <h2 style="color : #ffffff">Profil</h2>
                    </div>
                </div>
                <div class="col">
                    <div class="course_text" >
                        <h2 style="color : #ffffff">Username</h2>
                    </div>
                </div>
            </div>
                
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col" style="border-right: 2px solid gray;">
                                <form action="<?= base_url('Guru/edit_aksi/') ?>" method="POST">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control" id="" value="<?= $pengguna->nama; ?>">
                                    </div>
                                    <input type="hidden" name="id" value="<?= $pengguna->id ?>">
                                    <div class="form-group">
                                        <label>tanggal lahir</label>
                                        <input type="date" name="tgl_lahir" class="form-control" id="" value="<?= $pengguna->tgl_lahir ?>">
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">perempuan
                                            <input type="radio" class="form-check-input" <?= ($pengguna->jk == 'perempuan')? 'checked' : ''?>  name="jk" value="perempuan">
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">laki-laki
                                            <input type="radio" class="form-check-input" <?= ($pengguna->jk == 'laki-laki')? 'checked' : ''?>  name="jk" value="laki-laki">
                                        </label>
                                    </div>
                                </div>
                            <div class="col">
                                <div class="form-group" style="margin-top: 70px;">
                                    <input type="text" name="username" class="form-control" value="<?= $login->username; ?>">
                                </div>
                                <input type="hidden" name="id_login" value="<?= $login->id ?>">
                                    <div style="position : absolute; bottom: 10px; width: 90%;">
                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="genric-btn primary float-left">Simpan</button>
                                            </div>
                                            <div class="col">
                                                <a href="<?= base_url('Home/profil/'. $_SESSION['id_user']); ?>" class="genric-btn danger float-right">Batal</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
<?php }?>