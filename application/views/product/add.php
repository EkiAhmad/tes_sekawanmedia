<div class="container">
	<div class="card">
		<div class="card-header">
			Form Product
		</div>
		<div class="card-body">
			<?php 
			if($this->session->flashdata('error') !='')
			{
				echo '<div class="alert alert-danger" role="alert">';
				echo $this->session->flashdata('error');
				echo '</div>';
			}
			?>
			<form method="post" action="<?php echo base_url(); ?>productcontroller/add_process">
				<div class="form-group">
					<label for="name">Nama Kendaraan</label>
					<input type="text" class="form-control" name="nama" id="name" placeholder="Nama Kendaraan">
				</div>
				<div class="form-group">
					<label for="jenis">Jenis</label>
					<input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis Kendaraan">
				</div>
				<div class="form-group">
					<label for="nama">Muatan</label>
					<select name="muatan" class="form-control">
						<option selected disabled>Select Muatan</option>
						<option value="Barang">Barang</option>
						<option value="Orang">Orang</option>
					</select>
				</div>
				<div class="form-group">
					<label for="bbm">BBM</label>
					<input type="number" class="form-control" name="bbm" id="bbm" placeholder="BBM">
				</div>
				<div class="form-group">
					<label for="servis">Servis</label>
					<input type="text" class="form-control" name="servis" id="servis" placeholder="Servis">
				</div>
				<div class="form-group">
					<label for="jumlah_muatan">Jumlah Muatan</label>
					<input type="text" class="form-control" name="jumlah_muatan" id="jumlah_muatan" placeholder="Jumlah Muatan">
				</div>
				<div class="form-group">
					<label for="jumlah_produk">Jumlah Produk</label>
					<input type="text" class="form-control" name="jumlah_produk" id="jumlah_produk" placeholder="Jumlah Produk">
				</div>
				<button type="submit" class="btn btn-primary">Add Data</button>
			</form>
		</div>
		<div class="card-footer text-muted">
			<!-- <i>already have an account?</i><br><br> -->
			<a href="<?php echo base_url(); ?>productcontroller" class="btn btn-success">Back</a>
		</div>
	</div>
</div>