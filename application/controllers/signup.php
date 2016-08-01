<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'/controllers/c_controller.php';

class Signup extends C_controller
{
	public function __construct()
    {
        parent::__construct();
        define('model', 'm_sign');
        define('key', '');
        $this->load->library('email');
    }

	public function index()
	{
		$data = $this->input->post();

		$this->load->model(model);
  		$mail = $this->{model}->signup($data);
  
		$data['message'] = "Please wait for account verification!";
		$this->load->view('header');
		$this->load->view('signup', $data);
		$this->load->view('footer');
	}
}

?>