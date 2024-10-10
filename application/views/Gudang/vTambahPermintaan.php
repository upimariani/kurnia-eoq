<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">

			<div class="col-lg-5 grid-margin stretch-card">

				<!-- Basic Form Inputs card start -->
				<div class="card">
					<div class="card-header">
						<h5>Masukkan Data Barang</h5>

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
					</div>
					<div class="card-body">
						<h4 class="sub-title">Barang</h4>
						<form class="forms-sample" action="<?= base_url('Gudang/cPermintaan/create') ?>" method="POST">

							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Nama Barang</label>
								<div class="col-sm-10">
									<select id="bahanbaku" name="nama" class="form-control">
										<option value=" ">Pilih Salah Satu Barang</option>
										<?php
										foreach ($bb as $key => $value) {
										?>
											<option data-nama="<?= $value->nama_barang ?>" data-harga="<?= $value->harga ?>" value="<?= $value->id_barang ?>"><?= $value->nama_barang ?></option>
										<?php
										}
										?>

									</select>
									<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Nama</label>
								<div class="col-sm-10">
									<input type="text" name="namabb" class="nama form-control" placeholder="Nama Bahan Baku" readonly>

								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Harga</label>
								<div class="col-sm-10">
									<input type="text" name="harga" class="harga form-control" placeholder="Harga Bahan Baku" readonly>

								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Quantity</label>
								<div class="col-sm-10">
									<input type="number" name="qty" class="form-control" placeholder="Masukkan Data Quantity Pemesanan">
									<?= form_error('qty', '<small class="text-danger">', '</small>') ?>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-outline-success">Simpan</button>
								<a href="<?= base_url('Gudang/cPermintaan') ?>" class="btn btn-outline-danger">Kembali</a>
							</div>
						</form>

					</div>
				</div>

			</div>
			<div class="col-sm-7">
				<div class="card">
					<div class="card-header">
						<h5>Keranjang Bahan Baku</h5>
						<span>Informasi Keranjang Bahan Baku yang akan dipesan</span>
						<div class="card-header-right">
							<ul class="list-unstyled card-option">
								<li><i class="icofont icofont-simple-left "></i></li>
								<li><i class="icofont icofont-maximize full-card"></i></li>
								<li><i class="icofont icofont-minus minimize-card"></i></li>
								<li><i class="icofont icofont-refresh reload-card"></i></li>
								<li><i class="icofont icofont-error close-card"></i></li>
							</ul>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<form action="<?= base_url('Gudang/cPemesanan/pesan') ?>" method="POST">
								<table id="myTable" class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Nama Bahan Baku</th>
											<th>Harga</th>
											<th>Quantity</th>
											<th>Sub Total</th>
											<th>Hapus</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($this->cart->contents() as $key => $value) {
										?>
											<tr>
												<th scope="row"><?= $no++ ?></th>
												<td><?= $value['name'] ?></td>
												<td>Rp. <?= number_format($value['price']) ?></td>
												<td><?= $value['qty'] ?></td>
												<td>Rp. <?= number_format($value['qty'] * $value['price'])  ?></td>
												<td><a href="<?= base_url('Gudang/cPermintaan/delete/' . $value['rowid']) ?>" class="btn btn-danger">Hapus</a></td>
											</tr>
										<?php
										}
										?>
									</tbody>
									<tfoot>
										<th></th>
										<th></th>
										<th></th>
										<th>
											<a href="<?= base_url('Gudang/cPermintaan/pesan') ?>" class="btn btn-outline-success">Selesai</a>
										</th>
										<th>Total</th>
										<th>Rp. <?= number_format($this->cart->total()) ?></th>
									</tfoot>

								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
