<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->library('curl/curl');

		$result = $this->curl
						->setUrl("http://ppipn.jasonmichels.com/ipn_pdt/index.php/gettest/")
						->setString("first=Jason&last=Michels")
						->post();

		print_r($result);
		echo "<br />";

		print_r($_SERVER['SERVER_NAME']);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */