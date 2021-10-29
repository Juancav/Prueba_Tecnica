<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/El_Salvador');
class Configuracion_ctr extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->model('Configuracion_mdl');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		if (!empty($this->session->userdata('Usu_id'))) {

			if ($this->session->userdata('Usu_rol_usuario') == 'ADMINISTRADOR') {
				$this->load->view('/Layout/Header');
				$this->load->view('/Configuracion/Index');
			} else {
				header('location: Home');
			}
		} else {
			redirect('../');
		}
	}

	//Crear opcion general para el menu lateral
	public function Crear_usuario()
	{

		if ($this->input->is_ajax_request()) {

			$Datos = array(
				'Usu_email' => $this->input->post('txt-email-usuario'),
				'Usu_contraseña' => password_hash($this->input->post('txt-contraseña-usuario'), PASSWORD_DEFAULT),
				'Usu_nombres' => $this->input->post('txt-nombre-usuario'),
				'Usu_apellido' =>  $this->input->post('txt-apellido-usuario'),
				'Usu_rol_usuario' => $this->input->post('txt-rol-usuario'),
				'Usu_fecha_registro' => date('Y-m-d'),
			);

			echo $this->Configuracion_mdl->Crear_usuario($Datos);
		} else {
			echo 0;
		}
	}

	//Crear opcion general para el menu lateral
	public function Ver_usuarios()
	{


		if ($this->input->is_ajax_request()) {


			echo json_encode($this->Configuracion_mdl->Ver_usuarios());
		} else {
			echo "Metodo de acceso incorrecto";
		}
	}

	public function Eliminar_usuario()
	{

		if ($this->input->is_ajax_request()) {

			$Id = $this->input->post('Id');
			echo json_encode($this->Configuracion_mdl->Eliminar_usuario($Id));
		} else {
			echo "Metodo de acceso incorrecto";
		}
	}

	//Crear opcion general para el menu lateral
	public function Cargar_usuario()
	{


		if ($this->input->is_ajax_request()) {

			$Id = $this->input->post('Id');
			echo json_encode($this->Configuracion_mdl->Cargar_usuario($Id));
		} else {
			echo "Metodo de acceso incorrecto";
		}
	}

	public function Editar_usuario()
	{

		if ($this->input->is_ajax_request()) {

			$Id = $this->input->post('editar-txt-id-usuario');

			$Datos= array(
				'Usu_nombres' => $this->input->post('editar-txt-nombre-usuario'),
				'Usu_apellido' => $this->input->post('editar-txt-apellido-usuario'),
				'Usu_estado' => $this->input->post('editar-chk-estado-usuario') == "on" ? 'ACTIVO' : 'INACTIVO',
			);

			echo json_encode($this->Configuracion_mdl->Editar_usuario($Datos,$Id));
		} else {
			echo "Metodo de acceso incorrecto";
		}
	}
}
