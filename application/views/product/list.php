<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
	<h1 class="h2">Product</h1>
		<div class="btn-toolbar mb-2 mb-md-0">
			<div class="btn-group mr-2">
				<!-- <button class="btn btn-sm btn-outline-secondary">Share</button> -->
				<button class="btn btn-sm btn-outline-secondary">Export</button>
			</div>
			<!-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
				<span data-feather="calendar"></span>
				This week
			</button> -->
		</div>
	</div>
  <a href="<?php echo base_url(); ?>productcontroller/add" class="btn btn-primary float-right">Add Product</a><br>
	<h4>Data Product</h4>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Kendaraan</th>
                  <th>Jenis Kendaraan</th>
                  <th>Muatan</th>
                  <th>BBM</th>
                  <th>Servis</th>
                  <th>Jumlah Muatan</th>
                  <th>Jumlah Produk</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1 ?>
                <?php foreach ($result_array as $row): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $row['nama'] ?></td>
                  <td><?= $row['jenis'] ?></td>
                  <td><?= $row['muatan'] ?></td>
                  <td><?= $row['bbm'] ?> Liter</td>
                  <td><?= $row['servis'] ?></td>
                  <td><?= $row['jumlah_muatan'] ?></td>
                  <td><?= $row['jumlah_produk'] ?></td>
                  <td><?= $row['status'] ?></td>
                  <td>
                    <a href="<?php echo base_url(); ?>productcontroller/edit/<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
                    <a href="<?php echo base_url(); ?>productcontroller/delete/<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>