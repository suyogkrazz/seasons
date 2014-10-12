<?php 

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->check_login();
	}

	function check_login(){
		$data = $this->session->userdata('admin_logged_in');
		if(!isset($data) || $data != true){
			redirect("admin_login");
		}
	}

	function index(){
		$data = array(
			'title' => 'Home',
			'content' => 'admin/home',
			'id' => 'home'
		);

		$data['service']=$this->admin_model->get_dashboard_services();
		$data['slider'] = $this->db->limit(3)->get('slide')->result();

		$this->load->view('admin/includes/template', $data);
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('admin_login');
	}

	function settings(){
		$data = array(
			'title' => 'Settings',
			'content' => 'admin/settings',
			'id' => 'settings'
		);

		$this->load->view('admin/includes/template', $data);
	}

	function change_username(){
		$confirm = $this->admin_model->change_username();
		if($confirm === true){
			$msg = "Username successfully changed";
		}
		else if($confirm === false){
			$msg = "Error occurred. Please try again.";
		}
		else{
			$msg = $confirm;
		}

		$this->session->set_flashdata('msg', $msg);
		redirect('admin/settings');
	}

	function change_password(){
		$confirm = $this->admin_model->change_password();
		if($confirm === true){
			$msg = "Password Successfully changed.";
		}
		else if($confirm === false){
			$msg = "Error occurred. Please try again.";
		}
		else{
			$msg = $confirm;
		}

		$this->session->set_flashdata('msg', $msg);
		redirect('admin/settings');
	}

	function change_email() {
		$confirm = $this->admin_model->change_email();
		if($confirm === true){
			$msg = "Email Successfully changed.";
		}
		else if($confirm === false){
			$msg = "Error occurred. Please try again.";
		}
		else{
			$msg = $confirm;
		}

		$this->session->set_flashdata('msg', $msg);
		redirect('admin/settings');
	}

	function changeProfilePicture(){
		if(!empty($_FILES['file'])){
			$name=$_FILES['file']['name'];
			$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
			$path1= 'user_image'.'.'.$ext;
  			$path='assets/images/'.$path1;
	  		if($_FILES['file']['error']==0 && move_uploaded_file($_FILES['file']['tmp_name'], $path)){
				$data=array(
					'image'=>$path1
				);
				$this->db->update('admin', $data, "id = 1");
				redirect('admin');
			}
			$this->session->set_flashdata('msg', 'Error Occurred. Please choose different file.');
			redirect('admin/settings');
		}
	}

	function contact_info(){
		$confirm = $this->admin_model->change_contact_info();
		if($confirm === true){
			$msg = 'Contact Info Updated';
		}
		else if($confirm === false){
			$msg = 'Error Occurred. Please try again.';
		}
		else{
			$msg = $confirm;
		}
		$this->session->set_flashdata('msg', $msg);
		redirect('admin/settings');
	}

	public function aboutus(){
		$data1['about'] = $this->db->get('aboutus')->result();
		$data = array(
			'title' => 'About Us',
			'content' => 'admin/aboutus',
			'id' => 'aboutus'
		);

		$this->load->view('admin/includes/template',array_merge($data,$data1));
	}

	function add_message() {
		$data = array(
			'message_from_chairman' => $this->input->post('message')
		);
		$this->db->update('aboutus', $data, "id = 1");
		redirect('admin/aboutus');
	}

	function add_image(){
		if(!empty($_FILES['file'])){
			$name=$_FILES['file']['name'];
			$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
			$path1= 'chairman'.'.'.$ext;
  			$path='assets/images/'.$path1;
	  		if($_FILES['file']['error']==0 && move_uploaded_file($_FILES['file']['tmp_name'], $path)){
				$data=array(
					'path'=>$path1
				);
				$this->db->update('aboutus', $data, "id = 1");
				redirect('admin/aboutus');
			}
			$this->session->set_flashdata('msg', 'Error Occurred. Please choose different file.');
			redirect('admin/aboutus');
		}
	}
	function add_image_chair(){
		if(!empty($_FILES['file'])){
			$name=$_FILES['file']['name'];
			$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
			$path1= 'chair'.'.'.$ext;
  			$path='assets/images/'.$path1;
	  		if($_FILES['file']['error']==0 && move_uploaded_file($_FILES['file']['tmp_name'], $path)){
				$data=array(
					'chair_path'=>$path1
				);
				$this->db->update('aboutus', $data, "id = 1");
				redirect('admin/aboutus');
			}
			$this->session->set_flashdata('msg', 'Error Occurred. Please choose different file.');
			redirect('admin/aboutus');
		}
	}
	function addaboutus(){
		$data = array(
			'description' => $this->input->post('about')
		);
		$this->db->update('aboutus', $data, "id = 1");
		redirect('admin/aboutus');
	}
	function addwhy(){
		$data = array(
			'why' => $this->input->post('about')
		);
		$this->db->update('aboutus', $data, "id = 1");
		redirect('admin/aboutus');
	}


	function news(){
		$data = array(
			'title' => 'News',
			'content' => 'admin/news',
			'id' => 'news'
		);

		$this->load->library('pagination');
		$this->load->library('table');

		$base_url = site_url().'admin/news';
		$config['base_url'] = $base_url;
		$config['total_rows'] = $this->db->get('news')->num_rows();
		$config['per_page'] = 9;
		$config['num_links'] = 5;

		$this->pagination->initialize($config);
		$data['records'] = $this->db->order_by('id', 'desc')->get('news', $config['per_page'], $this->uri->segment(3))->result();

		$this->load->view('admin/includes/template', $data);
	}

	function create_news(){
		$data = array(
			'title' => 'create News',
			'content' => 'admin/create_news',
			'id' => 'news'
		);
		$this->load->view('admin/includes/template', $data);
	}

	function news_post(){
		$this->form_validation->set_message('is_unique', 'You already used that title. Please pick another.');
		$this->form_validation->set_rules('title', 'Title', 'is_unique[news.title]');
		$this->form_validation->set_rules('content', 'Content', 'trim|required');
		if($this->form_validation->run() == false){
			$this->create_news();
		}
		else{
  			$name=$_FILES['file']['name'];
  			$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
  			$path1= uniqid().'.'.$ext;
	  		$path='assets/images/news/'.$path1;

	  		if($_FILES['file']['error']==0 && move_uploaded_file($_FILES['file']['tmp_name'], $path)){
  				$data = array(
					'title' => $this->input->post('title'),
					'slug' => url_title($this->input->post('title'), 'dash', true),
					'content' => $this->input->post('content'),
					'path'=>$path1,
					'date' => date('j-F-o'),
					'day' => date('d'),
					'month' => date('M')
				);
			}
			if($this->admin_model->news($data)){
				redirect('admin/news');
			}
			else{
				$this->session->set_flashdata('msg', 'Something went wrong. Please try again.');
			}

		}
	}

	function news_delete(){
		$results=$this->db->get_where('news',array('id'=>$this->uri->segment(3)))->result();
		$path='./assets/images/news/'.$results[0]->path;
		unlink($path);
		$this->db->where('id', $this->uri->segment(3));
		if($this->db->delete('news')){
			redirect('admin/news');
		}
		else{
			redirect('admin/news');
		}
	}

	function news_edit(){
		$data = array(
			'title' => 'Edit News',
			'content' => 'admin/edit_news',
			'id' => 'news'
		);

		$this->db->where('id', $this->uri->segment(3));
		$data['records'] = $this->db->get('news')->result();

		$this->load->view('admin/includes/template', $data);
	}

	function news_edit_post(){
		$this->form_validation->set_rules('title', 'Title', 'callback_check_title');
		if($this->form_validation->run() == false){
			$this->session->set_flashdata('msg', 'You already used that title. Please pick another.');
			redirect("admin/news_edit/".$this->input->post('id'));
		}
		else{

			$name = $_FILES['file']['name'];

			if(isset($name) && !empty($name)){
				$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
	  			$path1= uniqid().'.'.$ext;
		  		$path='assets/images/news/'.$path1;

		  		if($_FILES['file']['error']==0 && move_uploaded_file($_FILES['file']['tmp_name'], $path)){
		  			$data = array(
						'title' => $this->input->post('title'),
						'slug' => url_title($this->input->post('title'), 'dash', true),
						'content' => $this->input->post('content'),
						'path' => $path1
					);
		  		}
			}
			else{
				$data = array(
					'title' => $this->input->post('title'),
					'slug' => url_title($this->input->post('title'), 'dash', true),
					'content' => $this->input->post('content')
				);
			}

			$this->db->where('id', $this->input->post('id'));
			if($this->db->update('news', $data)){
				$this->session->set_flashdata('msg', 'News Updated.');
				redirect('admin/news');
			}
			else{
				$this->session->set_flashdata('msg', 'Something went wrong. Please try again.');
				redirect("admin/news_edit/".$this->input->post('id'));
			}
		}
	}

	function check_title(){
		if($this->admin_model->check_title()){
			return true;
		}
		else{
			$this->form_validation->set_message('check_title', 'You already used that title. Please pick another.');
			return false;
		}
	}

	function special(){
		$data = array(
			'title' => 'Create Special Offers',
			'content' => 'admin/special',
			'id' => 'special'
		);

		$data['records'] = $this->db->get('special')->result();

		$this->load->view('admin/includes/template', $data);
	}

	function special_create(){
		$this->form_validation->set_rules('title', 'Title', 'trim|xss_clean|required');
		$this->form_validation->set_rules('content', 'Content', 'trim|xss_clean|required');

		if($this->form_validation->run() == false){
			$this->special();
		}
		else{
			$name=$_FILES['file']['name'];
  			$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
  			$path1= uniqid().'.'.$ext;
	  		$path='assets/images/special/'.$path1;
	  		if($_FILES['file']['error']==0 && move_uploaded_file($_FILES['file']['tmp_name'], $path)){
  				$data = array(
					'name' => $this->input->post('title'),
					'content' => $this->input->post('content'),
					'path'=>$path1
				);
				if($this->admin_model->special($data)){
					$this->session->set_flashdata('msg', 'Special Offer Created.');
					redirect('admin/special');
				}
				else{
					$this->session->set_flashdata('msg', "Error Occurred. Please try again.");
					$this->special();
				}
			}
		}
	}

	function special_edit(){
		$data = array(
			'title' => 'Edit Special Offers',
			'content' => 'admin/special_edit',
			'id' => 'special'
		);

		$data['records'] = $this->db->where('id', $this->uri->segment(3))->get('special')->result();

		$this->load->view('admin/includes/template', $data);
	}

	function special_edit_post(){
		$this->form_validation->set_rules('title', 'Title', 'callback_check_special_title');
		$this->form_validation->set_rules('content', 'Content', 'trim|xss_clean|required');

		if($this->form_validation->run() == false){
			$this->session->set_flashdata('msg', 'You already used that title. Please pick another.');
			redirect("admin/special_edit/".$this->input->post('id'));
		}
		else{
			$data = array(
				'name' => $this->input->post('title'),
				'content' => $this->input->post('content')
			);

			if($this->admin_model->update_special($data)){
				$this->session->set_flashdata('msg', 'Offer Updated.');
				redirect('admin/special');
			}
			else{
				$this->session->set_flashdata('msg', "Error Occurred. Please try again.");
				redirect('admin/special/'.$this->input->post('id'));
			}
		}
	}

	function check_special_title(){
		if($this->admin_model->check_special_title()){
			return true;
		}
		else{
			return false;
		}
	}

	function special_delete(){
		$results=$this->db->get_where('special',array('id'=>$this->uri->segment(3)))->result();
		$path='./assets/images/special/'.$results[0]->path;
		unlink($path);
		$this->db->where('id', $this->uri->segment(3));
		if($this->db->delete('special')){
			$this->session->set_flashdata('msg', 'Offer Deleted.');
			redirect('admin/special');
		}
		else{
			$this->session->set_flashdata('msg', 'Error Occurred. Please try again.');
			redirect('admin/special');
		}
	}

	function file(){
		$data = array(
			'title' => 'Files',
			'content' => 'admin/brochure',
			'id' => 'files'
		);

		$this->load->view('admin/includes/template',$data);
	}

	function addfile(){
		if(!empty($_FILES['file'])){

			$name=$_FILES['file']['name'];
			$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
			if(strcmp($ext, 'pdf') != 0){
				$this->session->set_flashdata('msg', 'Please select pdf file.');
				redirect('admin/file');	
			}
			else{
				$path1= 'brochure.pdf';
				$path='assets/files/'.$path1;

				if($_FILES['file']['error']==0 && move_uploaded_file($_FILES['file']['tmp_name'], $path)){
					$this->session->set_flashdata('msg', 'File Uploaded.');
					redirect('admin/file');
				}
				else{
					$this->session->set_flashdata('msg', 'Error Occurred. Please try again.');
					redirect('admin/file');
				}
			}
		}
		$this->session->set_flashdata('msg', 'Error Occurred. Please try again.');
		redirect('admin/file');
	}

	function testimonials(){
		$data1['testimonials']=$this->db->order_by('id', 'desc')->get('testimonials')->result();
		$data = array(
			'title' => 'Testimonials',
			'content' => 'admin/testimonials',
			'id' => 'testimonials'
		);

		$this->load->view('admin/includes/template',array_merge($data,$data1));
	}

	function addtestimonials(){

		if(!empty($_FILES['file'])){
			$name=$_FILES['file']['name'];
			$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
			$path1= uniqid().'.'.$ext;
  			$path='assets/images/testimonials/'.$path1;
	  		if($_FILES['file']['error']==0 && move_uploaded_file($_FILES['file']['tmp_name'], $path)){
				$data=array(
					'name'=>$this->input->post('name'),
					'title'=>$this->input->post('title'),
					'description' => $this->input->post('message'),
					'path'=>$path1,
				);
				$this->admin_model->add_testimonials($data);
			}
 		}
 		redirect('admin/testimonials');
	}

	function deletetestimonials(){
		$path='./assets/images/testimonials/'.$data->path;
		unlink($path);
		$product=$this->admin_model->delete_testimonials();
		redirect('admin/testimonials');
	}	
	public function services(){
	$data1['service']=$this->admin_model->get_services();
		$data = array(
		'title' => 'Categories',
		'content' => 'admin/add_services',
		'id' => 'service'
	);

	$this->load->view('admin/includes/template',array_merge($data,$data1));
	}	
	public function addservices(){
	$this->form_validation->set_rules('service_name', 'Service', 'trim|is_unique[categories.name]');
	if($this->form_validation->run() == true){
				$data=array(
					'name' => $this->input->post('service_name'),
					'slug' => url_title($this->input->post('service_name'), 'dash', true),
				);
				$this->admin_model->add_services($data);
				redirect('admin/services/');
			
			}
			else{
				redirect('admin/services/');
			}
		}

function service_detail(){
	$data['service']=$this->db->where('id', $this->uri->segment(3))->get('service')->result();
	if(empty($data['service'])){
		show_404();
	}
	$data['package']=$this->db->where('service_id', $this->uri->segment(3))->get('package')->result();
	$data['title'] = 'Add service';
	$data['content'] = 'admin/service_detail';
	$data['id'] = 'service';
	$this->load->view('admin/includes/template', $data);
}


function add_events(){
	$data = array(
		'title' => "Events",
		'content' => 'admin/add_events',
		'id' => 'service'
	);
	$data['records'] = $this->db->select('name')->get('service')->result();
	$this->load->view('admin/includes/template', $data);
}

function events_post(){
	$data=array(
					'name'=>$this->input->post('name'),
					'description'=>$this->input->post('description'),
					'detail'=>$this->input->post('detail'),
					'price'=>$this->input->post('price'),
					'service_id'=>$this->input->post('service_id'),
					);
	$package=$this->admin_model->add_package($data);
	foreach ($_FILES['file']['name'] as $key => $name) {
		  			$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
		  			$path1= uniqid().'.'.$ext;
			  		$path='assets/images/'.$path1;
			  		if($_FILES['file']['error'][$key]==0 && move_uploaded_file($_FILES['file']['tmp_name'][$key], $path)){
						$data1=array(
						'package_id' => $package,
						'path'=>$path1,
						);
					}
			$msg = $this->admin_model->add_package_image($data1);
			}
	redirect('admin/service_detail/'.$this->input->post('service_id'));		
}
function edit_package(){
	$data = array(
		'title' => " EditEvents",
		'content' => 'admin/edit_package',
		'id' => 'service'
	);
	$data['package']=$this->db->where('id', $this->uri->segment(3))->get('package')->result();
	$data['package_img']=$this->db->where('package_id', $this->uri->segment(3))->get('package_image')->result();
	$this->load->view('admin/includes/template', $data);

}
function events_postupdate(){
	$data=array(
					'id'=>$this->input->post('id'),
					'name'=>$this->input->post('name'),
					'description'=>$this->input->post('description'),
					'detail'=>$this->input->post('detail'),
					'price'=>$this->input->post('price'),
					'service_id'=>$this->input->post('service_id'),
					);
	$this->admin_model->update_package($data);
	redirect('admin/service_detail/'.$this->input->post('service_id'));		
}
function Package_image_add(){

	if(!empty($_FILES['file'])){
			foreach ($_FILES['file']['name'] as $key => $name) {
		  			$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
		  			$path1= uniqid().'.'.$ext;
			  		$path='assets/images/'.$path1;
			  		if($_FILES['file']['error'][$key]==0 && move_uploaded_file($_FILES['file']['tmp_name'][$key], $path)){
						$data=array(
						'package_id' => $this->input->post('package_id'),
						'path'=>$path1,
						);
					}
			$msg = $this->admin_model->add_package_image($data);
			if($msg == true ){
				
				}
			else{
				$data = array(
					'title' => " EditEvents",
					'content' => 'admin/edit_package',
					'global_message' => $msg
				);
				$data['package']=$this->db->where('id', $this->input->post('id'))->get('package')->result();
				$data['package_img']=$this->db->where('package_id', $this->input->post('package_id'))->get('package_image')->result();
				$this->load->view('includes/template', $data);
				}
			}
		redirect('admin/edit_package/'.$this->input->post('id'));

				}
			else{
				redirect('admin/edit_package/'.$this->input->post('id'));
			}
		}

		public function delete_package(){
			$data=$this->db->where('id', $this->uri->segment(3))->get('package')->result();
			$data=$this->db->where('package_id', $data[0]->id)->get('package_image')->result();
			foreach ($data as $datas ) {
				$path='./assets/images/'.$datas->path;
				unlink($path);
			}
			$this->admin_model->delete_package_images($data);
			$data=$this->db->where('id', $this->uri->segment(3))->get('package')->result();
			$this->admin_model->delete_package();
			redirect('admin/service_detail/'.$data[0]->service_id);
		}

		public function delete_package_img(){
			$data=$this->db->where('id', $this->uri->segment(3))->get('package_image')->result();
			$path='./assets/images/'.$data[0]->path;
			unlink($path);
			$this->admin_model->delete_package_img($data[0]->id);
			redirect('admin/edit_package/'.$data[0]->package_id);
		}


		public function deleteservice(){
			$data=$this->db->where('service_id', $this->uri->segment(3))->get('package')->result();

			foreach ($data as $datad ) {									
				$datass=$this->db->where('package_id', $datad->id)->get('package_image')->result();
				foreach ($datass as $datas ) {
					$path='./assets/images/'.$datas->path;
					unlink($path);
				}
						$this->admin_model->delete_package_images($datad);
						$this->admin_model->delete_package_serv();
			 }
			 $data=$this->admin_model->get_particular_service();
			 $re=$data->option_id;
				$this->admin_model->delete_service();		
		   redirect('admin/services/'.$re);
			}

		public function video(){
			$data = array(
					'title' => 'add video',
					'content' => 'admin/add_video',
					'id' => 'media'
				);
			$data['records']=$this->admin_model->get_videos();
			$this->load->view('admin/includes/template', $data);
		}	

		public function add_video(){
			$data=array(
					'video_name'=>$this->input->post('video_name'),
					'embed_code'=>$this->input->post('embed_code')
				);
				$result=$this->admin_model->add_video($data);
				if($result==1){
					$this->session->set_flashdata('feedback', 'video embeded successfully!');
					redirect('admin/video');
				}
				else{
					$this->session->set_flashdata('feedback', 'Failed to embed video!');
					redirect('admin/video');
				}
			
		}

		

		public function delete_video(){
			$result=$this->admin_model->delete_video();
			if($result==1){
				$this->session->set_flashdata('feedback', 'video deleted successfully');
				redirect('admin/video');	
			}
		}

				
			public function slider()
					{					
					$data['slider']=$this->admin_model->get_object_slider();
					$data1 = array(
						'title' => 'Add Slider',
						'content' => 'admin/add_objects',
						'id' => 'media'
					);
					$this->load->view('admin/includes/template', array_merge($data,$data1));
					}
			public function addobjects(){
					$nw = 1000;
					$nh = 300; # image with # height
					$ext = strtolower(pathinfo($_FILES['uploadImage']['name'], PATHINFO_EXTENSION));
					$path1 = uniqid().'.'.$ext;
					$path = 'assets/images/'.$path1;
					$size = getimagesize($_FILES['uploadImage']['tmp_name']);
					$x = (int) $_POST['x'];
					$y = (int) $_POST['y'];
					$w = (int) $_POST['w'] ? $_POST['w'] : $size[0];
					$h = (int) $_POST['h'] ? $_POST['h'] : $size[1];

					$data = file_get_contents($_FILES['uploadImage']['tmp_name']);
					$vImg = imagecreatefromstring($data);
					$dstImg = imagecreatetruecolor($nw, $nh);
					imagecopyresampled($dstImg, $vImg, 0, 0,$x,$y,$nw,$nh, $w, $h);
					imagejpeg($dstImg, $path,100);
					imagedestroy($dstImg);
					$data=array(
					'description'=>$this->input->post('description'),
					'path'=>$path1
					);

					$this->admin_model->add_object_slider($data);
					redirect('admin/slider');			
					}
			public function deleteobject(){
					$data=$this->admin_model->get_object();
					$path='./assets/images/'.$data->path;
					unlink($path);
					$product=$this->admin_model->delete_object();
					redirect('admin/slider');			
					}
			public function album(){					
					$data['album']=$this->admin_model->get_object_album();
						$data1 = array(
						'title' => 'Add album',
						'content' => 'admin/add_album',
						'id' => 'media'
					);

					$this->load->view('admin/includes/template', array_merge($data,$data1));
					}
			public function addalbum(){
								$data=array(
								'name'=>$this->input->post('album_name'),
								);
								$this->admin_model->add_object_album($data);
								redirect('admin/album/');

			}
			public function images(){
				$data['album']=$this->admin_model->get_images();
					$data1 = array(
						'title' => 'Add Images',
						'content' => 'admin/add_images',
						'id' => 'media'
					);

				$this->load->view('admin/includes/template', array_merge($data,$data1));

			}
			public function addimages(){
						if(!empty($_FILES['file'])){
					  	foreach ($_FILES['file']['name'] as $key => $name) {
					  			$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
					  			$path1= uniqid().'.'.$ext;
						  		$path='assets/images/album/'.$path1;
						  		if($_FILES['file']['error'][$key]==0 && move_uploaded_file($_FILES['file']['tmp_name'][$key], $path)){
					  			$data=array(
									'path'=>$path1,
									'album_id'=>$this->input->post('id')
								);
							
					  			$this->admin_model->add_images($data);
							}
				  	 	}

					}
					redirect('admin/images/'.$this->input->post('id'));

			}
			public function deletealbum(){
								$data=$this->admin_model->get_album_image();
								foreach ($data as $datas) {
									$path='./assets/images/album/'.$datas->path;
									unlink($path);
								}
								$this->admin_model->delete_image();
								$this->admin_model->delete_album();
								redirect('admin/album');	
			}
			public function deleteimage(){
				$data=$this->db->where('id', $this->uri->segment(3))->get('images')->result();
				$path='./assets/images/album/'.$data[0]->path;
				$album_id=$data[0]->album_id;
				unlink($path);
				$this->db->where("id",$this->uri->segment(3));
				$this->db->delete('images');
				redirect('admin/images/'.$album_id);	
			}
			public function most(){
					$data = array(
						'title' => 'Most Viewed',
						'content' => 'admin/most_viewed',
						'id' => 'service'
					);

				$this->load->view('admin/includes/template', $data);

			}
			public function viewed(){
				$data=array(
					'package' => $this->input->post('most'),
					);
				
				if($this->admin_model->add_mostviewed($data)){
				$this->session->set_flashdata('msg', 'Most viewed added successfully!');
				redirect('admin/most');	
				}
				else{
				$this->session->set_flashdata('msg', 'no more than 3 most viewed');
				redirect('admin/most');
				}	
			}
			public function delete_most(){
				$this->db->where("id",$this->uri->segment(3));
				$this->db->delete('mostviewed');
				$this->session->set_flashdata('msg', 'Most Viewed Deleted');
				redirect('admin/most');

			}


}