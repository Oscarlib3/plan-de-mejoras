<?php include('../models/inic_sesion.php'); ?>
<?php include('../controllers/connection.php'); ?>
<?php include('../layouts/header.php'); ?>

<div class="container-fluid bg-success">
  <h1 class="text-center"><b>PLAN DE MEJORAS</b></h1>
  <h5 class="text-center">COORDINACION DE GESTION DE SEGURIDAD DE INFORMACION Y CONTROL DE CAMBIO</h5>
  <div class="row">
    <div class="container">
      <?php if ($tipo_usuario == 1) { ?>
        <div class="btnAdd ">
          <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addUserModal" class="btn btn-dark btn-lg">AGREGAR NUEVA MEJORA</a>
        <?php } ?>
        <?php if ($tipo_usuario == 4) { ?>
          <div class="btnAdd ">
            <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addUserModal" class="btn btn-dark btn-lg">AGREGAR NUEVA MEJORA</a>
          <?php } ?>
          <button id="btnBD3" type="button" class="btn btn-info btn-lg">GRAFICOS DE LAS MEJORAS</button>
          </div>
          <div class="container-fluid ">
            <div class="row bg-white">
              <table id="example" class="table table-striped table-bordered table-condensed text-center" style="width: 100%">
                <thead class="bg-dark text-success">
                  <th>Id</th>
                  <th>DATO</th>
                  <th>OBJETIVO</th>
                  <th>ALCANCE</th>
                  <th>PERSONAL INVOLUCRADO</th>
                  <th>PROCESO</th>
                  <th>FECHA CULMINACION</th>
                  <th>ESTADO DE LA MEJORA</th>
                  <th>PORCENTAJE DE LA MEJORA</th>
                  <?php if ($tipo_usuario == 1) { ?><th scope="col">OPCIONES</th><?php } ?>
                  <?php if ($tipo_usuario == 4) { ?><th scope="col">OPCIONES</th><?php } ?>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>
  <?php include '../layouts/footer.php'; ?>
