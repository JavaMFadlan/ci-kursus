<!-- bagian page konten -->
<div id="layoutSidenav_content">
<main role="main" class="flex-shrink-0">
	<div class="container-fluid">
		<title>Edit Data</title>
            <div class="card">
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
                <div class="card-header">Edit Data</div>
                  <div class="card-body">
		<?php foreach ($guru as $row) { ?>
		<form method="post" action="<?= base_url('guru/edit_aksi');?>">
			<input type="hidden" name="id" value="<?= $row->id; ?>">
			<input type="hidden" name="id_login" value="<?= $row->id_login; ?>">
			<input type="hidden" name="role" value="<?= $row->role; ?>">
			<div class="form-group">
				<label>Nama </label>
				<input type="text" name="nama" class="form-control" value="<?= $row->nama;?>">
			</div>
			<div class="form-group">
				<label>Tanggl Lahir</label>
				<input type="date" name="tgl_lahir" class="form-control" value="<?= $row->tgl_lahir;?>">
			</div>
			<div class="form-group">
				<label for="jk">Jenis Kelamin :</label>
				<?php
				if ($row->jk == 'perempuan')
				{
                
					echo '<input type="radio" checked name="jk" value="perempuan" >  Perempuan';
					echo '<input type="radio" name="jk" value="laki-laki" > laki-laki';
				
				}
				else {
					echo '<input type="radio" checked name="jk" value="laki-laki" > laki-laki';
					echo '<input type="radio" name="jk" value="perempuan" > perempuan';
					
				}?>
           </label>
           </div>
			<button type="submit" class="btn btn-primary">Update data</button>
			<a href="<?= base_url('guru'); ?>" class="btn btn-danger">Batal/Kembali</a>
		</form>
		<?php } ?>
	</div>
</main>