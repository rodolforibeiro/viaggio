<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
	}


	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function logar()
	{
		$this->load->view('signin');
	}

	public function registrar()
	{
		
        $this->load->view('signup');
		
		
	}

public function cadastrar()
	{
		
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email Address','required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[confirmpassword]');
		$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required');
		if($this->form_validation->run() == FALSE)
		{
            $data['formErrors'] = validation_errors();
            $this->load->view('signup',$data);
		}else
		{
			$data['nome'] = $this->input->post('firstname');
			$data['sobrenome'] = $this->input->post('lastname');
			$data['email'] = $this->input->post('email');
			$data['login'] = $this->input->post('username');
			$data['senha'] = md5($this->input->post('password'));
		
			if($this->db->insert('viajantes',$data)) 
				{
					$data['msg'] = 'Your user has been registered please signin';	
		    		$this->load->view('signin',$data);
				} else
				{
					redirect('welcome/signup');
				}
		}
		
	}

}
