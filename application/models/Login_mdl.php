<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login_mdl extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function Iniciar_sesion($Nombre_usuario, $Pass)
    {

        //Consulta para obtener datos para crear la sesion
        $this->db->from('tbl_usuarios');
        $this->db->where('Usu_email', $Nombre_usuario);

        $query = $this->db->get();
        $data =  $query->result();
        $usuario = $query->row();

        if (empty($usuario)) {

            return array();
        } else {

            if (password_verify($Pass, $usuario->Usu_contraseña)) {

                return $data;
            } else {

                return array();
            }
        }
    }
}
