<!-- bagian page konten -->
<div id="layoutSidenav_content">
<main role="main" class="flex-shrink-0">
	<div class="container-fluid">
		<title>Lihat data</title>
            <div class="card">
                <div class="card-header">Lihat Data</div>
                  <div class="card-body">
		<?php foreach ($guru as $row) { ?>
		<form method="post" action="<?= base_url('guru/show_aksi');?>">
			<input type="hidden" name="id" value="<?= $row->id; ?>">
			<div class="form-group">
				<label>Nama </label>
				<input type="text" name="nama" class="form-control" value="<?= $row->nama;?>" readonly>
			</div>
			<div class="form-group">
				<label>Tanggl Lahir</label>
				<input type="date" name="tgl_lahir" class="form-control" value="<?= $row->tgl_lahir;?>" readonly>
			</div>
			<div class="form-group">
				<label for="jk">Jenis Kelamin :</label>
				<?php
				if ($row->jk == 'perempuan')
				{
                
					echo '<input type="radio" checked name="jk" value="perempuan" readonly>  Perempuan';
				
				}
				else {
					echo "laki-laki";
					
				}?>
            </label>
            <label>
                <input type="radio" name="jk" value="laki-laki" readonly>   Laki-laki
           </label>
           </div>
			<a href="<?= base_url('guru'); ?>" class="btn btn-danger">Kembali</a>
		</form>
		<?php } ?>
	</main>
</div>			