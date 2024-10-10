<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Pengguna</h4>
						<p class="card-description">
							Informasi Pengguna Sistem
						</p>
						<?php
						if ($this->session->userdata('success')) {
						?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong>Sukses!</strong> <?= $this->session->userdata('success') ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php
						}
						?>

						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
							Tambah Data Pengguna
						</button>
						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<form action="<?= base_url('Admin/cPengguna/create') ?>" method="POST">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Masukkan Data Pengguna</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group">
														<label>Nama Pengguna</label>
														<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Pengguna" required>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group">
														<label>Nomor Telepon</label>
														<input type="text" name="no_hp" class="form-control" placeholder="Masukkan Nomor Telepon" required>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label>Alamat</label>
												<input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" required>
											</div>
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group">
														<label>Username</label>
														<input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group">
														<label>Password</label>
														<input type="text" name="password" class="form-control" placeholder="Masukkan Password" required>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label>Level User</label>
												<select class="form-control" name="level" required>
													<option value="">Pilih Level User</option>
													<option value="1">Admin</option>
													<option value="2">Supplier</option>
													<option value="3">Gudang</option>
													<option value="4">Pemilik</option>
												</select>

											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Save changes</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="table-responsive">
							<table id="myTable" class="table table-striped">
								<thead>
									<tr>
										<th>Nama Pengguna</th>
										<th>Alamat</th>
										<th>Nomor Telepon</th>
										<th>Akun</th>
										<th>Level User</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($pengguna as $key => $value) {
									?>
										<tr>
											<td><?= $value->nama_pengguna ?></td>
											<td><?= $value->alamat ?></td>
											<td><?= $value->no_hp ?></td>
											<td><span class="badge badge-success"><?= $value->username ?></span> <span class="badge badge-danger"><?= $value->password ?></span></td>
											<td><?php
												if ($value->level_user == '1') {
												?>
													<span class="badge badge-success">Admin</span>
												<?php
												} else if ($value->level_user == '2') {
												?>
													<span class="badge badge-danger">Supplier</span>
												<?php
												} else if ($value->level_user == '3') {
												?>
													<span class="badge badge-warning">Gudang</span>
												<?php
												} else if ($value->level_user == '4') {
												?>
													<span class="badge badge-info">Pemilik</span>
												<?php
												}
												?>
											</td>
											<td>
												<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $value->id_pengguna ?>">
													Perbaharui
												</button>
												<a href="<?= base_url('Admin/cPengguna/delete/' . $value->id_pengguna) ?>" class="btn btn-danger">Hapus</a>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	foreach ($pengguna as $key => $value) {
	?>
		<div class="modal fade" id="edit<?= $value->id_pengguna ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<form action="<?= base_url('Admin/cPengguna/update/' . $value->id_pengguna) ?>" method="POST">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Masukkan Data Pengguna</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Nama Pengguna</label>
										<input type="text" name="nama" value="<?= $value->nama_pengguna ?>" class="form-control" placeholder="Masukkan Nama Pengguna" required>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Nomor Telepon</label>
										<input type="text" name="no_hp" value="<?= $value->no_hp ?>" class="form-control" placeholder="Masukkan Nomor Telepon" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<input type="text" name="alamat" class="form-control" value="<?= $value->alamat ?>" placeholder="Masukkan Alamat" required>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Username</label>
										<input type="text" name="username" value="<?= $value->username ?>" class="form-control" placeholder="Masukkan Username" required>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Password</label>
										<input type="text" name="password" value="<?= $value->password ?>" class="form-control" placeholder="Masukkan Password" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Level User</label>
								<select class="form-control" name="level" required>
									<option value="">Pilih Level User</option>
									<option value="1" <?php if ($value->level_user == '1') {
															echo 'selected';
														} ?>>Admin</option>
									<option value="2" <?php if ($value->level_user == '2') {
															echo 'selected';
														} ?>>Supplier</option>
									<option value="3" <?php if ($value->level_user == '3') {
															echo 'selected';
														} ?>>Gudang</option>
									<option value="4" <?php if ($value->level_user == '4') {
															echo 'selected';
														} ?>>Pemilik</option>
								</select>

							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	<?php
	}
	?>
