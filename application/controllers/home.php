<?php

class Home extends CI_Controller {

	function index(){
		$data = array(
			'title' => 'Home',
			'content' => 'users/home',
			'categories' => $this->db->get('categories')->result(),
			'first' => $this->db->where('slider', 1)->order_by('id', 'desc')->get('slide')->result(),
			'second' => $this->db->where('slider', 2)->order_by('id', 'desc')->get('slide')->result(),
			'third' => $this->db->where('slider', 3)->order_by('id', 'desc')->get('slide')->result(),
			'fourth' => $this->db->where('slider', 4)->order_by('id', 'desc')->get('slide')->result(),
			'fifth' => $this->db->where('slider', 5)->order_by('id', 'desc')->get('slide')->result(),
			'banner' => $this->db->get('banner')->result()
		);
		$this->load->view('users/includes/template', $data);
	}

	function about(){
		$data = array(
			'title' => 'Company Profile',
			'content' => 'users/about'
		);
		$data['about'] = $this->db->get('aboutus')->result();
		$data['team'] = $this->db->get('team')->result();

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

	function contact_post(){
		$t=$this->db->get('admin')->result();
		$to = $t[0]->email;

		$name = "<strong>Name : </strong>".$this->input->post('name')."<br>";
		$email = "<strong>Email : </strong>".$this->input->post('email')."<br><br>";
		$text = "<strong>Message : </strong>".$this->input->post('message')."<br>";

		$message = $name.$email.$text;

		$subject = "New Inquery From Your Site";

		if($this->sendemail($to, $subject, $message)){
			$this->session->set_flashdata('msg', 'We have received your message. We will get back to you soon. Thank you.');
		}
		else{
			$this->session->set_flashdata('msg', 'Message could not be sent. Please try again.');
		}
		redirect('contact-us');

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
		$this->email->from("Seasons Pokhara");
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

	function search_error(){
		$data = array(
						'title' => 'search error',
						'content' => 'users/search'
					);
		$this->load->view('users/includes/template', $data);
	}

	function search_content(){
  		$this->load->library('form_validation');

		$this->form_validation->set_rules('search_content', 'Content', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('feedback', 'place a item OR category!');
			redirect();
		}
		else{
			$search_content=$this->input->post('search_content');
			$result=$this->users_model->search_content($search_content);
			if(!empty($result)){
				$data = array(
						'title' => 'search',
						'content' => 'users/search'
					);
				$data['records']=$result;
				$this->load->view('users/includes/template', $data);
			}
			else{
				$this->session->set_flashdata('feedback', 'content not found!');
				redirect('home/search_error');
			}
			
		}
	}

	/*Advertisement functions*/

	function ads(){
		$data = array(
			'title' => 'Advertisement',
			'content' => 'users/ads',
			'detail' => $this->db->where('id', $this->uri->segment(2))->get('package')->result(),
			'images' => $this->db->where('ad_id', $this->uri->segment(2))->order_by('id', 'desc')->get('package_image')->result()
		);

		if(empty($data['detail']) && empty($data['image'])){
			show_404();
		}

		$this->load->view('users/includes/template', $data);
	}

	/*Advertisement functions end*/
/*-----------------------------------------------------------------------------------------------------------------------------*/
	/*Categories*/

}