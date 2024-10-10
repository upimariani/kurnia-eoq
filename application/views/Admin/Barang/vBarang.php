<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Barang</h4>
						<p class="card-description">
							Informasi Barang
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
							Tambah Data Barang
						</button>
						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<?= form_open_multipart('Admin/cBarang/create') ?>
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Masukkan Data Barang</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label>Nama Kategori</label>
											<select class="form-control" name="kategori" required>
												<option value="">Pilih Kategori</option>
												<?php
												foreach ($kategori as $key => $value) {
												?>
													<option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
												<?php
												}
												?>
											</select>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label>Nama Barang</label>
													<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Barang" required>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label>Keterangan</label>
													<input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan" required>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label>Harga</label>
													<input type="text" name="harga" class="form-control" placeholder="Masukkan Harga" required>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label>Stok</label>
													<input type="text" name="stok" class="form-control" placeholder="Masukkan Stok" required>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label>Gambar</label>
											<input type="file" name="gambar" class="form-control" placeholder="Masukkan Password" required>
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
										<th>Gambar</th>
										<th>Nama Barang</th>
										<th>Harga</th>
										<th>Stok</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($barang as $key => $value) {
									?>
										<tr>
											<td>
												<img src="<?= base_url('asset/barang/' . $value->gambar) ?>">
											</td>
											<td><?= $value->nama_barang ?><br><small>Kategori: <?= $value->nama_kategori ?></small></td>
											<td>Rp. <?= number_format($value->harga)  ?></td>
											<td><?= $value->stok ?></td>
											<td>
												<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $value->id_barang ?>">
													Perbaharui
												</button>
												<a href="<?= base_url('Admin/cBarang/delete/' . $value->id_barang) ?>" class="btn btn-danger">Hapus</a>
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
	foreach ($barang as $key => $value) {
	?>
		<div class="modal fade" id="edit<?= $value->id_barang ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<?= form_open_multipart('Admin/cBarang/update/' . $value->id_barang) ?>
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Masukkan Data Barang</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Nama Kategori</label>
							<select class="form-control" name="kategori" required>
								<option value="">Pilih Kategori</option>
								<?php
								foreach ($kategori as $key => $item) {
								?>
									<option value="<?= $item->id_kategori ?>" <?php if ($value->id_kategori == $value->id_kategori) {
																					echo 'selected';
																				} ?>><?= $item->nama_kategori ?></option>
								<?php
								}
								?>
							</select>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Nama Barang</label>
									<input type="text" name="nama" value="<?= $value->nama_barang ?>" class="form-control" placeholder="Masukkan Nama Barang" required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Keterangan</label>
									<input type="text" name="keterangan" value="<?= $value->keterangan ?>" class="form-control" placeholder="Masukkan Keterangan" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Harga</label>
									<input type="text" name="harga" value="<?= $value->harga ?>" class="form-control" placeholder="Masukkan Harga" required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Stok</label>
									<input type="text" name="stok" value="<?= $value->stok ?>" class="form-control" placeholder="Masukkan Stok" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Gambar</label>
							<br>
							<img style="width: 200px;" src="<?= base_url('asset/barang/' . $value->gambar) ?>">
							<input type="file" name="gambar" class="form-control" placeholder="Masukkan Password">
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
