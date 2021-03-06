<?php 


class Admin_model extends CI_Model {

	function login_validate(){
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', sha1($this->input->post('password')));
		if($this->db->get('admin')->num_rows() == 1){
			return true;
		}
		return "Username and password does no match.";
	}

	function change_username(){
		$this->db->where('password', sha1($this->input->post('password')));
		if($this->db->get('admin')->num_rows() == 1 ){

			$data = array(
				'username' => $this->input->post('new_username')
			);

			$this->db->where('password', sha1($this->input->post('password')));
			$update = $this->db->update('admin', $data);

			if($update){
				return true;
			}
			return false;
		}
		return "Invalid password.";
	}

	function change_password(){
		$this->db->where('password', sha1($this->input->post('current_password')));
		if($this->db->get('admin')->num_rows() == 1){

			$data = array(
				'password' => sha1($this->input->post('new_password'))
			);

			$this->db->where('username', $this->session->userdata('admin'));
			if($this->db->update('admin', $data)){
				return true;
			}
			return false;
		}
		return "Invalid current password.";
	}

	function change_email(){
		$this->db->where('password', sha1($this->input->post('password')));
		if($this->db->get('admin')->num_rows() == 1){

			$data['email'] = $this->input->post('new_email');

			$this->db->where('username', $this->session->userdata('admin'));
			if($this->db->update('admin', $data)){
				return true;
			}
			return false;
		}
		return "Invalid password.";
	}

	function change_contact_info(){
		$this->db->where('password', sha1($this->input->post('admin_password')));
		if($this->db->get('admin')->num_rows() == 1){

			$data = array(
				'contact_email' => $this->input->post('contact_email'),
				'contact_password' => $this->encrypt->encode($this->input->post('contact_password'))
			);

			if($this->db->get('contact_info')->num_rows()<1){
				if($this->db->insert('contact_info', $data)){
					return true;
				}
				return false;
			}

			else{
				if($this->db->update('contact_info', $data, `id=1`)){
					return true;
				}
				return false;
			}
		}
		return "Invalid Admin Password.";
	}
	
	function add_services($data){
		if($this->db->insert("categories",$data)){
			return true;
		}
		return false;
	}
	function get_services(){
		$results=$this->db->order_by('id', 'desc')->get('categories')->result();
		return $results;
	}
	function get_particular_service(){
		$results=$this->db->get_where('categories',array('id'=>$this->uri->segment(3)))->result();
		 return $results[0];
	}
	function delete_service(){
		$this->db->where("id",$this->uri->segment(3));
		$this->db->delete('categories');
		return;
	}
	function add_package($data){
		if($this->db->insert("package",$data)){
			return $this->db->insert_id();
		}
		return false;
	}
	function update_package($data){
		if($this->db->where('id', $data['id'])->update('package', $data)){

			return true;
		}

		return false;
	}
	function update_package_banner($path2){
		$data=array('banner'=>$path2);
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('package',$data);
		return;
	}
	function add_package_image($data){
		$num_rows = $this->db->where('ad_id', $this->input->post('id'))->get('package_image')->num_rows();

		if($num_rows > 4){
			unlink('./assets/images/'.$data['path']);
			return "You cannot put more than 5 image for 1 Ad.";
		}
		else{
			$this->db->insert('package_image', $data);
			return true;
		}
		return false;
	}
	function delete_package_img($data){
			$this->db->where("id",$data);
		$this->db->delete('package_image');
		return;
	}

	function delete_package(){
		$banner = $this->db->get('banner')->result();
		for($i=1; $i<=4; $i++){
			$bannerid = "banner".$i;
			if($this->uri->segment(3) == $banner[0]->$bannerid){
				$this->db->update('banner', array($bannerid => NULL));
			}
		}
		$this->db->where("id",$this->uri->segment(3));
		$this->db->delete('package');
		return;
	}
	function delete_package_serv(){
		$banner = $this->db->get('banner')->result();
		for($i=1; $i<=4; $i++){
			$pack = $this->db->where('ad_id', $this->uri->segment(3))->get('package')->result();
			foreach($pack as $p){
				$bannerid = "banner".$i;
				if($p->id == $banner[0]->$bannerid){
					$this->db->update('banner', array($bannerid => NULL));
				}
			}
		}
		$this->db->where("ad_id",$this->uri->segment(3));
		$this->db->delete('package');
		return;
	}

	function add_object_slider($data){
		if($this->db->where('slider', $this->input->post('slider'))->get('slide')->num_rows() > 5){
			$this->session->set_flashdata('msg', 'You cannot add more than 5 images.');
			return false;
		}
		else{
			$this->db->insert("slide",$data);
			return true;
		}	
	}
	
	function delete_object(){
			$this->db->where("id",$this->uri->segment(3));
			$this->db->delete('slide');
			return;
	}
	function get_object(){
			$results=$this->db->get_where('slide',array('id'=>$this->uri->segment(3)))->result();
	 	return $results[0];
	}

	function banner_update(){
		$data = array(
			$this->input->post('banner') => $this->input->post('ad_id')
		);

		if($this->db->where('id', 1)->update('banner', $data)){
			return true;
		}
		return false;
	}

	function audio(){

		$name = $_FILES['audio']['name'];
		$ext = strtolower(end((explode(".", $name))));
		if($ext=="mp3"){
			$path = $this->input->post('id').'.mp3';
			$store = 'assets/audio/'.$path;
			if($_FILES['audio']['error'] == 0 && move_uploaded_file($_FILES['audio']['tmp_name'], $store)){
				if($this->db->where('id', $this->input->post('id'))->update('package', array('audio'=>$path))){
					return "Audio Uploaded";
				}
			}
			return "Error Occurred. Try Again";
		}
		else{
			return "Please seelct mp3 file.";
		}
	}

	function remove_audio(){
		$audio = $this->db->where('id', $this->uri->segment(3))->get('package')->result();
		if(unlink('./assets/audio/'.$audio[0]->audio)){
			$data = array(
				'audio' => ''
			);
			if($this->db->where('id', $this->uri->segment(3))->update('package',$data)){
				return "Audio Removed";
			}
		}
		return "Error Occurred. Please Try Again.";
	}

	function add_member(){

		$name = $_FILES['image']['name'];
		$ext = strtolower(end((explode(".", $name))));
		if($ext=="jpg" || $ext=="png" || $ext="gif"){
			$path = uniqid().'.'.$ext;
			$store = 'assets/images/'.$path;
			if($_FILES['image']['error'] == 0 && move_uploaded_file($_FILES['image']['tmp_name'], $store)){
				$data = array(
					'name' => $this->input->post('name'),
					'post' => $this->input->post('post'),
					'path' => $path,
					'about' => $this->input->post('about')
				);

				if($this->db->insert('team', $data)){
					return true;
				}
			}
		}
		return false;

	}

	function remove_member(){
		$team = $this->db->where('id', $this->uri->segment(3))->get('team')->result();
		$path = './assets/images/'.$team[0]->path;
		unlink($path);
		if($this->db->where('id', $this->uri->segment(3))->delete('team')){
			return true;
		}
		return false;
	}

}