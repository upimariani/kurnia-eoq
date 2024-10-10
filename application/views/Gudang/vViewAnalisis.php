<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
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


						<div class="table-responsive">
							<table id="myTable" class="table table-striped">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Barang</th>
										<th>Jumlah Permintaan /bulan</th>
										<th>Biaya Pemesanan</th>
										<th>Biaya Penyimpanan</th>
										<th>Hari Aktif</th>
										<th>Lead Time</th>
										<th>EOQ</th>
										<th>ROP</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($barang as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?>.</td>
											<td><?= $value->nama_barang ?></td>
											<td><?= $value->dt_jml_permintaan ?> <?= $value->keterangan ?></td>
											<td>Rp. <?= number_format($value->biaya_pemesanan)  ?></td>
											<td>Rp. <?= number_format($value->biaya_penyimpanan) ?></td>
											<td><?= $value->hari_aktif ?> hari</td>
											<td><?= $value->lead_time ?></td>
											<td><?= $value->eoq ?> <?= $value->keterangan ?></td>
											<td><?= $value->rop ?> <?= $value->keterangan ?></td>
											<td><a class="btn btn-danger" href="<?= base_url('Gudang/cAnalisis/hapus/' . $value->id_analisis) ?>">Hapus</a></td>
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
