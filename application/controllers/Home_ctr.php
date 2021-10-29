<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_ctr extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function Index()
	{
		if (!empty($this->session->userdata('Usu_id'))) {
			
		 $this->load->view('/Layout/Header');
			$this->load->view('/Home/Index');

			
		} else {
			redirect('../');
		}
	}

    
}
