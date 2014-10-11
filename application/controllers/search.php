<?php

  class Search extends CI_Controller{
  	function index(){
  		$data=array(
  				'title'=>'search',
  				'content'=>'users/search'
  			);
  		$this->load->view('users/includes/template',$data);
  	}

  	function search_content(){
  		$this->load->library('form_validation');

		$this->form_validation->set_rules('search_content', 'Content', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('feedback', 'place a item OR category!');
			redirect('search');
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
				redirect('search');
			}
			
		}
	}

	function audio(){
		$data = array(
						'title' => 'audio',
						'content' => 'users/audio'
					);
		$this->load->view('users/includes/template',$data);
	}
  }