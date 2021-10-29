<?php defined('BASEPATH') or exit('No direct script access allowed');

class Configuracion_mdl extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

   	//Crear tipo de usuarios 
	public function Crear_usuario($data)
	{

		$this->db->insert('tbl_usuarios', $data);

		if ($this->db->affected_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}

    public function Ver_usuarios()
	{

		$Data = $this->db->get('tbl_usuarios');
		$result = $Data->result();

		return $result;
	}

    public function Eliminar_usuario($Id){

            $this->db->where('Usu_Id', $Id);
			$this->db->delete('tbl_usuarios');

            if ($this->db->affected_rows() > 0) {
                return 1;
            } else {
                return 0;
            }
    }

    public function Cargar_usuario($Id)
	{
        $this->db->where('Usu_Id',$Id);
		$Data = $this->db->get('tbl_usuarios');
		$result = $Data->result();

		return $result;
	}

    public function Editar_usuario($data, $Id)
	{

		$this->db->where('Usu_Id', $Id);
		$this->db->update('tbl_usuarios', $data);

		if ($this->db->affected_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}
}
