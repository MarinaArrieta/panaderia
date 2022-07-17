<?php
require 'header.php';
require "../config/Conexion.php";

require_once "../modelos/Rubro.php";
$rubro=new Rubro();
$rsptaRubro=$rubro->listar();

require_once "../modelos/Proveedor.php";
$proveedor = new Proveedor();
$rsptaProveedor = $proveedor->listar();
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Producto <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tableProducto" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Rubro</th>
                            <th>Proveedor</th>
                            <th>Stock Minimo</th>
                            <th>Precio Coste</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Rubro</th>
                            <th>Proveedor</th>
                            <th>Stock Minimo</th>
                            <th>Precio Coste</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre:</label>
                            <input type="hidden" name="idProducto" id="idProducto">
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="50" placeholder="Nombre" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Rubro:</label>
                            <select class="form-control" name="idRubro" id="idRubro">
                                <?php
                                foreach ($rsptaRubro as $dato) {
                                ?>
                                  <option value="<?php echo $dato['idRubro']; ?>">
                                    <?php echo $dato['nombre']; ?>
                                  </option>
                                <?php
                                }
                                ?>
                            </select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Proveedor:</label>
                            <select class="form-control" name="idProveedor" id="idProveedor">
                                <?php
                                foreach ($rsptaProveedor as $dato) {
                                ?>
                                  <option value="<?php echo $dato['idProveedor'] ?>">
                                    <?php echo $dato['nombreCompleto'] ?>
                                  </option>
                                <?php
                                }
                                ?>
                            </select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Stock Minimo:</label>
                            <input type="text" class="form-control" name="stockMinimo" id="stockMinimo" maxlength="256" placeholder="Stock Minimo">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Precio de Coste:</label>
                            <input type="text" class="form-control" name="precioCoste" id="precioCoste" maxlength="256" placeholder="Precio de Coste">
                          </div>
                          
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/producto.js"></script>