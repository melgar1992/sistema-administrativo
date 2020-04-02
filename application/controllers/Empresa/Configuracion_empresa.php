<?php

class Configuracion_empresa extends BaseController
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'Configuracion' => $this->Empresa_model->getEmpresa(),
            'Datos_factura' => $this->Empresa_model->getDatosFactura(),
        );

        $this->loadView('Categorias', '/form/admin/configuracion_empresa/list', $data);
    }
    public function guardar_configuracion()
    {
        $nombres = $this->input->post('nombre');
        $direccion = $this->input->post('direccion');
        $actividad_economica = $this->input->post('actividad');
        $numero_telefono = $this->input->post('telefono');
        $email = $this->input->post('email');

        $this->form_validation->set_rules('nombre', 'Nombre de la empresa', 'required');
        $this->form_validation->set_rules('direccion', 'Direccion de la empresa', 'required');
        $this->form_validation->set_rules('actividad', 'Actividad de la empresa', 'required');
        $this->form_validation->set_rules('telefono', 'Telefono de la empresa', 'required');
        $this->form_validation->set_rules('email', 'email de la empresa', 'required|valid_email');

        if ($this->form_validation->run()) {
            $DatosEmpresa = array(
                'nombres' => $nombres,
                'direccion' => $direccion,
                'actividad_economica' => $actividad_economica,
                'numero_telefono' => $numero_telefono,
                'email' => $email,
            );
            if ($this->Empresa_model->guardarEmpresa($DatosEmpresa)) {
                redirect(base_url() . "Empresa/Configuracion_empresa");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
            
        } else {
            $this->index();
            
        }
    }
    public function guardar_configuracion_factura()
    {
        $numero_autorizacion = $this->input->post('numero_autorizacion');
        $nit_ci = $this->input->post('nit_ci');
        $llave_dosificacion = $this->input->post('llave_dosificacion');
        $fecha = $this->input->post('fecha');


        $this->form_validation->set_rules('numero_autorizacion', 'Numero de autirzacion de la empresa', 'required');
        $this->form_validation->set_rules('nit_ci', 'Nit de la empresa', 'required');
        $this->form_validation->set_rules('llave_dosificacion', 'Llave de dosificacion de la empresa', 'required');
        $this->form_validation->set_rules('fecha', 'Fecha limite de emision de factura', 'required');
       
        if ($this->form_validation->run()) {
            $DatosFactura = array(
                
                'numero_autorizacion' => $numero_autorizacion,
                'nit_ci' => $nit_ci,
                'llave_dosificacion' => $llave_dosificacion,
                'fecha_limite' => $fecha,
                'fecha_edicion' => date('Y-m-d H:i:s'),
                
            );
            if ($this->Empresa_model->guardarDatosFactura($DatosFactura)) {
                redirect(base_url() . "Empresa/Configuracion_empresa");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
            
        } else {
            $this->index();
            
        }
    }
}
