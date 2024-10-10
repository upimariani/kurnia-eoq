<footer class="footer">
	<div class="d-sm-flex justify-content-center justify-content-sm-between">
		<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">KURNIA TELUR - METODE ECONOMIC ORDER QUANTITY (EOQ)</span>
		<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">ALDI & made with <i class="mdi mdi-heart text-danger"></i></span>
	</div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="<?= base_url('asset/majestic-master/') ?>vendors/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="<?= base_url('asset/majestic-master/') ?>vendors/chart.js/Chart.min.js"></script>
<script src="<?= base_url('asset/majestic-master/') ?>vendors/datatables.net/jquery.dataTables.js"></script>
<script src="<?= base_url('asset/majestic-master/') ?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?= base_url('asset/majestic-master/') ?>js/off-canvas.js"></script>
<script src="<?= base_url('asset/majestic-master/') ?>js/hoverable-collapse.js"></script>
<script src="<?= base_url('asset/majestic-master/') ?>js/template.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?= base_url('asset/majestic-master/') ?>js/dashboard.js"></script>
<script src="<?= base_url('asset/majestic-master/') ?>js/data-table.js"></script>
<script src="<?= base_url('asset/majestic-master/') ?>js/jquery.dataTables.js"></script>
<script src="<?= base_url('asset/majestic-master/') ?>js/dataTables.bootstrap4.js"></script>
<!-- End custom js for this page-->
<link href="<?= base_url('asset/') ?>DataTables/datatables.min.css" rel="stylesheet">

<script src="<?= base_url('asset/') ?>DataTables/datatables.min.js"></script>
<script>
	$('#myTable').DataTable({
		select: true
	});
	$('.permintaan').DataTable({
		select: true
	});
</script>
<script>
	console.log = function() {}
	$("#bahanbaku").on('change', function() {

		$(".harga").html($(this).find(':selected').attr('data-harga'));
		$(".harga").val($(this).find(':selected').attr('data-harga'));

		$(".nama").html($(this).find(':selected').attr('data-nama'));
		$(".nama").val($(this).find(':selected').attr('data-nama'));

	});
</script>
<script type="text/javascript">
	$(document).ready(function() {

		$('#barang').change(function() {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo site_url('Gudang/cAnalisis/get_periode_permintaan'); ?>",
				method: "POST",
				data: {
					id: id
				},
				async: true,
				dataType: 'json',
				success: function(data) {

					var html = '<option value="">Pilih Periode Permintaan Barang</option>';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<option data-frequensi=' + data[i].frequensi + ' data-jumlah=' + data[i].jml + ' value=' + data[i].periode + '>' + data[i].periode + '</option>';
					}
					$('#periode').html(html);
				}
			});
			return false;
		});
	});
</script>
<script>
	console.log = function() {}
	$("#periode").on('change', function() {

		$(".jumlah").html($(this).find(':selected').attr('data-jumlah'));
		$(".jumlah").val($(this).find(':selected').attr('data-jumlah'));

		$(".frequensi").html($(this).find(':selected').attr('data-frequensi'));
		$(".frequensi").val($(this).find(':selected').attr('data-frequensi'));

	});
</script>
</body>

</html>
