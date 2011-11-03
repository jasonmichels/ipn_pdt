<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PdtTest extends CI_Controller {

	public function index()
	{
		$this->load->library('pdt/pdt');

		$data['cmd'] = "_notify-synch";
		$data['tx'] = $this->input->get('tx');
		$data['at'] = "anS68XjppePH1P36fFkseWh7FDDyK5iker-R50EKGjd4_ZVDqr9cPbE6fBy";

		$result = $this->curl->setUrl("https://www.sandbox.paypal.com/cgi-bin/webscr")->post($data);
		$deformat = $this->pdt->deformat($result);

		if($deformat === false)
		{
			echo "There was an issue with your request, log data and research further.";
		}
		else
		{
			echo "You were successfull with your request.<br /<br />";
			print_r($deformat);

			if($deformat['payment_status'] == "Completed")
			{
				echo "<br /><br />Your payment status is complete.";
			}
			else
			{
				echo "Payment might be echeck and still processing as it's not completed.";
			}
		}

	}
}
/* End of file pdttest.php */
/* Location: ./application/controllers/pdttest.php */