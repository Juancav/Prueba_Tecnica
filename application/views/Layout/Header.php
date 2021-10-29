<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Tecnica</title>


    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    <!-- Login Css -->
    <link rel="stylesheet" href="<?php echo base_url('Assets/Css/Login.css') ?>">

    <!-- Jquery 3.5 -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.css"/>
 
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>
    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        .back {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 1490;
            background: #000000cb;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .loader {
            position: relative;
            width: 75px;
            height: 100px;
        }

        .loader__bar {
            position: absolute;
            bottom: 0;
            width: 10px;
            height: 50%;
            background: #fff;
            transform-origin: center bottom;
            box-shadow: 1px 1px 0 rgba(0, 0, 0, 0.2);
        }

        .loader__bar:nth-child(1) {
            left: 0px;
            transform: scale(1, 0.2);
            -webkit-animation: barUp1 4s infinite;
            animation: barUp1 4s infinite;
        }

        .loader__bar:nth-child(2) {
            left: 15px;
            transform: scale(1, 0.4);
            -webkit-animation: barUp2 4s infinite;
            animation: barUp2 4s infinite;
        }

        .loader__bar:nth-child(3) {
            left: 30px;
            transform: scale(1, 0.6);
            -webkit-animation: barUp3 4s infinite;
            animation: barUp3 4s infinite;
        }

        .loader__bar:nth-child(4) {
            left: 45px;
            transform: scale(1, 0.8);
            -webkit-animation: barUp4 4s infinite;
            animation: barUp4 4s infinite;
        }

        .loader__bar:nth-child(5) {
            left: 60px;
            transform: scale(1, 1);
            -webkit-animation: barUp5 4s infinite;
            animation: barUp5 4s infinite;
        }

        .loader__ball {
            position: absolute;
            bottom: 10px;
            left: 0;
            width: 10px;
            height: 10px;
            background: #fff;
            border-radius: 50%;
            -webkit-animation: ball 4s infinite;
            animation: ball 4s infinite;
        }

        @-webkit-keyframes ball {
            0% {
                transform: translate(0, 0);
            }

            5% {
                transform: translate(8px, -14px);
            }

            10% {
                transform: translate(15px, -10px);
            }

            17% {
                transform: translate(23px, -24px);
            }

            20% {
                transform: translate(30px, -20px);
            }

            27% {
                transform: translate(38px, -34px);
            }

            30% {
                transform: translate(45px, -30px);
            }

            37% {
                transform: translate(53px, -44px);
            }

            40% {
                transform: translate(60px, -40px);
            }

            50% {
                transform: translate(60px, 0);
            }

            57% {
                transform: translate(53px, -14px);
            }

            60% {
                transform: translate(45px, -10px);
            }

            67% {
                transform: translate(37px, -24px);
            }

            70% {
                transform: translate(30px, -20px);
            }

            77% {
                transform: translate(22px, -34px);
            }

            80% {
                transform: translate(15px, -30px);
            }

            87% {
                transform: translate(7px, -44px);
            }

            90% {
                transform: translate(0, -40px);
            }

            100% {
                transform: translate(0, 0);
            }
        }

        @keyframes ball {
            0% {
                transform: translate(0, 0);
            }

            5% {
                transform: translate(8px, -14px);
            }

            10% {
                transform: translate(15px, -10px);
            }

            17% {
                transform: translate(23px, -24px);
            }

            20% {
                transform: translate(30px, -20px);
            }

            27% {
                transform: translate(38px, -34px);
            }

            30% {
                transform: translate(45px, -30px);
            }

            37% {
                transform: translate(53px, -44px);
            }

            40% {
                transform: translate(60px, -40px);
            }

            50% {
                transform: translate(60px, 0);
            }

            57% {
                transform: translate(53px, -14px);
            }

            60% {
                transform: translate(45px, -10px);
            }

            67% {
                transform: translate(37px, -24px);
            }

            70% {
                transform: translate(30px, -20px);
            }

            77% {
                transform: translate(22px, -34px);
            }

            80% {
                transform: translate(15px, -30px);
            }

            87% {
                transform: translate(7px, -44px);
            }

            90% {
                transform: translate(0, -40px);
            }

            100% {
                transform: translate(0, 0);
            }
        }

        @-webkit-keyframes barUp1 {
            0% {
                transform: scale(1, 0.2);
            }

            40% {
                transform: scale(1, 0.2);
            }

            50% {
                transform: scale(1, 1);
            }

            90% {
                transform: scale(1, 1);
            }

            100% {
                transform: scale(1, 0.2);
            }
        }

        @keyframes barUp1 {
            0% {
                transform: scale(1, 0.2);
            }

            40% {
                transform: scale(1, 0.2);
            }

            50% {
                transform: scale(1, 1);
            }

            90% {
                transform: scale(1, 1);
            }

            100% {
                transform: scale(1, 0.2);
            }
        }

        @-webkit-keyframes barUp2 {
            0% {
                transform: scale(1, 0.4);
            }

            40% {
                transform: scale(1, 0.4);
            }

            50% {
                transform: scale(1, 0.8);
            }

            90% {
                transform: scale(1, 0.8);
            }

            100% {
                transform: scale(1, 0.4);
            }
        }

        @keyframes barUp2 {
            0% {
                transform: scale(1, 0.4);
            }

            40% {
                transform: scale(1, 0.4);
            }

            50% {
                transform: scale(1, 0.8);
            }

            90% {
                transform: scale(1, 0.8);
            }

            100% {
                transform: scale(1, 0.4);
            }
        }

        @-webkit-keyframes barUp3 {
            0% {
                transform: scale(1, 0.6);
            }

            100% {
                transform: scale(1, 0.6);
            }
        }

        @keyframes barUp3 {
            0% {
                transform: scale(1, 0.6);
            }

            100% {
                transform: scale(1, 0.6);
            }
        }

        @-webkit-keyframes barUp4 {
            0% {
                transform: scale(1, 0.8);
            }

            40% {
                transform: scale(1, 0.8);
            }

            50% {
                transform: scale(1, 0.4);
            }

            90% {
                transform: scale(1, 0.4);
            }

            100% {
                transform: scale(1, 0.8);
            }
        }

        @keyframes barUp4 {
            0% {
                transform: scale(1, 0.8);
            }

            40% {
                transform: scale(1, 0.8);
            }

            50% {
                transform: scale(1, 0.4);
            }

            90% {
                transform: scale(1, 0.4);
            }

            100% {
                transform: scale(1, 0.8);
            }
        }

        @-webkit-keyframes barUp5 {
            0% {
                transform: scale(1, 1);
            }

            40% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(1, 0.2);
            }

            90% {
                transform: scale(1, 0.2);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        @keyframes barUp5 {
            0% {
                transform: scale(1, 1);
            }

            40% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(1, 0.2);
            }

            90% {
                transform: scale(1, 0.2);
            }

            100% {
                transform: scale(1, 1);
            }
        }
    </style>
</head>

<body style="background:#E9FDFF;">
    <div class="back" style="display:none;">
        <div class="loader">
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__ball"></div>
        </div>
    </div>

    <div class="p-3" style="background-color: #000000; color:white; display:flex; justify-content:space-between;">
        <div>
            <h6 class="mb-0 text-gray-600">Bienvenido</h6>
            <h4><?php echo $this->session->userdata('Usu_nombre_usuario'); ?></strong></h4>
        </div>

        <div>
            <a class="btn btn-outline-danger" href="Login_ctr/Cerrar_session" type="submit">Cerrar Session</a>

        </div>

    </div>