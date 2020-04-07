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
        $data = array();


        $this->loadView('Ventas', '/form/admin/ventas/facturacion_prueba', $data);
    }
    public function facturar()
    {
        $num_autorizacion = $this->input->post('numero_autorizacion');
        $num_factura = $this->input->post('numero_factura');
        $nitci = $this->input->post('nit_ci');
        $fecha = $this->input->post('fecha');
        $monto = $this->input->post('monto_total');
        $llave_dosificada = $this->input->post('llave_dosificacion');
        $datosFacturaEmpresa = $this->Empresa_model->getDatosFactura();
        if (isset($datosFacturaEmpresa)) {
            $fecha = str_replace('-', '', $fecha);
            $controlCode = new ControlCode();
            $codigoControl = $controlCode->generate($num_autorizacion, $num_factura, $nitci, $fecha, $monto, $llave_dosificada);
            $qr = new QR_BarCode();
            $fechaQr = date("d/m/Y", strtotime($fecha));
            $qr->text($datosFacturaEmpresa->nit_ci . '|' . $num_factura . '|' . $num_autorizacion . '|' . $fecha . '|' . $fechaQr . '|' . $monto . '|' . $monto . '|' . $codigoControl . '|' . $nitci . '|0|0|0|0');
            $qr->qrCode(200, 'assets/img/Codigos_Qr/' . $num_factura . '.png');

            $data = array(
                'codigoControl' => $codigoControl,
                'codigoQrUrl' => 'assets/img/Codigos_Qr/' . $num_factura . '.png',
            );
            $this->loadView('Ventas', '/form/admin/ventas/facturacion_prueba', $data);
        } else {
            $this->session->set_flashdata("error", "No se puede generar la factura, por no se a detallado la informacion de la empresa");
            redirect(base_url()."Movimientos/Facturacion");
        }
    }
}
