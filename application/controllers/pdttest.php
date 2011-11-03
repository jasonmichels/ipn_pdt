<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PdtTest extends CI_Controller {

	public function index()
	{
		$data['cmd'] = "_notify-synch";
		$data['tx'] = $this->input->get('tx');
		$data['at'] = "anS68XjppePH1P36fFkseWh7FDDyK5iker-R50EKGjd4_ZVDqr9cPbE6fBy";

		$result = $this->curl->setUrl("https://www.sandbox.paypal.com/cgi-bin/webscr")->post($data);

		echo "Here is the data array.<br />";
		print_r($data);

		echo "<br />Here is the result array.<br />";
		print_r($result);

















	}
}

/* End of file pdttest.php */
/* Location: ./application/controllers/pdttest.php */