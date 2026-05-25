</main><!-- /main container -->

<!-- Footer -->
<footer class="py-3 bg-white border-top">
  <div class="container text-center">
    <span class="text-muted" style="font-size:0.9rem;">
      &copy; <?= date('Y') ?> Sistema de Gestión de Empleados &middot; Desarrollado con
      <i class="fa fa-heart text-danger"></i> y PHP MVC
    </span>
  </div>
</footer>

<?php $base = defined('BASE_URL') ? BASE_URL : ''; ?>

<!-- 1. jQuery PRIMERO -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- 2. Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- 3. DataTables core -->
<script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.8/js/dataTables.bootstrap5.js"></script>

<!-- 4. Responsive -->
<script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>

<!-- 5. Buttons -->
<script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.bootstrap5.js"></script>

<!-- 6. Exportar Excel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>

<!-- 7. Exportar PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<!-- 8. Imprimir -->
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script>

<!-- 9. Scripts personalizados -->
<script src="<?= $base ?>/js/scripts.js"></script>

</body>
</html>
