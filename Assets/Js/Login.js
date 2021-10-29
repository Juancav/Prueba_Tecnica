$(document).ready(function() {

    $('#form-login').on('submit', function() {

        let usuario = $("#txt-email").val();
        let pasword = $("#txt-password").val();

        if (usuario == '' || pasword == '') {
            Swal.fire({
                icon: 'warning',
                title: 'Opppsss..!!',
                text: 'Todos los campos son obligatorios',
                timer: 2000,
                timerProgressBar: true,
                showConfirmButton: false
            })
            return false;
        }

    });



});