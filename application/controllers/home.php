<?php

class Home extends CI_Controller {

	function index(){
		$data = array(
			'title' => 'Home',
			'content' => 'users/home'
		);
		$data['testimonial_active'] = $this->db->limit(3)->order_by('id', 'desc')->get('testimonials')->result();
		$data['testimonial'] = $this->db->limit(10000,3)->order_by('id', 'desc')->get('testimonials')->result();
		$data['slider']=$this->admin_model->get_object_slider();
		$data['service'] = $this->db->limit(1)->order_by("id","desc")->get('service')->result();
		$data['servicess'] = $this->db->limit(3)->get('service')->result();
		$data['package']=$this->db->get('package')->result();
		$data['package_image']=$this->db->get('package_image')->result();
		$data['records'] = $this->db->get('special')->result();
		$this->load->view('users/includes/template', $data);
	}

	function get(){
		$this->load->helper('download');
		$url = base_url("assets/files/brochure.pdf");
		$data = file_get_contents($url);
		$name = 'brochure.pdf';

		force_download($name, $data);
	}

	function about(){
		$data = array(
			'title' => 'Company Profile',
			'content' => 'users/about'
		);
		$data['about'] = $this->db->get('aboutus')->result();

		$this->load->view('users/includes/template', $data);
	}

	function service(){
		$data = array(
			'title' => 'Things To Do',
			'content' => 'users/services'
		);
		$data['package_image']=$this->db->get('package_image')->result();
		$data['servicess'] = $this->db->get_where('service',array('slug'=>$this->uri->segment(2)))->result();
		$this->load->view('users/includes/template', $data);
	}
	
	function package(){
		$data = array(
			'title' => 'Package',
			'content' => 'users/package'
		);
		$id=$this->uri->segment(2);
		$data['package']=$this->db->where('id', $id)->get('package')->result();
		$data['package_img']=$this->db->where('package_id', $id)->get('package_image')->result();
		$check = $data['package'];
		if(empty($check)){
			show_404();
		}
		$this->load->view('users/includes/template', $data);
	}

	function news(){
		$data = array(
			'title' => 'News',
			'content' => 'users/news'
		);

		$this->load->library('pagination');
		$this->load->library('table');

		$base_url = site_url().'news';
		$config['base_url'] = $base_url;
		$config['total_rows'] = $this->db->get('news')->num_rows();
		$config['per_page'] = 5;
		$config['num_links'] = 5;

		$this->pagination->initialize($config);
		$query = $this->db->order_by('id', 'desc');
		$data['records'] = $this->db->get('news', $config['per_page'], $this->uri->segment(3))->result();
		$this->load->view('users/includes/template', $data);
	}

	function news_detail(){
		$data['records'] = $this->db->where('slug', $this->uri->segment(2))->get('news')->result();
		if(empty($data['records'])){
			show_404();
		}
		$title = $data['records'];
		foreach($title as $row):
			$data['title'] = $row->title;
		endforeach;
		$data['content'] = 'users/news_detail';
		$this->load->view('users/includes/template', $data);
	}

	function terms(){
		$data = array(
			'title' => 'Terms And Condition',
			'content' => 'users/terms'
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

	function book(){
		$data = array(
			'title' => 'Book Package',
			'content' => 'users/book'
		);
		$this->load->view('users/includes/template', $data);
	}

	function book_submit(){
			if($this->users_model->captcha()){
				$t=$this->db->get('admin')->result();
				$to = $t[0]->email;

				$subject = "New inquiry from your site.";

			    $from = "<strong>Name</strong> : ".$this->input->post('name')."<br />";
			    $email = "<strong>Email</strong> : ".$this->input->post('email')."<br />";
			    $title = "<strong>Package Selected</strong> : ".$this->input->post('package')."<br />";
			    $number = "<strong>Number of Traveller</strong> : ".$this->input->post('travellers')."<br />";
			    $date = "<strong>Estimated Travel Date</strong> : <br />".
			    			"<i>From : </i>".$this->input->post('fromdate')."<br />".
			    			"<i>To : </i>".$this->input->post('todate')."<br /><br /><br />";

			    $message = $from.$email.$title.$number.$date;



				if($this->sendemail($to, $subject, $message)){
					$this->session->set_flashdata('msg', 'Email Sent');
					redirect("book-package/".$this->input->post('id'));
				}
				else{
					$this->session->set_flashdata('msg', 'Error Occurred. Please try again.');
					redirect("book-package/".$this->input->post('id'));
				}
			}
			else{
				$this->session->set_flashdata('captcha', 'Captcha failed. Please try again.');
				redirect("book-package/".$this->input->post('id'));
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
			redirect('home');
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

}