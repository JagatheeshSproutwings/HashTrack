<?php

class Vehicle_model extends CI_Model
{



	//Get All Vehicle List
	public function Get_Vehicle_List()
	{
		$this->db->select('vehicleid,vehiclename');
		$query = $this->db->get('vehicletbl');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "";
		}
	}

	//Brand List
	public function Get_Brand_List()
	{
		$this->db->select('id,brand_name');
		$query = $this->db->get('brand');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "";
		}
	}

	//Type List
	public function Get_Vehicle_Type_List()
	{
		$this->db->select('id,vehicle_type');
		$query = $this->db->get('vehicle_type');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "";
		}
	}

	// Model list By Brand
	public function Get_Model_List_By_BrandID($brand_id)
	{
		$this->db->select('id,model_name');
		$this->db->where('brand_id', $brand_id);
		$query = $this->db->get('model');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "";
		}
	}

	// Year list By Model
	public function Get_Year_List_By_BrandID($model_id)
	{
		$this->db->select('id,year_name');
		$this->db->where('model_id', $model_id);
		$query = $this->db->get('year');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "";
		}
	}

	//Save Vehicle Info
	public function Save_Vehicle_Information($data)
	{
		$this->db->insert("vehicle_details", $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	//Get All Vehicle
	public function Get_All_Vehicle_Info()
	{
		$query = $this->db->query("SELECT A.id,A.vehicle_number, A.odometer, B.vehicle_type, C.brand_name, D.model_name, E.year_name, A.vehicle_name, A.vehicle_insurance_number, A.registration_date, A.insurance_start_date, A.insurance_end_date, A.rent_per_day, F.condition_status_name, G.active_status_name FROM vehicle_details A INNER JOIN vehicle_type B ON A.vehicle_type_id= B.id INNER JOIN brand C ON A.brand_id = C.id INNER JOIN model D ON A.model_id = D.id INNER JOIN year E ON A.year_id = E.id INNER JOIN condition_status F ON A.condition_status_id=F.id INNER JOIN active_status G ON A.active_status_id = G.id");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}


	//Get All Vehicle By ID
	public function Get_Vehicle_By_ID($id)
	{
		$query = $this->db->query("SELECT A.id,A.vehicle_number, A.odometer, B.vehicle_type, C.brand_name, D.model_name, E.year_name, A.vehicle_name, A.vehicle_insurance_number, A.registration_date, A.insurance_start_date, A.insurance_end_date, A.rent_per_day, F.condition_status_name, G.active_status_name FROM vehicle_details A INNER JOIN vehicle_type B ON A.vehicle_type_id= B.id INNER JOIN brand C ON A.brand_id = C.id INNER JOIN model D ON A.model_id = D.id INNER JOIN year E ON A.year_id = E.id INNER JOIN condition_status F ON A.condition_status_id=F.id INNER JOIN active_status G ON A.active_status_id = G.id WHERE A.id = '" . $id . "'");
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
	}









	//Get all Vehicle List for adding rent..
	public function all_vehicle_list()
	{
		$this->db->select('vehicleid,vehiclename,vehiclemodel,odometer');
		$query = $this->db->get('vehicletbl');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "";
		}
	}

	//Get all Vehicle List for adding rent..
	public function rent_all_vehicle_list()
	{
		$this->db->select('id,vehicle_name,model_no,rent_per_day');
		$query = $this->db->get('vehicle_details');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "";
		}
	}


	public function addvehiclerent($id)
	{
		$this->db->where('vehicleid', $id);
		$query = $this->db->get('vehicletbl');
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return "";
		}
	}

	public function IsRentedVehicleOrNot($data)
	{
		$this->db->select('*');
		$this->db->where('ref_vehicle_id', $data['ref_vehicle_id']);
		$query = $this->db->get('vehicle_details');
		if ($query->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}

	public function saverentdetails($data)
	{
		$this->db->insert('vehicle_details', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {

			return false;
		}
	}

	public function getcustomerhavevehicle($qidno)
	{
		$this->db->select('*');
		$this->db->from('customer_details');
		$this->db->join('vehicle_open', 'customer_details.id = vehicle_open.customer_id');
		$this->db->where('current_status', 'Open');
		$this->db->where('qid_no', $qidno);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}

	public function getcustomername($qidno)
	{
		$this->db->select('id,customer_name,bal_amount');
		$this->db->where('qid_no', $qidno);
		$query = $this->db->get('customer_details');
		if ($query->num_rows() > 0) {
			return $query->row();
		}
	}

	public function checkstatus($VehicleNo)
	{
		$this->db->select('vehicle_status');
		$this->db->where('vehicle_name', $VehicleNo);
		$query = $this->db->get('vehicle_details');
		if ($query->num_rows() > 0) {
			return $query->row();
		}
	}

	public function getvehicleDetails($VehicleNo)
	{
		$this->db->select('id,vehicle_name,model_no,odometer,rent_per_day');
		$this->db->where('vehicle_name', $VehicleNo);
		$this->db->where('vehicle_status', 'Active');
		$query = $this->db->get('vehicle_details');
		if ($query->num_rows() > 0) {
			return $query->row();
		}
	}

	public function GetCustomerwithVehicle($id)
	{
		$this->db->select('vehicle_open.ref_no, vehicle_open.open_date,  vehicle_open.per_day_rent, vehicle_open.vehicle_id, vehicle_open.agreement_no, customer_details.customer_name, customer_details.qid_no,  vehicle_open.customer_id, vehicle_details.vehicle_name, vehicle_details.model_no, vehicle_details.odometer, vehicle_open.per_day_rent, vehicle_open.credit_limit, vehicle_open.current_status');
		$this->db->from('vehicle_open');
		$this->db->join('customer_details', 'customer_details.id = vehicle_open.customer_id');
		$this->db->join('vehicle_details', 'vehicle_details.id = vehicle_open.vehicle_id');
		$this->db->where('vehicle_open.ref_no', $id);
		$this->db->where('vehicle_open.current_status', 'Open');

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return "";
		}
	}

	public function SaveVehicleOpenDet($data)
	{
		$this->db->trans_start();
		$this->db->insert('vehicle_open', $data);

		$this->db->set('vehicle_status', 'Open');
		$this->db->where('id', $data['vehicle_id']);
		$this->db->update('vehicle_details');

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			return "not saved";
		} else {
			return "saved";
		}
	}

	public function vehicle_open_details()
	{
		$this->db->select('vehicle_open.ref_no, vehicle_open.open_date, vehicle_open.vehicle_id, vehicle_open.agreement_no, customer_details.customer_name, vehicle_details.vehicle_name, vehicle_open.per_day_rent, vehicle_open.credit_limit, vehicle_open.current_status');
		$this->db->from('vehicle_open');
		$this->db->join('customer_details', 'customer_details.id = vehicle_open.customer_id');
		$this->db->join('vehicle_details', 'vehicle_details.id = vehicle_open.vehicle_id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "";
		}
	}

	public function getvehicleopendetails($qid)
	{
		$this->db->select('customer_details.id,customer_details.customer_name, vehicle_open.vehicle_id, vehicle_details.vehicle_name, vehicle_details.model_no, vehicle_details.model_no, vehicle_details.odometer, vehicle_open.open_date, vehicle_open.agreement_no, vehicle_open.credit_limit');
		$this->db->from('vehicle_open');
		$this->db->join('customer_details', 'customer_details.id = vehicle_open.customer_id');
		$this->db->join('vehicle_details', 'vehicle_details.id = vehicle_open.vehicle_id');
		$this->db->where('customer_details.qid_no', $qid);
		$this->db->where('vehicle_details.vehicle_status', 'open');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return "";
		}
	}

	public function ChangeOpenStatus($old_agreement_no)
	{
		$this->db->set('current_status', 'Close');
		$this->db->where('agreement_no', $old_agreement_no);
		$query = $this->db->update('vehicle_open');
	}

	public function ChangeVehicleStatus($old_vehicle_id)
	{
		$this->db->set('vehicle_status', 'Active');
		$this->db->where('id', $old_vehicle_id);
		$this->db->update('vehicle_details');
	}

	public function close_vehicle($customer_id, $bal_amount, $agreement_no, $old_vehicleid)
	{
		$this->db->set('vehicle_status', 'Active');
		$this->db->where('id', $old_vehicleid);
		$this->db->update('vehicle_details');

		$this->db->set('current_status', 'Close');
		$this->db->where('agreement_no', $agreement_no);
		$this->db->update('vehicle_open');

		$this->db->set('bal_amount', $bal_amount);
		$this->db->where('id', $customer_id);
		$this->db->update('customer_details');
	}

	public function UpdateCustomerBalance($data)
	{
		$this->db->set('bal_amount', $data['credit_limit']);
		$this->db->where('id', $data['customer_id']);
		$this->db->update('customer_details');
	}
}
