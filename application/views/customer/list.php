<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
	<h1 class="h2">Customer</h1>
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
	<h4>Data Customer</h4>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1 ?>
                <?php foreach ($result_array as $row): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $row['name'] ?></td>
                  <td><?= $row['email'] ?></td>
                  <td><?= ($row['role'] == 0) ? 'Admin' : (($row['role'] == 1) ? 'Approval' : 'User') ?></td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>