  <!-- page content -->
  <div class="right_col" role="main">
      <div class="">
          <div class="page-title">
              <div class="title_left">
                  <h3>Registrar Venta</h3>
              </div>

              <div class="title_right">
              </div>
          </div>

          <div class="clearfix"></div>

          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Formulario de venta</h2>
                          <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                          </ul>
                          <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                          <div class="row">
                              <div class="col-md-12">

                                  <form action="<?php echo base_url(); ?>movimientos/ventas/guardar" method="POST" class="form-horizontal">
                                      <div class="form-group">
                                          <div class="col-md-3">
                                              <label for="">Comprobante:</label>
                                              <select name="comprobantes" id="comprobantes" class="form-control" required>
                                                  <option value="">Seleccione...</option>
                                                  <?php foreach ($tipocomprobantes as $tipocomprobante) : ?>
                                                      <?php $datacomprobante = $tipocomprobante->id_tipo_comprobante . "*" . $tipocomprobante->cantidad . "*" . $tipocomprobante->igv . "*" . $tipocomprobante->serie . "*" . $tipocomprobante->numero_autorizacion . "*" . $tipocomprobante->nit_ci . "*" . $tipocomprobante->llave_dosificacion . "*" . $tipocomprobante->fecha_limite; ?>
                                                      <option value="<?php echo $datacomprobante; ?>">
                                                          <?php echo $tipocomprobante->nombre ?></option>
                                                  <?php endforeach; ?>
                                              </select>
                                              <input type="hidden" id="idcomprobante" name="idcomprobante">
                                              <input type="hidden" id="igv">
                                              <input type="hidden" id="numero_autorizacion">
                                              <input type="hidden" id="nit_ci">
                                              <input type="hidden" id="llave_dosificacion">
                                              <input type="hidden" id="fecha_limite">
                                          </div>
                                          <div class="col-md-3">
                                              <label for="">Serie:</label>
                                              <input type="text" id="serie" class="form-control" name="serie" readonly>
                                          </div>
                                          <div class="col-md-3">
                                              <label for="">Numero:</label>
                                              <input type="text" class="form-control" id="numero" name="numero" readonly>
                                          </div>

                                      </div>
                                      <div class="form-group">
                                          <div class="col-md-3">
                                              <label for="">Cliente:</label>
                                              <div class="input-group">
                                                  <input type="hidden" name="idcliente" id="idcliente">
                                                  <input type="text" class="form-control" disabled="disabled" id="cliente">
                                                  <span class="input-group-btn">
                                                      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span> Buscar</button>
                                                  </span>
                                              </div><!-- /input-group -->
                                          </div>
                                          <div class="col-md-3">
                                                    <label for="descuento">Descuento :</label>
                                                    <input type="number" name="descuento_porcentaje" id="descuento_porcentaje" class="form-control">
                                          </div>
                                          <div class="col-md-3">
                                              <label for="">Fecha:</label>
                                              <input type="date" value="<?php echo date("Y-m-d") ?>" class="form-control" name="fecha" required>
                                          </div>
                                      </div>

                                      <label for="Productos" class="col-md-12">Buscar y agregar productos o servicios</label>
                                      <br></br>
                                      <div class="form-group">
                                          <div class="col-md-4">
                                              <label for="">Producto:</label>
                                              <input type="text" class="form-control" id="producto">
                                          </div>
                                          <div class="col-md-4">
                                              <label for="">Codigo producto:</label>
                                              <input type="text" class="form-control" id="codigo_producto">
                                          </div>
                                          <div class="col-md-1">
                                              <label for="">&nbsp;</label>
                                              <button id="btn-agregar" type="button" class="btn btn-success btn-flat btn-block"><span class="fa fa-plus"></span> Agregar</button>
                                          </div>
                                          <div class="col-md-1">
                                              <label for="">&nbsp;</label>
                                              <button class="btn btn-primary btn-flat btn-block" type="button" data-toggle="modal" data-target="#modal-productos"><span class="fa fa-search"></span> Buscar</button>
                                          </div>
                                      </div>
                                      <br></br>
                                      <table id="tbventas" class="table table-bordered table-striped table-hover">
                                          <thead>
                                              <tr>
                                                  <th>Codigo</th>
                                                  <th>Nombre</th>
                                                  <th>Precio</th>
                                                  <th>Stock Max.</th>
                                                  <th>Cantidad</th>
                                                  <th>Importe</th>
                                                  <th></th>
                                              </tr>
                                          </thead>
                                          <tbody>

                                          </tbody>
                                      </table>

                                      <div class="form-group">
                                          <div class="col-md-3">
                                              <div class="input-group">
                                                  <span class="input-group-addon">Subtotal:</span>
                                                  <input type="text" class="form-control" placeholder="" value="0.00" name="subtotal" readonly="readonly">
                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <div class="input-group">
                                                  <span class="input-group-addon">IVA:</span>
                                                  <input type="text" class="form-control" placeholder="" value="0.00" name="igv" readonly="readonly">
                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <div class="input-group">
                                                  <span class="input-group-addon">Descuento:</span>
                                                  <input type="text" class="form-control" placeholder="" value="0.00" name="descuento" value="0.00" readonly="readonly">
                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <div class="input-group">
                                                  <span class="input-group-addon">Total:</span>
                                                  <input type="text" class="form-control" placeholder="" value="0.00" name="total" readonly="readonly">
                                              </div>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <div class="col-md-12">
                                              <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                          </div>

                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- /page content -->


  <div class="modal fade" id="modal-default">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Lista de Clientes</h4>
              </div>
              <div class="modal-body">
                  <table id="example1" class="table table-bordered table-striped table-hover">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Nombre</th>
                              <th>Documento</th>
                              <th>Numero</th>
                              <th>Opcion</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php if (!empty($clientes)) : ?>
                              <?php foreach ($clientes as $cliente) : ?>
                                  <tr>
                                      <td><?php echo $cliente->id_clientes; ?></td>
                                      <td><?php echo $cliente->nombres; ?></td>
                                      <td><?php echo $cliente->tipodocumento; ?></td>
                                      <td><?php echo $cliente->num_documento; ?></td>
                                      <?php $dataCliente = $cliente->id_clientes . "*" . $cliente->nombres . "*" . $cliente->tipocliente . "*" . $cliente->tipodocumento . "*" . $cliente->num_documento . "*" . $cliente->telefono . "*" . $cliente->direccion; ?>

                                      <td>
                                          <button type="button" class="btn btn-success btn-check" value="<?php echo $dataCliente ?>"><span class="fa fa-check"></span></button>
                                      </td>
                                  </tr>
                              <?php endforeach; ?>
                          <?php endif; ?>

                      </tbody>
                  </table>

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

  <div class="modal fade" id="modal-productos">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Lista de Productos</h4>
              </div>
              <div class="modal-body">
                  <table id="tablaProdcutos" class="table table-bordered table-striped table-hover">
                      <thead>
                          <tr>
                              <th>Codgio</th>
                              <th>Nombre</th>
                              <th>Precio</th>
                              <th>Stock</th>
                              <th>Opcion</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php if (!empty($productos)) : ?>
                              <?php foreach ($productos as $producto) : ?>
                                  <tr>
                                      <td><?php echo $producto->codigo; ?></td>
                                      <td><?php echo $producto->nombre; ?></td>
                                      <td><?php echo $producto->precio; ?></td>
                                      <td><?php echo $producto->stock; ?></td>
                                      <?php $dataproducto = $producto->id_productos . "*" . $producto->codigo . "*" . $producto->nombre . "*" . $producto->precio . "*" . $producto->stock; ?>

                                      <td>
                                          <button type="button" class="btn btn-success btn-check-producto" value="<?php echo $dataproducto ?>"><span class="fa fa-check"></span></button>
                                      </td>
                                  </tr>
                              <?php endforeach; ?>
                          <?php endif; ?>

                      </tbody>
                  </table>

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