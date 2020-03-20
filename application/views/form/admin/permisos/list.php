    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Permisos</h3>
                </div>

                <div class="title_right">
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Permisos de usuarios</h2>
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


                            <form method="POST" action="<?php echo base_url(); ?>Administrador/Permisos/guardarPermisos" id="permisos" class="form-horizontal form-label-left">

                                <div class="form-group">
                                    <label for="roles" class="control-label col-md-3 col-sm-3 col-xs-12">Roles <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="roles" id="roles" required="required" class="form-group col-md-7 col-xs-12">
                                            <?php foreach ($roles as $rol) : ?>
                                                <option value="<?php echo $rol->id_roles; ?>"><?php echo $rol->nombres; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                                    <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="nombre" value="<?php echo set_value("nombre"); ?>" id="nombre" required="required" class="form-group col-md-7 col-xs-12" placeholder="Nombre de la Categoria">
                                        <?php echo form_error("nombre", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion" class="control-label col-md-3 col-sm-3 col-xs-12">Descripcion <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="descripcion" id="descripcion" required="required" class="form-group col-md-7 col-xs-12" placeholder="Escriba una descripcion breve">

                                    </div>
                                </div>



                                <div class="form-group">

                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary btn-flat" type="reset">Borrar</button>
                                        <button type="submit" id="guardar" class="btn btn-success">Guardar</button>

                                    </div>
                                </div>


                            </form>

                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="example1" class="table table-bordered btn-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Menu</th>
                                                <th>Roles</th>
                                                <th>Leer</th>
                                                <th>Insertar</th>
                                                <th>Actualizar</th>
                                                <th>Eliminar</th>

                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($permisos)) : ?>
                                                <?php foreach ($permisos as $permiso) : ?>

                                                    <tr>
                                                        <td><?php echo $permiso->id; ?></td>
                                                        <td><?php echo $permiso->menu; ?></td>
                                                        <td><?php echo $permiso->roles; ?></td>
                                                        <td><?php if ($permiso->leer == 0) : ?>
                                                                <span class="fa fa-times"></span>
                                                            <?php else : ?>
                                                                <span class="fa fa-check"></span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php if ($permiso->leer == 0) : ?>
                                                                <span class="fa fa-times"></span>
                                                            <?php else : ?>
                                                                <span class="fa fa-check"></span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php if ($permiso->insertar == 0) : ?>
                                                                <span class="fa fa-times"></span>
                                                            <?php else : ?>
                                                                <span class="fa fa-check"></span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php if ($permiso->actualizar == 0) : ?>
                                                                <span class="fa fa-times"></span>
                                                            <?php else : ?>
                                                                <span class="fa fa-check"></span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php if ($permiso->eliminar == 0) : ?>
                                                                <span class="fa fa-times"></span>
                                                            <?php else : ?>
                                                                <span class="fa fa-check"></span>
                                                            <?php endif; ?>
                                                        </td>

                                                        <div class="btn-group">

                                                            <a href="<?php echo base_url() ?>Administrador/Permisos/editar/<?php echo $permiso->id; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                            <a href="<?php echo base_url(); ?>Administrador/Permisos/borrar/<?php echo $permiso->id; ?>" class="btn btn-danger btn-borrar"><span class="fa fa-remove"></span></a>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->