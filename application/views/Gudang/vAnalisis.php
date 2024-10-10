<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-6 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Analisis Barang - Metode Economic Order Quantity</h4>
						<p class="card-description">
							Informasi Analisis Barang
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
							Tambah Analisis Barang
						</button>
						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<?= form_open_multipart('Gudang/cAnalisis/hitung') ?>
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Masukkan Data Analisis Barang</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<h6 class="text-info">Variabel Perhitungan Metode EOQ</h6>
										<hr>
										<div class="form-group">
											<label>Nama Barang <span class="text-danger">*</span></label>
											<select id="barang" name="id_barang" class="form-control" required>
												<option>Pilih Barang</option>
												<?php
												$dt_barang = $this->db->query("SELECT * FROM `permintaan` JOIN barang_permintaan ON permintaan.id_permintaan=barang_permintaan.id_permintaan JOIN barang ON barang.id_barang=barang_permintaan.id_barang GROUP BY barang.id_barang")->result();
												foreach ($dt_barang as $key => $value) {
												?>
													<option value="<?= $value->id_barang ?>"><?= $value->nama_barang ?></option>
												<?php
												}
												?>
											</select>
										</div>
										<div class="form-group">
											<label>Periode Permintaan Barang <span class="text-danger">*</span></label>
											<select class="form-control" name="periode" id="periode" required>

											</select>
										</div>
										<hr>
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label>Jumlah Permintaan Barang</label>
													<input class="jumlah form-control" type="text" name="jml_permintaan" readonly>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label>Frequensi</label>
													<input class="frequensi form-control" type="text" name="frequensi" readonly>
												</div>
											</div>
										</div>

										<hr>
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label>Biaya Pemesanan per Bulan</label>
													<input class="form-control" type="text" name="biaya_pemesanan" placeholder="Masukkan Biaya Pemesanan" required>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label>Biaya Penyimpanan per Bulan</label>
													<input class="form-control" type="text" name="biaya_penyimpanan" placeholder="Masukkan Biaya Penyimpanan" required>
												</div>
											</div>
										</div>
										<hr>
										<h6 class="text-info">Variabel Perhitungan Reorder Point</h6>
										<hr>
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label>Lead Time</label>
													<input class="form-control" type="text" name="lead_time" placeholder="Masukkan Lead Time" required>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label>Hari Aktif</label>
													<input class="form-control" type="text" name="hari_aktif" placeholder="Masukkan Hari Aktif" required>
												</div>
											</div>
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
										<th>No.</th>
										<th>Nama Barang</th>

										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($barang as $key => $value) {
									?>
										<tr>
											<td>
												<?= $no++ ?>
											</td>
											<td><?= $value->nama_barang ?></td>
											<td>

												<a href="<?= base_url('Gudang/cAnalisis/view/' . $value->id_barang) ?>" class="btn btn-danger">View Analisis</a>
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
