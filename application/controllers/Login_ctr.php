<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_ctr extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->model('Login_mdl');
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('Login/Index.php');
    }

    public function Iniciar_sesion()
    {

        $Nombre_usuario = $this->input->post('txt-email');
        $Password = $this->input->post('txt-password');

        $Datos = $this->Login_mdl->Iniciar_sesion($Nombre_usuario, $Password);

        if (!empty($Datos)) {



            foreach ($Datos as $item) {

                $Usu_Id = $item->Usu_Id;
                $Usu_nombre_usuario = $item->Usu_nombres . " " . $item->Usu_apellido;
                $Usu_estado = $item->Usu_estado;
                $Usu_rol_usuario = $item->Usu_rol_usuario;
            }

            if ($Usu_estado == 'ACTIVO') {

                //Creacion de session
                $Sesiones = array(
                    'Usu_id' => $Usu_Id,
                    'Usu_nombre_usuario' => $Usu_nombre_usuario,
                    'Usu_rol_usuario'=>$Usu_rol_usuario
                );

                //Setea la sesion
                $this->session->set_userdata($Sesiones);

                switch( $Usu_rol_usuario){
                    case 'ADMINISTRADOR':
                        header('location: ../Configuracion');
                        break;
                    case 'USUARIO':
                        header('location: ../Home');
                        break;

                }
                
            } else {
                $Error = "Tu usuario esta inactivo, contactate con el administrador para iniciar session";
                $this->session->set_flashdata('Error',$Error);
                redirect('../', 'refresh');
            }
        } else {

            $Error = "Usuario o contraseña incorrectos";
            $this->session->set_flashdata('Error', $Error);
            redirect('../', 'refresh');
        }
    }

    public function Cerrar_session()
    {
        //Creacion de session
        $Sesiones = array(
            'Usu_id',
            'Usu_nombre_usuario'
        );

        $this->session->unset_userdata($Sesiones);
        $this->session->sess_destroy();


        redirect('../', 'refresh');
    }
}
