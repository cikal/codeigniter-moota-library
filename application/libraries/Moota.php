<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Codeigniter Moota Library
 *
 * Moota merupakan aplikasi untuk pengecekan mutasi dan saldo rekening, 
 * dimana mutasi rekening tersebut di dapatkan dari akun iBanking yang 
 * kita miliki.
 *
 * Library ini saya buat untuk mempermudah pemanggilan API pada EndPoints 
 * URL yang sudah disediakan pada halaman Dokumentasi Moota di 
 * https://app.moota.co/developer/docs.
 *
 * @author  cikal
 * @link    https://github.com/cikal/codeigniter-moota-library - Github
 * @link    https://cikal.github.io
 * @license http://opensource.org/licenses/MIT - MIT License
 * @since   2020-04-12
 * @version 1.0
 */

class Moota
{
    /**
     * Codeigniter Instance
     */
    protected $ci;

    /**
     * String API Token
     */
    protected $token;

    /**
     * Constructor
     */
    public function __construct($config)
    {
        $this->ci =& get_instance();

        // assign token from defined config
        $this->token = $config['token'];
    }

    /**
     * @method get(String EndPointsURL) : object
     * @return Object
     */
    public function get($endpoints)
    {

        // init cURL and
        // adding basic option based on Moota documentation
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://app.moota.co/api/v1/" . $endpoints);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Authorization: Bearer ' . $this->token
        ]);

        // building response
        $response = curl_exec($curl);
        $err = curl_error($curl);

        // close cURL
        curl_close($curl);

        // returning response
        if ($err) {
            return $err;
        } else {
            return json_decode($response, false);
        }
    }

}

/* End of file Moota.php */
/* Location: ./application/libraries/Moota.php */
