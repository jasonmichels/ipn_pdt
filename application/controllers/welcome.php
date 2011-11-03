<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		echo "Welcome";
	}

	public function buynow()
	{
		$this->load->view("welcome_message");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */