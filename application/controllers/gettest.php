<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GetTest extends CI_Controller {

	public function index()
	{
		$first = $this->input->post("first");
		$last = $this->input->post("last");

		$post = $this->input->post();
		print_r($post);

		//echo "Your name is ".$first." ".$last;
	}

	public function ipntest()
	{
		$data['cmd'] = "_notify-validate";


	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */