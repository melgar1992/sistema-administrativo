<?php

class Facturacion extends BaseController
{

    function __construct()
    {

        parent::__construct();
        $this->load->library("ControlCode");
    }
    public function index()
    {
        $data = array(
                      
        );
        

        $this->loadView('Ventas','/form/admin/ventas/facturacion_prueba', $data);
    }
    public function facturar()
    {
        $num_autorizacion = $this->input->post('numero_autorizacion');
        $num_factura = $this->input->post('numero_factura');
        $nitci = $this->input->post('nit_ci');
        $fecha = $this->input->post('fecha');
        $monto = $this->input->post('monto_total');
        $llave_dosificada = $this->input->post('llave_dosificacion');
        $fecha = str_replace('-','',$fecha);
        $controlCode = new ControlCode();
        $llave_control = $controlCode->generate($num_autorizacion,$num_factura, $nitci, $fecha, $monto, $llave_dosificada);
        var_dump($llave_control);
    }
    

}
