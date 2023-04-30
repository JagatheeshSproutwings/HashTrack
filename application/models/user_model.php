<?php

class User_model extends CI_Model
{
	public function getuser($data)
	{
		$this->db->select('id, user_type');
		$this->db->where('user_name', $data['username']);
		$this->db->where('password', $data['password']);
		$this->db->where('is_active', '1');
		$query = $this->db->get('user_details');
		$result = $query->row();
		return $result;
	}

	public function saveuser($data)
	{
		$this->db->insert('user_details', $data);
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
}
?>
