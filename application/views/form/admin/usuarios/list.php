     <!-- page content -->
     <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Plain Page</h3>
          </div>

          <div class="title_right">
          </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Plain Page</h2>
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


                  <form method="POST" action="<?php echo base_url(); ?>Administrador/Usuarios/guardarUsuarios" id="usuarios" class="form-horizontal form-label-left">
                      
                  <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                          <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="nombre" value="<?php echo set_value("nombre"); ?>" id="nombre" required="required" class="form-group col-md-7 col-xs-12" placeholder="Nombre del Usuario">


                          </div>
                      </div>
                      <div class="form-group">
                          <label for="apellidos" class="control-label col-md-3 col-sm-3 col-xs-12">Apellidos <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="apellidos" id="apellidos" required="required" class="form-group col-md-7 col-xs-12" placeholder="Escriba el Apellido">

                          </div>

                      </div>
                      <div class="form-group">
                          <label for="telefono" class="control-label col-md-3 col-sm-3 col-xs-12">Telefono <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="telefono" value="<?php echo set_value("telefono"); ?>" id="telefono" required="required" class="form-group col-md-7 col-xs-12" placeholder="Escriba el Telefono">

                          </div>
                      </div>
                      <div class="form-group">
                          <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="email" id="email" required="required" class="form-group col-md-7 col-xs-12" placeholder="Escriba el Email">

                          </div>
                      </div>
                      <div class="form-group">
                          <label for="username" class="control-label col-md-3 col-sm-3 col-xs-12">Usuario <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="username" id="username" required="required" class="form-group col-md-7 col-xs-12" placeholder="Escriba el Usuario">

                          </div>
                      </div>
                      <div class="form-group">
                          <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Contraseña <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="password" name="password" id="password" required="required" class="form-group col-md-7 col-xs-12" placeholder="Escriba la contraseña">

                          </div>
                      </div>
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
                                      <th>Nombres</th>
                                      <th>Apellidos</th>
                                      <th>Email</th>
                                      <th>Usuario</th>
                                      <th>Roles</th>
                                      <th>Opciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php if (!empty($usuarios)) : ?>
                                  <?php foreach ($usuarios as $usuario) : ?>

                                  <tr>
                                      <td><?php echo $usuario->id_usuarios; ?></td>
                                      <td><?php echo $usuario->nombres; ?></td>
                                      <td><?php echo $usuario->apellidos; ?></td>
                                      <td><?php echo $usuario->email; ?></td>
                                      <td><?php echo $usuario->username; ?></td>
                                      <td><?php echo $usuario->roles; ?></td>

                                      <td>
                                          <div class="btn-group">
                                              <button type="button" class="btn btn-info btn-vista-usuario" data-toggle="modal" data-target="#modal-default" value="<?php echo $usuario->id_usuarios ?>"><span class="fa fa-search"></span></button>
                                              <a href="<?php echo base_url() ?>Administrador/Usuarios/editar/<?php echo $usuario->id_usuarios; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                              <a href="<?php echo base_url(); ?>Administrador/Usuarios/borrar/<?php echo $usuario->id_usuarios; ?>" class="btn btn-danger btn-borrar"><span class="fa fa-remove"></span></a>
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
 
  <div class="modal fade" id="modal-default">

      <div class="modal-dialog">

          <div class="modal-content">

              <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                      <span aria-hidden="true">&times;</span></button>

                  <h4 class="modal-title">Informacion del Usuario</h4>

              </div>

              <div class="modal-body">



              </div>

              <div class="modal-footer">

                  <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>



              </div>

          </div>

          <!-- /.modal-content -->

      </div>

      <!-- /.modal-dialog -->

  </div>

  <!-- /.modal -->