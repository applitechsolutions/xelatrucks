$(document).ready(function () {

    $('#form-usuario').on('submit', function (e) {
        e.preventDefault();

        var datos = $(this).serializeArray();
        console.log(datos);

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var resultado = data;
                if (resultado.respuesta == 'exito') {
                    Swal.fire(
                        'Exito!',
                        '¡' + resultado.mensaje,
                        'success'
                    )
                    if (resultado.proceso == 'nuevo') {
                        setTimeout(function () {
                            location.reload();
                        }, 1500);
                    } else if (resultado.proceso == 'editado') {
                        setTimeout(function () {
                            window.location.href = 'listUsers.php';
                        }, 1500);
                    }
                } else if (resultado.respuesta == 'vacio') {
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Debe llenar todos los campos',
                    })
                } else if (resultado.respuesta == 'error') {
                    Swal.fire({
                        type: 'error',
                        title: 'Error',
                        text: 'No se pudo guardar en la base de datos',
                    })
                }
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        })

    });

    $('.borrar_usuario').on('click', function (e) {
        e.preventDefault();

        var id = $(this).attr('data-id');
        var tipo = $(this).attr('data-tipo');

        swal({
            title: '¿Estás Seguro?',
            text: "Un registro eliminado no puede recuperarse",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, Eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            $.ajax({
                type: 'POST',
                data: {
                    'id': id,
                    'usuario': 'eliminar'
                },
                url: 'BLL/' + tipo + '.php',
                success(data) {
                    console.log(data);
                    var resultado = JSON.parse(data);
                    if (resultado.respuesta == 'exito') {
                        swal(
                            'Eliminado!',
                            'El usuario ha sido borrado con exito.',
                            'success'
                        )
                        jQuery('[data-id="' + resultado.idUsuario + '"]').parents('tr').remove();
                    } else {
                        swal({
                            type: 'error',
                            title: 'Error!',
                            text: 'No se pudo eliminar el usuario.'
                        })
                    }
                }
            });
        });
    });

    $('#confPass').on('keyup', function (e) {
        var pass1 = $('#passW').val();
        var pass2 = $('#confPass').val();

        if (pass1 == pass2) {
            $('#confPass').removeClass('form-control is-invalid').addClass('form-control is-valid');
            $('#btnUser').attr('disabled', false);
        } else {
            $('#confPass').removeClass('form-control is-valid').addClass('form-control is-invalid');
            $('#btnUser').attr('disabled', true);
        }
    });
});