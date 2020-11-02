<!-- bagian page konten -->
<div class="courses_details_banner">
        <div class="container">
			<div class="row">
				<div class="mx-auto">
					<div class="course_text text-center">
						<h3>Mengedit Data</h3>
					</div>
				</div>
			</div>
            <div class="card">
            <?php if( $this->session->flashdata('pesan') ) : ?>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data <strong>berhasil</strong> <?= $this->session->flashdata('pesan'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    </div>
                </div>
                <?php endif; ?> 
                <div class="card-body">
					<?php foreach ($materi as $row) { ?>
					<form method="post" action="<?= base_url('materi/edit_aksi');?>">
						<input type="hidden" name="id" value="<?= $row->id; ?>">
						<div class="form-group">
							<label>Nama Pelajaran</label>
							<select class="form-control" name="mapel">
								<?php foreach ($mapel as $data) {?>
									<option value="<?= $data['id'];?>" <?= ($row->id_mapel == $data['id']) ? 'selected': ''?>><?= $data['nama_pel'];?></option>
								<?php }?>
							</select>
						</div>
						<div class="form-group">
							<label>Nama Pelajaran</label>
							<select class="form-control" name="mapel">
									<option value="Beginner" <?= ($row->tingkatan == 'Beginner') ? 'selected': ''?>>Beginner</option>
									<option value="Advanced" <?= ($row->tingkatan == 'Advanced') ? 'selected': ''?>>Advanced</option>
									<option value="Expert" <?= ($row->tingkatan == 'Expert') ? 'selected': ''?>>Expert</option>
							</select>
						</div>
						<div class="form-group">
							<label>Materi</label>
							<input type="text" name="materi" class="form-control" value="<?= $row->nama_materi;?>">
						</div>
						<div class="form-group">
							<label >Deskripsi</label>
							<textarea name="deskripsi" class="ckeditor1" cols="30" rows="10"><?= $row->deskripsi;?></textarea>
							
						</div>
						<button type="submit" class="genric-btn primary ">Update data</button>
						<a href="<?= base_url('materi'); ?>" class="genric-btn danger float-right">Batal/Kembali</a>
					</form>
				</div>
		<?php } ?>
	</div>