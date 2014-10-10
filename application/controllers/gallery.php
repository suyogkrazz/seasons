<?php

class Gallery extends CI_Controller {

	function index(){
		$data = array(
			'title' => 'Gallery',
			'content' => 'users/gallery'
		);
		$this->load->view('users/includes/template', $data);
	}
	function images(){
		$data['album']=$this->admin_model->get_object_album();
		$data['album_photo']=$this->admin_model->get_images();
						$data1 = array(
						'title' => 'Images',
						'content' => 'users/images'
					);

					$this->load->view('users/includes/template', array_merge($data,$data1));
	}
	public function videos(){
			$data = array(
					'title' => 'videos',
					'content' => 'users/videos'
				);
			$data['videos']=$this->users_model->get_video();
			$this->load->view('users/includes/template', $data);
	}
}