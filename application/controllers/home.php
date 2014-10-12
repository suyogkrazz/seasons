<?php

class Home extends CI_Controller {

	function index(){
		$data = array(
			'title' => 'Home',
			'content' => 'users/home'
		);
		$this->load->view('users/includes/template', $data);
	}

	function about(){
		$data = array(
			'title' => 'Company Profile',
			'content' => 'users/about'
		);
		$data['about'] = $this->db->get('aboutus')->result();

		$this->load->view('users/includes/template', $data);
	}

	function faqs(){
		$data = array(
			'title' => "FAQ's",
			'content' => 'users/faq'
		);

		$this->load->view('users/includes/template', $data);
	}

	function contact(){
		$data = array(
			'title' => 'Contact Us',
			'content' => 'users/contact'
		);
		$this->load->view('users/includes/template', $data);
	}

	public function sendemail($to, $subject, $message){
		$e = $this->db->get('contact_info')->result();
	    $contact_email = $e[0]->contact_email;
	    $contact_password = $this->encrypt->decode($e[0]->contact_password);

	    $config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => $contact_email, 
			'smtp_pass' => $contact_password, 
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from("Fishtail Travels");
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		if($this->email->send())
		{
			return true;
		}
		else
	    {
	     	return false;
	    }
	}

}