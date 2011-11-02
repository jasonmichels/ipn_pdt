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
		
		$data['cmd'] = "_notify-validate";

		foreach($this->input->post() as $key => $value)
		{
			$data[$key] = $value;
		}

		log_message('DEBUG', serialize($data));

		$this->load->library('curl/curl');

		$result = $this->curl->setUrl("https://www.sandbox.paypal.com")->setArray($data)->post();
		log_message('DEBUG', $result);

		$this->load->library('email');
		
		$this->email->from('michelsja@me.com', 'Jason Michels');
		$this->email->to('michelsja@me.com');

		$this->email->subject('IPN Test '.$result);
		$this->email->message(serialize($data));	

		$this->email->send();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */