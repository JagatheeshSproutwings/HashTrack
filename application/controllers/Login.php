<?php
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		if (!$this->session->has_userdata('user_id')) {
			$this->load->view('login_form');
		} else {
			$this->load->view('header');
			$this->load->view('home');
			$this->load->view('footer');
		}
	}

	public function LoginValidate()
	{
		$this->form_validation->set_rules('username', 'Username', 'required', array('required' => 'Enter the Username'));
		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Enter the Password'));

		if ($this->form_validation->run() == true) {
			if ($this->input->post('submit')) {
				$data['username'] = $this->input->post('username');
				$data['password'] = $this->input->post('password');
				$result = $this->user_model->getuser($data);
				if ($result != null) {
					$this->session->set_userdata('user_id', $result->id);
					redirect(base_url());
				} else {
					$this->session->set_flashdata('error', "Login Failed");
					$this->load->view('login_form');
				}
			}
		} else {
			$this->load->view('login_form');
		}
	}

	public function AppLogout()
	{
		$this->session->unset_userdata('user_id');
		redirect(base_url());
	}
}
?>
