<?php

use Dompdf\Dompdf;

class Barang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->login['role'] != 'petugas' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'barang';
		$this->load->model('M_barang', 'm_barang');
	}

	public function index()
	{
		$this->data['title'] = 'Data Barang';
		$this->data['all_barang'] = $this->m_barang->lihat();
		$this->data['no'] = 1;

		$this->load->view('barang/lihat', $this->data);
	}

	public function tambah()
	{
		if ($this->session->login['role'] == 'petugas') {
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah Barang';

		$this->load->view('barang/tambah', $this->data);
	}

	public function proses_tambah()
	{


		// Load the upload library
		$this->load->library('upload');

		// Define upload configuration
		$config['upload_path'] = './assets/'; // Specify your upload directory
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = 1000;
		$config['overwrite'] = true;

		$this->upload->initialize($config);

		if ($this->upload->do_upload('gambar')) {
			// File uploaded successfully
			$upload_data = $this->upload->data();
			$data = [
				'kode_barang' => $this->input->post('kode_barang'),
				'nama_barang' => $this->input->post('nama_barang'),
				'stok' => $this->input->post('stok'),
				'harga' => $this->input->post('harga'),
				'deskripsi' => $this->input->post('deskripsi'),
				'deskripsi2' => $this->input->post('deskripsi2'),
				'deskripsi3' => $this->input->post('deskripsi3'),
				'deskripsi4' => $this->input->post('deskripsi4'),
				'deskripsi5' => $this->input->post('deskripsi5'),
				'deskripsi6' => $this->input->post('deskripsi6'),
				'gambar' => $upload_data['file_name'], // Get the uploaded file name
			];

			// Call your model method to insert data into the database
			if ($this->m_barang->tambah($data)) {
				$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
				redirect('barang');
			} else {
				$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
				redirect('barang');
			}
		} else {
			// File upload failed, handle accordingly (e.g., display errors)
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);
			redirect('barang/tambah');
		}
	}



	public function ubah($kode_barang)
	{
		if ($this->session->login['role'] == 'petugas') {
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Ubah Barang';
		$this->data['barang'] = $this->m_barang->lihat_id($kode_barang);

		$this->load->view('barang/ubah', $this->data);
	}

	public function proses_ubah($kode_barang)
	{
		$foto = $_FILES['gambar']['name'];
		$file_tmp = $_FILES['gambar']['tmp_name'];
		move_uploaded_file($file_tmp, 'assets/' . $foto);
		$uf = $foto;
		if ($this->session->login['role'] == 'petugas') {
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}
		
		$data = [

			'nama_barang' => $this->input->post('nama_barang'),
			'stok' => $this->input->post('stok'),
			'harga' => $this->input->post('harga'),
			'deskripsi' => $this->input->post('deskripsi'),
			'deskripsi2' => $this->input->post('deskripsi2'),
			'deskripsi3' => $this->input->post('deskripsi3'),
			'deskripsi4' => $this->input->post('deskripsi4'),
			'deskripsi5' => $this->input->post('deskripsi5'),
			'deskripsi6' => $this->input->post('deskripsi6'),
			'gambar' => $uf,
		];

		if ($this->m_barang->ubah($data, $kode_barang)) {
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('barang');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('barang');
		}
	}

	public function hapus($kode_barang)
	{
		if ($this->session->login['role'] == 'petugas') {
			$this->session->set_flashdata('error', 'Hapus data hanya untuk admin!');
			redirect('dashboard');
		}

		if ($this->m_barang->hapus($kode_barang)) {
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
			redirect('barang');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
			redirect('barang');
		}
	}

	public function export()
	{
		$dompdf = new Dompdf();
		$this->data['all_barang'] = $this->m_barang->lihat();
		$this->data['title'] = 'Laporan Data Barang';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('barang/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Barang Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}
