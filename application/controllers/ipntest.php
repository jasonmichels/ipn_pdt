<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class IpnTest extends CI_Controller {

	public function index()
	{
		$data['cmd'] = "_notify-validate";

		foreach($this->input->post() as $key => $value)
		{
			$data[$key] = $value;
		}

		$result = $this->curl->setUrl("https://www.sandbox.paypal.com/cgi-bin/webscr")->post($data);		
		
		if($result == "VERIFIED")
		{
			$message = "Congratulations your IPN was verified.  Your script can take the post data and save to database or write to log file.\n\n";

			foreach($data as $key => $value)
			{
				$message .= "Key: ".$key." Value: ".$value."\n";
			}
		}
		else
		{
			$message = "There was an issue with your IPN. Log the data to research this further.";
		}

		$this->load->library('email');

		$this->email->from('thebizztech@me.com', 'Jason');
		$this->email->to('thebizztech@me.com');

		$this->email->subject('IPN Test '.$result);
		$this->email->message($message);	

		$this->email->send();
	}
}

/* End of file ipntest.php */
/* Location: ./application/controllers/ipntest.php */