<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PdtTest extends CI_Controller {

	public function index()
	{
		$data['cmd'] = "_notify-synch";
		$data['tx'] = $this->input->get('tx');
		$data['at'] = "anS68XjppePH1P36fFkseWh7FDDyK5iker-R50EKGjd4_ZVDqr9cPbE6fBy";

		$result = $this->curl->setUrl("https://www.sandbox.paypal.com/cgi-bin/webscr")->post($data);
		$deformat = $this->deformatNVP($result);

		echo "<br /><br />Here is the deformatted string.<br /<br />";
		print_r($deformat);

		//$pos = strpos($result, "SUCCESS");
		if(strpos($result, "SUCCESS") === false)
		{
			echo "<br /<br />There was an issue with your request.<br /<br />";
		}
		else
		{
			echo "<br /<br />You were successfull with your request.<br /<br />";

			if($deformat['payment_status'] == "Completed")
			{
				echo "Your payment status is complete.";
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