<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Metro, a sleek, intuitive, and powerful framework for faster and easier web development for Windows Metro Style.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, metro, front-end, frontend, web development">
    <meta name="author" content="Sergey Pimenov and Metro UI CSS contributors">

    <link rel='shortcut icon' type='image/x-icon' href='../favicon.ico' />

    <title><?=$title?></title>

    <link href="/assets/css/metro.css" rel="stylesheet">
    <link href="/assets/css/metro-icons.css" rel="stylesheet">
    <link href="/assets/css/metro-responsive.css" rel="stylesheet">
    <link href="/assets/css/styles.css" rel="stylesheet">
    <script src="/assets/js/jquery.js"></script>
    <!--<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>-->
    <script src="/assets/js/metro.js"></script>
    <script src="/assets/js/main.js"></script>
<style>
        .login-form {
            width: 25rem;
            height: 18.75rem;
            position: fixed;
            top: 50%;
            margin-top: -9.375rem;
            left: 50%;
            margin-left: -12.5rem;
            background-color: #ffffff;
            opacity: 0;
            -webkit-transform: scale(.8);
            transform: scale(.8);
        }
</style>

    <script>
        $(function(){
            var form = $(".login-form");

            form.css({
                opacity: 1,
                "-webkit-transform": "scale(1)",
                "transform": "scale(1)",
                "-webkit-transition": ".5s",
                "transition": ".5s"
            });
        });
    </script>
</head>
<body class="bg-darkTeal">
    <div class="login-form padding20 block-shadow">
        <form action="/ticket/check" method="POST" >
            <h1 class="text-light">Bienvenido a GeekLab</h1>
            <hr class="thin"/>
            <br />
            <div class="input-control text full-size" data-role="input">
                <label for="user_login">Ingresa el N° de Ticket:</label>
                <input type="text" name="ticket" id="user_login">
                <button class="button helper-button clear"><span class="mif-cross"></span></button>
            </div>
            <br />
            <br />
            <div class="form-actions">
                <button type="submit" class="button primary">Revisar</button>
            </div>
        </form>
    </div>
</body>
</html>