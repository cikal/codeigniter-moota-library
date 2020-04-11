# Codeigniter Moota Library

Moota merupakan aplikasi untuk pengecekan mutasi dan saldo rekening, dimana mutasi rekening tersebut di dapatkan dari akun iBanking yang kita miliki. Library ini saya buat untuk mempermudah pemanggilan API pada EndPoints URL yang sudah disediakan pada halaman Dokumentasi Moota https://app.moota.co/developer/docs.


## Instalasi

Clone / Download repo ini kemudian extract file `application/librararies/Moota.php` kedalam folder `application/libraries` project anda.


## Konfigurasi

```php
$config['token'] = 'masukkan_API_Token_anda';
$this->load->library('moota', $config);
```

Library ini membutuhkan API Token untuk dapat mengakses API yang disediakan oleh Moota, untuk mendapatkan API Token silahkan lihat di menu _Pengaturan_ `->` _Edit Profil_.


## Contoh Penggunaan

Library ini hanya memiliki 1 method (GET) `$this->moota->get(string EndPoints) : object`

Load library pada _Controller_ `Welcome.php` anda :

```php
class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('moota', ['token' => 'masukkan_API_token_anda']);
    }

    public function index()
    {
        // Silahkan un-comment untuk mencoba nya satu-persatu

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
```

Tampilkan data pada _Views_ `welcome_message.php`

```php
<?php print_r($tes); ?>
```


> Semoga bermanfaat..

_ian_