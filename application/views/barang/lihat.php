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
			<div id="content" data-url="<?= base_url('barang') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
						</div>
						<div class="float-right">
							<?php if ($this->session->login['role'] == 'admin') : ?>
								<a href="<?= base_url('barang/export') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
								<a href="<?= base_url('barang/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
							<?php endif ?>
						</div>
					</div>
					<hr>
					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('success') ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php elseif ($this->session->flashdata('error')) : ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('error') ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif ?>
					<div class="container">
						<div class="row" data-aos="zoom-in-down">
							<div class="row row-cols-1 row-cols-md-4 mb-3 text-center">
								<?php foreach ($all_barang as $barang) : ?>
									<div class="col">
										<div class="card mb-4 rounded-3 shadow-sm">
											<div class="card-header py-3 text-light " style="background-color: #9b0060;">
												<h4 class="my-0 fw-normal"><?= $barang->nama_barang ?></h4>
											</div>
											<div class="card-body">
												<h1 class="card-title pricing-card-title">Rp <?= $barang->harga ?></h1>
												<ul class="list-unstyled mt-3 mb-4">
													<li><?= $barang->deskripsi ?></li>
													<li><?= $barang->deskripsi2 ?></li>
													<li><?= $barang->deskripsi3 ?></li>
													<li><?= $barang->deskripsi4 ?></li>
													<li><?= $barang->deskripsi5 ?></li>
													<li><?= $barang->deskripsi6 ?></li>
												</ul>

												<a href="<?= base_url('barang/ubah/' . $barang->kode_barang) ?>" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
												<a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('barang/hapus/' . $barang->kode_barang) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Hapus</button></a>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- load footer -->
			<?php $this->load->view('partials/footer.php') ?>
		</div>
	</div>
	<?php $this->load->view('partials/js.php') ?>
	<script src="<?= base_url('sb-admin/js/demo/datatables-demo.js') ?>"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>