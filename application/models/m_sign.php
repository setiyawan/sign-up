<?php

require_once APPPATH.'/models/m_model.php';

class M_sign extends M_model
{
	public function __construct()
    {
        parent::__construct();
        define('table', 'ta.ms_akun');
        define('header', ' ');
        define('order', 'idakun');
    }

    public function signup($data)
    {
    	$to      = 'admin@gmail.com';
		$subject = 'A new registered account';
		$message = 'Name : ' . $data['name'] . "<br>";
		$message .= 'E-mail : ' . $data['email'] . "<br>";
		$message .= 'Phone : ' . $data['phone'] . "<br>";
		$message .= 'Occupation : ' . $data['occupation'] . "<br>";

		date_default_timezone_set("Asia/Bangkok");
		$message .= 'registered at ' . date('d/m/Y h:i:sa');

		$this->load->library('email');
		$this->email->from($data['email'], $data['name']);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);

		$this->email->send();
    }
}

?>