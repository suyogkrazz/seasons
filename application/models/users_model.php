<?php 

class Users_model extends CI_Model {
	function captcha(){
		// First, delete old captchas
		$expiration = time()-7200; // Two hour limit
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);

		// Then see if a captcha exists:
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($this->input->post('captcha'), $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();

		if ($row->count == 0)
		{
		    return false;
		}
		else{
			return true;
		}
	}

	function get_video(){
		return $this->db->where('video_id',$this->uri->segment(3))->get('videos')->result();

	}

	function search_content($search_content){
		$where = "(category LIKE '%".$search_content."%' OR discription  LIKE '%".$search_content."%')";
		$this->db->select('*');
		$this->db->where($where);
		$result=$this->db->get('search')->result();
		return $result;
	}
}