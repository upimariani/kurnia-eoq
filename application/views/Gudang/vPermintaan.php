<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Permintaan Barang</h4>
						<p class="card-description">
							Informasi Permintaan Barang
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
						<a href="<?= base_url('Gudang/cPermintaan/create') ?>" class="btn btn-warning mb-3">
							Tambah Permintaan
						</a>

						<div class="accordion" id="accordionExample">
							<div class="card">
								<div class="card-header" id="headingOne">
									<h2 class="mb-0">
										<button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											Belum Bayar
										</button>
									</h2>
								</div>

								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
									<div class="card-body">
										<table class="permintaan table">
											<thead>
												<tr>
													<th>#</th>
													<th>Tanggal</th>
													<th>Total Pembayaran</th>
													<th>Status Pemesanan</th>
													<th>Pemesanan Bahan Baku</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no = 1;
												foreach ($pemesanan as $key => $value) {
													if ($value->status == '0') {
												?>

														<tr>
															<th scope="row"><?= $no++ ?></th>
															<td><?= $value->tgl ?></td>
															<td>Rp. <?= number_format($value->total_bayar) ?></td>
															<td><?php
																if ($value->status == '0') {
																?>
																	<span class="badge badge-danger">Belum Bayar</span>
																<?php
																} else if ($value->status == '1') {
																?>
																	<span class="badge badge-warning">Menunggu Konfirmasi</span>
																<?php
																} else if ($value->status == '2') {
																?>
																	<span class="badge badge-info">Pesanan Dikirim</span>
																<?php
																} else if ($value->status == '3') {
																?>
																	<span class="badge badge-success">Selesai</span>
																<?php
																}
																?>
															</td>
															<?php
															$dt_barang = $this->db->query("SELECT * FROM `permintaan` JOIN barang_permintaan ON permintaan.id_permintaan=barang_permintaan.id_permintaan JOIN barang ON barang.id_barang=barang_permintaan.id_barang WHERE permintaan.id_permintaan='" . $value->id_permintaan . "'")->result();
															?>
															<td><?php foreach ($dt_barang as $key => $value) {
																	echo $value->nama_barang . ' | Qty.' . $value->jumlah . '<br>';
																} ?></td>
															<td>
																<?= form_open_multipart('Gudang/cPermintaan/bayar/' . $value->id_permintaan) ?>
																<input type="file" class="form-control" name="bayar">
																<button type="submit" class="btn btn-outline-success btn-sm">Bayar</button>
																</form>
															</td>
														</tr>
												<?php
													}
												} ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingTwo">
									<h2 class="mb-0">
										<button class="btn btn-warning collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											Menunggu Konfirmasi
										</button>
									</h2>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
									<div class="card-body">
										<table class="permintaan table">
											<thead>
												<tr>
													<th>#</th>
													<th>Tanggal</th>
													<th>Total Pembayaran</th>
													<th>Status Pemesanan</th>
													<th>Pemesanan Bahan Baku</th>

												</tr>
											</thead>
											<tbody>
												<?php
												$no = 1;
												foreach ($pemesanan as $key => $value) {
													if ($value->status == '1') {
												?>

														<tr>
															<th scope="row"><?= $no++ ?></th>
															<td><?= $value->tgl ?></td>
															<td>Rp. <?= number_format($value->total_bayar) ?></td>
															<td><?php
																if ($value->status == '0') {
																?>
																	<span class="badge badge-danger">Belum Bayar</span>
																<?php
																} else if ($value->status == '1') {
																?>
																	<span class="badge badge-warning">Menunggu Konfirmasi</span>
																<?php
																} else if ($value->status == '2') {
																?>
																	<span class="badge badge-info">Pesanan Dikirim</span>
																<?php
																} else if ($value->status == '3') {
																?>
																	<span class="badge badge-success">Selesai</span>
																<?php
																}
																?>
															</td>
															<?php
															$dt_barang = $this->db->query("SELECT * FROM `permintaan` JOIN barang_permintaan ON permintaan.id_permintaan=barang_permintaan.id_permintaan JOIN barang ON barang.id_barang=barang_permintaan.id_barang WHERE permintaan.id_permintaan='" . $value->id_permintaan . "'")->result();
															?>
															<td><?php foreach ($dt_barang as $key => $value) {
																	echo $value->nama_barang . ' | Qty.' . $value->jumlah . '<br>';
																} ?></td>

														</tr>
												<?php
													}
												} ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingThree">
									<h2 class="mb-0">
										<button class="btn btn-info collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											Pesanan Dikirim
										</button>
									</h2>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
									<div class="card-body">
										<table class="permintaan table">
											<thead>
												<tr>
													<th>#</th>
													<th>Tanggal</th>
													<th>Total Pembayaran</th>
													<th>Status Pemesanan</th>
													<th>Pemesanan Bahan Baku</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no = 1;
												foreach ($pemesanan as $key => $value) {
													if ($value->status == '2') {
												?>

														<tr>
															<th scope="row"><?= $no++ ?></th>
															<td><?= $value->tgl ?></td>
															<td>Rp. <?= number_format($value->total_bayar) ?></td>
															<td><?php
																if ($value->status == '0') {
																?>
																	<span class="badge badge-danger">Belum Bayar</span>
																<?php
																} else if ($value->status == '1') {
																?>
																	<span class="badge badge-warning">Menunggu Konfirmasi</span>
																<?php
																} else if ($value->status == '2') {
																?>
																	<span class="badge badge-info">Pesanan Dikirim</span>
																<?php
																} else if ($value->status == '3') {
																?>
																	<span class="badge badge-success">Selesai</span>
																<?php
																}
																?>
															</td>
															<?php
															$dt_barang = $this->db->query("SELECT * FROM `permintaan` JOIN barang_permintaan ON permintaan.id_permintaan=barang_permintaan.id_permintaan JOIN barang ON barang.id_barang=barang_permintaan.id_barang WHERE permintaan.id_permintaan='" . $value->id_permintaan . "'")->result();
															?>
															<td><?php foreach ($dt_barang as $key => $value) {
																	echo $value->nama_barang . ' | Qty.' . $value->jumlah . '<br>';
																} ?></td>
															<td><a href="<?= base_url('Gudang/cPermintaan/diterima/' . $value->id_permintaan) ?>" class="btn btn-info">Pesanan Diterima</a></td>
														</tr>
												<?php
													}
												} ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingFour">
									<h2 class="mb-0">
										<button class="btn btn-success collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
											Pesanan Selesai
										</button>
									</h2>
								</div>
								<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
									<div class="card-body">
										<table class="permintaan table">
											<thead>
												<tr>
													<th>#</th>
													<th>Tanggal</th>
													<th>Total Pembayaran</th>
													<th>Status Pemesanan</th>
													<th>Pemesanan Bahan Baku</th>

												</tr>
											</thead>
											<tbody>
												<?php
												$no = 1;
												foreach ($pemesanan as $key => $value) {
													if ($value->status == '3') {
												?>

														<tr>
															<th scope="row"><?= $no++ ?></th>
															<td><?= $value->tgl ?></td>
															<td>Rp. <?= number_format($value->total_bayar) ?></td>
															<td><?php
																if ($value->status == '0') {
																?>
																	<span class="badge badge-danger">Belum Bayar</span>
																<?php
																} else if ($value->status == '1') {
																?>
																	<span class="badge badge-warning">Menunggu Konfirmasi</span>
																<?php
																} else if ($value->status == '2') {
																?>
																	<span class="badge badge-info">Pesanan Dikirim</span>
																<?php
																} else if ($value->status == '3') {
																?>
																	<span class="badge badge-success">Selesai</span>
																<?php
																}
																?>
															</td>
															<?php
															$dt_barang = $this->db->query("SELECT * FROM `permintaan` JOIN barang_permintaan ON permintaan.id_permintaan=barang_permintaan.id_permintaan JOIN barang ON barang.id_barang=barang_permintaan.id_barang WHERE permintaan.id_permintaan='" . $value->id_permintaan . "'")->result();
															?>
															<td><?php foreach ($dt_barang as $key => $value) {
																	echo $value->nama_barang . ' | Qty.' . $value->jumlah . '<br>';
																} ?></td>

														</tr>
												<?php
													}
												} ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
