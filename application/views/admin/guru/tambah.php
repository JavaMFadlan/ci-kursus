<div id="layoutSidenav_content">
	<main role="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col">
					<h3>Menambah Data</h3>  
				</div>
			</div>
			<form method="post" action="<?= base_url('guru/tambah_aksi');?>">
				<div class="card">
					<div class="card-body">
						<!-- form tambah guru-->
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="nama" class="form-control py-2" >
							</div>
							<div class="form-group">
								<label for="">Tanggal Lahir</label>
								<input type="date" name="tgl_lahir" class="form-control py-2">
							</div>
							<div class="form-group">
								<label for="jk">Jenis Kelamin :</label>
								<label>
								<input type="radio" name="jk" value="perempuan" >  Perempuan
								</label>
								<label>
								<input type="radio" name="jk" value="laki-laki">   Laki-laki
								</label>
							</div>
								<input type="hidden" name="role" value="guru">
						</div>
					</div>
					<div class="row mt-3">
						<div class="col">
							<h3>User login</h3>  
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="form-group">
								<label>Username</label>
								<input class="form-control py-2" name="user" type="text" placeholder="masukan username" />
							</div>
							<div class="form-group">
								<label>email</label>
								<input class="form-control py-2" name="email" type="email" placeholder="masukan alamat email" />
							</div>
							<div class="form-group">
								<label>Password</label>
								<input class="form-control py-2" name="pass" type="password" placeholder="masukan password" />
							</div>
							<button type="submit" class="btn btn-primary">Simpan</button>
							<a href="<?= base_url('guru'); ?>" class="btn btn-danger">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</main>
</div>