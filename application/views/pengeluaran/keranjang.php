<tr class="row-keranjang">
	<td class="nama_barang">
		<?= $this->input->post('nama_barang') ?>
		<input type="hidden" name="nama_barang_hidden[]" value="<?= $this->input->post('nama_barang') ?>">
	</td>
	<td class="kode_barang">
		<?= $this->input->post('kode_barang') ?>
		<input type="hidden" name="kode_barang_hidden[]" value="<?= $this->input->post('kode_barang') ?>">
	</td>
	<td class="jumlah">
		<?= $this->input->post('jumlah') ?>
		<input type="hidden" name="jumlah_hidden[]" value="<?= $this->input->post('jumlah') ?>">
	</td>
	<td class="harga">
		<?= strtoupper($this->input->post('harga')) ?>
		<input type="hidden" name="harga_hidden[]" value="<?= $this->input->post('harga') ?>">
	</td>
	<td class="aksi">
		<button type="button" class="btn btn-danger btn-sm" id="tombol-hapus" data-nama-barang="<?= $this->input->post('nama_barang') ?>"><i class="fa fa-trash"></i></button>
	</td>
</tr>