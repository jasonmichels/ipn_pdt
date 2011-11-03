<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PdtTest extends CI_Controller {

	public function index()
	{
		$data['cmd'] = "_notify-synch";
		$data['tx'] = $this->input->get('tx');
		$data['at'] = "anS68XjppePH1P36fFkseWh7FDDyK5iker-R50EKGjd4_ZVDqr9cPbE6fBy";

		$result = $this->curl->setUrl("https://www.sandbox.paypal.com/cgi-bin/webscr")->post($data);

		echo "Here is the data array.<br /><br />";
		print_r($data);

		echo "<br /><br />Here is the result array.<br /><br />";
		print_r($result);

		$deformat = $this->deformatNVP($result);

		echo "<br /><br />Here is the deformatted string.<br /<br />>";
		print_r($deformat);

	}

	public function deformatNVP($nvpstr)
	{

		$intial=0;
	 	$nvpArray = array();

		while(strlen($nvpstr)){
			//postion of Key
			$keypos= strpos($nvpstr,'=');
			//position of value
			$valuepos = strpos($nvpstr,'&') ? strpos($nvpstr,'&'): strlen($nvpstr);

			/*getting the Key and Value values and storing in a Associative Array*/
			$keyval=substr($nvpstr,$intial,$keypos);
			$valval=substr($nvpstr,$keypos+1,$valuepos-$keypos-1);
			//decoding the respose
			$nvpArray[urldecode($keyval)] =urldecode( $valval);
			$nvpstr=substr($nvpstr,$valuepos+1,strlen($nvpstr));
	     }
		return $nvpArray;
	}
}

/* End of file pdttest.php */
/* Location: ./application/controllers/pdttest.php */