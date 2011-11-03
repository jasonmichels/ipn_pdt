<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PdtTest extends CI_Controller {

	public function index()
	{
		$data['cmd'] = "_notify-synch";
		$data['tx'] = $this->input->get('tx');
		$data['at'] = "anS68XjppePH1P36fFkseWh7FDDyK5iker-R50EKGjd4_ZVDqr9cPbE6fBy";

		$result = $this->curl->setUrl("https://www.sandbox.paypal.com/cgi-bin/webscr")->post($data);

		if(strpos($result, "SUCCESS") === false)
		{
			echo "There was an issue with your request, log data and research.";
		}
		else
		{
			$deformat = $this->deformatNVP($result);
			print_r($deformat);

			if($deformat['payment_status'] == "Completed")
			{
				echo "<br /><br />Congratulations your payment has been completed."
			}
		}		

	}

	public function deformatNVP($res)
	{
		$lines = explode("\n", $res);
		$keyarray = array();
		if (strcmp ($lines[0], "SUCCESS") == 0) 
		{
			for ($i=1; $i<count($lines);$i++)
			{
				list($key,$val) = explode("=", $lines[$i]);
				$keyarray[urldecode($key)] = urldecode($val);
			}
		}
		return $keyarray;
	}
}
/* End of file pdttest.php */
/* Location: ./application/controllers/pdttest.php */