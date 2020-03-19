<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="" class="site_title"><i class="fa fa-building"></i> <span>Control Condominio</span></a>
                    </div>

                    <div class="clearfix"></div>




                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section active">

                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <?php if ($this->session->userdata('rol') == 'administrador total') : ?>
                                    <li><a><i class="fa fa-home"></i> Inicio <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url() ?>">Dashboard</a></li>

                                        </ul>
                                    </li>
                                <?php endif; ?>
                                <li><a><i class="fa fa-edit"></i> Formularios <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <?php if ($this->session->userdata('rol') == 'administrador total') : ?>
                                            <li><a href="<?php echo base_url(); ?>Formularios/Usuarios">Usuarios</a></li>
                                        <?php endif; ?>
                                        <?php if (($this->session->userdata('rol') == 'administrador total') || ($this->session->userdata('rol') == 'administrador condominio')) : ?>
                                            <li><a href="<?php echo base_url(); ?>Formularios/Copropietario"></i>Copropietario del condominio</a></li>
                                            <li><a href="<?php echo base_url() ?>Formularios/Categoria_visita">Cateogira de Visitas</a></li>
                                        <?php endif; ?>
                                        <li><a href="<?php echo base_url() ?>Formularios/Control">Control del condominio</a></li>

                                    </ul>
                                </li>

                            </ul>


                        </div>
                        <div>
                            <!-- /sidebar menu -->

                            <!-- /menu footer buttons -->
                            <div class="sidebar-footer hidden-small">

                                <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url() . 'BaseController/logout'; ?>">
                                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                                </a>
                            </div>
                            <!-- /menu footer buttons -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <?php echo $this->session->userdata('nombres'); ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">

                                <li><a href="<?php echo base_url() . 'BaseController/logout'; ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>


                    </ul>
                </nav>
            </div>
        </div>