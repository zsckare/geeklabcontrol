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
        <table class="table striped hovered">
        <thead>
            <tr>
                <th>Folio</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($values as $row) {?>
            <tr>
                <td><?=$row['folio']?></td>
                    <?php if($row['status']==1){ ?>
                    <td>En Revision</td>
                    <?php } ?>
    
                <?php if($row['status']==2){ ?>
                <td>Listo</td>
                <?php } ?>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
</body>
</html>