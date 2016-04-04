<?php

if (defined('YOi_Start') && $YOi_Token == "5ab7b44c0747390658bbf882ae4df1c7") {
    function view($template, $vars = array())
    {
        extract($vars);

        require "views/$template.tpl.php";
    }

    function controller($name)
    {
        if (empty($name))
        {
            $name = 'home';
        }

        $file = "controllers/$name.php";

        if (file_exists($file))
        {
            require $file;
        }
        else
        {
            header("HTTP/1.0 404 Not Found");
            exit("Pagina no encontrada");
        }
    }
}