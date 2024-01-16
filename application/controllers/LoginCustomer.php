<?php

class LoginCustomer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        if ($this->session->login) redirect('home');
        $this->load->model('M_customer', 'm_customer');
    }

    public function index()
    {
        $this->load->view('login_customer');
    }

    public function proses_login()
    {
        $this->_proses_login_customer($this->input->post('username'));
    }

    protected function _proses_login_customer($username)
    {
        $get_customer = $this->m_customer->lihat_username($username);

        if ($get_customer) {
            if ($get_customer->password == $this->input->post('password')) {
                // Set user data in the session, including 'user_id'
                $session_data = array(
                    'user_id' => $get_customer->user_id,
                    'kode' => $get_customer->kode,
                    'nama' => $get_customer->nama,
                    'username' => $get_customer->username,
                    'telepon' => $get_customer->telepon,
                    'password' => $get_customer->password,
                    'role' => 'customer',
                    'jam_masuk' => date('H:i:s')
                );

                $this->session->set_userdata('login', $session_data);
                $this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
                redirect('home');
            } else {
                $this->session->set_flashdata('error', 'Password Salah!');
                redirect('login_customer');
            }
        } else {
            $this->session->set_flashdata('error', 'Username Salah!');
            redirect('login_customer');
        }
    }
}
