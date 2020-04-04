     <!-- page content -->
     <div class="right_col" role="main">
         <div class="">
             <div class="page-title">
                 <div class="title_left">
                     <h3>Configuracion</h3>
                 </div>

                 <div class="title_right">
                 </div>
             </div>

             <div class="clearfix"></div>
             <div class="row">

                 <div class="col-md-6 col-sm-12 col-xs-12">
                     <div class="x_panel">
                         <div class="x_title">
                             <h2>Configuracion de la empresa</h2>
                             <ul class="nav navbar-right panel_toolbox">
                                 <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                 </li>
                                 <li><a class="close-link"><i class="fa fa-close"></i></a>
                                 </li>
                             </ul>
                             <div class="clearfix"></div>
                         </div>
                         <div class="x_content">
                             <?php if ($this->session->flashdata("error")) : ?>
                                 <div class="alert alert-danger alert-dismissable">
                                     <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                                     <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                                 </div>
                             <?php endif; ?>


                             <form method="POST" action="<?php echo base_url(); ?>Empresa/Configuracion_empresa/guardar_configuracion" id="configuracion_empresa" class="form-horizontal form-label-left">

                                 <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                                     <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre de la empresa <span class="required">*</span></label>
                                     <div class="col-md-8 col-sm-6 col-xs-12">
                                         <input type="text" name="nombre" value="<?php echo !empty(set_value("nombre")) ? set_value('nombre') : !empty($Configuracion) ? $Configuracion->nombres  : ''; ?>" id="nombre" required="required" class="form-group col-md-7 col-xs-12" placeholder="Nombre">


                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label for="direccion" class="control-label col-md-3 col-sm-3 col-xs-12">Direccion <span class="required">*</span></label>
                                     <div class="col-md-8 col-sm-6 col-xs-12">
                                         <textarea name="direccion" maxlength="200" style="margin: 0px; width: 283px; height: 61px;" type='text' rows="2" id="direccion" placeholder="Direccion de la empresa"><?php echo !empty(set_value("direccion")) ? set_value('direccion') : !empty($Configuracion) ? $Configuracion->direccion : ''; ?></textarea>
                                     </div>

                                 </div>
                                 <div class="form-group">
                                     <label for="actividad" class="control-label col-md-3 col-sm-3 col-xs-12">Actividad economica <span class="required">*</span></label>
                                     <div class="col-md-8 col-sm-6 col-xs-12">
                                         <input type="text" name="actividad" value="<?php echo !empty(set_value("actividad")) ? set_value('actividad') : !empty($Configuracion) ? $Configuracion->actividad_economica : ''; ?>" id="actividad" required="required" class="form-group col-md-7 col-xs-12" placeholder="Transporte, servicios, etc">

                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label for="telefono" class="control-label col-md-3 col-sm-3 col-xs-12">Numero de telefono <span class="required">*</span></label>
                                     <div class="col-md-8 col-sm-6 col-xs-12">
                                         <input type="number" name="telefono" value="<?php echo !empty(set_value("telefono")) ? set_value('telefono') : !empty($Configuracion) ? $Configuracion->numero_telefono : ''; ?>" id="telefono" required="required" class="form-group col-md-7 col-xs-12" placeholder="Escriba el telefono">

                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Correo electronico <span class="required">*</span></label>
                                     <div class="col-md-8 col-sm-6 col-xs-12">
                                         <input type="text" name="email" value="<?php echo !empty(set_value("email")) ? set_value('email') : !empty($Configuracion) ? $Configuracion->email : ''; ?>" id="email" required="required" class="form-group col-md-7 col-xs-12" placeholder="ejemlp@hotmail.com">

                                     </div>
                                 </div>



                                 <div class="form-group">

                                     <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                         <button type="submit" id="guardar" class="btn btn-success">Guardar</button>

                                     </div>
                                 </div>

                             </form>


                             <hr>

                         </div>
                     </div>
                 </div>


                 <div class="col-md-6 col-sm-12 col-xs-12">
                     <div class="x_panel">
                         <div class="x_title">
                             <h2>Configuracion de facturacion</h2>
                             <ul class="nav navbar-right panel_toolbox">
                                 <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                 </li>
                                 <li><a class="close-link"><i class="fa fa-close"></i></a>
                                 </li>
                             </ul>
                             <div class="clearfix"></div>
                         </div>
                         <div class="x_content">
                             <?php if ($this->session->flashdata("error")) : ?>
                                 <div class="alert alert-danger alert-dismissable">
                                     <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                                     <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                                 </div>
                             <?php endif; ?>


                             <form method="POST" action="<?php echo base_url(); ?>Empresa/Configuracion_empresa/guardar_configuracion_factura" id="facturacion" class="form-horizontal form-label-left">

                                 <div class="form-group <?php echo !empty(form_error("numero_autorizacion")) ? 'has-error' : ''; ?>">
                                     <label for="numero_autorizacion" class="control-label col-md-3 col-sm-3 col-xs-12">Numero de autorizacion <span class="required">*</span></label>
                                     <div class="col-md-8 col-sm-6 col-xs-12">
                                         <input type="text" name="numero_autorizacion" value="<?php echo !empty(set_value("numero_autorizacion")) ? set_value('numero_autorizacion') : !empty($Datos_factura) ? $Datos_factura->numero_autorizacion : ''; ?>" id="numero_autorizacion" required="required" class="form-group col-md-7 col-xs-12" placeholder="Numero de docificacion">


                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label for="nit_ci" class="control-label col-md-3 col-sm-3 col-xs-12">nit <span class="required">*</span></label>
                                     <div class="col-md-8 col-sm-6 col-xs-12">
                                         <input type="number" name="nit_ci" value="<?php echo !empty(set_value("nit_ci")) ? set_value('nit_ci') : !empty($Datos_factura) ?  $Datos_factura->nit_ci : ''; ?>" id="nit_ci" required="required" class="form-group col-md-7 col-xs-12" placeholder="Nit de la empresa">

                                     </div>

                                 </div>
                                 <div class="form-group">
                                     <label for="llave_dosificacion" class="control-label col-md-3 col-sm-3 col-xs-12">Llave dosificacion <span class="required">*</span></label>
                                     <div class="col-md-8 col-sm-6 col-xs-12">
                                         <textarea name="llave_dosificacion" style="margin: 0px; width: 283px; height: 61px;" maxlength="200" type='text' rows="2" id="text" placeholder="Llave dosificacion de la empresa"><?php echo !empty(set_value("llave_dosificacion")) ? set_value('llave_dosificacion') : !empty($Datos_factura) ?  $Datos_factura->llave_dosificacion : ''; ?></textarea>

                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label for="fecha" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha limite emision <span class="required">*</span></label>
                                     <div class="col-md-8 col-sm-6 col-xs-12">
                                         <input type="date" name="fecha" id="fecha" value="<?php echo !empty(set_value('fecha')) ? set_value('fecha') : !empty($Datos_factura) ?  $Datos_factura->fecha_limite : ''; ?>" required="required" class="form-group col-md-7 col-xs-12">

                                     </div>
                                 </div>




                                 <div class="form-group">

                                     <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                         <button type="submit" id="guardar" class="btn btn-success">Guardar</button>

                                     </div>
                                 </div>

                             </form>


                             <hr>


                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- /page content -->