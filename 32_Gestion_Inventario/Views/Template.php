<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gestión de Inventario</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="Views/Resources/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet"
    href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet"
    href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap.min.css">

  <link rel="stylesheet"
    href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Views/Resources/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="Views/Resources/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Views/Resources/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="Views/Resources/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="Views/Resources/custom.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">


    <!-- =====================HEADER========================== -->
    <?php
    include "Modules/Header.php";
    ?>

    <!-- =====================MENU========================== -->
    <?php
    include "Modules/Menu.php";
    ?>

    <!-- =============================================== -->

    <div class="content-wrapper">

      <?php

      if (isset($_GET["Pages"])) {

        if (

          $_GET["Pages"] == "Operador" ||
          $_GET["Pages"] == "Empresa" ||
          $_GET["Pages"] == "Contacto" ||
          $_GET["Pages"] == "Grupo" ||

          $_GET["Pages"] == "Listar_Operador" ||
          $_GET["Pages"] == "Listar_Empresa" ||
          $_GET["Pages"] == "Listar_Contacto" ||
          $_GET["Pages"] == "Listar_Grupo"

        ) {

          include "Pages/" . $_GET["Pages"] . ".php";
        } else {

          echo "<h1>Pagina no encontrada</h1>";
        }
      } else {

        include "Pages/Operador.php";
      }

      ?>

    </div>

    <!-- FOOTER -->
    <?php
    include "Modules/Footer.php";
    ?>


    <!-- jQuery 3 -->
    <script src="Views/Resources/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="Views/Resources/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="Views/Resources/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="Views/Resources/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="Views/Resources/dist/js/adminlte.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="Views/Resources/dist/js/demo.js"></script>
    <script>
      $(document).ready(function() {
        $('.sidebar-menu').tree();
      });
    </script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap.min.js"></script>

    <!-- Responsive -->
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap.min.js"></script>

    <!-- Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap.min.js"></script>

    <!-- Excel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

    <!-- PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <!-- Print -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script>
      $(document).ready(function() {

        $('.tablaData').DataTable({

          responsive: true,
          autoWidth: false,

          pageLength: 5,

          lengthMenu: [5, 10, 25, 50, 100],

          dom: 'Bfrtip',

          buttons: [

            {
              extend: 'excel',
              text: '<i class="fa fa-file-excel-o"></i> Excel',
              className: 'btn btn-success'
            },

            {
              extend: 'csv',
              text: '<i class="fa fa-file-text-o"></i> CSV',
              className: 'btn btn-info'
            },

            {
              extend: 'pdf',
              text: '<i class="fa fa-file-pdf-o"></i> PDF',
              className: 'btn btn-danger'
            },

            {
              extend: 'print',
              text: '<i class="fa fa-print"></i> Imprimir',
              className: 'btn btn-default'
            }

          ],

          language: {

            decimal: "",
            emptyTable: "No hay información",
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 a 0 de 0 registros",
            infoFiltered: "(Filtrado de _MAX_ registros totales)",
            thousands: ",",
            lengthMenu: "Mostrar _MENU_ registros",
            loadingRecords: "Cargando...",
            processing: "Procesando...",
            search: "Buscar:",
            zeroRecords: "No se encontraron resultados",
            paginate: {

              first: "Primero",
              last: "Último",
              next: "›",
              previous: "‹"

            }

          }

        });

      });
    </script>
  </div>
</body>

</html>