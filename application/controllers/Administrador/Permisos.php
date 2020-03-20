<?php

class Permisos extends BaseController
{

    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data = array(
            'permisos' => $this->Permisos_model->getPermisos(),
            'roles' => $this->Usuario_model->getRoles(),
        );

        $this->loadView('Permisos', '/form/admin/permisos/list', $data);
    }
}