<?php
class Permisos_model extends CI_Model
{
    public function getPermisos()
    {
        $this->db->select("p.*, r.nombres as roles, m.nombre as menu");
        $this->db->from("permisos p");
        $this->db->join("roles r", "p.id_rol = r.id_roles");
        $this->db->join("menus m", "p.id_menu = m.id");
        $resultados = $this->db->get();
        return $resultados->result();
}
    }

 
