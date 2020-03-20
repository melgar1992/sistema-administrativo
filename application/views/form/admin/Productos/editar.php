    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Producto</h3>
                </div>

                <div class="title_right">
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Editar producto</h2>
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


                            <form method="POST" action="<?php echo base_url(); ?>Mantenimiento/Productos/actualizarProducto" id="categorias" class="form-horizontal form-label-left">

                                <input type="hidden" value="<?php echo $producto->id_productos ?>" name="id_producto">
                                <div class="form-group <?php echo !empty(form_error("codigo")) ? 'has-error' : ''; ?>">
                                    <label for="codigo" class="control-label col-md-3 col-sm-3 col-xs-12">codigo<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?php echo !empty(form_error("codigo")) ? set_value('codigo') : $producto->codigo ?>" name="codigo" id="codigo" required="required" class="form-group col-md-7 col-xs-12" placeholder="Codigo del Producto">
                                        <?php echo form_error("codigo", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                    </div>
                                </div>

                                <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                                    <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?php echo !empty(form_error("nombre")) ? set_value('nombre') : $producto->nombre ?>" name="nombre" id=nombre required="required" class="form-group col-md-7 col-xs-12" placeholder="Nombre de la Categoria">
                                        <?php echo form_error("nombre", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion" class="control-label col-md-3 col-sm-3 col-xs-12">Descripcion <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?php echo $producto->descripcion ?>" name="descripcion" id="descripcion" required="required" class="form-group col-md-7 col-xs-12" placeholder="Escriba una descripcion breve">

                                    </div>
                                </div>
                                <div class="form-group <?php echo !empty(form_error("precio")) ? 'has-error' : ''; ?>">
                                    <label for="precio" class="control-label col-md-3 col-sm-3 col-xs-12">precio <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" value="<?php echo !empty(form_error("precio")) ? set_value('precio') : $producto->precio ?>" step="0.01" name="precio" id="precio" required="required" class="form-group col-md-7 col-xs-12">
                                        <?php echo form_error("precio", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                    </div>
                                </div>
                                <div class="form-group <?php echo !empty(form_error("stock")) ? 'has-error' : ''; ?>">
                                    <label for="stock" class="control-label col-md-3 col-sm-3 col-xs-12">stock <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" value="<?php echo !empty(form_error("stock")) ? set_value('stock') : $producto->stock ?>" name="stock" id="stock" required="required" class="form-group col-md-7 col-xs-12">
                                        <?php echo form_error("stock", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="categoria" class="control-label col-md-3 col-sm-3 col-xs-12">categoria <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="categoria" id="categoria" required="required" class="form-group col-md-7 col-xs-12">
                                            <?php foreach ($categorias as $categoria) : ?>
                                                <?php if ($categoria->id_categorias == $producto->id_categorias) : ?>
                                                    <option value="<?php echo $categoria->id_categorias; ?>" selected><?php echo $categoria->nombre; ?></option>
                                                <?php else : ?>
                                                    <option value="<?php echo $categoria->id_categorias; ?>"><?php echo $categoria->nombre; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <br>

                                <div class="form-group">

                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a class="btn btn-primary btn-flat" href="<?php echo site_url("Mantenimiento/Productos") ?>" type="button">Volver</a>
                                        <button type="submit" id="editar" class="btn btn-success">Editar</button>

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