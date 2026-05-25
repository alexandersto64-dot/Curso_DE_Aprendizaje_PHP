$(document).ready(function () {

    // ── Validación formulario de registro ──
    $("#registerForm").on('submit', function () {
        let pass = $("#password").val();
        let confirm = $("#password_confirm").val();
        if (pass !== confirm) {
            alert("Las contraseñas no coinciden.");
            return false;
        }
        return true;
    });

    // ── Inicialización DataTables ──
    if ($('#example').length) {
        $('#example').DataTable({

            responsive: true,

            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.3.8/i18n/es-ES.json'
            },

            pageLength: 5,

            lengthMenu: [5, 10, 25, 50],

            layout: {
                topStart: {
                    pageLength: {},
                    buttons: [
                        {
                            extend: 'excel',
                            text: '<i class="fa-solid fa-file-excel"></i> Excel',
                            className: 'btn btn-success'
                        },
                        {
                            extend: 'csv',
                            text: '<i class="fa-solid fa-file-csv"></i> CSV',
                            className: 'btn btn-info text-white'
                        },
                        {
                            extend: 'pdf',
                            text: '<i class="fa-solid fa-file-pdf"></i> PDF',
                            className: 'btn btn-danger'
                        },
                        {
                            extend: 'print',
                            text: '<i class="fa-solid fa-print"></i> Imprimir',
                            className: 'btn btn-dark'
                        }
                    ]
                },
                topEnd: 'search',
                bottomStart: 'info',
                bottomEnd: 'paging'
            }

        });
    }

});
