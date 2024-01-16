<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
	<div id="wrapper">
		<!-- load sidebar -->
		<?php $this->load->view('partials/sidebar.php') ?>

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('penerimaan') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">

					<hr>

					<div class="card shadow">
						<div class="card-body">

							<table class="table">
								<thead>
									<tr>
										<th>Product Name</th>
										<th>Product Name</th>
										<th>Tanggal</th>
										<th>Jam</th>
										<th>Harga</th>
										<th>status</th>
										<!-- Add more columns as needed -->
									</tr>
								</thead>
								<tbody>
									<?php
									$total_price = 0;
									foreach ($order_detail_admin as $order_item) : ?>
										<tr>
											<td><?= $order_item->nama ?></td>
											<td><?= $order_item->nama_barang ?></td>
											<td><?= $order_item->selected_date ?></td>
											<td><?= $order_item->selected_time ?></td>
											<td><?= $order_item->price ?></td>
											<td><?= $order_item->status ?></td>

											<!-- Add more columns as needed -->
										</tr>
									<?php
										// Calculate total price if needed
										$total_price += $order_item->price;
									endforeach; ?>
								</tbody>
							</table>

							<!-- <div class="mt-3 text-end">
								<h5>Total Harga: Rp <?= number_format($total_price, 0, ',', '.') ?></h5>
							</div> -->

						</div>

						<?php $this->load->view('partials/js.php') ?>
						<script src="<?= base_url('sb-admin/js/demo/datatables-demo.js') ?>"></script>
						<script src="<?= base_url('sb-admin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
						<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>