</div>
<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="../js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="../js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/dt-1.10.25datatables.min.js"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable({
      "fnCreatedRow": function(nRow, aData, iDataIndex) {
        $(nRow).attr('id', aData[0]);
      },
      'serverSide': 'true',
      'processing': 'true',
      'paging': 'true',
      'order': [[1, "asc"]],
      'ajax': {
        'url': '../obtener_datos_cgsicc.php',
        'type': 'post',
      },
      "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        },

      ]

    });
  });
  $(document).on('submit', '#addUser', function(e) {
    e.preventDefault();
    var proceso = $('#addprocesoField').val();
    var objetivo = $('#addobjetivoField').val();
    var numero = $('#addnumeroField').val();
    var personal = $('#addpersonalField').val();
    var alcance = $('#addalcanceField').val();
    var fecha = $('#addfechaField').val();
    var estado = $('#addestadoField').val();
    var porcentaje = $('#addporcentajeField').val();
    if (proceso != '' && objetivo != '' && numero != '' && personal != '' && alcance != '' && fecha != '' && estado != '' && porcentaje != '') {
      $.ajax({
        url: "../agg_mejora_cgsicc.php",
        type: "post",
        data: {
          proceso: proceso,
          objetivo: objetivo,
          numero: numero,
          personal: personal,
          alcance: alcance,
          fecha: fecha,
          estado: estado,
          porcentaje: porcentaje
        },
        success: function(data) {
          var json = JSON.parse(data);
          var status = json.status;
          if (status == 'true') {
            mytable = $('#example').DataTable();
            mytable.draw();
            $('#addUserModal').modal('hide');
          } else {
            alert('failed');
          }
        }
      });
    } else {
      alert('rellena todos los campos');
    }
  });
  $(document).on('submit', '#updateUser', function(e) {
    e.preventDefault();
    var proceso = $('#procesoField').val();
    var objetivo = $('#objetivoField').val();
    var numero = $('#numeroField').val();
    var personal = $('#personalField').val();
    var alcance = $('#alcanceField').val();
    var fecha = $('#fechaField').val();
    var estado = $('#estadoField').val();
    var porcentaje = $('#porcentajeField').val();
    var trid = $('#trid').val();
    var id = $('#id').val();
    if (proceso != '' && objetivo != '' && numero != '' && personal != '' && alcance != '' && fecha != '' && estado != '' && porcentaje != '') {
      $.ajax({
        url: "../act_mejora_cgsicc.php",
        type: "post",
        data: {
          proceso: proceso,
          objetivo: objetivo,
          numero: numero,
          personal: personal,
          alcance: alcance,
          fecha: fecha,
          estado: estado,
          porcentaje: porcentaje,
          id: id
        },
        success: function(data) {
          var json = JSON.parse(data);
          var status = json.status;
          if (status == 'true') {
            table = $('#example').DataTable();
            var button = '<td> <a href="javascript:void();" data-id="' + id + '" class="btn btn-dark btn-sm editbtn">Editar</a>   <a href="#!"  data-id="' + id + '"  class="btn btn-success btn-sm deleteBtn">Borrar</a></td>';
            var row = table.row("[id='" + trid + "']");
            row.row("[id='" + trid + "']").data([id, objetivo, numero, alcance, personal, proceso, fecha, estado, porcentaje, button]);
            $('#exampleModal').modal('hide');
          } else {
            alert('failed');
          }
        }
      });
    } else {
      alert('rellena todos los campos');
    }
  });
  $('#example').on('click', '.editbtn ', function(event) {
    var table = $('#example').DataTable();
    var trid = $(this).closest('tr').attr('id');
    var id = $(this).data('id');
    $('#exampleModal').modal('show');

    $.ajax({
      url: "../datos_individuales_cgsicc.php",
      data: {
        id: id
      },
      type: 'post',
      success: function(data) {
        var json = JSON.parse(data);

        $('#objetivoField').val(json.objetivo);
        $('#numeroField').val(json.numero);
        $('#alcanceField').val(json.alcance);
        $('#personalField').val(json.personal);
        $('#procesoField').val(json.proceso);
        $('#fechaField').val(json.fecha);
        $('#estadoField').val(json.estado);
        $('#porcentajeField').val(json.porcentaje);
        $('#id').val(id);
        $('#trid').val(trid);
      }
    })
  });

  $(document).on('click', '.deleteBtn', function(event) {
    var table = $('#example').DataTable();
    event.preventDefault();
    var id = $(this).data('id');
    if (confirm("Desea usted borrar esta mejora? ")) {
      $.ajax({
        url: "../delete_mejora_cgsicc.php",
        data: {
          id: id
        },
        type: "post",
        success: function(data) {
          var json = JSON.parse(data);
          status = json.status;
          if (status == 'success') {
            $("#" + id).closest('tr').remove();
          } else {
            alert('Failed');
            return;
          }
        }
      });
    } else {
      return null;
    }
  })
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR MEJORA</h5>
      </div>
      <div class="modal-body bg-success fw-bold">
        <form id="updateUser">
          <input type="hidden" name="id" id="id" value="">
          <input type="hidden" name="trid" id="trid" value="">
          <div class="mb-1 row">
            <label for="numeroField" class="col-md-3 form-label">DATO</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="numeroField" name="numero">
            </div>
          </div>
          <div class="mb-1 row">
            <label for="objetivoField" class="col-md-3 form-label">OBJETIVO</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="objetivoField" name="objetivo">
            </div>
          </div>
          <div class="mb-1 row">
            <label for="alcanceField" class="col-md-3 form-label">ALCANCE</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="alcanceField" name="alcance">
            </div>
          </div>
          <div class="mb-1 row">
            <label for="personalField" class="col-md-3 form-label">PERSONAL INVOLUCRADO</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="personalField" name="personal">
            </div>
          </div>
          <div class="mb-1 row">
            <label for="procesoField" class="col-md-3 form-label">PROCESO</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="procesoField" name="proceso">
            </div>
          </div>
          <div class="mb-1 row">
            <label for="fechaField" class="col-md-3 form-label">FECHA DE CULMINACION</label>
            <div class="col-md-9">
              <input type="date" class="form-control" id="fechaField" name="fecha">
            </div>
          </div>
          <div class="mb-1 row">
            <label for="estadoField" class="col-md-3 form-label">ESTADO DE LA MEJORA</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="estadoField" name="estado">
            </div>
          </div>
          <div class="mb-1 row">
            <label for="porcentajeField" class="col-md-3 form-label">PORCENTAJE DE LA MEJORA</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="porcentajeField" name="porcentaje">
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-dark">ENVIAR</button>
          </div>
        </form>
      </div>
      <div class="modal-footer bg-dark">
        <div class="container-fluid px-1">
          <div class="d-flex align-items-center justify-content-between strong">
            <a class="footer-brand text-white text-decoration-none">
              <img src="../img/t-bt.png" alt="" width="40" height="50"><b> Banco del tesoro 2022</b></a>
            <div>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Add user Modal -->
