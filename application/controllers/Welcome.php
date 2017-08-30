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
		$data['nome'] = $this->input->post('firstname');
		$data['sobrenome'] = $this->input->post('lastname');
		$data['email'] = $this->input->post('inputemail');
		$data['login'] = $this->input->post('username');
		$data['senha'] = $this->input->post('inputpassword');
		
		if($this->db->insert('viajantes',$data)) {
			$data['msg'] = 'Your user has been registered please signin';	
		    $this->load->view('signin',$data);
			} else
		{
			redirect('welcome/signup');
		}
		
	}

}
