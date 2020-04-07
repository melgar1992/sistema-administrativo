    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Productos</h3>
                </div>

                <div class="title_right">
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Formulario de productos</h2>
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


                            <form method="POST" action="<?php echo base_url(); ?>Movimientos/Facturacion/facturar" id="categorias" class="form-horizontal form-label-left">
                                <div class="form-group <?php echo !empty(form_error("numero_autorizacion")) ? 'has-error' : ''; ?>">
                                    <label for="numero_autorizacion" class="control-label col-md-3 col-sm-3 col-xs-12">Numero de autorizacion<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" maxlength="15" name="numero_autorizacion" value="<?php echo set_value('numero_autorizacion') ?>" id="numero_autorizacion" required="required" class="form-group col-md-7 col-xs-12" placeholder="numero_autorizacion del Producto">
                                        <?php echo form_error("numero_autorizacion", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                    </div>
                                </div>

                                <div class="form-group <?php echo !empty(form_error("numero_factura")) ? 'has-error' : ''; ?>">
                                    <label for="numero_factura" class="control-label col-md-3 col-sm-3 col-xs-12">Numero de factura <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" maxlength="12" name="numero_factura" value="<?php echo set_value('numero_factura') ?>" id=numero_factura required="required" class="form-group col-md-7 col-xs-12" placeholder="numero_factura de la Categoria">
                                        <?php echo form_error("numero_factura", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nit_ci" class="control-label col-md-3 col-sm-3 col-xs-12">Nit del cliente <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" maxlength="12" name="nit_ci" id="nit_ci" required="required" class="form-group col-md-7 col-xs-12" placeholder="Nit o ci del cliente">

                                    </div>
                                </div>
                                <div class="form-group <?php echo !empty(form_error("fecha")) ? 'has-error' : ''; ?>">
                                    <label for="fecha" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="date" name="fecha" value="<?php echo set_value('fecha') ?>" id="fecha" required="required" class="form-group col-md-7 col-xs-12">
                                        <?php echo form_error("fecha", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                    </div>
                                </div>
                                <div class="form-group <?php echo !empty(form_error("monto_total")) ? 'has-error' : ''; ?>">
                                    <label for="monto_total" class="control-label col-md-3 col-sm-3 col-xs-12">Monto total <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" step="0.01" name="monto_total" value="<?php echo set_value('monto_total') ?>" id="monto_total" required="required" class="form-group col-md-7 col-xs-12">
                                        <?php echo form_error("monto_total", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                    </div>
                                </div>
                                <div class="form-group <?php echo !empty(form_error("llave_dosificacion")) ? 'has-error' : ''; ?>">
                                    <label for="llave_dosificacion" class="control-label col-md-3 col-sm-3 col-xs-12">Llave de dosificacion <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="llave_dosificacion" value="<?php echo set_value('llave_dosificacion') ?>" id="llave_dosificacion" required="required" class="form-group col-md-7 col-xs-12">
                                        <?php echo form_error("llave_dosificacion", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                    </div>
                                </div>

                                <br>
                                <br>

                                <div class="form-group">

                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary btn-flat" type="reset">Borrar</button>
                                        <button type="submit" id="guardar" class="btn btn-success">Guardar</button>

                                    </div>
                                </div>

                            </form>


                            <hr>
                            <div class="col-md-12 text-center ">
                                <?php if(isset($codigoControl)) {; ?>
                                <?php var_dump($codigoControl); ?>
                                <img src="<?php echo base_url() . $codigoQrUrl ?>" alt="Codigo QR" height="150$" width="150$">
                                <?php }?>
                            </div>

                            <!-- /.box -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->