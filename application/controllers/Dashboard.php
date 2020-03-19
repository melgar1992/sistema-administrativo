<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends BaseController
{

    function __construct()
    {
        parent::__construct();
    }


    public function index()
    {

        $data = array(
            
        );

        $this->loadView("Dashboard", "dashboard", $data);
    }
}
