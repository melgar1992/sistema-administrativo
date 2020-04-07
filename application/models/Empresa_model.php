<?php
class Empresa_model extends CI_Model
{
    public function getEmpresa()
    {
        $this->db->where('estado', '1');
        return  $this->db->get('empresa')->row();
    }
    public function guardarEmpresa($datosEmpresa)
    {
        $datosEmpresa['estado'] = '1';
        $this->db->where('estado', '1');
        $resultado = $this->db->get('empresa')->row_array();
        if (isset($resultado)) {
            $this->db->where('id_empresa', '1');
            $resultado['estado'] = '0';
            $this->db->update('empresa', $resultado);
            return $this->db->insert('empresa', $datosEmpresa);
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
        $datosFactura['nombre'] = 'Factura';
        $datosFactura['igv'] = '13';
        $this->db->where('nombre', 'Factura');
        $this->db->where('estado' , '1');
        $resultado = $this->db->get('tipo_comprobante')->row_array();
        if (isset($resultado)) {
            $resultado['estado'] = '0';
            $this->db->where('nombre', 'Factura');
            $this->db->update('tipo_comprobante', $resultado);
            return $this->db->insert('tipo_comprobante', $datosFactura);
        } else {
            return $this->db->insert('tipo_comprobante', $datosFactura);
        }
    }
}
