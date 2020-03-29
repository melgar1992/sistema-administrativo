<?php
class Empresa_model extends CI_Model
{
    public function getEmpresa()
    {
        $this->db->where('id_empresa', '1');
        return  $this->db->get('empresa')->row();
    }
    public function guardarEmpresa($datosEmpresa)
    {
        $this->db->where('id_empresa', '1');
        $resultado = $this->db->get('empresa')->row();
        if (isset($resultado)) {
            $this->db->where('id_empresa', '1');
            return $this->db->update('empresa', $datosEmpresa);
        } else {
            return $this->db->insert('empresa', $datosEmpresa);
        }
    }
    public function getDatosFactura()
    {
        $this->db->where('nombre', 'Factura');
        return  $this->db->get('tipo_comprobante')->row();
    }
    public function guardarDatosFactura($datosFactura)
    {
        $this->db->where('nombre', 'Factura');
        $resultado = $this->db->get('tipo_comprobante')->row();
        if (isset($resultado)) {
            $this->db->where('nombre', 'Factura');
            return $this->db->update('tipo_comprobante', $datosFactura);
        } else {
            $datosFactura['nombre'] = 'Factura';
            $datosFactura['igv'] = '13';
            return $this->db->insert('tipo_comprobante', $datosFactura);
        }
    }
}
