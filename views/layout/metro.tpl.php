<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel='shortcut icon' type='image/x-icon' href='../favicon.ico' />

    <title><?=$title?></title>

    <link href="/assets/css/metro.css" rel="stylesheet">
    <link href="/assets/css/metro-icons.css" rel="stylesheet">
    <link href="/assets/css/metro-responsive.css" rel="stylesheet">
    <!--
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    -->
    <link href="/assets/css/styles.css" rel="stylesheet">

    <link href="/assets/js/themes/classic.css" rel="stylesheet">
    <link href="/assets/js/themes/classic.date.css" rel="stylesheet">
    

    <link href="/assets/css/ionicons.min.css" rel="stylesheet">
    <script src="/assets/js/jquery.js"></script>
    <!--<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>-->
    <script src="/assets/js/metro.js"></script>
    <script src="/assets/js/main.js"></script>
    <style>
        html, body {
            height: 100%;
        }
        body {
        }
        .page-content {
            padding-top: 3em;
            min-height: 100%;
            height: 100%;
        }

        @media screen and (max-width: 800px){
            #cell-sidebar {
                flex-basis: 52px;
            }
            #cell-content {
                flex-basis: calc(100% - 52px);
            }
        }
    </style>
</head>
<body class="bg-steel">

<div id="cortina" class="no-mostrar" onclick="quitarModal();" ></div>

    <div class="app-bar fixed-top darcula" data-role="appbar">
        <a href="/note" class="app-bar-element branding" style="background-color:#fff;"><img src="/assets/img/GeekLab.png" alt="" width="50"></a>
        <span class="app-bar-divider"></span>
        <ul class="app-bar-menu">
            <li><a onclick="modalSearch();"><span class="mif-search"></span></a></li>
        </ul>
        
        <div class="app-bar-element place-right">
            <span class="dropdown-toggle"><span class="mif-cog"></span></span>
            <div class="app-bar-drop-container padding10 place-right no-margin-top block-shadow fg-dark" data-role="dropdown" data-no-close="true" style="width: 220px">
                <h2 class="text-light">Opciones</h2>
                <ul class="unstyled-list fg-dark">
                    <li><a href="/admin" class="fg-white3 fg-hover-yellow">Administración</a></li>
                    <?php if (isset($_SESSION['user'])) {?>
                    <li><a href="/logout" class="fg-white3 fg-hover-yellow"><span class="mif-settings-power"></span>Salir</a></li>
                    <?php } ?>
                    
                </ul>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="flex-grid no-responsive-future" style="height: 100%;">
            <div class="row" style="height: 100%">
                <div class="cell size-x200" id="cell-sidebar" style="background-color: #71b1d1; height: 100%">
                    <ul class="sidebar">

                        <li><a href="/note">
                            <span class="ion-clipboard icon"></span>
                            <span class="title">Notas</span>
                        </a></li>

                        <li><a href="/client" >
                            <span class="ion-person-stalker icon"></span>
                            <span class="title">Clientes</span>
                        </a></li>
                    
                        <li><a href="/price">
                            <span class="ion-social-usd icon"></span>
                            <span class="title">Cotizaciones</span>
                        </a></li>

                        <li><a href="/sale">
                            <span class="ion-calendar icon"></span>
                            <span class="title">Notas de Venta</span>
                        </a></li>

                        <li><a href="/corte">
                            <span class="ion-cash icon"></span>
                            <span class="title">Corte del Dia</span>
                        </a></li>
                        <?php if ($_SESSION['type']==1) { ?>
                        <li><a href="/Inventary">
                            <span class="ion-clipboard icon"></span>
                            <span class="title">Inventario</span>
                        </a></li>
                        <?php   } ?>
                    </ul>
                </div>
                <div class="cell auto-size padding20 bg-white" id="cell-content">
                    <?=$yield ?>
                </div>
            </div>
        </div>
    </div>
    <div id="cortinasearch" class="no-mostrar" onclick="quitarModalSearch();" ></div>
        <div id="modalsearch" class="no-mostrar">  
            <div class="grid">
                <div class="row">
                    <div class="cell">
                    <div class="row"><label for="">Buscar</label></div>
                        <div class="input-control text">
                            <input type="search" id="buscar">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="cell" id="resultados" style="max-height:10em!important;overrflow:auto;">
                        
                    </div>
                </div>
            </div>
        </div>
</body>
<script>
    $("#buscador").click(function(e) {
        e.preventDefault();
    });

    var clicknotas = 0;
    var clickbusca = 0;
    var clikhome = 0;
    $(document).ready(function() {
        document.onkeypress = mostrarInformacionCaracter;
    });
    
    function mostrarInformacionCaracter(evObject) {

        var elCaracter = String.fromCharCode(evObject.which);

        if (evObject.keyCode==27) {
            quitarModalSearch();
        }

        if (evObject.keyCode==112) {
            redirectNewNote();
        }
        if (evObject.keyCode==113) {
         modalSearch();
        }
     if (evObject.keyCode==115) {
            redirect();
        }
           
    }
</script>
<script src="/assets/js/picker.js"></script>
<script src="/assets/js/picker.date.js"></script>

<script>
    $('.datepicker').pickadate({
        formatSubmit: 'yyyy/mm/dd',
        hiddenName: true
    })
</script>
</html>