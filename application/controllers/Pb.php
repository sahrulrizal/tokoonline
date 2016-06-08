<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pb extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mb');
	}

	public function verif_login()
	{
		$this->mb->verif_login();	
	}

	public function a22s404()
	{
		$this->load->view('error_404');
	}

	public function infeedback()
	{
		$this->mb->infeedback();
	}
}
