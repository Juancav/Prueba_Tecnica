<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Jquery 3.5 -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Login Css -->
    <link rel="stylesheet" href="<?php echo base_url('Assets/Css/Login.css') ?>">
    <!-- Javascript Login -->
    <script type="text/javascript" src="<?php echo base_url('Assets/Js/Login.js') ?>"></script>


</head>

<body>
    <div class="container login">


        <div class="col-md-6">

            <h5>Iniciar Session</h5>
            <?php
            if (!empty($this->session->flashdata('Error'))) {
                echo  '<div class="alert alert-danger" role="alert">' . $this->session->flashdata('Error') . '</div>';
            } else {
            } ?>
            <form Id="form-login" action="index.php/Login_ctr/Iniciar_sesion" method="POST">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                    <input type="email" class="form-control" placeholder="john@gmail.com" id="txt-email" name="txt-email">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-shield-lock"></i></span>
                    <input type="password" class="form-control" placeholder="Contraseña" id="txt-password" name="txt-password">
                </div>
                <button type="submit" id="btn-login" class="btn btn-primary btn-block shadow-lg">Login</button>
            </form>
        </div>


    </div>
</body>

</html>