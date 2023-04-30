<?php

class Customer_model extends CI_Model
{
	//Validate QID
	public function Validate_QID($qid_no)
	{
		$this->db->select("*");
		$this->db->where('qid_no', $qid_no);
		$result = $this->db->get("customer_details")->row();
		if (!empty($result)) {
			return false;
		} else {
			return true;
		}
	}

	//Validate Mobile Number
	public function Validate_Mobile_No($data)
	{
		$this->db->select("*");
		$this->db->where('customer_mob_no', $data['customer_mob_no']);
		$result = $this->db->get("customer_details")->row();
		if (!empty($result)) {
			return false;
		} else {
			return true;
		}
	}

	//Save Customer Information
	public function Save_Customer_Information($data)
	{
		$this->db->insert("customer_details", $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	//Get All Customer information
	public function Get_All_Customer_Info()
	{
		$this->db->select("id,qid_no,customer_name,customer_mob_no,customer_address,bal_amount");
		$this->db->where("is_active", 1);
		return $this->db->get("customer_details")->result();
	}

	//Get A Customer 
	public function Get_Customer_By_ID($id)
	{
		$this->db->select("*");
		$this->db->where('id', $id);
		$query = $this->db->get('customer_details');
		if (!empty($query)) {
			return $query->row();
		} else {
		}
	}


	//Validate Mobile Number By ID
	public function Validate_Mobile_No_ByID($data)
	{
		$this->db->select("*");
		$this->db->from('customer_details');
		$this->db->where('customer_mob_no', $data['customer_mob_no']);
		$this->db->where('id !=', $data['id']);
		$query = $this->db->get();
		$result = $query->row();

		if (!empty($result)) {
			return false;
		} else {
			return true;
		}
	}

	//Update Customer Information
	public function Update_Customer_Information($data)
	{
		$update_rows = array('customer_name' => $data['customer_name'], 'customer_mob_no' => $data['customer_mob_no'], 'customer_address' => $data['customer_address']);
		$this->db->where('id', $data['id']);
		$this->db->update('customer_details', $update_rows);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	//Before Delete Check Pending Status
	public function Check_Pending_Status($id)
	{
		$this->db->select("*");
		$this->db->from('vehicle_open');
		$this->db->where('customer_id', $id);
		$this->db->where('current_status !=', 'Close');
		$query = $this->db->get();
		$result = $query->row();
		if (!empty($result)) {
			return false;
		} else {
			return true;
		}
	}

	//Delete Customer Info
	public function Delete_Customer_Info($id)
	{
		$this->db->set('is_active', 0);
		$this->db->where('id', $id);
		$this->db->update('customer_details');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	//Update Account Balance
	public function Update_Account_Balance($id, $bal_amount)
	{
		$this->db->set('bal_amount', $bal_amount);
		$this->db->where('id', $id);
		$this->db->update('customer_details');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
