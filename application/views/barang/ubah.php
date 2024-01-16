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
							<a href="<?= base_url('barang') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<div class="card shadow">
								<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
								<div class="card-body">
									<form action="<?= base_url('barang/proses_ubah/' . $barang->kode_barang) ?>" id="form-tambah" method="POST">
										<div class="container">
											<div class="row" data-aos="zoom-in-down">
												<div class="col">
													<div class="card mb-4 rounded-3 shadow-sm">
														<div class="card-header py-3 text-light" style="background-color: #9b0060;">
															<h4 class="my-0 fw-normal">Edit Barang</h4>
														</div>
														<div class="card-body">
															<form action="<?= base_url('barang/proses_ubah/' . $barang->kode_barang) ?>" method="post" enctype="multipart/form-data">
																<div class="mb-3">
																	<label for="nama_barang" class="form-label">Nama Barang</label>
																	<input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $barang->nama_barang ?>" required>
																</div>
																<div class="mb-3">
																	<label for="harga" class="form-label">Harga</label>
																	<input type="text" class="form-control" id="harga" name="harga" value="<?= $barang->harga ?>" required>
																</div>
																<div class="mb-3">
																	<label for="deskripsi" class="form-label">Deskripsi</label>
																	<input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $barang->deskripsi ?>">
																</div>

																<div class="mb-3">
																	<label for="deskripsi" class="form-label">Deskripsi</label>
																	<input type="text" class="form-control" id="deskripsi" name="deskripsi2" value="<?= $barang->deskripsi2 ?>">
																</div>
																<div class="mb-3">
																	<label for="deskripsi" class="form-label">Deskripsi</label>
																	<input type="text" class="form-control" id="deskripsi" name="deskripsi3" value="<?= $barang->deskripsi3 ?>">
																</div>
																<div class="mb-3">
																	<label for="deskripsi" class="form-label">Deskripsi</label>
																	<input type="text" class="form-control" id="deskripsi" name="deskripsi4" value="<?= $barang->deskripsi4 ?>">
																</div>
																<div class="mb-3">
																	<label for="deskripsi" class="form-label">Deskripsi</label>
																	<input type="text" class="form-control" id="deskripsi" name="deskripsi5" value="<?= $barang->deskripsi5 ?>">
																</div>
																<div class="mb-3">
																	<label for="deskripsi" class="form-label">Deskripsi</label>
																	<input type="text" class="form-control" id="deskripsi" name="deskripsi6" value="<?= $barang->deskripsi6 ?>">
																</div>
																<div class="form-group col-md-6">
																	<label for="gambar">Gambar:</label>
																	<input class="form-control" type="file" name="gambar" id="gambar" /><?= $barang->gambar ?>

																</div>

																<!-- Add more input fields as needed -->
																<div class="form-group">
																	<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
																	<button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>

										<hr>

									</form>
								</div>
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
</body>

</html>