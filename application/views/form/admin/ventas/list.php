  <!-- page content -->
  <div class="right_col" role="main">
      <div class="">
          <div class="page-title">
              <div class="title_left">
                  <h3>Ventas</h3>
              </div>

              <div class="title_right">
              </div>
          </div>

          <div class="clearfix"></div>

          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Ventas</h2>
                          <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                          </ul>
                          <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                          <div class="form-group">
                              <a href="<?php echo base_url(); ?>Movimientos/Ventas/add">

                                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                                      <button type="submit" id="agregar" class="btn btn-success">Agregar ventas</button>
                              </a>

                          </div>

                          <div class="row">
                              <hr>
                              <hr>
                              <div class="col-md-12">
                                  <table id="example1" class="table table-bordered btn-hover">
                                      <thead>
                                          <tr>
                                              <th>#</th>
                                              <th>Nombres Cliente</th>
                                              <th>Tipo Comprobante</th>
                                              <th>Numero del Comprobante</th>
                                              <th>Fecha</th>
                                              <th>Total</th>
                                              <th>Opciones</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php if (!empty($ventas)) : ?>
                                              <?php foreach ($ventas as $venta) : ?>
                                                  <tr>
                                                      <td><?php echo $venta->id_ventas; ?></td>
                                                      <td><?php echo $venta->nombres; ?></td>
                                                      <td><?php echo $venta->tipocomprobante; ?></td>
                                                      <td><?php echo $venta->num_documento; ?></td>
                                                      <td><?php echo $venta->fecha; ?></td>
                                                      <td><?php echo $venta->total; ?></td>
                                                      <td>
                                                          <button type="button" class="btn btn-info btn-view-venta" data-toggle="modal" data-target="#modal-default" value="<?php echo $venta->id_ventas ?>"><span class="fa fa-search"></span></button>
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

                  <h4 class="modal-title">Informacion de la venta</h4>

              </div>

              <div class="modal-body">



              </div>

              <div class="modal-footer">

                  <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print">Imprimir</span></button>


              </div>

          </div>

          <!-- /.modal-content -->

      </div>

      <!-- /.modal-dialog -->

  </div>

  <!-- /.modal -->