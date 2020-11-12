<!-- bagian page konten -->
<div class="courses_details_banner" style ="padding-bottom: 500px;">
	<div class="container">
		<div class="row">
			<div class="mx-auto">
				<div class="course_text text-center">
					<h3>Mengedit Data</h3>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
			<?php foreach ($materi as $row) { ?>
				<form method="post" action="<?= base_url('materi/show_aksi');?>">
					<input type="hidden" name="id" value="<?= $row->id; ?>">
					<div class="form-group">
						<label>Nama Pelajaran</label>
						<select class="form-control" name="mapel" disabled>
							<?php foreach ($mapel as $data) {
								if($data->id == $row->id){?>
								<option value="<?= $data->id;?>" selected><?= $data->nama_pel;?></option>
								<?php }?>
								<option value="<?= $data->id;?>"><?= $data->nama_pel;?></option>
							<?php }?>
						</select>
					</div>
					<div class="form-group">
						<label>Materi</label>
						<input type="text" class="form-control" value="<?= $row->nama_materi;?>" readonly>
					</div>
					<div class="form-group">
						<label >Deskripsi</label>
						<?= $row->deskripsi;?>
					</div>
					<a href="<?= base_url('home/profil/'.$_SESSION['id_user']); ?>" class="btn btn-danger float-right">Kembali</a>
				</form>
			</div>
		</div>
		<?php } ?>
	</div>			
</div>			