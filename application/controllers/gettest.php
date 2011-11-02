<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GetTest extends CI_Controller {

	public function index()
	{
		$first = $this->input->post("first");
		$last = $this->input->post("last");
		echo "Your name is ".$first." ".$last;
	}

	public function ipntest()
	{
		$data['cmd'] = "_notify-validate";

		foreach($this->input->post() as $key => $value)
		{
			$data[$key] = $value;
		}

		print_r($data);
		echo "<br />";
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */