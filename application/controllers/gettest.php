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
		//http://ppipn.jasonmichels.com/ipn_pdt/index.php/gettest/ipntest/

		/*
		$data['cmd'] = "_notify-validate";

		foreach($this->input->post() as $key => $value)
		{
			$data[$key] = $value;
		}
		*/

		$req = 'cmd=_notify-validate';
		foreach ($_POST as $key => $value) {
			$value = urlencode(stripslashes($value));
			$req .= "&$key=$value";
		}

		log_message('DEBUG', $req);

		$result = $this->curl->setUrl("https://www.sandbox.paypal.com")->setString($req)->post();
		log_message('DEBUG', $result);

		if($result == "VERIFIED")
		{
			log_message('DEBUG', 'It was verified.');
		}
		else
		{
			log_message('DEBUG', 'It was not verified');
		}
		

		$this->load->library('email');
		
		$this->email->from('michelsja@me.com', 'Jason Michels');
		$this->email->to('michelsja@me.com');

		$this->email->subject('IPN Test '.$result);
		$this->email->message($req);	

		$this->email->send();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */