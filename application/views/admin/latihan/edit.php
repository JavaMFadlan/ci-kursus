<div class="courses_details_banner">
        <div class="container">
			<div class="row">
				<div class="mx-auto">
					<div class="course_text text-center">
						<h3>Mengedit Data</h3>
					</div>
				</div>
			</div>
            <div class="card" style="max-height: 600px; overflow-y: auto;">
            	<?php if( $this->session->flashdata('pesan') ) : ?>
                  <div class="row mt-3">
                    <div class="col-md-6">
                      <div class="alert alert-success alert-dismissible fade show"  
                        role="alert">
                        Data <strong>berhasil</strong> <?= $this->session->flashdata('pesan'); ?>
                        <button type="button" class="close" data-dismiss="alert"  
                         aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    </div>
                  </div>
                <?php endif; ?> 
                  <div class="card-body">
					<form method="post" action="<?= base_url('latihan/edit_aksi');?>">
						<?php
						$no = 0; 
						foreach ($latihan as $row) { 
						$no++;	?>
						<input type="hidden" name="id[]" value="<?= $row['id']; ?>">
						<input type="hidden" name="id_materi[]" value="<?= $row['id_materi']; ?>">
						<br>
						<hr style="border: 1px solid #d1c9c9;">
						<div class="form-group">
							<h4>soal <?= $no?></h4>
							<textarea name="soal[]" class="ckeditor1" cols="30" rows="10"><?= $row['soal']?></textarea>
						</div>
						<div class="form-row">
								<div class="form-group col-md-6">
									<label>Pilihan A</label>
									<input type="text" name="a[]" class="form-control" value="<?= $row['pil_a']; ?>" >
								</div>
								<div class="form-group col-md-6">
									<label>Pilihan B</label>
									<input type="text" name="b[]" class="form-control" value="<?= $row['pil_b']; ?>">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>Pilihan C</label>
									<input type="text" name="c[]" class="form-control" value="<?= $row['pil_c']; ?>">
								</div>
								<div class="form-group col-md-6">
									<label>Pilihan D</label>
									<input type="text" name="d[]" class="form-control" value="<?= $row['pil_d']; ?>">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6 mx-auto">
									<label>Jawaban</label>
									<input type="text" name="jawaban[]" class="form-control" value="<?= $row['jawaban']; ?>">
								</div>
							</div>
							<?php } ?>
					
						<button type="submit" class="genric-btn primary ">Update data</button>
						<a href="<?= base_url('latihan'); ?>" class="genric-btn danger float-right">Batal/Kembali</a>
					</form>
				</div>
			
	</div>