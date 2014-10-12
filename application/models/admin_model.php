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

	function get_dashboard_services(){
		return $this->db->order_by('id', 'desc')->limit(5)->get('package')->result();
	}

	function get_dashboard_image($id){
		$image = $this->db->where('package_id', $id)->get('package_image')->num_rows();

		if($image == 0){
			return array('path' => 'default.jpg');
		}

		return $this->db->where('package_id', $id)->order_by('id', 'desc')->limit(1)->get('package_image')->result();
	}

	function file($name){
		$data = array(
			$this->input->post('type') => $name
		);
		if($this->db->where('id', 1)->update('files', $data)){
			return true;
		}
		return false;
	}

	function special($data){
		$check = $this->db->where('name', $data['name'])->get('special')->num_rows();
		if($check<1){
			if($this->db->insert('special', $data)){
				return true;
			}
			return false;
		}
		return false;
		
	}

	function update_special($data){
		if($this->db->where('id', $this->input->post('id'))->update('special', $data)){
			return true;
		}
		return false;
	}

	function news($data){
		$row = $this->db->where('title', $data['title'])->get('news')->num_rows();
		if($row>1){
			return false;
		}
		$this->db->insert('news', $data);
		return true;
	}

	function check_title(){
		$duplicate = $this->db->where('title', $this->input->post('title'))->get('news')->num_rows();
		if($duplicate > 0){
			$questions = $this->db->where('title', $this->input->post('title'))->where('id', $this->input->post('id'))->get('news')->num_rows();
			if($questions == 1){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return true;
		}
	}

	function check_special_title(){
		$duplicate = $this->db->where('name', $this->input->post('title'))->get('special')->num_rows();
		if($duplicate > 0){
			$questions = $this->db->where('name', $this->input->post('title'))->where('id', $this->input->post('id'))->get('special')->num_rows();
			if($questions == 1){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return true;
		}
	}

	function add_testimonials($data){
		$this->db->insert("testimonials",$data);
		return ;
	}
	
	function delete_testimonials(){
		$this->db->where("id",$this->uri->segment(3));
		$this->db->delete('testimonials');
		return;
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
		$results=$this->db->get_where('service',array('id'=>$this->uri->segment(3)))->result();
		 return $results[0];
	}
	function delete_service(){
		$this->db->where("id",$this->uri->segment(3));
		$this->db->delete('service');
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
	function add_package_image($data){
		$num_rows = $this->db->where('package_id', $this->input->post('package_id'))->get('package_image')->num_rows();

		if($num_rows > 3){
			return "You cannot put more than 4 image for 1 package.";
		}
		$this->db->insert('package_image', $data);
		return true;
	}
	function delete_package_img($data){
			$this->db->where("id",$data);
		$this->db->delete('package_image');
		return;
	}
	function delete_package_images($data){
		foreach ($data as $datas) {
		$this->db->where("id",$datas->id);
		$this->db->delete('package_image');
		}
		return;
	}
	function delete_package(){
		$this->db->where("id",$this->uri->segment(3));
		$this->db->delete('package');
		return;
	}
	function delete_package_serv(){
		$this->db->where("service_id",$this->uri->segment(3));
		$this->db->delete('package');
		return;
	}
	function add_video($data){
		if($this->db->insert('videos',$data)){
			return 1;
		}
		else{
			return 0;
		}
	}
	 function get_videos(){
	 	$this->db->select('*');
	    $result=$this->db->get('videos')->result();
	    return $result;
	 }

	 function delete_video(){
	 	$this->db->where("video_id",$this->uri->segment(3));
	 	$this->db->delete('videos');
	 	return 1;
	 }
	function add_object_slider($data){
		if($this->db->get('slide')->num_rows() > 5){
			$this->session->set_flashdata('msg', 'You cannot add more than 5 images.');
			return false;
		}
		else{
			$this->db->insert("slide",$data);
			return ;
			}	
		}
	function get_object_slider(){

		$results=$this->db->get('slide')->result();
		return $results;
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
	function add_images($data){
		$this->db->insert("images",$data);
		return ;
	}
	function get_images(){
		$results=$this->db->get_where('images',array('album_id'=>$this->uri->segment(3)))->result();
		 return $results;
	}
	function add_object_album($data){
		$this->db->insert("album",$data);
		return ;
	}
	function get_object_album(){
		$results=$this->db->order_by('id', 'desc')->get('album')->result();
		return $results;
	}
	function get_object_album_user(){
		$this->db->select("album.id,album.name,images.path,images.album_id");
		$this->db->from("album");
		$this->db->join("images", "album.id=images.album_id");
	 	$results=$this->db->get()->result();
		return $results;
	}

	function get_album_cover_image($id) {
		$image = $this->db->where('album_id', $id)->get('images')->num_rows();
		if($image == 0){
			return array('path' => 'default.jpg');
		}

		return $this->db->where('album_id', $id)->order_by('id', 'desc')->limit(1)->get('images')->result();
	}

	function get_album_image(){
		$results=$this->db->get_where('images',array('album_id'=>$this->uri->segment(3)))->result();
	 	return $results;
	}
	function delete_image(){
		$this->db->where("album_id",$this->uri->segment(3));
			$this->db->delete('images');
			return;
	}
	function delete_album(){
		$this->db->where("id",$this->uri->segment(3));
			$this->db->delete('album');
			return;
	}
	function add_mostviewed($data){
		$num_rows = $this->db->get('mostviewed')->num_rows();

		if($num_rows > 2){
			return false;
		}
		$this->db->insert('mostviewed', $data);
		return true;
	}

}