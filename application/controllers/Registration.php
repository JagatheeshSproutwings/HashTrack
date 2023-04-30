<?php
class Registration extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$this->load->view('registration_form');
	}

	public function Register()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user_details.user_name]', $messages = array(
			'required' => 'Username Fields is Empty', 'is_unique' => 'This Username is already exits'
		));

		$this->form_validation->set_rules('new_password', 'New Password', 'required', $messages = array(
			'required' => 'New Password Fields is Empty'
		));

		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]', $messages = array(
			'required' => 'Confirm Password Fields is Empty', 'matches' => 'New Password and Confirm Password Should be Same'
		));

		$this->form_validation->set_rules('user_type', 'User Type', 'required', $messages = array(
			'required' => 'User Type Fields is Empty'
		));

		if ($this->form_validation->run() == true) {
			if ($this->input->post('submit')) {
				$data['user_name'] = $this->input->post('username');
				$data['password'] = $this->input->post('new_password');
				$data['user_type'] = $this->input->post('user_type');

				$result = $this->user_model->saveuser($data);
				if ($result == true) {
					$this->load->view('login_page');
				} else {
					$this->load->view('registration_form');
				}
			}
		} else {
			$this->load->view('registration_form');
		}
	}
}
?>
