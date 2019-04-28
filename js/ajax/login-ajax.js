$(document).ready(function() {
    $('#form-login').on('submit', function(e) {
        e.preventDefault();

        var datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data){
                console.log(data);
                var resultado = data;
                if (resultado.respuesta == 'exitoso') {
                    Swal.fire(
                        'Login Correcto!',
                        'Bienvenid@ '+resultado.usuario+'!!',
                        'success'
                    ).then(
                        setTimeout(function () {
                            if (resultado.permiso == 1) {
                                window.location.href = 'index.php';
                            }else{
                                window.location.href = 'index.php';
                            }                            
                        }, 1500))
                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'Error!',
                        text: 'Usuario o Contraseña incorrectos, intente de nuevo',
                      })
                }
            }
        })
        
    });
});