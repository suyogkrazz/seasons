<?php 

class Admin_login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->check_login();
	}

	function check_login(){
		$data = $this->session->userdata('admin_logged_in');
		if(isset($data) && $data == true){
			redirect("admin");
		}
	}

	function index(){
		$data = array(
			'title' => 'Login'
		);

		$this->load->view('admin/login', $data);
	}

	function post_login(){
		$this->form_validation->set_rules('username', 'Username', 'trim | xss_clean');

		if($this->form_validation->run() == TRUE){
			$value = $this->admin_model->login_validate();
			if($value === true){
				$data = array(
					'admin' => $this->input->post('username'),
					'admin_logged_in' => true
				);

				$this->session->set_userdata($data);
				redirect('admin');
			}
			else{
				$this->session->set_flashdata('msg_login', $value);
				redirect('admin_login');
			}
		}
	}

	function forgot(){
		$this->load->helper('string');
		$data = array(
					'recovery_code' => random_string('alnum', 60)
				);
		$this->db->where('id',1)->update('admin',$data);
		

		$t=$this->db->get('admin')->result();
		$to = $t[0]->email;
		$a = "Please click the link below to recover your password.<br /><br />";
		$b = base_url("admin_login/recover/".$t[0]->recovery_code);
		$c = "<strong>Username :</strong>".$t[0]->username."<br><br>";
		$message = $c.$a.$b;
		$subject = "Admin Password Recovery";
		if($this->sendemail($to, $subject, $message)){
			$this->session->set_flashdata('msg_login','Recovery Message has been sent to your email. Please check your email.');
			redirect('admin_login');
		}
		else{
			$this->session->set_flashdata('msg_login','We could not send a recovery message. Please try again.');
			redirect('admin_login');
		}		
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

	function recover($data){
		$r = $this->db->get('admin')->result();
		$a = $r[0]->recovery_code;
		if(strcmp($data, $a) == 0){
			$data = array(
				'title' => 'Password Recovery',
				'code' => $data
			);
			$this->load->view('admin/login', $data);
		}
		else{
			$this->session->set_flashdata('msg_login', 'Invalid recovery code.');
			redirect('admin_login');
		}
	}

	function recover_post(){
		$this->form_validation->set_rules('password', 'Password', 'min_length[6]');
		if($this->form_validation->run() == false){
			$a = $this->input->post('data');
			$this->recover($a);
		}
		else{
			$data = array(
				'password' => sha1($this->input->post('password')),
				'recovery_code' => ''
			);
			if($this->db->where('id',1)->update('admin',$data)){
				$this->session->set_flashdata('msg_login', 'Password Successfully Recovered. Login with your new password.');
				redirect('admin_login');
			}
			else{
				$this->session->set_flashdata('msg_login', 'Error Occurred. Please try again.');
				redirect('admin_login/recover'.$this->input->post('data'));
			}
		}
	}

}