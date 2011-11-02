<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->library('curl/curl');

		$result = $this->curl
						->setUrl(site_url("gettest/ipntest"))
						->setString("first=Jason&last=Michels")
						->post();

			print_r($result);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */