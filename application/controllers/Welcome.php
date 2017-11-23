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
		$this->load->model("viajantes_model");// chama o modelo usuarios_model

		 
	}


	public function index()
	{
		$this->load->view('header');
		$this->load->view('welcome_message');
		$this->load->view('footer');
	}

	public function logar()
	{
		$this->load->view('signin');
	}

	public function registrar()
	{
		
        $this->load->view('signup');
		
		
	}

	public function check_database($password){
    $entrada  = $this->input->post('entrada');
    $password = $this->input->post('password');
    $result = $this->viajantes_model->Verificarlogin($entrada, $password);
    if($result){
      $sess_array = array();
      foreach($result as $row){
        $sess_array = array(
                       'id'=>$row->id,
                       'login'=>$row->login
                      );
        $this->session->set_userdata($sess_array);

      }

      return true;

    }else{
      $this->form_validation->set_message('check_database', 'Invalid Username or Password.');
      return false;
    }
  }

	 public function autenticar(){
 
		$this->form_validation->set_rules('entrada', 'Username Email', 'trim|required');
    	$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
    if($this->form_validation->run() == FALSE){
            $data['formErrors'] = validation_errors();
            $this->load->view('signin',$data);
    }else{
     //redirect('homepage', 'refresh');
     //$this->session->set_userdata('loggedIn');
     
     $this->load->view('header');
     $this->load->view('principal');
     $this->load->view('footer'); 

    }


        //$this->load->model("viajantes_model");// chama o modelo usuarios_model
        //$email = $this->input->post("entrada");// pega via post o email que venho do formulario
        //$senha = $this->input->post("senha"); // pega via post a senha que venho do formulario
        //$usuario = $this->viajantes_model->VerificarLogin($email,$senha); // acessa a função buscaPorEmailSenha do modelo
 
        //if($usuario){
        //    $this->session->set_userdata("usuario_logado", $usuario);
        //    $dados = array("mensagem" => "Logado com sucesso!");
        //}else{
        //    $dados = array("mensagem" => "Não foi possível fazer o Login!");
        //}
 
        //$this->load->view("login/autenticar", $dados);
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
