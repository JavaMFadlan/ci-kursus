<div class="courses_details_banner">
        <div class="container">
			<div class="row">
				<div class="mx-auto">
					<div class="course_text text-center">
						<h3>Menambah Data</h3>
					</div>
				</div>
			</div>
			<form method="post" action="<?= base_url('Latihan/tambah_aksi');?>">
			<input type="hidden" name="jumlah" value="<?= $jumlah?>">
			<?php for ($i=1; $i <= $jumlah ; $i++) { ?>
			<input type="hidden" name="id_materi[]" value="<?= $id_materi?>">
				<div class="card" style="max-height: 600px; overflow-y: auto;">
					<div class="card-body">
						<!-- form tambah guru-->
							<div class="form-group">
								<h3>soal</h3>
								<textarea name="soal[]" class="ckeditor1" cols="30" rows="5"></textarea>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>Pilihan A</label>
									<input type="text" name="a[]" class="form-control" >
								</div>
								<div class="form-group col-md-6">
									<label>Pilihan B</label>
									<input type="text" name="b[]" class="form-control">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>Pilihan C</label>
									<input type="text" name="c[]" class="form-control" >
								</div>
								<div class="form-group col-md-6">
									<label>Pilihan D</label>
									<input type="text" name="d[]" class="form-control">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6 mx-auto">
									<label>Jawaban</label>
									<input type="text" name="jawaban[]" class="form-control" >
								</div>
							</div>
						</div>
					</div>
					<?php }?>
					<div class="card-footer">
						<button type="submit" class="genric-btn primary">Simpan</button>
						<a href="<?= base_url('Latihan'); ?>" class="genric-btn danger float-right">Batal</a>
					</div>
				</form>
			</div>
</div>