<div class="modal fade " id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h4 class="modal-title" id="exampleModalLabel">AGREGAR NUEVA MEJORA</h4>
      </div>
      <div class="modal-body bg-success fw-bold">
        <form id="addUser" action="">
          <div class="mb-1 row">
            <label for="addnumeroField" class="col-md-3 form-label">DATO</label>
            <div class="col-md-9">
              <input type="textarea" class="form-control" id="addnumeroField" name="numero">
            </div>
          </div>
          <div class="mb-1 row">
            <label for="addobjetivoField" class="col-md-3 form-label">OBJETIVO</label>
            <div class="col-md-9">
              <input type="textarea" class="form-control" id="addobjetivoField" name="objetivo">
            </div>
          </div>
          <div class="mb-1 row">
            <label for="addalcanceField" class="col-md-3 form-label">ALCANCE</label>
            <div class="col-md-9">
              <input type="textarea" class="form-control" id="addalcanceField" name="alcance">
            </div>
          </div>
          <div class="mb-1 row">
            <label for="addpersonalField" class="col-md-3 form-label">PERSONAL INVOLUCRADO</label>
            <div class="col-md-9">
              <input type="textarea" class="form-control" id="addpersonalField" name="personal">
            </div>
          </div>
          <div class="mb-1 row">
            <label for="addprocesoField" class="col-md-3 form-label">PROCESO</label>
            <div class="col-md-9">
              <input type="textarea" class="form-control" id="addprocesoField" name="proceso">
            </div>
          </div>
          <div class="mb-1 row">
            <label for="addfechaField" class="col-md-3 form-label">FECHA DE CULMINACION</label>
            <div class="col-md-9">
              <input type="date" class="form-control" id="addfechaField" name="fecha">
            </div>
          </div>
          <div class="mb-1 row">
            <label for="addestadoField" class="col-md-3 form-label">ESTADO DE LA MEJORA</label>
            <div class="col-md-9">
              <input type="textarea" class="form-control" id="addestadoField" name="estado">
            </div>
          </div>
          <div class="mb-1 row">
            <label for="addporcentajeField" class="col-md-3 form-label">PORCENTAJE DE LA MEJORA</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="addporcentajeField" name="porcentaje">
            </div>
          </div>
          <div class="text-center fw-bold">
            <button type="submit" class="btn btn-dark">AGREGAR</button>
          </div>
        </form>
      </div>
      <div class="modal-footer bg-dark">
        <div class="container-fluid px-1">
          <div class="d-flex align-items-center justify-content-between strong">
            <a class="footer-brand text-white text-decoration-none">
              <img src="../img/t-bt.png" alt="" width="40" height="50"><b> Banco del tesoro 2022</b></a>
            <div>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="modal-3" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title"></h6>

      </div>
      <div class="modal-body">
        <!--En este container se muestran los gráficos-->
        <div id="contenedor-modal3" action= "../js/codigoJS3.js" style="min-width: 630px; height: 400px; margin:0 auto"></div>

      </div>
      <div class="modal-footer bg-dark">
        <div class="container-fluid ">
          <div class="d-flex align-items-center justify-content-between strong">
            <a class="footer-brand text-white text-decoration-none">
              <img src="../img/t-bt.png" alt="" width="40" height="50"><b> Banco del tesoro 2022</b></a>
            <div>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Highcharts JS -->
<script src="../pluggins/Highcharts_7.0.3/code/highcharts.js"></script>
<script src="../pluggins/Highcharts_7.0.3/code/modules/exporting.js"></script>
<script src="../pluggins/Highcharts_7.0.3/code/modules/export-data.js"></script>
<script src="../pluggins/Highcharts_7.0.3/code/modules/drilldown.js"></script>
<script src="../js/codigoJS3.js"></script>
</body>

</html>
<script type="text/javascript">
  //var table = $('#example').DataTable();
</script>