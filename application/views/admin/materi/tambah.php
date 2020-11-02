<div class="courses_details_banner">
        <div class="container">
            <div class="row">
                <div class="mx-auto">
                    <div class="course_text text-center">
                        <h3>Menambah Data</h3>
                    </div>
                </div>
				
            </div>
			<form method="post" action="<?= base_url('Materi/tambah_aksi');?>">
				<div class="card">
					<div class="card-body">
						<!-- form tambah guru-->
							<div class="form-group">
								<label>Nama pelajaran</label>
								<select class="form-control" name="mapel">
								<?php foreach ($mapel as $data) {?>
									<option value="<?= $data->id;?>"><?= $data->nama_pel;?></option>
								<?php }?>
								</select>
							</div>
							<div class="form-group">
								<label>Tingkatan</label>
								<select class="form-control" name="tingkatan">
									<option value="Beginner">Beginner</option>
									<option value="Advanced">Advanced</option>
									<option value="Expert">Expert</option>
								</select>
							</div>
							<div class="form-group">
								<label >Materi</label>
								<input type="text" name="materi" placeholder="materi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required class="single-input">
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<textarea name="deskripsi" class="ckeditor1" cols="30" rows="10"></textarea>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="genric-btn primary m-5">Simpan</button>
						<a href="<?= base_url('profil'); ?>" class="genric-btn danger float-right m-5">Batal</a>
					</div>
				</form>
        </div>
    </div>
	