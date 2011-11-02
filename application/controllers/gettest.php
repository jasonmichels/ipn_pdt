<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GetTest extends CI_Controller {

	public function index()
	{
		$first = $this->input->post("first");
		$last = $this->input->post("last");

		echo "Your name is ".$first." ".$last;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */