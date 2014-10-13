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

		/*$data['service']=$this->admin_model->get_dashboard_services();
		$data['slider'] = $this->db->limit(3)->get('slide')->result();*/

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

	/*About Us Functions*/
/*--------------------------------------------------------------------------------------------------------------------------------*/

	public function aboutus(){
		$data1['about'] = $this->db->get('aboutus')->result();
		$data = array(
			'title' => 'About Us',
			'content' => 'admin/aboutus',
			'id' => 'aboutus'
		);

		$this->load->view('admin/includes/template',array_merge($data,$data1));
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

	function addaboutus(){
		$data = array(
			'description' => $this->input->post('about')
		);
		$this->db->update('aboutus', $data, "id = 1");
		redirect('admin/aboutus');
	}

/*---------------------------------------------------------------------------------------------------------------------------------*/

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
		$data['service']=$this->db->where('id', $this->uri->segment(3))->get('categories')->result();
		if(empty($data['service'])){
			show_404();
		}
		$data['package']=$this->db->where('ad_id', $this->uri->segment(3))->get('package')->result();
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
		$this->load->view('admin/includes/template', $data);
	}

	function events_post(){
		$data=array(
			'name'=>$this->input->post('name'),
			'description'=>$this->input->post('description'),
			'info'=>$this->input->post('info'),
			'video'=>$this->input->post('video'),
			'ad_id'=>$this->input->post('id'),
		);

		$package=$this->admin_model->add_package($data);

		foreach ($_FILES['file']['name'] as $key => $name) {
			$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
			$path1= uniqid().'.'.$ext;
			$path='assets/images/'.$path1;
			if($_FILES['file']['error'][$key]==0 && move_uploaded_file($_FILES['file']['tmp_name'][$key], $path)){
				$data1=array(
					'ad_id' => $package,
					'path'=>$path1,
				);
				if($this->admin_model->add_package_image($data1)){
					redirect('admin/service_detail/'.$this->input->post('id'));
				}
				else{
					$this->session->set_flashdata('msg', 'Something went wrong. Please try again.');
					redirect('admin/add_events/'.$this->input->post('id'));
				}
			}
		}
			
	}

	function audio(){
		$data = array(
			'title' => 'Add Audio',
			'content' => 'admin/audio',
			'id' => 'service'
		);

		$this->load->view('admin/includes/template', $data);
	}

	function add_audio(){
		echo $this->admin_model->do_upload();
		die();
	}

	function edit_package(){
		$data = array(
			'title' => " EditEvents",
			'content' => 'admin/edit_package',
			'id' => 'service'
		);
		$data['package']=$this->db->where('id', $this->uri->segment(3))->get('package')->result();
		if(empty($data['package'])){
			show_404();
		}
		$data['package_img']=$this->db->where('ad_id', $this->uri->segment(3))->get('package_image')->result();
		$this->load->view('admin/includes/template', $data);

	}
	function events_postupdate(){
		$data=array(
			'id'=>$this->input->post('id'),
			'name'=>$this->input->post('name'),
			'description'=>$this->input->post('description'),
			'info'=>$this->input->post('info'),
			'video'=>$this->input->post('video'),
			'ad_id'=>$this->input->post('service_id'),
		);

		if($this->admin_model->update_package($data)){
			redirect('admin/service_detail/'.$this->input->post('service_id'));
		}
		else{
			$this->session->set_flashdata('msg', 'Error Occurred. Please try again');
			redirect('admin/edit_package/'.$this->input->post('id'));
		}
		
	}

	function Package_image_add(){

	if(!empty($_FILES['file'])){
			foreach ($_FILES['file']['name'] as $key => $name) {
	  			$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
	  			$path1= uniqid().'.'.$ext;
		  		$path='assets/images/'.$path1;
		  		if($_FILES['file']['error'][$key]==0 && move_uploaded_file($_FILES['file']['tmp_name'][$key], $path)){
					$data=array(
					'ad_id' => $this->input->post('package_id'),
					'path'=>$path1,
					);
				}

				if($this->admin_model->add_package_image($data)){
					redirect('admin/edit_package/'.$this->input->post('package_id'));
				}
				else{
					$this->session->set_flashdata('msg', 'Something went wrong. Please try again.');
					redirect('admin/edit_package/'.$this->input->post('package_id'));
				}
			}
			

		}
		else{
			redirect('admin/edit_package/'.$this->input->post('package_id'));
		}
	}

	public function delete_package(){
		$data=$this->db->where('id', $this->uri->segment(3))->get('package')->result();
		$data=$this->db->where('ad_id', $data[0]->id)->get('package_image')->result();
		foreach ($data as $datas ) {
			$path='./assets/images/'.$datas->path;
			unlink($path);
			$this->db->where('ad_id',$datas->ad_id)->delete('package_image');
		}
		
		$data=$this->db->where('id', $this->uri->segment(3))->get('package')->result();
		$this->admin_model->delete_package();
		redirect('admin/service_detail/'.$data[0]->ad_id);
	}

	public function delete_package_img(){
		$data=$this->db->where('id', $this->uri->segment(3))->get('package_image')->result();
		$path='./assets/images/'.$data[0]->path;
		unlink($path);
		$this->admin_model->delete_package_img($data[0]->id);
		redirect('admin/edit_package/'.$data[0]->ad_id);
	}


	public function deleteservice(){
		$data=$this->db->where('ad_id', $this->uri->segment(3))->get('package')->result();

		foreach ($data as $datad ) {									
		$datass=$this->db->where('ad_id', $datad->id)->get('package_image')->result();
			foreach ($datass as $datas ) {
				$path='./assets/images/'.$datas->path;
				unlink($path);
				$this->db->where('ad_id', $datas->ad_id)->delete('package_image');
			}
			$this->admin_model->delete_package_serv();
		}
		$data=$this->admin_model->get_particular_service();
		$re=$data->option_id;
		$this->admin_model->delete_service();		
		redirect('admin/services/'.$re);
	}
				
	public function slider()
	{
		$data = array(
			'title' => 'Add Slider',
			'content' => 'admin/add_objects',
			'id' => 'media',
			'first' => $this->db->where('slider', 1)->order_by('id', 'desc')->get('slide')->result(),
			'second' => $this->db->where('slider', 2)->order_by('id', 'desc')->get('slide')->result(),
			'third' => $this->db->where('slider', 3)->order_by('id', 'desc')->get('slide')->result(),
			'fourth' => $this->db->where('slider', 4)->order_by('id', 'desc')->get('slide')->result(),
			'fifth' => $this->db->where('slider', 5)->order_by('id', 'desc')->get('slide')->result(),
		);
		$this->load->view('admin/includes/template', $data);
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
			'path'=>$path1,
			'name' => $this->input->post('name'),
			'slider' => $this->input->post('slider')
		);

		if($this->admin_model->add_object_slider($data)){
			$this->session->set_flashdata('msg', 'Slider Added.');
		}
		redirect('admin/slider');
	}

	public function deleteobject(){
		$data=$this->admin_model->get_object();
		$path='./assets/images/'.$data->path;
		unlink($path);
		$product=$this->admin_model->delete_object();
		redirect('admin/slider');			
	}

	function banner(){
		$data = array(
			'title' => 'banner',
			'content' => 'admin/banner',
			'id' => 'banner',
			'ads' => $this->db->get('package')->result(),
			'banner' => $this->db->get('banner')->result()
		);

		$this->load->view('admin/includes/template', $data);
	}

	function banner_update(){
		if($this->admin_model->banner_update()){
			$this->session->set_flashdata('msg', 'Banner Update');
			redirect('admin/banner');
		}
		else{
			$this->session->set_flashdata('msg', 'Error. Please try again.');
			redirect('admin/banner');
		}
	}


}