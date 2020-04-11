<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('moota', ['token' => 'masukkan_API_token_anda']);
    }

    public function index()
    {
        // Silahkan un-comment untuk mencoba nya satu-persatu
        // Link Dokumentasi "https://app.moota.co/developer/docs/"

        $data['tes'] = $this->moota->get('profile');
        # $data['tes'] = $this->moota->get('balance');
        # $data['tes'] = $this->moota->get('bank');
        # $data['tes'] = $this->moota->get('bank/{bank_id}');
        # $data['tes'] = $this->moota->get('bank/{bank_id}/mutation');
        # $data['tes'] = $this->moota->get('bank/{bank_id}/mutation/recent/{jumlah}');
        # $data['tes'] = $this->moota->get('bank/{bank_id}/mutation/search/{amount}');
        # $data['tes'] = $this->moota->get('bank/{bank_id}/mutation/search/description/{description}');

        $this->load->view('welcome_message', $data);
    }

}

/* End of file Welcome.php */
/* Location: ./application/controllers/Welcome.php */